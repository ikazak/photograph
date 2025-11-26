<!DOCTYPE html>
<html lang="en">

<?= include_page('header') ?>

<body>
    <div class="container-fluid position-relative d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-dark position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->

        <!-- Sidebar Start -->
        <?= include_page('photoex/phsidebar') ?>
        <!-- Sidebar End -->

        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            <?= include_page('photoex/phnavbar') ?>
            <!-- Navbar End -->

            <!-- NEW: Calendar Title Section -->
            <div class="calendar-title">
                <h1>📅 Availability Calendar</h1>
                <p>Manage your schedule and set unavailable dates</p>
            </div>

            <div class="calendar-container">
                <div class="calendar-header">
                    <select id="month-select" class="control-select"></select>
                    <select id="year-select" class="control-select"></select>
                </div>

                <div class="weekdays-grid">
                    <span>Sun</span><span>Mon</span><span>Tue</span><span>Wed</span><span>Thu</span><span>Fri</span><span>Sat</span>
                </div>

                <div id="calendar-grid" class="days-grid">
                </div>
            </div>

            <div id="modal" class="modal-overlay hidden">
                <div class="modal-content">
                    <h3>Set Unavailability</h3>
                    <p id="selected-date-display" class="modal-date"></p>
                    <textarea id="reason-input" placeholder="Enter your reason for being unavailable (e.g., 'Vacation', 'Doctor Appointment', 'Blocked Time')..."></textarea>
                    <div class="modal-actions">
                        <button onclick="clearAndSaveUnavailability()" class="btn-clear">Clear Set</button>
                        <button onclick="saveUnavailability()" class="btn-save">Save</button>
                        <button onclick="closeModal()" class="btn-cancel">Cancel</button>
                    </div>
                </div>
            </div>

        </div>
        <!-- Content End -->

        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <?= import_packages("datatable", "tyrax", "loading", "ctr", "path", "twal") ?>

    <script>
        addEventListener("DOMContentLoaded", () => {
            LOADING.load(true);

            setTimeout(() => LOADING.load(false), 1000)

        })
    </script>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Moment.js can be helpful for date manipulations, but we'll use native Date for simplicity here -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script> -->
    <script src="<?= assets() ?>/lib/chart/chart.min.js"></script>
    <script src="<?= assets() ?>/lib/easing/easing.min.js"></script>
    <script src="<?= assets() ?>/lib/waypoints/waypoints.min.js"></script>
    <script src="<?= assets() ?>/lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="<?= assets() ?>/lib/tempusdominus/js/moment.min.js"></script>
    <script src="<?= assets() ?>/lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="<?= assets() ?>/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="<?= assets() ?>/js/main.js"></script>

    <!-- Custom Calendar JavaScript -->
    <script>
        let currentYear, currentMonth; // currentMonth is 0-indexed (0=Jan, 11=Dec)
        let selectedDateKey = null; // Holds the date string for the modal (e.g., '2025-10-25')
        const UNAVAILABILITY_KEY = 'myUnavailabilityData'; // Key for localStorage

        const monthNames = [
            "January", "February", "March", "April", "May", "June",
            "July", "August", "September", "October", "November", "December"
        ];

        // --- Initialization: Sets up the selectors and initial view ---
        document.addEventListener('DOMContentLoaded', () => {
            const today = new Date();
            currentYear = today.getFullYear();
            currentMonth = today.getMonth();

            populateSelectors(currentYear);

            // Set the initial values of the selectors to the current month/year
            document.getElementById('month-select').value = currentMonth;
            document.getElementById('year-select').value = currentYear;

            // Attach change listeners
            document.getElementById('month-select').addEventListener('change', handleDateChange);
            document.getElementById('year-select').addEventListener('change', handleDateChange);

            renderCalendar();
        });

        // --- Selector Population ---
        function populateSelectors(currentYear) {
            const monthSelect = document.getElementById('month-select');
            const yearSelect = document.getElementById('year-select');

            // Populate Months
            monthSelect.innerHTML = monthNames.map((name, index) =>
                `<option value="${index}">${name}</option>`
            ).join('');

            // Populate Years (e.g., last 5 years to next 10 years)
            yearSelect.innerHTML = '';
            for (let year = currentYear - 5; year <= currentYear + 10; year++) {
                yearSelect.innerHTML += `<option value="${year}">${year}</option>`;
            }
        }

        // --- Handles User Selector Change ---
        function handleDateChange() {
            currentMonth = parseInt(document.getElementById('month-select').value);
            currentYear = parseInt(document.getElementById('year-select').value);
            renderCalendar();
        }

        async function checkDate(date) {
            return await tyrsync.post({
                url: "unavailable/find",
                request: {
                    photo_id: localStorage.getItem("id"),
                    add_date: date
                }
            });

        }

        // --- CORE: Calendar Rendering Function ---
        async function renderCalendar() {
            const grid = document.getElementById('calendar-grid');
            grid.innerHTML = ''; // Clear previous days

            const firstDay = new Date(currentYear, currentMonth, 1).getDay(); // 0=Sun, 6=Sat
            const daysInMonth = new Date(currentYear, currentMonth + 1, 0).getDate();

            // Normalize today's date for accurate comparison
            const today = new Date();
            today.setHours(0, 0, 0, 0);

            const unavailabilityData = JSON.parse(localStorage.getItem(UNAVAILABILITY_KEY) || '{}');

            // 1. Add blank cells for the offset (where the month doesn't start on Sunday)
            for (let i = 0; i < firstDay; i++) {
                const blankCell = document.createElement('div');
                blankCell.classList.add('day');
                blankCell.style.border = 'none'; // Optional: hide border for blanks
                blankCell.style.cursor = 'default';
                grid.appendChild(blankCell);
            }

            // 2. Loop through all days of the month
            for (let dayNum = 1; dayNum <= daysInMonth; dayNum++) {
                const dateToCheck = new Date(currentYear, currentMonth, dayNum);
                const dayCell = document.createElement('div');
                dayCell.classList.add('day');
                dayCell.textContent = dayNum;

                const dateKey = `${currentYear}-${currentMonth + 1}-${dayNum}`; // Key format: YYYY-M-D
                let checkD = await checkDate(dateKey);
                //console.log(checkD);
                let code = checkD.code;
                // --- KEY LOGIC: Disabling Previous Days ---
                if (dateToCheck < today) {
                    dayCell.classList.add('past-day');
                } else {
                    // Day is today or in the future
                    dayCell.onclick = () => openModal(dateKey);

                    // Highlight today
                    if (dateToCheck.getTime() === today.getTime()) {
                        dayCell.classList.add('today');
                    }

                    // Highlight if a reason already exists
                    if (code == 400) {
                        dayCell.classList.add('unavailable-day');
                    }
                }

                grid.appendChild(dayCell);
            }
        }

        // --- Modal and Input Functions ---

        // Opens the popup for the selected day
        function openModal(dateKey) {
            selectedDateKey = dateKey;
            const [year, month, day] = dateKey.split('-');

            document.getElementById('selected-date-display').textContent =
                `${monthNames[parseInt(month) - 1]} ${day}, ${year}`;

            // Pre-fill if a reason already exists
            const data = JSON.parse(localStorage.getItem(UNAVAILABILITY_KEY) || '{}');
            document.getElementById('reason-input').value = data[selectedDateKey] || '';
            localStorage.setItem("selecteddate", dateKey);
            document.getElementById('modal').classList.remove('hidden');
        }

        // Closes the popup
        function closeModal() {
            document.getElementById('modal').classList.add('hidden');
            document.getElementById('reason-input').value = '';
            selectedDateKey = null;
        }

        function clearAndSaveUnavailability() {
            twal.ask({
                text: "Would you available on that day?"
            }).then((result) => {
                if (result.confirm) {
                    tyrax.post({
                        url: "unavailable/delete",
                        request: {
                            photo_id: localStorage.getItem("id"),
                            add_date: localStorage.getItem("selecteddate"),
                        },
                        response: function(send) {
                            if (send.code == 200) {
                                twal.ok({
                                    text: "You are available on that day!"
                                }).then(() => location.reload());
                            }
                        }
                    })
                }
            });

        }

        // Saves the unavailability reason to localStorage
        function saveUnavailability() {
            if (!selectedDateKey) return;

            const reason = document.getElementById('reason-input').value.trim();
            const data = JSON.parse(localStorage.getItem(UNAVAILABILITY_KEY) || '{}');


            // ...



            if (reason) {

                tyrax.post({
                    //inspect:true,
                    url: "unavailable/add",
                    request: {
                        photo_id: localStorage.getItem("id"),
                        add_date: localStorage.getItem("selecteddate"),
                        reason: reason
                    },
                    wait: LOADING.load(true),
                    done: LOADING.load(false),
                    response: function(send) {
                        if (send.code == 404) {
                            twal.err({
                                text: send.message
                            });
                        } else if (send.code == 200) {
                            twal.ok({
                                text: send.message
                            }).then(() => location.reload());
                        } else if (send.code == 101) {
                            twal.err({
                                text: send.message
                            });
                        }
                    }
                })

                // If there is text, save the reason
                data[selectedDateKey] = reason;
            } else {
                // 🎉 If the text area is empty, DELETE the entry from the stored data
                delete data[selectedDateKey];
            }

            //localStorage.setItem(UNAVAILABILITY_KEY, JSON.stringify(data));

            closeModal();
            renderCalendar(); // Refresh the calendar to update the highlighted days
        }
    </script>

