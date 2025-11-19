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
    
    <header class="hero-section">
        <img src="<?=assets()?>/img/homeimage.jpg"
             alt="Couple in elegant attire on a sofa"
             class="hero-image"
             onerror="this.onerror=null;this.src='https://placehold.co/1920x1080/f0f0f0/cccccc?text=Image+Load+Error';">

        <div class="hero-overlay-text">
            <h1>Wedding Gallery</h1>
        </div>
    </header>

    <main>
        <section class="nav-link-container">
            <a href="<?=page('portfolio.php')?>" class="nav-link">Back to Portfolio</a>
        </section>

        <section class="content-section">
            <p>
                Step into a world of love, laughter, and endless possibilities as you explore our prenup photography gallery.
                At Cimmaroon Photography, we believe that every love story deserves to be celebrated originally and
                creatively, and our prenup clients have shown us how beautifully they can capture their journey together.
            </p>
            <p>
                From romantic backdrops to vibrant landscapes, our prenup photography captures the endless possibilities
                when two hearts come together. Whether it's a playful theme, a shared hobby, or a nod to their favorite
                movie, our couples have woven their unique narrative into their prenup photos, creating memories that will
                be cherished for a lifetime.
            </p>
            </section>

            <h1>Our Wonderful Moments</h1>

    <div class="gallery-container">
        <div class="gallery-item">
            <img src="<?=assets()?>/img/wed.jpg" alt="Couple in a field at sunset">
        </div>
        <div class="gallery-item">
            <img src="<?=assets()?>/img/weddjpg.jpg" alt="Woman in blue dress by water">
        </div>
        <div class="gallery-item">
            <img src="<?=assets()?>/img/wed1.jpg" alt="Couple under an umbrella with smoke">
        </div>
        <div class="gallery-item">
            <img src="<?=assets()?>/img/wed2.jpg" alt="Couple sitting on a sofa indoors">
        </div>
        <div class="gallery-item">
            <img src="<?=assets()?>/img/wed5.jpg" alt="Close-up of couple smiling">
        </div>
        <div class="gallery-item">
            <img src="<?=assets()?>/img/wed3.jpg" alt="Couple standing in a garden">
        </div>
        <div class="gallery-item">
            <img src="<?=assets()?>/img/wed4.jpg" alt="Couple in white formal wear">
        </div>
        <div class="gallery-item">
            <img src="<?=assets()?>/img/wed6.jpg" alt="Close-up of a person's ear">
        </div>
        </div>

    <div id="myLightbox" class="lightbox">
        <span class="close-button">&times;</span>
        <img class="lightbox-content" id="lightboxImg">
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
        document.addEventListener('DOMContentLoaded', function() {
            const galleryItems = document.querySelectorAll('.gallery-item img');
            const lightbox = document.getElementById('myLightbox');
            const lightboxImg = document.getElementById('lightboxImg');
            const closeButton = document.querySelector('.close-button');

            // Open the lightbox when an image is clicked
            galleryItems.forEach(item => {
                item.addEventListener('click', function() {
                    lightbox.style.display = 'flex'; // Use flex to center content
                    lightboxImg.src = this.src; // Set the clicked image as the lightbox image
                });
            });

            // Close the lightbox when the close button is clicked
            closeButton.addEventListener('click', function() {
                lightbox.style.display = 'none';
            });

            // Close the lightbox when clicking outside the image
            lightbox.addEventListener('click', function(event) {
                if (event.target === lightbox) {
                    lightbox.style.display = 'none';
                }
            });

            // Optional: Close with Escape key
            document.addEventListener('keydown', function(event) {
                if (event.key === 'Escape' && lightbox.style.display === 'flex') {
                    lightbox.style.display = 'none';
                }
            });

            console.log('Photo Gallery loaded successfully!');
        });
    </script>

