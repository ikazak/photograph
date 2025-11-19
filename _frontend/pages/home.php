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
    <section class="hero">
        <div class="hero__slider owl-carousel">
            <div class="hero__item set-bg" data-setbg="<?=assets()?>/phograph/img/hero/hero-1.jpg">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="hero__text">
                                <span> "Capturing Life's Unforgettable Moments"</span>
                                <h2> Exquisite Photography </h2>
                                <a style="color: yellow;" href="<?=page('services.php')?>" class="primary-btn">BOOK NOW</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="hero__item set-bg" data-setbg="<?=assets()?>/phograph/img/hero/hero-1.jpg">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="hero__text">
                                <span>"Your Story, Beautifully Photographed"</span>
                                <h2>For Every Occasion</h2>
                                <a style="color: yellow;" href="<?=page('services.php')?>" class="primary-btn">BOOK NOW</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="hero__item set-bg" data-setbg="<?=assets()?>/phograph/img/hero/hero-1.jpg">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="hero__text">
                                <span>For website and video editing</span>
                                <h2>Videographer’s Portfolio</h2>
                                <a style="color: yellow;" href="<?=page('services.php')?>" class="primary-btn">BOOK NOW</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="services spad bg-white">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="services__title">
                        <div class="section-title">
                            <span class="text-danger">Our services</span>
                            <h2 class="text-dark">What We do?</h2>
                        </div>
                        <p class="text-dark">If you hire a videographer of our team you will get a video professional to make a custom
                            video for your business and, once the project is over.</p>
                        <a href="#" class="primary-btn btn btn-danger text-white">View all services</a>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="services__item bg-light">
                                <div class="services__item__icon">
                                    <img src="<?=assets()?>/phograph/img/icons/si-1.png" alt="">
                                </div>
                                <h4 class="text-dark">Motion graphics</h4>
                                <p class="text-dark">Whether you’re halfway through the editing process, or you haven’t even started, our
                                    post production services can put the finishing touches.</p>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="services__item bg-light">
                                <div class="services__item__icon">
                                    <img src="<?=assets()?>/phograph/img/icons/si-2.png" alt="">
                                </div>
                                <h4 class="text-dark">Scriptwriting and editing</h4>
                                <p class="text-dark">Whether you’re halfway through the editing process, or you haven’t even started, our
                                    post production services can put the finishing touches.</p>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="services__item bg-light">
                                <div class="services__item__icon">
                                    <img src="<?=assets()?>/phograph/img/icons/si-3.png" alt="">
                                </div>
                                <h4 class="text-dark">Video distribution</h4>
                                <p class="text-dark">Whether you’re halfway through the editing process, or you haven’t even started, our
                                    post production services can put the finishing touches.</p>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="services__item bg-light">
                                <div class="services__item__icon red-border">
                                    <img src="<?=assets()?>/phograph/img/icons/si-4.png" alt="">
                                </div>
                                <h4 class="text-dark">Video hosting</h4>
                                <p class="text-dark">Whether you’re halfway through the editing process, or you haven’t even started, our
                                    post production services can put the finishing touches.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v13.0"></script>
    
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
    <section class="latest spad bg-light">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title center-title">
                        <span class="text-danger">Our Blog</span>
                        <h2 class="text-dark">Blog Update</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="latest__slider owl-carousel">
                    <div class="col-lg-4">
                        <div class="blog__item latest__item bg-white">
                            <h4 class="text-dark">What Makes Users Want to Share a Video on Social Media?</h4>
                            <ul>
                                <li class="text-dark">Jan 03, 2020</li>
                                <li class="text-dark">05 Comment</li>
                            </ul>
                            <p class="text-dark">We recently launched a new website for a Vital client and wanted to share some of the
                                cool features we were able...</p>
                            <a href="#" class="text-danger">Read more <span class="arrow_right"></span></a>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="blog__item latest__item bg-white">
                            <h4 class="text-dark">Bumper Ads: How to Tell a Story in 6 Seconds</h4>
                            <ul>
                                <li class="text-dark">Jan 03, 2020</li>
                                <li class="text-dark">05 Comment</li>
                            </ul>
                            <p class="text-dark">We recently launched a new website for a Vital client and wanted to share some of the
                                cool features we were able...</p>
                            <a href="#" class="text-danger">Read more <span class="arrow_right"></span></a>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="blog__item latest__item bg-white">
                            <h4 class="text-dark">What Makes Users Want to Share a Video on Social Media?</h4>
                            <ul>
                                <li class="text-dark">Jan 03, 2020</li>
                                <li class="text-dark">05 Comment</li>
                            </ul>
                            <p class="text-dark">We recently launched a new website for a Vital client and wanted to share some of the
                                cool features we were able...</p>
                            <a href="#" class="text-danger">Read more <span class="arrow_right"></span></a>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="blog__item latest__item bg-white">
                            <h4 class="text-dark">Bumper Ads: How to Tell a Story in 6 Seconds</h4>
                            <ul>
                                <li class="text-dark">Jan 03, 2020</li>
                                <li class="text-dark">05 Comment</li>
                            </ul>
                            <p class="text-dark">We recently launched a new website for a Vital client and wanted to share some of the
                                cool features we were able...</p>
                            <a href="#" class="text-danger">Read more <span class="arrow_right"></span></a>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="blog__item latest__item bg-white">
                            <h4 class="text-dark">What Makes Users Want to Share a Video on Social Media?</h4>
                            <ul>
                                <li class="text-dark">Jan 03, 2020</li>
                                <li class="text-dark">05 Comment</li>
                            </ul>
                            <p class="text-dark">We recently launched a new website for a Vital client and wanted to share some of the
                                cool features we were able...</p>
                            <a href="#" class="text-danger">Read more <span class="arrow_right"></span></a>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="blog__item latest__item bg-white">
                            <h4 class="text-dark">What Makes Users Want to Share a Video on Social Media?</h4>
                            <ul>
                                <li class="text-dark">Jan 03, 2020</li>
                                <li class="text-dark">05 Comment</li>
                            </ul>
                            <p class="text-dark">We recently launched a new website for a Vital client and wanted to share some of the
                                cool features we were able...</p>
                            <a href="#" class="text-danger">Read more <span class="arrow_right"></span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="callto spad set-bg text-white" data-setbg="<?=assets()?>/phograph/img/callto-bg.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="callto__text">
                        <h2>Fresh Ideas, Fresh Moments Giving Wings to your Stories.</h2>
                        <p>INC5000, Best places to work 2019</p>
                        <a href="#"  class="btn btn-outline-light">Start your stories</a>
                    </div>
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
</body>

