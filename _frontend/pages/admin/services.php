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

            <!-- Sessions Page Content Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-light rounded p-4"> <!-- Main content card for the sessions page -->

                    <!-- Header: Title, Search, New Session Button -->
                    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-4">
                        <h1 class="mb-3 mb-md-0" style="font-size: 2.25rem; font-weight: 500;">Services</h1>
                        <div class="d-flex flex-column flex-sm-row align-items-stretch align-items-sm-center">
                            <div class="input-group me-sm-3 mb-2 mb-sm-0" style="max-width: 300px;">
                                <span class="input-group-text bg-white border-end-0 text-secondary" id="search-icon"><i class="bi bi-search"></i></span>
                                <input type="text" id="serviceSearchInput" class="form-control border-start-0" placeholder="Search services..." aria-label="Search services" aria-describedby="search-icon">
                            </div>
                            <!-- Updated New Service Button to trigger modal -->
                            <button type="button" class="btn text-white px-3 py-2" style="background-color: red; border-color: #17a2b8; min-width: 130px;" data-bs-toggle="modal" data-bs-target="#createServiceModal">
                                New Service
                            </button>
                        </div>
                    </div>


                    <!-- Tab Navigation -->
                    <ul class="nav nav-tabs sessions-tabs mb-4" id="sessionsTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="all-sessions-tab" data-bs-toggle="tab" data-bs-target="#all-sessions-content" type="button" role="tab" aria-controls="all-sessions-content" aria-selected="true"></button>
                        </li>
                    </ul>

                    <style>
                        .sessions-tabs .nav-link {
                            color: #6c757d;
                            border: none;
                            border-bottom: 3px solid transparent;
                            padding-left: 0;
                            padding-right: 0;
                            margin-right: 24px;
                            background-color: transparent;
                        }

                        .sessions-tabs .nav-link.active {
                            color: #000000;
                            border-bottom: 3px solid #000000;
                            font-weight: 500;
                        }

                        .sessions-tabs .nav-link:hover {
                            color: #495057;
                            border-bottom-color: #dee2e6;
                        }

                        .client-initials {
                            /* Kept for other tabs if they use it */
                            background-color: #e9ecef;
                            color: #495057;
                            width: 32px;
                            height: 32px;
                            border-radius: 50%;
                            display: inline-flex;
                            align-items: center;
                            justify-content: center;
                            font-weight: 500;
                            font-size: 0.85rem;
                        }

                        .session-status-confirmed {
                            /* Kept for other tabs */
                            background-color: #d4edda;
                            color: #155724;
                            font-weight: 500;
                            padding: 0.3em 0.6em;
                            font-size: 0.75rem;
                        }

                        .session-type-dot {
                            /* Kept for other tabs */
                            width: 8px;
                            height: 8px;
                            border-radius: 50%;
                            display: inline-block;
                            background-color: #dc3545;
                        }

                        .sessions-table th {
                            /* Kept for other tabs */
                            font-size: 0.75rem;
                            font-weight: 600;
                            text-transform: uppercase;
                            color: #6c757d;
                            padding-top: 1rem;
                            padding-bottom: 1rem;
                            border-bottom: 1px solid #dee2e6;
                            border-top: none;
                        }

                        .sessions-table td {
                            /* Kept for other tabs */
                            padding-top: 1rem;
                            padding-bottom: 1rem;
                            vertical-align: middle;
                            border-bottom: 1px solid #dee2e6;
                        }

                        .sessions-table tr:last-child td {
                            /* Kept for other tabs */
                            border-bottom: none;
                        }

                        .sessions-table .text-muted {
                            /* Kept for other tabs */
                            font-size: 0.85rem;
                        }

                        .empty-state-container {
                            padding-top: 80px;
                            padding-bottom: 80px;
                        }

                        .empty-state-container h3 {
                            font-size: 1.5rem;
                            font-weight: 500;
                            margin-bottom: 0.75rem;
                        }

                        .empty-state-container p {
                            color: #6c757d;
                            font-size: 1rem;
                        }

                        .table {
                            background-color: transparent;
                        }

                        .bg-light.rounded.p-4 {
                            background-color: #ffffff !important;
                        }

                        /* Card Styles */
                        .service-card {
                            transition: box-shadow .3s ease-in-out;
                            border: 1px solid #e9ecef;
                            /* Light border for cards */
                        }

                        .service-card:hover {
                            box-shadow: 0 .5rem 1rem rgba(0, 0, 0, .10) !important;
                            /* Softer shadow */
                        }

                        .service-card .card-img-top {
                            height: 200px;
                            object-fit: cover;
                        }

                        .service-card .card-title {
                            font-size: 1.1rem;
                            font-weight: 500;
                            color: #343a40;
                        }

                        .service-card .card-subtitle {
                            font-size: 1rem;
                            /* Price subtitle */
                        }

                        .service-card .card-text small {
                            /* For truncated description */
                            display: -webkit-box;
                            -webkit-line-clamp: 2;
                            -webkit-box-orient: vertical;
                            overflow: hidden;
                            text-overflow: ellipsis;
                            min-height: 2.4em;
                        }

                        .service-card .card-text ul li {
                            margin-bottom: 0.25rem;
                            /* Spacing for list items in card */
                        }

                        .service-card .price-tag {
                            font-size: 0.9rem;
                            color: #495057;
                        }

                        .service-card .card-body {
                            display: flex;
                            flex-direction: column;
                        }

                        .service-card .card-actions {
                            /* For dynamically added services */
                            margin-top: auto;
                        }

                        .service-card .card-footer {
                            /* For dynamically added services */
                            background-color: #f8f9fa;
                            border-top: 1px solid #e9ecef;
                        }

                        /* Main package card container */
                        .package-card {
                            background: #ffffff;
                            border-radius: 15px;
                            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
                            transition: transform 0.3s ease, box-shadow 0.3s ease;
                            padding: 2rem;
                            height: 100%;
                            display: flex;
                            flex-direction: column;
                            position: relative;
                            overflow: hidden;
                        }

                        /* Hover effect for interactivity */
                        .package-card:hover {
                            transform: translateY(-8px);
                            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.12);
                        }

                        /* Featured package style */
                        .package-card-featured {
                            border: 3px solid #6c5ce7;
                            /* A vibrant purple border */
                            transform: scale(1.05);
                            /* Make it stand out a bit more */
                        }

                        /* Featured badge */
                        .package-badge {
                            position: absolute;
                            top: 15px;
                            right: 15px;
                            background-color: #6c5ce7;
                            color: #ffffff;
                            padding: 5px 15px;
                            border-radius: 20px;
                            font-size: 0.75rem;
                            font-weight: bold;
                            text-transform: uppercase;
                        }

                        /* Header and title styling */
                        .package-card-header {
                            border-bottom: 2px solid #f0f0f0;
                            padding-bottom: 1.5rem;
                            margin-bottom: 1.5rem;
                        }

                        .package-title {
                            font-size: 1.75rem;
                            font-weight: 700;
                            color: #333;
                            margin-bottom: 0.25rem;
                        }

                        .package-service {
                            font-size: 0.9rem;
                            color: #888;
                        }

                        /* Price section */
                        .price-section {
                            margin-bottom: 1.5rem;
                        }

                        .price-value {
                            font-size: 3rem;
                            font-weight: 800;
                            color: #6c5ce7;
                            /* Vibrant purple for the price */
                            margin-bottom: 0.25rem;
                        }

                        .down-payment-value {
                            font-size: 1rem;
                            color: #555;
                            font-weight: 500;
                        }

                        .regular-price-value {
                            font-size: 0.9rem;
                            color: #aaa;
                            text-decoration: line-through;
                        }

                        /* Inclusions list styling */
                        .inclusions-section {
                            flex-grow: 1;
                            /* Pushes content to the bottom */
                        }

                        .inclusions-section ul {
                            padding: 0;
                            list-style-type: none;
                        }

                        .inclusions-section li {
                            font-size: 1rem;
                            margin-bottom: 10px;
                            color: #444;
                        }

                        .inclusions-section li i {
                            color: #28a745;
                            /* Green for checkmarks */
                            margin-right: 10px;
                        }

                        /* Action buttons */
                    </style>


                    <!-- Tab Content -->
                    <div class="tab-content" id="sessionsTabContent">
                        <!-- All Services -->
                        <div class="tab-pane fade show active" id="all-sessions-content" role="tabpanel" aria-labelledby="all-sessions-tab">
                            <div id="allServicesContainer" class="row g-4">
                                
                            </div>
                            <div id="noServicesMessage" class="text-center empty-state-container" style="display: none;">
                                <h3>No services found</h3>
                                <p>Create a new service to get started or refine your search.</p>
                            </div>
                            <div class="d-flex justify-content-end text-muted small mt-3" id="allServicesCount">

                            </div>
                        </div>

                        <!-- All Packages -->
                        <div class="tab-pane fade" id="all-packages-content" role="tabpanel" aria-labelledby="all-packages-tab">
                            <div id="allPackagesContainer" class="row g-4"></div>
                            <div id="noPackagesMessage" class="text-center empty-state-container" style="display: none;">
                                <h3>No packages found</h3>
                                <p>Create a new package to get started or refine your search.</p>
                            </div>
                            <div class="d-flex justify-content-end text-muted small mt-3" id="allPackagesCount"></div>
                        </div>
                    </div>


                    <div class="modal fade" id="createServiceModal" tabindex="-1" aria-labelledby="createServiceModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="createServiceModalLabel">Create a New Service</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>

                                <div class="modal-body">
                                    <form id="createServiceForm">
                                        <div class="mb-3">
                                            <label for="serviceName" class="form-label">Service Name</label>
                                            <input type="text" class="form-control" id="serviceName" name="services_name">
                                        </div>

                                        <div class="mb-3">
                                            <label for="serviceDescription" class="form-label">Description</label>
                                            <textarea class="form-control" id="serviceDescription" rows="4" name="description"></textarea>
                                        </div>

                                        <div class="mb-3">
                                            <label for="serviceImage" class="form-label">Upload Image</label>
                                            <input type="file" class="form-control" id="serviceImage" accept="image/*" name="img">
                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                            <button type="submit" class="btn btn-primary" form="createServiceForm">Save Service</button>
                                        </div>
                                    </form>
                                </div>



                            </div>
                        </div>
                    </div>


                    <!-- Content End -->


                    <!-- Back to Top -->
                    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
                </div>

                <!-- Edit Service Modal -->
                <div class="modal fade" id="editServiceModal" tabindex="-1" aria-labelledby="editServiceModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">

                            <div class="modal-header">
                                <h5 class="modal-title" id="editServiceModalLabel">Edit Service</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>

                            <form id="editServiceForm">
                                <div class="modal-body">
                                <input type="hidden" name="sevicesID" id="uservicesID">

                                    <div class="mb-3">
                                        <label for="editServiceName" class="form-label">Service Name</label>
                                        <input type="text" class="form-control" id="uservices_name" name="services_name">
                                    </div>


                                    <div class="mb-3">
                                        <label for="editDescription" class="form-label">Description</label>
                                        <textarea class="form-control" id="udescription" rows="4" name="description"></textarea>
                                    </div>

                                    <div class="mb-3">
                                        <label for="editServiceImage" class="form-label">Upload Image</label>
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


                <!-- JavaScript Libraries -->
                <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>


                <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
                <!-- DataTables (kept for other potential tables/tabs, remove if not used anywhere) -->
                <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
                <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
                <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>

                <!-- SweetAlert2 -->
                <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

                <script src="<?= assets() ?>/lib/chart/chart.min.js"></script>
                <script src="<?= assets() ?>/lib/easing/easing.min.js"></script>
                <script src="<?= assets() ?>/lib/waypoints/waypoints.min.js"></script>
                <script src="<?= assets() ?>/lib/owlcarousel/owl.carousel.min.js"></script>
                <script src="<?= assets() ?>/lib/tempusdominus/js/moment.min.js"></script>
                <script src="<?= assets() ?>/lib/tempusdominus/js/moment-timezone.min.js"></script>
                <script src="<?= assets() ?>/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

                <!-- Template Javascript -->
                <script src="<?= assets() ?>/js/main.js"></script>

                <?= import_twal() ?>
                <?= import_tyrux() ?>

                <script>
                    // Hardcoded base path to your assets directory.
                    // This assumes your web server root points to the 'PHOTOGRAP' directory.
                    const assetsBasePath = "http://localhost/PHOTOGRAP/_frontend/assets";

                    // Mock for mypost function
                    async function mypost(endpoint, data, isFormData = false) {
                        const url = endpoint;
                        if (endpoint === "api/service_handler.php") { // Mocking this endpoint
                            if (typeof mypost.mockData === 'undefined') {
                                mypost.mockData = [{
                                        packageID: '1',
                                        services_name: 'Wedding',
                                        packagename: 'Golden Hour Package',
                                        description: 'Full day wedding coverage with album and prints. Captures every magical moment.',
                                        downpayment: '500.00',
                                        fullpayment: '2500.00',
                                        date_modified: '2023-10-26 10:00:00',
                                        image_path: null
                                    },
                                    {
                                        packageID: '2',
                                        services_name: 'Portrait',
                                        packagename: 'Lifestyle Portrait Session',
                                        description: '1-hour portrait session in a natural setting, 20 beautifully edited images.',
                                        downpayment: '50.00',
                                        fullpayment: '200.00',
                                        date_modified: '2023-10-27 11:00:00',
                                        image_path: null
                                    },
                                    {
                                        packageID: '3',
                                        services_name: 'Event',
                                        packagename: 'Corporate Conference',
                                        description: 'Professional coverage for corporate events, conferences, and galas. Per hour billing available.',
                                        downpayment: '100.00',
                                        fullpayment: '400.00',
                                        date_modified: '2023-10-28 12:00:00',
                                        image_path: null
                                    },
                                    {
                                        packageID: '4',
                                        services_name: 'Family',
                                        packagename: 'Family Fun Package',
                                        description: 'A fun and relaxed family photoshoot, perfect for creating lasting memories. Includes digital images.',
                                        downpayment: '75.00',
                                        fullpayment: '300.00',
                                        date_modified: '2023-11-01 09:00:00',
                                        image_path: null
                                    },
                                    {
                                        packageID: '5',
                                        services_name: 'School & Milestone',
                                        packagename: 'Graduation Day Special',
                                        description: 'Capture the pride and joy of graduation day with our special milestone package.',
                                        downpayment: '60.00',
                                        fullpayment: '250.00',
                                        date_modified: '2023-11-02 10:00:00',
                                        image_path: null
                                    },
                                    {
                                        packageID: '6',
                                        services_name: 'Cultural & Lifestyle',
                                        packagename: 'Street Fest Vibes',
                                        description: 'Vibrant coverage of street festivals and cultural events, capturing the energy and atmosphere.',
                                        downpayment: '80.00',
                                        fullpayment: '350.00',
                                        date_modified: '2023-11-03 11:00:00',
                                        image_path: null
                                    },
                                    {
                                        packageID: '7',
                                        services_name: 'Birthday',
                                        packagename: 'Birthday Bash Capture',
                                        description: 'Memorable photos of your special birthday celebration.',
                                        downpayment: '40.00',
                                        fullpayment: '150.00',
                                        date_modified: '2023-11-04 12:00:00',
                                        image_path: null
                                    },
                                ];
                            }
                            let action;
                            let payload;
                            if (isFormData) {
                                action = data.get('action');
                                payload = {};
                                for (let pair of data.entries()) {
                                    payload[pair[0]] = pair[1];
                                }
                            } else {
                                action = data.action;
                                payload = data;
                            }

                            switch (action) {
                                case 'add':
                                    const newId = 'mock_' + Date.now();
                                    const newService = {
                                        packageID: newId,
                                        ...payload,
                                        date_modified: new Date().toISOString()
                                    };
                                    delete newService.image_file;
                                    mypost.mockData.push(newService);
                                    return {
                                        backend: {
                                            code: 200,
                                            status: 'success',
                                            message: "Service added (mock).",
                                            first_row: newService
                                        }
                                    };
                                case 'update':
                                    const index = mypost.mockData.findIndex(s => s.packageID === payload.packageID);
                                    if (index > -1) {
                                        mypost.mockData[index] = {
                                            ...mypost.mockData[index],
                                            ...payload,
                                            date_modified: new Date().toISOString()
                                        };
                                        delete mypost.mockData[index].image_file;
                                        return {
                                            backend: {
                                                code: 200,
                                                status: 'success',
                                                message: "Service updated (mock).",
                                                first_row: mypost.mockData[index]
                                            }
                                        };
                                    }
                                    return {
                                        backend: {
                                            code: 404,
                                            status: 'error',
                                            message: "Service not found (mock)."
                                        }
                                    };
                                case 'delete':
                                    mypost.mockData = mypost.mockData.filter(s => s.packageID !== payload.id);
                                    return {
                                        backend: {
                                            code: 200,
                                            status: 'success',
                                            message: "Service deleted (mock)."
                                        }
                                    };
                                case 'get':
                                    const service = mypost.mockData.find(s => s.packageID === payload.id);
                                    return service ? {
                                        backend: {
                                            code: 200,
                                            status: 'success',
                                            first_row: service
                                        }
                                    } : {
                                        backend: {
                                            code: 404,
                                            status: 'error',
                                            message: "Service not found (mock)."
                                        }
                                    };
                                case 'display':
                                    let servicesToDisplay = payload.search ? mypost.mockData.filter(s => Object.values(s).some(val => String(val).toLowerCase().includes(payload.search.toLowerCase()))) : mypost.mockData;
                                    return {
                                        backend: {
                                            code: 200,
                                            status: 'success',
                                            data: servicesToDisplay
                                        }
                                    };
                                default:
                                    return {
                                        backend: {
                                            code: 400,
                                            status: 'error',
                                            message: "Invalid action (mock)."
                                        }
                                    };
                            }
                        }
                        // Fallback for non-mocked endpoints (requires actual backend)
                        console.warn("Attempting real fetch to an unmocked endpoint:", url);
                        try {
                            const options = {
                                method: 'POST'
                            };
                            if (isFormData) {
                                options.body = data;
                            } else {
                                options.headers = {
                                    'Content-Type': 'application/json'
                                };
                                options.body = JSON.stringify(data);
                            }
                            const response = await fetch(url, options);
                            if (!response.ok) {
                                throw new Error(`HTTP error! status: ${response.status}`);
                            }
                            const responseData = await response.json();
                            return {
                                backend: responseData
                            };
                        } catch (error) {
                            console.error("mypost error:", error);
                            return {
                                backend: {
                                    code: 500,
                                    message: error.message || "Network or server error",
                                    data: [],
                                    first_row: {}
                                }
                            };
                        }
                    }

                    function on_submit(selector, callback) {
                        $(selector).on('submit', callback);
                    }

                    function on_load(callback) {
                        $(document).ready(callback);
                    }

                    // Helper function to get a LOCAL STATIC placeholder image URL
                    function getStaticServiceImageUrl(serviceName) {
                        let imageName = "default_service.jpg"; // Ensure 'default_service.jpg' exists in your img folder
                        switch (String(serviceName).toLowerCase()) { // Normalize serviceName
                            case "wedding":
                                imageName = "wed.jpg";
                                break;
                            case "portrait":
                                imageName = "port.jpg";
                                break;
                            case "event":
                                imageName = "ev.jpg";
                                break;
                            case "school & milestone":
                                imageName = "gra.jpg";
                                break;
                            case "family":
                                imageName = "homeimage.jpg";
                                break;
                            case "cultural & lifestyle":
                                imageName = "fes.jpg";
                                break;
                            case "birthday":
                                imageName = "birthday.jpg";
                                break;
                        }
                        return `${assetsBasePath}/img/${imageName}`; // Uses hardcoded assetsBasePath + /img/ + imageName
                    }

                    async function reload_data() {
                        await displayAllServices($('#serviceSearchInput').val());
                    }

                    // --- CRUD Operations Handlers ---
                    on_submit("#addserviceform", async function(event) {
                        event.preventDefault();
                        const formData = new FormData(this);
                        formData.append('action', 'add');
                        const $api = await mypost("api/service_handler.php", formData, true);
                        const $response = $api.backend;
                        if ($response.code == 200) {
                            Swal.fire({
                                    title: "Success",
                                    text: $response.message || "Service added",
                                    icon: "success",
                                    timer: 1500,
                                    showConfirmButton: false
                                })
                                .then(() => {
                                    $('#addPackageModal').modal('hide');
                                    this.reset();
                                    reload_data();
                                });
                        } else {
                            Swal.fire({
                                title: "Error",
                                text: $response.message || "Error adding service",
                                icon: "error"
                            });
                        }
                    });

                    function openDeleteModal(id) {
                        $('#deletePackageId').val(id);
                        $('#deletePackageModal').modal('show');
                    }

                    $('#confirmDeleteBtn').on('click', async function() {
                        const id = $('#deletePackageId').val();
                        if (!id) return;
                        const $api = await mypost("api/service_handler.php", {
                            action: 'delete',
                            id: id
                        });
                        const $response = $api.backend;
                        if ($response.code == 200) {
                            Swal.fire({
                                    title: "Success",
                                    text: $response.message || "Service deleted",
                                    icon: "success",
                                    timer: 1500,
                                    showConfirmButton: false
                                })
                                .then(() => {
                                    $('#deletePackageModal').modal('hide');
                                    reload_data();
                                });
                        } else {
                            Swal.fire({
                                title: "Error",
                                text: $response.message || "Error deleting service",
                                icon: "error"
                            });
                        }
                    });

                     

                    on_submit("#editform", async function(event) {
                        event.preventDefault();
                        const formData = new FormData(this);
                        formData.append('action', 'update');
                        const $api = await mypost("api/service_handler.php", formData, true);
                        const $response = $api.backend;
                        if ($response.code == 200) {
                            Swal.fire({
                                    title: "Success",
                                    text: $response.message || "Service updated",
                                    icon: "success",
                                    timer: 1500,
                                    showConfirmButton: false
                                })
                                .then(() => {
                                    $('#editServiceModal').modal('hide');
                                    reload_data();
                                });
                        } else {
                            Swal.fire({
                                title: "Error",
                                text: $response.message || "Error updating service",
                                icon: "error"
                            });
                        }
                    });

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
                                            servicesID : servicesID
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
                                    <a href="<?= page('admin/packages?id=') ?>${servicesID}"><button class="btn btn-sm btn-outline-success me-1" data-bs-toggle="modal" data-bs-target="#addPackageModal" title="Add New Service"><i class="bi bi-plus-circle-fill"></i></button></a>
                                    <button class="btn btn-sm btn-outline-danger me-1" onclick="del_services('${servicesID}')" title="Delete"><i class="bi bi-trash"></i></button>
                                    <button class="btn btn-sm btn-outline-primary" onclick="openEditModal('${servicesID}')" title="Edit"><i class="bi bi-pencil-square"></i></button>
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



</body>

</html>

<script>
    createServiceForm.addEventListener("submit", function() {
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
        .then((click)=>{
            if(click.confirm){
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

        editServiceForm.addEventListener("submit", function() {
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