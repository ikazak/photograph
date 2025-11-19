<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>4-Step Multi-step Form (Full Screen)</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <?php code_library() ?>
    <style>
        html,
        body {
            height: 100%;
            /* Make html and body fill the viewport height */
            margin: 0;
            padding: 0;
            overflow-x: hidden;
            /* Prevent horizontal scrollbar */
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: #f0f2f5;
            /* We will let the container manage its size and position within this */
        }

        .multi-step-form-container {
            background-color: #fff;
            width: 100%;
            /* Ensure it takes full available width */
            border-radius: 0;
            /* No rounded corners for full screen */
            box-shadow: none;
            /* No box shadow for a flat, full-screen look */
            padding: 40px 0;
            /* Adjust padding as needed for internal content */
            min-height: 100vh;
            /* Make container fill full viewport height */

            /* To center content vertically within the full-screen container */
            display: flex;
            flex-direction: column;
            justify-content: center;
            /* Center content vertically */
            align-items: center;
            /* Center content horizontally */
        }

        /* Inner content wrapper for better padding control */
        .form-inner-wrapper {
            /* Limit the content width inside the full screen container */
            max-width: 960px;
            /* Adjust max-width for better readability on large screens */
            width: 100%;
            padding: 0 20px;
            /* Horizontal padding to prevent content from touching edges */
        }

        .form-steps {
            display: flex;
            justify-content: space-between;
            margin-bottom: 40px;
            position: relative;
            padding-bottom: 20px;
        }

        .form-steps::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 0;
            width: 100%;
            height: 4px;
            background-color: #e0e0e0;
            transform: translateY(-50%);
            z-index: 0;
        }

        .step-indicator {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background-color: #e0e0e0;
            color: #888;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
            position: relative;
            z-index: 1;
            transition: background-color 0.3s ease, color 0.3s ease;
            border: 2px solid #e0e0e0;
        }

        .step-indicator.active {
            background-color: #007bff;
            /* Primary color for active step */
            color: #fff;
            border-color: #007bff;
        }

        .step-indicator.completed {
            background-color: #28a745;
            /* Success color for completed step */
            color: #fff;
            border-color: #28a745;
        }

        .step-indicator span {
            font-size: 1.2rem;
        }

        .step-indicator.completed span::after {
            content: '\f00c';
            /* Font Awesome checkmark icon */
            font-family: 'Font Awesome 6 Free';
            font-weight: 900;
            font-size: 1.2rem;
            position: absolute;
            color: #fff;
        }

        /* Step Titles below indicators */
        .step-title {
            position: absolute;
            top: calc(100% + 5px);
            /* Position below indicator */
            left: 50%;
            transform: translateX(-50%);
            white-space: nowrap;
            font-size: 0.9rem;
            color: #6c757d;
            transition: color 0.3s ease;
        }

        .step-indicator.active+.step-title {
            color: #007bff;
            font-weight: 600;
        }

        .step-indicator.completed+.step-title {
            color: #28a745;
        }

        .form-step {
            display: none;
            /* Hide all steps by default */
        }

        .form-step.active {
            display: block;
            /* Show active step */
        }

        .form-navigation {
            margin-top: 40px;
            display: flex;
            justify-content: space-between;
        }

        .form-navigation .btn {
            padding: 10px 25px;
            font-size: 1rem;
            font-weight: 600;
            border-radius: 5px;
        }

        .form-navigation .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }

        .form-navigation .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }

        .form-navigation .btn-secondary {
            background-color: #6c757d;
            border-color: #6c757d;
        }

        .form-navigation .btn-secondary:hover {
            background-color: #545b62;
            border-color: #545b62;
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .multi-step-form-container {
                padding: 30px 0;
                /* Adjusted padding for smaller screens */
            }

            .form-inner-wrapper {
                padding: 0 15px;
                /* More specific padding for smaller screens */
            }

            .form-steps {
                flex-wrap: wrap;
                justify-content: center;
                gap: 15px 0;
                /* Space between rows for indicators */
                margin-bottom: 30px;
            }

            .step-indicator {
                width: 35px;
                height: 35px;
                font-size: 1rem;
            }

            .step-indicator span,
            .step-indicator.completed span::after {
                font-size: 1rem;
            }

            .step-title {
                font-size: 0.8rem;
                top: calc(100% + 2px);
            }

            .form-navigation {
                flex-direction: column;
                gap: 15px;
            }

            .form-navigation .btn {
                width: 100%;
            }
        }

        .session-plan-section {
            padding: 60px 0;
        }

        .main-heading {
            font-size: 2.2rem;
            font-weight: 600;
            color: #333;
            margin-bottom: 40px;
            margin-left: 15px;
            /* Aligns with container padding */
        }

        .content-card {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
            padding: 30px;
            margin-bottom: 30px;
            /* Space between cards if stacked or for spacing */
        }

        /* Left Column (Session Details) Styling */
        .session-details-card h5 {
            font-size: 1.4rem;
            font-weight: 600;
            color: #333;
            margin-bottom: 25px;
        }

        .session-details-card .form-label {
            font-weight: 500;
            color: #444;
        }

        .session-details-card .form-control[type="date"] {
            height: 50px;
            /* Make date input taller */
            border-radius: 8px;
        }

        .studio-schedule-notes {
            background-color: #f8f8f8;
            border-left: 4px solid #e0e0e0;
            padding: 15px 20px;
            border-radius: 5px;
            margin-top: 25px;
            margin-bottom: 30px;
            font-size: 0.95rem;
            color: #555;
        }

        .studio-schedule-notes ul {
            list-style: none;
            padding-left: 0;
            margin-bottom: 0;
        }

        .studio-schedule-notes li {
            margin-bottom: 5px;
        }

        .studio-schedule-notes li:last-child {
            margin-bottom: 0;
        }

        /* Radio Button Custom Styling */
        .preferred-time-group .form-check {
            margin-bottom: 10px;
        }

        .preferred-time-group .form-check-input {
            width: 1.2em;
            height: 1.2em;
            margin-top: 0.25em;
            border: 2px solid #ccc;
        }

        .preferred-time-group .form-check-input:checked {
            background-color: #e49b00;
            /* Gold/orange accent color */
            border-color: #e49b00;
        }

        .preferred-time-group .form-check-label {
            font-size: 1rem;
            color: #333;
        }

        .session-details-card .btn-next {
            background-color: #e49b00;
            /* Gold/orange accent color */
            border-color: #e49b00;
            color: #fff;
            padding: 12px 40px;
            font-size: 1.1rem;
            font-weight: 600;
            border-radius: 8px;
            margin-top: 30px;
            transition: background-color 0.2s ease;
        }

        .session-details-card .btn-next:hover {
            background-color: #c08000;
            /* Darker shade on hover */
            border-color: #c08000;
        }

        /* Right Column (Booking Details) Styling */
        .booking-details-heading {
            font-size: 1rem;
            font-weight: 600;
            color: #333;
            margin-bottom: 15px;
        }

        .booking-location-card p {
            margin-bottom: 5px;
            color: #555;
            font-size: 0.95rem;
        }

        .booking-location-card p strong {
            font-weight: 600;
            color: #333;
        }

        .booking-package-card h6 {
            font-size: 1.1rem;
            font-weight: 600;
            color: #333;
            margin-bottom: 5px;
        }

        .booking-package-card p {
            font-size: 1rem;
            color: #e49b00;
            /* Accent color for price */
            font-weight: 700;
            margin-bottom: 15px;
        }

        .booking-package-card .inclusion-list {
            list-style: none;
            padding-left: 0;
            font-size: 0.95rem;
            color: #555;
        }

        .booking-package-card .inclusion-list li {
            margin-bottom: 5px;
        }

        .booking-package-card .inclusion-list li::before {
            content: '\2022';
            /* Bullet point */
            color: #e49b00;
            /* Accent color for bullet */
            font-weight: bold;
            display: inline-block;
            width: 1em;
            margin-left: -1em;
        }

        /* Responsive Adjustments */
        @media (max-width: 992px) {
            .main-heading {
                font-size: 2rem;
                margin-bottom: 30px;
            }

            .session-details-card,
            .booking-details-card {
                padding: 25px;
            }

            .session-details-card h5 {
                font-size: 1.3rem;
            }
        }

        @media (max-width: 768px) {
            .session-plan-section {
                padding: 40px 0;
            }

            .main-heading {
                font-size: 1.8rem;
                text-align: center;
                margin-left: 0;
                margin-bottom: 30px;
            }

            .content-card {
                margin-bottom: 20px;
                /* Less space between cards on smaller screens */
            }

            .session-details-card .btn-next {
                width: 100%;
                /* Full width button on mobile */
                padding: 10px 20px;
                font-size: 1rem;
            }

            /* Stack right column cards on top of each other */
            .right-column-cards {
                margin-top: 20px;
            }
        }

        /* Custom styles for the personal info section (now part of step 2) */
        .personal-info-section {
            padding: 30px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
        }

        .personal-info-section .form-label {
            font-weight: 500;
            color: #333;
        }

        .personal-info-section .form-control,
        .personal-info-section .form-select {
            border-radius: 5px;
            border: 1px solid #ced4da;
            padding: 10px 12px;
        }

        .personal-info-section .input-group-text {
            background-color: #e9ecef;
            border-right: none;
            border-top-left-radius: 5px;
            border-bottom-left-radius: 5px;
            color: #495057;
        }

        .personal-info-section .input-group>.form-control {
            border-top-left-radius: 0;
            border-bottom-left-radius: 0;
        }
    </style>
