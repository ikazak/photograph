<!DOCTYPE html>
<html lang="en">
    

<?= include_page('photoex/phheader') ?>

<head>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background: #ffffff;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .container-fluid {
            background: #ffffff;
        }

        /* ===== STAT CARDS ===== */
        .stat-card {
            background: #ffffff;
            border: 2px solid #f0f0f0;
            border-radius: 15px;
            padding: 28px;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            cursor: pointer;
            position: relative;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.06);
        }

        .stat-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, rgba(220, 53, 69, 0.08) 0%, transparent 100%);
            transition: left 0.3s ease;
            z-index: 0;
        }

        .stat-card:hover::before {
            left: 0;
        }

        .stat-card:hover {
            border-color: #dc3545;
            box-shadow: 0 12px 30px rgba(220, 53, 69, 0.2);
            transform: translateY(-8px);
        }

        .stat-card > * {
            position: relative;
            z-index: 1;
        }

        .stat-icon {
            width: 60px;
            height: 60px;
            background: linear-gradient(135deg, #dc3545 0%, #c82333 100%);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 28px;
            box-shadow: 0 6px 20px rgba(220, 53, 69, 0.3);
        }

        .stat-label {
            color: #666;
            font-weight: 600;
            font-size: 12px;
            letter-spacing: 0.8px;
            text-transform: uppercase;
            margin-top: 12px;
            margin-bottom: 4px;
        }

        .stat-value {
            color: #1a1a1a;
            font-weight: 800;
            font-size: 32px;
            line-height: 1;
        }

        .stat-card:hover .stat-icon {
            transform: scale(1.1) rotate(5deg);
            box-shadow: 0 8px 25px rgba(220, 53, 69, 0.4);
        }

        /* ===== TABLE CONTAINER ===== */
        .table-container {
            background: #ffffff;
            border: 2px solid #f0f0f0;
            border-radius: 15px;
            padding: 32px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.06);
            transition: all 0.3s ease;
        }

        .table-container:hover {
            border-color: #dc3545;
            box-shadow: 0 8px 25px rgba(220, 53, 69, 0.12);
        }

        .table-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 28px;
            padding-bottom: 20px;
            border-bottom: 2px solid #f0f0f0;
        }

        .table-header h6 {
            color: #1a1a1a;
            font-weight: 800;
            font-size: 20px;
            letter-spacing: -0.5px;
            margin: 0;
        }

        .show-all-link {
            color: #dc3545;
            font-weight: 700;
            text-decoration: none;
            font-size: 14px;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .show-all-link:hover {
            color: #c82333;
            transform: translateX(4px);
        }

        /* ===== TABLE STYLING ===== */
        .table {
            margin-bottom: 0;
        }

        .table thead th {
            background: linear-gradient(135deg, #f8f9fa 0%, #ffffff 100%);
            color: #1a1a1a;
            font-weight: 700;
            font-size: 13px;
            letter-spacing: 0.5px;
            padding: 18px 16px;
            border-bottom: 2px solid #dc3545 !important;
            text-transform: uppercase;
            border-top: none !important;
        }

        .table tbody td {
            color: #1a1a1a;
            font-weight: 600;
            padding: 18px 16px;
            border-bottom: 1px solid #f0f0f0;
            vertical-align: middle;
        }

        .table tbody tr {
            transition: all 0.2s ease;
        }

        .table tbody tr:hover {
            background: rgba(220, 53, 69, 0.08) !important;
            box-shadow: inset 0 0 10px rgba(220, 53, 69, 0.1);
        }

        .table tbody tr:last-child td {
            border-bottom: none;
        }

        /* ===== CHECKBOX STYLING ===== */
        .form-check-input {
            width: 18px;
            height: 18px;
            border: 2px solid #ddd;
            border-radius: 4px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .form-check-input:checked {
            background-color: #dc3545;
            border-color: #dc3545;
            box-shadow: 0 2px 8px rgba(220, 53, 69, 0.3);
        }

        /* ===== STATUS BADGE ===== */
        .status-badge {
            display: inline-block;
            background: rgba(40, 167, 69, 0.15);
            color: #28a745;
            padding: 8px 16px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 700;
            border: 1.5px solid #28a745;
            transition: all 0.3s ease;
        }

        .status-badge:hover {
            background: rgba(40, 167, 69, 0.25);
            box-shadow: 0 4px 12px rgba(40, 167, 69, 0.2);
        }

        /* ===== ACTION BUTTON ===== */
        .action-btn {
            background: linear-gradient(135deg, #dc3545 0%, #c82333 100%);
            color: white;
            border: none;
            border-radius: 8px;
            font-weight: 700;
            padding: 8px 16px;
            font-size: 12px;
            text-decoration: none;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            cursor: pointer;
            display: inline-block;
            box-shadow: 0 4px 12px rgba(220, 53, 69, 0.2);
        }

        .action-btn:hover {
            background: linear-gradient(135deg, #c82333 0%, #a01d29 100%);
            box-shadow: 0 8px 20px rgba(220, 53, 69, 0.4);
            transform: translateY(-2px);
            color: white;
        }

        .action-btn:active {
            transform: translateY(0);
        }

        /* ===== BACK TO TOP ===== */
        .back-to-top {
            background: linear-gradient(135deg, #dc3545 0%, #c82333 100%) !important;
            color: white !important;
            border: none !important;
            border-radius: 12px !important;
            font-weight: 700;
            box-shadow: 0 6px 20px rgba(220, 53, 69, 0.3);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            width: 50px !important;
            height: 50px !important;
            display: flex !important;
            align-items: center;
            justify-content: center;
        }

        .back-to-top:hover {
            background: linear-gradient(135deg, #c82333 0%, #a01d29 100%) !important;
            box-shadow: 0 10px 30px rgba(220, 53, 69, 0.4);
            transform: scale(1.1) translateY(-5px);
            color: white !important;
        }

        /* ===== SPINNER ===== */
        #spinner {
            background: rgba(0, 0, 0, 0.95) !important;
            border-radius: 12px;
        }

        .spinner-border {
            color: #dc3545 !important;
        }

        /* ===== RESPONSIVE ===== */
        @media (max-width: 768px) {
            .stat-card {
                padding: 20px;
            }

            .table-container {
                padding: 20px;
            }

            .table thead th,
            .table tbody td {
                padding: 14px 12px;
                font-size: 12px;
            }
        }
    </style>
</head>

<body>
    <div class="container-fluid position-relative d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-dark position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center" style="z-index: 9999;">
            <div class="spinner-border" style="width: 3rem; height: 3rem;" role="status">
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


            <!-- Sale & Revenue Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-6 col-xl-3">
                        <div class="stat-card">
                            <div class="d-flex align-items-start justify-content-between">
                                <div class="flex-grow-1">
                                    <p class="stat-label">Bookings</p>
                                    <h6 class="stat-value">4</h6>
                                </div>
                                <div class="stat-icon">
                                    <i class="fas fa-calendar-check"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-xl-3">
                        <div class="stat-card">
                            <div class="d-flex align-items-start justify-content-between">
                                <div class="flex-grow-1">
                                    <p class="stat-label">Total Clients</p>
                                    <h6 class="stat-value">12</h6>
                                </div>
                                <div class="stat-icon">
                                    <i class="fas fa-users"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-xl-3">
                        <div class="stat-card">
                            <div class="d-flex align-items-start justify-content-between">
                                <div class="flex-grow-1">
                                    <p class="stat-label">Upcoming Events</p>
                                    <h6 class="stat-value">10</h6>
                                </div>
                                <div class="stat-icon">
                                    <i class="fas fa-calendar-alt"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-sm-6 col-xl-3">
                        <div class="stat-card">
                            <div class="d-flex align-items-start justify-content-between">
                                <div class="flex-grow-1">
                                    <p class="stat-label">Completed Project</p>
                                    <h6 class="stat-value">32</h6>
                                </div>
                                <div class="stat-icon">
                                    <i class="fa fa-chart-pie"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Sale & Revenue End -->


            

            <!-- Recent Sales Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="table-container">
                    <div class="table-header">
                        <h6>Recent Projects</h6>
                        <a href="" class="show-all-link">Show All <i class="fas fa-arrow-right"></i></a>
                    </div>
                    <div class="table-responsive">
                        <table class="table text-start align-middle table-hover mb-0" style="border-collapse: collapse;">
                            <thead>
                                <tr>
                                    <th scope="col"><input class="form-check-input" type="checkbox"></th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Invoice</th>
                                    <th scope="col">Customer</th>
                                    <th scope="col">Amount</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                </tr>   
                            </thead>
                            <tbody>
                                <tr>
                                    <td><input class="form-check-input" type="checkbox"></td>
                                    <td>01 Jan 2045</td>
                                    <td><strong>INV-0123</strong></td>
                                    <td>Jhon Doe</td>
                                    <td><strong>$123</strong></td>
                                    <td><span class="status-badge">Paid</span></td>
                                    <td><a class="action-btn" href="">Detail</a></td>
                                </tr>
                                <tr>
                                    <td><input class="form-check-input" type="checkbox"></td>
                                    <td>01 Jan 2045</td>
                                    <td><strong>INV-0123</strong></td>
                                    <td>Jhon Doe</td>
                                    <td><strong>$123</strong></td>
                                    <td><span class="status-badge">Paid</span></td>
                                    <td><a class="action-btn" href="">Detail</a></td>
                                </tr>
                                <tr>
                                    <td><input class="form-check-input" type="checkbox"></td>
                                    <td>01 Jan 2045</td>
                                    <td><strong>INV-0123</strong></td>
                                    <td>Jhon Doe</td>
                                    <td><strong>$123</strong></td>
                                    <td><span class="status-badge">Paid</span></td>
                                    <td><a class="action-btn" href="">Detail</a></td>
                                </tr>
                                <tr>
                                    <td><input class="form-check-input" type="checkbox"></td>
                                    <td>01 Jan 2045</td>
                                    <td><strong>INV-0123</strong></td>
                                    <td>Jhon Doe</td>
                                    <td><strong>$123</strong></td>
                                    <td><span class="status-badge">Paid</span></td>
                                    <td><a class="action-btn" href="">Detail</a></td>
                                </tr>
                                <tr>
                                    <td><input class="form-check-input" type="checkbox"></td>
                                    <td>01 Jan 2045</td>
                                    <td><strong>INV-0123</strong></td>
                                    <td>Jhon Doe</td>
                                    <td><strong>$123</strong></td>
                                    <td><span class="status-badge">Paid</span></td>
                                    <td><a class="action-btn" href="">Detail</a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- Recent Sales End -->


                   


            
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
    <script src="<?=assets()?>/lib/chart/chart.min.js"></script>
    <script src="<?=assets()?>/lib/easing/easing.min.js"></script>
    <script src="<?=assets()?>/lib/waypoints/waypoints.min.js"></script>
    <script src="<?=assets()?>/lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="<?=assets()?>/lib/tempusdominus/js/moment.min.js"></script>
    <script src="<?=assets()?>/lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="<?=assets()?>/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="<?=assets()?>/js/main.js"></script>
</body>

</html>