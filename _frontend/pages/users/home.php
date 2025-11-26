<!DOCTYPE html>
<html lang="en" class="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Package Selector</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
            background: linear-gradient(135deg, #f5f7fa 0%, #e8eef5 100%);
            color: #1a1a1a;
            min-height: 100vh;
        }

        .navbar-top {
            background: linear-gradient(90deg, #ffffff 0%, #f8fbff 100%);
            border-bottom: 2px solid #e60000;
            padding: 1rem 2rem;
            box-shadow: 0 2px 8px rgba(230, 0, 0, 0.08);
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
            width: 40px;
            height: 40px;
            background: linear-gradient(135deg, #e60000 0%, #ff3333 100%);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 4px 12px rgba(230, 0, 0, 0.3);
        }

        .logo-icon svg {
            color: #ffffff;
            width: 24px;
            height: 24px;
        }

        .logo-text {
            font-size: 1.25rem;
            font-weight: 700;
            background: linear-gradient(90deg, #e60000, #ff3333);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            letter-spacing: -0.5px;
        }

        .user-section {
            display: flex;
            align-items: center;
            gap: 2rem;
        }

        .user-info {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            background: linear-gradient(135deg, #f0f0f0 0%, #f5f5f5 100%);
            padding: 0.5rem 1rem;
            border-radius: 12px;
            border: 1px solid #e60000;
            box-shadow: 0 2px 6px rgba(230, 0, 0, 0.08);
        }

        .user-avatar {
            width: 36px;
            height: 36px;
            background: linear-gradient(135deg, #e60000 0%, #ff3333 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 2px 8px rgba(230, 0, 0, 0.2);
        }

        .user-avatar svg {
            color: #ffffff;
            width: 20px;
            height: 20px;
        }

        .user-name {
            font-weight: 600;
            color: #1a1a1a;
            font-size: 0.95rem;
            letter-spacing: -0.3px;
        }

        .logout-btn {
            background: linear-gradient(135deg, #e60000 0%, #ff3333 100%);
            color: #ffffff;
            border: none;
            width: 44px;
            height: 44px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            box-shadow: 0 4px 12px rgba(230, 0, 0, 0.25);
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
            box-shadow: 0 6px 16px rgba(230, 0, 0, 0.35);
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

        .main-container {
            max-width: 1400px;
            margin: 2rem auto;
            padding: 0 1rem;
        }

        .header-section {
            margin-bottom: 2.5rem;
        }

        .header-title {
            font-size: 2.25rem;
            font-weight: 800;
            color: #1a1a1a;
            margin-bottom: 0.5rem;
            letter-spacing: -1px;
        }

        .header-subtitle {
            font-size: 1rem;
            color: #666;
            font-weight: 400;
        }

        .nav-buttons {
            display: flex;
            gap: 1rem;
            margin-bottom: 2rem;
            flex-wrap: wrap;
        }

        .nav-btn {
            padding: 0.75rem 1.75rem;
            border-radius: 12px;
            border: none;
            font-weight: 600;
            font-size: 0.95rem;
            cursor: pointer;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            position: relative;
            overflow: hidden;
        }

        .nav-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: rgba(255, 255, 255, 0.2);
            transition: left 0.3s ease;
            z-index: -1;
        }

        .nav-btn:hover::before {
            left: 100%;
        }

        .nav-btn-active {
            background: linear-gradient(135deg, #e60000 0%, #ff3333 100%);
            color: #ffffff;
            box-shadow: 0 6px 16px rgba(230, 0, 0, 0.35);
        }

        .nav-btn-inactive {
            background: #ffffff;
            color: #1a1a1a;
            border: 2px solid #e8e8e8;
        }

        .nav-btn-inactive:hover {
            border-color: #e60000;
            background: #f9f9f9;
        }

        .packages-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
            gap: 2rem;
            margin-bottom: 2rem;
        }

        .package-card {
            background: #ffffff;
            border-radius: 16px;
            padding: 1.5rem;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
            border: 2px solid #e8e8e8;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            display: flex;
            flex-direction: column;
            position: relative;
            overflow: hidden;
        }

        .package-card::before {
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

        .package-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 12px 28px rgba(230, 0, 0, 0.15);
            border-color: #e60000;
        }

        .package-card:hover::before {
            transform: scaleX(1);
        }

        .package-card.selected {
            border: 2px solid #e60000;
            box-shadow: 0 8px 24px rgba(230, 0, 0, 0.2);
            background: linear-gradient(135deg, #ffffff 0%, #fff9f9 100%);
        }

        .package-image {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-radius: 12px;
            margin-bottom: 1.25rem;
        }

        .package-name {
            font-size: 1.4rem;
            font-weight: 700;
            color: #1a1a1a;
            margin-bottom: 0.5rem;
        }

        .package-description {
            font-size: 0.9rem;
            color: #666;
            margin-bottom: 1.5rem;
            line-height: 1.5;
            flex-grow: 1;
        }

        .select-btn {
            background: linear-gradient(135deg, #e60000 0%, #ff3333 100%);
            color: #ffffff;
            border: none;
            padding: 0.75rem 1.5rem;
            border-radius: 10px;
            font-weight: 600;
            font-size: 0.95rem;
            cursor: pointer;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            box-shadow: 0 4px 12px rgba(230, 0, 0, 0.25);
            width: 100%;
            position: relative;
            overflow: hidden;
        }

        .select-btn::before {
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

        .select-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 16px rgba(230, 0, 0, 0.35);
        }

        .select-btn:hover::before {
            width: 300px;
            height: 300px;
        }

        .select-btn span {
            position: relative;
            z-index: 1;
        }

        /* Order Section */
        .order-section-title {
            font-size: 2rem;
            font-weight: 800;
            color: #1a1a1a;
            margin-bottom: 2rem;
            text-align: center;
        }

        .order-category {
            margin-bottom: 3rem;
        }

        .order-category-title {
            font-size: 1.25rem;
            font-weight: 700;
            padding: 0.75rem 1.5rem;
            border-radius: 12px;
            margin-bottom: 1.5rem;
            display: inline-block;
            letter-spacing: -0.5px;
        }

        .order-category-title.request {
            background: linear-gradient(135deg, #fff3e0 0%, #ffe0b2 100%);
            color: #e65100;
        }

        .order-category-title.pending {
            background: linear-gradient(135deg, #e3f2fd 0%, #bbdefb 100%);
            color: #1565c0;
        }

        .order-category-title.ongoing {
            background: linear-gradient(135deg, #f3e5f5 0%, #e1bee7 100%);
            color: #6a1b9a;
        }

        .order-category-title.completed {
            background: linear-gradient(135deg, #e8f5e9 0%, #c8e6c9 100%);
            color: #2e7d32;
        }

        .order-container {
            background: #ffffff;
            border: 2px solid #e60000;
            border-radius: 14px;
            padding: 2rem;
            box-shadow: 0 4px 12px rgba(230, 0, 0, 0.1);
            margin-bottom: 1.5rem;
            transition: all 0.3s ease;
        }

        .order-container:hover {
            box-shadow: 0 6px 20px rgba(230, 0, 0, 0.2);
        }

        .order-header {
            font-size: 1.2rem;
            color: #e60000;
            font-weight: 700;
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .order-details {
            border-top: 2px solid #e60000;
            padding-top: 1.5rem;
            margin-bottom: 1.5rem;
        }

        .order-detail-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0.75rem 0;
            font-size: 0.95rem;
            border-bottom: 1px solid #e8e8e8;
        }

        .order-detail-row:last-child {
            border-bottom: none;
        }

        .order-detail-label {
            font-weight: 600;
            color: #e60000;
        }

        .order-detail-value {
            color: #1a1a1a;
            font-weight: 500;
        }

        .order-price {
            color: #e60000;
            font-weight: 700;
            font-size: 1.1rem;
        }

        .order-actions {
            display: flex;
            gap: 1rem;
            flex-wrap: wrap;
        }

        .cancel-button,
        .action-button {
            padding: 0.65rem 1.5rem;
            border-radius: 10px;
            border: none;
            font-weight: 600;
            font-size: 0.9rem;
            cursor: pointer;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            flex: 1;
            min-width: 120px;
        }

        .cancel-button {
            background: linear-gradient(135deg, #e60000 0%, #ff3333 100%);
            color: #ffffff;
            box-shadow: 0 4px 12px rgba(230, 0, 0, 0.25);
        }

        .cancel-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 16px rgba(230, 0, 0, 0.35);
        }

        .action-button {
            background: #e8e8e8;
            color: #1a1a1a;
            border: 2px solid #d0d0d0;
        }

        .action-button:hover {
            background: #d0d0d0;
        }

        .no-order {
            text-align: center;
            padding: 2rem;
            color: #999;
            font-weight: 500;
            background: #f9f9f9;
            border-radius: 12px;
            border: 2px dashed #e8e8e8;
        }

        /* Modal Enhancement */
        .modal-content {
            background: #ffffff;
            border: 2px solid #e60000;
            border-radius: 16px;
        }

        .modal-header {
            border-bottom: 2px solid #e60000;
            background: linear-gradient(135deg, #fff9f9 0%, #ffffff 100%);
        }

        .modal-title {
            font-weight: 700;
            color: #1a1a1a;
            letter-spacing: -0.5px;
        }

        .form-label {
            font-weight: 600;
            color: #1a1a1a;
        }

        .form-control {
            border: 2px solid #e8e8e8;
            border-radius: 10px;
            padding: 0.75rem;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            border-color: #e60000;
            box-shadow: 0 0 0 3px rgba(230, 0, 0, 0.1);
        }

        /* Back Button */
        #backBtn {
            background: #ffffff;
            border: 2px solid #e60000;
            width: 44px;
            height: 44px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        #backBtn:hover {
            background: #e60000;
            transform: translateX(-2px);
        }

        #backBtn svg {
            color: #e60000;
            width: 24px;
            height: 24px;
        }

        #backBtn:hover svg {
            color: #ffffff;
        }

        @media (max-width: 768px) {
            .navbar-content {
                flex-direction: column;
                gap: 1rem;
            }

            .packages-grid {
                grid-template-columns: 1fr;
            }

            .header-title {
                font-size: 1.75rem;
            }

            .order-detail-row {
                flex-direction: column;
                align-items: flex-start;
                gap: 0.5rem;
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
                        <path stroke-linecap="round" stroke-linejoin="round" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
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
                    <button id="logoutBtn" class="logout-btn" title="Logout">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 9V7.5a2.25 2.25 0 012.25-2.25h.25c1.03 0 2.01.2 2.9.56l.09.03a4.522 4.522 0 011.625 1.575m0 0a4.649 4.649 0 015.197 4.356M9 12a3.75 3.75 0 010-7.5H12m0 0a3 3 0 110 6m-3-6v6m3-6h3m-3 6h3" />
                        </svg>
                    </button>
                </a>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="main-container">
        <!-- Header -->
        <div class="header-section">
            <h1 class="header-title">Photography Services</h1>
            <p class="header-subtitle">Select your perfect photography package</p>
        </div>

        <!-- Navigation Buttons -->
        <div class="nav-buttons">
            <button id="showPackagesBtn" class="nav-btn nav-btn-active">
                📦 View Packages
            </button>
            <a href="<?= page('users/customization.php') ?>">
                <button id="showPackages2Btn" class="nav-btn nav-btn-inactive">
                    ✨ Customization
                </button>
            </a>
            <button id="showOrderBtn" class="nav-btn nav-btn-inactive">
                📋 View My Orders
            </button>
        </div>

        <!-- Packages Section -->
        <section id="packagesSection" class="packages-grid">
            <!-- Packages will be dynamically loaded here -->
        </section>

        <!-- Packages Section 2 -->
        <section id="packagesSection2" class="hidden packages-grid">
            <div class="package-card">
                <img src="https://placehold.co/300x200/e60000/white?text=Premium+A" alt="Premium Package A" class="package-image">
                <h3 class="package-name">Premium Package A</h3>
                <p class="package-description">Perfect for weddings and special occasions with professional coverage.</p>
                <button class="select-btn"><span>Select Package</span></button>
            </div>
            <div class="package-card">
                <img src="https://placehold.co/300x200/e60000/white?text=Premium+B" alt="Premium Package B" class="package-image">
                <h3 class="package-name">Premium Package B</h3>
                <p class="package-description">Includes drone and cinematic editing for your memorable moments.</p>
                <button class="select-btn"><span>Select Package</span></button>
            </div>
            <div class="package-card">
                <img src="https://placehold.co/300x200/e60000/white?text=Premium+C" alt="Premium Package C" class="package-image">
                <h3 class="package-name">Premium Package C</h3>
                <p class="package-description">All-inclusive package with full day coverage and post-production.</p>
                <button class="select-btn"><span>Select Package</span></button>
            </div>
        </section>

        <!-- Orders Section -->
        <section id="orderSection" class="hidden">
            <h2 class="order-section-title">My Orders</h2>

            <div class="order-category">
                <h3 class="order-category-title request">📝 Request Orders</h3>
                <div id="request_container">
                    <!-- Orders will be dynamically loaded here -->
                </div>
            </div>

            <div class="order-category">
                <h3 class="order-category-title pending">⏳ Pending Payment</h3>
                <div id="completedOrdersContainer">
                    <!-- Pending orders will be dynamically loaded here -->
                </div>
            </div>

            <div class="order-category">
                <h3 class="order-category-title ongoing">🎬 On Going</h3>
                <div id="on_going">
                    <!-- Ongoing orders will be dynamically loaded here -->
                </div>
            </div>

            <div class="order-category">
                <h3 class="order-category-title completed">✅ Completed</h3>
                <div id="completed">
                    <!-- Completed orders will be dynamically loaded here -->
                </div>
            </div>

            <div class="order-category">
                <h3 class="order-category-title completed">✅To Rate</h3>
                <div id="rates">
                    <!-- Completed orders will be dynamically loaded here -->
                </div>
            </div>

            <div style="text-align: center; margin-top: 2rem;">
                <button id="changePackageBtn" class="nav-btn nav-btn-active">
                    ← Back to Packages
                </button>
            </div>


        </section>
    </div>

    <!-- Payment Modal -->
    <div class="modal fade" id="paymentModal" tabindex="-1" aria-labelledby="paymentModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="paymentModalLabel">💳 Payment Information</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="bookingForm">
                        <div class="mb-3">
                            <label for="phoneNumber" class="form-label">GCash Number</label>
                            <input type="tel" class="form-control" id="phoneNumber" name="phoneNumber" placeholder="09XXXXXXXXX">
                        </div>
                        <div>
                            <input type="hidden" name="id" id="id_request">
                        </div>
                        <div class="mb-3">
                            <label for="amount" class="form-label">Down Payment Amount</label>
                            <input type="number" class="form-control" name="amount" id="amount" placeholder="0.00">
                        </div>
                        <button type="button" id="otpsend" class="btn btn-outline-danger w-100 mb-3 fw-bold">📤 Send OTP</button>
                        <div class="mb-3">
                            <label for="otp" class="form-label">OTP Code</label>
                            <input type="text" class="form-control" id="otp" name="otp" placeholder="Enter 6-digit OTP">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" id="submitForm" class="btn btn-danger fw-bold">✓ Confirm & Pay</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>



    <div class="modal fade" id="fullpayment" tabindex="-1" aria-labelledby="fullpayment" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="fullpaymentmodal">💳 Payment Information</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="fullpaymentForm">
                        <div class="mb-3">
                            <label for="phoneNum" class="form-label">GCash Number</label>
                            <input type="tel" class="form-control" id="phoneNum" name="phoneNum" placeholder="09XXXXXXXXX">
                        </div>
                        <div>
                            <input type="hidden" name="id" id="requestid" >
                        </div>
                        <div class="mb-3">
                            <label for="amount" class="form-label">full</label>
                            <input type="number" class="form-control" name="amountpay" id="amountpay" placeholder="0.00" readonly>
                        </div>
                        <button type="button" id="otpsending" class="btn btn-outline-danger w-100 mb-3 fw-bold">📤 Send OTP</button>
                        <div class="mb-3">
                            <label for="otp" class="form-label">OTP Code</label>
                            <input type="text" class="form-control" id="otps" name="otps" placeholder="Enter 6-digit OTP">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" id="submitForm" class="btn btn-danger fw-bold">✓ Confirm & Pay</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    

    <?= import_packages("datatable", "tyrax", "loading", "ctr", "path", "twal") ?>

    <script>
        addEventListener("DOMContentLoaded", () => {
            LOADING.load(true);
            setTimeout(() => LOADING.load(false), 1000)
        })
    </script>

    <script>
        function pindot(donwpayment, id) {
            amount.value = donwpayment;
            id_request.value = id;
            const myModalEl = document.getElementById('paymentModal');
            const modal = new bootstrap.Modal(myModalEl);
            modal.show();
        }
    </script>

    <script>
        function clickpay(minusprice, id) {
            amountpay.value = minusprice;
            requestid.value = id;
            const myModalEl = document.getElementById('fullpayment');
            const modal = new bootstrap.Modal(myModalEl);
            modal.show();
        }
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const packagesSection = document.getElementById('packagesSection');
            const orderSection = document.getElementById('orderSection');
            const completedOrdersContainer = document.getElementById('completedOrdersContainer');
            const showPackagesBtn = document.getElementById('showPackagesBtn');
            const showOrderBtn = document.getElementById('showOrderBtn');
            const changePackageBtn = document.getElementById('changePackageBtn');
            const showPackages2Btn = document.getElementById('showPackages2Btn');
            const packagesSection2 = document.getElementById('packagesSection2');
            const backBtn = document.getElementById('backBtn');
            const logoutBtn = document.getElementById('logoutBtn');
            const userNameEl = document.getElementById('userName');

            let pendingOrders = [];
            let completedOrders = [];

            userNameEl.textContent = 'John Doe';

            const showPackages = () => {
                packagesSection.classList.remove('hidden');
                orderSection.classList.add('hidden');
                packagesSection2.classList.add('hidden');
                
                showPackagesBtn.classList.add('nav-btn-active');
                showPackagesBtn.classList.remove('nav-btn-inactive');
                showOrderBtn.classList.add('nav-btn-inactive');
                showOrderBtn.classList.remove('nav-btn-active');
                showPackages2Btn.classList.add('nav-btn-inactive');
                showPackages2Btn.classList.remove('nav-btn-active');
            };

            const showOrder = () => {
                packagesSection.classList.add('hidden');
                orderSection.classList.remove('hidden');
                packagesSection2.classList.add('hidden');
                
                showOrderBtn.classList.add('nav-btn-active');
                showOrderBtn.classList.remove('nav-btn-inactive');
                showPackagesBtn.classList.add('nav-btn-inactive');
                showPackagesBtn.classList.remove('nav-btn-active');
                showPackages2Btn.classList.add('nav-btn-inactive');
                showPackages2Btn.classList.remove('nav-btn-active');
                renderOrders();
            };

            const showPackages2 = () => {
                packagesSection.classList.add('hidden');
                orderSection.classList.add('hidden');
                packagesSection2.classList.remove('hidden');
                
                showPackages2Btn.classList.add('nav-btn-active');
                showPackages2Btn.classList.remove('nav-btn-inactive');
                showPackagesBtn.classList.add('nav-btn-inactive');
                showPackagesBtn.classList.remove('nav-btn-active');
                showOrderBtn.classList.add('nav-btn-inactive');
                showOrderBtn.classList.remove('nav-btn-active');
            };

            const renderOrders = () => {
               // document.getElementById('request_container').innerHTML = '';
               // document.getElementById('completedOrdersContainer').innerHTML = '';
               // document.getElementById('on_going').innerHTML = '';
               // document.getElementById('completed').innerHTML = '';

                // Render request orders
                if (pendingOrders.length === 0) {
                    
                } else {
                    pendingOrders.forEach((order, index) => {
                        const orderCard = document.createElement('div');
                        orderCard.className = 'order-container';
                        orderCard.innerHTML = `
                            <div class="order-header">📸 Order Requested</div>
                            <div class="order-details">
                                <div class="order-detail-row">
                                    <span class="order-detail-label">Service Name:</span>
                                    <span class="order-detail-value">${order.name}</span>
                                </div>
                                <div class="order-detail-row">
                                    <span class="order-detail-label">Package:</span>
                                    <span class="order-detail-value">${order.package}</span>
                                </div>
                                <div class="order-detail-row">
                                    <span class="order-detail-label">Total Price:</span>
                                    <span class="order-price">₱${order.price}</span>
                                </div>
                            </div>
                            <div class="order-actions">
                                <button class="cancel-button" onclick="del(${index})">❌ Cancel Order</button>
                            </div>
                        `;
                       // document.getElementById('request_container').appendChild(orderCard);
                    });
                }

                // Render completed orders (for demo purposes)
                if (completedOrders.length === 0) {
                    //document.getElementById('completedOrdersContainer').innerHTML = '<div class="no-order">No pending payments</div>';
                }
            };

            const selectBtns = document.querySelectorAll('.select-btn');
            selectBtns.forEach(button => {
                button.addEventListener('click', () => {
                    const card = button.closest('.package-card');
                    const packageName = card.querySelector('.package-name').textContent;
                    const packageDesc = card.querySelector('.package-description').textContent;

                    pendingOrders.push({
                        name: packageName,
                        package: packageDesc,
                        price: '2,999'
                    });

                    document.querySelectorAll('.package-card').forEach(c => c.classList.remove('selected'));
                    card.classList.add('selected');

                    showOrder();
                });
            });

            showPackagesBtn.addEventListener('click', showPackages);
            showOrderBtn.addEventListener('click', showOrder);
            changePackageBtn.addEventListener('click', showPackages);
            showPackages2Btn.addEventListener('click', showPackages2);

            showPackages();
        });
    </script>

    <script>
        function del(pid) {
            twal.ask({
                text: "Do you want to cancel this order?"
            }).then((result) => {
                if (result.confirm) {
                    tyrax.post({
                        url: "orders/delete",
                        request: { id: pid },
                        response: function(send) {
                            if (send.code == 200) {
                                twal.ok({
                                    text: "Canceled Successfully"
                                }).then(() => location.reload());
                            }
                        }
                    })
                }
            });
        }
    </script>

    <script>
        addEventListener("DOMContentLoaded", function() {
            tyrax.get({
                url: "services/get",
                response: (send) => {
                    let data = send.data;
                    data.forEach(column => {
                        $id = column.servicesID;
                        $sname = column.services_name;
                        DOM.add_html("#packagesSection", `
                        <div class="package-card">
                            <img src="${column.img}" alt="${column.services_name}" class="package-image">
                            <h3 class="package-name">${column.services_name}</h3>
                            <p class="package-description">${column.description}</p>
                            <a href="${PATH.page("users/package", {id:$id,sname:$sname})}">
                                <button class="select-btn"><span>Select Package</span></button>
                            </a>
                        </div>`)
                    });
                },
            })
        })
    </script>

    <script>
        addEventListener("DOMContentLoaded", function() {
            tyrax.get({
                url: "request/get",
                //inspect:true,
                request: {
                    user: localStorage.getItem("id")
                },
                response: (send) => {
                    let data = send.data;
                    if (data.length == 0) {
                        return;
                    }
                    //document.getElementById('request_container').innerHTML = '<div class="no-order">No request orders yet</div>';
                    data.forEach(column => {
                        let container = "#";
                        let status = column.status;
                        let button = ``;
                        let minusprice = column.price - column.downpayment;
                        
                        
                        if (status == 1) {
                            container = '#request_container';
                            button = `<button class="cancel-button" onclick="del(${column.id})">❌ Cancel Order</button>`;
                        }

                        if (status == 2) {
                            container = '#completedOrdersContainer';
                            let canceled = `<button class="cancel-button" onclick="del(${column.id})">❌ Cancel</button>`;
                            button = `<button class="cancel-button action-button" onclick="pindot(${column.downpayment},${column.id})">💳 Pay Now</button> ${canceled}`;
                        }

                        if (status == 3) {
                            container = '#on_going';
                            button = `<button class="action-button">🎬 In Progress</button>`;
                        }
                        
                        if (status == 4) {
                            container = '#completed';
                            button = `<button onclick="clickpay(${minusprice},${column.id})" class="action-button">Pay</button>`;
                        }

                        if (status == 5) {
                            container = '#rates';
                            button = `<button class="action-button">Rate</button>`;
                        }

                        document.querySelector(container).innerHTML= ""
                        CTR.add_html(container, `
                            <div class="order-container">
                                <div class="order-header">📸 Order Details</div>
                                <div class="order-details">
                                    <div class="order-detail-row">
                                        <span class="order-detail-label">Service:</span>
                                        <span class="order-detail-value">${column.services_name}</span>
                                    </div>
                                    <div class="order-detail-row">
                                        <span class="order-detail-label">Package:</span>
                                        <span class="order-detail-value">${column.package_name}</span>
                                    </div>
                                    <div class="order-detail-row">
                                        <span class="order-detail-label">Photographer:</span>
                                        <span class="order-detail-value">${column.photographer}</span>
                                    </div>
                                    <div class="order-detail-row">
                                        <span class="order-detail-label">Date & Time:</span>
                                        <span class="order-detail-value">${column.date_time}</span>
                                    </div>
                                    <div class="order-detail-row">
                                        <span class="order-detail-label">Total Price:</span>
                                        <span class="order-price">₱${column.price}</span>
                                    </div>
                                    <div class="order-detail-row">
                                        <span class="order-detail-label">Down Payment:</span>
                                        <span class="order-price">₱${column.downpayment}</span>
                                    </div>
                                </div>
                                <div class="order-actions">
                                    ${button}  
                                </div>
                            </div>`)
                    });
                },
            })
        })
    </script>




<script>
        addEventListener("DOMContentLoaded", () => {
            otpsending.addEventListener("click", () => {
                smsSend()
            })

            function smsSend() {
                $data = {
                    phoneNum: phoneNum.value,
                    amountpay: amountpay.value
                }
                tyrax.post({
                    url: "fullpay/otpsend",
                    data: $data,
                    //test:true,
                    wait: () => {
                        window.LOADING.load(true)
                    },
                    done: () => {
                        window.LOADING.load(false)
                    },
                    response: (send) => {
                        if (send.code == 200) {
                            twal.ok("OTP Sent Successfully")
                        } else {
                            twal.err(send.message);
                        }
                    }
                })
            }

            CTR.submit("#fullpaymentForm", (formdata) => {
                tyrax.post({
                    url: "fullpay/fullpayment",
                    data: formdata,
                    //test:true,
                    response: (send) => {
                        if (send.code == 200) {
                            twal.ok("Payment Confirmed").then(() => location.href = PATH.page("users/home"));
                        } else {
                            twal.err(send.message);
                        }
                    }
                });
            });
        })
    </script>







    <script>
        addEventListener("DOMContentLoaded", () => {
            otpsend.addEventListener("click", () => {
                sendOtp()
            })

            function sendOtp() {
                $data = {
                    phoneNumber: phoneNumber.value,
                    amount: amount.value
                }
                tyrax.post({
                    url: "payment/otp",
                    data: $data,
                    wait: () => {
                        window.LOADING.load(true)
                    },
                    done: () => {
                        window.LOADING.load(false)
                    },
                    response: (send) => {
                        if (send.code == 200) {
                            twal.ok("OTP Sent Successfully")
                        } else {
                            twal.err(send.message);
                        }
                    }
                })
            }

            CTR.submit("#bookingForm", (formdata) => {
                tyrax.post({
                    url: "payment/pay",
                    data: formdata,
                    //test:true,
                    response: (send) => {
                        if (send.code == 200) {
                            twal.ok("Payment Confirmed").then(() => location.href = PATH.page("users/home"));
                        } else {
                            twal.err(send.message);
                        }
                    }
                });
            });
        })
    </script>

</body>

</html>