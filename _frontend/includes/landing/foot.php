<footer class="footer">
        <div class="container">
            <div class="footer__top">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="footer__top__logo">
                            <a href="#"><img src="img/logo.png" alt=""></a>
                        </div>
                    </div>
                    
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                        <div class="footer__top__social">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-dribbble"></i></a>
                            <a href="#"><i class="fa fa-instagram"></i></a>
                            <a href="#"><i class="fa fa-youtube-play"></i></a>
                        </div>
                    </div>
            <div class="footer__option">
                <div class="row">
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="footer__option__item">
                            <h5>About us</h5>
                            <p>Formed in 2006 by Matt Hobbs and Cael Jones, Videoprah is an award-winning, full-service
                                production company specializing.</p>
                            <a href="#" class="read__more">Read more <span class="arrow_right"></span></a>
                        </div>
                    </div>
                    
                    <div class="col-lg-2 col-md-3 col-sm-3">
                        <div class="footer__option__item">
                            <h5>Who we are</h5>
                            <ul>
                                <li><a href="#">Team</a></li>
                                <li><a href="#">Carrers</a></li>
                                <li><a href="#">Contact us</a></li>
                                <li><a href="#">Locations</a></li>
                            </ul>
                        </div>
                    </div>
                    
                    <div class="col-lg-2 col-md-3 col-sm-3">
                        <div class="footer__option__item">
                            <h5>Our work</h5>
                            <ul>
                                <li><a href="#">Feature</a></li>
                                <li><a href="#">Latest</a></li>
                                <li><a href="#">Browse Archive</a></li>
                                <li><a href="#">Video for web</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12">
                        <div class="footer__option__item">
                            <h5>Newsletter</h5>
                            <p>Videoprah is an award-winning, full-service production company specializing.</p>
                            <form action="#">
                                <input type="text" placeholder="Email">
                                <button type="submit"><i class="fa fa-send"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </footer>

    <style>
        /* --- Footer Section Styles (White and Red Theme) --- */
.footer {
    background-color: #ffffff; /* White background for the footer */
    padding: 70px 0 30px;
    color: #6c757d; /* Dark grey text for general content */
    border-top: 1px solid #e9ecef; /* Subtle top border */
}

.footer__top {
    border-bottom: 1px solid #e9ecef; /* Light grey separator line below logo and social */
    padding-bottom: 30px;
    margin-bottom: 40px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
}

.footer__top__logo img {
    max-width: 150px;
    height: auto;
    /* If your logo is dark, you might not need filter: brightness(0) invert(1);
       If it's light and needs to be dark on a white background, you might use:
       filter: brightness(0); */
}

.footer__top__social {
    text-align: right;
}

.footer__top__social a {
    display: inline-block;
    height: 40px;
    width: 40px;
    background-color: #f8f9fa; /* Very light grey background for icons */
    font-size: 16px;
    color: #6c757d; /* Dark grey icon color */
    line-height: 40px;
    text-align: center;
    border-radius: 50%;
    margin-left: 10px;
    transition: all 0.3s ease;
    border: 1px solid #dee2e6; /* Light border for icons */
}

.footer__top__social a:hover {
    background-color: #dc3545; /* Red hover for social icons */
    color: #ffffff; /* White icon on hover */
    transform: translateY(-3px);
    border-color: #dc3545; /* Red border on hover */
}

.footer__option {
    margin-bottom: 50px;
}

.footer__option__item {
    margin-bottom: 30px;
}

.footer__option__item h5 {
    color: #343a40; /* Dark heading text */
    font-size: 20px;
    font-weight: 600;
    margin-bottom: 25px;
    position: relative;
    padding-bottom: 10px;
}

.footer__option__item h5::after {
    content: '';
    position: absolute;
    left: 0;
    bottom: 0;
    height: 2px;
    width: 40px;
    background-color: #dc3545; /* Red underline */
}

