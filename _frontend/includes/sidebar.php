<div class="sidebar pe-4 pb-3">
    <nav class="navbar">
        <a href="<?= page('admin/homepage') ?>" class="navbar-brand mx-4 mb-3">
            <img src="_frontend/assets/img/logop.jpg" alt="PPhotography Logo">
            <h3>PPhotography</h3>
        </a>
        <div class="d-flex align-items-center ms-4 mb-4">
            <div class="user-profile-icon-container">
                <i class="fa fa-user-circle"></i>
                <div class="bg-success rounded-circle border border-2 border-white position-absolute p-1"></div>
            </div>
            <div class="ms-3">
                <h6 class="mb-0 text-dark" id="sidename">Patricck V.</h6>
                <span class="text-muted">Admin</span>
            </div>
        </div>

        <div class="navbar-nav w-100">
            <div>
                <a id="homepage" href="<?= page('admin/homepage') ?>" class="nav-item nav-link text-dark "><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
                <a id="proj" href="<?= page('admin/services.php') ?>" class="nav-item nav-link text-dark"><i class="fa fa-tags me-2"></i>Services</a>
                <a id="profile" href="<?= page('admin/profile.php') ?>" class="nav-item nav-link text-dark"><i class="fa fa-user me-2"></i>Photographers</a>
                <a id="proj" href="<?= page('admin/projmanagement.php') ?>" class="nav-item nav-link text-dark"><i class="fa fa-cog me-2"></i>Projects</a>
                <a id="proj" href="<?= page('admin/calendar.php') ?>" class="dropdown-item text-dark"><i class="fa fa-calendar-alt me-2"></i> Calendar</a>
            </div>

            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle text-dark" data-bs-toggle="dropdown"><i class="fa fa-box-open me-2"></i>Build Package</a>
                <div class="dropdown-menu border-0">
                    <a href="<?= page('admin/coverage.php') ?>" class="dropdown-item text-dark"><i class="fa fa-calendar-alt me-2"></i> Coverage Type</a>
                    <a href="<?= page('admin/preevent.php') ?>" class="dropdown-item text-dark"><i class="fa fa-calendar-alt me-2"></i> Pre-Event Session</a>
                    <a href="<?= page('admin/equipment.php') ?>" class="dropdown-item text-dark"><i class="fa fa-calendar-alt me-2"></i> Equipment Setup</a>
                    <a href="<?= page('admin/addfeatures.php') ?>" class="dropdown-item text-dark"><i class="fa fa-calendar-alt me-2"></i> Additional Features</a>
                </div>
            </div>

            

            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle text-dark" data-bs-toggle="dropdown"><i class="fa fa-credit-card me-2"></i>Payments</a>
                <div class="dropdown-menu border-0">
                    <a href="<?= page('admin/transachistory.php') ?>" class="dropdown-item text-dark"><i class="fa fa-camera me-2"></i> Transaction</a>
                    <a href="<?= page('admin/invoices.php') ?>" class="dropdown-item text-dark"><i class="fa fa-calendar-alt me-2"></i> Invoices</a>
                </div>
            </div>

        </div>
    </nav>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Store the original icon classes for the dropdown toggles
        const originalBuildPackageIcon = 'fa fa-box-open me-2'; // UPDATED ICON
        const originalBookingsIcon = 'fa fa-calendar-check me-2'; // UPDATED ICON
        const originalPaymentsIcon = 'fa fa-credit-card me-2'; // UPDATED ICON

        const navLinks = document.querySelectorAll('.sidebar .navbar-nav .nav-link, .sidebar .navbar-nav .dropdown-item');
        const currentPath = window.location.pathname;

        // Function to clear all active states and reset parent icons
        function clearAllActiveStates() {
            // 1. Remove active/active-parent from all links
            navLinks.forEach(l => {
                l.classList.remove('active');
                l.classList.remove('active-parent');
            });

            // 2. Reset all parent dropdown icons to their originals
            // Note: Using improved selectors for stability.
            const buildPackageToggle = document.querySelector('.nav-item.dropdown:nth-child(5) .nav-link.dropdown-toggle');
            const bookingsToggle = document.querySelector('.nav-item.dropdown:nth-child(6) .nav-link.dropdown-toggle');
            const paymentsToggle = document.querySelector('.nav-item.dropdown:nth-child(7) .nav-link.dropdown-toggle');
            
            if (buildPackageToggle) buildPackageToggle.querySelector('i').className = originalBuildPackageIcon;
            if (bookingsToggle) bookingsToggle.querySelector('i').className = originalBookingsIcon;
            if (paymentsToggle) paymentsToggle.querySelector('i').className = originalPaymentsIcon;
        }

        // Function to set the active state and handle parent logic
        function setActiveLink(link) {
            clearAllActiveStates(); // Always clear everything first when a new link is set active

            // Apply 'active' class to the link itself
            link.classList.add('active');

            // Handle Parent Dropdown Logic
            const parentDropdown = link.closest('.nav-item.dropdown');
            if (parentDropdown) {
                const dropdownToggle = parentDropdown.querySelector('.nav-link.dropdown-toggle');
                
                // 1. Highlight the Parent Toggle
                if (dropdownToggle) {
                    dropdownToggle.classList.add('active-parent');
                }

                // 2. Change the Parent Icon (only if the active link is a dropdown-item)
                if (link.classList.contains('dropdown-item') && dropdownToggle) {
                    const activeIcon = link.querySelector('i');
                    const parentIcon = dropdownToggle.querySelector('i');

                    if (activeIcon && parentIcon) {
                        // Copy the full set of icon classes
                        parentIcon.className = activeIcon.className; 
                    }
                }
            }
        }

        // --- 1. Click Listener (Immediate Feedback) ---
        navLinks.forEach(link => {
            link.addEventListener('click', function(event) {
                // Determine if the clicked link is a main dropdown toggle itself
                const isDropdownToggle = this.classList.contains('dropdown-toggle');

                if (isDropdownToggle) {
                    // Clicks on the toggle only open/close the dropdown, they don't set the active highlight/reset state.
                } else {
                    // This covers standalone links (Dashboard, Services) AND dropdown-items
                    // This will clear previous active states and set the new one.
                    setActiveLink(this);
                }
            });
        });

        // --- 2. Page Load Highlight (Persistence) ---
        navLinks.forEach(link => {
            // Check if the link's href is part of the current path
            const href = link.getAttribute('href');
            if (!href) return; // Skip links without an href

            // Strip PHP tags and query parameters for comparison
            const linkPath = href.replace(/<\?.+?>/g, '').split('?')[0]; 
            const pathSegments = currentPath.split('/');
            const currentFileName = pathSegments[pathSegments.length - 1];

            // Check if the current file name matches the link's target file name
            if (linkPath.includes(currentFileName) && currentFileName !== '') {
                setActiveLink(link);
            }
        });
    });
</script>


<style>
    /* === Active Link Highlighting === */
    .sidebar .navbar .navbar-nav .nav-link:hover,
    .sidebar .navbar .navbar-nav .nav-link.active {
        background: #e9ecef;
        color: red !important;
        border-radius: 5px;
    }

    .sidebar .navbar .navbar-nav .nav-link.active i {
        color: red !important;
    }

    /* Specific style for dropdown links inside the active dropdown */
    .sidebar .navbar .navbar-nav .dropdown-menu .dropdown-item.active {
        background-color: red;
        color: #ffffff !important;
    }

    .sidebar .navbar .navbar-nav .dropdown-menu .dropdown-item.active i {
        color: #ffffff !important;
    }

    /* Ensure the main dropdown toggle itself looks active when an inner link is active */
    .sidebar .navbar .navbar-nav .nav-item.dropdown .nav-link.active-parent {
        background: #e9ecef;
        color: red !important;
        border-radius: 5px;
    }

    .sidebar .navbar .navbar-nav .nav-item.dropdown .nav-link.active-parent i {
        color: red !important;
    }
</style>