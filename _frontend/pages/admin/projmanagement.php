<!DOCTYPE html>
<html lang="en">

<?=include_page('header')?>

<style>
    :root {
        /* --primary-color: #00A383;  OLD Green */
        --primary-color: #D81921; /* NEW RED - Using your logo red */
        --light-gray: #f8f9fa;
        --medium-gray: #e9ecef;
        --dark-gray: #6c757d;
        --text-dark: #343a40;
        --border-color: #dee2e6;

        --stage-inquiry: #ffc107; /* Yellow/Orange */
        --stage-booked: #6f42c1;  /* Purple */
        --stage-post-production: #0d6efd; /* Blue */
        /* --stage-completed: #198754; OLD Green */
        --stage-completed: var(--primary-color); /* NEW RED for completed stage */
    }

    .content {
        padding: 0; 
        background-color: #F7F7F7; 
    }
    
    .projects-page-container {
        background-color: white;
        padding: 25px;
    }

    .projects-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 25px;
    }

    .projects-header h1 {
        font-size: 2.5rem;
        font-weight: 600;
        color: var(--text-dark);
        margin: 0;
    }
    
    .projects-header .actions {
        display: flex;
        align-items: center;
        gap: 15px;
    }

    .projects-header .search-bar {
        position: relative;
    }
    .projects-header .search-bar input {
        padding-left: 35px;
        border-radius: 6px;
        border: 1px solid var(--border-color);
        height: 40px;
    }
    .projects-header .search-bar .fa-search {
        position: absolute;
        left: 12px;
        top: 50%;
        transform: translateY(-50%);
        color: var(--dark-gray);
    }

    .btn-project-settings, .btn-new-project {
        padding: 8px 15px;
        border-radius: 6px;
        font-weight: 500;
        height: 40px;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .btn-project-settings {
        background-color: #fff;
        border: 1px solid var(--border-color);
        color: var(--text-dark);
    }
    .btn-new-project {
        background-color: var(--primary-color); /* Uses the new red */
        color: white;
        border: none;
    }
    .btn-new-project:hover {
        /* background-color: #008269; OLD Green Hover */
        background-color: #b8161d; /* Darker red for hover */
    }


    .view-controls {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 20px;
        border-bottom: 1px solid var(--border-color);
    }

    .view-tabs .nav-link {
        color: var(--dark-gray);
        font-weight: 500;
        padding: 10px 15px;
        border: none;
        border-bottom: 3px solid transparent;
        margin-bottom: -1px; 
    }
    .view-tabs .nav-link.active {
        color: var(--primary-color); /* Uses the new red */
        border-bottom-color: var(--primary-color); /* Uses the new red */
        font-weight: 600;
    }

    .filter-buttons .dropdown .btn {
        background-color: #fff;
        border: 1px solid var(--border-color);
        color: var(--text-dark);
    }

    /* Board View Styles */
    .kanban-board {
        display: flex;
        gap: 20px;
        overflow-x: auto; 
        padding-bottom: 15px; 
    }

    .kanban-column {
        background-color: #F0F0F0; 
        border-radius: 8px;
        min-width: 300px;
        max-width: 320px; 
        display: flex;
        flex-direction: column;
        height: fit-content; 
        padding: 15px;
    }

    .kanban-column-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 15px;
        padding-bottom: 10px;
    }

    .kanban-column-header .stage-name {
        font-weight: 600;
        font-size: 0.9rem;
        text-transform: uppercase;
        display: flex;
        align-items: center;
    }
    .kanban-column-header .stage-dot {
        width: 8px;
        height: 8px;
        border-radius: 50%;
        margin-right: 8px;
        display: inline-block;
    }
    .kanban-column-header .stage-count {
        color: var(--dark-gray);
        font-size: 0.9rem;
        margin-left: 8px;
    }
    .kanban-column-header .stage-actions .btn {
        padding: 0.2rem 0.5rem;
        color: var(--dark-gray);
    }


    .kanban-column-cards {
        flex-grow: 1;
        min-height: 100px; 
        display: flex;
        flex-direction: column;
        gap: 10px;
    }

    .project-card {
        background-color: #ffffff;
        border-radius: 6px;
        padding: 15px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
        border: 1px solid var(--border-color);
        cursor: grab;
    }
    .project-card:active {
        cursor: grabbing;
    }

    .project-card-header {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        margin-bottom: 8px;
    }
    .project-card-name {
        font-weight: 600;
        color: var(--text-dark);
        font-size: 1rem;
    }
    .project-card-client {
        font-size: 0.85rem;
        color: var(--dark-gray);
        margin-bottom: 10px;
    }
    .project-card-type {
        font-size: 0.8rem;
        color: var(--dark-gray);
        background-color: var(--light-gray);
        padding: 3px 8px;
        border-radius: 4px;
        display: inline-block;
        margin-bottom: 10px;
    }
    .project-card-date {
        font-size: 0.8rem;
        color: var(--dark-gray);
        display: flex;
        align-items: center;
    }
    .project-card-date i {
        margin-right: 5px;
    }
    .project-card-options .btn {
        padding: 0.1rem 0.4rem;
        color: var(--dark-gray);
    }
    .add-project-in-column {
        margin-top: 15px;
        padding: 10px;
        text-align: center;
        color: var(--dark-gray);
        background-color: transparent;
        border: 1px dashed var(--medium-gray);
        border-radius: 6px;
        cursor: pointer;
        transition: background-color 0.2s ease;
    }
    .add-project-in-column:hover {
        background-color: var(--medium-gray);
        color: var(--text-dark);
    }

    /* List View Styles */
    #list-view-content {
        background-color: #fff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 2px 4px rgba(0,0,0,0.05);
    }
    #list-view-content table th {
        font-weight: 600;
    }
    #list-view-content table .client-avatar {
        width: 30px;
        height: 30px;
        /* background-color: var(--primary-color); OLD - Uses new red if you want avatar background to be red */
        background-color: var(--dark-gray); /* Or a neutral color for avatar background */
        color: white;
        border-radius: 50%;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-size: 0.9rem;
        margin-right: 8px;
    }
    #list-view-content table .stage-badge {
        padding: 0.3em 0.7em;
        font-size: 0.75rem;
        font-weight: 500;
        border-radius: 10px;
        color: white;
    }


    /* Modal Styling */
    #addProjectModal .modal-content {
        /* background-color: #20252B; /* Match DarkPan modal - Keeping this unless you want light modal */
        /* color: #E0E0E0; */
        border: 1px solid var(--border-color); /* For light modal */
    }
    #addProjectModal .modal-header {
        /* border-bottom: 1px solid #3A3F44; */
        border-bottom: 1px solid var(--border-color);
    }
    #addProjectModal .modal-header .btn-close {
        /* filter: invert(1) grayscale(100%) brightness(200%); For dark modal */
    }
    #addProjectModal .form-control, #addProjectModal .form-select {
        /* background-color: #2C3036; */
        /* color: #E0E0E0; */
        border: 1px solid var(--border-color);
    }
    #addProjectModal .form-control::placeholder {
        /* color: #888; */
    }
    #addProjectModal .form-label {
        /* color: #B0B0B0; */
    }
    #addProjectModal .modal-footer {
        /* border-top: 1px solid #3A3F44; */
         border-top: 1px solid var(--border-color);
    }
     #addProjectModal .btn-primary {
        background-color: var(--primary-color); /* Uses new red */
        border-color: var(--primary-color); /* Uses new red */
    }
    #addProjectModal .btn-primary:hover {
        /* background-color: #008269; OLD */
        background-color: #b8161d; /* Darker red hover */
        border-color: #b8161d;
    }


    /* Hide content initially */
    #board-view-content, #list-view-content, #archived-view-content {
        display: none;
    }
    #board-view-content.active, #list-view-content.active, #archived-view-content.active {
        display: block; 
    }
    #board-view-content.active {
        display: flex; 
    }

