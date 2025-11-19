<!DOCTYPE html>
<html lang="en">

<?=include_page('header')?>

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
        <?=include_page('sidebar')?>
        <!-- Sidebar End -->


        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            <?=include_page('navbar')?>
            <!-- Navbar End -->

            <!-- Sessions Page Content Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-light rounded p-4"> <!-- Main content card for the sessions page -->

                    <!-- Header: Title, Search, New Session Button -->
                    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-4">
                        <h1 class="mb-3 mb-md-0" style="font-size: 2.25rem; font-weight: 500;">Sessions</h1>
                        <div class="d-flex flex-column flex-sm-row align-items-stretch align-items-sm-center">
                            <div class="input-group me-sm-3 mb-2 mb-sm-0" style="max-width: 300px;">
                                <span class="input-group-text bg-white border-end-0 text-secondary" id="search-icon"><i class="bi bi-search"></i></span>
                                <input type="text" class="form-control border-start-0" placeholder="Search email or contact name" aria-label="Search sessions" aria-describedby="search-icon">
                            </div>
                            <!-- Updated New Session Button to trigger modal -->
                            <button type="button" class="btn text-white px-3 py-2" style="background-color: red; border-color: #17a2b8; min-width: 130px;" data-bs-toggle="modal" data-bs-target="#newSessionModal"> 
                                New Session
                            </button>
                        </div>
                    </div>

                    <!-- Tab Navigation -->
                    <ul class="nav nav-tabs sessions-tabs mb-4" id="sessionsTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="all-sessions-tab" data-bs-toggle="tab" data-bs-target="#all-sessions-content" type="button" role="tab" aria-controls="all-sessions-content" aria-selected="true">All Sessions</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="upcoming-sessions-tab" data-bs-toggle="tab" data-bs-target="#upcoming-sessions-content" type="button" role="tab" aria-controls="upcoming-sessions-content" aria-selected="false">Upcoming</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pending-sessions-tab" data-bs-toggle="tab" data-bs-target="#pending-sessions-content" type="button" role="tab" aria-controls="pending-sessions-content" aria-selected="false">Pending</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="past-sessions-tab" data-bs-toggle="tab" data-bs-target="#past-sessions-content" type="button" role="tab" aria-controls="past-sessions-content" aria-selected="false">Past</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="canceled-sessions-tab" data-bs-toggle="tab" data-bs-target="#canceled-sessions-content" type="button" role="tab" aria-controls="canceled-sessions-content" aria-selected="false">Canceled</button>
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
                            background-color: #d4edda; 
                            color: #155724; 
                            font-weight: 500;
                            padding: 0.3em 0.6em;
                            font-size: 0.75rem;
                        }
                        .session-type-dot {
                            width: 8px;
                            height: 8px;
                            border-radius: 50%;
                            display: inline-block;
                            background-color: #dc3545; 
                        }
                        .sessions-table th {
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
                            padding-top: 1rem;
                            padding-bottom: 1rem;
                            vertical-align: middle;
                            border-bottom: 1px solid #dee2e6; 
                        }
                         .sessions-table tr:last-child td {
                            border-bottom: none; 
                        }
                        .sessions-table .text-muted {
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
                    </style>

                    <!-- Tab Content -->
                    <div class="tab-content" id="sessionsTabContent">
                        
                        <div class="tab-pane fade show active" id="all-sessions-content" role="tabpanel" aria-labelledby="all-sessions-tab">
                           <div class="table-responsive">
                                <table class="table sessions-table">
                                    <thead>
                                        <tr>
                                            <th scope="col">Name / Type</th>
                                            <th scope="col">Session Date</th>
                                            <th scope="col">Client</th>
                                            <th scope="col">Project</th>
                                            <th scope="col">Created <i class="bi bi-arrow-down"></i></th>
                                            <th scope="col" class="text-end"></th> 
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-start">
                                                    <div class="flex-grow-1">
                                                        <div class="fw-bold">Angel Fam</div>
                                                        <div class="d-flex align-items-center text-muted">
                                                            <span class="session-type-dot me-1"></span>
                                                            <span>Family</span>
                                                        </div>
                                                    </div>
                                                    <span class="badge session-status-confirmed ms-2 align-self-start">CONFIRMED</span>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="fw-bold">Friday, May 30, 2025</div>
                                                <div class="text-muted">1:30 PM - 2:00 PM</div>
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <span class="client-initials me-2">MM</span>
                                                    <span>meow meow</span>
                                                </div>
                                            </td>
                                            <td>Angel Fam</td>
                                            <td>May 19, 2025</td>
                                            <td class="text-end"><button class="btn btn-link text-secondary p-0"><i class="bi bi-three-dots"></i></button></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="d-flex justify-content-end text-muted small mt-3">
                                1 - 1 of 1
                            </div>
                        </div>

                        <div class="tab-pane fade" id="upcoming-sessions-content" role="tabpanel" aria-labelledby="upcoming-sessions-tab">
                            <div class="table-responsive">
                                <table class="table sessions-table">
                                    <thead>
                                        <tr>
                                            <th scope="col">Name / Type</th>
                                            <th scope="col">Session Date <i class="bi bi-arrow-up"></i></th>
                                            <th scope="col">Client</th>
                                            <th scope="col">Project</th>
                                            <th scope="col">Created</th>
                                            <th scope="col" class="text-end"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-start">
                                                    <div class="flex-grow-1">
                                                        <div class="fw-bold">meow's Family Sessi...</div>
                                                        <div class="d-flex align-items-center text-muted">
                                                            <span class="session-type-dot me-1"></span>
                                                            <span>Family</span>
                                                        </div>
                                                    </div>
                                                    <span class="badge session-status-confirmed ms-2 align-self-start">CONFIRMED</span>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="fw-bold">Friday, May 30, 2025</div>
                                                <div class="text-muted">1:30 PM - 2:00 PM</div>
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <span class="client-initials me-2">MM</span>
                                                    <span>meow meow</span>
                                                </div>
                                            </td>
                                            <td>meow's Family Project</td>
                                            <td>May 19, 2025</td>
                                            <td class="text-end"><button class="btn btn-link text-secondary p-0"><i class="bi bi-three-dots"></i></button></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="d-flex justify-content-end text-muted small mt-3">
                                1 - 1 of 1
                            </div>
                        </div>

                        <div class="tab-pane fade" id="pending-sessions-content" role="tabpanel" aria-labelledby="pending-sessions-tab">
                            <div class="text-center empty-state-container">
                                <h3>No pending sessions</h3>
                                <p>Sessions that are pending will be listed here.</p>
                            </div>
                        </div>
                        
                        <div class="tab-pane fade" id="past-sessions-content" role="tabpanel" aria-labelledby="past-sessions-tab">
                            <div class="table-responsive">
                                <table class="table sessions-table">
                                    <thead>
                                        <tr>
                                            <th scope="col">Name / Type</th>
                                            <th scope="col">Session Date <i class="bi bi-arrow-down"></i></th>
                                            <th scope="col">Client</th>
                                            <th scope="col">Project</th>
                                            <th scope="col">Created</th>
                                            <th scope="col" class="text-end"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-start">
                                                    <div class="flex-grow-1">
                                                        <div class="fw-bold">levi's Family Session</div>
                                                        <div class="d-flex align-items-center text-muted">
                                                            <span class="session-type-dot me-1"></span>
                                                            <span>Family</span>
                                                        </div>
                                                    </div>
                                                    <span class="badge session-status-confirmed ms-2 align-self-start">CONFIRMED</span>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="fw-bold">Friday, May 23, 2025</div>
                                                <div class="text-muted">12:00 PM - 12:30 PM</div>
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <span class="client-initials me-2">LA</span>
                                                    <span>levi ackerman</span>
                                                </div>
                                            </td>
                                            <td>levi's Family Project</td>
                                            <td>May 19, 2025</td>
                                            <td class="text-end"><button class="btn btn-link text-secondary p-0"><i class="bi bi-three-dots"></i></button></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-start">
                                                    <div class="flex-grow-1">
                                                        <div class="fw-bold">mia's Family Session</div>
                                                        <div class="d-flex align-items-center text-muted">
                                                            <span class="session-type-dot me-1"></span>
                                                            <span>Family</span>
                                                        </div>
                                                    </div>
                                                    <span class="badge session-status-confirmed ms-2 align-self-start">CONFIRMED</span>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="fw-bold">Tuesday, May 20, 2025</div>
                                                <div class="text-muted">9:00 AM - 9:30 AM</div>
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <span class="client-initials me-2">MA</span>
                                                    <span>mia ackerman</span>
                                                </div>
                                            </td>
                                            <td>mia's Family Project</td>
                                            <td>May 19, 2025</td>
                                            <td class="text-end"><button class="btn btn-link text-secondary p-0"><i class="bi bi-three-dots"></i></button></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-start">
                                                    <div class="flex-grow-1">
                                                        <div class="fw-bold">angel's Family Sessi...</div>
                                                        <div class="d-flex align-items-center text-muted">
                                                            <span class="session-type-dot me-1"></span>
                                                            <span>Family</span>
                                                        </div>
                                                    </div>
                                                    <span class="badge session-status-confirmed ms-2 align-self-start">CONFIRMED</span>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="fw-bold">Monday, May 19, 2025</div>
                                                <div class="text-muted">12:00 PM - 12:30 PM</div>
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <span class="client-initials me-2">MA</span>
                                                    <span>mia ackerman</span>
                                                </div>
                                            </td>
                                            <td>angel's Family Project</td>
                                            <td>May 19, 2025</td>
                                            <td class="text-end"><button class="btn btn-link text-secondary p-0"><i class="bi bi-three-dots"></i></button></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="d-flex justify-content-end text-muted small mt-3">
                                1 - 3 of 3
                            </div>
                        </div>

                        <div class="tab-pane fade" id="canceled-sessions-content" role="tabpanel" aria-labelledby="canceled-sessions-tab">
                            <div class="text-center empty-state-container">
                                <h3>No canceled sessions</h3>
                                <p>Sessions that are canceled will be listed here.</p>
                            </div>
                        </div>

                    </div> 

                </div> 
            </div> 
            <!-- Sessions Page Content End -->
            
        </div>
        <!-- Content End -->

        <!-- New Session Modal Start -->
        <div class="modal fade" id="newSessionModal" tabindex="-1" aria-labelledby="newSessionModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg"> 
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="newSessionModalLabel">Create New Session</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="newSessionForm">
                            <div class="mb-3">
                                <label for="sessionNameModal" class="form-label">Session Name</label>
                                <input type="text" class="form-control" id="sessionNameModal" placeholder="e.g., Johnson Family Shoot" required>
                            </div>
                            <div class="mb-3">
                                <label for="sessionTypeModal" class="form-label">Session Type</label>
                                <select class="form-select" id="sessionTypeModal" required>
                                    <option selected disabled value="">Choose...</option>
                                    <option value="Family">Family</option>
                                    <option value="Wedding">Wedding</option>
                                    <option value="Portrait">Portrait</option>
                                    <option value="Event">Event</option>
                                    <option value="Commercial">Commercial</option>
                                    <option value="Other">Other</option>
                                </select>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="sessionDateModal" class="form-label">Session Date</label>
                                    <input type="date" class="form-control" id="sessionDateModal" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="sessionTimeModal" class="form-label">Session Time</label>
                                    <input type="time" class="form-control" id="sessionTimeModal" required>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="clientNameModal" class="form-label">Client Name</label>
                                <input type="text" class="form-control" id="clientNameModal" placeholder="Enter client's full name" required>
                            </div>
                            <div class="mb-3">
                                <label for="projectNameModal" class="form-label">Project Name</label>
                                <input type="text" class="form-control" id="projectNameModal" placeholder="Associated project (if any)">
                            </div>
                            <div class="mb-3">
                                <label for="sessionStatusModal" class="form-label">Status</label>
                                <select class="form-select" id="sessionStatusModal" required>
                                    <option value="Confirmed" selected>Confirmed</option>
                                    <option value="Pending">Pending</option>
                                    <option value="Canceled">Canceled</option>
                                </select>
                            </div>
                             <div class="mb-3">
                                <label for="sessionNotesModal" class="form-label">Notes (Optional)</label>
                                <textarea class="form-control" id="sessionNotesModal" rows="3"></textarea>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" form="newSessionForm" class="btn text-white" style="background-color: #17a2b8; border-color: #17a2b8;">Create Session</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- New Session Modal End -->

        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

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