<style>
    h1, h2, h3, h4, h5, h6 {
            font-family: 'Playfair Display', serif;
            color: #222;
            margin-bottom: 0.5em;
        }

        h1, h2 {
            font-family: 'Playfair Display', serif;
            color: #222;
            text-align: center;
            margin: 40px auto 20px; /* Top margin, auto horizontal, bottom margin */
            font-size: 2.8em; /* Larger title */
            letter-spacing: 1px;
        }

        /* Gallery Container */
        .gallery-container {
            max-width: 1200px; /* Max width for the whole gallery */
            margin: 0 auto 60px; /* Center with bottom margin */
            padding: 20px;
            display: grid;
            /* Default for smaller screens: auto-fit columns */
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 15px; /* Space between grid items */
            box-sizing: border-box;
        }

        /* Gallery Item */
        .gallery-item {
            position: relative;
            overflow: hidden;
            border-radius: 8px; /* Slightly rounded corners for images */
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1); /* Soft shadow for depth */
            transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
            cursor: pointer;
            background-color: #fff; /* Ensure white background for items */
            display: flex; /* Use flex to center image vertically if needed */
            align-items: center;
            justify-content: center;
        }

        .gallery-item:hover {
            transform: translateY(-5px); /* Lift effect on hover */
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15); /* Enhanced shadow on hover */
        }

        .gallery-item img {
            width: 100%;
            height: 100%;
            object-fit: cover; /* Ensures images fill their container without distortion */
            display: block;
            transition: transform 0.5s ease-in-out; /* Smooth zoom on hover */
        }

        .gallery-item:hover img {
            transform: scale(1.05); /* Subtle zoom on hover */
        }

        /* Responsive Adjustments for Grid Layout */
        @media (min-width: 768px) {
            .gallery-container {
                /* For tablets, 2 columns */
                grid-template-columns: repeat(2, 1fr);
                gap: 20px;
            }
        }

        @media (min-width: 1024px) {
            .gallery-container {
                /* For desktops: fixed 3-column layout to match reference */
                grid-template-columns: repeat(3, 1fr);
                grid-auto-rows: minmax(250px, auto); /* Define a base row height, allowing content to expand */
                gap: 20px; /* Larger gap for desktop */
            }

            /* Specific placements to match the reference image's layout */
            /* Image 1: Top-left, standard size */
            .gallery-item:nth-child(1) {
                grid-column: 1 / 2;
                grid-row: 1 / 2;
            }
            /* Image 2: Top-middle, standard size */
            .gallery-item:nth-child(2) {
                grid-column: 2 / 3;
                grid-row: 1 / 2;
            }
            /* Image 3: Top-right, standard size */
            .gallery-item:nth-child(3) {
                grid-column: 3 / 4;
                grid-row: 1 / 2;
            }
            /* Image 4: Middle-left, standard size */
            .gallery-item:nth-child(4) {
                grid-column: 1 / 2;
                grid-row: 2 / 3;
            }
            /* Image 5: Middle-center, spans two rows (tall image) */
            .gallery-item:nth-child(5) {
                grid-column: 2 / 3;
                grid-row: 2 / 4; /* Spans from row 2 to row 4 (i.e., 2 full rows) */
            }
            /* Image 6: Middle-right, standard size */
            .gallery-item:nth-child(6) {
                grid-column: 3 / 4;
                grid-row: 2 / 3;
            }
            /* Image 7: Bottom-left, standard size */
            .gallery-item:nth-child(7) {
                grid-column: 1 / 2;
                grid-row: 3 / 4;
            }
            /* Image 8: Bottom-right, standard size */
            .gallery-item:nth-child(8) {
                grid-column: 3 / 4;
                grid-row: 3 / 4;
            }
            /* If you add more images, you'll need to define their grid-column/row as well */
        }

        /* Simple Lightbox (Modal) for image viewing */
        .lightbox {
            display: none; /* Hidden by default */
            position: fixed; /* Stay in place */
            z-index: 1000; /* Sit on top */
            left: 0;
            top: 0;
            width: 100%; /* Full width */
            height: 100%; /* Full height */
            overflow: auto; /* Enable scroll if needed */
            background-color: rgba(0,0,0,0.85); /* Darker black w/ opacity */
            align-items: center;
            justify-content: center;
            backdrop-filter: blur(8px); /* More pronounced blur effect */
            -webkit-backdrop-filter: blur(8px); /* For Safari support */
        }

        .lightbox-content {
            margin: auto;
            display: block;
            max-width: 90%;
            max-height: 90%;
            border-radius: 8px;
            box-shadow: 0 8px 25px rgba(0,0,0,0.7); /* Stronger shadow for modal */
            animation: fadeIn 0.3s ease-out;
            object-fit: contain; /* Ensure the image fits within the modal */
        }

        @keyframes fadeIn {
            from {opacity: 0; transform: scale(0.9);}
            to {opacity: 1; transform: scale(1);}
        }

        .close-button {
            position: absolute;
            top: 20px;
            right: 35px;
            color: #fff; /* White close button */
            font-size: 45px; /* Larger close button */
            font-weight: bold;
            transition: 0.3s;
            cursor: pointer;
        }

        .close-button:hover,
        .close-button:focus {
            color: #ccc;
            text-decoration: none;
            cursor: pointer;
        }

        a {
            color: #888;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        a:hover {
            color: #555;
        }

        /* Hero Section */
        .hero-section {
            position: relative;
            width: 100%;
            height: 60vh; /* Adjust height as needed */
            min-height: 400px; /* Minimum height for smaller screens */
            background-color: #ccc; /* Placeholder background */
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .hero-image {
            width: 100%;
            height: 100%;
            object-fit: cover; /* Ensures the image covers the area without distortion */
            object-position: center; /* Centers the image */
            filter: brightness(0.8); /* Slightly darken the image for text readability */
            transition: filter 0.5s ease;
        }

        .hero-image:hover {
            filter: brightness(0.9); /* Slightly lighten on hover */
        }

        .hero-overlay-text {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: #fff;
            text-align: center;
            z-index: 2; /* Ensure text is above the image */
            text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.7); /* Stronger shadow for readability */
            white-space: nowrap; /* Prevent text wrapping */
        }

        .hero-overlay-text h1 {
            font-size: 4.5em; /* Large font size for impact */
            margin: 0;
            color: #fff;
            letter-spacing: 2px;
            text-transform: uppercase;
        }

        /* Navigation Link */
        .nav-link-container {
            text-align: center;
            padding: 20px 0;
            background-color: #fff;
            border-bottom: 1px solid #eee;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
        }

        .nav-link {
            font-size: 1.1em;
            font-weight: 600;
            padding: 8px 15px;
            border-radius: 5px;
            display: inline-block; /* Allows padding and margin */
        }

        /* Content Section */
        .content-section {
            max-width: 900px;
            margin: 40px auto;
            padding: 0 20px;
            text-align: center; /* Center the text as in the image */
        }

        .content-section p {
            margin-bottom: 1.5em;
            font-size: 1.05em;
            color: #555;
        }

        .content-section p:last-child {
            margin-bottom: 0;
        }

        /* Responsive Adjustments */
        @media (max-width: 1024px) {
            .hero-overlay-text h1 {
                font-size: 3.5em; /* Adjust for tablets */
            }
        }

        @media (max-width: 768px) {
            .hero-section {
                height: 50vh; /* Shorter height for mobile */
                min-height: 300px;
            }
            .hero-overlay-text h1 {
                font-size: 2.5em; /* Adjust for mobile */
            }
            .nav-link {
                font-size: 1em;
                padding: 6px 12px;
            }
            .content-section {
                margin: 30px auto;
                padding: 0 15px;
            }
            .content-section p {
                font-size: 0.95em;
            }
        }

        @media (max-width: 480px) {
            .hero-overlay-text h1 {
                font-size: 1.8em; /* Smaller for very small screens */
            }
        }
    
</style>