</html>
<?= import_packages("datatable", "tyrax", "loading", "ctr", "path", "twal") ?>

    <script>
        addEventListener("DOMContentLoaded", () => {
            LOADING.load(true);

            setTimeout(() => LOADING.load(false), 1000)

        })
    </script>



<script>
        window.addEventListener("load", ()=>{
            $page = "<?=current_page()?>";
            if($page == "home"){
                document.querySelector("#hm").classList.add("active");
            }
            if($page == "about"){
                document.querySelector("#about").classList.add("active");
            }
            if($page == "portfolio"){
                document.querySelector("#port").classList.add("active");
            }
            if($page == "services"){
                // Corrected selector here, assuming #serv is the correct ID for services link
                document.querySelector("#serv").classList.add("active");
            }
            if($page == "contact"){
                document.querySelector("#cont").classList.add("active");
            }

        });
    </script>
<style>
    /* Services Section - Icon Coloring */
.services__item__icon {
    /* If the icons are PNG/JPG, try to shift their color to red */
    filter: hue-rotate(200deg) saturate(2) brightness(0.8) sepia(1) saturate(100) hue-rotate(300deg);
    /* The specific filter values might need tweaking depending on the original icon color */
    /* You can use online CSS filter generators or browser developer tools to fine-tune this */
    /* Example: if icons are originally blue, this filter aims to shift them towards red */
}

/* If you ever switch to Font Awesome or similar icon fonts, this rule would apply */
.services__item__icon i {
    color: var(--theme-red); /* Uses your defined red variable */
}

/* Specific styling for the 'red-border' class you added to the last icon */
.services__item__icon.red-border {
    border: 1px solid var(--theme-red); /* Adds a red border */
    padding: 10px; /* Adjust padding as needed for the border */
    border-radius: 50%; /* Makes it circular if desired */
    display: inline-flex; /* Ensures proper alignment for circular border */
    align-items: center;
    justify-content: center;
}
</style>