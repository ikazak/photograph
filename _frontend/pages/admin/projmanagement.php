<!DOCTYPE html>
<html lang="en">

<?= include_page('header') ?>

<style>
    :root {
        --primary-color: #D81921;
        --primary-dark: #b8161d;
        --primary-light: #ff2838;
        --light-gray: #f8f9fa;
        --medium-gray: #e9ecef;
        --dark-gray: #6c757d;
        --text-dark: #343a40;
        --border-color: #dee2e6;
        --stage-inquiry: #ffc107;
        --stage-booked: #6f42c1;
        --stage-post-production: #0d6efd;
        --stage-completed: var(--primary-color);
        --shadow-sm: 0 2px 8px rgba(0, 0, 0, 0.08);
        --shadow-md: 0 4px 16px rgba(0, 0, 0, 0.12);
        --shadow-lg: 0 8px 32px rgba(0, 0, 0, 0.16);
    }

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
        background: #f5f7fa;
    }

    .content {
        padding: 0;

        min-height: 100vh;
        position: relative;
    }

    .content::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 300px;

        z-index: 0;
    }

    .projects-page-container {
        position: relative;
        z-index: 1;
        background: white;
        padding: 40px;
        margin: 20px;
        border-radius: 24px;
        box-shadow: var(--shadow-lg);
        backdrop-filter: blur(10px);
    }

    .projects-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 40px;
        padding-bottom: 30px;
        border-bottom: 3px solid transparent;
        background: linear-gradient(white, white) padding-box,
            linear-gradient(135deg, var(--primary-color), var(--primary-light)) border-box;
        border-image: linear-gradient(135deg, var(--primary-color), var(--primary-light)) 1;
    }

    .projects-header h1 {
        font-size: 3rem;
        font-weight: 800;
        background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-dark) 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        margin: 0;
        letter-spacing: -1.5px;
        display: flex;
        align-items: center;
        gap: 15px;
    }

    .projects-header h1::before {
        content: '📸';
        font-size: 2.5rem;
        animation: float 3s ease-in-out infinite;
    }

    @keyframes float {

        0%,
        100% {
            transform: translateY(0px);
        }

        50% {
            transform: translateY(-10px);
        }
    }

    .actions {
        display: flex;
        align-items: center;
        gap: 15px;
    }

    .search-bar {
        position: relative;
        background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
        border-radius: 50px;
        padding: 5px 20px;
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        border: 2px solid transparent;
    }

    .search-bar:focus-within {
        background: white;
        border-color: var(--primary-color);
        box-shadow: 0 8px 24px rgba(216, 25, 33, 0.2);
        transform: translateY(-2px);
    }

    .search-bar input {
        padding: 12px 20px;
        border: none;
        background: transparent;
        width: 250px;
        font-size: 0.95rem;
        outline: none;
        color: var(--text-dark);
        font-weight: 500;
    }

    .search-bar input::placeholder {
        color: var(--dark-gray);
    }

    .search-bar .fa-search {
        position: absolute;
        left: 20px;
        top: 50%;
        transform: translateY(-50%);
        color: var(--primary-color);
        font-size: 1.1rem;
    }

    .btn-project-settings,
    .btn-new-project {
        padding: 12px 24px;
        border-radius: 50px;
        font-weight: 600;
        height: 48px;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        border: none;
        font-size: 0.95rem;
        cursor: pointer;
        position: relative;
        overflow: hidden;
    }

    .btn-project-settings {
        background: white;
        color: var(--text-dark);
        border: 2px solid var(--border-color);
    }

    .btn-project-settings:hover {
        border-color: var(--primary-color);
        color: var(--primary-color);
        transform: translateY(-2px);
        box-shadow: var(--shadow-md);
    }

    .btn-new-project {
        background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-dark) 100%);
        color: white;
        box-shadow: 0 4px 16px rgba(216, 25, 33, 0.3);
        position: relative;
    }

    .btn-new-project::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
        transition: left 0.5s;
    }

    .btn-new-project:hover::before {
        left: 100%;
    }

    .btn-new-project:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 24px rgba(216, 25, 33, 0.4);
    }

    .btn-new-project i {
        font-size: 1.1rem;
    }

    .view-controls {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 35px;
        flex-wrap: wrap;
        gap: 20px;
        padding: 20px;
        background: linear-gradient(135deg, #f8f9fa 0%, #ffffff 100%);
        border-radius: 16px;
        box-shadow: var(--shadow-sm);
    }

    .view-tabs {
        display: flex;
        gap: 8px;
        background: white;
        padding: 6px;
        border-radius: 50px;
        box-shadow: inset 0 2px 8px rgba(0, 0, 0, 0.05);
    }

    .view-tabs .nav-link {
        color: var(--dark-gray);
        font-weight: 600;
        padding: 12px 24px;
        border: none;
        border-radius: 50px;
        transition: all 0.3s ease;
        position: relative;
        font-size: 0.9rem;
    }

    .view-tabs .nav-link:hover {
        color: var(--primary-color);
        background: rgba(216, 25, 33, 0.05);
    }

    .view-tabs .nav-link.active {
        color: white;
        background: linear-gradient(135deg, var(--primary-color), var(--primary-dark));
        box-shadow: 0 4px 12px rgba(216, 25, 33, 0.3);
    }

    .filter-buttons .btn {
        background: white;
        border: 2px solid var(--border-color);
        color: var(--text-dark);
        font-weight: 600;
        padding: 10px 20px;
        border-radius: 50px;
        transition: all 0.3s ease;
    }

    .filter-buttons .btn:hover {
        border-color: var(--primary-color);
        color: var(--primary-color);
        background: rgba(216, 25, 33, 0.05);
        transform: translateY(-2px);
    }

    .filter-buttons .btn i {
        color: var(--primary-color);
    }

    /* Kanban Board */
    .kanban-board {
        display: flex;
        gap: 24px;
        overflow-x: auto;
        padding-bottom: 20px;
        padding-top: 10px;
    }

    .kanban-board::-webkit-scrollbar {
        height: 8px;
    }

    .kanban-board::-webkit-scrollbar-track {
        background: var(--light-gray);
        border-radius: 10px;
    }

    .kanban-board::-webkit-scrollbar-thumb {
        background: var(--primary-color);
        border-radius: 10px;
    }

    .kanban-column {
        background: linear-gradient(180deg, #ffffff 0%, #f8f9fa 100%);
        border-radius: 16px;
        min-width: 340px;
        max-width: 360px;
        display: flex;
        flex-direction: column;
        height: fit-content;
        padding: 20px;
        box-shadow: var(--shadow-md);
        border: 2px solid var(--border-color);
        transition: all 0.3s ease;
    }

    .kanban-column:hover {
        transform: translateY(-5px);
        box-shadow: var(--shadow-lg);
        border-color: var(--primary-color);
    }

    .kanban-column-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 20px;
        padding-bottom: 15px;
        border-bottom: 2px solid var(--border-color);
    }

    .stage-name {
        font-weight: 700;
        font-size: 0.95rem;
        text-transform: uppercase;
        display: flex;
        align-items: center;
        color: var(--text-dark);
        letter-spacing: 1px;
    }

    .stage-dot {
        width: 14px;
        height: 14px;
        border-radius: 50%;
        margin-right: 10px;
        display: inline-block;
        box-shadow: 0 0 0 3px rgba(255, 255, 255, 0.5);
        animation: pulse 2s infinite;
    }

    @keyframes pulse {

        0%,
        100% {
            transform: scale(1);
            opacity: 1;
        }

        50% {
            transform: scale(1.1);
            opacity: 0.8;
        }
    }

    .stage-count {
        background: linear-gradient(135deg, var(--primary-color), var(--primary-dark));
        color: white;
        font-size: 0.85rem;
        font-weight: 700;
        padding: 6px 14px;
        border-radius: 50px;
        margin-left: 10px;
        box-shadow: 0 2px 8px rgba(216, 25, 33, 0.3);
    }

    .kanban-column-cards {
        flex-grow: 1;
        min-height: 100px;
        display: flex;
        flex-direction: column;
        gap: 14px;
    }

    .project-card {
        background: white;
        border-radius: 12px;
        padding: 18px;
        box-shadow: var(--shadow-sm);
        border: 2px solid transparent;
        cursor: grab;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        position: relative;
        overflow: hidden;
    }

    .project-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 4px;
        height: 100%;
        background: linear-gradient(180deg, var(--primary-color), var(--primary-dark));
        opacity: 0;
        transition: opacity 0.3s;
    }

    .project-card:hover::before {
        opacity: 1;
    }

    .project-card:hover {
        transform: translateY(-6px) scale(1.02);
        box-shadow: 0 12px 32px rgba(216, 25, 33, 0.2);
        border-color: var(--primary-color);
    }

    .project-card:active {
        cursor: grabbing;
        transform: scale(0.98);
    }

    .project-card-header {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        margin-bottom: 12px;
    }

    .project-card-name {
        font-weight: 700;
        color: var(--text-dark);
        font-size: 1.1rem;
        flex: 1;
        line-height: 1.4;
    }

    .project-card-client {
        font-size: 0.9rem;
        color: var(--primary-color);
        margin-bottom: 12px;
        font-weight: 600;
        display: flex;
        align-items: center;
        gap: 6px;
    }

    .project-card-client::before {
        content: '👤';
        font-size: 1rem;
    }

    .project-card-type {
        font-size: 0.8rem;
        color: white;
        background: linear-gradient(135deg, var(--primary-color), var(--primary-dark));
        padding: 6px 12px;
        border-radius: 50px;
        display: inline-block;
        margin-bottom: 12px;
        font-weight: 600;
        box-shadow: 0 2px 8px rgba(216, 25, 33, 0.2);
    }

    .project-card-date {
        font-size: 0.85rem;
        color: var(--dark-gray);
        display: flex;
        align-items: center;
        margin-top: 10px;
        font-weight: 500;
    }

    .project-card-date i {
        margin-right: 6px;
        color: var(--primary-color);
        font-size: 1rem;
    }

    .project-card-options .btn {
        padding: 4px 8px;
        color: var(--dark-gray);
        transition: all 0.2s;
        border-radius: 8px;
    }

    .project-card-options .btn:hover {
        background: var(--light-gray);
        color: var(--primary-color);
    }

    .add-project-in-column {
        margin-top: 15px;
        padding: 14px;
        text-align: center;
        color: var(--primary-color);
        background: linear-gradient(135deg, rgba(216, 25, 33, 0.05), rgba(216, 25, 33, 0.1));
        border: 2px dashed var(--primary-color);
        border-radius: 12px;
        cursor: pointer;
        transition: all 0.3s ease;
        font-weight: 600;
    }

    .add-project-in-column:hover {
        background: linear-gradient(135deg, rgba(216, 25, 33, 0.1), rgba(216, 25, 33, 0.15));
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(216, 25, 33, 0.2);
    }

    /* List View */
    #list-view-content {
        background: white;
        padding: 30px;
        border-radius: 16px;
        box-shadow: var(--shadow-md);
    }

    #list-view-content table {
        margin-bottom: 0;
    }

    #list-view-content table th {
        font-weight: 700;
        background: linear-gradient(135deg, var(--light-gray), var(--medium-gray));
        color: var(--text-dark);
        border: none;
        padding: 18px;
        text-transform: uppercase;
        font-size: 0.85rem;
        letter-spacing: 1px;
        position: sticky;
        top: 0;
        z-index: 10;
    }

    #list-view-content table td {
        padding: 18px;
        vertical-align: middle;
        font-weight: 500;
        color: var(--text-dark);
    }

    #list-view-content table tbody tr {
        transition: all 0.3s ease;
        border-bottom: 1px solid var(--border-color);
    }

    #list-view-content table tbody tr:hover {
        background: linear-gradient(90deg, rgba(216, 25, 33, 0.05), transparent);
        transform: scale(1.01);
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
    }

    .client-avatar {
        width: 42px;
        height: 42px;
        background: linear-gradient(135deg, var(--primary-color), var(--primary-dark));
        color: white;
        border-radius: 50%;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-size: 1rem;
        font-weight: 700;
        margin-right: 12px;
        box-shadow: 0 4px 12px rgba(216, 25, 33, 0.3);
    }

    .stage-badge {
        padding: 8px 16px;
        font-size: 0.8rem;
        font-weight: 700;
        border-radius: 50px;
        color: white;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.15);
        display: inline-block;
    }

    /* Modal */
    #addProjectModal .modal-content {
        border: none;
        border-radius: 20px;
        box-shadow: var(--shadow-lg);
        overflow: hidden;
    }

    #addProjectModal .modal-header {
        background: linear-gradient(135deg, var(--primary-color), var(--primary-dark));
        color: white;
        border: none;
        padding: 28px 32px;
    }

    #addProjectModal .modal-title {
        font-weight: 700;
        font-size: 1.5rem;
        letter-spacing: 0.5px;
    }

    #addProjectModal .btn-close {
        filter: brightness(0) invert(1);
        opacity: 0.8;
    }

    #addProjectModal .btn-close:hover {
        opacity: 1;
    }

    #addProjectModal .modal-body {
        padding: 32px;
    }

    #addProjectModal .form-control,
    #addProjectModal .form-select {
        border: 2px solid var(--border-color);
        border-radius: 12px;
        padding: 14px 18px;
        transition: all 0.3s ease;
        font-size: 0.95rem;
    }

    #addProjectModal .form-control:focus,
    #addProjectModal .form-select:focus {
        border-color: var(--primary-color);
        box-shadow: 0 0 0 4px rgba(216, 25, 33, 0.1);
    }

    #addProjectModal .form-label {
        font-weight: 700;
        color: var(--text-dark);
        margin-bottom: 10px;
        font-size: 0.9rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    #addProjectModal .modal-footer {
        padding: 20px 32px;
        border-top: 2px solid var(--border-color);
    }

    #addProjectModal .btn-primary {
        background: linear-gradient(135deg, var(--primary-color), var(--primary-dark));
        border: none;
        font-weight: 700;
        padding: 14px 32px;
        border-radius: 50px;
        transition: all 0.3s ease;
        box-shadow: 0 4px 12px rgba(216, 25, 33, 0.3);
    }

    #addProjectModal .btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(216, 25, 33, 0.4);
    }

    #addProjectModal .btn-secondary {
        border-radius: 50px;
        padding: 14px 32px;
        font-weight: 600;
    }

    /* Hide content */
    #board-view-content,
    #list-view-content,
    #archived-view-content {
        display: none;
    }

    #board-view-content.active {
        display: flex;
    }

    #list-view-content.active,
    #archived-view-content.active {
        display: block;
    }

    #archived-view-content {
        text-align: center;
        padding: 60px;
        background: white;
        border-radius: 16px;
        box-shadow: var(--shadow-md);
    }

    #archived-view-content i {
        font-size: 4rem;
        color: var(--primary-color);
        margin-bottom: 20px;
        animation: float 3s ease-in-out infinite;
    }

    .back-to-top {
        background: linear-gradient(135deg, var(--primary-color), var(--primary-dark)) !important;
        border: none !important;
        box-shadow: 0 4px 16px rgba(216, 25, 33, 0.4) !important;
        transition: all 0.3s ease !important;
        border-radius: 50% !important;
        width: 50px !important;
        height: 50px !important;
    }

    .back-to-top:hover {
        transform: translateY(-5px) !important;
        box-shadow: 0 8px 24px rgba(216, 25, 33, 0.5) !important;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .projects-header {
            flex-direction: column;
            align-items: flex-start;
            gap: 20px;
        }

        .projects-header h1 {
            font-size: 2rem;
        }

        .actions {
            width: 100%;
            flex-wrap: wrap;
        }

        .search-bar input {
            width: 180px;
        }

        .kanban-board {
            gap: 15px;
        }

        .kanban-column {
            min-width: 280px;
            max-width: 290px;
        }

        .projects-page-container {
            padding: 25px;
            margin: 15px;
        }

        .view-controls {
            flex-direction: column;
            align-items: flex-start;
        }
    }

    /* Loading Animation */
    @keyframes shimmer {
        0% {
            background-position: -1000px 0;
        }

        100% {
            background-position: 1000px 0;
        }
    }

    .loading-card {
        background: linear-gradient(90deg, #f0f0f0 25%, #e0e0e0 50%, #f0f0f0 75%);
        background-size: 1000px 100%;
        animation: shimmer 2s infinite;
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
        <?= include_page('sidebar') ?>
        <!-- Sidebar End -->

        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            <?= include_page('navbar') ?>
            <!-- Navbar End -->

            <div class="projects-page-container">
                <!-- Projects Header -->
                <div class="projects-header">
                    <h1>Projects</h1>

                    <div class="actions">
                        <div class="search-bar">
                            <i class="fas fa-search"></i>
                            <input type="text" placeholder="Search projects...">
                        </div>
                        <button class="btn btn-project-settings" title="Settings">
                            <i class="fas fa-cog me-2"></i> Settings
                        </button>
                        <button class="btn btn-new-project" data-bs-toggle="modal" data-bs-target="#addProjectModal" id="openAddProjectModalBtn">
                            <i class="fas fa-plus me-2"></i> New Project
                        </button>
                    </div>
                </div>

                <!-- View Controls -->
                <div class="view-controls">
                    <ul class="nav view-tabs">
                        <li class="nav-item">
                            <a class="nav-link active" id="boardViewTab" data-view="board" href="#">📊 Board View</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="listViewTab" data-view="list" href="#">📋 List View</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="archivedViewTab" data-view="archived" href="#">🗂️ Archived</a>
                        </li>
                    </ul>
                    <div class="filter-buttons d-flex gap-2">
                        <div class="dropdown">
                            <button class="btn btn-sm dropdown-toggle" type="button" id="projectTypeFilter" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-filter me-2"></i> Type
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
                                <i class="fas fa-calendar me-2"></i> Date
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
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Rows will be generated by JavaScript -->
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Archived View Content -->
                <div id="archived-view-content">
                    <i class="fas fa-archive"></i>
                    <p class="text-muted fs-5">Archived projects will appear here.</p>
                </div>
            </div>
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
                            <input type="hidden" id="projectId">
                            <input type="hidden" id="projectColumnStage">
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
        <a href="#" class="btn btn-lg btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
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
                request: {
                    user: localStorage.getItem("id")
                },
                response: function(send) {
                    if (send.code == 200) {
                        const data = send.data;
                        data.forEach(column => {
                            $status = column.status;
                            $display = ``;
                            if ($status == 1) {
                                $display = `<span class='pend'>Pending...</span>`;
                            }
                            if ($status == 2) {
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
    <script src="<?= assets() ?>/lib/chart/chart.min.js"></script>
    <script src="<?= assets() ?>/lib/easing/easing.min.js"></script>
    <script src="<?= assets() ?>/lib/waypoints/waypoints.min.js"></script>
    <script src="<?= assets() ?>/lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="<?= assets() ?>/lib/tempusdominus/js/moment.min.js"></script>
    <script src="<?= assets() ?>/lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="<?= assets() ?>/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>
    <script src="<?= assets() ?>/js/main.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', async function() {
            const STAGES = [{
                    id: '1',
                    name: 'PENDING',
                    color: 'var(--stage-inquiry)'
                },
                {
                    id: '2',
                    name: 'CONFIRMED',
                    color: 'var(--stage-booked)'
                },
                {
                    id: '3',
                    name: 'ON GOING',
                    color: 'var(--stage-post-production)'
                },
                {
                    id: '4',
                    name: 'COMPLETED',
                    color: 'var(--stage-completed)'
                }
            ];

            function act() {
                return new Promise((resolve, reject) => {
                    tyrax.get({
                        url: "orders/adminget",
                        request: {
                            user: localStorage.getItem("id")
                        },
                        response: function(send) {
                            resolve(send.data);
                        }
                    });
                });
            }

            let projects = await act();

            const boardViewContent = document.getElementById('board-view-content');
            const listViewContent = document.getElementById('list-view-content');
            const archivedViewContent = document.getElementById('archived-view-content');
            const projectListTableBody = document.querySelector('#projectListTable tbody');
            const addProjectForm = document.getElementById('addProjectForm');
            const addProjectModal = new bootstrap.Modal(document.getElementById('addProjectModal'));
            const projectStageModalSelect = document.getElementById('projectStageModal');
            const openAddProjectModalBtn = document.getElementById('openAddProjectModalBtn');

            STAGES.forEach(stage => {
                const option = document.createElement('option');
                option.value = stage.id;
                option.textContent = stage.name;
                projectStageModalSelect.appendChild(option);
            });

            function getStageById(stageId) {
                return STAGES.find(s => s.id === stageId) || {
                    name: 'Unknown',
                    color: '#ccc'
                };
            }

            function formatDate(dateString) {
                if (!dateString) return 'TBD';
                const options = {
                    year: 'numeric',
                    month: 'short',
                    day: 'numeric'
                };
                return new Date(dateString + 'T00:00:00').toLocaleDateString(undefined, options);
            }

            function renderBoard() {
                boardViewContent.innerHTML = '';

                STAGES.forEach(stage => {
                    const columnDiv = document.createElement('div');
                    columnDiv.className = 'kanban-column';
                    columnDiv.dataset.stageId = stage.id;

                    const projectsInStage = projects.filter(p => p.status == stage.id);
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
                <div class="project-card" data-project-id="${project.id}" draggable="true">
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
                    ${project.package_name ? `<span class="project-card-type">${project.package_name}</span>` : ''}
                    <p class="project-card-date"><i class="far fa-calendar-alt"></i> ${formatDate(project.date_time)}</p>
                </div>
            `;
            }

            function renderListView() {
                projectListTableBody.innerHTML = '';

                tyrax.get({
                    url: "orders/adminget",
                    request: {
                        user: localStorage.getItem("id")
                    },
                    response: function(send) {
                        if (send.code == 200) {
                            const data = send.data;

                            data.forEach(column => {
                                const row = document.createElement('tr');

                                $status = column.status;
                                $display = ``;
                                if ($status == 1) {
                                    $display = `<span class="stage-badge" style="background-color: #ffc107">Pending</span>`;
                                }
                                if ($status == 2) {
                                    $display = `<span class="stage-badge" style="background-color: #6f42c1">Confirmed</span>`;
                                }
                                if ($status == 3) {
                                    $display = `<span class="stage-badge" style="background-color: #0d6efd">On Going</span>`;
                                }
                                if ($status == 4) {
                                    $display = `<span class="stage-badge" style="background-color: #D81921">Completed</span>`;
                                }

                                row.innerHTML = `
                        <td><strong>${column.services_name}</strong></td>
                        <td>
                            <span class="client-avatar">${column.fullname.charAt(0).toUpperCase()}</span>
                            ${column.fullname}
                        </td>
                        <td>${column.package_name || '-'}</td>
                        <td>${$display}</td>
                        <td>${formatDate(column.date_time)}</td>
                        <td>₱${column.downpayment}</td>
                        <td>
                            <div class="dropdown">
                                <button class="btn btn-sm btn-light" type="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-ellipsis-v"></i></button>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li><a class="dropdown-item edit-project-btn" href="#" data-project-id="${column.id}">Edit</a></li>
                                    <li><a class="dropdown-item delete-project-btn" href="#" data-project-id="${column.id}">Delete</a></li>
                                </ul>
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
                archivedViewContent.innerHTML = '<i class="fas fa-archive"></i><p class="text-muted fs-5">Archived projects will appear here.</p>';
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

                if (projectId) {
                    const projectIndex = projects.findIndex(p => p.id === projectId);
                    if (projectIndex > -1) {
                        projects[projectIndex] = {
                            ...projects[projectIndex],
                            ...projectData,
                            id: projectId
                        };
                    }
                } else {
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
                    confirmButtonColor: 'var(--primary-color)',
                    cancelButtonColor: 'var(--dark-gray)',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        projects = projects.filter(p => p.id !== projectId);
                        renderCurrentView();
                        Swal.fire('Deleted!', 'Your project has been deleted.', 'success');
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

            const viewTabs = document.querySelectorAll('.view-tabs .nav-link');
            const viewContents = {
                board: boardViewContent,
                list: listViewContent,
                archived: archivedViewContent
            };
            let currentViewId = 'board';

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

            let draggedItem = null;

            boardViewContent.addEventListener('dragstart', function(e) {
                if (e.target.classList.contains('project-card')) {
                    draggedItem = e.target;
                    setTimeout(() => e.target.style.opacity = '0.5', 0);
                }
            });

            boardViewContent.addEventListener('dragend', function(e) {
                if (draggedItem) {
                    draggedItem.style.opacity = '1';
                    draggedItem = null;
                }
            });

            boardViewContent.addEventListener('dragover', function(e) {
                e.preventDefault();
                const column = e.target.closest('.kanban-column');
                if (column) {
                    column.style.borderColor = 'var(--primary-color)';
                }
            });

            boardViewContent.addEventListener('dragleave', function(e) {
                const column = e.target.closest('.kanban-column');
                if (column) {
                    column.style.borderColor = 'var(--border-color)';
                }
            });

            boardViewContent.addEventListener('drop', function(e) {
                e.preventDefault();
                const targetColumn = e.target.closest('.kanban-column');
                if (targetColumn && draggedItem) {
                    targetColumn.style.borderColor = 'var(--border-color)';
                    const projectId = parseInt(draggedItem.dataset.projectId);
                    const newStageId = targetColumn.dataset.stageId;

                    const projectIndex = projects.findIndex(p => p.id === projectId);
                    if (projectIndex > -1 && projects[projectIndex].status !== newStageId) {
                        projects[projectIndex].status = newStageId;
                        renderBoard();
                    }
                }
            });

            const searchInput = document.querySelector('.search-bar input');
            searchInput.addEventListener('input', function(e) {
                const searchTerm = e.target.value.toLowerCase();

                if (searchTerm === '') {
                    renderCurrentView();
                    return;
                }

                const filteredProjects = projects.filter(p =>
                    p.services_name.toLowerCase().includes(searchTerm) ||
                    p.fullname.toLowerCase().includes(searchTerm) ||
                    (p.package_name && p.package_name.toLowerCase().includes(searchTerm))
                );

                const originalProjects = projects;
                projects = filteredProjects;
                renderCurrentView();
                projects = originalProjects;
            });

            switchView('board');
        });
    </script>
</body>

</html>