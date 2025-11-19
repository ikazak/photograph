<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Videograph Template">
    <meta name="keywords" content="Videograph, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PPHOTOGRAPHY WEBSITE</title>

    <link href="https://fonts.googleapis.com/css2?family=Play:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="<?= assets() ?>/phograph/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="<?= assets() ?>/phograph/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="<?= assets() ?>/phograph/css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="<?= assets() ?>/phograph/css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="<?= assets() ?>/phograph/css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="<?= assets() ?>/phograph/css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="<?= assets() ?>/phograph/css/style.css" type="text/css">
</head>

<body>

    <form id="bookingForm" method="post">
        <div class="step" id="step1">
            <h2>Step 1: Choose Your Package</h2>
            <div class="package-options" id="packageparent">


            </div>
            <a href="<?= page('users/home.php') ?>"><button type="button" class="prev-step">Back</button></a>
            <button type="button" class="next-step" disabled id="continueStep1">Continue</button>
        </div>


        <div>
            <div class="step hidden" id="step2">
                <h2>Step 2: Select a Photographer</h2>

                <div id="photographerCardRow" class="photographer-options">

                </div>

                <button type="button" class="prev-step">Back</button>
                <button type="button" class="next-step" disabled id="continueStep2">Continue</button>
            </div>
        </div>

        <div class="step hidden" id="step3">
            <h2>Step 3: Select Date & Time</h2>
            <div class="location-input-container">
                <label for="shootLocation" style="color: #A0A0A0; font-weight: bold;">Shoot Location:</label>
                <input type="text" id="shootLocation" name="shootLocation" placeholder="e.g., Central Park, New York" required>
            </div>
            <div class="calendar-card">
                <div class="calendar-header">
                    <select id="month-select"></select>
                    <select id="year-select"></select>
                </div>
                <div class="calendar-grid-weekdays">
                    <div>Sun</div>
                    <div>Mon</div>
                    <div>Tue</div>
                    <div>Wed</div>
                    <div>Thu</div>
                    <div>Fri</div>
                    <div>Sat</div>
                </div>
                <div class="calendar-grid-days" id="calendar-days">
                </div>
            </div>

            <div class="time-select-container">
                <label for="shootTime" style="color: #A0A0A0; font-weight: bold;">Select start time: </label>
                <select id="shootTime" name="shootTime" required>
                    <option value="">Select a Time</option>
                    <option value="09:00">7:00 AM</option>
                    <option value="09:00">8:00 AM</option>
                    <option value="09:00">9:00 AM</option>
                    <option value="11:00">10:00 AM</option>
                    <option value="12:00">11:00 PM</option>
                    <option value="1:00">12:00 PM</option>
                    <option value="2:00">1:00 PM</option>
                    <option value="3:00">2:00 PM</option>
                    <option value="12:00">3:00 PM</option>
                    <option value="1:00">4:00 PM</option>
                    <option value="2:00">5:00 PM</option>
                    <option value="3:00">6:00 PM</option>
                    <option value="12:00">7:00 PM</option>
                    <option value="1:00">8:00 PM</option>
                    <option value="2:00">9:00 PM</option>
                    <option value="3:00">10:00 PM</option>
                </select>
            </div>

            <div class="time-select-container">
                <label for="shootTime" style="color: #A0A0A0; font-weight: bold;">Select end time: </label>
                <select id="shootTime" name="shootTime" required>
                    <option value="">Select a Time</option>
                    <option value="09:00">7:00 AM</option>
                    <option value="09:00">8:00 AM</option>
                    <option value="09:00">9:00 AM</option>
                    <option value="11:00">10:00 AM</option>
                    <option value="12:00">11:00 PM</option>
                    <option value="1:00">12:00 PM</option>
                    <option value="2:00">1:00 PM</option>
                    <option value="3:00">2:00 PM</option>
                    <option value="12:00">3:00 PM</option>
                    <option value="1:00">4:00 PM</option>
                    <option value="2:00">5:00 PM</option>
                    <option value="3:00">6:00 PM</option>
                    <option value="12:00">7:00 PM</option>
                    <option value="1:00">8:00 PM</option>
                    <option value="2:00">9:00 PM</option>
                    <option value="3:00">10:00 PM</option>
                </select>
            </div>
            <button type="button" class="prev-step">Back</button>
            <button type="button" class="next-step" disabled id="continueStep3">Continue</button>
        </div>

        <div class="step hidden" id="step4">
            <h2>Step 4: Review and Payment</h2>
            <div class="summary">
                <h3>Your Selection:</h3>
                <p><strong>Package:</strong> <span id="summary-package"></span></p>
                <p><strong>Photographer:</strong> <span id="summary-photographer"></span></p>
                <p><strong>Date & Time:</strong> <span id="summary-datetime"></span></p>
                <p><strong>Location:</strong> <span id="summary-location"></span></p>
                <p><strong>Final Price:</strong> <span id="summary-price"></span></p>
                <p><strong>Down Payment:</strong> <span id="summary-down-payment"></span></p>
                <button type="button" class="prev-step">Back</button>
                <button id="subtn" type="button">submit</button>
            </div>

            <!--<div class="payment-details">
                <h3>Payment Information</h3>
                <label for="phoneNumber">Enter Gcash Number:</label>
                <input type="tel" id="phoneNumber" name="phoneNumber">
                <label for="phoneNumber">Down Payment:</label>
                <input type="number" name="amount" id="amount">
                <button type="button" onclick="sendOtp()" style="background-color:green;">Send OTP</button>
                <input type="text" id="otp" name="otp" placeholder="Enter OTP">
                <label for="adminName">Sender Name:</label>
                <input type="text" id="adminName" name="adminName" readonly>
            </div>
            <button type="button" class="prev-step">Back</button>
            <button type="submit" id="submitForm">Confirm & Pay</button>
            -->
        </div>

    </form>
    

    <?= import_packages("datatable", "tyrax", "loading", "ctr", "path", "twal") ?>

    <script>
        addEventListener("DOMContentLoaded", () => {
            LOADING.load(true);

            setTimeout(() => LOADING.load(false), 1000)

        })
    </script>

    <script>
        let selected = {};
    </script>
    <script>

       addEventListener("DOMContentLoaded", ()=>{
        subtn.addEventListener("click",()=> {submitOrder()})
         function submitOrder() {

            tyrax.post({

                url: "orders/add",
                data: selected,
                response: (send) => {
                    if (send.code == 200) {
                        twal.ok("sumited successfuly").then(() => location.href = "?page=users/home")
                    } else {
                        twal.err(send.message);
                    }
                }
            })


        }
       })
    </script>



    <script>

    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const steps = document.querySelectorAll('.step');
            const prevButtons = document.querySelectorAll('.prev-step');
            let currentStep = 0;


            const calendarDays = document.getElementById('calendar-days');
            const monthSelect = document.getElementById('month-select');
            const yearSelect = document.getElementById('year-select');
            const shootLocationInput = document.getElementById('shootLocation');
            const shootTimeSelect = document.getElementById('shootTime');
            const continueStep1Btn = document.getElementById('continueStep1');
            const continueStep2Btn = document.getElementById('continueStep2');
            const continueStep3Btn = document.getElementById('continueStep3');

            let currentDate = new Date();
            let selectedDate = null;

            // Helper function to check step 3 validation and enable the button
            function checkStep3Inputs() {
                if (selectedDate && shootTimeSelect.value && shootLocationInput.value) {
                    continueStep3Btn.disabled = false;
                } else {
                    continueStep3Btn.disabled = true;
                }
            }

            // Helper function to disable validation on all fields within a step
            function disableStepValidation(stepElement) {
                const fields = stepElement.querySelectorAll('input, select');
                fields.forEach(field => {
                    if (field.hasAttribute('required')) {
                        field.dataset.required = 'true';
                        field.removeAttribute('required');
                    }
                });
            }

            // Helper function to re-enable validation on all fields within a step
            function enableStepValidation(stepElement) {
                const fields = stepElement.querySelectorAll('input, select');
                fields.forEach(field => {
                    if (field.dataset.required) {
                        field.setAttribute('required', 'required');
                        field.removeAttribute('data-required');
                    }
                });
            }

            // Function to populate the dropdowns
            function populateDropdowns() {
                monthSelect.innerHTML = '';
                const months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
                months.forEach((month, index) => {
                    const option = document.createElement('option');
                    option.value = index;
                    option.textContent = month;
                    monthSelect.appendChild(option);
                });

                yearSelect.innerHTML = '';
                const currentYear = new Date().getFullYear();
                for (let i = currentYear; i <= currentYear + 5; i++) {
                    const option = document.createElement('option');
                    option.value = i;
                    option.textContent = i;
                    yearSelect.appendChild(option);
                }
            }

            // Function to render the main calendar view
            function renderCalendar() {
                const year = currentDate.getFullYear();
                const month = currentDate.getMonth();

                monthSelect.value = month;
                yearSelect.value = year;

                const firstDayOfMonth = new Date(year, month, 1).getDay();
                const lastDayOfMonth = new Date(year, month + 1, 0).getDate();

                calendarDays.innerHTML = '';

                for (let i = 0; i < firstDayOfMonth; i++) {
                    const dayDiv = document.createElement('div');
                    dayDiv.classList.add('day', 'other-month');
                    calendarDays.appendChild(dayDiv);
                }

                for (let i = 1; i <= lastDayOfMonth; i++) {
                    const dayDiv = document.createElement('div');
                    dayDiv.classList.add('day');
                    dayDiv.textContent = i;
                    dayDiv.dataset.date = `${year}-${(month + 1).toString().padStart(2, '0')}-${i.toString().padStart(2, '0')}`;

                    const today = new Date();
                    const currentDay = new Date(year, month, i);
                    currentDay.setHours(0, 0, 0, 0);
                    today.setHours(0, 0, 0, 0);

                    if (currentDay.getTime() < today.getTime()) {
                        dayDiv.classList.add('past-day');
                        dayDiv.classList.add('other-month');
                        dayDiv.style.cursor = 'not-allowed';
                    } else {
                        dayDiv.classList.add('future-day');
                        dayDiv.addEventListener('click', () => {
                            document.querySelectorAll('.day').forEach(d => d.classList.remove('selected'));
                            dayDiv.classList.add('selected');
                            selectedDate = dayDiv.dataset.date;
                            checkStep3Inputs();
                        });
                    }

                    if (currentDay.getTime() === today.getTime()) {
                        dayDiv.classList.add('today');
                    }

                    calendarDays.appendChild(dayDiv);
                }
            }

            // Event listeners for dropdowns
            monthSelect.addEventListener('change', (e) => {
                currentDate.setMonth(parseInt(e.target.value));
                renderCalendar();
            });

            yearSelect.addEventListener('change', (e) => {
                currentDate.setFullYear(parseInt(e.target.value));
                renderCalendar();
            });

            // Event listeners for Step 3 inputs to enable/disable the button
            shootLocationInput.addEventListener('input', checkStep3Inputs);
            shootTimeSelect.addEventListener('change', checkStep3Inputs);

            // Step 1: Handle package selection and button state

            document.querySelectorAll('.package').forEach(packageDiv => {
                packageDiv.addEventListener('click', () => {
                    document.querySelectorAll('.package').forEach(p => p.classList.remove('selected'));
                    packageDiv.classList.add('selected');
                    continueStep1.disabled = false;
                });
            });

            // Step 2: Handle photographer selection and button state
            const photographerOptions = document.querySelector('.photographer-options');
            photographerOptions.addEventListener('change', () => {
                const selectedPhotographer = document.querySelector('input[name="photographer"]:checked');
                if (selectedPhotographer) {
                    selected['phname'] = selectedPhotographer.value;
                    selected['phid'] = selectedPhotographer.getAttribute("pid");
                    console.log(selected);
                    continueStep2Btn.disabled = false;
                } else {
                    continueStep2Btn.disabled = true;
                }
            });

            // Handle step navigation with disabled button check
            const nextButtons = [continueStep1Btn, continueStep2Btn, continueStep3Btn];
            nextButtons.forEach((button, index) => {
                button.addEventListener('click', (e) => {
                    if (e.target.disabled) {
                        return;
                    }
                    const currentStepElement = steps[currentStep];
                    const isValid = validateStep(currentStepElement);

                    if (!isValid) {
                        return;
                    }

                    currentStep++;
                    if(currentStep != 3){
                        showStep(currentStep);
                    }

                    if (currentStep == 1) {
                        displayAllphotographers();
                    }
                    

                    if (currentStep === 3) {
                        const selectedPackageElement = document.querySelector('.package.selected');
                        const selectedPhotographer = document.querySelector('input[name="photographer"]:checked');
                        const selectedTime = document.getElementById('shootTime').value;
                        const selectedLocation = document.getElementById('shootLocation').value;

                        const selectedPackageName = selectedPackageElement ? selectedPackageElement.querySelector('h3').textContent : 'Not Selected';
                        const selectedPrice = selectedPackageElement ? selectedPackageElement.querySelector('p:nth-of-type(2)').textContent.replace('Promo Price: ', '') : 'N/A';
                        const selectedDownPayment = selectedPackageElement ? selectedPackageElement.querySelector('p:nth-of-type(3)').textContent.replace('Down Payment: ', '') : 'N/A';

                        const selectedPhotographerName = selectedPhotographer ? selectedPhotographer.nextElementSibling.textContent : 'Not Selected';

                        document.getElementById('summary-package').textContent = selectedPackageName;
                        document.getElementById('summary-photographer').textContent = selected['phname'];
                        selected['date'] = selectedDate;
                        selected['time'] = selectedTime;

                        tyrax.post({
                            //inspect:true,
                            url: "unavailable/find",
                            request: {
                                photo_id: selected['phid'],
                                add_date: selected['date'],
                            },
                            wait: LOADING.load(true),
                            done: LOADING.load(false),
                            response: function(send) {
                                if (send.code == 200) {
                                    showStep(currentStep);
                                    document.getElementById('summary-datetime').textContent = `${selectedDate} at ${selectedTime}`;
                                    //amount.value = selected['packprice'];
                                    document.getElementById('summary-price').textContent = selectedPrice;
                                    document.getElementById('summary-down-payment').textContent = selectedDownPayment;

                                    let locationParagraph = document.getElementById('summary-location-p');
                                    if (!locationParagraph) {
                                        locationParagraph = document.createElement('p');
                                        locationParagraph.id = 'summary-location-p';
                                        //locationParagraph.innerHTML = `<strong>Location:</strong> <span id="summary-location"></span>`;
                                        document.querySelector('.summary').appendChild(locationParagraph);
                                    }
                                    selected['location'] = selectedLocation;
                                    selected['customer'] = localStorage.getItem("id");
                                    document.getElementById('summary-location').textContent = selectedLocation;
                                }
                                else{
                                    twal.err("The photographer isn't available on that date, Could you please choose a different day?");
                                    currentStep--;
                                }
                            }
                            
                        })
                    }
                });
            });

            prevButtons.forEach(button => {
                button.addEventListener('click', () => {
                    currentStep--;
                    showStep(currentStep);
                });
            });

            // Function to validate the current step
            function validateStep(stepElement) {
                const fields = stepElement.querySelectorAll('[required]');
                for (const field of fields) {
                    if (!field.checkValidity()) {
                        field.reportValidity();
                        return false;
                    }
                }
                return true;
            }

            // Function to show/hide steps
            function showStep(stepIndex) {
                steps.forEach((step, index) => {
                    if (index === stepIndex) {
                        step.classList.add('visible');
                        step.classList.remove('hidden');
                        enableStepValidation(step);
                    } else {
                        step.classList.remove('visible');
                        step.classList.add('hidden');
                        disableStepValidation(step);
                    }
                });
            }

            populateDropdowns();
            renderCalendar();
            showStep(currentStep);
        });
    </script>
