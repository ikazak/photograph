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

    <style>
        /* This can be added to your style.css or within the <style> tag */

        /* General text color adjustments for white backgrounds */
        body {
            color: #212529; /* dark text for general body */
        }

        /* Adjusting section titles to be dark on white backgrounds */
        .section-title span {
            color: #dc3545; /* Red color for spans */
        }

        .section-title h2 {
            color: #212529; /* Dark color for headings */
        }

        /* Specific styling for services item icons for better visibility */
        .services__item__icon {
            background-color: rgba(220, 53, 69, 0.1); /* A very light red tint */
            border-radius: 50%; /* Makes it circular */
            padding: 20px; /* Adjust padding as needed for icon size */
            display: inline-flex; /* To center the image inside */
            align-items: center;
            justify-content: center;
            margin-bottom: 20px; /* Space between icon and heading */
        }

        /* Ensure services item text is dark on light background */
        .services__item h4,
        .services__item p {
            color: #212529 !important; /* Force dark text for service items */
        }

        /* Styling for the Counter section icons and text */
        .counter__item__text img {
            filter: brightness(0) saturate(100%) invert(26%) sepia(87%) saturate(5488%) hue-rotate(345deg) brightness(85%) contrast(100%); /* This CSS filter attempts to turn the icon red */
            margin-bottom: 15px;
        }

        .counter__item__text h2.counter_num {
            color: #dc3545; /* Red for numbers */
        }

        .counter__item__text p {
            color: #212529; /* Dark for text */
        }

        /* Team section overlay for text visibility */
        .team__item__text {
            background-color: rgba(220, 53, 69, 0.7); /* Red overlay with transparency */
            color: #fff; /* White text on red overlay */
        }

        .team__item__text h4,
        .team__item__text p {
            color: #fff; /* White text for team names and roles */
        }

        .team__item__social a {
            color: #fff; /* White social icons */
            border: 1px solid #fff; /* White border for social icons */
        }

        .team__item__social a:hover {
            background-color: #fff;
            color: #dc3545; /* Red on hover for social icons */
        }

        /* Breadcrumb text color */
        .breadcrumb__text h2,
        .breadcrumb__text a,
        .breadcrumb__text span {
            color: #fff !important; /* Ensure white text on the breadcrumb background image */
        }
    </style>
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
    </header><header class="header bg-white">
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
                        <h2>About us</h2>
                        <div class="breadcrumb__links">
                            <a href="#">Home</a>
                            <span>About</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="about spad bg-white"> <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="about__pic">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="about__pic__item about__pic__item--large set-bg"
                                    data-setbg="<?=assets()?>/phograph/img/about/about-1.jpg"></div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="about__pic__item set-bg" data-setbg="<?=assets()?>/phograph/img/about/about-2.jpg"></div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="about__pic__item set-bg" data-setbg="<?=assets()?>/phograph/img/about/about-3.jpg"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="about__text">
                        <div class="section-title">
                            <span class="text-danger">About videograph</span> <h2 class="text-dark">WHo we are?</h2> </div>
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="services__item">
                                    <div class="services__item__icon"> <img src="<?=assets()?>/phograph/img/icons/si-3.png" alt="">
                                    </div>
                                    <h4 class="text-dark">Video distribution</h4> <p class="text-dark">Whether you’re halfway through the editing process, or you.</p> </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="services__item">
                                    <div class="services__item__icon"> <img src="<?=assets()?>/phograph/img/icons/si-4.png" alt="">
                                    </div>
                                    <h4 class="text-dark">Video hosting</h4> <p class="text-dark">Whether you’re halfway through the editing process, or you.</p> </div>
                            </div>
                        </div>
                        <div class="about__text__desc">
                            <p class="text-dark">Formed in 2006 by Matt Hobbs and Cael Jones, Videoprah is an award-winning, full-service
                                production company specializing in commercial, broadcast, tourism & action sport video
                                production services has been featured.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <section class="testimonial spad set-bg" data-setbg="<?=assets()?>/phograph/img/testimonial-bg.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title center-title">
                        <span class="text-white">Loved By Clients</span> <h2 class="text-white">What clients say?</h2> </div>
                </div>
            </div>
            <div class="row">
                <div class="testimonial__slider owl-carousel">
                    <div class="col-lg-4">
                        <div class="testimonial__item bg-white text-dark p-4 rounded"> <div class="testimonial__text">
                                <p class="text-dark">Delivers such a great service that it can benefit all kinds of people from any number
                                    of industries.</p>
                            </div>
                            <div class="testimonial__author">
                                <div class="testimonial__author__pic">
                                    <img src="<?=assets()?>/phograph/img/testimonial/ta-1.jpg" alt="">
                                </div>
                                <div class="testimonial__author__text">
                                    <h5 class="text-dark">Krista Attorn</h5>
                                    <span class="text-muted">Web Designer</span> </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="testimonial__item bg-white text-dark p-4 rounded">
                            <div class="testimonial__text">
                                <p class="text-dark">Videographer delivers such a great service that it can benefit all kinds of people
                                    from any number.</p>
                            </div>
                            <div class="testimonial__author">
                                <div class="testimonial__author__pic">
                                    <img src="<?=assets()?>/phograph/img/testimonial/ta-2.jpg" alt="">
                                </div>
                                <div class="testimonial__author__text">
                                    <h5 class="text-dark">Krista Attorn</h5>
                                    <span class="text-muted">Web Designer</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="testimonial__item bg-white text-dark p-4 rounded">
                            <div class="testimonial__text">
                                <p class="text-dark">Videographer delivers such a great service that it can benefit all kinds of people
                                    from any number.</p>
                            </div>
                            <div class="testimonial__author">
                                <div class="testimonial__author__pic">
                                    <img src="<?=assets()?>/phograph/img/testimonial/ta-3.jpg" alt="">
                                </div>
                                <div class="testimonial__author__text">
                                    <h5 class="text-dark">Krista Attorn</h5>
                                    <span class="text-muted">Web Designer</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="testimonial__item bg-white text-dark p-4 rounded">
                            <div class="testimonial__text">
                                <p class="text-dark">Delivers such a great service that it can benefit all kinds of people from any number
                                    of industries.</p>
                            </div>
                            <div class="testimonial__author">
                                <div class="testimonial__author__pic">
                                    <img src="<?=assets()?>/phograph/img/testimonial/ta-1.jpg" alt="">
                                </div>
                                <div class="testimonial__author__text">
                                    <h5 class="text-dark">Krista Attorn</h5>
                                    <span class="text-muted">Web Designer</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="testimonial__item bg-white text-dark p-4 rounded">
                            <div class="testimonial__text">
                                <p class="text-dark">Videographer delivers such a great service that it can benefit all kinds of people
                                    from any number.</p>
                            </div>
                            <div class="testimonial__author">
                                <div class="testimonial__author__pic">
                                    <img src="<?=assets()?>/phograph/img/testimonial/ta-2.jpg" alt="">
                                </div>
                                <div class="testimonial__author__text">
                                    <h5 class="text-dark">Krista Attorn</h5>
                                    <span class="text-muted">Web Designer</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="counter bg-white spad"> <div class="container">
            <div class="counter__content">
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="counter__item">
                            <div class="counter__item__text">
                                <img src="<?=assets()?>/phograph/img/icons/ci-1.png" alt=""> <h2 class="counter_num text-danger">230</h2> <p class="text-dark">Compled Projects</p> </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="counter__item second__item">
                            <div class="counter__item__text">
                                <img src="<?=assets()?>/phograph/img/icons/ci-2.png" alt=""> <h2 class="counter_num text-danger">1068</h2> <p class="text-dark">Happy clients</p> </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="counter__item third__item">
                            <div class="counter__item__text">
                                <img src="<?=assets()?>/phograph/img/icons/ci-3.png" alt=""> <h2 class="counter_num text-danger">230</h2> <p class="text-dark">Perspective clients</p> </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="counter__item four__item">
                            <div class="counter__item__text">
                                <img src="<?=assets()?>/phograph/img/icons/ci-4.png" alt=""> <h2 class="counter_num text-danger">230</h2> <p class="text-dark">Compled Projects</p> </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="team spad set-bg" data-setbg="<?=assets()?>/phograph/img/team-bg.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title team__title">
                        <span class="text-white">Nice to meet</span> <h2 class="text-white">OUR Team</h2> </div>
                </div>
            </div>
            <div id="portfolio_profile" class="row">


                
                
                
                
                <div class="col-lg-12 p-0">
                    <div class="team__btn">
                        <a href="<?= page('portfolio') ?>" class="primary-btn btn btn-danger text-white">Meet Our Team</a> </div>
                </div>
            </div>
        </div>
    </section>
    <?=include_page('landing/foot')?>
    <script src="<?=assets()?>/phograph/js/jquery-3.3.1.min.js"></script>
    <script src="<?=assets()?>/phograph/js/bootstrap.min.js"></script>
    <script src="<?=assets()?>/phograph/js/jquery.magnific-popup.min.js"></script>
    <script src="<?=assets()?>/phograph/js/mixitup.min.js"></script>
    <script src="<?=assets()?>/phograph/js/masonry.pkgd.min.js"></script>
    <script src="<?=assets()?>/phograph/js/jquery.slicknav.js"></script>
    <script src="<?=assets()?>/phograph/js/owl.carousel.min.js"></script>
    <script src="<?=assets()?>/phograph/js/main.js"></script>


