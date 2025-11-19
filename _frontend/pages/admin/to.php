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
        html, body {
            height: 100%;
            /* background-color: #212529; /* Or your desired global dark background */
        }
        .content {
            /* Assuming .content might not always be full height,
               this helps maintain dark theme for the viewport */
            /* background-color: #212529; /* Match sidebar/header if needed */
            min-height: 100vh; /* Ensure it takes at least full viewport height */
        }

        /* Styles from your original CSS, slightly tidied for DataTables dark theme */
        .dataTables_wrapper .dataTables_length select,
        .dataTables_wrapper .dataTables_filter input {
            background-color: white !important;
            color: black !important;
            border: 1px solid #6c757d !important; /* Slightly lighter border for definition */
            border-radius: 0.25rem;
        }

        .dataTables_wrapper .dataTables_length select {
            padding: 0.375rem 2.25rem 0.375rem 0.75rem; /* Keep padding for arrow */
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
            border: 1px solid #495057 !important; /* Slightly lighter border */
            margin: 0 2px; /* Reduced margin slightly */
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
            color: black !important; /* Ensure header text is white */
        }
        #myDataTable tbody td {
            color:black  !important; /* Light grey for body text for better readability than pure white */
            vertical-align: middle; /* Vertically align content in cells */
        }
        #myDataTable.table-dark {
            border-color: #495057; /* Border for the table itself */
        }
        #myDataTable img { /* Ensure images have a light border if on dark bg */
            border: 1px solid #495057;
        }

        /* Action buttons styling for a bit more padding if icons feel cramped */
        .btn-group .btn i {
            /* font-size: 0.9rem; /* Adjust icon size if needed */
        }
        .btn-group .btn {
            padding: 0.25rem 0.5rem; /* Slightly more padding for icon buttons */
        }
    </style>
</head>