</body>

</html>




<script>
    let basket = [];

    function attachPackageListeners() {
        const packageOptions = document.querySelectorAll('.package');
        packageOptions.forEach(packageDiv => {
            packageDiv.addEventListener('click', () => {
                // Remove 'selected' class from all packages
                document.querySelectorAll('.package').forEach(p => p.classList.remove('selected'));

                // Add 'selected' class to the clicked package
                packageDiv.classList.add('selected');

                $packname = packageDiv.getAttribute("packname");
                $packid = packageDiv.getAttribute("packid");
                $packprice = packageDiv.getAttribute("packprice");
                $packdp = packageDiv.getAttribute("packdp");
                selected['packname'] = $packname;
                selected['packid'] = $packid;
                selected['packprice'] = $packprice;
                selected['packdp'] = $packdp;

                // Enable the 'Continue' button for Step 1
                const continueStep1Btn = document.getElementById('continueStep1');
                console.log(continueStep1Btn);
                if (continueStep1Btn) {
                    continueStep1Btn.disabled = false;
                }
            });
        });
    }

    function displayAllphotographers(searchTerm = '') {
        //const $container = $('#photographerCardRow');
        //const $noServicesMessage = $('#noServicesMessage');

        tyrax.get({
            url: "admin/get",
            response: function(send) {
                if (send.code == 200) {
                    const data = send.data;
                    data.forEach(column => {
                        const imageSrc = column.img || "<?= assets('img/placeholder.png') ?>";
                        const name = column.name;
                        const lname = column.lname;
                        const skill = column.skill;
                        const status = column.status;
                        const user_id = column.user_id;
                        basket[user_id] = {
                            name: name,
                            lname: lname,
                            status: status,
                            skill: skill,
                            user_id: user_id
                        };

                        DOM.add_html("#photographerCardRow", `
                            <div >
                    <label class="photographer">
                        <input type="radio" name="photographer" pid="${user_id}" value="${name+" "+lname}" required>
                        <img src="${imageSrc}" alt="">
                        <h3>${name} ${lname}</h3>
                        <p><strong>Skills: ${skill}</strong> Portrait photography.</p>
                        <p><strong>Photographer Type: ${status} </strong> Senior Photographer</p>
                        <a class="btn_but" href="<?= page('tabs.php') ?>">View Works</a>
                    </label>

                    </div>
                `);


                    });

                }
            }
        })
    }

    window.addEventListener("DOMContentLoaded", function() {
        //displayAllphotographers();
    });
