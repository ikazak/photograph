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

    <link rel="stylesheet" href="<?= assets() ?>/phograph/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="<?= assets() ?>/phograph/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="<?= assets() ?>/phograph/css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="<?= assets() ?>/phograph/css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="<?= assets() ?>/phograph/css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="<?= assets() ?>/phograph/css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="<?= assets() ?>/phograph/css/style.css" type="text/css">
    <style>
        /* Custom styles for the orange theme and font */
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap');

        :root {
            /* Using a bright, vibrant orange */
            --color-primary: #FF8C00;
            /* Dark Orange for accent */
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: #f8f8f8;
            /* Off-white background */
        }

        .tab-btn.active {
            color: var(--color-primary);
            border-color: var(--color-primary);
            font-weight: 600;
        }

        .tab-btn:hover:not(.active) {
            color: #ffb74d;
            /* Lighter orange on hover */
        }

        /* Styling for the See More button using the theme colors */
        .see-more-btn {
            background-color: var(--color-primary);
            color: black;
            font-weight: 600;
            border: 2px solid black;
        }

        .see-more-btn:hover {
            background-color: #ffb74d;
            /* Lighter orange */
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
                    <a href="<?= page('home.php') ?>" style="display: flex;vertical-align:middle; justify-content: flex-start; align-items: center;">
                        <img src="<?= assets() ?>/img/logop.jpg" height="50" width="50" alt="Logo">
                        <b style="color:#343a40;font-size:20px;padding-left:10px;">PPhotography</b>
                    </a>
                </div>
            </div>
            <div class="col-lg-10" style=" padding-left:10px; margin:auto;">
                <div class="header__nav__option">
                    <nav class="header__nav__menu mobile-menu">
                        <ul>
                            <li><a id="hm" href="<?= page('home.php') ?>" class="text-dark">Home</a></li>
                            <li><a id="about" href="<?= page('about.php') ?>" class="text-dark">About</a></li>
                            <li><a id="port" href="<?= page('portfolio.php') ?>" class="text-dark">Portfolio</a></li>
                            <li><a id="serv" href="<?= page('services.php') ?>" class="text-dark">Services</a></li>
                            <li><a id="cont" href="<?= page('contact.php') ?>" class="text-dark">Contact</a></li>

                        </ul>
                    </nav>

                    <div class="header__nav__social">
                        <a href="<?= page('services.php') ?>"><i><button class="book btn btn-danger text-white">BOOK NOW</button></i></a>
                        <a href="#"><i></i></a>
                        <a href="#"><i></i></a>
                        <a href="#"><i></i></a>
                        <a href="#"><i></i></a>
                        <a href="<?= page('loginpage.php') ?>"><button class="login btn btn-outline-danger">LOG IN</button></a>

                    </div>
                </div>
            </div>
        </div>

        <div id="mobile-menu-wrap"></div>
    </div>
    <div class="max-w-9xl mx-auto bg-white shadow-2xl rounded-xl p-4 sm:p-8">

        <!-- Header with Profile Photo and Back Button -->
        <header class="hero-section">

            <!-- Back Button (Top Left) -->
            <a href="<?= page('portfolio.php') ?>"><button onclick="history.back()"
                    title="Go Back"
                    class="absolute top-0 left-0 md:top-2 md:left-4 p-2 text-gray-700 hover:text-orange-500 transition duration-150 rounded-full hover:bg-gray-100 z-10">
                    <!-- SVG for Left Arrow (Lucide/Heroicons Style) -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                </button></a>

            <!-- Centered Content -->
            <img src="<?= assets() ?>/phograph/img/hero/hero-1.jpg"
                alt="Couple in elegant attire on a sofa"
                class="hero-image"
                onerror="this.onerror=null;this.src='https://placehold.co/1920x1080/f0f0f0/cccccc?text=Image+Load+Error';">

            <div class="hero-overlay-text">
                <h1>Gallery</h1>
            </div>
        </header>

        <!-- Tab Navigation -->

    </div>


    <div class="gallery-container">
        <div class="tabs">
            <button class="tab-button active" onclick="openTab(event, 'Wedding')">Wedding 💍</button>
            <button class="tab-button" onclick="openTab(event, 'Birthday')">Birthday 🎂</button>
            <button class="tab-button" onclick="openTab(event, 'Graduation')">Graduation 🎓</button>
            <button class="tab-button" onclick="openTab(event, 'Other')">Other Events 🎉</button>
        </div>

        <div id="Wedding" class="tab-content active">
            <div class="photo-grid" id="showwedding">

            </div>
        </div>


        <div id="Birthday" class="tab-content">
            <div id="showbirthday" class="photo-grid">


            </div>
        </div>


        <div id="Graduation" class="tab-content">
            <div id="showgraduation" class="photo-grid">


            </div>
        </div>


        <div id="Other" class="tab-content">
            <div id="showevents" class="photo-grid">
                
            </div>
        </div>
    </div>

    <div id="lightbox" class="lightbox" onclick="closeLightbox()">
        <span class="close-btn">&times;</span>
        <img class="lightbox-content" id="lightbox-img" src="">
        <div id="caption"></div>
    </div>

    <script src="script.js"></script>









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

    <div class="a1">
        <div class="a2">
            <h1>✨ Rate Your Experience</h1>
            <p>Share your story and help others discover amazing photography</p>
        </div>
    </div>

    <div class="b1">
        <div id="id1" class="i1">
            <div class="m2">✓</div>
            <div>Awesome! Your review has been submitted successfully. Thank you for sharing your experience!</div>
        </div>

        <div class="b2">
            <h2 class="c1">
                <span>📝</span>
                Leave Your Review
            </h2>
            <p class="c2">Your honest feedback helps us improve and helps others make informed decisions</p>

            <form id="id2">
                <div class="d1">
                    <label class="d2">⭐ Rate Your Experience</label>
                    <div class="e1">
                        <div class="e2" role="radiogroup" aria-label="star rating">
                            <button type="button" class="e3" data-value="1" aria-label="1 star">★</button>
                            <button type="button" class="e3" data-value="2" aria-label="2 stars">★</button>
                            <button type="button" class="e3" data-value="3" aria-label="3 stars">★</button>
                            <button type="button" class="e3" data-value="4" aria-label="4 stars">★</button>
                            <button type="button" class="e3" data-value="5" aria-label="5 stars">★</button>
                        </div>
                        <div id="id3" class="e4">Tap a star to rate</div>
                    </div>
                </div>

                <div class="d1">
                    <label class="d2">📸 Service Type</label>
                    <div class="f1">
                        <button type="button" class="f2" data-service="Wedding"><span>💒 Wedding</span></button>
                        <button type="button" class="f2" data-service="Portrait"><span>👤 Portrait</span></button>
                        <button type="button" class="f2" data-service="Event"><span>🎉 Event</span></button>
                        <button type="button" class="f2" data-service="Product"><span>📦 Product</span></button>
                        <button type="button" class="f2" data-service="Commercial"><span>💼 Commercial</span></button>
                        <button type="button" class="f2" data-service="Fashion"><span>👗 Fashion</span></button>
                        <button type="button" class="f2" data-service="Real Estate"><span>🏠 Real Estate</span></button>
                        <button type="button" class="f2" data-service="Food"><span>🍽️ Food</span></button>
                        <button type="button" class="f2" data-service="Sports"><span>⚽ Sports</span></button>
                        <button type="button" class="f2" data-service="Family"><span>👨‍👩‍👧‍👦 Family</span></button>
                    </div>
                </div>

                <div class="d1">
                    <label for="id4" class="d2">💬 Tell Us More</label>
                    <textarea
                        id="id4"
                        placeholder="Share the details of your experience... What stood out? What could be improved?"></textarea>
                </div>

                <div class="h1">
                    <div class="namet">
                        <label for="">(optional)</label>
                        <input type="text" id="id_1" placeholder="Enter name:">
                    </div>
                    <div class="h2">
                        <input type="checkbox" id="id5">
                        <label for="id5">🔒 Post anonymously</label>
                    </div>
                    <div class="h3">
                        <button class="h4 j1" id="id6" type="button">Clear</button>
                        <button class="h4" id="id7" type="button">Submit Review</button>
                    </div>
                </div>
            </form>
        </div>

        <div class="b2">
            <div class="k1">
                <h2 class="c1">
                    <span>💬</span>
                    Recent Reviews
                </h2>
                <div class="k2" id="id8">0 Reviews</div>
            </div>
            <div id="id9" class="k3"></div>
        </div>
    </div>





    <?= include_page('landing/foot') ?>

    <!-- JavaScript for Tab and Modal Functionality and Animation -->

    <?= import_packages("datatable", "tyrax", "loading", "ctr", "path", "twal") ?>

    <script>
        let userid = "<?=get('id')?>";
    </script>
    <script>
        addEventListener("DOMContentLoaded", () => {
            LOADING.load(true);

            setTimeout(() => LOADING.load(false), 1000)

        })
    </script>
    <script>
        function displayAllweddings(searchTerm = '') {
            tyrax.get({
                url: "post/get",
                //inspect: true,
                request: {
                    user: localStorage.getItem("id"),
                    category: searchTerm,
                    id : userid
                },
                response: function(send) {
                    if (send.code == 200) {
                        const data = send.data;
                        data.forEach(column => {
                            const imageSrc = column.img || "<?= assets('img/placeholder.png') ?>";

                            DOM.add_html("#showwedding", `

                            <img src="${column.img}" alt="Wedding Photo 1" onclick="openLightbox(this)">

                `);

                        });

                    }
                }
            })
        }

        window.addEventListener("DOMContentLoaded", function() {
            displayAllweddings("wedding")
        });
    </script>


    <script>
        function displayAllbirthday(searchTerm = '') {
            tyrax.get({
                url: "post/get",
                //inspect: true,
                request: {
                    user: localStorage.getItem("id"),
                    category: searchTerm
                },
                response: function(send) {
                    if (send.code == 200) {
                        const data = send.data;
                        data.forEach(column => {
                            const imageSrc = column.img || "<?= assets('img/placeholder.png') ?>";

                            DOM.add_html("#showbirthday", `
                            <img src="${column.img}" alt="Birthday Photo 1" onclick="openLightbox(this)">

                `);

                        });

                    }
                }
            })
        }

        window.addEventListener("DOMContentLoaded", function() {
            displayAllbirthday("birthday")
        });
    </script>




    <script>
        function displayAllgraduation(searchTerm = '') {
            tyrax.get({
                url: "post/get",
                //inspect: true,
                request: {
                    user: localStorage.getItem("id"),
                    category: searchTerm
                },
                response: function(send) {
                    if (send.code == 200) {
                        const data = send.data;
                        data.forEach(column => {
                            const imageSrc = column.img || "<?= assets('img/placeholder.png') ?>";

                            DOM.add_html("#showgraduation", `
                            <img src="${column.img}" alt="Graduation Photo 1" onclick="openLightbox(this)">
                            `);

                        });

                    }
                }
            })
        }

        window.addEventListener("DOMContentLoaded", function() {
            displayAllgraduation("graduation")
        });
    </script>




    <script>
        function displayAllevents(searchTerm = '') {
            tyrax.get({
                url: "post/get",
                //inspect: true,
                request: {
                    user: localStorage.getItem("id"),
                    category: searchTerm
                },
                response: function(send) {
                    if (send.code == 200) {
                        const data = send.data;
                        data.forEach(column => {
                            const imageSrc = column.img || "<?= assets('img/placeholder.png') ?>";

                            DOM.add_html("#showevents", `
                            <img src="${column.img}" alt="Other Event Photo 1" onclick="openLightbox(this)">
                            `);

                        });

                    }
                }
            })
        }

        window.addEventListener("DOMContentLoaded", function() {
            displayAllevents("events")
        });
    </script>





    <script>
        // data store
        const s1 = {
            reviews: [{
                    id: 1,
                    name: 'Maria Santos',
                    rating: 5,
                    service: 'Wedding',
                    text: 'Absolutely phenomenal! The photographer captured every precious moment perfectly. Professional, creative, and the photos exceeded all our expectations!',
                    date: '2025-10-18',
                    anon: false
                },
                {
                    id: 2,
                    name: 'John Cruz',
                    rating: 4,
                    service: 'Event',
                    text: 'Great quality photos with excellent attention to detail. Very professional throughout. Minor delay in delivery but overall very satisfied!',
                    date: '2025-09-15',
                    anon: false
                },
                {
                    id: 3,
                    name: 'Anonymous',
                    rating: 5,
                    service: 'Portrait',
                    text: 'Best portrait session ever! Made me feel so comfortable and the results were stunning. Cannot recommend enough!',
                    date: '2025-09-28',
                    anon: true
                }
            ],
            nextId: 4
        };

        // runtime state
        let s2 = 0; // selected rating
        const s3 = new Set(); // selected tags

        const s4 = {
            1: '😞 We can do better',
            2: '😐 Below expectations',
            3: '😊 Good experience',
            4: '😃 Great experience!',
            5: '🤩 Outstanding!'
        };

        // star elements
        const s5 = document.querySelectorAll('.e3');
        s5.forEach(btn => {
            btn.addEventListener('click', () => {
                s2 = Number(btn.dataset.value);
                document.getElementById('id3').textContent = s4[s2];
                s5.forEach(s => {
                    s.dataset.active = Number(s.dataset.value) <= s2;
                });
            });

            btn.addEventListener('mouseenter', () => {
                const value = Number(btn.dataset.value);
                s5.forEach(s => {
                    const sVal = Number(s.dataset.value);
                    s.style.color = sVal <= value ? 'var(--a1)' : '#ddd';
                });
            });
        });

        document.querySelector('.e2').addEventListener('mouseleave', () => {
            s5.forEach(s => {
                s.style.color = s.dataset.active === 'true' ? 'var(--a1)' : '#ddd';
            });
        });

        // tags
        const s6 = document.querySelectorAll('.f2');
        s6.forEach(tag => {
            tag.addEventListener('click', () => {
                s6.forEach(t => t.classList.remove('g1'));
                s3.clear();
                tag.classList.add('g1');
                s3.add(tag.dataset.service);
            });
        });

        // helper render functions
        function fn1(n) {
            return Array(5).fill(0).map((_, i) => i < n ? '★' : '☆').join('');
        }

        function fn2(s) {
            if (!s) return '';
            const div = document.createElement('div');
            div.textContent = s;
            return div.innerHTML;
        }

        function fn3() {
            const container = document.getElementById('id9');
            const count = document.getElementById('id8');

            count.textContent = `${s1.reviews.length} Review${s1.reviews.length !== 1 ? 's' : ''}`;

            if (!s1.reviews.length) {
                container.innerHTML = `
          <div class="m1">
            <div class="m2">📭</div>
            <h3 style="margin-bottom:12px;font-size:24px">No reviews yet</h3>
            <p>Be the first to share your experience!</p>
          </div>
        `;
                return;
            }

            container.innerHTML = s1.reviews.slice().reverse().map(r => `
        <div class="l1">
          <div class="l2">
            <div>
              <div class="l3">${r.anon ? '🔒 Anonymous User' : fn2(r.name)}</div>
              <div class="l4">
                <span class="l5">${r.service}</span>
                <span>${r.date}</span>
              </div>
            </div>
            <div class="l6">${fn1(r.rating)}</div>
          </div>
          <div class="l7">${fn2(r.text)}</div>
        </div>
      `).join('');
        }

        // submit
        document.getElementById('id7').addEventListener('click', () => {
            const text = document.getElementById('id4').value.trim();
            const anon = document.getElementById('id5').checked;

            if (!s2) {
                alert('⭐ Please select a rating first!');
                return;
            }

            const review = {
                id: s1.nextId++,
                name: anon ? 'Anonymous' : id_1.value,
                rating: s2,
                service: s3.size ? Array.from(s3)[0] : 'General',
                text: text || 'No additional feedback provided',
                date: new Date().toISOString().slice(0, 10),
                anon
            };

            tyrax.post({
                url:"ratings/add",
                request: review,
                inspect:true,
                response: (send) => {
                if (send.code == 300) {
                    twal.err({
                        text: send.message
                    })
                }
                if (send.code == 200) {
                    twal.ok({
                        text: send.message
                    }).then(() => location.reload())
                }
            }
            })

            return;
            s1.reviews.push(review);

            // show success
            const banner = document.getElementById('id1');
            banner.style.display = 'flex';
            setTimeout(() => banner.style.display = 'none', 5000);

            // clear form
            document.getElementById('id4').value = '';
            document.getElementById('id5').checked = false;
            s2 = 0;
            s5.forEach(s => s.dataset.active = false);
            document.getElementById('id3').textContent = 'Tap a star to rate';
            s3.clear();
            s6.forEach(t => t.classList.remove('g1'));

            fn3();

            // smooth scroll
            setTimeout(() => {
                document.querySelector('.k1').scrollIntoView({
                    behavior: 'smooth',
                    block: 'center'
                });
            }, 300);
        });

        // clear
        document.getElementById('id6').addEventListener('click', () => {
            document.getElementById('id4').value = '';
            document.getElementById('id5').checked = false;
            s2 = 0;
            s5.forEach(s => s.dataset.active = false);
            document.getElementById('id3').textContent = 'Tap a star to rate';
            s3.clear();
            s6.forEach(t => t.classList.remove('g1'));
        });

        // initial render
        fn3();
    </script>




    <script>
        function openTab(evt, eventName) {
            var i, tabcontent, tabbuttons;

            // 1. Hide all tab content
            tabcontent = document.getElementsByClassName("tab-content");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }

            // 2. Remove the 'active' class from all buttons
            tabbuttons = document.getElementsByClassName("tab-button");
            for (i = 0; i < tabbuttons.length; i++) {
                tabbuttons[i].classList.remove("active");
            }

            // 3. Show the specific tab content
            document.getElementById(eventName).style.display = "block";

            // 4. Add the 'active' class to the button that opened the tab
            evt.currentTarget.classList.add("active");
        }

        // Set the default tab (Wedding) to be active on load
        document.addEventListener("DOMContentLoaded", function() {
            // Check if the element exists before trying to access its class list
            var defaultTab = document.getElementById("Wedding");
            if (defaultTab) {
                defaultTab.classList.add("active");
            }
        });


        // --- Lightbox Functions ---
        var lightbox = document.getElementById('lightbox');
        var lightboxImg = document.getElementById('lightbox-img');

        // Function to open the lightbox when an image is clicked
        function openLightbox(element) {
            lightbox.style.display = "block";
            // Set the source of the lightbox image to the clicked image's source
            lightboxImg.src = element.src;
        }

        // Function to close the lightbox when the user clicks the close button or outside the image
        function closeLightbox() {
            lightbox.style.display = "none";
        }
    </script>





