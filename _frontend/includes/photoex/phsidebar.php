<style>
/* === Enhanced Sidebar Style === */
.sidebar {
    background: linear-gradient(135deg, #ffffff 0%, #f8f9fa 100%);
    box-shadow: 8px 0 25px rgba(220, 53, 69, 0.08);
    border-right: 3px solid #dc3545;
    min-height: 100vh;
    padding-top: 0;
}

/* Brand section */
.navbar-brand {
    margin-top: 1rem;
    margin-bottom: 0.5rem !important;
    display: flex;
    align-items: center;
    justify-content: flex-start;
    padding: 0 1rem;
    height: auto;
    background: transparent;
    border-radius: 0;
    margin-left: 0 !important;
    margin-right: 0 !important;
    box-shadow: none;
    transition: none;
}

.navbar-brand img {
    height: 40px;
    width: auto;
    flex-shrink: 0;
    margin-right: 10px;
    display: block;
    border-radius: 0;
    background: transparent;
    padding: 0;
}

.navbar-brand h3 {
    color: #000000 !important;
    font-weight: 700;
    letter-spacing: 0;
    font-size: 1.1rem;
    line-height: 1;
    transition: none;
    margin-bottom: 0;
    white-space: nowrap;
    text-shadow: none;
}

/* User Profile Section */
.d-flex.align-items-center.ms-4.mb-4 {
    padding: 0;
    background: transparent;
    border-left: 0;
    border-radius: 0;
    margin: 0 0 1rem 1rem;
    transition: none;
}

.d-flex.align-items-center.ms-4.mb-4:hover {
    background: transparent;
    box-shadow: none;
}

.user-profile-icon-container {
    position: relative;
    font-size: 2.5rem;
    color: #dc3545;
    flex-shrink: 0;
}

.user-profile-icon-container .bg-success {
    width: 14px;
    height: 14px;
    background-color: #28a745 !important;
    bottom: 0;
    right: 0;
    box-shadow: 0 0 0 3px white;
}

.d-flex.align-items-center.ms-4.mb-4 h6 {
    color: #212529;
    font-weight: 600;
    letter-spacing: 0;
}

.d-flex.align-items-center.ms-4.mb-4 span {
    color: #999;
    font-weight: 400;
    font-size: 0.8rem;
    text-transform: capitalize;
    letter-spacing: 0;
}

/* Navigation Items */
.navbar-nav {
    padding: 1rem 0;
}

.nav-item.nav-link {
    color: #212529 !important;
    padding: 0.85rem 1.5rem;
    margin: 0.3rem 0.5rem;
    border-left: 3px solid transparent;
    border-radius: 0 8px 8px 0;
    font-weight: 500;
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    position: relative;
    overflow: hidden;
}

.nav-item.nav-link::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, rgba(220, 53, 69, 0.1) 0%, transparent 100%);
    transition: left 0.3s ease;
    z-index: -1;
}

.nav-item.nav-link:hover::before {
    left: 0;
}

.nav-item.nav-link:hover {
    color: #dc3545 !important;
    border-left-color: #dc3545;
    padding-left: 2rem;
    background-color: rgba(220, 53, 69, 0.08);
}