</head>

<body>
    
    <div class="modal fade" id="gcashQrModal" tabindex="-1" aria-labelledby="gcashQrModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                
                <div class="modal-header bg-red-500 text-white rounded-t-xl">
                    <h5 class="modal-title text-white font-semibold" id="gcashQrModalLabel">GCash Payment</h5>
                    <button type="button" class="btn-close text-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body p-6 text-center">
                    <p class="text-gray-700 mb-4">Scan the QR code below to complete your payment via GCash:</p>
                    <img src="<?= assets()?>/img/R.png" height="300" width="300" alt="GCash QR Code" class="mx-auto rounded-lg shadow-sm mb-4">
                    <p class="text-gray-600 text-sm">NAME CODE: TY*****E M*</p>
                    <label style="margin-top: 10px; witdh: 200px;" for="addinventoryImage" class="form-label">Ref. number</label>
                    <input type="text" name="image" class="form-control bg-secondary text-white border-0" id="addinventoryImage">
                    <label style="margin-top: 10px; witdh: 200px;" for="addinventoryImage" class="form-label">Sender Name</label>
                    <input type="text" name="image" class="form-control bg-secondary text-white border-0" id="addinventoryImage">

                    
                </div>
                <div class="modal-footer justify-center">
                    <button type="button" id="paybtn" class="btn btn-primary" data-bs-dismiss="modal">submit</button>
                </div>
            </div>
        </div>
    </div>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    

    <div class="multi-step-form-container">
        <div class="form-inner-wrapper">
            <form id="multiStepForm">
                
                <div class="form-steps">
                    <div class="position-relative">
                        <div class="step-indicator active" data-step="1"><span>1</span></div>
                        <div class="step-title">Session Details</div>
                    </div>
                    <div class="position-relative">
                        <div class="step-indicator" data-step="2"><span>2</span></div>
                        <div class="step-title">Personal Info</div>
                    </div>
                    <div class="position-relative">
                        <div class="step-indicator" data-step="3"><span>3</span></div>
                        <div class="step-title">Event Details</div>
                    </div>
                    <div class="position-relative">
                        <div class="step-indicator" data-step="4"><span>4</span></div>
                        <div class="step-title">Confirmation</div>
                    </div>
                </div>

                <div style="width: 100%;" class="form-content">
                    <div class="form-step active" data-step="1">
                        <section class="session-plan-section">
                            <div class="container-fluid">
                                <h2 class="main-heading">Let's plan your session</h2>
                                <div class="row">
                                    <div class="col-lg-8">
                                        <div class="content-card session-details-card">
                                            <h5>Session details</h5>
                                            <div class="mb-4">
                                                <label for="preferredDate" class="form-label">Preferred date (please enter multiple dates or range):</label>
                                                <input type="date" class="form-control" id="preferredDate" name="preferredDate" required>
                                            </div>

                                            <div class="studio-schedule-notes">
                                                <h6>Studio schedule</h6>
                                                <ul>
                                                    <li>Our studio is closed on Mondays. Studio bookings are not available on Mondays.</li>
                                                    <li>We can schedule event coverage for any other day, including Mondays.</li>
                                                    <li>STUDIO IS CLOSED ON: March 28 - 31</li>
                                                </ul>
                                            </div>

                                            <div class="mb-4 preferred-time-group">
                                                <label class="form-label d-block">Preferred time (required):</label>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="preferredTime" id="timeAnytime" value="anytime" required>
                                                    <label class="form-check-label" for="timeAnytime">
                                                        I'm open anytime
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="preferredTime" id="timeMorning" value="morning">
                                                    <label class="form-check-label" for="timeMorning">
                                                        Morning
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="preferredTime" id="timeAfternoon" value="afternoon">
                                                    <label class="form-check-label" for="timeAfternoon">
                                                        Afternoon
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="preferredTime" id="timeSpecific" value="specific">
                                                    <label class="form-check-label" for="timeSpecific">
                                                        Specific time
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <div class="right-column-cards">
                                            <h6 class="booking-details-heading">Your booking at:</h6>

                                            <div class="content-card booking-location-card">
                                                <p><strong>Pampanga Branch</strong></p>
                                                <p>2/F A&A Building, Telabastagan, City of San Fernando 2000 Pampanga</p>
                                            </div>

                                            <div class="content-card booking-package-card">
                                                <h6>Intimate Wedding A 0025</h6>
                                                <p>PHP 7,000</p>
                                                <h6 class="mb-2">Inclusion</h6>
                                                <ul class="inclusion-list">
                                                    <li>6 hours wedding coverage (Photo only)</li>
                                                    <li>1 professional photographer</li>
                                                    <li>Unlimited high resolution digital photos</li>
                                                    <li>Up to 150 enhanced images</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>

                    <div class="form-step" data-step="2">
                        <h4 class="mb-4 text-center">Personal Information</h4>
                        <div class="personal-info-section">
                            <div class="mb-3">
                                <label for="fullName" class="form-label">Full Name (required):</label>
                                <input type="text" class="form-control" id="fullName" name="fullName" required>
                            </div>
                            <div class="mb-3">
                                <label for="mobileNumber" class="form-label">Mobile Number (required):</label>
                                <div class="input-group">
                                    <span class="input-group-text">+63</span>
                                    <input type="tel" class="form-control" id="mobileNumber" name="mobileNumber" pattern="[0-9]{10}" placeholder="e.g., 9171234567" required>
                                </div>
                                <small class="form-text text-muted">Enter 10 digits after +63 (e.g., 9171234567).</small>
                            </div>
                            <div class="mb-3">
                                <label for="emailAddress" class="form-label">Email Address (required):</label>
                                <input type="email" class="form-control" id="emailAddress" name="emailAddress" placeholder="you@example.com" required>
                            </div>
                            <div class="mb-3">
                                <label for="cityTown" class="form-label">What city or town are you from? (required):</label>
                                <input type="text" class="form-control" id="cityTown" name="cityTown" placeholder="e.g., Himamaylan City" required>
                            </div>
                            <div class="mb-3">
                                <label for="facebookName" class="form-label">If you already messaged us on Facebook, enter your Facebook name (required):</label>
                                <input type="text" class="form-control" id="facebookName" name="facebookName" required>
                            </div>
                            <div class="mb-4">
                                <label for="howDidYouHear" class="form-label">How did you hear about us? (required)</label>
                                <select class="form-select" id="howDidYouHear" name="howDidYouHear" required>
                                    <option value="" disabled selected>Select an option</option>
                                    <option value="social_media">Social Media (Facebook, Instagram, etc.)</option>
                                    <option value="friend_referral">Friend/Family Referral</option>
                                    <option value="online_search">Online Search (Google, Bing, etc.)</option>
                                    <option value="advertisement">Advertisement</option>
                                    <option value="website">Our Website</option>
                                    <option value="other">Other</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="form-step" data-step="3">
                        <h4 class="mb-4 text-center">Event Details</h4>
                        <div class="content-card">
                            <div class="mb-3">
                                <label for="eventDate" class="form-label">Event Date (required):</label>
                                <input type="date" class="form-control" id="eventDate" name="eventDate" required>
                            </div>
                            <div class="mb-3">
                                <label for="eventLocation" class="form-label">Event Location (required):</label>
                                <input type="text" class="form-control" id="eventLocation" name="eventLocation" placeholder="City, Venue Name" required>
                            </div>
                            <div class="mb-4">
                                <label for="howDidYouHear" class="form-label">Services</label>
                                <select class="form-select" id="howDidYouHear" name="howDidYouHear" required>
                                    <option value="" disabled selected>Wedding</option>
                                    <option value="social_media">Portrait</option>
                                    <option value="friend_referral">Event</option>
                                    <option value="online_search">School & Milestone</option>
                                    <option value="advertisement">Cultural & Lifestyle</option>

                                </select>
                            </div>
                            <div class="mb-4">
                                <label for="howDidYouHear" class="form-label">Packages</label>
                                <select class="form-select" id="howDidYouHear" name="howDidYouHear" required>
                                    <option value="" disabled selected>Select an option</option>
                                    <option value="social_media">Social Media (Facebook, Instagram, etc.)</option>
                                    <option value="friend_referral">Friend/Family Referral</option>
                                    <option value="online_search">Online Search (Google, Bing, etc.)</option>
                                    <option value="advertisement">Advertisement</option>
                                    <option value="website">Our Website</option>
                                    <option value="other">Other</option>
                                </select>
                            </div>
                            <div class="mb-4">
                                <label for="howDidYouHear" class="form-label">Mode of Payment</label>
                                <select id="paymentMethod" class="form-select block w-full px-3 py-2 text-base text-gray-900 border border-gray-300 rounded-lg focus:ring-red-500 focus:border-red-500 bg-gray-50">
                                    <option value="">-- Please select --</option>
                                    <option value="cash">Cash</option>
                                    <option value="gcash">GCash</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="additionalNotes" class="form-label">Additional Notes:</label>
                                <textarea class="form-control" id="additionalNotes" name="additionalNotes" rows="3" placeholder="Any other details you'd like to share?"></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="form-step" data-step="4">
                        <h4 class="mb-4 text-center">Confirmation</h4>
                        <div class="content-card">
                            <p>Please review your information before submitting.</p>
                            <ul class="list-group mb-3">
                                <li class="list-group-item"><strong>Preferred Date:</strong> <span id="confirmPreferredDate"></span></li>
                                <li class="list-group-item"><strong>Preferred Time:</strong> <span id="confirmPreferredTime"></span></li>
                                <li class="list-group-item"><strong>Full Name:</strong> <span id="confirmFullName"></span></li>
                                <li class="list-group-item"><strong>Mobile Number:</strong> <span id="confirmMobileNumber"></span></li>
                                <li class="list-group-item"><strong>Email Address:</strong> <span id="confirmEmailAddress"></span></li>
                                <li class="list-group-item"><strong>City/Town:</strong> <span id="confirmCityTown"></span></li>
                                <li class="list-group-item"><strong>Facebook Name:</strong> <span id="confirmFacebookName"></span></li>
                                <li class="list-group-item"><strong>How did you hear about us?:</strong> <span id="confirmHowDidYouHear"></span></li>
                                <li class="list-group-item"><strong>Event Date:</strong> <span id="confirmEventDate"></span></li>
                                <li class="list-group-item"><strong>Event Location:</strong> <span id="confirmEventLocation"></span></li>

                                <li class="list-group-item"><strong>Additional Notes:</strong> <span id="confirmAdditionalNotes"></span></li>
                            </ul>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="termsCheckbox" required>
                                <label class="form-check-label" for="termsCheckbox">
                                    I agree to the <a href="#" class="text-decoration-none">Terms and Conditions</a>.
                                </label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-navigation">
                    <button type="button" class="btn btn-secondary" id="prevBtn">Previous</button>
                    <button type="button" class="btn btn-primary" id="nextBtn">Next</button>
                    <button type="submit" class="btn btn-success" id="submitBtn" style="display: none;">Submit</button>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // Get references to the select element and the modal
        const paymentMethodSelect = document.getElementById('paymentMethod');
        const gcashQrModal = new bootstrap.Modal(document.getElementById('gcashQrModal'));

        // Add an event listener to the select element
        paymentMethodSelect.addEventListener('change', function() {
            // Check if the selected value is 'gcash'
            if (this.value === 'gcash') {
                // Show the modal
                gcashQrModal.show();
            } else {
                // If another option is selected, ensure the modal is hidden
                gcashQrModal.hide();
            }
        });

        // Optional: Reset dropdown when modal is closed
        document.getElementById('gcashQrModal').addEventListener('hidden.bs.modal', function() {
         
        });
    </script>

    <script>
        let currentStep = 1;
        const formSteps = document.querySelectorAll('.form-step');
        const stepIndicators = document.querySelectorAll('.step-indicator');
        const prevBtn = document.getElementById('prevBtn');
        const nextBtn = document.getElementById('nextBtn');
        const submitBtn = document.getElementById('submitBtn');
        const multiStepForm = document.getElementById('multiStepForm');

        function showStep(step) {
            // Hide all steps
            formSteps.forEach(s => s.classList.remove('active'));
            // Show the current step
            document.querySelector(`.form-step[data-step="${step}"]`).classList.add('active');

            // Update step indicators
            stepIndicators.forEach((indicator, index) => {
                indicator.classList.remove('active', 'completed');
                if (index + 1 < step) {
                    indicator.classList.add('completed');
                } else if (index + 1 === step) {
                    indicator.classList.add('active');
                }
            });

            // Update button visibility
            prevBtn.style.display = (step === 1) ? 'none' : 'inline-block';
            nextBtn.style.display = (step === formSteps.length) ? 'none' : 'inline-block';
            submitBtn.style.display = (step === formSteps.length) ? 'inline-block' : 'none';

            // If on the last step, populate confirmation details
            if (step === formSteps.length) {
                populateConfirmation();
            }
        }

        function validateStep(step) {
            let isValid = true;
            const currentFormStep = document.querySelector(`.form-step[data-step="${step}"]`);
            const inputs = currentFormStep.querySelectorAll('[required]');

            inputs.forEach(input => {
                input.classList.remove('is-invalid'); // Clear previous invalid states

                if (!input.value.trim()) {
                    input.classList.add('is-invalid');
                    isValid = false;
                } else {
                    // Specific validations
                    if (input.type === 'email' && !/\S+@\S+\.\S+/.test(input.value)) {
                        input.classList.add('is-invalid');
                        isValid = false;
                    }
                    if (input.id === 'mobileNumber' && !/^\d{10}$/.test(input.value)) {
                        input.classList.add('is-invalid');
                        isValid = false;
                    }
                    if (input.type === 'radio') {
                        // For radio buttons, check if at least one in the group is checked
                        const radioGroupName = input.name;
                        const radioGroup = document.querySelectorAll(`input[name="${radioGroupName}"]`);
                        const isRadioGroupChecked = Array.from(radioGroup).some(radio => radio.checked);
                        if (!isRadioGroupChecked) {
                            // Add invalid class to all radios in the group for visual feedback, or just one if preferred
                            radioGroup.forEach(radio => radio.classList.add('is-invalid'));
                            isValid = false;
                        } else {
                            radioGroup.forEach(radio => radio.classList.remove('is-invalid'));
                        }
                    }
                    if (input.type === 'checkbox' && !input.checked) {
                        input.classList.add('is-invalid');
                        isValid = false;
                    }
                }
            });

            // If there are any invalid fields, show an alert (optional, Bootstrap feedback is usually enough)
            if (!isValid) {
                alert('Please fill in all required fields and correct any errors in the current step.');
            }

            return isValid;
        }

        function populateConfirmation() {
            // Step 1 fields
            document.getElementById('confirmPreferredDate').textContent = document.getElementById('preferredDate').value;
            const preferredTimeRadios = document.querySelectorAll('input[name="preferredTime"]');
            let selectedTime = 'Not selected';
            for (const radio of preferredTimeRadios) {
                if (radio.checked) {
                    selectedTime = radio.labels[0].textContent.trim();
                    break;
                }
            }
            document.getElementById('confirmPreferredTime').textContent = selectedTime;


            // Step 2 fields
            document.getElementById('confirmFullName').textContent = document.getElementById('fullName').value;
            document.getElementById('confirmMobileNumber').textContent = '+63' + document.getElementById('mobileNumber').value;
            document.getElementById('confirmEmailAddress').textContent = document.getElementById('emailAddress').value;
            document.getElementById('confirmCityTown').textContent = document.getElementById('cityTown').value;
            document.getElementById('confirmFacebookName').textContent = document.getElementById('facebookName').value;
            document.getElementById('confirmHowDidYouHear').textContent = document.getElementById('howDidYouHear').options[document.getElementById('howDidYouHear').selectedIndex].text;

            // Step 3 fields
            document.getElementById('confirmEventDate').textContent = document.getElementById('eventDate').value;
            document.getElementById('confirmEventLocation').textContent = document.getElementById('eventLocation').value;
            document.getElementById('confirmGuestCount').textContent = document.getElementById('guestCount').value;
            document.getElementById('confirmAdditionalNotes').textContent = document.getElementById('additionalNotes').value || 'N/A';
        }


        // Event Listeners
        nextBtn.addEventListener('click', () => {
            if (validateStep(currentStep)) {
                currentStep++;
                showStep(currentStep);
            }
        });

        prevBtn.addEventListener('click', () => {
            currentStep--;
            showStep(currentStep);
        });

        multiStepForm.addEventListener('submit', (e) => {
            e.preventDefault();
            if (validateStep(currentStep)) { // Final validation on submit
                alert('Form submitted successfully!');
                // In a real application, you would send the form data to a server here
                // using fetch() or XMLHttpRequest.
                // Example:
                // const formData = new FormData(multiStepForm);
                // fetch('your-server-endpoint.php', {
                //     method: 'POST',
                //     body: formData
                // })
                // .then(response => response.json())
                // .then(data => console.log(data))
                // .catch(error => console.error('Error:', error));
            } else {
                // Validation message is already handled by validateStep
            }
        });

        // Initial display
        showStep(currentStep);
    </script>
</body>

</html>


<script>
    document.querySelector("#paybtn").addEventListener("click", function(){
        event.preventDefault();
        Swal.fire({
            title: "Paid",
            text: "Thank you for your payment",
            icon: "success"
        }).then(()=>{
            // reload();
        });
    });
</script>