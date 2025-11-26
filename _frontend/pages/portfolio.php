<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Videograph Template">
    <meta name="keywords" content="Videograph, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PPHOTOGRAPHY WEBSITE</title>

    <link href="https://fonts.googleapis.com/css2?family=Play:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="<?=assets()?>/phograph/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="<?=assets()?>/phograph/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="<?=assets()?>/phograph/css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="<?=assets()?>/phograph/css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="<?=assets()?>/phograph/css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="<?=assets()?>/phograph/css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="<?=assets()?>/phograph/css/style.css" type="text/css">
</head>

<body>
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <header class="header bg-white">
        <div class="container">
            <div class="row">
                <div class="col-lg-2">
                    <div class="header__logo">
                        <a href="<?=page('home.php')?>" style="display: flex;vertical-align:middle; justify-content: flex-start; align-items: center;">
                            <img src="<?=assets()?>/img/logop.jpg" height="50" width="50" alt="Logo">
                            <b style="color:#343a40;font-size:20px;padding-left:10px;">PPhotography</b>
                        </a>
                    </div>
                </div>
                <div class="col-lg-10" style=" padding-left:10px; margin:auto;">
                    <div class="header__nav__option">
                        <nav class="header__nav__menu mobile-menu">
                            <ul>
                                <li><a id="hm" href="<?=page('home.php')?>" class="text-dark">Home</a></li>
                                <li><a id="about" href="<?=page('about.php')?>" class="text-dark">About</a></li>
                                <li><a id="port" href="<?=page('portfolio.php')?>" class="text-dark">Portfolio</a></li>
                                <li><a id="serv" href="<?=page('services.php')?>" class="text-dark">Services</a></li>
                                <li><a id="cont" href="<?=page('contact.php')?>" class="text-dark">Contact</a></li>

                            </ul>
                        </nav>

                        <div class="header__nav__social">
                            <a href="<?=page('services.php')?>"><i><button class="book btn btn-danger text-white">BOOK NOW</button></i></a>
                            <a href="#"><i></i></a>
                            <a href="#"><i></i></a>
                            <a href="#"><i></i></a>
                            <a href="#"><i></i></a>
                            <a href="<?=page('loginpage.php')?>"><button class="login btn btn-outline-danger">LOG IN</button></a>
                        </div>
                    </div>
                </div>
            </div>
            <div id="mobile-menu-wrap"></div>
        </div>
    </header>
    <div class="breadcrumb-option spad set-bg" data-setbg="<?=assets()?>/phograph/img/breadcrumb-bg.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Photographers portfolio</h2>
                        <div class="breadcrumb__links">
                            <a href="#">Home</a>
                            <span>portfolio</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <main class="main-content">
        <div class="category-filter-wrapper">
            <div class="category-filter" style="width: 1000px;">
                <h3>Capturing moments that speak louder than words.</h3>
            </div>
        </div>

        <div id="portfolio_profile" class="photographer-grid">        

            

        </div>

        
    </main>

    <script src="<?=assets()?>/phograph/js/jquery-3.3.1.min.js"></script>
    <script src="<?=assets()?>/phograph/js/bootstrap.min.js"></script>
    <script src="<?=assets()?>/phograph/js/jquery.magnific-popup.min.js"></script>
    <script src="<?=assets()?>/phograph/js/mixitup.min.js"></script>
    <script src="<?=assets()?>/phograph/js/masonry.pkgd.min.js"></script>
    <script src="<?=assets()?>/phograph/js/jquery.slicknav.js"></script>
    <script src="<?=assets()?>/phograph/js/owl.carousel.min.js"></script>
    <script src="<?=assets()?>/phograph/js/main.js"></script>
</body>

<?=include_page('landing/foot')?>

</html>

