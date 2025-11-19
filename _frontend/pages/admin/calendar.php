<!DOCTYPE html>
<html lang="en">

<?=include_page('header')?>

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
        <?=include_page('sidebar')?>
        <!-- Sidebar End -->

        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            <?=include_page('navbar')?>
            <!-- Navbar End -->

            <!-- Calendar Page Content Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-white rounded p-4 shadow-sm">

                    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-4">
                        <h1 class="mb-3 mb-md-0" style="font-size: 2rem; font-weight: 300;">Calendar Event</h1>
                        <div class="d-flex flex-wrap align-items-center">
                            <button class="btn btn-sm btn-outline-secondary me-2">Block Off Time</button>
                            <button class="btn btn-sm text-white px-3 me-3" style="background-color: red; border-color: black;">Calendar Sync</button>
                            <button class="btn btn-sm btn-outline-secondary">
                                <i class="bi bi-filter me-1"></i>Filter
                            </button>
                        </div>
                    </div>

                    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-3">
                        <div class="d-flex align-items-center mb-2 mb-md-0">
                            <button id="prevMonthBtn" class="btn btn-link text-secondary p-1 me-2"><i class="bi bi-chevron-left"></i></button>
                            <button id="todayBtn" class="btn btn-sm btn-outline-secondary me-2">Today</button>
                            <button id="nextMonthBtn" class="btn btn-link text-secondary p-1 me-2"><i class="bi bi-chevron-right"></i></button>
                            <h5 id="currentMonthYear" class="mb-0 fw-bold">May 2025</h5>
                        </div>
                        <div class="btn-group btn-group-sm" role="group" aria-label="Calendar View">
                            <input type="radio" class="btn-check" name="calendarView" id="dayViewBtn" autocomplete="off" data-view="day">
                            <label class="btn btn-outline-secondary" for="dayViewBtn">DAY</label>

                            <input type="radio" class="btn-check" name="calendarView" id="weekViewBtn" autocomplete="off" data-view="week">
                            <label class="btn btn-outline-secondary" for="weekViewBtn">WEEK</label>

                            <input type="radio" class="btn-check" name="calendarView" id="monthViewBtn" autocomplete="off" data-view="month" checked>
                            <label class="btn btn-outline-secondary active" for="monthViewBtn">MONTH</label>
                        </div>
                    </div>

                    <div id="calendarContainer">
                        <!-- Month View (default) -->
                        <div id="monthViewContainer" class="table-responsive">
                            <table class="table table-bordered calendar-table">
                                <thead id="calendarHead">
                                    <tr class="text-center text-uppercase" style="font-size: 0.75rem; color: #6c757d; font-weight: 600;">
                                        <th style="width: 14.28%;">Sun</th>
                                        <th style="width: 14.28%;">Mon</th>
                                        <th style="width: 14.28%;">Tue</th>
                                        <th style="width: 14.28%;">Wed</th>
                                        <th style="width: 14.28%;">Thu</th>
                                        <th style="width: 14.28%;">Fri</th>
                                        <th style="width: 14.28%;">Sat</th>
                                    </tr>
                                </thead>
                                <tbody id="calendarBody">
                                    <!-- Calendar days will be generated here by JavaScript -->
                                </tbody>
                            </table>
                        </div>
                        <!-- Day View (hidden by default) -->
                        <div id="dayViewContainer" style="display: none;">
                            <p>Day View Content Here</p>
                        </div>
                        <!-- Week View (hidden by default) -->
                        <div id="weekViewContainer" style="display: none;">
                            <p>Week View Content Here</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Calendar Page Content End -->

            <!-- Hidden Popover Template -->
            <div id="eventPopoverTemplate" class="calendar-popover shadow-lg" style="display: none; position: absolute;">
                <div class="d-flex justify-content-between align-items-start mb-2">
                    <div>
                        <h6 class="mb-0 fw-bold" data-popover="title">Event Title</h6>
                        <small class="text-muted" data-popover="type">Event Type</small>
                    </div>
                    <button type="button" class="btn-close btn-sm" data-popover="close" aria-label="Close"></button>
                </div>
                <div class="mb-1"><i class="bi bi-calendar-event me-2 text-muted"></i><span data-popover="date">Date</span></div>
                <div class="mb-2"><i class="bi bi-clock me-2 text-muted"></i><span data-popover="time">Time</span></div>
                <div class="mb-3"><i class="bi bi-person me-2 text-muted"></i><span data-popover="client">Client</span></div>
                <div class="d-flex justify-content-between align-items-center">
                    <span class="badge" data-popover="status">STATUS</span>
                    <button class="btn btn-sm text-white" style="background-color: #17a2b8;" data-popover="view-session">View Session</button>
                </div>
            </div>
            <!-- End Hidden Popover Template -->

            <style>
                /* MINIMAL CSS - Move to external file */
                .calendar-table td {
                    height: 100px; /* Adjust for content */
                    vertical-align: top;
                    padding: 0.5rem;
                    position: relative; /* For event positioning */
                }
                .calendar-table .date-number {
                    text-align: right;
                    font-size: 0.85rem;
                    color: #6c757d;
                    margin-bottom: 0.25rem;
                }
                .calendar-table td.other-month .date-number { color: #adb5bd; }
                .calendar-table td.current-day .date-number {
                    font-weight: bold;
                    color: #0d6efd; /* Bootstrap primary blue */
                    border: 1px solid #0d6efd;
                    border-radius: 50%;
                    width: 28px;
                    height: 28px;
                    display: inline-flex;
                    align-items: center;
                    justify-content: center;
                    float: right;
                }

                .calendar-event-indicator {
                    font-size: 0.7rem;
                    padding: 0.15rem 0.3rem;
                    border-radius: 0.2rem;
                    margin-top: 0.2rem;
                    background-color: #f8d7da;
                    color: #721c24;
                    white-space: nowrap;
                    overflow: hidden;
                    text-overflow: ellipsis;
                    cursor: pointer;
                    display: block; /* Make events stack */
                }
                .calendar-event-indicator .event-dot {
                    display: inline-block;
                    width: 6px;
                    height: 6px;
                    border-radius: 50%;
                    margin-right: 3px;
                    vertical-align: middle;
                }
                .calendar-popover {
                    width: 300px;
                    background-color: white;
                    border: 1px solid #dee2e6;
                    border-radius: 0.25rem;
                    padding: 1rem;
                    z-index: 1050; /* Ensure it's above other elements */
                    font-size: 0.875rem;
                }
                .calendar-popover h6 { font-size: 1rem; }
                .session-status-confirmed-cal {
                    background-color: #d4edda; color: #155724;
                    font-weight: 500; padding: 0.3em 0.6em; font-size: 0.75rem; border-radius: 0.2rem;
                }
                .session-status-pending-cal {
                    background-color: #fff3cd; color: #856404; /* Example for pending */
                    font-weight: 500; padding: 0.3em 0.6em; font-size: 0.75rem; border-radius: 0.2rem;
                }
                 .btn-check+.btn.active {
                    background-color: #6c757d; border-color: #6c757d; color: white;
                }
                .table-bordered>:not(caption)>*>* { border-width: 0 1px 1px 0; }
                .table-bordered>:not(caption)>*>:first-child { border-left-width: 1px; }
                .table-bordered thead tr:first-child th { border-top-width: 1px; }
            </style>
            
        </div>
        <!-- Content End -->

        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Moment.js can be helpful for date manipulations, but we'll use native Date for simplicity here -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script> -->
    <script src="<?=assets()?>/lib/chart/chart.min.js"></script>
    <script src="<?=assets()?>/lib/easing/easing.min.js"></script>
    <script src="<?=assets()?>/lib/waypoints/waypoints.min.js"></script>
    <script src="<?=assets()?>/lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="<?=assets()?>/lib/tempusdominus/js/moment.min.js"></script>
    <script src="<?=assets()?>/lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="<?=assets()?>/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="<?=assets()?>/js/main.js"></script>

    <!-- Custom Calendar JavaScript -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const calendarBody = document.getElementById('calendarBody');
            const currentMonthYearEl = document.getElementById('currentMonthYear');
            const prevMonthBtn = document.getElementById('prevMonthBtn');
            const nextMonthBtn = document.getElementById('nextMonthBtn');
            const todayBtn = document.getElementById('todayBtn');
            const popoverTemplate = document.getElementById('eventPopoverTemplate');
            let activePopover = null;

            let currentDate = new Date(); // Starts with current date

            // --- Sample Event Data ---
            // In a real app, this would come from a database/API
            const events = [
                {
                    id: 1, date: '2025-05-19', startTime: '12:00 PM', endTime: '12:30 PM',
                    title: "angel's Family Session", type: 'Family', client: 'mia ackerman', status: 'CONFIRMED'
                },
                {
                    id: 2, date: '2025-05-23', startTime: '12:00 PM', endTime: '01:00 PM',
                    title: "levi's Family Session", type: 'Family', client: 'levi ackerman', status: 'CONFIRMED'
                },
                {
                    id: 3, date: '2025-05-30', startTime: '01:30 PM', endTime: '02:00 PM',
                    title: "meow's Family Session", type: 'Family', client: 'meow meow', status: 'CONFIRMED'
                },
                {
                    id: 4, date: '2025-06-10', startTime: '10:00 AM', endTime: '11:00 AM',
                    title: "Project Alpha Meeting", type: 'Meeting', client: 'John Doe', status: 'PENDING'
                }
            ];

            function renderCalendar(year, month) {
                calendarBody.innerHTML = ''; // Clear previous month
                currentMonthYearEl.textContent = `${new Date(year, month).toLocaleString('default', { month: 'long' })} ${year}`;

                const firstDayOfMonth = new Date(year, month, 1).getDay(); // 0 (Sun) - 6 (Sat)
                const daysInMonth = new Date(year, month + 1, 0).getDate();
                
                let date = 1;
                for (let i = 0; i < 6; i++) { // Max 6 weeks
                    const row = document.createElement('tr');
                    for (let j = 0; j < 7; j++) {
                        const cell = document.createElement('td');
                        if (i === 0 && j < firstDayOfMonth) {
                            // Empty cells before the first day
                            cell.classList.add('other-month');
                            // Optionally, fill with previous month's days
                        } else if (date > daysInMonth) {
                            // Empty cells after the last day
                            cell.classList.add('other-month');
                            // Optionally, fill with next month's days
                        } else {
                            const cellDate = new Date(year, month, date);
                            const dateNumberDiv = document.createElement('div');
                            dateNumberDiv.classList.add('date-number');
                            dateNumberDiv.textContent = date;
                            cell.appendChild(dateNumberDiv);
                            cell.dataset.date = `${year}-${String(month + 1).padStart(2, '0')}-${String(date).padStart(2, '0')}`;

                            const today = new Date();
                            if (date === today.getDate() && year === today.getFullYear() && month === today.getMonth()) {
                                cell.classList.add('current-day');
                            }

                            // Render events for this date
                            const dayEvents = events.filter(event => event.date === cell.dataset.date);
                            dayEvents.forEach(eventData => {
                                const eventDiv = document.createElement('div');
                                eventDiv.classList.add('calendar-event-indicator');
                                eventDiv.innerHTML = `<span class="event-dot" style="background-color: #dc3545;"></span> ${eventData.title.substring(0,15)}${eventData.title.length > 15 ? '...' : ''}`;
                                eventDiv.dataset.eventId = eventData.id;
                                eventDiv.addEventListener('click', (e) => {
                                    e.stopPropagation(); // Prevent cell click if any
                                    showPopover(eventData, eventDiv);
                                });
                                cell.appendChild(eventDiv);
                            });
                            date++;
                        }
                        row.appendChild(cell);
                    }
                    calendarBody.appendChild(row);
                    if (date > daysInMonth && i >=3) break; // Optimization: if all days rendered, break
                }
            }

            function showPopover(eventData, targetElement) {
                if (activePopover) {
                    activePopover.remove();
                }
                activePopover = popoverTemplate.cloneNode(true);
                activePopover.removeAttribute('id'); // Avoid duplicate IDs
                activePopover.style.display = 'block';

                activePopover.querySelector('[data-popover="title"]').textContent = eventData.title;
                activePopover.querySelector('[data-popover="type"]').textContent = eventData.type;
                const eventFullDate = new Date(eventData.date + 'T00:00:00'); // Ensure correct local date parsing
                activePopover.querySelector('[data-popover="date"]').textContent = eventFullDate.toLocaleDateString('en-US', { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' });
                activePopover.querySelector('[data-popover="time"]').textContent = `${eventData.startTime} - ${eventData.endTime}`;
                activePopover.querySelector('[data-popover="client"]').textContent = eventData.client;
                
                const statusEl = activePopover.querySelector('[data-popover="status"]');
                statusEl.textContent = eventData.status;
                statusEl.className = 'badge'; // Reset class
                if (eventData.status === 'CONFIRMED') {
                    statusEl.classList.add('session-status-confirmed-cal');
                } else if (eventData.status === 'PENDING') {
                    statusEl.classList.add('session-status-pending-cal'); // Add more as needed
                }


                activePopover.querySelector('[data-popover="close"]').addEventListener('click', hidePopover);
                // activePopover.querySelector('[data-popover="view-session"]').addEventListener('click', () => { /* Navigate to session page */ });
                
                document.body.appendChild(activePopover); // Append to body for correct positioning context

                // Position popover (simple example, might need a library for complex scenarios)
                const rect = targetElement.getBoundingClientRect();
                let top = rect.bottom + window.scrollY + 5;
                let left = rect.left + window.scrollX;

                // Adjust if popover goes off-screen
                if (left + activePopover.offsetWidth > window.innerWidth) {
                    left = window.innerWidth - activePopover.offsetWidth - 10;
                }
                if (top + activePopover.offsetHeight > window.innerHeight + window.scrollY) {
                     top = rect.top + window.scrollY - activePopover.offsetHeight - 5;
                }
                 if (left < 0) left = 10;
                 if (top < 0) top = 10;


                activePopover.style.top = `${top}px`;
                activePopover.style.left = `${left}px`;
            }

            function hidePopover() {
                if (activePopover) {
                    activePopover.remove();
                    activePopover = null;
                }
            }

            // Event Listeners for navigation
            prevMonthBtn.addEventListener('click', () => {
                currentDate.setMonth(currentDate.getMonth() - 1);
                renderCalendar(currentDate.getFullYear(), currentDate.getMonth());
                hidePopover();
            });

            nextMonthBtn.addEventListener('click', () => {
                currentDate.setMonth(currentDate.getMonth() + 1);
                renderCalendar(currentDate.getFullYear(), currentDate.getMonth());
                hidePopover();
            });

            todayBtn.addEventListener('click', () => {
                currentDate = new Date();
                renderCalendar(currentDate.getFullYear(), currentDate.getMonth());
                hidePopover();
            });

            // Close popover if clicked outside
            document.addEventListener('click', function (event) {
                if (activePopover && !activePopover.contains(event.target) && !event.target.closest('.calendar-event-indicator')) {
                    hidePopover();
                }
            });

            // View Switching Logic (Basic - just shows/hides containers)
            const viewButtons = document.querySelectorAll('input[name="calendarView"]');
            const viewContainers = {
                month: document.getElementById('monthViewContainer'),
                day: document.getElementById('dayViewContainer'),
                week: document.getElementById('weekViewContainer')
            };

            viewButtons.forEach(button => {
                button.addEventListener('change', function() {
                    // Deactivate all labels first
                    document.querySelectorAll('label[for^="dayViewBtn"], label[for^="weekViewBtn"], label[for^="monthViewBtn"]').forEach(lbl => lbl.classList.remove('active'));
                    // Activate current one
                    document.querySelector(`label[for="${this.id}"]`).classList.add('active');

                    for (const view in viewContainers) {
                        viewContainers[view].style.display = 'none';
                    }
                    const selectedView = this.dataset.view;
                    if (viewContainers[selectedView]) {
                        viewContainers[selectedView].style.display = 'block';
                        if (selectedView === 'month') {
                             renderCalendar(currentDate.getFullYear(), currentDate.getMonth()); // Re-render month if switched back
                        } else {
                            // TODO: Implement renderDayView() or renderWeekView()
                            console.log(`${selectedView} view selected. Implement rendering logic.`);
                             viewContainers[selectedView].innerHTML = `<p>Dynamic ${selectedView} view content to be implemented.</p>`;
                        }
                    }
                    hidePopover();
                });
            });


            // Initial Render
            renderCalendar(currentDate.getFullYear(), currentDate.getMonth());
        });
    </script>

</body>
</html>