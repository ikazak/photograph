<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Custom Photography Booking</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #ffffff;
            color: #1a1a1a;
            min-height: 100vh;
            padding: 20px;
        }

        .container {
            max-width: 900px;
            margin: 0 auto;
        }

        .floating-price {
            position: fixed;
            bottom: 30px;
            right: 30px;
            background: linear-gradient(135deg, #dc143c 0%, #a00 100%);
            color: white;
            padding: 20px 30px;
            border-radius: 15px;
            box-shadow: 0 8px 30px rgba(220, 20, 60, 0.4);
            z-index: 1000;
            min-width: 200px;
            animation: slideIn 0.5s ease;
        }

        @keyframes slideIn {
            from {
                transform: translateY(100px);
                opacity: 0;
            }

            to {
                transform: translateY(0);
                opacity: 1;
            }
        }

        .floating-price-label {
            font-size: 0.9em;
            opacity: 0.9;
            margin-bottom: 5px;
        }

        .floating-price-amount {
            font-size: 2em;
            font-weight: bold;
        }

        header {
            text-align: center;
            padding: 40px 0;
            border-bottom: 4px solid #dc143c;
            margin-bottom: 40px;
            background: linear-gradient(135deg, #1a1a1a 0%, #333 100%);
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
        }

        h1 {
            font-size: 2.8em;
            color: #dc143c;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
        }

        .subtitle {
            color: #fff;
            margin-top: 10px;
            font-size: 1.1em;
        }

        .progress-bar {
            display: flex;
            justify-content: space-between;
            margin-bottom: 40px;
            position: relative;
        }

        .progress-line {
            position: absolute;
            top: 20px;
            left: 0;
            right: 0;
            height: 4px;
            background: #e0e0e0;
            z-index: 0;
        }

        .progress-line-fill {
            height: 100%;
            background: #dc143c;
            width: 0%;
            transition: width 0.5s ease;
        }

        .progress-step {
            flex: 1;
            text-align: center;
            position: relative;
            z-index: 1;
        }

        .progress-circle {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: #e0e0e0;
            color: #666;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 10px;
            font-weight: bold;
            border: 3px solid #e0e0e0;
            transition: all 0.3s ease;
        }

        .progress-step.active .progress-circle {
            background: #dc143c;
            color: white;
            border-color: #dc143c;
            transform: scale(1.2);
        }

        .progress-step.completed .progress-circle {
            background: #1a1a1a;
            color: white;
            border-color: #1a1a1a;
        }

        .progress-label {
            font-size: 0.85em;
            color: #666;
            font-weight: 600;
        }

        .progress-step.active .progress-label {
            color: #dc143c;
            font-weight: bold;
        }

        .step-content {
            display: none;
        }

        .step-content.active {
            display: block;
            animation: fadeIn 0.5s ease;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .card {
            background: #ffffff;
            border: 2px solid #e0e0e0;
            border-radius: 15px;
            padding: 35px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
            margin-bottom: 20px;
        }

        .card h2 {
            color: #1a1a1a;
            margin-bottom: 25px;
            font-size: 1.8em;
            padding-bottom: 15px;
            border-bottom: 3px solid #dc143c;
        }

        .card p {
            margin-bottom: 20px;
        }

        .option-group {
            display: grid;
            gap: 15px;
        }

        .option-item {
            background: #f9f9f9;
            border: 2px solid #ddd;
            border-radius: 10px;
            padding: 18px;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .option-item:hover {
            border-color: #dc143c;
            background: #fff5f5;
            transform: translateX(5px);
        }

        .option-item.selected {
            border-color: #dc143c;
            background: #ffe0e6;
            box-shadow: 0 3px 10px rgba(220, 20, 60, 0.2);
        }

        .option-item input[type="radio"],
        .option-item input[type="checkbox"] {
            width: 22px;
            height: 22px;
            accent-color: #dc143c;
            cursor: pointer;
        }

        .option-details {
            flex: 1;
        }

        .option-name {
            font-weight: bold;
            color: #1a1a1a;
            font-size: 1.1em;
            margin-bottom: 3px;
        }

        .option-desc {
            color: #666;
            font-size: 0.9em;
        }

        .option-price {
            color: #dc143c;
            font-weight: bold;
            font-size: 1.3em;
        }

        .slider-group {
            margin-bottom: 30px;
        }

        .slider-label {
            display: flex;
            justify-content: space-between;
            margin-bottom: 12px;
        }

        .slider-label label {
            font-weight: 600;
            color: #1a1a1a;
            font-size: 1.05em;
        }

        .slider-value {
            color: #dc143c;
            font-weight: bold;
            font-size: 1.1em;
        }

        input[type="range"] {
            width: 100%;
            height: 8px;
            border-radius: 5px;
            background: #e0e0e0;
            outline: none;
            -webkit-appearance: none;
        }

        input[type="range"]::-webkit-slider-thumb {
            -webkit-appearance: none;
            appearance: none;
            width: 24px;
            height: 24px;
            border-radius: 50%;
            background: #dc143c;
            cursor: pointer;
            box-shadow: 0 2px 8px rgba(220, 20, 60, 0.4);
        }

        input[type="range"]::-moz-range-thumb {
            width: 24px;
            height: 24px;
            border-radius: 50%;
            background: #dc143c;
            cursor: pointer;
            border: none;
            box-shadow: 0 2px 8px rgba(220, 20, 60, 0.4);
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            color: #1a1a1a;
            font-weight: 600;
            font-size: 1em;
        }

        input[type="text"],
        input[type="email"],
        input[type="tel"],
        input[type="date"],
        input[type="time"],
        textarea,
        select {
            width: 100%;
            padding: 14px;
            background: #f9f9f9;
            border: 2px solid #ddd;
            border-radius: 8px;
            color: #1a1a1a;
            font-size: 1em;
            transition: all 0.3s ease;
        }

        input:focus,
        textarea:focus,
        select:focus {
            outline: none;
            border-color: #dc143c;
            background: #fff;
            box-shadow: 0 0 15px rgba(220, 20, 60, 0.2);
        }

        textarea {
            resize: vertical;
            min-height: 120px;
        }

        .btn-group {
            display: flex;
            gap: 15px;
            margin-top: 30px;
        }

        .btn {
            flex: 1;
            padding: 16px 30px;
            font-size: 1.1em;
            font-weight: bold;
            border-radius: 10px;
            cursor: pointer;
            transition: all 0.3s ease;
            border: none;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .btn-next {
            background: #dc143c;
            color: #fff;
        }

        .btn-next:hover:not(:disabled) {
            background: #a00;
            transform: scale(1.03);
            box-shadow: 0 5px 20px rgba(220, 20, 60, 0.4);
        }

        .btn-back {
            background: #1a1a1a;
            color: #fff;
        }

        .btn-back:hover {
            background: #333;
            transform: scale(1.03);
        }

        .btn:disabled {
            background: #ccc;
            cursor: not-allowed;
            transform: none;
        }

        .summary-card {
            background: #ffffff;
            border: 3px solid #dc143c;
            border-radius: 15px;
            padding: 30px;
            color: #1a1a1a;
            box-shadow: 0 8px 30px rgba(220, 20, 60, 0.15);
        }

        .summary-card h2 {
            color: #dc143c;
            border-bottom: 3px solid #dc143c;
            padding-bottom: 15px;
            margin-bottom: 25px;
        }

        .summary-item {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            padding: 15px 0;
            border-bottom: 2px solid #f0f0f0;
            gap: 20px;
        }

        .summary-item:last-of-type {
            border-bottom: none;
        }

        .summary-label {
            font-weight: 700;
            color: #1a1a1a;
            font-size: 1.05em;
            min-width: 180px;
        }

        .summary-value {
            color: #333;
            font-size: 1em;
            text-align: right;
            flex: 1;
        }

        .summary-total {
            font-size: 2em;
            font-weight: bold;
            margin-top: 25px;
            padding-top: 25px;
            border-top: 4px solid #dc143c;
            color: #dc143c;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .success-message {
            display: none;
            background: #e6ffe6;
            border: 3px solid #00cc00;
            border-radius: 15px;
            padding: 40px;
            text-align: center;
            color: #1a1a1a;
        }

        .success-message.show {
            display: block;
            animation: fadeIn 0.5s ease;
        }

        .success-message h2 {
            color: #00aa00;
            margin-bottom: 15px;
            font-size: 2.5em;
        }

        .success-message p {
            font-size: 1.1em;
            margin: 10px 0;
        }

        .success-message strong {
            color: #dc143c;
            font-size: 1.2em;
        }

        h3 {
            color: #dc143c;
            margin-bottom: 15px;
            margin-top: 30px;
        }

        @media (max-width: 768px) {
            h1 {
                font-size: 2em;
            }

            .btn-group {
                flex-direction: column;
            }

            .progress-label {
                font-size: 0.7em;
            }

            .floating-price {
                bottom: 15px;
                right: 15px;
                padding: 15px 20px;
            }

            .floating-price-amount {
                font-size: 1.5em;
            }

            .summary-item {
                flex-direction: column;
                gap: 5px;
            }

            .summary-label {
                min-width: auto;
            }

            .summary-value {
                text-align: left;
            }
        }
        .backb{
            height: 30px;
            width: 100px;
            background-color: #ff0033ff;
            border-radius: 30px;
            cursor: pointer;
        }
        .backb:hover{
            background-color: wheat;
        }
        
    </style>
</head>

<body>
    <div>
        <a  href="<?=(page('users/home'))?>"><button  class="backb"><b>Back</b></button></a>
    </div>
    <div class="container">
        <div class="floating-price" id="floating-price">
            <div class="floating-price-label">Current Total</div>
            <div class="floating-price-amount">₱0</div>
        </div>

        <header>
            <h1>📸 Custom Photography Booking</h1>
            <p class="subtitle">Design Your Perfect Photography Experience</p>
        </header>

        <div class="progress-bar">
            <div class="progress-line">
                <div class="progress-line-fill" id="progress-fill"></div>
            </div>
            <div class="progress-step active" data-step="1">
                <div class="progress-circle">1</div>
                <div class="progress-label">Package</div>
            </div>
            <div class="progress-step" data-step="2">
                <div class="progress-circle">2</div>
                <div class="progress-label">Customize</div>
            </div>
            <div class="progress-step" data-step="3">
                <div class="progress-circle">3</div>
                <div class="progress-label">Features</div>
            </div>
            <div class="progress-step" data-step="4">
                <div class="progress-circle">4</div>
                <div class="progress-label">Details</div>
            </div>
            <div class="progress-step" data-step="5">
                <div class="progress-circle">5</div>
                <div class="progress-label">Review</div>
            </div>
        </div>



        <div class="step-content active" id="step-1">
            <div class="card">
                <h2>Step 1: Build Your Custom Package</h2>
                <p style="color: #666; margin-bottom: 25px;">Select the services you need - choose one or multiple options</p>

                <h3 style="margin-top: 0;">Coverage Type</h3>
                <div class="option-group" id="card-grid">
                    

        
                </div>

                <h3 style="margin-top: 30px;">Pre-Event Session (Optional)</h3>
                <div class="option-group" id="card-preevent">
                    

                    
                </div>

                <h3 style="margin-top: 30px;">Equipment & Setup</h3>
                <div class="option-group" id="card-equipment">

                    
                </div>

                <div style="background: #fff5f5; border: 2px solid #dc143c; border-radius: 10px; padding: 20px; margin-top: 30px;">
                    <div style="display: flex; justify-content: space-between; align-items: center;">
                        <div>
                            <strong style="font-size: 1.1em; color: #1a1a1a;">Current Package Total:</strong>
                            <p style="color: #666; font-size: 0.9em; margin-top: 5px;">Select at least one service to continue</p>
                        </div>
                        <div style="font-size: 2em; font-weight: bold; color: #dc143c;" id="step1-total">₱0</div>
                    </div>
                </div>

                <div class="btn-group">
                    <button class="btn btn-next" onclick="nextStep()" id="step1-next" disabled>Next: Customize Package</button>
                </div>
            </div>
        </div>

        <div class="step-content" id="step-2">
            <div class="card">
                <h2>Step 2: Customize Your Package (Optional)</h2>
                <p style="color: #666; margin-bottom: 25px;">Add custom options to enhance your package or skip to the next step</p>

                <div class="slider-group">
                    <div class="slider-label">
                        <label>Additional Coverage Hours</label>
                        <span class="slider-value" id="hours-value">0 extra hours</span>
                    </div>
                    <input type="range" id="hours" min="0" max="12" value="0" oninput="updateHours(this.value)">
                    <p style="color: #888; font-size: 0.9em; margin-top: 5px;">₱500 per extra hour</p>
                </div>

                <div class="slider-group">
                    <div class="slider-label">
                        <label>Additional Photographers/Videographers</label>
                        <span class="slider-value" id="photographers-value">0 additional</span>
                    </div>
                    <input type="range" id="photographers" min="0" max="3" value="0" oninput="updatePhotographers(this.value)">
                    <p style="color: #888; font-size: 0.9em; margin-top: 5px;">₱1,500 per additional photographer/videographer</p>
                </div>

                <div class="slider-group">
                    <div class="slider-label">
                        <label>Extra Edited Photos (beyond standard)</label>
                        <span class="slider-value" id="photos-value">0 extra photos</span>
                    </div>
                    <input type="range" id="photos" min="0" max="200" step="10" value="0" oninput="updatePhotos(this.value)">
                    <p style="color: #888; font-size: 0.9em; margin-top: 5px;">₱20 per extra edited photo</p>
                </div>

                <div class="btn-group">
                    <button class="btn btn-back" onclick="previousStep()">Back</button>
                    <button class="btn btn-next" onclick="nextStep()">Next: Add Features</button>
                </div>
            </div>
        </div>

        <div class="step-content" id="step-3">
            <div class="card">
                <h2>Step 3: Additional Features (Optional)</h2>
                <p style="color: #666; margin-bottom: 25px;">Select add-ons to enhance your package or skip to continue</p>
                <div class="option-group" id="card-addfeatures">
                    

                    
                </div>
                <div class="btn-group">
                    <button class="btn btn-back" onclick="previousStep()">Back</button>
                    <button class="btn btn-next" onclick="nextStep()">Next: Your Details</button>
                </div>
            </div>
        </div>

        <div class="step-content" id="step-4">
            <div class="card">
                <h2>Step 4: Your Information & Schedule</h2>
                <h3>Session Details</h3>
                <div class="form-group">
                    <label>Event Type *</label>
                    <select id="event-type" required>
                        <option value="">Select event type</option>
                        <option value="wedding">Wedding</option>
                        <option value="birthday">Birthday</option>
                        <option value="debut">Debut</option>
                        <option value="corporate">Corporate Event</option>
                        <option value="baptism">Baptism/Christening</option>
                        <option value="graduation">Graduation</option>
                        <option value="other">Other</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Preferred Date *</label>
                    <input type="date" id="date" required>
                </div>
                <div class="form-group">
                    <label>Preferred Time *</label>
                    <input type="time" id="time" required>
                </div>
                <div class="form-group">
                    <label>Location/Venue *</label>
                    <input type="text" id="location" placeholder="Address or venue name" required>
                </div>

                <h3>Special Requests</h3>
                <div class="form-group">
                    <textarea id="notes" placeholder="Tell us about your vision, specific shots you want, themes, or any special requirements..."></textarea>
                </div>

                <div class="btn-group">
                    <button class="btn btn-back" onclick="previousStep()">Back</button>
                    <button class="btn btn-next" onclick="nextStep()" id="step4-next">Next: Review Booking</button>
                </div>
            </div>
        </div>

        <div class="step-content" id="step-5">
            <div class="card">
                <h2>Step 5: Review Your Booking</h2>
                <div class="summary-card">
                    <h2>Your Custom Package Summary</h2>
                    <div class="summary-item">
                        <div class="summary-label">Selected Services:</div>
                        <div class="summary-value" id="summary-package">Not selected</div>
                    </div>
                    <div class="summary-item">
                        <div class="summary-label">Package Customizations:</div>
                        <div class="summary-value" id="summary-customizations">Standard package</div>
                    </div>
                    <div class="summary-item">
                        <div class="summary-label">Additional Features:</div>
                        <div class="summary-value" id="summary-features">None selected</div>
                    </div>
                    <div class="summary-item">
                        <div class="summary-label">Event Type:</div>
                        <div class="summary-value" id="summary-event-type">Not set</div>
                    </div>
                    <div class="summary-item">
                        <div class="summary-label">Date & Time:</div>
                        <div class="summary-value" id="summary-datetime">Not set</div>
                    </div>
                    <div class="summary-item">
                        <div class="summary-label">Location:</div>
                        <div class="summary-value" id="summary-location">Not set</div>
                    </div>
                    <div class="summary-item">
                        <div class="summary-label">Contact Person:</div>
                        <div class="summary-value" id="summary-contact">Not set</div>
                    </div>
                    <div class="summary-total">
                        <span>Total Investment:</span>
                        <span id="summary-total">₱0</span>
                    </div>
                </div>

                <div class="btn-group">
                    <button class="btn btn-back" onclick="previousStep()">Back</button>
                    <button class="btn btn-next" onclick="submitBooking()">Confirm Booking</button>
                </div>
            </div>
        </div>

        <div class="success-message" id="success">
            <h2>🎉 Booking Confirmed!</h2>
            <p>Thank you for choosing our photography services!</p>
            <p>Your custom photography package has been received. We'll contact you within 24 hours to finalize all the details.</p>
            <p style="margin-top: 20px;">Booking Reference: <strong>#PH-2025-<span id="booking-ref"></span></strong></p>
            <p style="margin-top: 15px; color: #666;">Please check your email for confirmation details.</p>
        </div>
    </div>

    <?= import_packages("datatable", "tyrax", "loading", "ctr", "path", "twal") ?>


    <script>
    addEventListener("DOMContentLoaded",function(){
        tyrax.get({
            url:"coverage/get",
            response:(send)=>{
                let data = send.data;
                data.forEach(column => {
                    DOM.add_html("#card-grid",`
                    <div class="option-item" onclick="togglePackageItem(this, 'photo-coverage', 3500)">
                        <input type="checkbox" value="photo-coverage">
                        <div class="option-details">
                            <div class="option-name">${column.covname}</div>
                            <div class="option-desc">${column.description}</div>
                        </div>
                        <div class="option-price">₱${column.price}</div>
                    </div>
                    `)
                });
            },

        })
    })
</script>


<script>
    addEventListener("DOMContentLoaded", function() {
        tyrax.get({
            url: "preevent/get",
            response: (send) => {
                let data = send.data;
                data.forEach(column => {
                    DOM.add_html("#card-preevent", `
                    <div class="option-item" onclick="togglePackageItem(this, 'pre-event-photo', 5000)">
                        <input type="checkbox" value="pre-event-photo">
                        <div class="option-details">
                            <div class="option-name">${column.prename}</div>
                            <div class="option-desc">${column.predescription}</div>
                        </div>
                        <div class="option-price">₱${column.preprice}</div>
                    </div>
                    `)
                });
            },

        })
    })
</script>

<script>
    addEventListener("DOMContentLoaded",function(){
        tyrax.get({
            url:"equipment/get",
            response:(send)=>{
                let data = send.data;
                data.forEach(column => {
                    DOM.add_html("#card-equipment",`
                    <div class="option-item" onclick="togglePackageItem(this, 'drone', 2000)">
                        <input type="checkbox" value="drone">
                        <div class="option-details">
                            <div class="option-name">${column.name}</div>
                            <div class="option-desc">${column.description}</div>
                        </div>
                        <div class="option-price">₱${column.price}</div>
                    </div>
                    `)
                });
            },

        })
    })
</script>


<script>
    addEventListener("DOMContentLoaded",function(){
        tyrax.get({
            url:"addfeatures/get",
            response:(send)=>{
                let data = send.data;
                data.forEach(column => {
                    DOM.add_html("#card-addfeatures",`
                    <div class="option-item" onclick="toggleFeature(this, 'same-day-edit', 3000)">
                        <input type="checkbox" value="same-day-edit">
                        <div class="option-details">
                            <div class="option-name">${column.fname}</div>
                            <div class="option-desc">${column.description}</div>
                        </div>
                        <div class="option-price">+₱${column.fprice}</div>
                    </div>
                    `)
                });
            },

        })
    })
</script>


    <script>
        addEventListener("DOMContentLoaded", () => {
            LOADING.load(true);

            setTimeout(() => LOADING.load(false), 1000)

        })
    </script>

    <script>
        let currentStep = 1;
        let packageItems = [];
        let hours = 0;
        let photographers = 0;
        let photos = 0;
        let selectedFeatures = [];

        function togglePackageItem(element, itemName, price) {
            const checkbox = element.querySelector('input');
            checkbox.checked = !checkbox.checked;

            if (checkbox.checked) {
                element.classList.add('selected');
                packageItems.push({
                    name: itemName,
                    price: price
                });
            } else {
                element.classList.remove('selected');
                packageItems = packageItems.filter(item => item.name !== itemName);
            }

            updateStep1Total();
        }

        function updateStep1Total() {
            const total = packageItems.reduce((sum, item) => sum + item.price, 0);
            document.getElementById('step1-total').textContent = '₱' + total.toLocaleString();
            document.getElementById('step1-next').disabled = packageItems.length === 0;
            updateSummary();
            updateFloatingPrice();
        }

        function updateHours(value) {
            hours = parseInt(value);
            document.getElementById('hours-value').textContent = hours + (hours === 0 ? ' extra hours' : (' extra hour' + (hours > 1 ? 's' : '')));
            updateSummary();
            updateFloatingPrice();
        }

        function updatePhotographers(value) {
            photographers = parseInt(value);
            document.getElementById('photographers-value').textContent = photographers + (photographers === 0 ? ' additional' : (' additional'));
            updateSummary();
            updateFloatingPrice();
        }

        function updatePhotos(value) {
            photos = parseInt(value);
            document.getElementById('photos-value').textContent = photos + ' extra photo' + (photos !== 1 ? 's' : '');
            updateSummary();
            updateFloatingPrice();
        }

        function toggleFeature(element, featureName, price) {
            const checkbox = element.querySelector('input');
            checkbox.checked = !checkbox.checked;

            if (checkbox.checked) {
                element.classList.add('selected');
                selectedFeatures.push({
                    name: featureName,
                    price: price
                });
            } else {
                element.classList.remove('selected');
                selectedFeatures = selectedFeatures.filter(f => f.name !== featureName);
            }
            updateSummary();
            updateFloatingPrice();
        }

        function updateFloatingPrice() {
            let total = packageItems.reduce((sum, item) => sum + item.price, 0);
            total += hours * 500;
            total += photographers * 1500;
            total += photos * 20;
            total += selectedFeatures.reduce((sum, f) => sum + f.price, 0);

            document.querySelector('.floating-price-amount').textContent = '₱' + total.toLocaleString();
        }

        function nextStep() {
            if (currentStep === 4) {
                const name = document.getElementById('name').value;
                const email = document.getElementById('email').value;
                const phone = document.getElementById('phone').value;
                const eventType = document.getElementById('event-type').value;
                const date = document.getElementById('date').value;
                const time = document.getElementById('time').value;
                const location = document.getElementById('location').value;

                if (!name || !email || !phone || !eventType || !date || !time || !location) {
                    alert('Please fill in all required fields');
                    return;
                }

                const eventTypeText = document.getElementById('event-type').options[document.getElementById('event-type').selectedIndex].text;
                document.getElementById('summary-event-type').textContent = eventTypeText;
                document.getElementById('summary-datetime').textContent =
                    new Date(date).toLocaleDateString('en-US', {
                        year: 'numeric',
                        month: 'long',
                        day: 'numeric'
                    }) + ' at ' + formatTime(time);
                document.getElementById('summary-location').textContent = location;
                document.getElementById('summary-contact').textContent = name + ' (' + phone + ')';
            }

            document.getElementById('step-' + currentStep).classList.remove('active');
            currentStep++;
            document.getElementById('step-' + currentStep).classList.add('active');
            updateProgressBar();
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        }

        function formatTime(time) {
            const [hours, minutes] = time.split(':');
            const hour = parseInt(hours);
            const ampm = hour >= 12 ? 'PM' : 'AM';
            const displayHour = hour % 12 || 12;
            return displayHour + ':' + minutes + ' ' + ampm;
        }

        function previousStep() {
            document.getElementById('step-' + currentStep).classList.remove('active');
            currentStep--;
            document.getElementById('step-' + currentStep).classList.add('active');
            updateProgressBar();
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        }

        function updateProgressBar() {
            const steps = document.querySelectorAll('.progress-step');
            steps.forEach((step, index) => {
                const stepNum = index + 1;
                if (stepNum < currentStep) {
                    step.classList.add('completed');
                    step.classList.remove('active');
                } else if (stepNum === currentStep) {
                    step.classList.add('active');
                    step.classList.remove('completed');
                } else {
                    step.classList.remove('active', 'completed');
                }
            });

            const progress = ((currentStep - 1) / 4) * 100;
            document.getElementById('progress-fill').style.width = progress + '%';
        }

        function updateSummary() {
            const packageNames = {
                'photo-coverage': 'Photo Coverage',
                'video-highlights': 'Video Highlights',
                'pre-event-photo': 'Pre-Event Photo Session',
                'pre-event-video': 'Pre-Event Video Session',
                'drone': 'Drone Coverage',
                'projector': 'Projector Setup'
            };

            const selectedPackages = packageItems.length > 0 ?
                packageItems.map(item => packageNames[item.name] || item.name).join(', ') :
                'Not selected';
            document.getElementById('summary-package').textContent = selectedPackages;

            let customText = '';
            if (hours > 0) customText += hours + ' extra hour' + (hours > 1 ? 's' : '') + ', ';
            if (photographers > 0) customText += photographers + ' extra photographer/videographer' + (photographers > 1 ? 's' : '') + ', ';
            if (photos > 0) customText += photos + ' extra photo' + (photos > 1 ? 's' : '');

            if (customText === '') customText = 'Standard package';
            else customText = customText.replace(/, $/, '');

            document.getElementById('summary-customizations').textContent = customText;

            const featureNames = selectedFeatures.length > 0 ?
                selectedFeatures.map(f => {
                    const names = {
                        'same-day-edit': 'Same Day Edit',
                        'photo-booth': 'Photo Booth',
                        'album': 'Photo Album',
                        'rush': 'Rush Editing',
                        'live-streaming': 'Live Streaming',
                        'prints': 'Printed Photos'
                    };
                    return names[f.name] || f.name;
                }).join(', ') :
                'None selected';
            document.getElementById('summary-features').textContent = featureNames;

            let total = packageItems.reduce((sum, item) => sum + item.price, 0);
            total += hours * 500;
            total += photographers * 1500;
            total += photos * 20;
            total += selectedFeatures.reduce((sum, f) => sum + f.price, 0);

            document.getElementById('summary-total').textContent = '₱' + total.toLocaleString();
        }

        function submitBooking() {
            const bookingRef = Math.floor(Math.random() * 10000).toString().padStart(4, '0');
            document.getElementById('booking-ref').textContent = bookingRef;

            document.getElementById('step-5').style.display = 'none';
            document.querySelector('.progress-bar').style.display = 'none';
            document.querySelector('.floating-price').style.display = 'none';
            document.getElementById('success').classList.add('show');
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });

            console.log('Booking submitted:', {
                packageItems: packageItems,
                hours: hours,
                photographers: photographers,
                photos: photos,
                features: selectedFeatures,
                name: document.getElementById('name').value,
                email: document.getElementById('email').value,
                phone: document.getElementById('phone').value,
                eventType: document.getElementById('event-type').value,
                date: document.getElementById('date').value,
                time: document.getElementById('time').value,
                location: document.getElementById('location').value,
                notes: document.getElementById('notes').value,
                reference: bookingRef
            });
        }

        document.addEventListener('DOMContentLoaded', function() {
            const today = new Date().toISOString().split('T')[0];
            document.getElementById('date').setAttribute('min', today);
        });
    </script>
</body>

</html>