<script>
    let basket = [];

        function displayAllphotographers(searchTerm = '') {
            //const $container = $('#photographerCardRow');
            //const $noServicesMessage = $('#noServicesMessage');

            tyrax.get({
                url: "admin/get",
                response: function(send) {
                    if (send.code == 200) {
                        const data = send.data;
                        data.forEach(column => {
                            const imageSrc = column.img || "<?= assets('img/placeholder.png') ?>";
                            const name = column.name;
                            const lname = column.lname;
                            const skill = column.skill;
                            const status = column.status;
                            const description = column.description;
                            const user_id = column.user_id;
                            basket[user_id] = {
                                name: name,
                                lname: lname,
                                status: status,
                                skill: skill,
                                user_id: user_id
                            };

                            DOM.add_html("#portfolio_profile", `

                            <div class="photographer-card" data-category="birthday">
                <div class="profile-image-wrapper">
                    <img src="${imageSrc}" alt="Photographer 2" class="profile-image">
                </div>
                <h3 class="photographer-name">${name} ${lname}</h3>
                <p class="photographer-specialty"> ${skill}</p>
                <p class="photographer-tagline">${column.description}</p>
                <a href="<?=page('birthday.php?id=')?>${column.user_id}" class="btn-view-profile">View Works</a>
            </div>
                            `);


                        });
                    }
                }
            })
        }

        $('#photo').on('keyup', function() {
            displayAllphotographers($(this).val());
        });
        window.addEventListener("DOMContentLoaded", function() {
            displayAllphotographers();
        });
</script>

<?= import_packages("datatable", "tyrax", "loading", "ctr", "path", "twal") ?>

    <script>
        addEventListener("DOMContentLoaded", () => {
            LOADING.load(true);

            setTimeout(() => LOADING.load(false), 1000)

        })
    </script>


