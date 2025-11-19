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
        /* Ensure body/html has no conflicting background if .content is not full height */
        html,
        body {
            height: 100%;
            /* background-color: #212529; /* Or your desired global dark background */
        }

        .content {
            /* Assuming .content might not always be full height,
               this helps maintain dark theme for the viewport */
            /* background-color: #212529; /* Match sidebar/header if needed */
            min-height: 100vh;
            /* Ensure it takes at least full viewport height */
        }

        /* Styles from your original CSS, slightly tidied for DataTables dark theme */
        .dataTables_wrapper .dataTables_length select,
        .dataTables_wrapper .dataTables_filter input {
            background-color: white !important;
            color: black !important;
            border: 1px solid #6c757d !important;
            /* Slightly lighter border for definition */
            border-radius: 0.25rem;
        }

        .dataTables_wrapper .dataTables_length select {
            padding: 0.375rem 2.25rem 0.375rem 0.75rem;
            /* Keep padding for arrow */
            /* Consider a custom arrow for dark mode or ensure default is visible */
        }

        /* Custom arrow for select (Bootstrap 5 inspired) */
        .dataTables_length select {
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16'%3e%3cpath fill='none' stroke='%23ffffff' stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='m2 5 6 6 6-6'/%3e%3c/svg%3e");
            background-repeat: no-repeat;
            background-position: right 0.75rem center;
            background-size: 16px 12px;
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
        }


        .dataTables_wrapper .dataTables_info {
            color: black !important;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button {
            background-color: white !important;
            color: #fff !important;
            border: 1px solid #495057 !important;
            /* Slightly lighter border */
            margin: 0 2px;
            /* Reduced margin slightly */
            border-radius: 0.25rem;
            padding: 0.375rem 0.75rem;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
            background-color: #495057 !important;
            border-color: #6c757d !important;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button.current,
        .dataTables_wrapper .dataTables_paginate .paginate_button.current:hover {
            background-color: #0d6efd !important;
            color: #fff !important;
            border-color: #0d6efd !important;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button.disabled,
        .dataTables_wrapper .dataTables_paginate .paginate_button.disabled:hover {
            color: #6c757d !important;
            background-color: white !important;
            border-color: #495057 !important;
        }

        /* Table specific styles for dark theme */
        #myDataTable thead th {
            color: black !important;
            /* Ensure header text is white */
        }

        #myDataTable tbody td {
            color: black !important;
            /* Light grey for body text for better readability than pure white */
            vertical-align: middle;
            /* Vertically align content in cells */
        }

        #myDataTable.table-dark {
            border-color: #495057;
            /* Border for the table itself */
        }

        #myDataTable img {
            /* Ensure images have a light border if on dark bg */
            border: 1px solid #495057;
        }

        /* Action buttons styling for a bit more padding if icons feel cramped */
        .btn-group .btn i {
            /* font-size: 0.9rem; /* Adjust icon size if needed */
        }

        .btn-group .btn {
            padding: 0.25rem 0.5rem;
            /* Slightly more padding for icon buttons */
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
                        <th>service name</th>
                        <th>Package name</th>
                        <th>Customer Name</th>
                        <th>Location</th>
                        <th>Date Time</th>
                        <th>Price</th>
                        <th>Downpayment</th>
                        <th>Status</th>
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

    <?= import_packages("datatable", "tyrax", "loading", "ctr", "path", "twal") ?>

    <script>
        addEventListener("DOMContentLoaded", () => {
            LOADING.load(true);

            setTimeout(() => LOADING.load(false), 1000)

        })
    </script>
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

<?= import_packages("datatable", "tyrux", "twal") ?>

<script>
    function updatesta(id){

        twal.ask({
            text: "Do You Want To accept this order?"
        }).then((result) => {
        if (result.confirm) {
                tyrax.post({
                    //test:true,
                   // inspect:true,
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
                    //inspect:true,
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
            url: "orders/getbooked",
            //inspect: true,
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
                            ``
                        ]).draw();
                    });
                }
            }
        })



    })
</script>

<style>
    .pend{
        height: 30px;
        width: 100px;
        border-radius: 20px;
        border: none;
        background-color: yellow ;
        color: white;
    }
    .conf{
        height: 30px;
        width: 100px;
        border-radius: 20px;
        border: none;
        background-color: blue;
        color: white;
    }
    .ong{
        height: 30px;
        width: 100px;
        border-radius: 20px;
        border: none;
        background-color: red;
        color: white;
    }
</style>