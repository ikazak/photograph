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
    
    <!-- Header End -->

    <!-- Breadcrumb Begin -->
    

    <?php
    // PHP data for packages (you'd typically fetch this from a database)
    $packages = [
        [
            'name' => 'Prenup Ruby',
            'promo' => '0025 (Popular) PROMO',
            'package_price' => '9,000.00',
            'regular_price' => '9,999.00',
            'downpayment' => '2,700.00',
            'inclusions' => [
                '3-hour session with the couple',
                '3-setup and up to 6 outfit changes',
                '2 Basic or Classic theme 1 Deluxe theme',
                '50 enhanced photos',
                '8pcs 5R (No frame)...'
            ]
        ],
        [
            'name' => 'Prenup Sapphire',
            'promo' => '0025 PROMO',
            'package_price' => '23,500.00',
            'regular_price' => '26,999.00',
            'downpayment' => '7,050.00',
            'inclusions' => [
                '6-hour session with the couple',
                '3-setup and up to unlimited outfit changes.',
                'Choose from any of our studio themes any Basic or Classic theme up to 2 Deluxe theme',
                'Save-the-video date...'
            ]
        ],
        [
            'name' => 'Prenup Adorable',
            'promo' => '', // No specific promo mentioned in the image for this one
            'package_price' => '6,000.00',
            'regular_price' => '', // No regular price mentioned
            'downpayment' => '1,800.00',
            'inclusions' => [
                '2-hour session with the couple',
                '2-setup and 2 outfit changes',
                'Free use of Cimmaroon Studio',
                '30 enhanced photos',
                'downloadable online'
            ],
            'usage_note' => 'Usage of Cimmaroon Studio',
            'usage_details' => [
                'Use of basic and classic...'
            ]
        ]
    ];
    ?>
    

    <div class="container content-section">
    
        <div class="row">
            <div class="col-lg-5 left-column">
                <h1 class="content-heading">Prenup Packages</h1>
                <p class="mb-4">
                    Love is in the air! Capture the magic of your prenuptial journey with PPhotography, your go-to prenup
                    photographer in Sipalay City. From dreamy engagement photoshoots to breathtaking prenup sessions, we
                    specialize in capturing the essence of your love and turning it into timeless art.
                </p>
                <p class="mb-5">
                    As your trusted wedding photographers in Sipalay City, we know your prenup photoshoot is more than stunning
                    images. It's about celebrating your love, capturing your excitement, and preserving memories of this particular
                    time. We focus on creating an enjoyable, stress-free experience, allowing you to savor every moment with
                    your partner.
                </p>

                
            </div>

            <div class="col-lg-7">
                <ul class="nav nav-tabs mb-4" id="packageTabs" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active" id="prenup-tab" data-bs-toggle="tab" href="#prenup" role="tab" aria-controls="prenup" aria-selected="true">Prenup</a>
                    </li>
                    </ul>

                <div class="tab-content" id="packageTabContent">
                    <div class="tab-pane fade show active" id="prenup" role="tabpanel" aria-labelledby="prenup-tab">
                        <div class="row">
                            <?php foreach ($packages as $package): ?>
                                <div class="col-md-6 col-lg-4">
                                    <div class="package-card">
                                        <h5><?= htmlspecialchars($package['name']) ?> <span class="text-muted small"><?= htmlspecialchars($package['promo']) ?></span></h5>

                                        <div class="price-details text-center">
                                            <p class="mb-0">PACKAGE PRICE</p>
                                            <p class="package-price mb-0">₱<?= htmlspecialchars($package['package_price']) ?></p>
                                            <?php if (!empty($package['regular_price'])): ?>
                                                <p class="regular-price mb-0">REGULAR PRICE: ₱<?= htmlspecialchars($package['regular_price']) ?></p>
                                            <?php endif; ?>
                                        </div>

                                        <p class="downpayment">DOWNPAYMENT: ₱<?= htmlspecialchars($package['downpayment']) ?></p>

                                        <h6 class="text-uppercase fw-bold small text-muted mb-3">PACKAGE DETAILS & INCLUSIONS</h6>
                                        <div class="package-details">
                                            <ul>
                                                <?php foreach ($package['inclusions'] as $inclusion): ?>
                                                    <li><?= htmlspecialchars($inclusion) ?></li>
                                                <?php endforeach; ?>
                                            </ul>
                                        </div>

                                        <?php if (isset($package['usage_note'])): ?>
                                            <h6 class="text-uppercase fw-bold small text-muted mb-2"><?= htmlspecialchars($package['usage_note']) ?></h6>
                                            <div class="package-details mb-3">
                                                <ul>
                                                    <?php foreach ($package['usage_details'] as $detail): ?>
                                                        <li><?= htmlspecialchars($detail) ?></li>
                                                    <?php endforeach; ?>
                                                </ul>
                                            </div>
                                        <?php endif; ?>

                                        <a href="#" class="read-more d-block mb-3">Read more</a>
                                        <a href="<?=page('wedexx.php')?>"><button class="btn btn-book">Book</button></a>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="package-inclusion-section">
        <div class="container">
            <h2 class="package-inclusion-heading">Package Inclusion</h2>

            <div class="row justify-content-center">
                <div class="col-lg-4 col-md-6">
                    <div class="inclusion-item">
                        <h6>Premium photo and video coverage of your wedding</h6>
                        <p>
                            We’ll capture every stolen glance, every heartfelt vow,
                            and every blissful moment on your special day.
                        </p>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="inclusion-item">
                        <h6>Creative and professional wedding highlights</h6>
                        <p>
                            Our talented photographers and videographers will
                            craft a visual masterpiece that captures your union’s
                            emotion, beauty, and joy.
                        </p>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="inclusion-item">
                        <h6>Professionally edited wedding photos</h6>
                        <p>
                            From elegant portraits to candid moments, we’ll
                            ensure that every image reflects the love and
                            happiness within.
                        </p>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="inclusion-item">
                        <h6>Every significant and candid moment captured</h6>
                        <p>
                            We’ll capture every poignant and candid moment,
                            from the grandest gestures to the most intimate
                            exchanges.
                        </p>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="inclusion-item">
                        <h6>Stunning Same-day edit of your wedding</h6>
                        <p>
                            Depending on your package, we’ll work our editing
                            magic and present you with a breathtaking highlight
                            reel that will leave you and your guests in awe.
                        </p>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="inclusion-item">
                        <h6>Dedicated client support and consultation</h6>
                        <p>
                            Our team is here to guide you through every step,
                            from planning to delivery, ensuring a seamless and
                            enjoyable experience.
                        </p>
                    </div>
                </div>
                </div>
        </div>
    </section>
    



    <?=include_page('landing/foot')?>
    <!-- Footer Section End -->

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
        .package-inclusion-section {
            padding: 80px 0; /* Top and bottom padding for the section */
            background-color: #fff; /* White background for the content block */
            box-shadow: 0 0 15px rgba(0,0,0,0.05); /* Subtle shadow around the whole block */
            margin-bottom: 40px; /* Space below the section if other content follows */
        }

        .package-inclusion-heading {
            font-size: 2.5rem;
            font-weight: 700;
            color: #333;
            text-align: center;
            margin-bottom: 60px; /* Space below the main heading */
            text-transform: uppercase; /* As seen in the image */
            letter-spacing: 1px;
        }

        .inclusion-item {
            margin-bottom: 40px; /* Space between rows of items */
        }

        .inclusion-item h6 {
            font-size: 1.15rem; /* Slightly larger and bolder for titles */
            font-weight: 600;
            color: #333;
            margin-bottom: 10px;
        }

        .inclusion-item p {
            font-size: 1rem;
            line-height: 1.6;
            color: #555;
        }

        /* Responsive Adjustments */
        @media (max-width: 992px) {
            .package-inclusion-heading {
                font-size: 2rem;
                margin-bottom: 40px;
            }
            .inclusion-item {
                margin-bottom: 30px; /* Adjust spacing for smaller screens */
            }
        }

        @media (max-width: 768px) {
            .package-inclusion-section {
                padding: 60px 0;
            }
        }
            .package-inclusion-heading {
                font-size: 1.8rem;
                margin-bottom: 30px;
            }
            .inclusion-item h6 {
                font-size: 1.1rem;
            }
            .inclusion-item p {
                font-size: 0.95rem;
            }
    
        /* Custom CSS for styling, adjust as needed */
        body {
            background-color: #f8f8f8; /* Light background as in the image */
        }
        .content-section {
            padding-top: 40px;
            padding-bottom: 40px;
        }
        .left-column {
            padding-right: 30px; /* Spacing between left and right columns */
        }
        .package-card {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.05);
            padding: 25px;
            margin-bottom: 30px;
            border: 1px solid #eee; /* Subtle border */
        }
        .package-card h5 {
            font-weight: bold;
            color: #333;
            margin-bottom: 15px;
        }
        .price-details {
            background-color: #fdf8ed; /* Light yellow background for prices */
            padding: 15px;
            border-radius: 5px;
            margin-bottom: 20px;
        }
        .price-details .regular-price {
            font-size: 0.9em;
            text-decoration: line-through;
            color: #888;
        }
        .price-details .package-price {
            font-size: 1.8em;
            font-weight: bold;
            color: #e49b00; /* A gold/orange color similar to the image */
        }
        .downpayment {
            font-size: 1.1em;
            margin-bottom: 20px;
        }
        .package-details ul {
            list-style: none;
            padding-left: 0;
            margin-bottom: 20px;
        }
        .package-details ul li {
            margin-bottom: 8px;
            color: #555;
        }
        .package-details ul li::before {
            content: "• "; /* Bullet point */
            color: #e49b00; /* Gold/orange color for bullets */
            font-weight: bold;
            display: inline-block;
            width: 1em;
            margin-left: -1em;
        }
        .read-more {
            color: #e49b00;
            text-decoration: none;
            font-weight: 500;
        }
        .btn-book {
            background-color: #e49b00;
            color: white;
            border: none;
            padding: 10px 25px;
            border-radius: 5px;
            font-weight: bold;
            width: 100%; /* Full width button */
        }
        .btn-book:hover {
            background-color: #d48c00; /* Slightly darker on hover */
            color: white;
        }
        .btn-view-all {
            background-color: #e49b00;
            color: white;
            border: none;
            padding: 10px 30px;
            border-radius: 5px;
            font-weight: bold;
        }
        .btn-view-all:hover {
            background-color: #d48c00;
            color: white;
        }
        .location-select-group {
            background-color: #fff; /* White background for select box */
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.05);
        }
        .nav-tabs .nav-link.active {
            color: #e49b00;
            border-color: #e49b00 #e49b00 #fff; /* Active tab border */
            background-color: #fff;
        }
        .nav-tabs .nav-link {
            color: #888;
            border: 1px solid transparent;
            border-top-left-radius: 0.25rem;
            border-top-right-radius: 0.25rem;
            padding: 0.5rem 1rem;
        }
        .nav-tabs {
            border-bottom: 1px solid #e49b00; /* Underline for tabs */
            margin-bottom: 20px;
        }
        .content-heading {
            font-size: 2.5em;
            font-weight: bold;
            color: #333;
            margin-bottom: 25px;
        }
    </style>