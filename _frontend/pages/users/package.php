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
    
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* === Navbar === */
        .navbar-top {
            background: linear-gradient(90deg, #ffffff 0%, #f8fbff 100%);
            border-bottom: 3px solid #e60000;
            padding: 1rem 2rem;
            box-shadow: 0 2px 12px rgba(230, 0, 0, 0.12);
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        .navbar-content {
            max-width: 1400px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo-section {
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .logo-icon {
            width: 44px;
            height: 44px;
            background: linear-gradient(135deg, #e60000 0%, #ff3333 100%);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 4px 14px rgba(230, 0, 0, 0.3);
            transition: transform 0.3s ease;
        }

        .logo-icon:hover {
            transform: scale(1.05);
        }

        .logo-icon svg {
            color: #ffffff;
            width: 26px;
            height: 26px;
        }

        .logo-text {
            font-size: 1.35rem;
            font-weight: 800;
            background: linear-gradient(90deg, #e60000, #ff3333);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            letter-spacing: -0.5px;
        }

        .user-section {
            display: flex;
            align-items: center;
            gap: 1.5rem;
        }

        .user-info {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            background: linear-gradient(135deg, #f0f0f0 0%, #f5f5f5 100%);
            padding: 0.6rem 1.2rem;
            border-radius: 12px;
            border: 2px solid #e60000;
            box-shadow: 0 2px 8px rgba(230, 0, 0, 0.1);
            transition: all 0.3s ease;
        }

        .user-info:hover {
            box-shadow: 0 4px 12px rgba(230, 0, 0, 0.15);
            transform: translateY(-1px);
        }

        .user-avatar {
            width: 38px;
            height: 38px;
            background: linear-gradient(135deg, #e60000 0%, #ff3333 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 2px 8px rgba(230, 0, 0, 0.25);
            flex-shrink: 0;
        }

        .user-avatar svg {
            color: #ffffff;
            width: 22px;
            height: 22px;
        }

        .user-name {
            font-weight: 700;
            color: #1a1a1a;
            font-size: 0.95rem;
            letter-spacing: -0.3px;
        }

        .logout-btn {
            background: linear-gradient(135deg, #e60000 0%, #ff3333 100%) !important;
            color: #ffffff !important;
            border: none !important;
            width: 44px;
            height: 44px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            box-shadow: 0 4px 14px rgba(230, 0, 0, 0.3);
            padding: 0 !important;
            position: relative;
            overflow: hidden;
        }

        .logout-btn::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 0;
            height: 0;
            background: rgba(255, 255, 255, 0.3);
            border-radius: 50%;
            transform: translate(-50%, -50%);
            transition: width 0.6s, height 0.6s;
        }

        .logout-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 18px rgba(230, 0, 0, 0.4);
        }

        .logout-btn:hover::before {
            width: 100%;
            height: 100%;
        }

        .logout-btn svg {
            width: 22px;
            height: 22px;
            position: relative;
            z-index: 1;
        }

        /* === Main Container === */
        .booking-wrapper {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: calc(100vh - 80px);
            padding: 2rem 1rem;
            background: linear-gradient(135deg, #f5f7fa 0%, #e8eef5 100%);
        }

        #bookingForm {
            background: linear-gradient(135deg, #ffffff 0%, #fafbfc 100%);
            border: 3px solid #e60000;
            border-radius: 20px;
            padding: 50px;
            width: 90%;
            max-width: 850px;
            box-shadow: 0 12px 40px rgba(230, 0, 0, 0.15);
            position: relative;
            min-height: 650px;
            overflow: hidden;
        }

        h2 {
            text-align: center;
            color: #1a1a1a;
            margin-bottom: 35px;
            font-size: 2rem;
            font-weight: 800;
            letter-spacing: -0.8px;
        }

        /* === Step Sections === */
        .step {
            position: absolute;
            top: 50px;
            left: 50px;
            width: calc(100% - 100px);
            height: calc(100% - 100px);
            padding: 0;
            box-sizing: border-box;
            transition: transform 0.5s cubic-bezier(0.4, 0, 0.2, 1), opacity 0.5s ease;
            overflow-y: auto;
            opacity: 0;
            transform: translateX(100%);
            pointer-events: none;
        }

        .step.visible {
            opacity: 1;
            transform: translateX(0);
            pointer-events: auto;
        }

        .step.hidden {
            opacity: 0;
            transform: translateX(100%);
            pointer-events: none;
        }

        /* === Package Options === */
        .package-options,
        .photographer-options {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 25px;
            margin-bottom: 35px;
        }

        .package,
        .photographer {
            background: linear-gradient(135deg, #ffffff 0%, #f9f9f9 100%);
            border: 2.5px solid #e8e8e8;
            border-radius: 16px;
            padding: 25px;
            text-align: center;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            cursor: pointer;
            position: relative;
            overflow: hidden;
        }

        .package::before,
        .photographer::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 3px;
            background: linear-gradient(90deg, #e60000 0%, #ff3333 100%);
            transform: scaleX(0);
            transform-origin: left;
            transition: transform 0.3s ease;
        }

        .package:hover,
        .photographer:hover {
            transform: translateY(-8px);
            box-shadow: 0 12px 32px rgba(230, 0, 0, 0.12);
            border-color: #e60000;
        }

        .package:hover::before,
        .photographer:hover::before {
            transform: scaleX(1);
        }

        .package.selected,
        .photographer.selected {
            border: 3px solid #e60000;
            background: linear-gradient(135deg, #fff9f9 0%, #ffffff 100%);
            box-shadow: 0 8px 28px rgba(230, 0, 0, 0.2);
        }

        .package h3,
        .photographer h3 {
            color: #1a1a1a;
            font-size: 1.5rem;
            margin-bottom: 15px;
            font-weight: 700;
        }

        .package p,
        .photographer p {
            color: #555;
            font-size: 0.95rem;
            margin: 10px 0;
            line-height: 1.5;
        }

        .regular-price {
            text-decoration: line-through;
            color: #999;
            font-size: 0.9rem;
        }

        .photographer img {
            width: 100%;
            height: 180px;
            object-fit: cover;
            border-radius: 12px;
            margin-bottom: 15px;
            transition: transform 0.3s ease;
        }

        .photographer:hover img {
            transform: scale(1.05);
        }

        /* === Inputs and Labels === */
        .location-input-container,
        .time-select-container {
            margin-bottom: 25px;
        }

        .location-input-container label,
        .time-select-container label {
            display: block;
            color: #1a1a1a;
            font-weight: 700;
            margin-bottom: 10px;
            font-size: 0.95rem;
        }

        input,
        select {
            background-color: #ffffff;
            border: 2px solid #e8e8e8;
            color: #1a1a1a;
            padding: 12px 16px;
            border-radius: 10px;
            width: 100%;
            font-size: 1rem;
            box-sizing: border-box;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            font-family: inherit;
        }

        input::placeholder {
            color: #999;
        }

        input:focus,
        select:focus {
            border-color: #e60000;
            outline: none;
            box-shadow: 0 0 0 4px rgba(230, 0, 0, 0.1);
            background-color: #fafbfc;
        }

        /* === Calendar === */
        .calendar-card {
            background: linear-gradient(135deg, #ffffff 0%, #f9f9f9 100%);
            border: 2px solid #e8e8e8;
            border-radius: 16px;
            padding: 25px;
            margin-bottom: 25px;
            transition: all 0.3s ease;
        }

        .calendar-card:hover {
            border-color: #e60000;
            box-shadow: 0 8px 20px rgba(230, 0, 0, 0.08);
        }

        .calendar-header {
            display: flex;
            justify-content: center;
            gap: 15px;
            margin-bottom: 20px;
            flex-wrap: wrap;
        }

        .calendar-header select {
            background-color: #ffffff;
            color: #1a1a1a;
            border: 2px solid #e60000;
            border-radius: 10px;
            padding: 10px 14px;
            cursor: pointer;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .calendar-header select:hover {
            background-color: #fff5f5;
        }

        .calendar-grid-weekdays {
            display: grid;
            grid-template-columns: repeat(7, 1fr);
            text-align: center;
            font-weight: 700;
            color: #1a1a1a;
            margin-bottom: 15px;
            font-size: 0.9rem;
        }

        .calendar-grid-days {
            display: grid;
            grid-template-columns: repeat(7, 1fr);
            gap: 10px;
        }

        .day {
            padding: 12px;
            border-radius: 10px;
            border: 2px solid #e8e8e8;
            color: #1a1a1a;
            cursor: pointer;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            font-weight: 600;
            background: #ffffff;
        }

        .day:hover {
            background: linear-gradient(135deg, #fff5f5 0%, #ffebeb 100%);
            border-color: #e60000;
            transform: scale(1.08);
        }

        .day.selected {
            background: linear-gradient(135deg, #e60000 0%, #ff3333 100%);
            color: #ffffff;
            border-color: #e60000;
            box-shadow: 0 4px 12px rgba(230, 0, 0, 0.3);
        }

        .day.past-day {
            color: #ccc;
            border-color: #e8e8e8;
            background: #f5f5f5;
            cursor: not-allowed;
        }

        .day.today {
            border: 2px solid #e60000;
        }

        /* === Summary === */
        .summary {
            background: linear-gradient(135deg, #ffffff 0%, #f9f9f9 100%);
            border: 2.5px solid #e60000;
            border-radius: 16px;
            padding: 35px;
            margin-bottom: 30px;
            box-shadow: 0 8px 24px rgba(230, 0, 0, 0.1);
        }

        .summary h3 {
            color: #1a1a1a;
            font-size: 1.4rem;
            margin-bottom: 25px;
            font-weight: 700;
            border-bottom: 3px solid #e60000;
            padding-bottom: 15px;
        }

        .summary p {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 14px 0;
            border-bottom: 1px solid #e8e8e8;
            font-size: 1rem;
            color: #333;
        }

        .summary p:last-child {
            border-bottom: none;
        }

        .summary strong {
            color: #e60000;
            font-weight: 700;
        }

        .summary span {
            color: #1a1a1a;
            font-weight: 600;
        }

        /* === Buttons === */
        .button-group {
            display: flex;
            gap: 15px;
            margin-top: 35px;
            justify-content: space-between;
        }

        button,
        #subtn {
            padding: 14px 28px;
            border-radius: 10px;
            border: none;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            font-size: 1rem;
            position: relative;
            overflow: hidden;
        }

        button::before,
        #subtn::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 0;
            height: 0;
            background: rgba(255, 255, 255, 0.3);
            border-radius: 50%;
            transform: translate(-50%, -50%);
            transition: width 0.6s, height 0.6s;
        }

        .next-step,
        #subtn {
            background: linear-gradient(135deg, #e60000 0%, #ff3333 100%);
            color: #ffffff;
            box-shadow: 0 4px 14px rgba(230, 0, 0, 0.3);
            flex: 1;
        }

        .next-step:hover,
        #subtn:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 18px rgba(230, 0, 0, 0.4);
        }

        .next-step:hover::before,
        #subtn:hover::before {
            width: 300px;
            height: 300px;
        }

        .prev-step {
            background: linear-gradient(135deg, #888888 0%, #666666 100%);
            color: #ffffff;
            box-shadow: 0 4px 14px rgba(0, 0, 0, 0.2);
            flex: 1;
        }

        .prev-step:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 18px rgba(0, 0, 0, 0.3);
        }

        .prev-step:hover::before {
            width: 300px;
            height: 300px;
        }

        button:disabled,
        #subtn:disabled {
            background: linear-gradient(135deg, #cccccc 0%, #bbbbbb 100%);
            color: #ffffff;
            cursor: not-allowed;
            opacity: 0.6;
            box-shadow: none;
        }

        button:disabled:hover {
            transform: none;
        }

        /* === Links === */
        .btn_but {
            color: #e60000;
            font-weight: 700;
            text-decoration: none;
            transition: all 0.3s ease;
            display: inline-block;
        }

        .btn_but:hover {
            color: #cc0000;
            text-decoration: underline;
        }

        /* === Responsive === */
        @media (max-width: 768px) {
            .navbar-content {
                flex-direction: column;
                gap: 1rem;
            }

            #bookingForm {
                padding: 30px;
                min-height: auto;
            }

            .package-options,
            .photographer-options {
                grid-template-columns: 1fr;
                gap: 20px;
            }

            h2 {
                font-size: 1.5rem;
            }

            .summary p {
                flex-direction: column;
                align-items: flex-start;
                gap: 8px;
            }

            .button-group {
                flex-direction: column;
            }

            button,
            #subtn {
                width: 100%;
            }

            .user-section {
                gap: 1rem;
            }
        }
    </style>
</head>

<body>
    <!-- Enhanced Navbar -->
    <div class="navbar-top">
        <div class="navbar-content">
            <div class="logo-section">
                <div class="logo-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6.115 5.424a9 9 0 00-.9 8.676 9.09 9.09 0 0011.709.41" />
                    </svg>
                </div>
                <div class="logo-text">PhotoBook</div>
            </div>

            <div class="user-section">
                <div class="user-info">
                    <div class="user-avatar">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                        </svg>
                    </div>
                    <span class="user-name" id="userName">John Doe</span>
                </div>
                <a href="<?= page('loginpage.php') ?>" onclick="return confirm('Are you sure you want to log out?');">
                    <button class="logout-btn" title="Logout">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 9V7.5a2.25 2.25 0 012.25-2.25h.25c1.03 0 2.01.2 2.9.56l.09.03a4.522 4.522 0 011.625 1.575m0 0a4.649 4.649 0 015.197 4.356M9 12a3.75 3.75 0 010-7.5H12m0 0a3 3 0 110 6m-3-6v6m3-6h3m-3 6h3" />
                        </svg>
                    </button>
                </a>
            </div>
        </div>
    </div>

    <!-- Main Booking Form -->
    <div class="booking-wrapper">
        <form id="bookingForm" method="post">
            <!-- Step 1: Choose Package -->
            <div class="step visible" id="step1">
                <h2>📦 Choose Your Package</h2>
                <div class="package-options" id="packageparent"></div>
                <div class="button-group">
                    <a href="<?= page('users/home.php') ?>">
                        <button type="button" class="prev-step">← Back</button>
                    </a>
                    <button type="button" class="next-step" disabled id="continueStep1">Continue →</button>
                </div>
            </div>

            <!-- Step 2: Select Photographer -->
            <div class="step hidden" id="step2">
                <h2>👤 Select a Photographer</h2>
                <div id="photographerCardRow" class="photographer-options"></div>
                <div class="button-group">
                    <button type="button" class="prev-step">← Back</button>
                    <button type="button" class="next-step" disabled id="continueStep2">Continue →</button>
                </div>
            </div>

            <!-- Step 3: Select Date & Time -->
            <div class="step hidden" id="step3">
                <h2>📅 Select Date & Time</h2>
                <div class="location-input-container">
                    <label for="shootLocation">Shoot Location:</label>
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
                    <div class="calendar-grid-days" id="calendar-days"></div>
                </div>

                <div class="time-select-container">
                    <label for="shootTime">Select Start Time:</label>
                    <select id="shootTime" name="shootTime" required>
                        <option value="">Select a Time</option>
                        <option value="07:00">7:00 AM</option>
                        <option value="08:00">8:00 AM</option>
                        <option value="09:00">9:00 AM</option>
                        <option value="10:00">10:00 AM</option>
                        <option value="11:00">11:00 AM</option>
                        <option value="12:00">12:00 PM</option>
                        <option value="13:00">1:00 PM</option>
                        <option value="14:00">2:00 PM</option>
                        <option value="15:00">3:00 PM</option>
                        <option value="16:00">4:00 PM</option>
                        <option value="17:00">5:00 PM</option>
                        <option value="18:00">6:00 PM</option>
                        <option value="19:00">7:00 PM</option>
                        <option value="20:00">8:00 PM</option>
                        <option value="21:00">9:00 PM</option>
                        <option value="22:00">10:00 PM</option>
                    </select>
                </div>

                <div class="time-select-container">
                    <label for="shootTimeEnd">Select End Time:</label>
                    <select id="shootTimeEnd" name="shootTimeEnd" required>
                        <option value="">Select a Time</option>
                        <option value="08:00">8:00 AM</option>
                        <option value="09:00">9:00 AM</option>
                        <option value="10:00">10:00 AM</option>
                        <option value="11:00">11:00 AM</option>
                        <option value="12:00">12:00 PM</option>
                        <option value="13:00">1:00 PM</option>
                        <option value="14:00">2:00 PM</option>
                        <option value="15:00">3:00 PM</option>
                        <option value="16:00">4:00 PM</option>
                        <option value="17:00">5:00 PM</option>
                        <option value="18:00">6:00 PM</option>
                        <option value="19:00">7:00 PM</option>
                        <option value="20:00">8:00 PM</option>
                        <option value="21:00">9:00 PM</option>
                        <option value="22:00">10:00 PM</option>
                    </select>
                </div>

                <div class="button-group">
                    <button type="button" class="prev-step">← Back</button>
                    <button type="button" class="next-step" disabled id="continueStep3">Continue →</button>
                </div>
            </div>

            <!-- Step 4: Review and Payment -->
            <div class="step hidden" id="step4">
                <h2>✓ Review Your Booking</h2>
                <div class="summary">
                    <h3>📋 Your Selection:</h3>
                    <p><strong>Package:</strong> <span id="summary-package">-</span></p>
                    <p><strong>Photographer:</strong> <span id="summary-photographer">-</span></p>
                    <p><strong>Date & Time:</strong> <span id="summary-datetime">-</span></p>
                    <p><strong>Location:</strong> <span id="summary-location">-</span></p>
                    <p><strong>Final Price:</strong> <span id="summary-price">-</span></p>
                    <p><strong>Down Payment:</strong> <span id="summary-down-payment">-</span></p>
                </div>
                <div class="button-group">
                    <button type="button" class="prev-step">← Back</button>
                    <button id="subtn" type="button">✓ Confirm Booking</button>
                </div>
            </div>
        </form>
    </div>

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
        addEventListener("DOMContentLoaded", () => {
            subtn.addEventListener("click", () => { submitOrder() })
            function submitOrder() {
                tyrax.post({
                    url: "orders/add",
                    data: selected,
                    response: (send) => {
                        if (send.code == 200) {
                            twal.ok("Booking submitted successfully").then(() => location.href = "?page=users/home")
                        } else {
                            twal.err(send.message);
                        }
                    }
                })
            }
        })
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
            const shootTimeEndSelect = document.getElementById('shootTimeEnd');
            const continueStep1Btn = document.getElementById('continueStep1');
            const continueStep2Btn = document.getElementById('continueStep2');
            const continueStep3Btn = document.getElementById('continueStep3');

            let currentDate = new Date();
            let selectedDate = null;

            function checkStep3Inputs() {
                if (selectedDate && shootTimeSelect.value && shootTimeEndSelect.value && shootLocationInput.value) {
                    continueStep3Btn.disabled = false;
                } else {
                    continueStep3Btn.disabled = true;
                }
            }

            function disableStepValidation(stepElement) {
                const fields = stepElement.querySelectorAll('input, select');
                fields.forEach(field => {
                    if (field.hasAttribute('required')) {
                        field.dataset.required = 'true';
                        field.removeAttribute('required');
                    }
                });
            }

            function enableStepValidation(stepElement) {
                const fields = stepElement.querySelectorAll('input, select');
                fields.forEach(field => {
                    if (field.dataset.required) {
                        field.setAttribute('required', 'required');
                        field.removeAttribute('data-required');
                    }
                });
            }

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

            monthSelect.addEventListener('change', (e) => {
                currentDate.setMonth(parseInt(e.target.value));
                renderCalendar();
            });

            yearSelect.addEventListener('change', (e) => {
                currentDate.setFullYear(parseInt(e.target.value));
                renderCalendar();
            });

            shootLocationInput.addEventListener('input', checkStep3Inputs);
            shootTimeSelect.addEventListener('change', checkStep3Inputs);
            shootTimeEndSelect.addEventListener('change', checkStep3Inputs);

            document.querySelectorAll('.package').forEach(packageDiv => {
                packageDiv.addEventListener('click', () => {
                    document.querySelectorAll('.package').forEach(p => p.classList.remove('selected'));
                    packageDiv.classList.add('selected');
                    continueStep1.disabled = false;
                });
            });

            const photographerOptions = document.querySelector('.photographer-options');
            photographerOptions.addEventListener('change', () => {
                const selectedPhotographer = document.querySelector('input[name="photographer"]:checked');
                if (selectedPhotographer) {
                    selected['phname'] = selectedPhotographer.value;
                    selected['phid'] = selectedPhotographer.getAttribute("pid");
                    continueStep2Btn.disabled = false;
                } else {
                    continueStep2Btn.disabled = true;
                }
            });

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
                    if (currentStep != 3) {
                        showStep(currentStep);
                    }

                    if (currentStep == 1) {
                        displayAllphotographers();
                    }

                    if (currentStep === 3) {
                        const selectedPackageElement = document.querySelector('.package.selected');
                        const selectedPhotographer = document.querySelector('input[name="photographer"]:checked');
                        const selectedTime = document.getElementById('shootTime').value;
                        const selectedTimeEnd = document.getElementById('shootTimeEnd').value;
                        const selectedLocation = document.getElementById('shootLocation').value;

                        const selectedPackageName = selectedPackageElement ? selectedPackageElement.querySelector('h3').textContent : 'Not Selected';
                        const selectedPrice = selectedPackageElement ? selectedPackageElement.querySelector('p:nth-of-type(2)').textContent.replace('Promo Price: ', '') : 'N/A';
                        const selectedDownPayment = selectedPackageElement ? selectedPackageElement.querySelector('p:nth-of-type(3)').textContent.replace('Down Payment: ', '') : 'N/A';

                        document.getElementById('summary-package').textContent = selectedPackageName;
                        document.getElementById('summary-photographer').textContent = selected['phname'];
                        selected['date'] = selectedDate;
                        selected['time'] = selectedTime;
                        selected['timeEnd'] = selectedTimeEnd;

                        tyrax.post({
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
                                    document.getElementById('summary-price').textContent = selectedPrice;
                                    document.getElementById('summary-down-payment').textContent = selectedDownPayment;

                                    let locationParagraph = document.getElementById('summary-location-p');
                                    if (!locationParagraph) {
                                        locationParagraph = document.createElement('p');
                                        locationParagraph.id = 'summary-location-p';
                                        document.querySelector('.summary').appendChild(locationParagraph);
                                    }
                                    selected['location'] = selectedLocation;
                                    selected['customer'] = localStorage.getItem("id");
                                    document.getElementById('summary-location').textContent = selectedLocation;
                                } else {
                                    twal.err("The photographer isn't available on that date, Please choose a different day");
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

    <script>
        let basket = [];

        function attachPackageListeners() {
            const packageOptions = document.querySelectorAll('.package');
            packageOptions.forEach(packageDiv => {
                packageDiv.addEventListener('click', () => {
                    document.querySelectorAll('.package').forEach(p => p.classList.remove('selected'));
                    packageDiv.classList.add('selected');

                    $packname = packageDiv.getAttribute("packname");
                    $packid = packageDiv.getAttribute("packid");
                    $packprice = packageDiv.getAttribute("packprice");
                    $packdp = packageDiv.getAttribute("packdp");
                    selected['packname'] = $packname;
                    selected['packid'] = $packid;
                    selected['packprice'] = $packprice;
                    selected['packdp'] = $packdp;

                    const continueStep1Btn = document.getElementById('continueStep1');
                    if (continueStep1Btn) {
                        continueStep1Btn.disabled = false;
                    }
                });
            });
        }

        function displayAllphotographers(searchTerm = '') {
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
                            const description = column.description;
                            basket[user_id] = {
                                name: name,
                                lname: lname,
                                status: status,
                                skill: skill,
                                user_id: user_id,
                                description: description
                            };

                            DOM.add_html("#photographerCardRow", `
                                <div>
                                    <label class="photographer">
                                        <input type="radio" name="photographer" pid="${user_id}" value="${name + " " + lname}" required>
                                        <img src="${imageSrc}" alt="${name}">
                                        <h3>${name} ${lname}</h3>
                                        <p><strong></strong> ${skill}</p>
                                       
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
            // displayAllphotographers();
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
                            DOM.add_html("#packageparent", `
                                <div class="package" packid="${column.id}" packname="${column.package_name}" packprice="${column.price}" packdp="${column.downpayment}" data-package="basic-shoot">
                                    <h3>${column.package_name}</h3>
                                    <p class="regular-price"><strong>Original:</strong> ₱${column.original}</p>
                                    <p><strong>Promo:</strong> ₱${column.price}</p>
                                    <p><strong>Down Payment:</strong> ₱${column.downpayment}</p>
                                    <p style="color:#e60000;"><strong>Includes:</strong> ${column.description}</p>
                                </div>
                            `);
                        });
                        attachPackageListeners();
                    }
                }
            })
        }
    </script>

</body>

</html>