<!DOCTYPE html>
<html lang="en">

<?= include_page('header') ?>

<head>
    <!-- ... other head elements ... -->
    <title>Inventory Management</title>
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!-- DataTables CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
    <!-- DataTables Buttons CSS (Optional, if you plan to use export buttons) -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.bootstrap5.min.css">

    <style>
        /* Modern Red, Black & White Theme */
        html,
        body {
            height: 100%;
            background: linear-gradient(135deg, #1a1a1a 0%, #2d2d2d 100%);
        }

        .content {
            min-height: 100vh;
            background: transparent;
        }

        /* Enhanced Container */
        .container-fluid {
            padding: 2rem !important;
        }

        .bg-white {
            background: #ffffff !important;
            border-radius: 12px !important;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.3);
            padding: 2rem !important;
            border: 1px solid #e0e0e0;
        }

        /* DataTable Wrapper Enhancements */
        .dataTables_wrapper {
            padding: 1rem 0;
        }

        .dataTables_wrapper .dataTables_length,
        .dataTables_wrapper .dataTables_filter {
            margin-bottom: 1.5rem;
        }

        .dataTables_wrapper .dataTables_length label,
        .dataTables_wrapper .dataTables_filter label {
            font-weight: 600;
            color: #2d2d2d;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .dataTables_wrapper .dataTables_length select {
            background-color: #ffffff !important;
            color: #2d2d2d !important;
            border: 2px solid #dc3545 !important;
            border-radius: 8px !important;
            padding: 0.5rem 2.5rem 0.5rem 1rem !important;
            font-weight: 500;
            transition: all 0.3s ease;
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16'%3e%3cpath fill='none' stroke='%23dc3545' stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='m2 5 6 6 6-6'/%3e%3c/svg%3e");
            background-repeat: no-repeat;
            background-position: right 0.75rem center;
            background-size: 16px 12px;
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
        }

        .dataTables_wrapper .dataTables_length select:hover,
        .dataTables_wrapper .dataTables_length select:focus {
            border-color: #c82333;
            box-shadow: 0 0 0 0.2rem rgba(220, 53, 69, 0.15);
            outline: none;
        }

        .dataTables_wrapper .dataTables_filter input {
            background-color: #ffffff !important;
            color: #2d2d2d !important;
            border: 2px solid #dc3545 !important;
            border-radius: 8px !important;
            padding: 0.5rem 1rem !important;
            font-weight: 500;
            transition: all 0.3s ease;
            margin-left: 0.5rem;
        }

        .dataTables_wrapper .dataTables_filter input:hover,
        .dataTables_wrapper .dataTables_filter input:focus {
            border-color: #c82333;
            box-shadow: 0 0 0 0.2rem rgba(220, 53, 69, 0.15);
            outline: none;
        }

        /* Table Styling */
        #table_orders {
            width: 100% !important;
            border-collapse: separate !important;
            border-spacing: 0 !important;
            border-radius: 8px;
            overflow: hidden;
        }

        #table_orders thead {
            background: linear-gradient(135deg, #dc3545 0%, #c82333 100%);
        }

        #table_orders thead th {
            color: #ffffff !important;
            font-weight: 600 !important;
            text-transform: uppercase;
            font-size: 0.85rem;
            letter-spacing: 0.5px;
            padding: 1rem !important;
            border: none !important;
            text-align: center;
        }

        #table_orders tbody tr {
            background-color: #ffffff;
            transition: all 0.3s ease;
            border-bottom: 1px solid #f0f0f0;
        }

        #table_orders tbody tr:hover {
            background-color: #fff5f5;
            transform: scale(1.01);
            box-shadow: 0 4px 12px rgba(220, 53, 69, 0.1);
        }

        #table_orders tbody td {
            color: #2d2d2d !important;
            padding: 1rem !important;
            vertical-align: middle !important;
            text-align: center;
            font-weight: 500;
            border: none !important;
        }

        /* Status Buttons - Enhanced */
        .pend {
            height: 36px;
            width: 110px;
            border-radius: 20px;
            border: none;
            background: linear-gradient(135deg, #ffc107 0%, #ff9800 100%);
            color: #ffffff;
            font-weight: 600;
            font-size: 0.85rem;
            box-shadow: 0 4px 8px rgba(255, 193, 7, 0.3);
            transition: all 0.3s ease;
            cursor: default;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .conf {
            height: 36px;
            width: 110px;
            border-radius: 20px;
            border: none;
            background: linear-gradient(135deg, #007bff 0%, #0056b3 100%);
            color: #ffffff;
            font-weight: 600;
            font-size: 0.85rem;
            box-shadow: 0 4px 8px rgba(0, 123, 255, 0.3);
            transition: all 0.3s ease;
            cursor: default;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .ong {
            height: 36px;
            width: 110px;
            border-radius: 20px;
            border: none;
            background: linear-gradient(135deg, #dc3545 0%, #c82333 100%);
            color: #ffffff;
            font-weight: 600;
            font-size: 0.85rem;
            box-shadow: 0 4px 8px rgba(220, 53, 69, 0.3);
            transition: all 0.3s ease;
            cursor: default;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        /* Action Buttons - Enhanced */
        .btn-outline-danger,
        .btn-outline-success {
            border-width: 2px !important;
            font-weight: 600 !important;
            transition: all 0.3s ease !important;
            border-radius: 8px !important;
            padding: 0.4rem 0.8rem !important;
        }

        .btn-outline-danger {
            color: #dc3545 !important;
            border-color: #dc3545 !important;
        }

        .btn-outline-danger:hover {
            background-color: #dc3545 !important;
            color: #ffffff !important;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(220, 53, 69, 0.3);
        }

        .btn-outline-success {
            color: #28a745 !important;
            border-color: #28a745 !important;
        }

        .btn-outline-success:hover {
            background-color: #28a745 !important;
            color: #ffffff !important;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(40, 167, 69, 0.3);
        }

        /* Pagination - Enhanced */
        .dataTables_wrapper .dataTables_info {
            color: #2d2d2d !important;
            font-weight: 600;
            padding-top: 1rem;
        }

        .dataTables_wrapper .dataTables_paginate {
            padding-top: 1rem;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button {
            background-color: #ffffff !important;
            color: #2d2d2d !important;
            border: 2px solid #dc3545 !important;
            margin: 0 4px !important;
            border-radius: 8px !important;
            padding: 0.5rem 1rem !important;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
            background-color: #dc3545 !important;
            color: #ffffff !important;
            border-color: #dc3545 !important;
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(220, 53, 69, 0.3);
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button.current,
        .dataTables_wrapper .dataTables_paginate .paginate_button.current:hover {
            background: linear-gradient(135deg, #dc3545 0%, #c82333 100%) !important;
            color: #ffffff !important;
            border-color: #dc3545 !important;
            box-shadow: 0 4px 12px rgba(220, 53, 69, 0.4);
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button.disabled,
        .dataTables_wrapper .dataTables_paginate .paginate_button.disabled:hover {
            color: #999999 !important;
            background-color: #f8f9fa !important;
            border-color: #dee2e6 !important;
            cursor: not-allowed;
        }

        /* Table Images */
        #table_orders img {
            border: 2px solid #e0e0e0;
            border-radius: 6px;
            transition: all 0.3s ease;
        }

        #table_orders img:hover {
            border-color: #dc3545;
            box-shadow: 0 4px 12px rgba(220, 53, 69, 0.2);
        }

        /* Empty State */
        .dataTables_empty {
            font-weight: 600 !important;
            color: #999999 !important;
            padding: 3rem !important;
            font-size: 1.1rem;
        }
    </style>
</head>

<body>
    <?= include_page('photoex/phsidebar') ?>
    <div class="content">
        <?= include_page('photoex/phnavbar') ?>
        <div class="container-fluid pt-4 px-4">
            <div class="bg-white text-center rounded p-4">
                <table id="table_orders">
                    <thead>
                        <th>Service Name</th>
                        <th>Package Name</th>
                        <th>Customer Name</th>
                        <th>Location</th>
                        <th>Date Time</th>
                        <th>Price</th>
                        <th>Downpayment</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </thead>
                    <tbody>

                    </tbody>
                </table>

            </div>
        </div>

        <!-- MODALS (Add, Edit, Delete) - Keep your existing modal HTML here -->
        <!-- Add Modal -->

        <!-- End Modals -->

    </div> <!-- End .content -->

    <!-- JavaScript Libraries -->
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <!-- Bootstrap 5 Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <!-- DataTables Buttons JS (Optional) -->
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.bootstrap5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.print.min.js"></script>
    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Your Template's JS (if any specific order is needed, adjust) -->
    <!-- <script src="<?= assets() ?>/js/main.js"></script> -->

</html>

<?= import_packages("datatable", "tyrax", "loading", "ctr", "path", "twal") ?>

<script>
    addEventListener("DOMContentLoaded", () => {
        LOADING.load(true);
        setTimeout(() => LOADING.load(false), 1000)
    })
</script>

<script>
    function updatesta(id){
        twal.ask({
            text: "Do You Want To accept this order?"
        }).then((result) => {
            if (result.confirm) {
                tyrax.post({
                    url: "orders/update_sta",
                    request: {
                        id: id
                    },
                    response: function(send) {
                        if (send.code == 200) {
                            twal.ok({
                                text: "Order Accepted"
                            }).then(() => location.reload());
                        }
                    }
                })
            }
        });
    }
</script>

<script>
    function del(pid) {
        twal.ask({
            text: "Do You Want To Reject Order?"
        }).then((result) => {
            if (result.confirm) {
                tyrax.post({
                    url: "orders/sendemail",
                    request: {
                        id: pid
                    },
                    response: function(send) {
                        if (send.code == 200) {
                            twal.ok({
                                text: "Order Successfully Rejected"
                            }).then(() => location.reload());
                        }
                    }
                })
            }
        });
    }
</script>

<script>
    addEventListener("DOMContentLoaded", () => {
        
        $table = new DataTable(table_orders);

        tyrax.get({   
            url: "orders/get",
            request: {user: localStorage.getItem("id")},
            response: function(send) {
                if (send.code == 200) {
                    const data = send.data;
                    data.forEach(column => {
                        $status = column.status;
                        $display = ``;
                        if($status == 1){   
                            $display = `<span><button class='pend'>Pending..</button></span>`;
                        }
                        if($status == 2){
                            $display = `<span><button class='conf'>Confirmed</button></span>`;
                        }
                        if($status == 3){
                            $display = `<span><button class='ong'>On Going</button></span>`;
                            
                        }
                        $table.row.add([
                            column.services_name,
                            column.package_name,
                            column.fullname,
                            column.location,
                            column.date_time,
                            column.price,
                            column.downpayment,
                            $display,
                            `<button class="btn btn-sm btn-outline-danger me-1" onclick="del(${column.r_id})" title="Delete"><i class="bi bi-trash"></i></button>
                            <button class="btn btn-sm btn-outline-success" onclick="updatesta(${column.r_id})" title="Edit"><i class="bi bi-check"></i></button>`
                        ]).draw();
                    });
                }
            }
        })
    })
</script>