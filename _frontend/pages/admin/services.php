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
        <?= include_page('sidebar') ?>
        <!-- Sidebar End -->

        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            <?= include_page('navbar') ?>
            <!-- Navbar End -->

            <!-- Services Page Content Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-light rounded p-4 main-content-wrapper">

                    <!-- Enhanced Header Section -->
                    <div class="header-section d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-4">
                        <div class="header-left mb-3 mb-md-0">
                            <h1 class="page-title">Services</h1>
                            <p class="page-subtitle">Manage your photography services</p>
                        </div>
                        <div class="header-right d-flex flex-column flex-sm-row align-items-stretch align-items-sm-center">
                            <div class="search-wrapper me-sm-3 mb-2 mb-sm-0">
                                <i class="bi bi-search search-icon"></i>
                                <input type="text" id="serviceSearchInput" class="search-input" placeholder="Search services...">
                            </div>
                            <button type="button" class="btn-new-service" data-bs-toggle="modal" data-bs-target="#createServiceModal">
                                <i class="bi bi-plus-circle me-2"></i>
                                New Service
                            </button>
                        </div>
                    </div>

                    <!-- Tab Navigation -->
                    <ul class="nav nav-tabs services-tabs mb-4" id="servicesTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="all-services-tab" data-bs-toggle="tab" data-bs-target="#all-services-content" type="button" role="tab">
                                All Services
                            </button>
                        </li>
                    </ul>

                    <!-- Enhanced Styles -->
                    <style>
                        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap');

                        * {
                            font-family: 'Poppins', sans-serif;
                        }

                        body {
                            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
                        }

                        .main-content-wrapper {
                            background: linear-gradient(135deg, #ffffff 0%, #f8f9fc 100%) !important;
                            border-radius: 24px !important;
                            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.08), 0 0 0 1px rgba(0, 0, 0, 0.05);
                            padding: 3rem !important;
                            animation: fadeInUp 0.6s ease-out;
                            position: relative;
                            overflow: hidden;
                        }

                        .main-content-wrapper::before {
                            content: '';
                            position: absolute;
                            top: 0;
                            right: 0;
                            width: 400px;
                            height: 400px;
                            background: radial-gradient(circle, rgba(220, 53, 69, 0.05) 0%, transparent 70%);
                            border-radius: 50%;
                            pointer-events: none;
                        }

                        @keyframes fadeInUp {
                            from {
                                opacity: 0;
                                transform: translateY(30px);
                            }
                            to {
                                opacity: 1;
                                transform: translateY(0);
                            }
                        }

                        /* Enhanced Header */
                        .header-section {
                            padding-bottom: 2rem;
                            border-bottom: 3px solid transparent;
                            background: linear-gradient(white, white) padding-box,
                                        linear-gradient(135deg, #dc3545, #ff6b6b) border-box;
                            border-radius: 16px;
                            border: 3px solid transparent;
                            margin-bottom: 2.5rem !important;
                            padding: 1.5rem;
                            position: relative;
                        }

                        .header-section::after {
                            content: '';
                            position: absolute;
                            bottom: -15px;
                            left: 50%;
                            transform: translateX(-50%);
                            width: 60px;
                            height: 4px;
                            background: linear-gradient(90deg, #dc3545, #ff6b6b);
                            border-radius: 2px;
                        }

                        .page-title {
                            font-size: 3rem;
                            font-weight: 900;
                            background: linear-gradient(135deg, #dc3545 0%, #ff6b6b 50%, #c82333 100%);
                            -webkit-background-clip: text;
                            -webkit-text-fill-color: transparent;
                            background-clip: text;
                            margin: 0;
                            letter-spacing: -1px;
                            text-shadow: 0 4px 20px rgba(220, 53, 69, 0.1);
                            animation: titlePulse 3s ease-in-out infinite;
                        }

                        @keyframes titlePulse {
                            0%, 100% { transform: scale(1); }
                            50% { transform: scale(1.02); }
                        }

                        .page-subtitle {
                            color: #6c757d;
                            font-size: 1rem;
                            margin: 0.75rem 0 0 0;
                            font-weight: 500;
                            letter-spacing: 0.5px;
                        }

                        /* Enhanced Search Input */
                        .search-wrapper {
                            position: relative;
                            max-width: 340px;
                        }

                        .search-icon {
                            position: absolute;
                            left: 18px;
                            top: 50%;
                            transform: translateY(-50%);
                            color: #adb5bd;
                            font-size: 1.2rem;
                            pointer-events: none;
                            transition: all 0.3s ease;
                            z-index: 1;
                        }

                        .search-input {
                            width: 100%;
                            padding: 1rem 1.25rem 1rem 3.5rem;
                            border: 2px solid #e9ecef;
                            border-radius: 16px;
                            font-size: 0.95rem;
                            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
                            background: #ffffff;
                            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.04);
                            font-weight: 500;
                        }

                        .search-input:focus {
                            outline: none;
                            border-color: #dc3545;
                            box-shadow: 0 0 0 5px rgba(220, 53, 69, 0.1), 0 4px 20px rgba(220, 53, 69, 0.15);
                            transform: translateY(-2px);
                        }

                        .search-input:focus ~ .search-icon {
                            color: #dc3545;
                            transform: translateY(-50%) scale(1.1);
                        }

                        .search-input::placeholder {
                            color: #adb5bd;
                        }

                        /* Enhanced New Service Button */
                        .btn-new-service {
                            background: linear-gradient(135deg, #dc3545 0%, #ff6b6b 50%, #c82333 100%);
                            color: white;
                            border: none;
                            padding: 1rem 2rem;
                            border-radius: 16px;
                            font-weight: 700;
                            font-size: 0.95rem;
                            min-width: 170px;
                            box-shadow: 0 8px 25px rgba(220, 53, 69, 0.4), 0 0 0 0 rgba(220, 53, 69, 0.5);
                            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
                            position: relative;
                            overflow: hidden;
                            text-transform: uppercase;
                            letter-spacing: 1px;
                        }

                        .btn-new-service::before {
                            content: '';
                            position: absolute;
                            top: 50%;
                            left: 50%;
                            width: 0;
                            height: 0;
                            border-radius: 50%;
                            background: rgba(255, 255, 255, 0.3);
                            transform: translate(-50%, -50%);
                            transition: width 0.6s ease, height 0.6s ease;
                        }

                        .btn-new-service:hover::before {
                            width: 300px;
                            height: 300px;
                        }

                        .btn-new-service:hover {
                            transform: translateY(-3px) scale(1.02);
                            box-shadow: 0 12px 35px rgba(220, 53, 69, 0.5), 0 0 0 8px rgba(220, 53, 69, 0.1);
                        }

                        .btn-new-service:active {
                            transform: translateY(-1px) scale(0.98);
                        }

                        .btn-new-service i {
                            transition: transform 0.3s ease;
                        }

                        .btn-new-service:hover i {
                            transform: rotate(90deg);
                        }

                        /* Enhanced Tabs */
                        .services-tabs {
                            border: none;
                            gap: 1.5rem;
                            margin-bottom: 2.5rem !important;
                        }

                        .services-tabs .nav-link {
                            color: #868e96;
                            border: none;
                            border-bottom: 4px solid transparent;
                            padding: 1rem 2rem;
                            background: transparent;
                            font-weight: 700;
                            font-size: 1rem;
                            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
                            border-radius: 12px 12px 0 0;
                            position: relative;
                            letter-spacing: 0.5px;
                        }

                        .services-tabs .nav-link::before {
                            content: '';
                            position: absolute;
                            bottom: 0;
                            left: 0;
                            right: 0;
                            height: 4px;
                            background: linear-gradient(90deg, #dc3545, #ff6b6b);
                            transform: scaleX(0);
                            transition: transform 0.4s cubic-bezier(0.4, 0, 0.2, 1);
                        }

                        .services-tabs .nav-link:hover {
                            color: #dc3545;
                            background: linear-gradient(to bottom, rgba(220, 53, 69, 0.08), rgba(220, 53, 69, 0.03));
                            transform: translateY(-2px);
                        }

                        .services-tabs .nav-link.active {
                            color: #dc3545;
                            background: linear-gradient(to bottom, rgba(220, 53, 69, 0.1), rgba(220, 53, 69, 0.05));
                            box-shadow: 0 4px 15px rgba(220, 53, 69, 0.1);
                        }

                        .services-tabs .nav-link.active::before {
                            transform: scaleX(1);
                        }

                        /* Enhanced Service Cards */
                        .service-card {
                            transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
                            border: none;
                            border-radius: 24px;
                            overflow: hidden;
                            background: white;
                            position: relative;
                            animation: fadeInScale 0.6s ease-out backwards;
                            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
                        }

                        @keyframes fadeInScale {
                            from {
                                opacity: 0;
                                transform: scale(0.9) translateY(20px);
                            }
                            to {
                                opacity: 1;
                                transform: scale(1) translateY(0);
                            }
                        }

                        .service-card:nth-child(1) { animation-delay: 0.1s; }
                        .service-card:nth-child(2) { animation-delay: 0.15s; }
                        .service-card:nth-child(3) { animation-delay: 0.2s; }
                        .service-card:nth-child(4) { animation-delay: 0.25s; }
                        .service-card:nth-child(5) { animation-delay: 0.3s; }
                        .service-card:nth-child(6) { animation-delay: 0.35s; }
                        .service-card:nth-child(7) { animation-delay: 0.4s; }
                        .service-card:nth-child(8) { animation-delay: 0.45s; }

                        .service-card::before {
                            content: '';
                            position: absolute;
                            top: 0;
                            left: 0;
                            right: 0;
                            height: 6px;
                            background: linear-gradient(90deg, #dc3545, #ff6b6b, #c82333);
                            transform: scaleX(0);
                            transform-origin: left;
                            transition: transform 0.5s cubic-bezier(0.4, 0, 0.2, 1);
                        }

                        .service-card::after {
                            content: '';
                            position: absolute;
                            top: 0;
                            left: 0;
                            right: 0;
                            bottom: 0;
                            background: linear-gradient(135deg, rgba(220, 53, 69, 0.03), rgba(255, 107, 107, 0.03));
                            opacity: 0;
                            transition: opacity 0.5s ease;
                            pointer-events: none;
                        }

                        .service-card:hover {
                            transform: translateY(-12px) scale(1.02);
                            box-shadow: 0 25px 50px rgba(220, 53, 69, 0.2), 0 0 0 1px rgba(220, 53, 69, 0.1);
                        }

                        .service-card:hover::before {
                            transform: scaleX(1);
                        }

                        .service-card:hover::after {
                            opacity: 1;
                        }

                        .service-card .card-img-top {
                            height: 240px;
                            object-fit: cover;
                            transition: all 0.6s cubic-bezier(0.4, 0, 0.2, 1);
                            position: relative;
                        }

                        .service-card:hover .card-img-top {
                            transform: scale(1.15);
                            filter: brightness(1.1);
                        }

                        .service-card .card-body {
                            padding: 1.75rem;
                            position: relative;
                            z-index: 1;
                        }

                        .service-card .card-title {
                            font-size: 1.35rem;
                            font-weight: 700;
                            color: #212529;
                            margin-bottom: 0.85rem;
                            transition: all 0.3s ease;
                            letter-spacing: -0.3px;
                        }

                        .service-card:hover .card-title {
                            color: #dc3545;
                            transform: translateX(5px);
                        }

                        .service-card .card-text {
                            color: #6c757d;
                            font-size: 0.92rem;
                            line-height: 1.7;
                            font-weight: 400;
                        }

                        .service-card .card-footer {
                            background: linear-gradient(to bottom, #f8f9fa, #ffffff);
                            border-top: 2px solid #f1f3f5;
                            padding: 1.25rem 1.75rem;
                            position: relative;
                            z-index: 1;
                        }

                        .service-card .card-footer small {
                            font-weight: 600;
                            color: #868e96;
                            font-size: 0.8rem;
                        }

                        /* Enhanced Action Buttons */
                        .card-actions .btn {
                            width: 42px;
                            height: 42px;
                            padding: 0;
                            display: inline-flex;
                            align-items: center;
                            justify-content: center;
                            border-radius: 12px;
                            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
                            font-size: 1.1rem;
                            position: relative;
                            overflow: hidden;
                            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
                        }

                        .card-actions .btn::before {
                            content: '';
                            position: absolute;
                            top: 50%;
                            left: 50%;
                            width: 0;
                            height: 0;
                            border-radius: 50%;
                            background: rgba(255, 255, 255, 0.5);
                            transform: translate(-50%, -50%);
                            transition: width 0.4s ease, height 0.4s ease;
                        }

                        .card-actions .btn:hover::before {
                            width: 100px;
                            height: 100px;
                        }

                        .card-actions .btn-outline-success {
                            border: 2.5px solid #28a745;
                            color: #28a745;
                            background: linear-gradient(135deg, rgba(40, 167, 69, 0.05), rgba(40, 167, 69, 0.1));
                        }

                        .card-actions .btn-outline-success:hover {
                            background: linear-gradient(135deg, #28a745, #20c997);
                            color: white;
                            transform: translateY(-3px) rotate(90deg);
                            box-shadow: 0 8px 20px rgba(40, 167, 69, 0.4);
                            border-color: #28a745;
                        }

                        .card-actions .btn-outline-danger {
                            border: 2.5px solid #dc3545;
                            color: #dc3545;
                            background: linear-gradient(135deg, rgba(220, 53, 69, 0.05), rgba(220, 53, 69, 0.1));
                        }

                        .card-actions .btn-outline-danger:hover {
                            background: linear-gradient(135deg, #dc3545, #ff6b6b);
                            color: white;
                            transform: translateY(-3px) scale(1.15);
                            box-shadow: 0 8px 20px rgba(220, 53, 69, 0.4);
                            border-color: #dc3545;
                        }

                        .card-actions .btn-outline-primary {
                            border: 2.5px solid #007bff;
                            color: #007bff;
                            background: linear-gradient(135deg, rgba(0, 123, 255, 0.05), rgba(0, 123, 255, 0.1));
                        }

                        .card-actions .btn-outline-primary:hover {
                            background: linear-gradient(135deg, #007bff, #0056b3);
                            color: white;
                            transform: translateY(-3px) scale(1.15);
                            box-shadow: 0 8px 20px rgba(0, 123, 255, 0.4);
                            border-color: #007bff;
                        }

                        .card-actions .btn i {
                            transition: transform 0.3s ease;
                            position: relative;
                            z-index: 1;
                        }

                        .card-actions .btn:active {
                            transform: scale(0.9);
                        }

                        /* Empty State */
                        .empty-state-container {
                            padding: 120px 20px;
                            text-align: center;
                            animation: fadeIn 0.8s ease-out;
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

                        .empty-state-container i {
                            animation: float 3s ease-in-out infinite;
                        }

                        @keyframes float {
                            0%, 100% { transform: translateY(0); }
                            50% { transform: translateY(-20px); }
                        }

                        .empty-state-container h3 {
                            font-size: 2rem;
                            font-weight: 800;
                            color: #212529;
                            margin-bottom: 1rem;
                            background: linear-gradient(135deg, #dc3545, #ff6b6b);
                            -webkit-background-clip: text;
                            -webkit-text-fill-color: transparent;
                        }

                        .empty-state-container p {
                            color: #6c757d;
                            font-size: 1.1rem;
                            font-weight: 500;
                        }

                        /* Modal Enhancements */
                        .modal-content {
                            border-radius: 24px;
                            border: none;
                            box-shadow: 0 30px 80px rgba(0, 0, 0, 0.3);
                            overflow: hidden;
                            animation: modalSlideIn 0.4s cubic-bezier(0.4, 0, 0.2, 1);
                        }

                        @keyframes modalSlideIn {
                            from {
                                opacity: 0;
                                transform: translateY(-50px) scale(0.9);
                            }
                            to {
                                opacity: 1;
                                transform: translateY(0) scale(1);
                            }
                        }

                        .modal-header {
                            background: linear-gradient(135deg, #dc3545 0%, #ff6b6b 50%, #c82333 100%);
                            color: white;
                            border-radius: 24px 24px 0 0;
                            padding: 2rem;
                            border: none;
                            position: relative;
                            overflow: hidden;
                        }

                        .modal-header::before {
                            content: '';
                            position: absolute;
                            top: -50%;
                            right: -50%;
                            width: 200%;
                            height: 200%;
                            background: radial-gradient(circle, rgba(255, 255, 255, 0.1) 0%, transparent 70%);
                            animation: rotate 20s linear infinite;
                        }

                        @keyframes rotate {
                            from { transform: rotate(0deg); }
                            to { transform: rotate(360deg); }
                        }

                        .modal-header .modal-title {
                            font-weight: 800;
                            font-size: 1.5rem;
                            position: relative;
                            z-index: 1;
                            letter-spacing: 0.5px;
                        }

                        .modal-header .btn-close {
                            filter: brightness(0) invert(1);
                            opacity: 0.9;
                            position: relative;
                            z-index: 1;
                            transition: all 0.3s ease;
                            width: 35px;
                            height: 35px;
                            background-size: 20px;
                        }

                        .modal-header .btn-close:hover {
                            opacity: 1;
                            transform: rotate(90deg) scale(1.1);
                        }

                        .modal-body {
                            padding: 2.5rem;
                            background: linear-gradient(to bottom, #ffffff, #f8f9fa);
                        }

                        .modal-body .form-label {
                            font-weight: 700;
                            color: #212529;
                            margin-bottom: 0.75rem;
                            font-size: 0.95rem;
                            letter-spacing: 0.3px;
                        }

                        .modal-body .form-control,
                        .modal-body .form-select {
                            border: 2.5px solid #e9ecef;
                            border-radius: 14px;
                            padding: 0.95rem 1.25rem;
                            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
                            font-weight: 500;
                            background: white;
                        }

                        .modal-body .form-control:focus,
                        .modal-body .form-select:focus {
                            border-color: #dc3545;
                            box-shadow: 0 0 0 5px rgba(220, 53, 69, 0.1), 0 4px 20px rgba(220, 53, 69, 0.15);
                            transform: translateY(-2px);
                        }

                        .modal-body textarea.form-control {
                            resize: vertical;
                            min-height: 120px;
                        }

                        .modal-footer {
                            padding: 1.75rem 2.5rem;
                            border: none;
                            background: #f8f9fa;
                            gap: 12px;
                        }

                        .modal-footer .btn {
                            padding: 0.9rem 2rem;
                            border-radius: 14px;
                            font-weight: 700;
                            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
                            font-size: 0.95rem;
                            text-transform: uppercase;
                            letter-spacing: 0.5px;
                            position: relative;
                            overflow: hidden;
                        }

                        .modal-footer .btn::before {
                            content: '';
                            position: absolute;
                            top: 50%;
                            left: 50%;
                            width: 0;
                            height: 0;
                            border-radius: 50%;
                            background: rgba(255, 255, 255, 0.3);
                            transform: translate(-50%, -50%);
                            transition: width 0.4s ease, height 0.4s ease;
                        }

                        .modal-footer .btn:hover::before {
                            width: 300px;
                            height: 300px;
                        }

                        .modal-footer .btn-secondary {
                            background: linear-gradient(135deg, #6c757d, #5a6268);
                            border: none;
                            box-shadow: 0 4px 15px rgba(108, 117, 125, 0.3);
                        }

                        .modal-footer .btn-secondary:hover {
                            background: linear-gradient(135deg, #5a6268, #495057);
                            transform: translateY(-2px);
                            box-shadow: 0 6px 20px rgba(108, 117, 125, 0.4);
                        }

                        .modal-footer .btn-primary {
                            background: linear-gradient(135deg, #dc3545, #ff6b6b, #c82333);
                            border: none;
                            box-shadow: 0 4px 15px rgba(220, 53, 69, 0.4);
                        }

                        .modal-footer .btn-primary:hover {
                            transform: translateY(-2px);
                            box-shadow: 0 6px 25px rgba(220, 53, 69, 0.5);
                        }

                        /* Responsive Enhancements */
                        @media (max-width: 768px) {
                            .page-title {
                                font-size: 2.25rem;
                            }

                            .main-content-wrapper {
                                padding: 2rem !important;
                            }

                            .search-wrapper {
                                max-width: 100%;
                            }

                            .btn-new-service {
                                width: 100%;
                            }

                            .service-card .card-img-top {
                                height: 200px;
                            }

                            .card-actions .btn {
                                width: 38px;
                                height: 38px;
                            }
                        }

                        /* Enhanced Scrollbar Styling */
                        ::-webkit-scrollbar {
                            width: 12px;
                            height: 12px;
                        }

                        ::-webkit-scrollbar-track {
                            background: #f1f3f5;
                            border-radius: 10px;
                        }

                        

                        /* Loading Animation */
                        @keyframes pulse {
                            0%, 100% {
                                opacity: 1;
                            }
                            50% {
                                opacity: 0.5;
                            }
                        }

                        /* Smooth Page Transitions */
                        .content {
                            animation: pageSlideIn 0.5s ease-out;
                        }

                        @keyframes pageSlideIn {
                            from {
                                opacity: 0;
                                transform: translateX(20px);
                            }
                            to {
                                opacity: 1;
                                transform: translateX(0);
                            }
                        }

                        /* Focus Visible for Accessibility */
                        *:focus-visible {
                            outline: 3px solid rgba(220, 53, 69, 0.5);
                            outline-offset: 2px;
                        }

                        /* Backdrop Blur Effect */
                        .modal.show .modal-dialog {
                            backdrop-filter: blur(5px);
                        }

                        /* Card Image Overlay Effect */
                        .service-card .card-img-top-wrapper {
                            position: relative;
                            overflow: hidden;
                        }

                        /* Gradient Overlay on Hover */
                        .service-card::after {
                            pointer-events: none;
                        }
                    </style>

                    <!-- Tab Content -->
                    <div class="tab-content" id="servicesTabContent">
                        <!-- All Services -->
                        <div class="tab-pane fade show active" id="all-services-content" role="tabpanel">
                            <div id="allServicesContainer" class="row g-4"></div>
                            <div id="noServicesMessage" class="text-center empty-state-container" style="display: none;">
                                <i class="bi bi-inbox" style="font-size: 4rem; color: #dee2e6; margin-bottom: 1rem;"></i>
                                <h3>No services found</h3>
                                <p>Create a new service to get started or refine your search.</p>
                            </div>
                            <div class="d-flex justify-content-end text-muted small mt-3" id="allServicesCount"></div>
                        </div>
                    </div>

                    <!-- Create Service Modal -->
                    <div class="modal fade" id="createServiceModal" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Create a New Service</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>
                                <div class="modal-body">
                                    <form id="createServiceForm">
                                        <div class="mb-3">
                                            <label for="serviceName" class="form-label">Service Name</label>
                                            <input type="text" class="form-control" id="serviceName" name="services_name" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="serviceDescription" class="form-label">Description</label>
                                            <textarea class="form-control" id="serviceDescription" rows="4" name="description" required></textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label for="serviceImage" class="form-label">Upload Image</label>
                                            <input type="file" class="form-control" id="serviceImage" accept="image/*" name="img">
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                    <button type="submit" class="btn btn-primary" form="createServiceForm">Save Service</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Edit Service Modal -->
                    <div class="modal fade" id="editServiceModal" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Edit Service</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>
                                <form id="editServiceForm">
                                    <div class="modal-body">
                                        <input type="hidden" name="sevicesID" id="uservicesID">
                                        <div class="mb-3">
                                            <label for="uservices_name" class="form-label">Service Name</label>
                                            <input type="text" class="form-control" id="uservices_name" name="services_name" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="udescription" class="form-label">Description</label>
                                            <textarea class="form-control" id="udescription" rows="4" name="description" required></textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label for="uimg" class="form-label">Upload Image</label>
                                            <input type="file" class="form-control" id="uimg" accept="image/*" name="img">
                                            <img id="currentServiceImagePreview" src="" alt="Preview" class="mt-2 img-fluid rounded" style="max-height:150px; display:none;">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                        <button type="submit" class="btn btn-primary">Update Service</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="<?= assets() ?>/lib/chart/chart.min.js"></script>
    <script src="<?= assets() ?>/lib/easing/easing.min.js"></script>
    <script src="<?= assets() ?>/lib/waypoints/waypoints.min.js"></script>
    <script src="<?= assets() ?>/lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="<?= assets() ?>/lib/tempusdominus/js/moment.min.js"></script>
    <script src="<?= assets() ?>/lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="<?= assets() ?>/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>
    <script src="<?= assets() ?>/js/main.js"></script>
    <?= import_twal() ?>
    <?= import_tyrux() ?>

    <script>
        const assetsBasePath = "http://localhost/PHOTOGRAP/_frontend/assets";

        let basket = [];

        function displayAllServices(searchTerm = '') {
            const $container = $('#allServicesContainer');
            const $countDisplay = $('#allServicesCount');
            const $noServicesMessage = $('#noServicesMessage');
            $container.empty();
            $noServicesMessage.hide();

            tyrax.get({
                url: "services/get",
                response: function(send) {
                    if (send.code == 200) {
                        const data = send.data;
                        data.forEach(column => {
                            const imageSrc = column.img || "<?= assets('img/placeholder.png') ?>";
                            const description = column.description;
                            const services_name = column.services_name;
                            const servicesID = column.servicesID;
                            basket[servicesID] = {
                                description: description,
                                services_name: services_name,
                                servicesID: servicesID
                            };

                            const cardHtml = `
                            <div class="col-12 col-md-6 col-lg-4 col-xl-3 mb-4">
                                <div class="card h-100 service-card shadow-sm">
                                    <img src="${imageSrc}" class="card-img-top" alt="${services_name || ''}">
                                    <div class="card-body d-flex flex-column">
                                        <h5 class="card-title">${column.services_name || 'N/A'}</h5>
                                        <p class="card-text flex-grow-1"><small class="text-muted">${description}</small></p>
                                    </div>
                                    <div class="card-footer d-flex justify-content-between align-items-center">
                                        <small class="text-muted">Updated: <?= now() ?></small>
                                        <div class="card-actions d-flex align-items-center">
                                            <a href="<?= page('admin/packages?id=') ?>${servicesID}">
                                                <button class="btn btn-sm btn-outline-success me-1" title="Add Package">
                                                    <i class="bi bi-plus-circle-fill"></i>
                                                </button>
                                            </a>
                                            <button class="btn btn-sm btn-outline-danger me-1" onclick="del_services('${servicesID}')" title="Delete">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                            <button class="btn btn-sm btn-outline-primary" onclick="openEditModal('${servicesID}')" title="Edit">
                                                <i class="bi bi-pencil-square"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>`;
                            $container.append(cardHtml);
                        });
                    }
                }
            })
        }

        $('#serviceSearchInput').on('keyup', function() {
            displayAllServices($(this).val());
        });

        window.addEventListener("DOMContentLoaded", function() {
            displayAllServices();
        });
    </script>

    <script>
        createServiceForm.addEventListener("submit", function(event) {
            event.preventDefault();
            $data = DOM.form_object("#createServiceForm");

            tyrax.post({
                url: "services/add",
                request: $data,
                response: (send) => {
                    if (send.code == 300) {
                        twal.err({
                            text: send.message
                        })
                    }
                    if (send.code == 200) {
                        twal.ok({
                            text: send.message
                        }).then(() => location.reload())
                    }
                }
            })
        })
    </script>

    <script>
        function del_services(servicesID) {
            twal.ask(`Are you sure to delete Service id ${servicesID}`)
                .then((click) => {
                    if (click.confirm) {
                        tyrax.post({
                            url: "services/delete",
                            request: {
                                servicesID: servicesID
                            },
                            response: (send) => {
                                if (send.code == 300) {
                                    twal.err({
                                        text: send.message
                                    })
                                }
                                if (send.code == 200) {
                                    twal.ok({
                                        text: send.message
                                    }).then(() => location.reload())
                                }
                            }
                        })
                    }
                });
        }
    </script>

    <script>
        function openEditModal(id) {
            $('#editServiceModal').modal("show");
            let selected = basket[id];
            console.log(selected);
            uservices_name.value = selected.services_name;
            udescription.value = selected.description;
            uservicesID.value = selected.servicesID;

            editServiceForm.addEventListener("submit", function(event) {
                event.preventDefault();
                $data = DOM.form_object("#editServiceForm");

                tyrax.post({
                    url: "services/update",
                    request: $data,
                    response: (send) => {
                        if (send.code == 300) {
                            twal.err({
                                text: send.message
                            })
                        }
                        if (send.code == 200) {
                            twal.ok({
                                text: send.message
                            }).then(() => location.reload())
                        }
                    }
                })
            })
        }
    </script>
</body>
</html>