.footer__option__item p {
    font-size: 15px;
    line-height: 25px;
    margin-bottom: 20px;
    color: #6c757d; /* Dark grey text */
}

.footer__option__item ul {
    list-style: none;
    padding: 0;
    margin: 0;
}

.footer__option__item ul li {
    margin-bottom: 10px;
}

.footer__option__item ul li:last-child {
    margin-bottom: 0;
}

.footer__option__item ul li a {
    color: #6c757d; /* Dark grey for links */
    font-size: 15px;
    transition: all 0.3s ease;
    text-decoration: none;
}

.footer__option__item ul li a:hover {
    color: #dc3545; /* Red hover for links */
}

.read__more {
    font-size: 15px;
    color: #343a40; /* Dark text for read more */
    font-weight: 500;
    text-decoration: none;
    transition: all 0.3s ease;
}

.read__more:hover {
    color: #dc3545; /* Red hover for read more */
}

.read__more .arrow_right {
    position: relative;
    top: 1px;
    margin-left: 5px;
    /* Ensure you have an icon for arrow_right, e.g., <i class="fa fa-angle-right"></i> */
}

/* Newsletter Form */
.footer__option__item form {
    position: relative;
}

.footer__option__item form input {
    width: 100%;
    height: 50px;
    border: 1px solid #dee2e6; /* Light border for input field */
    background-color: #f8f9fa; /* Very light grey background for input */
    color: #343a40; /* Dark text for input */
    padding-left: 20px;
    border-radius: 8px;
    font-size: 15px;
    outline: none;
}

.footer__option__item form input::placeholder {
    color: #adb5bd; /* Lighter grey placeholder text color */
}

.footer__option__item form button {
    position: absolute;
    right: 0;
    top: 0;
    height: 50px;
    width: 50px;
    background-color: #dc3545; /* Red button */
    border: none;
    color: #ffffff; /* White icon on button */
    font-size: 18px;
    border-radius: 0 8px 8px 0;
    cursor: pointer;
    transition: all 0.3s ease;
}

.footer__option__item form button:hover {
    background-color: #c82333; /* Darker red on hover */
}

/* Copyright Section */
.footer__copyright {
    padding-top: 30px;
    border-top: 1px solid #e9ecef; /* Light grey separator line above copyright */
}

.footer__copyright__text {
    font-size: 15px;
    color: #6c757d; /* Dark grey copyright text */
    line-height: 25px;
    text-align: center;
}

.footer__copyright__text a {
    color: #dc3545; /* Red link for Colorlib */
    text-decoration: none;
    transition: all 0.3s ease;
}

.footer__copyright__text a:hover {
    color: #343a40; /* Dark grey hover for Colorlib link */
}

.footer__copyright__text i {
    color: #dc3545; /* Red heart icon */
    margin: 0 5px;
}

/* --- Responsive Adjustments (using Bootstrap's breakpoints as a guide) --- */
@media (max-width: 991px) { /* Medium devices (tablets) */
    .footer__top {
        flex-direction: column;
        text-align: center;
    }
    .footer__top__logo {
        margin-bottom: 20px;
    }
    .footer__top__social {
        width: 100%;
        text-align: center;
    }
    .footer__option__item {
        text-align: center;
    }
    .footer__option__item h5::after {
        left: 50%;
        transform: translateX(-50%);
    }
}

@media (max-width: 767px) { /* Small devices (phones) */
    .footer {
        padding: 50px 0 20px;
    }
    .footer__top {
        padding-bottom: 20px;
        margin-bottom: 30px;
    }
    .footer__option {
        margin-bottom: 30px;
    }
    .footer__copyright {
        padding-top: 20px;
    }
    .footer__copyright__text {
        font-size: 14px;
    }
    .footer__option__item h5 {
        font-size: 18px;
        margin-bottom: 20px;
    }
    .footer__option__item p,
    .footer__option__item ul li a,
    .read__more {
        font-size: 14px;
    }
}
    </style>