<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Themed Event Photo Gallery</title>
    <!-- Load Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

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
        /* Custom styles for the orange theme and font */
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap');
        
        :root {
            /* Using a bright, vibrant orange */
            --color-primary: #FF8C00; /* Dark Orange for accent */
        }
        
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f8f8f8; /* Off-white background */
        }

        .tab-btn.active {
            color: var(--color-primary);
            border-color: var(--color-primary);
            font-weight: 600;
        }

        .tab-btn:hover:not(.active) {
            color: #ffb74d; /* Lighter orange on hover */
        }

        /* Styling for the See More button using the theme colors */
        .see-more-btn {
            background-color: var(--color-primary);
            color: black;
            font-weight: 600;
            border: 2px solid black;
        }
        .see-more-btn:hover {
            background-color: #ffb74d; /* Lighter orange */
        }

        /* Define transition properties for animated items */
        .gallery-item {
            /* Set the base transition duration for the opacity and transform properties */
            transition: opacity 0.5s ease-in-out, transform 0.5s ease-in-out;
        }
    </style>
</head>
<body class="min-h-screen p-4 md:p-8">
<div class="container" style="border-bottom: solid 1px black; margin-bottom: 10px;">
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
    <div class="max-w-6xl mx-auto bg-white shadow-2xl rounded-xl p-4 sm:p-8">
        
        <!-- Header with Profile Photo and Back Button -->
        <header class="hero-section">

            <!-- Back Button (Top Left) -->
            <a href="<?=page('portfolio.php')?>"><button onclick="history.back()" 
                    title="Go Back"
                    class="absolute top-0 left-0 md:top-2 md:left-4 p-2 text-gray-700 hover:text-orange-500 transition duration-150 rounded-full hover:bg-gray-100 z-10">
                <!-- SVG for Left Arrow (Lucide/Heroicons Style) -->
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
            </button></a>

            <!-- Centered Content -->
          <img src="<?=assets()?>/phograph/img/hero/hero-1.jpg"
             alt="Couple in elegant attire on a sofa"
             class="hero-image"
             onerror="this.onerror=null;this.src='https://placehold.co/1920x1080/f0f0f0/cccccc?text=Image+Load+Error';">

        <div class="hero-overlay-text">
            <h1>Gallery</h1>
        </div>
        </header>

        <!-- Tab Navigation -->
        <nav class="flex justify-center border-b border-gray-200 mb-8">
            <button id="wedding-tab" class="tab-btn py-3 px-6 text-lg transition duration-200 ease-in-out border-b-2 border-transparent text-gray-500 active" onclick="showTab('wedding')">
                Wedding
            </button>
            <button id="birthday-tab" class="tab-btn py-3 px-6 text-lg transition duration-200 ease-in-out border-b-2 border-transparent text-gray-500" onclick="showTab('birthday')">
                Birthday
            </button>
            <button id="graduation-tab" class="tab-btn py-3 px-6 text-lg transition duration-200 ease-in-out border-b-2 border-transparent text-gray-500" onclick="showTab('graduation')">
                Graduation
            </button>
            <button id="event-tab" class="tab-btn py-3 px-6 text-lg transition duration-200 ease-in-out border-b-2 border-transparent text-gray-500" onclick="showTab('event')">
                General Events
            </button>
        </nav>

        <!-- Tab Content -->
        <div id="gallery-content">

            <!-- Wedding Tab Content -->
            <div id="wedding" class="tab-pane grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 animate-fadeIn">
                <h2 class="col-span-full text-2xl font-semibold mb-4 text-gray-800">Wedding Memories</h2>
                
                <!-- Gallery Items (First 3 are always visible) -->
                <div class="gallery-item rounded-lg overflow-hidden shadow-lg transform hover:scale-[1.02] transition duration-300">
                    <img src="https://placehold.co/600x400/000000/FF8C00?text=Ceremony+Vows" alt="Wedding Ceremony Image" class="w-full h-auto object-cover cursor-pointer" onclick="openModal(this)">
                    <p class="p-3 bg-gray-50 text-gray-700 text-sm">The heartfelt "I do's" under soft light.</p>
                </div>
                <div class="gallery-item rounded-lg overflow-hidden shadow-lg transform hover:scale-[1.02] transition duration-300">
                    <img src="https://placehold.co/600x400/FFFFFF/000000?text=First+Dance" alt="First Dance Image" class="w-full h-auto object-cover cursor-pointer" onclick="openModal(this)">
                    <p class="p-3 bg-gray-50 text-gray-700 text-sm">A timeless first dance moment.</p>
                </div>
                <div class="gallery-item rounded-lg overflow-hidden shadow-lg transform hover:scale-[1.02] transition duration-300">
                    <img src="https://placehold.co/600x400/FF8C00/000000?text=Bridal+Party" alt="Bridal Party Image" class="w-full h-auto object-cover cursor-pointer" onclick="openModal(this)">
                    <p class="p-3 bg-gray-50 text-gray-700 text-sm">A joyful toast with the wedding party.</p>
                </div>
                
                <!-- Hidden Images (Initial state: hidden, transparent, and slightly offset) -->
                <div class="gallery-item rounded-lg overflow-hidden shadow-lg transform hover:scale-[1.02] duration-300 hidden opacity-0 translate-y-4">
                    <img src="https://placehold.co/600x400/000000/FFFFFF?text=Cake+Cutting" alt="Wedding Cake Cutting Image" class="w-full h-auto object-cover cursor-pointer" onclick="openModal(this)">
                    <p class="p-3 bg-gray-50 text-gray-700 text-sm">The celebratory moment of cutting the cake.</p>
                </div>
                <div class="gallery-item rounded-lg overflow-hidden shadow-lg transform hover:scale-[1.02] duration-300 hidden opacity-0 translate-y-4">
                    <img src="https://placehold.co/600x400/FFFFFF/FF8C00?text=Rings+Detail" alt="Wedding Rings Detail Image" class="w-full h-auto object-cover cursor-pointer" onclick="openModal(this)">
                    <p class="p-3 bg-gray-50 text-gray-700 text-sm">Close-up detail of the wedding bands.</p>
                </div>
                <div class="gallery-item rounded-lg overflow-hidden shadow-lg transform hover:scale-[1.02] duration-300 hidden opacity-0 translate-y-4">
                    <img src="https://placehold.co/600x400/FF8C00/000000?text=Sunset+Portrait" alt="Wedding Sunset Portrait Image" class="w-full h-auto object-cover cursor-pointer" onclick="openModal(this)">
                    <p class="p-3 bg-gray-50 text-gray-700 text-sm">A romantic portrait captured at sunset.</p>
                </div>

                <!-- See More Button Container - Aligned to the right -->
                <div class="col-span-full text-right mt-6" id="wedding-btn-container">
                    <button id="wedding-see-more-btn" onclick="toggleSeeMore('wedding')" class="see-more-btn px-8 py-3 rounded-full transition duration-300 transform hover:scale-105 shadow-md">
                        See More Images
                    </button>
                </div>
            </div>

            <!-- Birthday Tab Content -->
            <div id="birthday" class="tab-pane grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 hidden animate-fadeIn">
                <h2 class="col-span-full text-2xl font-semibold mb-4 text-gray-800">Birthday Celebrations</h2>
                
                <!-- Gallery Items -->
                <div class="gallery-item rounded-lg overflow-hidden shadow-lg transform hover:scale-[1.02] transition duration-300">
                    <img src="https://placehold.co/600x400/FF8C00/000000?text=Cake+and+Candles" alt="Birthday Cake Image" class="w-full h-auto object-cover cursor-pointer" onclick="openModal(this)">
                    <p class="p-3 bg-gray-50 text-gray-700 text-sm">Making a wish before blowing out the candles.</p>
                </div>
                <div class="gallery-item rounded-lg overflow-hidden shadow-lg transform hover:scale-[1.02] transition duration-300">
                    <img src="https://placehold.co/600x400/000000/FF8C00?text=Present+Opening" alt="Present Opening Image" class="w-full h-auto object-cover cursor-pointer" onclick="openModal(this)">
                    <p class="p-3 bg-gray-50 text-gray-700 text-sm">Excited moments opening gifts.</p>
                </div>
                <div class="gallery-item rounded-lg overflow-hidden shadow-lg transform hover:scale-[1.02] transition duration-300">
                    <img src="https://placehold.co/600x400/FFFFFF/000000?text=Party+Atmosphere" alt="Party Atmosphere Image" class="w-full h-auto object-cover cursor-pointer" onclick="openModal(this)">
                    <p class="p-3 bg-gray-50 text-gray-700 text-sm">Friends and family gathered for the celebration.</p>
                </div>
                
                <!-- Hidden Images (Initial state: hidden, transparent, and slightly offset) -->
                <div class="gallery-item rounded-lg overflow-hidden shadow-lg transform hover:scale-[1.02] duration-300 hidden opacity-0 translate-y-4">
                    <img src="https://placehold.co/600x400/000000/FFFFFF?text=Decorations" alt="Birthday Decorations Image" class="w-full h-auto object-cover cursor-pointer" onclick="openModal(this)">
                    <p class="p-3 bg-gray-50 text-gray-700 text-sm">Bright balloons and themed decorations.</p>
                </div>
                <div class="gallery-item rounded-lg overflow-hidden shadow-lg transform hover:scale-[1.02] duration-300 hidden opacity-0 translate-y-4">
                    <img src="https://placehold.co/600x400/FF8C00/000000?text=Games+and+Fun" alt="Birthday Games Image" class="w-full h-auto object-cover cursor-pointer" onclick="openModal(this)">
                    <p class="p-3 bg-gray-50 text-gray-700 text-sm">Action shots from party games.</p>
                </div>
                <div class="gallery-item rounded-lg overflow-hidden shadow-lg transform hover:scale-[1.02] duration-300 hidden opacity-0 translate-y-4">
                    <img src="https://placehold.co/600x400/FFFFFF/000000?text=Themed+Cocktails" alt="Themed Cocktails Image" class="w-full h-auto object-cover cursor-pointer" onclick="openModal(this)">
                    <p class="p-3 bg-gray-50 text-gray-700 text-sm">Signature drinks for the celebration.</p>
                </div>

                <!-- See More Button Container - Aligned to the right -->
                <div class="col-span-full text-right mt-6" id="birthday-btn-container">
                    <button id="birthday-see-more-btn" onclick="toggleSeeMore('birthday')" class="see-more-btn px-8 py-3 rounded-full transition duration-300 transform hover:scale-105 shadow-md">
                        See More Images
                    </button>
                </div>
            </div>

            <!-- Graduation Tab Content -->
            <div id="graduation" class="tab-pane grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 hidden animate-fadeIn">
                <h2 class="col-span-full text-2xl font-semibold mb-4 text-gray-800">Graduation Day</h2>

                <!-- Gallery Items -->
                <div class="gallery-item rounded-lg overflow-hidden shadow-lg transform hover:scale-[1.02] transition duration-300">
                    <img src="https://placehold.co/600x400/FFFFFF/000000?text=Diploma+Moment" alt="Diploma Handover Image" class="w-full h-auto object-cover cursor-pointer" onclick="openModal(this)">
                    <p class="p-3 bg-gray-50 text-gray-700 text-sm">Walking across the stage to receive the diploma.</p>
                </div>
                <div class="gallery-item rounded-lg overflow-hidden shadow-lg transform hover:scale-[1.02] transition duration-300">
                    <img src="https://placehold.co/600x400/FF8C00/000000?text=Cap+Toss" alt="Cap Toss Image" class="w-full h-auto object-cover cursor-pointer" onclick="openModal(this)">
                    <p class="p-3 bg-gray-50 text-gray-700 text-sm">The celebratory cap toss into the air.</p>
                </div>
                <div class="gallery-item rounded-lg overflow-hidden shadow-lg transform hover:scale-[1.02] transition duration-300">
                    <img src="https://placehold.co/600x400/000000/FF8C00?text=Family+Photo" alt="Graduation Family Photo Image" class="w-full h-auto object-cover cursor-pointer" onclick="openModal(this)">
                    <p class="p-3 bg-gray-50 text-gray-700 text-sm">A proud moment with supportive family.</p>
                </div>
                
                <!-- Hidden Images (Initial state: hidden, transparent, and slightly offset) -->
                <div class="gallery-item rounded-lg overflow-hidden shadow-lg transform hover:scale-[1.02] duration-300 hidden opacity-0 translate-y-4">
                    <img src="https://placehold.co/600x400/FFFFFF/000000?text=Campus+Walk" alt="Campus Walk Image" class="w-full h-auto object-cover cursor-pointer" onclick="openModal(this)">
                    <p class="p-3 bg-gray-50 text-gray-700 text-sm">Reflective moment walking through campus.</p>
                </div>
                <div class="gallery-item rounded-lg overflow-hidden shadow-lg transform hover:scale-[1.02] duration-300 hidden opacity-0 translate-y-4">
                    <img src="https://placehold.co/600x400/FF8C00/FFFFFF?text=Celebration+Dinner" alt="Celebration Dinner Image" class="w-full h-auto object-cover cursor-pointer" onclick="openModal(this)">
                    <p class="p-3 bg-gray-50 text-gray-700 text-sm">Toasting success at the dinner celebration.</p>
                </div>
                <div class="gallery-item rounded-lg overflow-hidden shadow-lg transform hover:scale-[1.02] duration-300 hidden opacity-0 translate-y-4">
                    <img src="https://placehold.co/600x400/000000/FF8C00?text=Group+Photo" alt="Graduation Group Photo Image" class="w-full h-auto object-cover cursor-pointer" onclick="openModal(this)">
                    <p class="p-3 bg-gray-50 text-gray-700 text-sm">The entire graduating class celebrating.</p>
                </div>

                <!-- See More Button Container - Aligned to the right -->
                <div class="col-span-full text-right mt-6" id="graduation-btn-container">
                    <button id="graduation-see-more-btn" onclick="toggleSeeMore('graduation')" class="see-more-btn px-8 py-3 rounded-full transition duration-300 transform hover:scale-105 shadow-md">
                        See More Images
                    </button>
                </div>
            </div>
            
            <!-- General Event Tab Content -->
            <div id="event" class="tab-pane grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 hidden animate-fadeIn">
                <h2 class="col-span-full text-2xl font-semibold mb-4 text-gray-800">General Events & Gatherings</h2>

                <!-- Gallery Items -->
                <div class="gallery-item rounded-lg overflow-hidden shadow-lg transform hover:scale-[1.02] transition duration-300">
                    <img src="https://placehold.co/600x400/000000/FFFFFF?text=Corporate+Gala" alt="Corporate Gala Event Image" class="w-full h-auto object-cover cursor-pointer" onclick="openModal(this)">
                    <p class="p-3 bg-gray-50 text-gray-700 text-sm">A formal evening gala with stylish decor.</p>
                </div>
                <div class="gallery-item rounded-lg overflow-hidden shadow-lg transform hover:scale-[1.02] transition duration-300">
                    <img src="https://placehold.co/600x400/FF8C00/000000?text=Holiday+Party" alt="Holiday Party Image" class="w-full h-auto object-cover cursor-pointer" onclick="openModal(this)">
                    <p class="p-3 bg-gray-50 text-gray-700 text-sm">Festive scenes from a recent holiday gathering.</p>
                </div>
                <div class="gallery-item rounded-lg overflow-hidden shadow-lg transform hover:scale-[1.02] transition duration-300">
                    <img src="https://placehold.co/600x400/FFFFFF/000000?text=Anniversary" alt="Anniversary Celebration Image" class="w-full h-auto object-cover cursor-pointer" onclick="openModal(this)">
                    <p class="p-3 bg-gray-50 text-gray-700 text-sm">Celebrating a milestone anniversary.</p>
                </div>

                <!-- Hidden Images (Initial state: hidden, transparent, and slightly offset) -->
                <div class="gallery-item rounded-lg overflow-hidden shadow-lg transform hover:scale-[1.02] duration-300 hidden opacity-0 translate-y-4">
                    <img src="https://placehold.co/600x400/000000/FF8C00?text=Outdoor+Festival" alt="Outdoor Festival Image" class="w-full h-auto object-cover cursor-pointer" onclick="openModal(this)">
                    <p class="p-3 bg-gray-50 text-gray-700 text-sm">Vibrant moments from an outdoor event.</p>
                </div>
                <div class="gallery-item rounded-lg overflow-hidden shadow-lg transform hover:scale-[1.02] duration-300 hidden opacity-0 translate-y-4">
                    <img src="https://placehold.co/600x400/FF8C00/FFFFFF?text=Product+Launch" alt="Product Launch Image" class="w-full h-auto object-cover cursor-pointer" onclick="openModal(this)">
                    <p class="p-3 bg-gray-50 text-gray-700 text-sm">Highlight reel from a successful product launch.</p>
                </div>
                <div class="gallery-item rounded-lg overflow-hidden shadow-lg transform hover:scale-[1.02] duration-300 hidden opacity-0 translate-y-4">
                    <img src="https://placehold.co/600x400/FFFFFF/000000?text=Fundraiser+Gala" alt="Fundraiser Gala Image" class="w-full h-auto object-cover cursor-pointer" onclick="openModal(this)">
                    <p class="p-3 bg-gray-50 text-gray-700 text-sm">Guests enjoying a charity fundraiser gala.</p>
                </div>

                <!-- See More Button Container - Aligned to the right -->
                <div class="col-span-full text-right mt-6" id="event-btn-container">
                    <button id="event-see-more-btn" onclick="toggleSeeMore('event')" class="see-more-btn px-8 py-3 rounded-full transition duration-300 transform hover:scale-105 shadow-md">
                        See More Images
                    </button>
                </div>
            </div>

        </div>
    </div>

    <!-- Image Modal (Lightbox) -->
    <div id="image-modal" class="fixed inset-0 bg-black bg-opacity-90 z-50 hidden flex justify-center items-center p-4" onclick="closeModal()">
        <div class="relative max-w-5xl max-h-full overflow-hidden" onclick="event.stopPropagation()">
            <!-- The image itself -->
            <img id="modal-image" src="" alt="" class="max-w-full max-h-[90vh] object-contain rounded-lg shadow-2xl">
            
            <!-- Close Button -->
            <button onclick="closeModal()" class="absolute top-4 right-4 text-white text-3xl font-bold bg-gray-800 p-2 rounded-full leading-none transition duration-200 hover:text-red-500 hover:bg-white" style="line-height: 1;">
                &times;
            </button>
            
            <!-- Image Caption -->
            <div id="modal-caption" class="absolute bottom-0 left-0 right-0 bg-black bg-opacity-70 text-white p-3 text-center text-sm rounded-b-lg"></div>
        </div>
    </div>

    <?=include_page('landing/foot')?>

    <!-- JavaScript for Tab and Modal Functionality and Animation -->
    <script>
        const IMAGE_LIMIT = 3;
        const ANIMATION_DURATION_MS = 500;
        const ANIMATION_CLASSES = ['opacity-0', 'translate-y-4'];

        // Function to set the initial hidden/visible state of gallery items and the button
        function initializeGalleryView(tabId) {
            const pane = document.getElementById(tabId);
            const items = pane.querySelectorAll('.gallery-item');
            const seeMoreBtn = document.getElementById(tabId + '-see-more-btn');

            if (items.length > IMAGE_LIMIT) {
                // Show the button and reset its state
                if (seeMoreBtn) {
                    seeMoreBtn.style.display = 'block';
                    seeMoreBtn.textContent = 'See More Images';
                    seeMoreBtn.setAttribute('data-expanded', 'false');
                }

                // Hide and set initial animation state for all items after the limit
                items.forEach((item, index) => {
                    if (index >= IMAGE_LIMIT) {
                        item.classList.add('hidden', ...ANIMATION_CLASSES);
                    } else {
                        // Ensure first 3 are visible and reset from any previous collapse state
                        item.classList.remove('hidden', ...ANIMATION_CLASSES);
                    }
                });
            } else {
                // If there are 3 or fewer items, ensure all are shown and hide the button
                items.forEach(item => item.classList.remove('hidden', ...ANIMATION_CLASSES));
                if(seeMoreBtn) seeMoreBtn.style.display = 'none';
            }
        }

        // Utility function to toggle visibility of tab panes and active state of buttons
        function showTab(tabId) {
            // 1. Hide all panes
            document.querySelectorAll('.tab-pane').forEach(pane => {
                pane.classList.add('hidden');
            });

            // 2. Deactivate all buttons
            document.querySelectorAll('.tab-btn').forEach(btn => {
                btn.classList.remove('active');
            });

            // 3. Show the selected pane with fade-in animation
            const selectedPane = document.getElementById(tabId);
            if (selectedPane) {
                selectedPane.classList.remove('hidden');
                selectedPane.classList.remove('animate-fadeIn'); 
                void selectedPane.offsetWidth; // Trigger reflow
                selectedPane.classList.add('animate-fadeIn');
            }

            // 4. Activate the selected button
            const selectedButton = document.getElementById(tabId + '-tab');
            if (selectedButton) {
                selectedButton.classList.add('active');
            }

            // 5. Initialize gallery view for the newly selected tab
            initializeGalleryView(tabId);
        }
        
        // Function to toggle between 'See More' and 'See Less' with animation
        function toggleSeeMore(tabId) {
            const pane = document.getElementById(tabId);
            const items = pane.querySelectorAll('.gallery-item');
            const seeMoreBtn = document.getElementById(tabId + '-see-more-btn');
            
            const isExpanded = seeMoreBtn.getAttribute('data-expanded') === 'true';

            if (!isExpanded) {
                // --- EXPAND (Show) ---
                items.forEach((item, index) => {
                    if (index >= IMAGE_LIMIT) {
                        // Step 1: Remove 'hidden' immediately so element can transition
                        item.classList.remove('hidden');
                        
                        // Step 2: Animate by removing initial transparent/offset classes
                        // Use a short delay to ensure the 'hidden' removal is processed before transition starts
                        setTimeout(() => {
                            item.classList.remove(...ANIMATION_CLASSES);
                        }, 10); 
                    }
                });
                
                // Update button state and text
                seeMoreBtn.textContent = 'See Less Images';
                seeMoreBtn.setAttribute('data-expanded', 'true');
            } else {
                // --- COLLAPSE (Hide) ---
                // Scroll up first for a smooth user experience
                pane.scrollIntoView({ behavior: 'smooth', block: 'start' });

                items.forEach((item, index) => {
                    if (index >= IMAGE_LIMIT) {
                        // Step 1: Set to hidden state (triggers fade-out/slide-down)
                        item.classList.add(...ANIMATION_CLASSES);
                        
                        // Step 2: Hide completely after transition finishes (to remove space)
                        setTimeout(() => {
                            // Only add 'hidden' if the button state is still collapsed (in case user clicks 'See More' again quickly)
                            if (seeMoreBtn.getAttribute('data-expanded') === 'false') {
                                item.classList.add('hidden');
                            }
                        }, ANIMATION_DURATION_MS);
                    }
                });

                // Update button state and text immediately
                seeMoreBtn.textContent = 'See More Images';
                seeMoreBtn.setAttribute('data-expanded', 'false');
            }
        }

        // Function to open the lightbox modal
        function openModal(imageElement) {
            const modal = document.getElementById('image-modal');
            const modalImage = document.getElementById('modal-image');
            const modalCaption = document.getElementById('modal-caption');

            const captionElement = imageElement.nextElementSibling;
            const captionText = captionElement ? captionElement.textContent : imageElement.alt;
            
            modalImage.src = imageElement.src;
            modalImage.alt = imageElement.alt;
            modalCaption.textContent = captionText;

            modal.classList.remove('hidden');
            document.body.style.overflow = 'hidden'; 
        }

        // Function to close the lightbox modal
        function closeModal() {
            const modal = document.getElementById('image-modal');
            modal.classList.add('hidden');
            document.body.style.overflow = ''; 
        }

        // Add a simple fade-in animation to Tailwind config (for tab switching)
        tailwind.config = {
            theme: {
                extend: {
                    keyframes: {
                        fadeIn: {
                            '0%': { opacity: '0', transform: 'translateY(10px)' },
                            '100%': { opacity: '1', transform: 'translateY(0)' },
                        }
                    },
                    animation: {
                        fadeIn: 'fadeIn 0.5s ease-out',
                    },
                }
            }
        }

        // Initialize by showing the Wedding tab on load
        document.addEventListener('DOMContentLoaded', () => {
            showTab('wedding');
        });
    </script>
</body>
</html>

<style>
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
        }
            .hero-overlay-text h1 {
                font-size: 2.5em; /* Adjust for mobile */
            }
            @media (max-width: 480px) {
            .hero-overlay-text h1 {
                font-size: 1.8em; /* Smaller for very small screens */
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
</style>