</body>

</html>


<style>
    /* NEW: Calendar Title Section */
    .calendar-title {
        text-align: center;
        margin-bottom: 30px;
        padding: 20px;
    }

    .calendar-title h1 {
        font-size: 2.5em;
        font-weight: 700;
        background: linear-gradient(135deg, #ff4444 0%, #cc0000 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        margin-bottom: 10px;
        text-shadow: 0 4px 6px rgba(255, 68, 68, 0.3);
    }

    .calendar-title p {
        font-size: 1.1em;
        color: #666;
        font-weight: 300;
    }

    /* Enhanced Calendar Container */
    .calendar-container {
        max-width: 1200px;
        margin: 40px auto;
        padding: 30px;
        border-radius: 16px;
        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.15);
        background-color: #ffffff;
        font-family: Arial, sans-serif;
        border: 2px solid #ff4444;
    }

    .calendar-header {
        display: flex;
        justify-content: center;
        gap: 20px;
        margin-bottom: 30px;
        padding-bottom: 20px;
        border-bottom: 2px solid #ff4444;
    }

    .control-select {
        padding: 12px 20px;
        font-size: 1.1em;
        border: 2px solid #000;
        border-radius: 8px;
        background: #fff;
        color: #000;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .control-select:hover {
        border-color: #ff4444;
        background: #fff5f5;
    }

    .control-select:focus {
        outline: none;
        border-color: #ff4444;
        box-shadow: 0 0 0 3px rgba(255, 68, 68, 0.2);
    }

    /* --- Calendar Grid Styles --- */

    .weekdays-grid,
    .days-grid {
        display: grid;
        grid-template-columns: repeat(7, 1fr);
        gap: 8px;
        text-align: center;
    }

    .weekdays-grid {
        margin-bottom: 15px;
    }

    .weekdays-grid span {
        padding: 15px 5px;
        font-weight: 700;
        font-size: 1em;
        color: #fff;
        background: #000;
        border-radius: 8px;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    .day {
        padding: 25px 5px;
        border: 2px solid #e0e0e0;
        border-radius: 10px;
        cursor: pointer;
        font-size: 1.1em;
        font-weight: 600;
        transition: all 0.3s ease;
        background: #fff;
        color: #000;
        position: relative;
        overflow: hidden;
    }

    .day::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 68, 68, 0.2), transparent);
        transition: left 0.5s ease;
    }

    .day:hover:not(.past-day)::before {
        left: 100%;
    }

    .day:hover:not(.past-day) {
        border-color: #ff4444;
        transform: translateY(-3px);
        box-shadow: 0 8px 16px rgba(255, 68, 68, 0.3);
        background: #fff5f5;
    }

    /* --- Day States (Crucial Logic Styling) --- */

    /* 1. Unclickable/Past Days */
    .past-day {
        background: #f5f5f5;
        color: #999;
        cursor: not-allowed;
        pointer-events: none;
        border-color: #e0e0e0;
    }

    /* 2. Today (optional, but helpful) */
    .today {
        border: 3px solid #ff4444;
        background: linear-gradient(135deg, #fff 0%, #ffebeb 100%);
        font-weight: 700;
        box-shadow: 0 4px 12px rgba(255, 68, 68, 0.4);
    }

    /* 3. Unavailable/Blocked Days */
    .unavailable-day {
        background: linear-gradient(135deg, #ff4444 0%, #cc0000 100%);
        color: #fff;
        font-weight: 700;
        border-color: #cc0000;
        box-shadow: 0 4px 12px rgba(255, 68, 68, 0.4);
    }

    .unavailable-day:hover:not(.past-day) {
        background: linear-gradient(135deg, #ff6666 0%, #dd0000 100%);
        transform: translateY(-3px);
        box-shadow: 0 8px 20px rgba(255, 68, 68, 0.5);
    }


    /* --- Modal (Popup) Styles --- */

    .modal-overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.8);
        display: flex;
        justify-content: center;
        align-items: center;
        z-index: 1000;
        backdrop-filter: blur(5px);
    }

    .modal-content {
        background: #fff;
        padding: 35px;
        border-radius: 16px;
        width: 90%;
        max-width: 450px;
        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.5);
        border: 3px solid #ff4444;
        animation: modalSlideIn 0.3s ease;
    }

    @keyframes modalSlideIn {
        from {
            transform: translateY(-50px);
            opacity: 0;
        }
        to {
            transform: translateY(0);
            opacity: 1;
        }
    }

    .modal-content h3 {
        margin: 0 0 20px 0;
        color: #000;
        font-size: 1.8em;
        font-weight: 700;
        padding-bottom: 15px;
        border-bottom: 3px solid #ff4444;
    }

    .modal-date {
        font-weight: 700;
        color: #ff4444;
        margin-bottom: 20px;
        font-size: 1.2em;
    }

    #reason-input {
        width: 100%;
        height: 120px;
        padding: 15px;
        margin-bottom: 25px;
        border: 2px solid #000;
        border-radius: 10px;
        resize: vertical;
        font-size: 1em;
        font-family: inherit;
        transition: all 0.3s ease;
        box-sizing: border-box;
    }

    #reason-input:focus {
        outline: none;
        border-color: #ff4444;
        box-shadow: 0 0 0 3px rgba(255, 68, 68, 0.2);
    }

    .modal-actions {
        display: flex;
        justify-content: flex-end;
        gap: 12px;
        flex-wrap: wrap;
    }

    .btn-save,
    .btn-cancel,
    .btn-clear {
        padding: 12px 24px;
        border: none;
        border-radius: 8px;
        cursor: pointer;
        font-weight: 700;
        font-size: 1em;
        transition: all 0.3s ease;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .btn-save {
        background: linear-gradient(135deg, #ff4444 0%, #cc0000 100%);
        color: #fff;
        border: 2px solid #cc0000;
    }

    .btn-save:hover {
        background: linear-gradient(135deg, #ff6666 0%, #dd0000 100%);
        transform: translateY(-2px);
        box-shadow: 0 6px 16px rgba(255, 68, 68, 0.4);
    }

    .btn-cancel {
        background: #000;
        color: #fff;
        border: 2px solid #000;
    }

    .btn-cancel:hover {
        background: #333;
        transform: translateY(-2px);
        box-shadow: 0 6px 16px rgba(0, 0, 0, 0.4);
    }

    .btn-clear {
        background: transparent;
        color: #ff4444;
        border: 2px solid #ff4444;
    }

    .btn-clear:hover {
        background: #ff4444;
        color: #fff;
        transform: translateY(-2px);
        box-shadow: 0 6px 16px rgba(255, 68, 68, 0.4);
    }

    /* Utility to hide the modal */
    .hidden {
        display: none;
    }

    @media (max-width: 768px) {
        .calendar-title h1 {
            font-size: 2em;
        }

        .calendar-container {
            padding: 20px;
        }

        .day {
            padding: 20px 5px;
            font-size: 1em;
        }

        .modal-actions {
            flex-direction: column;
        }

        .btn-save,
        .btn-cancel,
        .btn-clear {
            width: 100%;
        }
    }
</style>