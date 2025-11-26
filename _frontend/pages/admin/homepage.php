



























<!DOCTYPE html>
<html lang="en">

<?=include_page('header')?>

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

        /* ===== CHART CONTAINERS ===== */
        .chart-container {
            background: #ffffff;
            border: 2px solid #f0f0f0;
            border-radius: 15px;
            padding: 28px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.06);
            transition: all 0.3s ease;
        }

        .chart-container:hover {
            border-color: #dc3545;
            box-shadow: 0 8px 25px rgba(220, 53, 69, 0.12);
        }

        .chart-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 28px;
            padding-bottom: 20px;
            border-bottom: 2px solid #f0f0f0;
        }

        .chart-header h6 {
            color: #1a1a1a;
            font-weight: 800;
            font-size: 18px;
            letter-spacing: -0.5px;
            margin: 0;
        }

        .chart-header a {
            color: #dc3545;
            font-weight: 700;
            text-decoration: none;
            font-size: 14px;
            transition: all 0.3s ease;
        }

        .chart-header a:hover {
            color: #c82333;
            transform: translateX(4px);
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

        .table-header a {
            color: #dc3545;
            font-weight: 700;
            text-decoration: none;
            font-size: 14px;
            transition: all 0.3s ease;
        }

        .table-header a:hover {
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

        /* ===== ACTION BUTTON ===== */
        .action-btn {
            background: linear-gradient(135deg, #dc3545 0%, #c82333 100%);
            color: white !important;
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
            background: linear-gradient(135deg, #c82333 0%, #a01d29 100%) !important;
            box-shadow: 0 8px 20px rgba(220, 53, 69, 0.4);
            transform: translateY(-2px);
            color: white !important;
        }

        /* ===== WIDGET CONTAINER ===== */
        .widget-container {
            background: #ffffff;
            border: 2px solid #f0f0f0;
            border-radius: 15px;
            padding: 28px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.06);
            transition: all 0.3s ease;
            height: 100%;
        }

        .widget-container:hover {
            border-color: #dc3545;
            box-shadow: 0 8px 25px rgba(220, 53, 69, 0.12);
        }

        .widget-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 28px;
            padding-bottom: 20px;
            border-bottom: 2px solid #f0f0f0;
        }

        .widget-header h6 {
            color: #1a1a1a;
            font-weight: 800;
            font-size: 18px;
            letter-spacing: -0.5px;
            margin: 0;
        }

        .widget-header a {
            color: #dc3545;
            font-weight: 700;
            text-decoration: none;
            font-size: 14px;
            transition: all 0.3s ease;
        }

        .widget-header a:hover {
            color: #c82333;
            transform: translateX(4px);
        }

        /* ===== TODO LIST ===== */
        .todo-input {
            background: #ffffff;
            border: 2px solid #f0f0f0;
            border-radius: 8px;
            padding: 12px;
            color: #1a1a1a;
            font-weight: 500;
        }

        .todo-input::placeholder {
            color: #ccc;
        }

        .todo-input:focus {
            border-color: #dc3545;
            box-shadow: 0 0 10px rgba(220, 53, 69, 0.2);
            outline: none;
        }

        .todo-item {
            border-bottom: 1px solid #f0f0f0;
            padding: 16px 0;
            transition: all 0.2s ease;
        }

        .todo-item:hover {
            background: rgba(220, 53, 69, 0.05);
            padding-left: 8px;
        }

        .todo-item span {
            color: #1a1a1a;
            font-weight: 500;
        }

        .todo-delete-btn {
            color: #dc3545;
            border: none;
            background: transparent;
            cursor: pointer;
            transition: all 0.3s ease;
            font-weight: 700;
        }

        .todo-delete-btn:hover {
            color: #c82333;
            transform: scale(1.2);
        }

        .add-btn {
            background: linear-gradient(135deg, #dc3545 0%, #c82333 100%);
            color: white;
            border: none;
            border-radius: 8px;
            font-weight: 700;
            padding: 12px 24px;
            font-size: 14px;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 4px 12px rgba(220, 53, 69, 0.2);
        }

        .add-btn:hover {
            background: linear-gradient(135deg, #c82333 0%, #a01d29 100%);
            box-shadow: 0 8px 20px rgba(220, 53, 69, 0.4);
            transform: translateY(-2px);
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
        }

        .back-to-top:hover {
            background: linear-gradient(135deg, #c82333 0%, #a01d29 100%) !important;
            box-shadow: 0 10px 30px rgba(220, 53, 69, 0.4);
            transform: scale(1.1);
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

            .chart-container,
            .table-container,
            .widget-container {
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
        <?=include_page('sidebar')?>
        <!-- Sidebar End -->


        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            <?=include_page('navbar')?>
            <!-- Navbar End -->


            <!-- Sale & Revenue Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-6 col-xl-3">
                        <div class="stat-card">
                            <div id="total_row" class="d-flex align-items-start justify-content-between">
                                
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-xl-3">
                        <div class="stat-card">
                            <div id="booked_row" class="d-flex align-items-start justify-content-between">
                                
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="stat-card">
                            <div id="ongoing_row" class="d-flex align-items-start justify-content-between">
                                
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-sm-6 col-xl-3">
                        <div class="stat-card">
                            <div id="completed_row" class="d-flex align-items-start justify-content-between">
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Sale & Revenue End -->


            <!-- Sales Chart Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-12 col-xl-6">
                        <div class="chart-container">
                            <div class="chart-header">
                                <h6>Monthly Bookings</h6>
                                <a href="">Show All</a>
                            </div>
                            <canvas id="worldwide-sales"></canvas>
                        </div>
                    </div>
                    <div class="col-sm-12 col-xl-6">
                        <div class="chart-container">
                            <div class="chart-header">
                                <h6>Estimated Monthly Revenue</h6>
                                <a href="">Show All</a>
                            </div>
                            <canvas id="salse-revenue"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Sales Chart End -->


            <!-- Recent Sales Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="table-container">
                    <div class="table-header">
                        <h6>Recent Projects</h6>
                        <a href="">Show All</a>
                    </div>
                    <div class="table-responsive">
                        <table class="table text-start align-middle table-hover mb-0">
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
                                    <td>Paid</td>
                                    <td><a class="action-btn" href="">Detail</a></td>
                                </tr>
                                <tr>
                                    <td><input class="form-check-input" type="checkbox"></td>
                                    <td>01 Jan 2045</td>
                                    <td><strong>INV-0123</strong></td>
                                    <td>Jhon Doe</td>
                                    <td><strong>$123</strong></td>
                                    <td>Paid</td>
                                    <td><a class="action-btn" href="">Detail</a></td>
                                </tr>
                                <tr>
                                    <td><input class="form-check-input" type="checkbox"></td>
                                    <td>01 Jan 2045</td>
                                    <td><strong>INV-0123</strong></td>
                                    <td>Jhon Doe</td>
                                    <td><strong>$123</strong></td>
                                    <td>Paid</td>
                                    <td><a class="action-btn" href="">Detail</a></td>
                                </tr>
                                <tr>
                                    <td><input class="form-check-input" type="checkbox"></td>
                                    <td>01 Jan 2045</td>
                                    <td><strong>INV-0123</strong></td>
                                    <td>Jhon Doe</td>
                                    <td><strong>$123</strong></td>
                                    <td>Paid</td>
                                    <td><a class="action-btn" href="">Detail</a></td>
                                </tr>
                                <tr>
                                    <td><input class="form-check-input" type="checkbox"></td>
                                    <td>01 Jan 2045</td>
                                    <td><strong>INV-0123</strong></td>
                                    <td>Jhon Doe</td>
                                    <td><strong>$123</strong></td>
                                    <td>Paid</td>
                                    <td><a class="action-btn" href="">Detail</a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- Recent Sales End -->


            <!-- Widgets Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <!-- Calendar Widget -->
                    <div class="col-sm-12 col-md-6 col-xl-6">
                        <div class="widget-container">
                            <div class="widget-header">
                                <h6>Calendar</h6>
                                <a href="">Show All</a>
                            </div>
                            <div id="calender"></div>
                        </div>
                    </div>

                    <!-- To Do List Widget -->
                    <div class="col-sm-12 col-md-6 col-xl-6">
                        <div class="widget-container">
                            <div class="widget-header">
                                <h6>To Do List</h6>
                                <a href="">Show All</a>
                            </div>
                            <div class="d-flex gap-2 mb-3">
                                <input class="form-control todo-input flex-grow-1" type="text" placeholder="Enter task">
                                <button type="button" class="add-btn">Add</button>
                            </div>
                            <div class="todo-item">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="d-flex align-items-center gap-2">
                                        <input class="form-check-input" type="checkbox">
                                        <span>Short task goes here...</span>
                                    </div>
                                    <button class="todo-delete-btn"><i class="fa fa-times"></i></button>
                                </div>
                            </div>
                            <div class="todo-item">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="d-flex align-items-center gap-2">
                                        <input class="form-check-input" type="checkbox">
                                        <span>Short task goes here...</span>
                                    </div>
                                    <button class="todo-delete-btn"><i class="fa fa-times"></i></button>
                                </div>
                            </div>
                            <div class="todo-item">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="d-flex align-items-center gap-2">
                                        <input class="form-check-input" type="checkbox" checked>
                                        <span><del>Short task goes here...</del></span>
                                    </div>
                                    <button class="todo-delete-btn"><i class="fa fa-times"></i></button>
                                </div>
                            </div>
                            <div class="todo-item">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="d-flex align-items-center gap-2">
                                        <input class="form-check-input" type="checkbox">
                                        <span>Short task goes here...</span>
                                    </div>
                                    <button class="todo-delete-btn"><i class="fa fa-times"></i></button>
                                </div>
                            </div>
                            <div class="todo-item">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="d-flex align-items-center gap-2">
                                        <input class="form-check-input" type="checkbox">
                                        <span>Short task goes here...</span>
                                    </div>
                                    <button class="todo-delete-btn"><i class="fa fa-times"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Widgets End -->

        </div>
        <!-- Content End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <?= import_packages("datatable", "tyrax", "loading", "ctr", "path", "twal") ?>

    <script>
        addEventListener("DOMContentLoaded", () => {
            LOADING.load(true);

            setTimeout(() => LOADING.load(false), 1500)

        })
    </script>


<script>
        addEventListener("DOMContentLoaded", function() {
            tyrax.get({
                url: "count/totalclient",
                //inspect:true,
                response: (send) => {
                    DOM.add_html("#total_row", `
                
                            <div class="flex-grow-1">
                                    <p class="stat-label">Total Clients</p>
                                    <h6 class="stat-value">${send.count}</h6>
                                </div>
                                <div class="stat-icon">
                                    <i class="fas fa-calendar-check"></i>
                                </div>
                    `)
                    
                },

            })
        })
    </script>


<script>
        addEventListener("DOMContentLoaded", function() {
            tyrax.get({
                url: "count/booked",
                //inspect:true,
                response: (send) => {
                    DOM.add_html("#booked_row", `
                
                            <div class="flex-grow-1">
                                    <p class="stat-label">Booked</p>
                                    <h6 class="stat-value">${send.count}</h6>
                                </div>
                                <div class="stat-icon">
                                    <i class="fas fa-users"></i>
                                </div>
                    `)
                    
                },

            })
        })
    </script>

    <script>
        addEventListener("DOMContentLoaded", function() {
            tyrax.get({
                url: "count/ongoing",
                //inspect:true,
                response: (send) => {
                    DOM.add_html("#ongoing_row", `
                
                            <div class="flex-grow-1">
                                    <p class="stat-label">On Going</p>
                                    <h6 class="stat-value">${send.count}</h6>
                                </div>
                                <div class="stat-icon">
                                    <i class="fas fa-calendar-alt"></i>
                                </div>
                    `)
                    
                },

            })
        })
    </script>


<script>
        addEventListener("DOMContentLoaded", function() {
            tyrax.get({
                url: "count/completed",
                //inspect:true,
                response: (send) => {
                    DOM.add_html("#completed_row", `
                
                            <div class="flex-grow-1">
                                    <p class="stat-label">Completed Project</p>
                                    <h6 class="stat-value">${send.count}</h6>
                                </div>
                                <div class="stat-icon">
                                    <i class="fa fa-chart-pie"></i>
                                </div>
                    `)
                    
                },

            })
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

<script>
    addEventListener("DOMContentLoaded", ()=>{
        
    });
</script>