</body>

</html>

<style>
    .namet{
        margin-bottom: 20px;
        font-size: 10px;
        height: 20px;
        width: 200px;
    }
    
    .gallery-container {
        max-width: 1200px;
        margin: 50px auto;
        padding: 20px;
        background: #fff;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        border-radius: 8px;
    }

    /* Tab Styles */
    .tabs {
        display: flex;
        justify-content: center;
        margin-bottom: 30px;
        border-bottom: 2px solid #ddd;
    }

    .tab-button {
        background-color: transparent;
        border: none;
        padding: 14px 25px;
        cursor: pointer;
        font-size: 1.1em;
        color: #555;
        transition: color 0.3s, border-bottom 0.3s;
        outline: none;
    }

    .tab-button:hover {
        color: #007bff;
    }

    .tab-button.active {
        color: #007bff;
        border-bottom: 3px solid #007bff;
    }

    /* Photo Grid Layout (4 per row) */
    .photo-grid {
        display: grid;
        /* Defines 4 equal columns */
        grid-template-columns: repeat(4, 1fr);
        gap: 15px;
    }

    /* Image Styles and Simple Animation */
    .photo-grid img {
        width: 100%;
        height: 200px;
        /* Fixed height for consistency */
        object-fit: cover;
        cursor: pointer;
        border-radius: 6px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);

        /* Animation: Smooth transition for hover effects */
        transition: transform 0.3s ease, box-shadow 0.3s ease, opacity 0.3s ease;
    }

    /* Hover Animation: Slight scale-up and shadow increase */
    .photo-grid img:hover {
        transform: scale(1.03);
        /* Simple scale animation */
        box-shadow: 0 8px 15px rgba(0, 0, 0, 0.2);
        z-index: 10;
        /* Ensures the scaled image appears above others */
    }

    /* Tab Content Visibility */
    .tab-content {
        display: none;
        /* Optional: Fading animation for content switch */
        animation: fadeIn 0.5s;
    }

    .tab-content.active {
        display: block;
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
        }

        to {
            opacity: 1;
        }
    }

    /* Lightbox/Modal Styles */
    .lightbox {
        display: none;
        /* Hidden by default */
        position: fixed;
        z-index: 100;
        /* Sit on top */
        padding-top: 60px;
        /* Location of the box */
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        /* Enable scroll if needed */
        background-color: rgba(0, 0, 0, 0.9);
        /* Black w/ opacity */
    }

    .lightbox-content {
        margin: auto;
        display: block;
        width: 80%;
        max-width: 700px;
        /* Animation: Zoom effect when opening */
        animation-name: zoom;
        animation-duration: 0.6s;
    }

    @keyframes zoom {
        from {
            transform: scale(0.1)
        }

        to {
            transform: scale(1)
        }
    }

    /* Close button for the lightbox */
    .close-btn {
        position: absolute;
        top: 15px;
        right: 35px;
        color: #f1f1f1;
        font-size: 40px;
        font-weight: bold;
        transition: 0.3s;
        cursor: pointer;
    }

    .close-btn:hover,
    .close-btn:focus {
        color: #bbb;
        text-decoration: none;
        cursor: pointer;
    }

    /* Responsive Design for smaller screens */
    @media screen and (max-width: 800px) {
        .photo-grid {
            /* On medium screens, switch to 2 columns */
            grid-template-columns: repeat(2, 1fr);
        }
    }

    @media screen and (max-width: 500px) {
        .photo-grid {
            /* On small screens, switch to 1 column */
            grid-template-columns: 1fr;
        }

        .lightbox-content {
            width: 90%;
        }
    }







    :root {
        --a1: #c62828;
        --b1: #9b2222;
        --c1: #ff5252;
        --d1: #000000;
        --e1: #ffffff;
        --f1: #6b6b6b;
        --g1: 0 8px 24px rgba(0, 0, 0, 0.12);
        --h1: 16px;
        --i1: 900px;
        font-family: 'Inter', -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
    }

    * {
        box-sizing: border-box;
        margin: 0;
        padding: 0
    }

    /* hero */
    .a1 {
        background: linear-gradient(135deg, var(--b1) 0%, var(--a1) 100%);
        color: var(--e1);
        padding: 60px 20px;
        text-align: center;
        position: relative;
        overflow: hidden;
    }

    .a2::before {
        content: '';
        position: absolute;
        top: -50%;
        right: -50%;
        width: 200%;
        height: 200%;
        background: radial-gradient(circle, rgba(255, 255, 255, 0.1) 0%, transparent 70%);
        animation: pulse 15s ease-in-out infinite;
    }

    @keyframes pulse {

        0%,
        100% {
            transform: scale(1) rotate(0deg)
        }

        50% {
            transform: scale(1.1) rotate(180deg)
        }
    }

    .a2 {
        position: relative;
        z-index: 1
    }

    .a1 h1 {
        font-size: 48px;
        margin-bottom: 12px;
        font-weight: 800;
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2)
    }

    .a1 p {
        font-size: 20px;
        opacity: 0.95;
        font-weight: 300
    }

    .b1 {
        max-width: var(--i1);
        margin: -40px auto 0;
        padding: 0 20px 60px;
        position: relative;
        z-index: 10;
    }

    .b2 {
        background: var(--e1);
        border-radius: var(--h1);
        box-shadow: var(--g1);
        padding: 40px;
        margin-bottom: 30px;
        animation: slideUp 0.5s ease;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .b2:hover {
        transform: translateY(-4px);
        box-shadow: 0 12px 36px rgba(0, 0, 0, 0.15);
    }

    @keyframes slideUp {
        from {
            opacity: 0;
            transform: translateY(30px)
        }

        to {
            opacity: 1;
            transform: translateY(0)
        }
    }

    .c1 {
        font-size: 28px;
        margin-bottom: 10px;
        color: var(--d1);
        font-weight: 700;
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .c2 {
        color: var(--f1);
        font-size: 16px;
        margin-bottom: 32px;
        line-height: 1.5;
    }

    .d1 {
        margin-bottom: 32px;
    }

    .d2 {
        display: block;
        font-weight: 700;
        font-size: 13px;
        color: var(--d1);
        margin-bottom: 12px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .e1 {
        background: linear-gradient(135deg, #fff5f5 0%, #ffe0e0 100%);
        padding: 32px;
        border-radius: 12px;
        text-align: center;
    }

    .e2 {
        display: inline-flex;
        gap: 12px;
        margin-bottom: 16px;
    }

    .e3 {
        background: transparent;
        border: none;
        cursor: pointer;
        font-size: 56px;
        line-height: 1;
        padding: 8px;
        border-radius: 12px;
        transition: all 0.3s cubic-bezier(0.68, -0.55, 0.265, 1.55);
        color: #ddd;
        position: relative;
    }

    .e3:hover {
        transform: scale(1.2) rotate(15deg);
        filter: drop-shadow(0 4px 8px rgba(198, 40, 40, 0.4));
    }

    .e3:active {
        transform: scale(0.95);
    }

    .e3[data-active="true"] {
        color: var(--a1);
        animation: starPop 0.5s ease;
    }

    @keyframes starPop {
        0% {
            transform: scale(1)
        }

        50% {
            transform: scale(1.3) rotate(15deg)
        }

        100% {
            transform: scale(1)
        }
    }

    .e4 {
        font-size: 20px;
        font-weight: 600;
        color: var(--a1);
        min-height: 30px;
    }

    .f1 {
        display: flex;
        gap: 16px;
        flex-wrap: wrap;
    }

    .f2 {
        padding: 16px 28px;
        border-radius: 50px;
        border: 3px solid #e5e5e5;
        font-size: 16px;
        cursor: pointer;
        transition: all 0.3s ease;
        background: var(--e1);
        font-weight: 600;
        position: relative;
        overflow: hidden;
    }

    .f2::before {
        content: '';
        position: absolute;
        top: 50%;
        left: 50%;
        width: 0;
        height: 0;
        border-radius: 50%;
        background: var(--a1);
        transition: all 0.4s ease;
        transform: translate(-50%, -50%);
    }

    .f2:hover {
        border-color: var(--a1);
        transform: translateY(-4px) scale(1.05);
        box-shadow: 0 8px 20px rgba(198, 40, 40, 0.3);
    }

    .f2.g1 {
        color: var(--e1);
        border-color: var(--a1);
        animation: tagSelect 0.4s ease;
    }

    .f2.g1::before {
        width: 300px;
        height: 300px;
    }

    .f2 span {
        position: relative;
        z-index: 1;
    }

    @keyframes tagSelect {
        0% {
            transform: scale(1)
        }

        50% {
            transform: scale(1.1)
        }

        100% {
            transform: scale(1)
        }
    }

    textarea {
        width: 100%;
        min-height: 160px;
        padding: 18px;
        border-radius: 12px;
        border: 3px solid #e5e5e5;
        font-size: 16px;
        font-family: inherit;
        resize: vertical;
        transition: all 0.3s ease;
        background: #fafafa;
    }

    textarea:focus {
        outline: none;
        border-color: var(--a1);
        background: var(--e1);
        box-shadow: 0 0 0 4px rgba(198, 40, 40, 0.1);
        transform: translateY(-2px);
    }

    .h1 {
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        gap: 20px;
        margin-top: 32px;
    }

    .h2 {
        display: flex;
        align-items: center;
        gap: 12px;
        cursor: pointer;
        padding: 12px 20px;
        border-radius: 50px;
        transition: all 0.3s ease;
        background: #f5f5f5;
    }

    .h2:hover {
        background: #e8e8e8;
        transform: translateX(4px);
    }

    .h2 input {
        width: 24px;
        height: 24px;
        cursor: pointer;
        accent-color: var(--a1);
    }

    .h2 label {
        font-size: 15px;
        font-weight: 500;
        cursor: pointer;
    }

    .h3 {
        display: flex;
        gap: 12px;
    }

    .h4 {
        background: var(--a1);
        color: var(--e1);
        border: none;
        padding: 16px 36px;
        border-radius: 50px;
        cursor: pointer;
        font-weight: 700;
        font-size: 16px;
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .h4::before {
        content: '';
        position: absolute;
        top: 50%;
        left: 50%;
        width: 0;
        height: 0;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.3);
        transition: all 0.5s ease;
        transform: translate(-50%, -50%);
    }

    .h4:hover::before {
        width: 300px;
        height: 300px;
    }

    .h4:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 24px rgba(198, 40, 40, 0.4);
    }

    .h4:active {
        transform: translateY(-1px);
    }

    .h4.j1 {
        background: transparent;
        border: 3px solid #ddd;
        color: var(--d1);
    }

    .h4.j1:hover {
        border-color: var(--d1);
        background: #f9f9f9;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    }

    .i1 {
        background: linear-gradient(135deg, #4caf50 0%, #66bb6a 100%);
        color: var(--e1);
        padding: 20px 30px;
        border-radius: 12px;
        margin-bottom: 24px;
        display: none;
        align-items: center;
        gap: 16px;
        font-size: 16px;
        font-weight: 600;
        animation: slideDown 0.4s ease;
        box-shadow: 0 4px 16px rgba(76, 175, 80, 0.3);
    }

    @keyframes slideDown {
        from {
            opacity: 0;
            transform: translateY(-20px)
        }

        to {
            opacity: 1;
            transform: translateY(0)
        }
    }

    .m2 {
        font-size: 32px
    }

    .k1 {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 24px;
    }

    .k2 {
        background: var(--a1);
        color: var(--e1);
        padding: 8px 20px;
        border-radius: 50px;
        font-weight: 700;
        font-size: 14px;
    }

    .k3 {
        display: grid;
        gap: 20px;
    }

    .l1 {
        background: linear-gradient(135deg, #ffffff 0%, #f9f9f9 100%);
        border-radius: 16px;
        padding: 28px;
        border: 2px solid #f0f0f0;
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
    }

    .l1::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 4px;
        height: 100%;
        background: var(--a1);
        transform: scaleY(0);
        transition: transform 0.3s ease;
    }

    .l1:hover {
        transform: translateX(8px);
        box-shadow: 0 8px 24px rgba(0, 0, 0, 0.12);
        border-color: var(--a1);
    }

    .l1:hover::before {
        transform: scaleY(1);
    }

    .l2 {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        margin-bottom: 16px;
    }

    .l3 {
        font-weight: 700;
        font-size: 18px;
        color: var(--d1);
        margin-bottom: 6px;
    }

    .l4 {
        color: var(--f1);
        font-size: 14px;
        display: flex;
        gap: 12px;
        align-items: center;
    }

    .l5 {
        background: var(--a1);
        color: var(--e1);
        padding: 4px 12px;
        border-radius: 50px;
        font-size: 12px;
        font-weight: 600;
    }

    .l6 {
        display: flex;
        gap: 4px;
        color: var(--a1);
        font-size: 24px;
    }

    .l7 {
        color: #333;
        line-height: 1.8;
        font-size: 15px;
        padding: 20px;
        background: rgba(0, 0, 0, 0.02);
        border-radius: 12px;
        border-left: 4px solid var(--a1);
    }

    .m1 {
        text-align: center;
        padding: 60px 20px;
        color: var(--f1);
    }

    .m1 .m2 {
        font-size: 80px;
        margin-bottom: 20px;
        opacity: 0.3;
        animation: float 3s ease-in-out infinite;
    }

    @keyframes float {

        0%,
        100% {
            transform: translateY(0)
        }

        50% {
            transform: translateY(-20px)
        }
    }

    @media (max-width:768px) {
        .a1 h1 {
            font-size: 36px
        }

        .a1 p {
            font-size: 16px
        }

        .b2 {
            padding: 24px
        }

        .e3 {
            font-size: 40px;
            gap: 8px
        }

        .f1 {
            gap: 12px
        }

        .f2 {
            padding: 12px 20px;
            font-size: 14px
        }

        .h3 {
            width: 100%
        }

        .h4 {
            flex: 1
        }

        .h1 {
            flex-direction: column;
            align-items: stretch
        }
    }








    /* General Styling */
    .cardimg {
        height: 300px;
        width: 400px;

    }

    .cardd {}

    .main-content {
        text-align: center;
        padding: 30px;
        background-color: #fff;
        border-radius: 12px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        max-width: 1500px;
        width: 100%;
        margin-top: 50px;
        margin-bottom: 20px;
    }

    h1 {
        color: #007bff;
        margin-bottom: 10px;
    }

    p {
        color: #666;
        margin-bottom: 25px;
    }

    /* Rate Button Styling */
    .rate-button {
        background-color: #28a745;
        color: white;
        padding: 15px 30px;
        border: none;
        border-radius: 8px;
        cursor: pointer;
        font-size: 1.2em;
        font-weight: 600;
        transition: background-color 0.3s ease, transform 0.2s ease;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        margin: 0 10px;
    }

    .rate-button:hover {
        background-color: #218838;
        transform: translateY(-2px);
    }

    .rate-button:active {
        transform: translateY(0);
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
    }

    /* --- Review Display Section Styling --- */
    .reviews-section {
        background-color: #fff;
        padding: 30px;
        border-radius: 12px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        max-width: 1500px;
        width: 100%;
        margin-top: 20px;
        /* Removed opacity/transform for default visibility */
    }

    .reviews-section h2 {
        color: #007bff;
        text-align: center;
        margin-bottom: 25px;
    }

    .review-card {
        border: 1px solid #eee;
        padding: 15px;
        margin-bottom: 15px;
        border-radius: 8px;
        background-color: #f9f9f9;
        transition: box-shadow 0.2s ease;
    }

    .review-card:hover {
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
    }

    .review-card strong {
        color: #333;
        display: block;
        margin-bottom: 5px;
    }

    .review-rating {
        color: #e66c00;
        font-size: 1.4em;
        margin-bottom: 10px;
    }

    .review-comment {
        font-style: italic;
        color: #555;
        border-left: 3px solid #007bff;
        padding-left: 10px;
        margin-bottom: 15px;
    }

    /* New: See More Button Styling */
    .see-more-button {
        display: block;
        width: 100%;
        padding: 10px;
        background-color: #17a2b8;
        /* Teal color */
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-size: 1em;
        font-weight: 600;
        transition: background-color 0.3s ease;
        margin-top: 10px;
    }

    .see-more-button:hover {
        background-color: #138496;
    }


    /* --- MODAL STYLING (Unchanged from previous response) --- */
    /* (Keep the rest of the modal, close button, and star rating styles here) */

    .modal {
        display: none;
        position: fixed;
        z-index: 1000;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgba(0, 0, 0, 0.6);
        justify-content: center;
        align-items: center;
        opacity: 0;
        transition: opacity 0.3s ease-in-out;
    }

    .modal.show {
        display: flex;
        opacity: 1;
    }

    .modal-content {
        background-color: #fefefe;
        margin: auto;
        padding: 30px;
        border-radius: 12px;
        max-width: 550px;
        width: 90%;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3);
        position: relative;
        transform: translateY(-50px);
        transition: transform 0.3s ease-in-out;
    }

    .modal.show .modal-content {
        transform: translateY(0);
    }

    .modal-content h2 {
        color: #007bff;
        text-align: center;
        margin-top: 0;
        margin-bottom: 10px;
    }

    .modal-content p {
        text-align: center;
        margin-bottom: 25px;
        color: #555;
    }


    /* Close Button */
    .close-button {
        color: #aaa;
        float: right;
        font-size: 36px;
        font-weight: bold;
        position: absolute;
        top: 10px;
        right: 20px;
        cursor: pointer;
        transition: color 0.2s ease;
    }

    .close-button:hover,
    .close-button:focus {
        color: #333;
        text-decoration: none;
    }

    /* Form Styling within Modal */
    form {
        display: flex;
        flex-direction: column;
        gap: 20px;
    }

    fieldset {
        border: 1px solid #ddd;
        border-radius: 8px;
        padding: 20px;
        margin: 0;
    }

    legend {
        font-weight: 600;
        color: #333;
        padding: 0 10px;
        font-size: 1.1em;
    }

    .rating-category {
        display: flex;
        justify-content: center;
        align-items: center;
        margin-bottom: 15px;
        padding-bottom: 10px;
        border-bottom: 1px dotted #eee;
    }

    .rating-category:last-of-type {
        border-bottom: none;
        margin-bottom: 0;
        padding-bottom: 0;
    }

    .rating-category label {
        font-weight: 400;
        color: #555;
        margin-right: 15px;
    }

    /* Star Rating Styling */
    .stars {
        direction: rtl;
        display: inline-block;
    }

    .stars input[type="radio"] {
        display: none;
    }

    .stars label {
        color: #ccc;
        font-size: 32px;
        padding: 0 2px;
        cursor: pointer;
        transition: color 0.2s, transform 0.15s;
    }

    /* Star Hover/Checked Effect */
    .stars input[type="radio"]:checked~label,
    .stars label:hover,
    .stars label:hover~label {
        color: #ffc107;
    }

    /* Animation for Hover/Checked Stars */
    .stars label:hover {
        transform: scale(1.3);
    }

    .stars input[type="radio"]:checked+label {
        transform: scale(1.1);
    }

    /* Total Rating in Modal */
    .overall-rating label {
        font-size: 1.2em;
        font-weight: 600;
        color: #333;
    }

    .stars.total input[type="radio"]:checked~label,
    .stars.total label:hover,
    .stars.total label:hover~label {
        color: #e66c00;
    }


    /* Comment and Name Inputs */
    .form-group {
        margin-bottom: 15px;
    }

    .form-group label {
        display: block;
        margin-bottom: 5px;
        font-weight: 500;
    }

    textarea,
    input[type="text"] {
        width: 100%;
        padding: 12px;
        border: 1px solid #ddd;
        border-radius: 5px;
        box-sizing: border-box;
        font-family: inherit;
        font-size: 1em;
        transition: border-color 0.2s ease;
    }

    textarea:focus,
    input[type="text"]:focus {
        outline: none;
        border-color: #007bff;
        box-shadow: 0 0 0 2px rgba(0, 123, 255, 0.25);
    }

    textarea {
        resize: vertical;
    }

    /* Submit Button within Modal */
    button[type="submit"] {
        background-color: #007bff;
        color: white;
        padding: 12px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-size: 1.1em;
        font-weight: 600;
        transition: background-color 0.3s ease, transform 0.2s ease;
    }

    button[type="submit"]:hover {
        background-color: #0056b3;
        transform: translateY(-1px);
    }

    button[type="submit"]:active {
        transform: translateY(0);
    }

    .hero-section {
        position: relative;
        width: 100%;
        height: 60vh;
        /* Adjust height as needed */
        min-height: 400px;
        /* Minimum height for smaller screens */
        background-color: #ccc;
        /* Placeholder background */
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
        z-index: 2;
        /* Ensure text is above the image */
        text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.7);
        /* Stronger shadow for readability */
        white-space: nowrap;
        /* Prevent text wrapping */
    }

    .hero-overlay-text h1 {
        font-size: 4.5em;
        /* Large font size for impact */
        margin: 0;
        color: #fff;
        letter-spacing: 2px;
        text-transform: uppercase;
    }

    @media (max-width: 1024px) {
        .hero-overlay-text h1 {
            font-size: 3.5em;
            /* Adjust for tablets */
        }
    }

    @media (max-width: 768px) {
        .hero-section {
            height: 50vh;
            /* Shorter height for mobile */
            min-height: 300px;
        }
    }

    .hero-overlay-text h1 {
        font-size: 2.5em;
        /* Adjust for mobile */
    }

    @media (max-width: 480px) {
        .hero-overlay-text h1 {
            font-size: 1.8em;
            /* Smaller for very small screens */
        }
    }

    @media (max-width: 768px) {
        .hero-section {
            height: 50vh;
            /* Shorter height for mobile */
            min-height: 300px;
        }

        .hero-overlay-text h1 {
            font-size: 2.5em;
            /* Adjust for mobile */
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
        object-fit: cover;
        /* Ensures the image covers the area without distortion */
        object-position: center;
        /* Centers the image */
        filter: brightness(0.8);
        /* Slightly darken the image for text readability */
        transition: filter 0.5s ease;
    }

    .hero-image:hover {
        filter: brightness(0.9);
        /* Slightly lighten on hover */
    }
</style>