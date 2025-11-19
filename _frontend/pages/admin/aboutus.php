<!DOCTYPE html>
<html lang="en">

<?=include_page('header')?>
<style>
    /* Global styles from DarkPan should remain for the rest of the admin panel */

    /* Specific styles for the "About Us" page content to make it light themed */
    .about-section-content {
        background-color: #FFFFFF; /* White background */
        color: #212529; /* Dark text (Bootstrap's default body color) */
        border: 1px solid #DEE2E6; /* Light grey border */
        box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075); /* Subtle shadow */
    }
    .about-section-content .text-center h3 { /* Heading in the top section */
        color: #212529 !important; /* Override DarkPan's white if needed */
    }
    .about-section-content .text-center .fas.fa-info-circle { /* Main icon color */
        color: red; /* A standard blue, or your preferred primary light theme color */
    }

    .about-section-content h4 {
        color:red; /* Blue for section headings, or your primary light theme color */
        margin-top: 1.5rem;
        margin-bottom: 0.75rem;
        padding-bottom: 0.5rem;
        border-bottom: 1px solid #E9ECEF; /* Lighter border for light theme */
    }
    .about-section-content h5 {
        color: #495057; /* Darker grey for sub-headings */
        margin-top: 1rem;
    }
    .about-section-content p, .about-section-content li {
        color: #343A40; /* Darker text for readability */
        line-height: 1.6;
    }
    .about-section-content a {
        color:red; /* Darker blue for links for better contrast on white */
        text-decoration: none;
    }
    .about-section-content a:hover {
        text-decoration: underline;
        color: red;
    }
    .about-section-content ul {
        padding-left: 20px;
    }
    .about-section-content .fas, .about-section-content .bi { /* Icon styling within sections */
        margin-right: 8px;
        color: red; /* Match section heading color */
    }

</style>

<body>
    <div class="container-fluid position-relative d-flex p-0">
        <!-- Spinner Start (Assuming it's already handled by DarkPan) -->
        <!-- Spinner End -->

        <?=include_page('sidebar')?>

        <div class="content"> <!-- This content div might still have DarkPan's dark background -->
            <!-- Navbar Start -->
            <?=include_page('navbar')?>          
            <!-- Navbar End -->

            <!-- About Us Page Content Start -->
            <div class="container-fluid pt-4 px-4">
                <!-- The .about-section-content div below will have the white background -->
                <div class="about-section-content rounded p-4 p-sm-5">
                    <div class="text-center mb-4">
                        <i class="fas fa-info-circle fa-3x mb-3"></i> <!-- Icon color handled by new CSS -->
                        <h3 class="mb-0"> Admin System</h3> <!-- Text color handled by new CSS -->
                    </div>

                    <!-- Application Information -->
                    <section>
                        <h4><i class="fas fa-cogs"></i>Application Information</h4>
                        <p><strong>System Name:</strong> PPhotography Management Suite</p>
                        <p><strong>Version:</strong> <span id="appVersion">1.0.0</span> (Update this manually or dynamically)</p>
                        <p><strong>Last Updated:</strong> <span id="lastUpdated">October 26, 2023</span> (Update this)</p>
                        <p><strong>Copyright:</strong> © <span id="currentYear"></span> PPhotography. All rights reserved.</p>
                    </section>

                    <!-- System Overview -->
                    <section>
                        <h4><i class="fas fa-bullseye"></i>System Overview</h4>
                        <p>
                            The PPhotography Management Suite is a comprehensive platform designed to streamline
                            all aspects of your photography business. From project tracking and client communication
                            to managing your portfolio and administrative tasks, this system aims to provide
                            an efficient and centralized solution.
                        </p>
                    </section>

                    <!-- Key Features -->
                    <section>
                        <h4><i class="fas fa-star"></i>Key Features</h4>
                        <ul>
                            <li>Project Management (Board & List Views)</li>
                            <li>Client Database & Communication Tools</li>
                            <li>Photographer & User Management (Admin)</li>
                            <li>Portfolio Management (if applicable to your system)</li>
                            <li>Basic Descriptive Analytics</li>
                            <li>System Configuration & Settings</li>
                        </ul>
                    </section>
                    
                    <!-- Development & Support -->
                    <section>
                        <h4><i class="fas fa-users-cog"></i>Development & Support</h4>
                        <p><strong>Developed By:</strong> [PPHOTOGRAPHY STUDIO]</p>
                        <p>
                            <i class="fas fa-envelope"></i><strong>Support Contact:</strong>
                            <a href="mailto:support@yourphotography.com">support@yourphotography.com</a> (Replace with actual email)
                        </p>
                        <p>
                            <i class="fas fa-book"></i><strong>User Guide:</strong>
                            <a href="#" target="_blank">View Documentation</a> (Link to your guide)
                        </p>
                        <p>
                            <i class="fas fa-bug"></i><strong>Report an Issue:</strong>
                            <a href="#" target="_blank">Submit a Bug Report</a> (Link to issue tracker or support form)
                        </p>
                    </section>

                    <!-- Acknowledgements (Optional) -->
                    <section>
                        <h4><i class="fas fa-hands-helping"></i>Acknowledgements</h4>
                        <p>This system utilizes several open-source libraries and frameworks, including:</p>
                        <ul>
                            <li>Bootstrap 5</li>
                            <li>Font Awesome</li>
                            <li>jQuery</li>
                            <li>(List any other major libraries you've used)</li>
                        </ul>
                        <p>We extend our gratitude to the developers and communities behind these projects.</p>
                    </section>

                </div>
            </div>
            <!-- About Us Page Content End -->
            
            <?=include_page('footer')?>
        </div>
        <!-- Content End -->
         <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div> <!-- .container-fluid.position-relative -->


    
    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    
    <!-- Your other JS libraries from DarkPan -->
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
        // Dynamically set the current year in the copyright
        document.getElementById('currentYear').textContent = new Date().getFullYear();
    </script>

</body>
</html>