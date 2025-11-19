<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Videograph Template">
    <meta name="keywords" content="Videograph, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PPHOTOGRAPHY WEBSITE</title>
    
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Play:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="<?=assets()?>/phograph/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="<?=assets()?>/phograph/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="<?=assets()?>/phograph/css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="<?=assets()?>/phograph/css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="<?=assets()?>/phograph/css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="<?=assets()?>/phograph/css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="<?=assets()?>/phograph/css/style.css" type="text/css">
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Header Section Begin -->
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
    <!-- Header End -->

    <!-- Breadcrumb Begin -->
    <div class="breadcrumb-option spad set-bg" data-setbg="<?=assets()?>/phograph/img/breadcrumb-bg.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Contact us</h2>
                        <div class="breadcrumb__links">
                            <a href="#">Home</a>
                            <span>Contact</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Contact Widget Section Begin -->
    <section class="contact-widget spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 col-md-6 col-md-3">
                    <div class="contact__widget__item">
                        <div class="contact__widget__item__icon">
                            <i class="fa fa-map-marker"></i>
                        </div>
                        <div class="contact__widget__item__text">
                            <h4>Address</h4>
                            <p>Sipalay</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-md-6 col-md-3">
                    <div class="contact__widget__item">
                        <div class="contact__widget__item__icon">
                            <i class="fa fa-phone"></i>
                        </div>
                        <div class="contact__widget__item__text">
                            <h4>Hotline</h4>
                            <p>0927 401 5370</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-md-6 col-md-3">
                    <div class="contact__widget__item">
                        <div class="contact__widget__item__icon">
                            <i class="fa fa-map-marker"></i>
                        </div>
                        <div class="contact__widget__item__text">
                            <h4>Email</h4>
                            <p>Pphotography@gmail.com</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Contact Widget Section End -->

    <!-- Call To Action Section Begin -->
    <section class="contact spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="contact__map">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d125831.47598866619!2d122.47704510000001!3d9.746267799999998!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x33ac51c43ac665bf%3A0xbb8a64a759b924b4!2sSipalay%2C%20Negros%20Occidental!5e0!3m2!1sen!2sph!4v1747647470302!5m2!1sen!2sph" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="contact__form">
                        <h3>Get in touch</h3>
                        <form action="#">
                            <input type="text" placeholder="Name">
                            <input type="text" placeholder="Email">
                            <input type="text" placeholder="Website">
                            <textarea placeholder="Message"></textarea>
                            <button type="submit" class="site-btn">Send Message</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Call To Action Section End -->

    <!-- Footer Section Begin -->

    <?=include_page('landing/foot')?>

    
    <!-- Footer Section End -->

    <?= import_packages("datatable", "tyrax", "loading", "ctr", "path", "twal") ?>

    <script>
        addEventListener("DOMContentLoaded", () => {
            LOADING.load(true);

            setTimeout(() => LOADING.load(false), 1000)

        })
    </script>
    <!-- Js Plugins -->
    <script src="<?=assets()?>/phograph/js/jquery-3.3.1.min.js"></script>
    <script src="<?=assets()?>/phograph/js/bootstrap.min.js"></script>
    <script src="<?=assets()?>/phograph/js/jquery.magnific-popup.min.js"></script>
    <script src="<?=assets()?>/phograph/js/mixitup.min.js"></script>
    <script src="<?=assets()?>/phograph/js/masonry.pkgd.min.js"></script>
    <script src="<?=assets()?>/phograph/js/jquery.slicknav.js"></script>
    <script src="<?=assets()?>/phograph/js/owl.carousel.min.js"></script>
    <script src="<?=assets()?>/phograph/js/main.js"></script>
</body>

</html>

<style>
    /* Custom CSS Variables for White and Red Theme */
:root {
    --primary-red: #ff0000; /* A vibrant red */
    --dark-red: #cc0000;    /* A darker shade of red for accents */
    --light-red: #ff3333;   /* A lighter shade of red */
    --white: #ffffff;       /* Pure white */
    --light-gray: #f0f0f0;  /* Very light gray for subtle backgrounds */
    --dark-gray: #333333;   /* Dark gray for text on light backgrounds */
    --text-color-light: #555555; /* Slightly darker gray for general text */
    --border-color: #e0e0e0; /* Light border color */
}

