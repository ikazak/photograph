<!DOCTYPE html>
<html lang="en">

<?= include_page('header') ?>

<head>
    <style>
        /* STYLES FOR INCOMPLETE STATUS BUTTON */

        .methodpend {
            background-color: #ffdddd;
            color: #cc0000;
            border: 1px solid #ffcccc;
            padding: 4px 8px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
            cursor: default;
        }

        .incomplete-status {
            background-color: #ffdddd;
            color: #cc0000;
            border: 1px solid #ffcccc;
            padding: 4px 8px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
            cursor: default;
        }

        .paid-status {
            background-color: #ffdddd;
            color: #04a604ff;
            border: 1px solid #ffcccc;
            padding: 4px 8px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
            cursor: default;
        }

        /* STYLES FOR PAID STATUS BUTTON */
        .paid-status {
            background-color: #ddffdd;
            color: #008000;
            border: 1px solid #ccffcc;
            padding: 4px 8px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
            cursor: default;
        }

        /* DataTables Search Input Styling */
        div.dataTables_wrapper div.dataTables_filter {
            text-align: right;
            margin-bottom: 20px;
        }

        div.dataTables_wrapper div.dataTables_filter input {
            border: 1px solid #ccc;
            border-radius: 4px;
            padding: 6px 12px;
            font-size: 14px;
            margin-left: 5px;
        }

        /* DataTables Paging Button Styling */
        div.dataTables_wrapper div.dataTables_paginate {
            margin-top: 15px;
        }

        div.dataTables_wrapper div.dataTables_paginate .paginate_button {
            padding: 0.5em 1em;
            margin-left: 2px;
            border-radius: 4px;
            cursor: pointer;
            border: 1px solid transparent;
            transition: all 0.2s;
        }

        div.dataTables_wrapper div.dataTables_paginate .paginate_button.current,
        div.dataTables_wrapper div.dataTables_paginate .paginate_button.current:hover {
            background-color: #ff0000;
            color: white !important;
            border-color: #ff0000;
        }

        div.dataTables_wrapper div.dataTables_paginate .paginate_button:hover {
            background-color: #f0f0f0;
        }

        /* Tabs and Layout */
        .tab-item {
            transition: color 0.2s ease;
        }

        .tab-item.active {
            color: #ff0000;
            font-weight: 600;
        }

        .tab-item.active::after {
            content: '';
            position: absolute;
            bottom: -1px;
            left: 0;
            width: 100%;
            height: 3px;
            background-color: #ff0000;
            border-radius: 2px;
        }

        .transactions-container {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .tabs-container {
            border-bottom: 1px solid #eee;
            margin-bottom: 15px;
        }

        .tabs {
            display: flex;
            gap: 25px;
        }

        .tab-item {
            background: none;
            border: none;
            padding: 10px 0;
            cursor: pointer;
            font-size: 16px;
            color: #555;
            position: relative;
            font-weight: 500;
        }

        .data-table {
            width: 100%;
            border-collapse: collapse;
        }

        .data-table th,
        .data-table td {
            text-align: left;
            padding: 10px 0;
        }

        .data-table th {
            font-size: 12px;
            color: #888;
            font-weight: 600;
        }

        .data-table td {
            font-size: 14px;
            color: #333;
        }

        .data-table tbody tr {
            border-bottom: 1px solid #eee;
        }

        .action-btn {
            background: none;
            border: none;
            color: #333;
            cursor: pointer;
            padding: 5px;
            font-weight: 600;
        }
    </style>
</head>

<body>
    <div class="container-fluid position-relative d-flex p-0">
        <div id="spinner" class="show bg-dark position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <?= include_page('sidebar') ?>
        <div class="content">
            <?= include_page('navbar') ?>
            <div class="transactions-container">


                <div class="tabs-container">
                    <div>
                        <h2><b>Transaction History</b></h2>
                    </div>

                    <nav class="tabs">
                        <button class="tab-item active">All Payments</button>
                        <button class="tab-item">Paid</button>
                        <button class="tab-item">Incomplete</button>
                    </nav>
                </div>

                <table id="table_orders" class="data-table">
                    <thead>
                        <tr>
                            <th>AMOUNT</th>
                            <th>DOWNPAYMENT</th>
                            <th>BALANCE</th>
                            <th>STATUS</th>
                            <th>PAYMENT METHOD</th>
                            <th>CLIENT</th>
                            <th>ACTIONS</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                    </tbody>
                </table>
            </div>


            <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
        </div>

        <?= import_packages("datatable", "tyrax", "loading", "ctr", "path", "twal") ?>

        <script>
            addEventListener("DOMContentLoaded", () => {
                LOADING.load(true);

                setTimeout(() => LOADING.load(false), 1500)

            })
        </script>
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
        <script src="<?= assets() ?>/lib/chart/chart.min.js"></script>
        <script src="<?= assets() ?>/lib/easing/easing.min.js"></script>
        <script src="<?= assets() ?>/lib/waypoints/waypoints.min.js"></script>
        <script src="<?= assets() ?>/lib/owlcarousel/owl.carousel.min.js"></script>
        <script src="<?= assets() ?>/lib/tempusdominus/js/moment.min.js"></script>
        <script src="<?= assets() ?>/lib/tempusdominus/js/moment-timezone.min.js"></script>
        <script src="<?= assets() ?>/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

        <script src="<?= assets() ?>/js/main.js"></script>
</body>

</html>
<script>
    $(document).ready(function() {
        let transactionsTable;

        // --- FIX 1: Custom Filter to search for CSS Class in Status Column HTML ---
        $.fn.dataTable.ext.search.push(
            function(settings, data, dataIndex) {
                // Get the current global search term (which we set to the CSS class name)
                const selectedFilterTerm = settings.oPreviousSearch.sSearch; 
                
                // If the filter term is empty ('All Payments' tab), show all rows.
                if (selectedFilterTerm === '') {
                    return true;
                }

                // Get the raw HTML content of the Status column (index 3).
                const statusCellHtml = settings.aoData[dataIndex]._aData[3];

                // Check if the HTML content contains the required CSS class string.
                return statusCellHtml.includes(selectedFilterTerm);
            }
        );
        // -----------------------------------------------------------------

        // 1. Initialize DataTables
        transactionsTable = $('.data-table').DataTable({
            searching: true,
            paging: true,
            info: true,
            order: [
                [0, 'asc']
            ],
            dom: '<"top"f>rt<"bottom"ip><"clear">',
        });

        // 2. Tab Switching Logic
        $('.tab-item').on('click', function() {
            // UI Update
            $('.tab-item').removeClass('active');
            $(this).addClass('active');

            const selectedTab = $(this).text().trim();
            let filterTerm = '';

            // Map the tab name to the required CSS class for filtering
            if (selectedTab === 'Paid') {
                filterTerm = 'paid-status';
            } else if (selectedTab === 'Incomplete') {
                filterTerm = 'incomplete-status';
            }
            
            console.log(`Filtering table by: ${selectedTab} (Term: ${filterTerm})`);

            // Apply filter using global search and redraw
            transactionsTable
                .search(filterTerm)
                .draw();

            // SweetAlert notification
            Swal.fire({
                title: 'Data Filtered!',
                text: 'Now showing data for: ' + selectedTab,
                icon: 'info',
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 1500
            });
        });

        // 3. Simple Click Handlers
        $('.btn-primary').on('click', function() {
            Swal.fire('Action', 'Adding New Transaction...', 'success');
        });

        $('.btn-secondary').on('click', function() {
            Swal.fire('Action', 'Exporting Data...', 'info');
        });

        $('.action-btn').on('click', function() {
            const clientName = $(this).closest('tr').find('td:eq(5)').text().trim();
            Swal.fire('Action', `Performing action for client: ${clientName}`, 'warning');
        });

        $('.dropdown select').on('change', function() {
            const selectedTime = $(this).val();
            Swal.fire('Filter', `Time filter set to: ${selectedTime}`, 'question');
        });
    });
</script>

<script>
    addEventListener("DOMContentLoaded", () => {
        
        $table = new DataTable(table_orders);

        tyrax.get({   
            url: "transaction/get",
            //inspect:true,
            response: function(send) {
                if (send.code == 200) {
                    const data = send.data;
                    data.forEach(column => {
                        let bal = column.price - column.downpayment
                        $status = column.status;
                        $method = column.method;
                        $display = ``;
                        $dismet = ``;
                        $action = ``;
                        console.log($method)
                        if($status == 4, $method == "p"){
                            $display = `<span><button class="incomplete-status">Incomplete</button></span>`;
                            $dismet = `<span><button class="methodpend">Pending</button></span>`;
                            $action = `<button class="btn btn-sm btn-outline-success"" title="Edit">Pay</button>`
                            
                        }
                        if($status == 5, $method == "y"){
                            $display = `<span><button class="paid-status">Paid</button></span>`;
                            $dismet = `<span><button class="methodpend">Gcash</button></span>`;
                        }
                        if($status == 5, $method == "n"){
                            $display = `<span><button class="paid-status">Paid</button></span>`;
                            $dismet = `<span><button class="methodpend">Cash</button></span>`;
                        }

                        $table.row.add([
                            column.price,
                            column.downpayment,
                            bal,
                            $display,
                            $dismet,
                            column.fullname,
                            $action,
                            
                        ]).draw();
                    });
                }
            }
        })
    })
</script>