.nav-item.nav-link.active,
.nav-item.nav-link:active {
    color: #ffffff !important;
    background: linear-gradient(135deg, #dc3545 0%, #c82333 100%);
    border-left-color: #fff;
    box-shadow: 0 4px 12px rgba(220, 53, 69, 0.25);
}

.nav-item.nav-link i {
    color: #dc3545;
    font-size: 1rem;
    transition: all 0.3s ease;
}

.nav-item.nav-link:hover i {
    color: #c82333;
    transform: translateX(2px);
}

.nav-item.nav-link.active i {
    color: #ffffff;
}

/* Dropdown Styling */
.nav-item.dropdown .dropdown-toggle {
    color: #212529 !important;
    padding: 0.85rem 1.5rem;
    margin: 0.3rem 0.5rem;
    border-left: 3px solid transparent;
    border-radius: 0 8px 8px 0;
    font-weight: 500;
    transition: all 0.3s ease;
}

.nav-item.dropdown .dropdown-toggle:hover {
    color: #dc3545 !important;
    border-left-color: #dc3545;
    background-color: rgba(220, 53, 69, 0.08);
}

.dropdown-menu {
    background-color: #f8f9fa;
    border: 1px solid #e9ecef;
    border-radius: 8px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
    padding: 0.5rem;
}

.dropdown-item {
    color: #212529;
    padding: 0.65rem 1.5rem;
    border-radius: 6px;
    transition: all 0.2s ease;
    margin-bottom: 0.3rem;
}

.dropdown-item:hover {
    background-color: #dc3545;
    color: white;
    padding-left: 2rem;
}

.dropdown-item i {
    color: #dc3545;
    margin-right: 0.5rem;
    transition: color 0.2s ease;
}

.dropdown-item:hover i {
    color: white;
}

/* Scrollbar Styling */
.sidebar::-webkit-scrollbar {
    width: 6px;
}

.sidebar::-webkit-scrollbar-track {
    background: #f1f1f1;
}

.sidebar::-webkit-scrollbar-thumb {
    background: #dc3545;
    border-radius: 3px;
}

.sidebar::-webkit-scrollbar-thumb:hover {
    background: #c82333;
}

/* Responsive Adjustments */
@media (max-width: 992px) {
    .sidebar {
        position: fixed;
        left: 0;
        top: 0;
        width: 280px;
        z-index: 1000;
    }
    
    .navbar-brand h3 {
        font-size: 1.1rem;
    }
}
</style>

<div class="sidebar pe-4 pb-3">
    <nav class="navbar">
        <a href="<?= page('photograp/photodashboard') ?>" class="navbar-brand mx-4 mb-3">
            <img src="_frontend/assets/img/logop.jpg" alt="PPhotography Logo">
            <h3>PPhotography</h3>
        </a>
        <div class="d-flex align-items-center ms-4 mb-4">
            <div class="user-profile-icon-container">
                <i class="fa fa-user-circle"></i>
                <div class="bg-success rounded-circle border border-2 border-white position-absolute p-1"></div>
            </div>
            <div class="ms-3">
                <h6 class="mb-0 text-dark" id="sidename">John Doe</h6>
                <span class="text-muted">Photographer</span>
            </div>
        </div>
        <div class="navbar-nav w-100">
            <a id="homepage" href="<?= page('photographer/photodashboard.php') ?>" class="nav-item nav-link"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
            
            <a href="<?= page('photographer/orders.php') ?>" class="nav-item nav-link">
                <i class="fa fa-cogs me-2"></i> Order Request
            </a>
            
            <a id="homepage" href="<?= page('photographer/Booked.php') ?>" class="nav-item nav-link"><i class="fa fa-check me-2"></i>Booked</a>
            
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-calendar me-2"></i>Calendar</a>
                <div class="dropdown-menu border-0">
                    <a href="<?= page('photographer/calendar.php') ?>" class="dropdown-item"><i class="fa fa-calendar-alt me-2"></i> Calendar Unavailability</a>
                    <a href="<?= page('photographer/calendar.php') ?>" class="dropdown-item"><i class="fa fa-calendar-alt me-2"></i> Calendar Event</a>
                </div>
            </div>

            <a id="inv" href="<?= page('photographer/photoportfolio.php') ?>" class="nav-item nav-link"><i class="fa fa-user me-2"></i>Portfolio</a>
            
            <a id="earn" href="<?= page('photographer/earnings.php') ?>" class="nav-item nav-link"><i class="fas fa-dollar-sign me-2"></i>Earnings</a>
            
            <a id="rate" href="<?= page('photographer/ratings.php') ?>" class="nav-item nav-link"><i class="fa fa-star me-2"></i>Ratings</a>
        </div>

    </nav>
</div>
<?= import_packages("twal", "loading", "tyrux", "ctr") ?>