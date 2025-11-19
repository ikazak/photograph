<header class="header">
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
                                <li><a id="hm" href="<?=page('home.php')?>">Home</a></li>
                                <li><a id="about" href="<?=page('about.php')?>">About</a></li>
                                <li><a id="port" href="<?=page('portfolio.php')?>">Portfolio</a></li>
                                <li><a id="serv" href="<?=page('services.php')?>">Services</a></li>
                                <li><a id="cont" href="<?=page('contact.php')?>">Contact</a></li>

                            </ul>
                        </nav>

                        <div class="header__nav__social">
                            <a href="<?=page('services.php')?>"><i><button class="book">BOOK NOW</button></i></a>
                            <a href="#"><i></i></a>
                            <a href="#"><i></i></a>
                            <a href="#"><i></i></a>
                            <a href="#"><i></i></a>
                            <a href="<?=page('loginpage.php')?>"><button class="login">LOG IN</button></a>
                        </div>
                    </div>
                </div>
            </div>
            <div id="mobile-menu-wrap"></div>
        </div>
    </header>

    
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
        /* General Header Styling */
        .header {
            background-color: #ffffff; /* White background for the header */
            padding: 20px 0;
            border-bottom: 1px solid #e9ecef; /* Light grey bottom border */
            box-shadow: 0 2px 5px rgba(0,0,0,0.05); /* Subtle shadow */
        }

        .header__logo {
            /* Ensure the logo container aligns its content to the start */
            display: flex;
            align-items: center;
        }

        .header__logo a {
            /* This is already set to flex, now we explicitly make it start */
            justify-content: flex-start;
            align-items: center; /* Ensure vertical alignment is still good */
            text-decoration: none; /* Remove underline from logo link */
        }

        .header__logo img {
            vertical-align: middle; /* Ensures logo and text align nicely */
        }

        /* Adjust logo text color for white background */
        .header__logo b {
            color: #343a40; /* Dark text for "PPhotography" */
            /* Removed !important as it's not needed if directly setting color */
            padding-left:10px; /* Keep the padding for space between img and text */
            margin: 0; /* Remove margin:auto which was centering it */
        }

        /* Navigation Menu */
        .header__nav__menu ul {
            list-style: none;
            padding: 0;
            margin: 0;
            display: flex; /* Make menu items horizontal */
            justify-content: flex-start; /* Align to the left */
            align-items: center;
            height: 100%; /* Ensure menu takes full height for vertical alignment */
        }

        .header__nav__menu ul li {
            margin-right: 30px; /* Space between menu items */
        }

        .header__nav__menu ul li:last-child {
            margin-right: 0;
        }

        .header__nav__menu ul li a {
            text-decoration: none;
            color: #343a40; /* Dark text for default links */
            font-size: 16px;
            font-weight: 500;
            padding: 10px 0;
            display: block;
            transition: all 0.3s ease;
            position: relative;
        }

        .header__nav__menu ul li a::after {
            content: '';
            position: absolute;
            left: 0;
            bottom: 0; /* Position the underline below the text */
            height: 2px;
            width: 0;
            background-color: #dc3545; /* Red underline */
            transition: all 0.3s ease;
        }

        .header__nav__menu ul li a:hover::after,
        .header__nav__menu ul li a.active::after {
            width: 100%; /* Expand underline on hover/active */
        }

        .header__nav__menu ul li a:hover,
        .header__nav__menu ul li a.active {
            color: #dc3545; /* Red text on hover/active */
        }


        /* Header Social (Book Now & Log In buttons) */
        .header__nav__social {
            display: flex; /* Keep buttons in a row */
            align-items: center;
            justify-content: flex-end; /* Align to the right */
            height: 100%; /* Align with nav items vertically */
        }

        .book {
            background-color: #dc3545; /* Red background for Book Now */
            color: #ffffff; /* White text */
            border-radius: 20px;
            height: 40px;
            width: 110px;
            border: none;
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.3s ease;
            margin-right: 15px; /* Space between buttons */
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }

        .book:hover {
            background-color: #c82333; /* Darker red on hover */
        }

        .login {
            background-color: transparent; /* Transparent background */
            color: #dc3545; /* Red text for Log In */
            padding: 5px 15px; /* Adjust padding for a cleaner look */
            border: 1px solid #dc3545; /* Red border */
            border-radius: 20px; /* Make it more rounded like "Book Now" */
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease, color 0.3s ease, transform 0.2s ease, border-color 0.3s ease;
            box-shadow: none; /* Remove initial box-shadow to match theme */
        }

        .login:hover {
            background-color: #dc3545; /* Red background on hover */
            color: #ffffff; /* White text on hover */
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Subtle shadow on hover */
        }

        .login:active {
            transform: translateY(0);
            box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.2);
        }

        /* Ensure .header__nav__social aligns next to menu or takes appropriate space */
        .header__nav__option {
            display: flex;
            justify-content: space-between; /* Pushes nav menu to left, social to right */
            align-items: center;
        }

        /* Responsive adjustments for mobile menu - you'll need JavaScript for actual mobile menu toggle */
        @media (max-width: 991px) {
            .header__nav__menu {
                display: none; /* Hide desktop menu on smaller screens */
            }
            .header__nav__social {
                justify-content: center; /* Center buttons on mobile */
                width: 100%;
                margin-top: 15px; /* Space below logo */
            }
            /* Adjustments for logo on small screens if needed */
            .header__logo {
                justify-content: center; /* Center logo on small screens */
                width: 100%; /* Take full width */
                margin-bottom: 15px; /* Space below logo before nav options */
            }
            .header__nav__option {
                flex-direction: column;
            }
        }

        @media (max-width: 767px) {
            .header {
                padding: 15px 0;
            }
            .header__logo b {
                font-size: 18px; /* Slightly smaller logo text on small screens */
            }
            .book, .login {
                height: 35px;
                font-size: 14px;
                padding: 5px 12px;
            }
        }
    </style>