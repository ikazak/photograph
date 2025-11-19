<style>
    /* === New Sidebar Style === */
    .sidebar {
        /* You must set a background color for the shadow to show correctly */
        background-color: #ffffff;
        box-shadow: 5px 0 15px rgba(0, 0, 0, 0.07);
    }


    /* === Your Existing Styles (Unchanged) === */

    /* Brand section */
    .navbar-brand {
        margin-top: 1.5rem;
        /* Slightly more top margin for visual separation */
        margin-bottom: 1.5rem !important;
        /* Consistent bottom margin */
        display: flex;
        align-items: center;
        /* Vertically center items */
        justify-content: flex-start;
        /* Align to the start (left) */
        padding: 0 1rem;
        /* Horizontal padding for the entire brand area */
        height: auto;
        /* Allow height to adjust naturally */
    }

    .navbar-brand img {
        /* Style the logo image */
        height: 48px;
        /* Fixed height for the logo for consistent sizing */
        width: auto;
        /* Maintain aspect ratio */
        flex-shrink: 0;
        /* Prevent image from shrinking */
        margin-right: 8px;
        /* Space between logo and text */
        display: block;
        /* Ensures no extra space below image */
    }

    .navbar-brand h3 {
        color: #212529 !important;
        /* Black for the brand name */
        font-weight: 800;
        letter-spacing: 0.5px;
        font-size: 1.2rem;
        /* Adjusted text size */
        line-height: 1;
        /* Ensures text sits well */
        transition: color 0.3s ease;
        margin-bottom: 0;
        /* Remove default bottom margin */
        white-space: nowrap;
        /* Prevent text from wrapping */
    }

    /* === New Navbar Style (Border and Shadow) === */
    .navbar.navbar-expand {
        border-bottom: 1px solid #dee2e6;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
        background-color: #ffffff !important;
    }
    
    .navbar.navbar-expand {
    /* Add a subtle bottom border */
    border-bottom: 1px solid #dee2e6; /* A light grey border */
    
    /* Add a box shadow for a 'lifted' effect. The shadow is subtle and only on the bottom. */
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05); /* x-offset, y-offset, blur, color */

    /* Ensure the background is explicitly white for the shadow to show cleanly, 
       though it's already set by .bg-white */
    background-color: #ffffff !important; 
}
</style>


<nav class="navbar navbar-expand bg-white navbar-white sticky-top px-4 py-0">
    <a href="index.html" class="navbar-brand d-flex d-lg-none me-4">
        <h2 class="text-primary mb-0"><i class="fa fa-user-edit"></i></h2>
    </a>

    <form class="d-none d-md-flex ms-4">
        <input class="form-control bg-dark border border-dark" type="search" placeholder="Search">
    </form>
    <div class="navbar-nav align-items-center ms-auto">
        <div class="nav-item dropdown">
            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                <i class="fa fa-envelope me-lg-2"></i>
                <span class="d-none d-lg-inline-flex">Message</span>
            </a>
            <div class="dropdown-menu dropdown-menu-end bg-white border-0 rounded-0 rounded-bottom m-0">
                <a href="#" class="dropdown-item">
                    <div class="d-flex align-items-center">
                        <img class="rounded-circle" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                        <div class="ms-2">
                            <h6 class="fw-normal mb-0 text-black ">Jhon send you a message</h6>
                            <small>15 minutes ago</small>
                        </div>
                    </div>
                </a>
                <hr class="dropdown-divider">
                <a href="#" class="dropdown-item">
                    <div class="d-flex align-items-center">
                        <img class="rounded-circle" src="../assets/img/user.jpg" alt="" style="width: 40px; height: 40px;">
                        <div class="ms-2">
                            <h6 class="fw-normal mb-0">Jhon send you a message</h6>
                            <small>15 minutes ago</small>
                        </div>
                    </div>
                </a>
                <hr class="dropdown-divider">
                <a href="#" class="dropdown-item">
                    <div class="d-flex align-items-center">
                        <img class="rounded-circle" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                        <div class="ms-2">
                            <h6 class="fw-normal mb-0">Jhon send you a message</h6>
                            <small>15 minutes ago</small>
                        </div>
                    </div>
                </a>
                <hr class="dropdown-divider">
                <a href="#" class="dropdown-item text-center">See all message</a>
            </div>
        </div>
        <div class="nav-item dropdown">
            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                <i class="fa fa-bell me-lg-2"></i>
                <span class="d-none d-lg-inline-flex">Notification</span>
            </a>
            <div class="dropdown-menu dropdown-menu-end bg-secondary border-0 rounded-0 rounded-bottom m-0">
                <a href="#" class="dropdown-item">
                    <h6 class="fw-normal mb-0">Profile updated</h6>
                    <small>15 minutes ago</small>
                </a>
                <hr class="dropdown-divider">
                <a href="#" class="dropdown-item">
                    <h6 class="fw-normal mb-0">New user added</h6>
                    <small>15 minutes ago</small>
                </a>
                <hr class="dropdown-divider">
                <a href="#" class="dropdown-item">
                    <h6 class="fw-normal mb-0">Password changed</h6>
                    <small>15 minutes ago</small>
                </a>
                <hr class="dropdown-divider">
                <a href="#" class="dropdown-item text-center">See all notifications</a>
            </div>
        </div>
        <div class="nav-item dropdown">
            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                <img class="rounded-circle me-lg-2" id="navimg" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                <span class="d-none d-lg-inline-flex" id="navname">ADMIN</span>
            </a>
            <div class="dropdown-menu dropdown-menu-end bg-white border-0 rounded-0 rounded-bottom m-0">
                <a href="#" class="dropdown-item">My Profile</a>
                <a href="#" class="dropdown-item">Settings</a>
                <a href="<?= page('loginpage.php') ?>" onclick="return confirm('Are you sure you want to log out?');" class="dropdown-item">Log Out</a>
            </div>
        </div>
    </div>
</nav>
<script>
    window.addEventListener("load", function() {
        $udetails = JSON.parse(localStorage.getItem("userdata"));
        $ufname = $udetails.name;
        $uimg = $udetails.img;
        document.querySelector("#navname").innerHTML = $ufname;
        document.querySelector("#navimg").src = $uimg;
        //document.querySelector("#sideimg").src = $uimg;
        document.querySelector("#sidename").innerHTML = $ufname;
    });
</script>

<?= import_packages("twal", "loading", "tyrux", "ctr") ?>