/* General Body and Text Styles */
body {
    font-family: 'Josefin Sans', sans-serif;
    color: var(--text-color-light);
    background-color: var(--white); /* White background for the entire page */
}

h1, h2, h3, h4, h5, h6 {
    font-family: 'Play', sans-serif;
    color: var(--dark-gray); /* Dark gray for headings */
}

a {
    color: var(--primary-red); /* Red links */
    text-decoration: none;
    transition: all 0.3s ease;
}

a:hover {
    color: var(--dark-red); /* Darker red on hover */
    text-decoration: none;
}

/* --- Header and Navigation Bar --- */
.header {
    background-color: var(--white); /* White background for the header */
    border-bottom: 1px solid var(--border-color); /* Subtle border */
    padding: 20px 0;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05); /* Subtle shadow */
}



.header__menu ul li a {
    color: var(--dark-gray); /* Dark gray for navigation links */
    font-weight: 600;
    padding: 10px 15px;
    transition: all 0.3s ease;
}

.header__menu ul li a:hover,
.header__menu ul li.active a {
    color: var(--primary-red); /* Red on hover and active */
}

.header__right a {
    color: var(--primary-red); /* Red for header right icons/links */
    font-size: 20px;
    margin-left: 20px;
}
.header__right a:hover {
    color: var(--dark-red);
}

/* --- Breadcrumb Section --- */


/* --- Contact Widget Section --- */
.contact-widget {
    background-color: var(--white); /* Ensure widget section has a white background */
    padding-top: 80px;
    padding-bottom: 80px;
}

.contact__widget__item {
    text-align: center;
    margin-bottom: 30px;
}

.contact__widget__item__icon i {
    font-size: 48px;
    color: var(--primary-red); /* Red icons */
    margin-bottom: 15px;
}

.contact__widget__item__text h4 {
    color: var(--dark-gray); /* Dark gray heading */
    font-size: 24px;
    margin-bottom: 5px;
}

.contact__widget__item__text p {
    color: var(--text-color-light); /* Standard text color */
}

/* --- Contact Form Section --- */
.contact {
    background-color: var(--light-gray); /* Light gray background for contrast */
    padding-top: 80px;
    padding-bottom: 80px;
}

.contact__map iframe {
    width: 100%;
    height: 450px;
    border: 2px solid var(--border-color); /* Subtle border for the map */
}

.contact__form h3 {
    color: var(--dark-gray);
    font-size: 36px;
    margin-bottom: 30px;
}

.contact__form form input,
.contact__form form textarea {
    width: 100%;
    border: 1px solid var(--border-color); /* Light border for inputs */
    padding: 12px 20px;
    margin-bottom: 20px;
    background-color: var(--white); /* White input backgrounds */
    color: var(--dark-gray);
}

.contact__form form textarea {
    min-height: 150px;
    resize: vertical;
}

.contact__form form input::placeholder,
.contact__form form textarea::placeholder {
    color: var(--text-color-light);
}

.site-btn {
    display: inline-block;
    background-color: var(--primary-red); /* Red button */
    color: var(--white); /* White text on button */
    padding: 15px 35px;
    font-size: 16px;
    font-weight: 600;
    text-transform: uppercase;
    border: none;
    cursor: pointer;
    transition: all 0.3s ease;
}

.site-btn:hover {
    background-color: var(--dark-red); /* Darker red on hover */
    color: var(--white);
}

/* --- Footer Section --- */


/* Preloader */
#preloder {
    background: var(--primary-red); /* Red preloader background */
}
.loader {
    border: 6px solid var(--white); /* White loader border */
    border-top: 6px solid var(--dark-red); /* Dark red top border for animation */
}

/* Adjustments for responsiveness if necessary */
@media (max-width: 991px) {
    .header__menu {
        background-color: var(--white); /* White background for mobile menu */
        border-bottom: 1px solid var(--border-color);
    }
    .header__menu ul li a {
        padding: 10px;
    }
}

@media (max-width: 767px) {
    .contact__widget__item {
        margin-bottom: 20px;
    }
    .contact__map iframe {
        height: 300px; /* Adjust map height for smaller screens */
    }
    .footer__option__item {
        margin-bottom: 30px;
    }
}
</style>