</style>

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

            <div class="projects-page-container">
                <!-- Projects Header -->
                <div class="projects-header">
                    <h1>Projects</h1>
                    
                    <div class="actions">
                        
                        <button data-bs-toggle="modal" data-bs-target="#addProjectModal" id="openAddProjectModalBtn">
                            
                        </button>
                    </div>
                </div>

                <!-- View Controls -->
                <div class="view-controls">
                    <ul class="nav view-tabs">
                        <li class="nav-item">
                            <a class="nav-link active" id="boardViewTab" data-view="board" href="#">Board View</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="listViewTab" data-view="list" href="#">List View</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="archivedViewTab" data-view="archived" href="#">Archived</a>
                        </li>
                    </ul>
                    <div class="filter-buttons d-flex gap-2">
                        <div class="dropdown">
                            <button class="btn btn-sm dropdown-toggle" type="button" id="projectTypeFilter" data-bs-toggle="dropdown" aria-expanded="false">
                                Project Type
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="projectTypeFilter">
                                <li><a class="dropdown-item" href="#">All</a></li>
                                <li><a class="dropdown-item" href="#">Portrait</a></li>
                                <li><a class="dropdown-item" href="#">Wedding</a></li>
                                <li><a class="dropdown-item" href="#">Event</a></li>
                                <li><a class="dropdown-item" href="#">Product</a></li>
                            </ul>
                        </div>
                        <div class="dropdown">
                            <button class="btn btn-sm dropdown-toggle" type="button" id="projectDateFilter" data-bs-toggle="dropdown" aria-expanded="false">
                                Project Date
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="projectDateFilter">
                                <li><a class="dropdown-item" href="#">Any Date</a></li>
                                <li><a class="dropdown-item" href="#">Today</a></li>
                                <li><a class="dropdown-item" href="#">This Week</a></li>
                                <li><a class="dropdown-item" href="#">This Month</a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Board View Content -->
                <div id="board-view-content" class="kanban-board active">
                    <!-- Columns will be generated by JavaScript -->
                </div>

                <!-- List View Content -->
                <div id="list-view-content">
                    <div class="table-responsive">
                        <table class="table table-hover" id="projectListTable">
                            <thead>
                                <tr>
                                    <th>PROJECT NAME</th>
                                    <th>CLIENT</th>
                                    <th>TYPE</th>
                                    <th>STAGE</th>
                                    <th>PROJECT DATE</th>
                                    <th>PAID</th>
                                    <th></th> <!-- Actions -->
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Rows will be generated by JavaScript -->
                            </tbody>
                        </table>
                    </div>
                </div>
                
                <!-- Archived View Content (Placeholder) -->
                 <div id="archived-view-content">
                    <p class="text-center p-5">Archived projects will appear here.</p>
                </div>


            </div> <!-- End projects-page-container -->

        </div>
        <!-- Content End -->

        <!-- Add Project Modal -->
        <div class="modal fade" id="addProjectModal" tabindex="-1" aria-labelledby="addProjectLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addProjectLabel">Add New Project</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="addProjectForm">
                            <input type="hidden" id="projectId"> <!-- For editing -->
                            <input type="hidden" id="projectColumnStage"> <!-- For adding to specific column -->
                            <div class="mb-3">
                                <label for="projectName" class="form-label">Project Name</label>
                                <input type="text" class="form-control" id="projectName" required>
                            </div>
                            <div class="mb-3">
                                <label for="clientName" class="form-label">Client Name</label>
                                <input type="text" class="form-control" id="clientName" required>
                            </div>
                            <div class="mb-3">
                                <label for="projectType" class="form-label">Project Type</label>
                                <input type="text" class="form-control" id="projectType" placeholder="e.g., Portrait, Wedding">
                            </div>
                            <div class="mb-3">
                                <label for="projectDate" class="form-label">Project Date</label>
                                <input type="date" class="form-control" id="projectDate">
                            </div>
                             <div class="mb-3">
                                <label for="projectStageModal" class="form-label">Stage</label>
                                <select class="form-select" id="projectStageModal" required>
                                    <!-- Options will be populated by JS -->
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="projectDetails" class="form-label">Details (Optional)</label>
                                <textarea class="form-control" id="projectDetails" rows="3"></textarea>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" form="addProjectForm" class="btn btn-primary" id="saveProjectBtn">Save Project</button>
                    </div>
                </div>
            </div>
        </div>


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-lg-square back-to-top" style="background-color: var(--primary-color); border-color: var(--primary-color);"><i class="bi bi-arrow-up"></i></a>
    </div>

    <?= import_packages("datatable", "tyrax", "loading", "ctr", "path", "twal") ?>

    <script>
        addEventListener("DOMContentLoaded", () => {
            LOADING.load(true);

            setTimeout(() => LOADING.load(false), 1000)

        })
    </script>

    <script>
    addEventListener("DOMContentLoaded", () => {

        $table = new DataTable(table_orders);

        tyrax.get({   
            url: "orders/get",
            //inspect: true,
            request: {user: localStorage.getItem("id")},
            response: function(send) {
                if (send.code == 200) {
                    const data = send.data;
                    data.forEach(column => {
                        $status = column.status;
                        $display = ``;
                        if($status == 1){
                            $display = `<span class='pend'>Pending...</span>`;
                        }
                        if($status == 2){
                            $display = `<span class='conf'>Confirmed</span>`;
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

    <script>
    document.addEventListener('DOMContentLoaded', async function() {
        const STAGES = [
            { id: '1', name: 'PENDING', color: 'var(--stage-inquiry)' },
            { id: '2', name: 'CONFIRMED', color: 'var(--stage-booked)' },
            { id: '3', name: 'ON GOING', color: 'var(--stage-post-production)' },
            { id: '4', name: 'COMPLETED', color: 'var(--stage-completed)' } // This will now use the red primary color
        ];

        function act(){
            return new Promise((resolve, reject)=>{


                tyrax.get({   
            url: "orders/adminget",
            //inspect: true,
            request: {user: localStorage.getItem("id")},
            response: function(send) {
                resolve(send.data);
            }
                
                        
                    });

                
            });
        }


        let projects = await act()
        /*
        [
            // Sample Data (will be lost on refresh)
            { id: 1, name: "Meow's Family Project", client: "Meow Meow", type: "Portrait", date: "2025-05-30", stage: "post-production", details: "Outdoor session, golden hour.", paid: 0 },
            { id: 2, name: "Levi's Family Project", client: "Levi Ackerman", type: "Portrait", date: "2025-05-23", stage: "post-production", details: "Studio setup.", paid: 0 },
            { id: 3, name: "Mia's Family Project", client: "Mia Ackerman", type: "Portrait", date: "2025-05-20", stage: "completed", details: "Delivered and approved.", paid: 150 },
            { id: 4, name: "Sample's Project", client: "Sample Client", type: "Portrait", date: "", stage: "completed", details: "Quick headshots.", paid: 0 },
            { id: 5, name: "Mmikaa's Project", client: "Mmikaa Asa", type: "Portrait", date: "", stage: "4", details: "Initial contact made.", paid: 0 },
            { id: 6, name: "Angel's Family Project", client: "Mia Ackerman", type: "Portrait", date: "2025-05-19", stage: "post-production", details: "Editing phase.", paid: 0 }
        ];*/


        
        const boardViewContent = document.getElementById('board-view-content');
        const listViewContent = document.getElementById('list-view-content');
        const archivedViewContent = document.getElementById('archived-view-content');
        const projectListTableBody = document.querySelector('#projectListTable tbody');

        const addProjectForm = document.getElementById('addProjectForm');
        const addProjectModal = new bootstrap.Modal(document.getElementById('addProjectModal'));
        const projectStageModalSelect = document.getElementById('projectStageModal');
        const openAddProjectModalBtn = document.getElementById('openAddProjectModalBtn');


        // --- Populate Stage Select in Modal ---
        STAGES.forEach(stage => {
            const option = document.createElement('option');
            option.value = stage.id;
            option.textContent = stage.name;
            projectStageModalSelect.appendChild(option);
        });
        
        // --- Helper Functions ---
        function getStageById(stageId) {
            return STAGES.find(s => s.id === stageId) || {name: 'Unknown', color: '#ccc'};
        }

        function formatDate(dateString) {
            if (!dateString) return 'TBD';
            const options = { year: 'numeric', month: 'short', day: 'numeric' };
            return new Date(dateString + 'T00:00:00').toLocaleDateString(undefined, options);
        }

        // --- Render Functions ---
        function renderBoard() {
            boardViewContent.innerHTML = ''; 

            STAGES.forEach(stage => {
                
                const columnDiv = document.createElement('div');
                columnDiv.className = 'kanban-column';
                columnDiv.dataset.stageId = stage.id;
                
                const projectsInStage = projects.filter(p => p.status == stage.id );
                console.log(projectsInStage)
                columnDiv.innerHTML = `
                    <div class="kanban-column-header">
                        <span class="stage-name">
                            <span class="stage-dot" style="background-color: ${stage.color}"></span>
            ${stage.name}
                            
                        </span>
                        <span class="stage-count">${projectsInStage.length}</span>
                        <div class="stage-actions dropdown">
                            <button class="btn btn-sm" type="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-ellipsis-h"></i></button>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li><a class="dropdown-item add-project-to-stage-btn" href="#" data-stage-id="${stage.id}">Add Project Here</a></li>
                                <li><a class="dropdown-item" href="#">Rename Stage</a></li>
                                <li><a class="dropdown-item" href="#">Delete Stage</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="kanban-column-cards">
                        ${projectsInStage.map(project => renderCard(project)).join('')}
                    </div>
                    <a href="#" class="add-project-in-column add-project-to-stage-btn" data-stage-id="${stage.id}">
                        <i class="fas fa-plus me-1"></i> Add Project
                    </a>
                `;
                boardViewContent.appendChild(columnDiv);
            });

             // Add event listeners to "Add Project" buttons within columns
            document.querySelectorAll('.add-project-to-stage-btn').forEach(button => {
                button.addEventListener('click', function(e) {
                    e.preventDefault();
                    const stageId = this.dataset.stageId;
                    document.getElementById('projectColumnStage').value = stageId; 
                    document.getElementById('projectStageModal').value = stageId;
                    document.getElementById('addProjectLabel').textContent = 'Add New Project';
                    addProjectForm.reset(); 
                    document.getElementById('projectId').value = ''; 
                    addProjectModal.show();
                });
            });
        }

        function renderCard(project) {
            return `
                <div class="project-card" data-project-id="${project.id}">
                    <div class="project-card-header">
                        <span class="project-card-name">${project.services_name}</span>
                        <div class="project-card-options dropdown">
                            <button class="btn btn-sm" type="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-ellipsis-v"></i></button>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li><a class="dropdown-item edit-project-btn" href="#" data-project-id="${project.id}">Edit</a></li>
                                <li><a class="dropdown-item delete-project-btn" href="#" data-project-id="${project.id}">Delete</a></li>
                                <li><a class="dropdown-item archive-project-btn" href="#" data-project-id="${project.id}">Archive</a></li>
                            </ul>
                        </div>
                    </div>
                    <p class="project-card-client">${project.fullname}</p>
                    ${project.type ? `<span class="project-card-type">${project.type}</span>` : ''}
                    <p class="project-card-date"><i class="far fa-calendar-alt"></i> ${formatDate(project.date)}</p>
                </div>
            `;
        }

        function renderListView() {
            let row;
            projectListTableBody.innerHTML = ''; 
            const activeProjects = projects.filter(p => !p.archived);

            if (activeProjects.length === 0) {
                projectListTableBody.innerHTML = '<tr><td colspan="7" class="text-center p-4">No active projects found.</td></tr>';
                return;
            }

            tyrax.get({   
            url: "orders/adminget",
            //inspect: true,
            request: {user: localStorage.getItem("id")},
            response: function(send) {
                if (send.code == 200) {
                    const data = send.data;
                    
                    data.forEach(column => {
                        const row = document.createElement('tr');
                
                        $status = column.status;
                        $display = ``;
                        if($status == 1){
                            $display = `<span class="stage-badge" style="background-color: yellow">Pending..</span>`;
                        }
                        if($status == 2){
                            $display = `<span class="stage-badge" style="background-color: blue">Cofirmed</span>`;
                        }
                        if($status == 3){
                            $display = `<span class="stage-badge" style="background-color: red">On Going</span>`;
                            
                        }
                    row.innerHTML = `
                    <td>${column.services_name}</td>
                    <td>
                        ${column.fullname}
                    </td>
                    <td>${column.package_name || '-'}</td>
                    <td>
                    ${$display}
                    </td>
                    <td>${column.date_time}</td>
                    <td>₱${column.downpayment}</td>
                    
                        <div class="dropdown">
                            <button class="btn btn-sm btn-light" type="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-ellipsis-v"></i></button>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li><a class="dropdown-item edit-project-btn" href="#" data-project-id="${column.id}">Edit</a></li></ul>
                        </div>
                    </td>
                                       
                `;
                projectListTableBody.appendChild(row);
        

                        
                    });
                }
            }
        })

           
            addEditDeleteListenersToList(); 
        }
        
        function renderArchivedView() {
            archivedViewContent.innerHTML = '<p class="text-center p-5">Archived projects would appear here. Functionality to be built.</p>';
            const archivedProjects = projects.filter(p => p.archived);
             if (archivedProjects.length > 0) {
                 archivedViewContent.innerHTML = `<p class="text-center p-3">Found ${archivedProjects.length} archived projects.</p>
                 <ul>${archivedProjects.map(p => `<li>${p.name} (Client: ${p.client}) <button class="btn btn-sm btn-outline-secondary unarchive-project-btn" data-project-id="${p.id}">Unarchive</button></li>`).join('')}</ul>`;

                document.querySelectorAll('.unarchive-project-btn').forEach(btn => {
                    btn.addEventListener('click', function() {
                        const projectId = parseInt(this.dataset.projectId);
                        const projectIndex = projects.findIndex(p => p.id === projectId);
                        if (projectIndex > -1) {
                            projects[projectIndex].archived = false;
                            renderCurrentView();
                        }
                    });
                });
             }
        }

        // --- Event Handlers ---
        addProjectForm.addEventListener('submit', function(e) {
            e.preventDefault();
            const projectId = parseInt(document.getElementById('projectId').value);
            const projectData = {
                name: document.getElementById('projectName').value,
                client: document.getElementById('clientName').value,
                type: document.getElementById('projectType').value,
                date: document.getElementById('projectDate').value,
                stage: document.getElementById('projectStageModal').value,
                details: document.getElementById('projectDetails').value,
                paid: 0, 
                archived: false
            };

            if (projectId) { // Editing existing project
                const projectIndex = projects.findIndex(p => p.id === projectId);
                if (projectIndex > -1) {
                    projects[projectIndex] = { ...projects[projectIndex], ...projectData, id: projectId };
                }
            } else { // Adding new project
                projectData.id = projects.length > 0 ? Math.max(...projects.map(p => p.id)) + 1 : 1;
                projects.push(projectData);
            }
            
            addProjectForm.reset();
            addProjectModal.hide();
            renderCurrentView();
        });
        
        openAddProjectModalBtn.addEventListener('click', function() {
            document.getElementById('addProjectLabel').textContent = 'Add New Project';
            addProjectForm.reset();
            document.getElementById('projectId').value = '';
            document.getElementById('projectStageModal').value = STAGES[0].id; 
        });


        function addEditDeleteListenersToList() {
             projectListTableBody.addEventListener('click', function(e) {
                if (e.target.closest('.edit-project-btn')) {
                    e.preventDefault();
                    const projectId = parseInt(e.target.closest('.edit-project-btn').dataset.projectId);
                    editProject(projectId);
                } else if (e.target.closest('.delete-project-btn')) {
                    e.preventDefault();
                    const projectId = parseInt(e.target.closest('.delete-project-btn').dataset.projectId);
                    deleteProject(projectId);
                } else if (e.target.closest('.archive-project-btn')) {
                    e.preventDefault();
                    const projectId = parseInt(e.target.closest('.archive-project-btn').dataset.projectId);
                    archiveProject(projectId, true);
                }
            });
        }

        // Event delegation for Board View (since cards are dynamically rendered)
        boardViewContent.addEventListener('click', function(e) {
            if (e.target.closest('.edit-project-btn')) {
                e.preventDefault();
                const projectId = parseInt(e.target.closest('.edit-project-btn').dataset.projectId);
                editProject(projectId);
            } else if (e.target.closest('.delete-project-btn')) {
                e.preventDefault();
                const projectId = parseInt(e.target.closest('.delete-project-btn').dataset.projectId);
                deleteProject(projectId);
            } else if (e.target.closest('.archive-project-btn')) {
                e.preventDefault();
                const projectId = parseInt(e.target.closest('.archive-project-btn').dataset.projectId);
                archiveProject(projectId, true);
            }
        });

        function editProject(projectId) {
            const project = projects.find(p => p.id === projectId);
            if (project) {
                document.getElementById('addProjectLabel').textContent = 'Edit Project';
                document.getElementById('projectId').value = project.id;
                document.getElementById('projectName').value = project.name;
                document.getElementById('clientName').value = project.client;
                document.getElementById('projectType').value = project.type;
                document.getElementById('projectDate').value = project.date;
                document.getElementById('projectStageModal').value = project.stage;
                document.getElementById('projectDetails').value = project.details;
                addProjectModal.show();
            }
        }

        function deleteProject(projectId) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: 'var(--primary-color)', // Red for delete confirmation
                cancelButtonColor: 'var(--dark-gray)',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    projects = projects.filter(p => p.id !== projectId);
                    renderCurrentView();
                    Swal.fire(
                        'Deleted!',
                        'Your project has been deleted.',
                        'success'
                    );
                }
            });
        }
        
        function archiveProject(projectId, archiveStatus) {
             const projectIndex = projects.findIndex(p => p.id === projectId);
             if (projectIndex > -1) {
                 projects[projectIndex].archived = archiveStatus;
                 renderCurrentView();
                  Swal.fire(
                        archiveStatus ? 'Archived!' : 'Unarchived!',
                        `Your project has been ${archiveStatus ? 'archived' : 'unarchived'}.`,
                        'success'
                    );
             }
        }

        // --- View Switching Logic ---
        const viewTabs = document.querySelectorAll('.view-tabs .nav-link');
        const viewContents = {
            board: boardViewContent,
            list: listViewContent,
            archived: archivedViewContent
        };
        let currentViewId = 'board'; // Default view

        function switchView(viewId) {
            currentViewId = viewId;
            viewTabs.forEach(tab => {
                tab.classList.toggle('active', tab.dataset.view === viewId);
            });
            Object.keys(viewContents).forEach(key => {
                viewContents[key].classList.toggle('active', key === viewId);
            });
            renderCurrentView();
        }

        function renderCurrentView() {
            if (currentViewId === 'board') {
                renderBoard();
            } else if (currentViewId === 'list') {
                renderListView();
            } else if (currentViewId === 'archived') {
                renderArchivedView();
            }
        }

        viewTabs.forEach(tab => {
            tab.addEventListener('click', function(e) {
                e.preventDefault();
                switchView(this.dataset.view);
            });
        });
        
        // --- Drag and Drop (Basic Implementation) ---
        let draggedItem = null;

        boardViewContent.addEventListener('dragstart', function(e) {
            if (e.target.classList.contains('project-card')) {
                draggedItem = e.target;
                setTimeout(() => e.target.style.opacity = '0.5', 0); // Visual feedback
            }
        });

        boardViewContent.addEventListener('dragend', function(e) {
            if (draggedItem) {
                draggedItem.style.opacity = '1';
                draggedItem = null;
            }
        });

        boardViewContent.addEventListener('dragover', function(e) {
            e.preventDefault(); // Necessary to allow dropping
            const column = e.target.closest('.kanban-column');
            if (column) {
                // You might add visual feedback here for valid drop target
            }
        });

        boardViewContent.addEventListener('drop', function(e) {
            e.preventDefault();
            const targetColumn = e.target.closest('.kanban-column');
            if (targetColumn && draggedItem) {
                const projectId = parseInt(draggedItem.dataset.projectId);
                const newStageId = targetColumn.dataset.stageId;
                
                const projectIndex = projects.findIndex(p => p.id === projectId);
                if (projectIndex > -1 && projects[projectIndex].stage !== newStageId) {
                    projects[projectIndex].stage = newStageId;
                    renderBoard(); // Re-render the board to reflect the change
                }
            }
        });

        // --- Initial Render ---
        switchView('board'); // Set initial view to board

    });
    </script>
</body>
</html>