<?= import_packages("datatable", "tyrax", "loading", "ctr", "path", "twal") ?>

    <script>
        addEventListener("DOMContentLoaded", () => {
            LOADING.load(true);

            setTimeout(() => LOADING.load(false), 1000)

        })
    </script>
    
<script>
    let basket = [];

        function displayAllphotographers(searchTerm = '') {
            //const $container = $('#photographerCardRow');
            const $noServicesMessage = $('#noServicesMessage');

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
                            <div class="col-lg-3 col-md-6 col-sm-6 p-0">
                    <div class="team__item set-bg">
                        <img src="${imageSrc}" alt="" height="100%" width="100%">
                        <div class="team__item__text"> <h4>${name} ${lname}</h4>
                            <p>${skill}</p>
                            <div class="team__item__social">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-dribbble"></i></a>
                                <a href="#"><i class="fa fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
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



</body>

</html>

<style>
    /* Ensure these variables are defined in your :root block if not already */
:root {
    --theme-red: #E53935; /* A strong, primary red */
    --theme-light-red: #FFCDD2; /* A very light red for subtle backgrounds */
    --theme-black: #212121; /* A dark grey for primary text */
    --theme-white: #FFFFFF;
}

/* Style for image icons within .services__item__icon */
.services__item__icon img {
    /* This filter attempts to convert the image colors to red. */
    /* Adjust these values if the initial red isn't quite right. */
    filter: invert(20%) sepia(100%) saturate(600%) hue-rotate(330deg) brightness(90%) contrast(100%);
    /* This filter aims to shift existing colors towards a vivid red. */
}

/* Style for the container around the icons for better visual presentation */
.services__item__icon {
    background-color: var(--theme-light-red); /* Light red background for the icon circle */
    border-radius: 50%; /* Make it circular */
    display: inline-flex; /* Helps center the image */
    align-items: center;
    justify-content: center;
    padding: 15px; /* Adjust padding around the icon */
    margin-bottom: 20px; /* Space below the icon */
    /* Remove any specific width/height if it's interfering with responsiveness */
    height: 70px; /* Example fixed size, adjust as needed */
    width: 70px;  /* Example fixed size, adjust as needed */
}

/* Ensure text colors are consistent within these service items */
.about__text .services__item h4 {
    color: var(--theme-black);
    margin-bottom: 10px;
}

.about__text .services__item p {
    color: #666; /* Softer black for body text */
}

/* Style for the service item boxes themselves (if you want them distinct) */
.about__text .services__item {
    background-color: var(--theme-white); /* White background for each service item */
    padding: 25px; /* Adjust padding for visual comfort */
    border-radius: 8px; /* Slightly rounded corners */
    text-align: center; /* Center content within the box */
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05); /* Subtle shadow */
    transition: all 0.3s ease; /* Smooth transition for hover effects */
    margin-bottom: 20px; /* Space between items */
    height: 100%; /* Ensure items in a row have consistent height */
    display: flex; /* Use flexbox for internal alignment */
    flex-direction: column;
    justify-content: flex-start;
    align-items: center;
}

.about__text .services__item:hover {
    transform: translateY(-5px); /* Lift effect on hover */
    box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1); /* More prominent shadow on hover */
}

/* General text color for the about section description */
.about__text__desc p {
    color: #444; /* Slightly softer than pure black */
    line-height: 1.8; /* Improve readability */
}

/* Section title refinements */
.section-title span {
    color: var(--theme-red); /* Your red accent color */
    font-weight: 700; /* Make it bold */
    text-transform: uppercase; /* All caps */
    letter-spacing: 1px; /* Space out letters slightly */
}

.section-title h2 {
    color: var(--theme-black); /* Dark color for main heading */
    font-size: 36px; /* Adjust size as needed */
    margin-top: 10px;
    margin-bottom: 20px;
}

.about__text p.text-dark {
    color: #444; /* Ensure body text is a good readable dark grey */
    line-height: 1.7;
}
</style>