</script>

<script>
    let sid = "<?= get('id') ?>";
    let sname = "<?= get('sname') ?>";

    addEventListener("DOMContentLoaded", () => {
        read();
    });

    function read() {
        const getid = "<?= get('id') ?>";
        tyrax.post({
            url: "package/get",
            catch: (err) => alert(err),
            request: {
                id: getid
            },
            response: function(send) {
                if (send.code == 200) {
                    const data = send.data;
                    data.forEach(column => {
                        DOM.add_html("#packageparent", `<div class="package" packid ="${column.id}" packname="${column.package_name}" packprice="${column.price}" packdp="${column.downpayment}" data-package="basic-shoot">
                            <div>
                    <h3>${column.package_name}</h3>
                    <p class="regular-price"><strong>Original Price: ₱${column.original}</strong></p>
                    <p><strong>Promo Price: ₱${column.price}</strong></p>
                    <p><strong>Down Payment: ₱${column.downpayment}</strong></p>
                    <p style="color:red;"><strong>Inclusions:</strong>${column.description}</p>
                    </div>
                    </div>  `);
                    });
                    attachPackageListeners();
                }
            }
        })
    }
</script>
<style>
    /* === General Page Styling === */
    body {
        font-family: "Segoe UI", Roboto, Arial, sans-serif;
        background-color: #ffffff; /* White background */
        color: #000000; /* Black text */
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
        margin: 0;
    }

    #bookingForm {
        background: #ffffff;
        border: 2px solid #ff0000; /* Red border */
        border-radius: 16px;
        padding: 40px;
        width: 90%;
        max-width: 800px;
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
        position: relative;
        height: 600px;
        overflow: hidden;
    }

    h2 {
        text-align: center;
        color: #000000;
        margin-bottom: 30px;
        font-size: 1.8em;
        font-weight: bold;
    }

    /* === Step Sections === */
    .step {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        padding: 40px;
        box-sizing: border-box;
        transition: transform 0.6s ease;
        overflow-y: auto;
    }

    .step.hidden {
        transform: translateY(100%);
    }

    .step.visible {
        transform: translateY(0);
    }

    /* === Buttons === */
    button {
        background-color: #e60000; /* Bright red */
        color: #ffffff;
        border: none;
        padding: 12px 25px;
        border-radius: 8px;
        font-weight: bold;
        cursor: pointer;
        margin-top: 20px;
        transition: background-color 0.3s ease;
    }

    button:hover {
        background-color: #cc0000; /* Darker red on hover */
    }

    button.prev-step {
        background-color: #555555;
    }

    button.prev-step:hover {
        background-color: #333333;
    }

    button:disabled {
        background-color: #aaaaaa;
        color: #ffffff;
        cursor: not-allowed;
        opacity: 0.6;
    }

    /* === Card Layouts (Packages, Photographers, Summary, Calendar) === */
    .package-options,
    .photographer-options {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 30px;
    }

    .package,
    .photographer,
    .summary,
    .calendar-card {
        background-color: #ffffff;
        border: 2px solid #ff0000; /* Red border */
        border-radius: 12px;
        padding: 20px;
        text-align: center;
        transition: transform 0.3s ease, box-shadow 0.3s ease, border-color 0.3s ease;
        color: #000000;
    }

    .package:hover,
    .photographer:hover,
    .package.selected,
    .photographer.selected {
        transform: translateY(-6px);
        box-shadow: 0 8px 20px rgba(255, 0, 0, 0.2);
        border-color: #cc0000;
    }

    .package h3,
    .photographer h3 {
        color: #000000;
        font-size: 1.4em;
        margin-bottom: 10px;
    }

    .package p,
    .photographer p,
    .summary p {
        color: #111111;
        font-size: 1em;
    }

    .regular-price {
        text-decoration: line-through;
        color: #777;
    }

    /* === Inputs and Selects === */
    input,
    select {
        background-color: #ffffff;
        border: 2px solid #ff0000;
        color: #000000;
        padding: 12px;
        border-radius: 8px;
        width: 100%;
        margin-top: 5px;
        font-size: 1em;
        box-sizing: border-box;
        transition: border-color 0.3s ease;
    }

    input:focus,
    select:focus {
        border-color: #cc0000;
        outline: none;
    }

    /* === Calendar === */
    .calendar-card {
        margin-top: 20px;
    }

    .calendar-header {
        display: flex;
        justify-content: center;
        gap: 10px;
        margin-bottom: 15px;
    }

    .calendar-header select {
        background-color: #ffffff;
        color: #000000;
        border: 2px solid #ff0000;
        border-radius: 8px;
        padding: 8px 12px;
        cursor: pointer;
    }

    .calendar-grid-weekdays {
        display: grid;
        grid-template-columns: repeat(7, 1fr);
        text-align: center;
        font-weight: bold;
        color: #000000;
        margin-bottom: 10px;
    }

    .calendar-grid-days {
        display: grid;
        grid-template-columns: repeat(7, 1fr);
        gap: 8px;
    }

    .day {
        padding: 10px;
        border-radius: 8px;
        border: 1px solid #ff0000;
        color: #000000;
        cursor: pointer;
        transition: background-color 0.3s ease, transform 0.2s ease;
    }

    .day:hover {
        background-color: #ffe6e6;
        transform: scale(1.05);
    }

    .day.selected {
        background-color: #ff0000;
        color: #ffffff;
        font-weight: bold;
    }

    .day.past-day {
        color: #888888;
        border-color: #cccccc;
        cursor: not-allowed;
    }

    /* === Location Input === */
    .location-input-container label {
        color: #000000;
        font-weight: bold;
    }

    .location-input-container input {
        background-color: #ffffff;
        border: 2px solid #ff0000;
        color: #000000;
        border-radius: 8px;
    }

    .location-input-container input:focus {
        border-color: #cc0000;
        box-shadow: 0 0 5px rgba(255, 0, 0, 0.3);
    }

    /* === Links === */
    .btn_but {
        color: #ff0000;
        font-weight: bold;
        text-decoration: none;
        transition: color 0.3s ease;
    }

    .btn_but:hover {
        color: #cc0000;
        text-decoration: underline;
    }
</style>