<body>
    <?= include_page('sidebar') ?>
    <div class="content">
        <?= include_page('navbar') ?>
        <div class="container-fluid pt-4 px-4">
            <div class="bg-white text-center rounded p-4">
                <div class="d-flex align-items-center justify-content-between mb-4">
                    <h3 class="mb-0 text-dark">Inventory List</h3>
                    <div class="d-flex align-items-center">
                        <button type="button" class="btn btn-primary me-2" data-bs-toggle="modal" data-bs-target="#addPackageModal"> <i class="fas fa-plus"></i> Add New Item
                        </button>
                        <a href="#" class="text-white ">Show All</a>
                    </div>
                </div>
                <div class="table-responsive">
                    <table id="myDataTable" class="table table-white table-striped table-bordered table-hover mb-0" style="width:100%;">
                        <thead>
                            <tr class="text-dark">
                                <th>Image</th>
                                <th>Item Name</th>
                                <th>Rate of Purchased</th>
                                <th>Type</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Data will be populated by JavaScript -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- MODALS (Add, Edit, Delete) - Keep your existing modal HTML here -->
        <!-- Add Modal -->
        <div class="modal fade" id="addPackageModal" tabindex="-1" aria-labelledby="addPackageModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content bg-dark text-white">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addPackageModalLabel">Add New Item</h5> <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form id="addinventoryform">
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="addinventoryImage" class="form-label">Image</label>
                                <input type="file" name="image" class="form-control bg-secondary text-white border-0" id="addinventoryImage">
                            </div>
                            <div class="mb-3">
                                <label for="addServiceName" class="form-label">Item Name</label>
                                <input type="text" name="itemname" class="form-control bg-secondary text-white border-0" id="addServiceName" placeholder="e.g., ring light" required>
                            </div>
                            <div class="mb-3">
                                <label for="addPackageName" class="form-label">Rate of Purchase</label>
                                <input type="number" name="rate_of_purchased" class="form-control bg-secondary text-white border-0" id="addPackageName" placeholder="e.g., 1000" step="0.01" required>
                            </div>
                            <div class="mb-3">
                                <label for="addType" class="form-label">Type</label>
                                <input type="text" name="type" class="form-control bg-secondary text-white border-0" id="addType" placeholder="e.g., good or damage" required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Edit Modal -->
        <div class="modal fade" id="editinventoryModal" tabindex="-1" aria-labelledby="editinventoryModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content bg-dark text-white">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editinventoryModalLabel">Edit Inventory Details</h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form id="editform">
                        <div class="modal-body">
                            <input type="hidden" id="editinventoryId" name="inventoryID"> {/* Make sure name matches backend if form data is used directly */}
                            <div class="mb-3">
                                <label for="editServiceImage" class="form-label">New Image</label>
                                <input type="file" name="image_file" class="form-control bg-secondary text-white border-0" id="editServiceImage">
                                <img src="https://via.placeholder.com/80" id="currentinventoryImage" alt="Current Item Image" class="rounded mt-2" style="width: 80px; height: 80px; object-fit: cover; display: none;">
                            </div>
                            <div class="mb-3">
                                <label for="edititemName" class="form-label">Item Name</label>
                                <input type="text" name="itemname" class="form-control bg-secondary text-white border-0" id="edititemName" placeholder="e.g., ring light" required>
                            </div>
                            <div class="mb-3">
                                <label for="editrateofpurchased" class="form-label">Rate of Purchased</label>
                                <input type="number" name="rate_of_purchased" class="form-control bg-secondary text-white border-0" id="editrateofpurchased" placeholder="e.g., 1000" step="0.01" required>
                            </div>
                            <div class="mb-3">
                                <label for="edittype" class="form-label">Type</label>
                                <input type="text" name="type" class="form-control bg-secondary text-white border-0" id="edittype" placeholder="e.g., good or damage" required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">Update Item</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Delete Modal -->
        <div class="modal fade" id="deletePackageModal" tabindex="-1" aria-labelledby="deletePackageModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content bg-dark text-white">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deletePackageModalLabel">Confirm Deletion</h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure you want to delete this item? This action cannot be undone.</p>
                        <input type="hidden" id="deletePackageId"> {/* This ID is used by your delete function */}
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-danger" id="confirmDeleteBtn">Delete</button> {/* Added ID to hook up JS */}
                    </div>
                </div>
            </div>
        </div>
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
    <!-- <script src="<?=assets()?>/js/main.js"></script> -->

    <script>
        // Mock functions if not defined by your main.js or framework
        // This assumes your `on_submit`, `get_form_data`, `jsinput_to_base64`, `mypost` are defined elsewhere (e.g., in main.js)
        if (typeof on_submit === 'undefined') { function on_submit(selector, callback) { $(selector).on('submit', callback); } }
        if (typeof get_form_data === 'undefined') { function get_form_data(formSelector) { const formData = new FormData($(formSelector)[0]); const data = {}; formData.forEach((value, key) => data[key] = value); return data; } }
        if (typeof jsinput_to_base64 === 'undefined') { async function jsinput_to_base64(selector) { const file = $(selector)[0].files[0]; if (!file) return null; return new Promise((resolve, reject) => { const reader = new FileReader(); reader.onloadend = () => resolve(reader.result); reader.onerror = reject; reader.readAsDataURL(file); }); } }
        if (typeof mypost === 'undefined') {
            async function mypost(endpoint, data) {
                console.log("MOCK POST to:", endpoint, "with data:", data);
                // Simulate API responses
                if (endpoint.includes("display")) {
                    return { backend: { code: 200, data: [
                        { inventoryID: '1', image: 'https://via.placeholder.com/50/0000FF/FFFFFF?Text=Cam1', itemname: 'Camera Alpha', rate_of_purchased: '10000', type: 'Good' },
                        { inventoryID: '2', image: 'https://via.placeholder.com/50/FF0000/FFFFFF?Text=Cam2', itemname: 'Camera Canon Pro', rate_of_purchased: '25000', type: 'Good' },
                        { inventoryID: '3', image: 'https://via.placeholder.com/50/00FF00/000000?Text=Lens', itemname: 'Lens 50mm', rate_of_purchased: '8000', type: 'Needs Repair' }
                    ]}};
                } else if (endpoint.includes("add") || endpoint.includes("update") || endpoint.includes("delete")) {
                     return { backend: { code: 200, message: "Operation successful (mock)." } };
                } else if (endpoint.includes("get")) {
                    return { backend: { code: 200, first_row: { inventoryID: data.id, itemname: 'Fetched Item', rate_of_purchased: '12345', type: 'Fetched Type' } } };
                }
                return { backend: { code: 400, message: "Unknown mock endpoint." } };
            }
        }
         if (typeof on_load === 'undefined') { function on_load(callback) { $(document).ready(callback); } }


        let $mytable; // Make DataTable instance globally accessible

        //add
        on_submit("#addinventoryform", async function(event) { // Pass event
            event.preventDefault();
            let $data = get_form_data("#addinventoryform");
            const imageInput = document.getElementById('addinventoryImage');
            if (imageInput.files.length > 0) {
                $data['img'] = await jsinput_to_base64("#addinventoryImage");
            } else {
                $data['img'] = null; // Or handle if image is mandatory
            }
            const $api = await mypost("inventory/add", $data);
            const $response = $api.backend; // Corrected variable name
            if ($response.code == 200) {
                Swal.fire({ title: "Success", text: $response.message || "Item added successfully!", icon: "success" })
                .then(() => {
                    $('#addPackageModal').modal('hide'); // Hide modal
                    $("#addinventoryform")[0].reset(); // Reset form
                    reload();
                });
            } else {
                Swal.fire({ title: "Error", text: $response.message || "Could not add item.", icon: "error" });
            }
        });

        // Confirm Delete action - Hook this to the modal's delete button
        $('#confirmDeleteBtn').on('click', async function() {
            const id = $('#deletePackageId').val(); // Get ID from hidden input in delete modal
            if (id) {
                await del(id); // Call your existing del function
            }
            $('#deletePackageModal').modal('hide'); // Hide modal after action
        });


        async function del(id) { // This function is called by the icon button
            // Show confirmation modal first instead of direct deletion
            $('#deletePackageId').val(id); // Set the ID in the modal's hidden input
            $('#deletePackageModal').modal('show'); // Show the confirmation modal
            // The actual deletion will be handled by the #confirmDeleteBtn click event
        }


        async function update(id) {
            $("#editinventoryModal").modal("show");
            const $api_get = await mypost("inventory/get", { id: id });
            const $backend_get = $api_get.backend;

            if ($backend_get.code == 200) {
                const $column = $backend_get.first_row;
                $('#editinventoryId').val(id); // Set the hidden ID for the form
                $('#edititemName').val($column.itemname);
                $('#editrateofpurchased').val($column.rate_of_purchased);
                $('#edittype').val($column.type);

                if ($column.image) { // If backend provides an image path for current image
                    $('#currentinventoryImage').attr('src', $column.image).show();
                } else {
                    $('#currentinventoryImage').attr('src', 'https://via.placeholder.com/80').hide(); // Fallback or hide
                }
                $('#editServiceImage').val(''); // Clear the file input

                // Remove previous submit handler to prevent multiple bindings
                $("#editform").off('submit').on('submit', async function(event) {
                    event.preventDefault();
                    let $data_update = get_form_data("#editform"); // Get data from edit form
                    $data_update['id'] = id; // Ensure ID is part of the update payload

                    const editImageInput = document.getElementById('editServiceImage');
                    if (editImageInput.files.length > 0) {
                        $data_update['img'] = await jsinput_to_base64("#editServiceImage");
                    }
                    // If no new image, 'img' won't be in $data_update, backend should handle this

                    const $api_update = await mypost("inventory/update", $data_update);
                    const $response_update = $api_update.backend;
                    if ($response_update.code == 200) {
                        Swal.fire({ title: "Success", text: $response_update.message || "Item updated successfully!", icon: "success" })
                        .then(() => {
                            $('#editinventoryModal').modal('hide');
                            reload();
                        });
                    } else {
                        Swal.fire({ title: "Error", text: $response_update.message || "Could not update item.", icon: "error" });
                    }
                });
            } else {
                 Swal.fire({ title: "Error", text: $backend_get.message || "Could not fetch item details.", icon: "error" });
            }
        }

        async function display() {
            if (!$mytable) { // Initialize DataTable if it hasn't been already
                 $mytable = $('#myDataTable').DataTable({
                    responsive: true,
                    // Add dom option for Bootstrap 5 styling and buttons if needed
                    // dom: "<'row'<'col-sm-12 col-md-6'l><'col-sm-12 col-md-6'f>>" + // Length and Filter
                    //      "<'row'<'col-sm-12'B>>" + // Buttons
                    //      "<'row'<'col-sm-12'tr>>" + // Table
                    //      "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>", // Info and Pagination
                    // buttons: [
                    //     'copyHtml5',
                    //     'excelHtml5',
                    //     'csvHtml5',
                    //     'pdfHtml5',
                    //     'print'
                    // ]
                });
            }

            $mytable.clear().draw(); // Clear existing data

            const $api = await mypost("inventory/display");
            const $backend = $api.backend;
            if ($backend.code == 200) {
                const $data = $backend.data;
                if ($data && $data.length > 0) {
                    $data.forEach(column => {
                        $mytable.row.add([
                            `<img src="${column.image || 'https://via.placeholder.com/50'}" alt="Item Image" class="rounded" style="width: 50px; height: 50px; object-fit: cover;">`,
                            column.itemname ?? "N/A",
                            column.rate_of_purchased ?? "N/A",
                            column.type ?? "N/A",
                            `<div class="btn-group" role="group" aria-label="Item Actions">
                                <button class="btn btn-sm btn-outline-danger" onclick="del('${column.inventoryID}')" title="Delete">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                                <button class="btn btn-sm btn-outline-success ms-1" onclick="update('${column.inventoryID}')" title="Update">
                                    <i class="fas fa-edit"></i>
                                </button>
                             </div>`
                        ]).draw(false); // draw(false) is more efficient in a loop
                    });
                    $mytable.draw(); // Single draw call after adding all rows
                } else {
                    console.log("No data received from inventory/display");
                }
            } else {
                Swal.fire("Error", $backend.message || "Could not display inventory.", "error");
            }
        }

        async function reload() {
            // Potentially show a loading indicator
            await display();
            // Hide loading indicator
        }

        on_load(async function() {
            await display(); // Initial display
        });
    </script>

</body>
</html>