<style>
    :root {
        --primary-red: #DC3545; /* Bootstrap's danger red */
        --light-red: #FF6B6B;
        --dark-red: #A30000;
        --white: #FFFFFF;
        --light-gray: #F8F9FA; /* Bootstrap's light gray */
        --medium-gray: #CCCCCC;
        --dark-gray: #343A40; /* Bootstrap's dark gray */
        --text-color-dark: #212529; /* Bootstrap's dark text */
    }

    body {
        margin: 0;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background-color: var(--light-gray); /* White background for the page */
        color: var(--text-color-dark); /* Default text color */
        line-height: 1.6;
        overflow-x: hidden;
        min-height: 100vh;
        display: flex;
        flex-direction: column;
    }

    /* Header adjustments for white/red theme */
    .main-header {
        background-color: var(--primary-red); /* Red background for header */
        padding: 20px 40px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    }

    .site-title {
        font-size: 3em;
        font-weight: bold;
        color: var(--white); /* White title text */
        text-shadow: 0 0 10px rgba(255, 255, 255, 0.5); /* Subtle white glow */
        margin: 0;
        letter-spacing: 2px;
        text-transform: uppercase;
        flex-grow: 1;
        text-align: left;
    }

    .main-nav {
        display: flex;
        gap: 30px;
        flex-wrap: wrap;
        justify-content: center;
    }

    .main-nav .nav-link {
        color: var(--white); /* White nav links */
        text-decoration: none;
        font-size: 1.1em;
        font-weight: 500;
        transition: color 0.3s ease, text-shadow 0.3s ease;
    }

    .main-nav .nav-link:hover {
        color: var(--light-gray); /* Light gray on hover */
        text-shadow: 0 0 8px rgba(255, 255, 255, 0.7);
    }

    .user-actions {
        display: flex;
        gap: 15px;
        flex-wrap: wrap;
        justify-content: flex-end;
    }

    .user-actions .btn-user-action {
        background-color: var(--white); /* White background for action buttons */
        color: var(--primary-red); /* Red text for action buttons */
        padding: 8px 18px;
        border: 1px solid var(--primary-red); /* Red border */
        border-radius: 5px;
        text-decoration: none;
        font-size: 0.95em;
        transition: background-color 0.3s ease, border-color 0.3s ease, box-shadow 0.3s ease, color 0.3s ease;
    }

    .user-actions .btn-user-action:hover {
        background-color: var(--primary-red); /* Red background on hover */
        color: var(--white); /* White text on hover */
        border-color: var(--dark-red);
        box-shadow: 0 0 10px rgba(220, 53, 69, 0.5);
    }

    /* Main Content Area */
    .main-content {
        max-width: 1200px;
        margin: 40px auto;
        padding: 0 20px;
        flex-grow: 1;
    }

    /* Category Filter Tabs */
    .category-filter-wrapper {
        width: 100%;
        overflow-x: auto;
        -webkit-overflow-scrolling: touch;
        padding-bottom: 10px;
        margin-bottom: 50px;
    }

    .category-filter-wrapper::-webkit-scrollbar {
        height: 8px;
    }

    .category-filter-wrapper::-webkit-scrollbar-track {
        background: var(--medium-gray);
        border-radius: 10px;
    }

    .category-filter-wrapper::-webkit-scrollbar-thumb {
        background: linear-gradient(45deg, var(--primary-red), var(--dark-red)); /* Red gradient for scrollbar */
        border-radius: 10px;
    }

    .category-filter {
        display: flex;
        justify-content: center;
        gap: 15px;
        padding-bottom: 5px;
        min-width: fit-content;
    }

    .category-btn {
        background-color: var(--white); /* White background for inactive */
        color: var(--text-color-dark); /* Dark text for inactive */
        padding: 12px 25px;
        border: 1px solid var(--medium-gray); /* Light gray border */
        border-radius: 25px;
        font-size: 1.05em;
        font-weight: 600;
        cursor: pointer;
        transition: background-color 0.3s ease, box-shadow 0.3s ease, color 0.3s ease, transform 0.3s ease, border-color 0.3s ease;
        white-space: nowrap;
        position: relative;
    }

    .category-btn:hover:not(.active) {
        background-color: var(--light-gray);
        box-shadow: 0 0 15px rgba(220, 53, 69, 0.3); /* Subtle red glow on hover */
        transform: translateY(-2px);
        border-color: var(--primary-red);
    }

    .category-btn.active {
        background: linear-gradient(45deg, var(--primary-red), var(--dark-red)); /* Red gradient for active */
        box-shadow: 0 0 20px rgba(220, 53, 69, 0.8), 0 0 40px rgba(163, 0, 0, 0.6); /* Stronger red glow for active */
        color: var(--white);
        font-weight: bold;
        transform: scale(1.05);
        z-index: 1;
        border-color: var(--primary-red);
    }

    /* Photographer Grid */
    .photographer-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 30px;
        padding: 20px 0;
    }

    /* Photographer Card */
    .photographer-card {
        background-color: var(--white); /* White card background */
        border-radius: 12px;
        padding: 30px;
        text-align: center;
        transition: transform 0.3s ease, box-shadow 0.3s ease, border-color 0.3s ease;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: space-between;
        min-height: 380px;
        position: relative;
        border: 1px solid var(--medium-gray); /* Light gray border for definition */
        box-shadow: 0 0 0 rgba(0, 0, 0, 0);
    }

    .photographer-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 10px 30px rgba(220, 53, 69, 0.5), /* Red glow */
                    0 0 40px rgba(163, 0, 0, 0.3); /* Darker red glow */
        border-color: var(--primary-red); /* Accent border on hover */
    }

    .profile-image-wrapper {
        position: relative;
        width: 120px;
        height: 120px;
        border-radius: 50%;
        overflow: hidden;
        margin-bottom: 20px;
        display: flex;
        justify-content: center;
        align-items: center;
        background: linear-gradient(45deg, var(--primary-red), var(--dark-red)); /* Red gradient for border */
        padding: 5px;
        box-shadow: inset 0 0 10px rgba(220, 53, 69, 0.3),
                    inset 0 0 20px rgba(163, 0, 0, 0.2),
                    0 0 25px rgba(220, 53, 69, 0.6),
                    0 0 35px rgba(163, 0, 0, 0.4);
    }

    .profile-image {
        width: 100%;
        height: 100%;
        object-fit: cover;
        border-radius: 50%;
        border: 3px solid var(--white); /* White inner border */
    }

    .photographer-name {
        font-size: 1.8em;
        font-weight: bold;
        color: var(--text-color-dark); /* Dark text for name */
        margin-bottom: 8px;
        text-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
    }

    .photographer-specialty {
        font-size: 1.1em;
        color: var(--dark-gray); /* Dark gray for specialty */
        margin-bottom: 15px;
        font-weight: 500;
    }

    .photographer-tagline {
        font-size: 0.95em;
        color: var(--dark-gray);
        margin-bottom: 15px;
        flex-grow: 1;
    }

    .photographer-location {
        font-size: 0.9em;
        color: var(--dark-gray);
        margin-bottom: 25px;
    }

    .photographer-location .fas {
        margin-right: 5px;
        color: var(--primary-red); /* Accent color for icon */
    }

    .btn-view-profile {
        display: inline-block;
        background-color: var(--primary-red); /* Red background for button */
        color: var(--white); /* White text for button */
        padding: 12px 30px;
        border: 1px solid var(--primary-red);
        border-radius: 8px;
        text-decoration: none;
        font-size: 1em;
        font-weight: 600;
        transition: background-color 0.3s ease, box-shadow 0.3s ease, border-color 0.3s ease;
    }

    .btn-view-profile:hover {
        background-color: var(--dark-red); /* Darker red on hover */
        border-color: var(--dark-red);
        box-shadow: 0 0 15px rgba(220, 53, 69, 0.6);
    }

    /* Pagination Styling */
    .pagination {
        display: flex;
        justify-content: center;
        gap: 10px;
        margin-top: 50px;
        padding-bottom: 50px;
    }

    .pagination-btn {
        background-color: var(--white); /* White background */
        color: var(--text-color-dark);
        padding: 10px 18px;
        border: 1px solid var(--medium-gray);
        border-radius: 8px;
        cursor: pointer;
        font-size: 1em;
        font-weight: 500;
        transition: background-color 0.3s ease, box-shadow 0.3s ease, border-color 0.3s ease, color 0.3s ease;
    }

    .pagination-btn:hover:not(.active) {
        background-color: var(--light-gray);
        box-shadow: 0 0 10px rgba(220, 53, 69, 0.3);
        border-color: var(--primary-red);
        color: var(--primary-red);
    }

    .pagination-btn.active {
        background: linear-gradient(45deg, var(--primary-red), var(--dark-red));
        box-shadow: 0 0 15px rgba(220, 53, 69, 0.6), 0 0 25px rgba(163, 0, 0, 0.4);
        font-weight: bold;
        color: var(--white);
        border-color: var(--primary-red);
    }

    /* Footer Styling */
    .main-footer {
        background-color: var(--dark-gray); /* Dark gray background for footer */
        color: var(--white); /* White text for footer */
        text-align: center;
        padding: 30px 20px;
        font-size: 0.9em;
        border-top: 1px solid rgba(255, 255, 255, 0.1);
        margin-top: auto;
    }

    /* Responsive Design */
    @media (max-width: 992px) {
        .photographer-grid {
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 25px;
        }
    }

    @media (max-width: 768px) {
        .main-header {
            padding: 15px 20px;
        }

        .header-content {
            flex-direction: column;
            text-align: center;
        }

        .site-title {
            font-size: 2.5em;
            text-align: center;
            width: 100%;
        }

        .main-nav {
            gap: 20px;
            margin-bottom: 10px;
        }

        .main-nav .nav-link {
            font-size: 1em;
        }

        .user-actions {
            justify-content: center;
            width: 100%;
            gap: 10px;
        }
        .user-actions .btn-user-action {
            flex: 1;
            max-width: 120px;
            font-size: 0.9em;
            padding: 8px 15px;
        }

        .main-content {
            padding: 0 15px;
        }

        .category-filter-wrapper {
            padding: 0 15px 10px;
        }

        .category-filter {
            justify-content: flex-start;
            gap: 10px;
        }

        .category-btn {
            padding: 10px 20px;
            font-size: 0.95em;
        }

        .photographer-grid {
            grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
            gap: 20px;
        }

        .photographer-card {
            padding: 25px;
            min-height: auto;
        }

        .profile-image-wrapper {
            width: 100px;
            height: 100px;
            margin-bottom: 15px;
        }

        .photographer-name {
            font-size: 1.6em;
        }

        .photographer-specialty,
        .photographer-tagline,
        .photographer-location {
            font-size: 0.85em;
        }

        .btn-view-profile {
            padding: 10px 25px;
            font-size: 0.95em;
        }
    }

    @media (max-width: 576px) {
        .site-title {
            font-size: 2em;
        }

        .main-nav {
            flex-direction: column;
            align-items: center;
            gap: 10px;
        }

        .category-filter {
            padding-bottom: 5px;
        }

        .photographer-grid {
            grid-template-columns: 1fr;
            padding: 0 10px;
        }

        .photographer-card {
            padding: 20px;
        }
    }
</style>