<!DOCTYPE html>
<html lang="en">

<?= include_page('photoex/phheader') ?>

<body>
    <div class="container-fluid position-relative d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-dark position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Sidebar Start -->
        <?= include_page('photoex/phsidebar') ?>
        <!-- Sidebar End -->


        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            <?= include_page('photoex/phnavbar') ?>
            <!-- Navbar End -->


            <div class="max-w-7xl mx-auto p-4 sm:p-6 lg:p-8">

                <!-- Header and Navigation Tabs -->
                <header class="bg-white rounded-xl shadow-lg mb-8 p-4">
                    <h1 class="text-3xl font-extrabold text-black mb-4 tracking-tight">Photographer Earning's Interface</h1>

                </header>

                <!-- === NEW: EARNINGS SUMMARY DASHBOARD === -->
                <section class="mb-10 bg-white p-6 rounded-xl shadow-xl border border-gray-100">
                    <h2 class="text-2xl font-bold text-gray-800 mb-4">Financial Overview</h2>

                    <!-- Filters for Earnings Summary -->
                    <div class="flex flex-col sm:flex-row space-y-3 sm:space-y-0 sm:space-x-4 mb-6 items-center">
                        <div class="flex items-center w-full sm:w-auto">
                            <label for="year-filter" class="text-sm font-medium text-gray-700 mr-2 whitespace-nowrap">Filter by Year:</label>
                            <select id="year-filter" class="p-2 border border-gray-300 rounded-lg shadow-sm focus:ring-black focus:border-black w-full sm:w-32 bg-white transition duration-200"></select>
                        </div>

                        <div class="flex items-center w-full sm:w-auto">
                            <label for="month-filter" class="text-sm font-medium text-gray-700 mr-2 whitespace-nowrap">Filter by Month:</label>
                            <select id="month-filter" class="p-2 border border-gray-300 rounded-lg shadow-sm focus:ring-red-600 focus:border-red-600 w-full sm:w-40 bg-white transition duration-200"></select>
                        </div>
                    </div>

                    <!-- Summary Cards Grid -->
                    <div class="grid grid-cols-1 md:grid-cols-4 gap-4">

                        <!-- Total Projects -->
                        <div class="bg-gray-50 p-4 rounded-lg border-l-4 border-black shadow-inner">
                            <p class="text-sm font-medium text-gray-500">Total Projects</p>
                            <p id="summary-projects" class="text-2xl font-extrabold text-black mt-1">0</p>
                        </div>

                        <!-- Gross Revenue -->
                        <div class="bg-gray-50 p-4 rounded-lg border-l-4 border-red-600 shadow-inner">
                            <p class="text-sm font-medium text-gray-500">Total Gross Payment</p>
                            <p id="summary-gross" class="text-2xl font-extrabold text-red-600 mt-1">₱0</p>
                        </div>

                        <!-- Photographer Share (Net Earnings) -->
                        <div class="bg-black p-4 rounded-lg border-l-4 border-red-500 shadow-lg text-white">
                            <p class="text-sm font-medium opacity-80">Your Net Share (80%)</p>
                            <p id="summary-net-share" class="text-2xl font-extrabold mt-1 text-red-300">₱0</p>
                        </div>

                        <!-- Studio Share -->
                        <div class="bg-gray-50 p-4 rounded-lg border-l-4 border-gray-400 shadow-inner">
                            <p class="text-sm font-medium text-gray-500">Studio Share (20%)</p>
                            <p id="summary-studio-share" class="text-2xl font-extrabold text-gray-700 mt-1">₱0</p>
                        </div>
                    </div>
                </section>
                <!-- === END EARNINGS SUMMARY DASHBOARD === -->

                <!-- Bookings Section Title -->
                <div class="mb-6">
                    <h2 class="text-2xl font-semibold text-gray-800">Project Gallery</h2>
                    <p class="text-gray-500">The projects displayed below correspond to the date filter selected above.</p>
                </div>

                <!-- Booking Cards Grid Container -->
                <div id="booking-grid" class="grid gap-8 grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
                    <div class="col-span-full text-center py-12 text-gray-500" id="loading-indicator">
                        Loading visual bookings...
                    </div>
                </div>

                <!-- Modals and Status Messages (Hidden by Default) -->
                <div id="modal-container"></div>
                <!-- Status message uses black background for high-contrast confirmation -->
                <div id="status-message" class="fixed top-4 right-4 bg-black text-white p-3 rounded-xl shadow-xl transition-opacity duration-300 opacity-0 pointer-events-none"></div>

            </div>

            <!-- Content End -->


            <!-- Back to Top -->
            <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
        </div>

        <?= import_packages("datatable", "tyrax", "loading", "ctr", "path", "twal") ?>

        <script>
            // Mock Data for Bookings
            const mockBookings = [
                // 2025 Bookings
                {
                    id: 1,
                    title: "Santos & Cruz Wedding",
                    date: "September 15, 2025",
                    client: "Maria Santos",
                    serviceType: "Wedding Photography",
                    totalPayment: 12000,
                    status: "Ongoing"
                },
                {
                    id: 2,
                    title: "Lopez Family Portrait",
                    date: "October 2, 2025",
                    client: "Juan Lopez",
                    serviceType: "Family Portrait",
                    totalPayment: 4500,
                    status: "Ongoing"
                },
                {
                    id: 3,
                    title: "TechCorp Product Shoot",
                    date: "August 10, 2025",
                    client: "TechCorp Marketing",
                    serviceType: "Commercial/Product",
                    totalPayment: 25000,
                    status: "Completed"
                },
                {
                    id: 4,
                    title: "Bianca's Debut Party",
                    date: "November 21, 2025",
                    client: "Elisa Mendoza",
                    serviceType: "Event Coverage",
                    totalPayment: 10000,
                    status: "Ongoing"
                },
                {
                    id: 5,
                    title: "Ramon Professional Headshots",
                    date: "September 1, 2025",
                    client: "Ramon Diaz",
                    serviceType: "Professional Headshots",
                    totalPayment: 3000,
                    status: "Completed"
                },
                {
                    id: 6,
                    title: "Cityscape Architecture",
                    date: "October 18, 2025",
                    client: "Urban Dev Group",
                    serviceType: "Architectural",
                    totalPayment: 15000,
                    status: "Ongoing"
                },

                // 2026 Bookings
                {
                    id: 7,
                    title: "Winter Collection Catalog",
                    date: "January 5, 2026",
                    client: "Fashion House M",
                    serviceType: "Fashion",
                    totalPayment: 35000,
                    status: "Ongoing"
                },
                {
                    id: 8,
                    title: "Poblacion Food Tour",
                    date: "January 20, 2026",
                    client: "TastePH",
                    serviceType: "Food Photography",
                    totalPayment: 9000,
                    status: "Completed"
                },
            ];

            // Constants for share calculation (80% photographer, 20% studio)
            const PHOTOGRAPHER_SHARE = 0.80;
            const STUDIO_SHARE = 0.20;

            // Data for the month filter dropdown
            const MONTHS_DATA = [{
                    name: "All Months",
                    value: "all"
                },
                {
                    name: "January",
                    value: 0
                },
                {
                    name: "February",
                    value: 1
                },
                {
                    name: "March",
                    value: 2
                },
                {
                    name: "April",
                    value: 3
                },
                {
                    name: "May",
                    value: 4
                },
                {
                    name: "June",
                    value: 5
                },
                {
                    name: "July",
                    value: 6
                },
                {
                    name: "August",
                    value: 7
                },
                {
                    name: "September",
                    value: 8
                },
                {
                    name: "October",
                    value: 9
                },
                {
                    name: "November",
                    value: 10
                },
                {
                    name: "December",
                    value: 11
                },
            ];

            // --- Core Filtering and Rendering Functions ---

            /**
             * Calculates and displays the total earnings for a given set of bookings.
             */
            function calculateEarnings(bookings) {
                let totalGross = 0;
                let projectCount = 0;

                // Only count bookings that are 'Completed' towards total earnings for a more realistic view.
                const completedBookings = bookings.filter(b => b.status === 'Completed');

                completedBookings.forEach(booking => {
                    totalGross += booking.totalPayment;
                    projectCount++;
                });

                const totalPhotographerShare = totalGross * PHOTOGRAPHER_SHARE;
                const totalStudioShare = totalGross * STUDIO_SHARE;

                document.getElementById('summary-projects').textContent = projectCount;
                document.getElementById('summary-gross').textContent = formatCurrency(totalGross);
                document.getElementById('summary-net-share').textContent = formatCurrency(totalPhotographerShare);
                document.getElementById('summary-studio-share').textContent = formatCurrency(totalStudioShare);
            }

            /**
             * Central function to filter bookings based on selected year and month.
             * Drives both the earnings summary and the gallery display.
             */
            function filterBookings() {
                const yearSelect = document.getElementById('year-filter');
                const monthSelect = document.getElementById('month-filter');

                const selectedYear = yearSelect.value === 'all' ? null : parseInt(yearSelect.value, 10);
                const selectedMonth = monthSelect.value === 'all' ? null : parseInt(monthSelect.value, 10);

                const filteredBookings = mockBookings.filter(booking => {
                    const date = new Date(booking.date);
                    if (isNaN(date.getTime())) return false; // Skip invalid dates

                    const bookingYear = date.getFullYear();
                    const bookingMonth = date.getMonth();

                    // Check Year
                    const yearMatch = selectedYear === null || bookingYear === selectedYear;

                    // Check Month
                    const monthMatch = selectedMonth === null || bookingMonth === selectedMonth;

                    return yearMatch && monthMatch;
                });

                // 1. Update the Gallery View (All projects matching the filter, regardless of status)
                renderBookings(filteredBookings);

                // 2. Update the Earnings Summary (Only completed projects matching the filter)
                calculateEarnings(filteredBookings);
            }

            /**
             * Renders all booking cards to the DOM.
             */
            function renderBookings(data) {
                const grid = document.getElementById('booking-grid');
                const loadingIndicator = document.getElementById('loading-indicator');

                if (loadingIndicator) {
                    loadingIndicator.classList.add('hidden');
                }

                if (data.length === 0) {
                    grid.innerHTML = '<div class="col-span-full text-center py-12 text-gray-500 font-semibold text-lg border-2 border-dashed border-gray-200 rounded-xl p-8 bg-gray-50">No projects found for the selected time period.</div>';
                    return;
                }

                const cardsHTML = data.map(createCardHTML).join('');
                grid.innerHTML = cardsHTML;
            }

            // --- Filter Setup Functions ---

            /**
             * Extracts unique years from the booking data.
             */
            function getUniqueYears() {
                const years = mockBookings.map(booking => new Date(booking.date).getFullYear());
                const uniqueYears = [...new Set(years)].filter(year => !isNaN(year)).sort((a, b) => b - a);
                return ['all', ...uniqueYears];
            }

            /**
             * Populates the year filter dropdown.
             */
            function populateYearFilter() {
                const filterSelect = document.getElementById('year-filter');
                getUniqueYears().forEach(year => {
                    const option = document.createElement('option');
                    option.value = year;
                    option.textContent = year === 'all' ? 'All Years' : year;
                    filterSelect.appendChild(option);
                });
                filterSelect.addEventListener('change', filterBookings);
            }

            /**
             * Populates the month filter dropdown.
             */
            function populateMonthFilter() {
                const filterSelect = document.getElementById('month-filter');
                MONTHS_DATA.forEach(month => {
                    const option = document.createElement('option');
                    option.value = month.value;
                    option.textContent = month.name;
                    filterSelect.appendChild(option);
                });
                filterSelect.addEventListener('change', filterBookings);
            }


            // --- Card Rendering and Utility Functions (from previous version) ---

            /**
             * Generates a unique placeholder image URL based on the booking ID.
             */
            function getPlaceholderImageUrl(id) {
                const colors = ['1f2937', '4f46e5', '0d9488', 'f97316', '14b8a6', '6b21a8', 'fb7185'];
                const booking = mockBookings.find(b => b.id === id);
                const text = encodeURIComponent(booking ? booking.title.split(' ')[0] : 'Project');
                const color = colors[id % colors.length];
                return `https://placehold.co/600x400/${color}/ffffff?text=${text}.jpg`;
            }

            /**
             * Formats a number to Philippine Peso (₱) currency string.
             */
            function formatCurrency(amount) {
                return new Intl.NumberFormat('en-PH', {
                    style: 'currency',
                    currency: 'PHP',
                    minimumFractionDigits: 0
                }).format(amount);
            }

            /**
             * Generates the HTML string for a single booking card (Image Focused).
             */
            function createCardHTML(booking) {
                const myShare = booking.totalPayment * PHOTOGRAPHER_SHARE;
                const studioShare = booking.totalPayment * STUDIO_SHARE;
                const isOngoing = booking.status === 'Ongoing';
                const imageUrl = getPlaceholderImageUrl(booking.id);

                let statusColor = isOngoing ?
                    'bg-red-600 text-white shadow-md' :
                    'bg-black text-white shadow-md';
                let statusIcon = isOngoing ? '🔄' : '✅';

                const completeButtonClass = isOngoing ?
                    'bg-black hover:bg-gray-800 text-white transition duration-150 active:scale-[0.98]' :
                    'bg-gray-300 text-gray-500 cursor-not-allowed';

                return `
                <div class="bg-white rounded-xl shadow-xl overflow-hidden border border-gray-100 transform transition duration-300 hover:shadow-2xl flex flex-col image-card-container">
                    <div class="relative h-48 overflow-hidden">
                        <img src="${imageUrl}" 
                            alt="JPG Cover Image for ${booking.title}" 
                            class="project-image w-full h-full object-cover transition-transform duration-300" 
                            onerror="this.onerror=null; this.src='https://placehold.co/600x400/AAAAAA/FFFFFF?text=JPG+Loading+Error'" />
                        
                        <span class="absolute top-3 right-3 inline-flex items-center px-3 py-1 rounded-full text-sm font-semibold ${statusColor}">
                            ${statusIcon} ${booking.status}
                        </span>
                    </div>

                    <div class="p-5 flex-grow flex flex-col">
                        <h3 class="text-xl font-extrabold text-black mb-3 leading-tight">${booking.title}</h3>

                        <div class="space-y-2 text-sm text-gray-700 flex-grow">
                            <p class="flex justify-between items-center"><strong class="font-medium text-black">📅 Date:</strong> <span>${booking.date}</span></p>
                            <p class="flex justify-between items-center"><strong class="font-medium text-black">👩‍❤️‍👨 Client:</strong> <span class="truncate ml-2">${booking.client}</span></p>
                            <p class="flex justify-between items-center"><strong class="font-medium text-black">💼 Service:</strong> <span>${booking.serviceType}</span></p>
                        </div>

                        <div class="border-t border-gray-200 mt-4 pt-4 space-y-2">
                            <p class="flex justify-between text-base font-bold text-red-700">
                                <span class="text-black">💵 Total Payment:</span> <span>${formatCurrency(booking.totalPayment)}</span>
                            </p>
                            <div class="grid grid-cols-2 gap-2 text-xs">
                                <p class="text-black font-medium">
                                    <span class="text-gray-500">My Share:</span> <strong>${formatCurrency(myShare)}</strong>
                                </p>
                                <p class="text-red-500 font-medium text-right">
                                    <span class="text-gray-500">Studio Share:</span> <strong>${formatCurrency(studioShare)}</strong>
                                </p>
                            </div>
                        </div>

                        <div class="flex space-x-3 mt-5 pt-3 border-t border-gray-100">
                            <button onclick="handleViewDetails(${booking.id})" class="flex-1 px-3 py-2 text-sm font-medium text-red-600 border border-red-600 rounded-lg shadow-sm hover:bg-red-50 transition duration-150 active:scale-[0.98]">
                                View Details
                            </button>
                            <button ${isOngoing ? '' : 'disabled'} onclick="handleConfirmationRequest('complete', ${booking.id}, '${booking.title}')" class="flex-1 px-3 py-2 text-sm font-medium rounded-lg shadow-md ${completeButtonClass}">
                                ${isOngoing ? '✅ Mark as Complete' : 'Completed'}
                            </button>
                        </div>
                    </div>
                </div>
            `;
            }

            // --- Utility Functions (Modal & Status) ---

            function showStatus(message, type = 'success') {
                const statusElement = document.getElementById('status-message');
                statusElement.classList.remove('bg-green-500', 'bg-red-500', 'opacity-0', 'pointer-events-none');
                statusElement.textContent = message;
                statusElement.classList.add(type === 'success' ? 'bg-black' : 'bg-red-600', 'opacity-100');
                statusElement.style.pointerEvents = 'auto';

                setTimeout(() => {
                    statusElement.classList.remove('opacity-100');
                    statusElement.classList.add('opacity-0', 'pointer-events-none');
                }, 3000);
            }

            function handleConfirmationRequest(action, id, title) {
                if (action === 'complete') {
                    showModal(
                        `Confirm Completion for ${title}`,
                        `Are you sure you want to mark "${title}" as completed? This action updates your earnings and locks the project as complete.`,
                        () => {
                            const bookingIndex = mockBookings.findIndex(b => b.id === id);
                            if (bookingIndex !== -1 && mockBookings[bookingIndex].status === 'Ongoing') {
                                mockBookings[bookingIndex].status = 'Completed';
                                // Re-run the filter to update both the gallery and the earnings summary
                                filterBookings();
                                showStatus(`Booking "${title}" successfully marked as completed!`, 'success');
                            }
                        }
                    );
                }
            }

            function handleViewDetails(id) {
                const booking = mockBookings.find(b => b.id === id);
                if (booking) {
                    const myShare = booking.totalPayment * PHOTOGRAPHER_SHARE;
                    const studioShare = booking.totalPayment * STUDIO_SHARE;
                    const imageUrl = getPlaceholderImageUrl(booking.id);

                    const detailsContent = `
                    <div class="text-left space-y-3 p-2">
                        <img src="${imageUrl}" alt="Project preview for ${booking.title}" class="w-full rounded-lg mb-4 object-cover h-48 shadow-lg">
                        <p><strong>Service:</strong> ${booking.serviceType}</p>
                        <p><strong>Client:</strong> ${booking.client}</p>
                        <p><strong>Date:</strong> ${booking.date}</p>
                        <p><strong>Status:</strong> <span class="font-bold text-lg ${booking.status === 'Ongoing' ? 'text-red-600' : 'text-black'}">${booking.status}</span></p>
                        <hr class="my-2 border-gray-200">
                        <p class="text-lg"><strong>Total Fee:</strong> <span class="text-red-600 font-extrabold">${formatCurrency(booking.totalPayment)}</span></p>
                        <p><strong>Photographer Share:</strong> <span class="text-black font-semibold">${formatCurrency(myShare)}</span></p>
                        <p><strong>Studio Share:</strong> <span class="text-red-500 font-semibold">${formatCurrency(studioShare)}</span></p>
                    </div>
                `;
                    showModal(`Booking Details: ${booking.title}`, detailsContent, null, 'Close');
                }
            }

            function showModal(title, content, onConfirm = null, closeText = 'Cancel') {
                const modalContainer = document.getElementById('modal-container');
                modalContainer.innerHTML = '';

                const confirmButton = onConfirm ? `<button id="modal-confirm-btn" class="px-4 py-2 bg-red-600 text-white font-medium rounded-lg hover:bg-red-700 transition duration-150">Confirm</button>` : '';

                const modalHTML = `
                <div id="custom-modal" class="fixed inset-0 bg-gray-900 bg-opacity-75 flex items-center justify-center p-4 z-50">
                    <div class="bg-white rounded-xl shadow-2xl w-full max-w-md overflow-hidden transform transition-all duration-300 scale-100">
                        <div class="p-5 border-b border-gray-200">
                            <h3 class="text-xl font-bold text-black">${title}</h3>
                        </div>
                        <div class="p-5 overflow-y-auto max-h-[70vh]">
                            ${content}
                        </div>
                        <div class="flex justify-end space-x-3 p-4 bg-gray-50 border-t border-gray-200">
                            <button id="modal-close-btn" class="px-4 py-2 bg-white border border-gray-300 text-black font-medium rounded-lg hover:bg-gray-100 transition duration-150">${closeText}</button>
                            ${confirmButton}
                        </div>
                    </div>
                </div>
            `;

                modalContainer.innerHTML = modalHTML;
                const modalElement = document.getElementById('custom-modal');

                const closeModal = () => {
                    modalElement.classList.add('opacity-0', 'pointer-events-none');
                    setTimeout(() => modalContainer.innerHTML = '', 300);
                };

                document.getElementById('modal-close-btn').onclick = closeModal;

                if (onConfirm) {
                    document.getElementById('modal-confirm-btn').onclick = () => {
                        onConfirm();
                        closeModal();
                    };
                }

                modalElement.onclick = (e) => {
                    if (e.target.id === 'custom-modal') {
                        closeModal();
                    }
                };
            }

            // --- Initialization ---

            window.onload = function() {
                // Setup filters
                populateYearFilter();
                populateMonthFilter();

                // Perform initial filtering and rendering
                filterBookings();
            };
        </script>
        <!-- JavaScript Libraries -->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
        <script src="<?= assets() ?>/lib/chart/chart.min.js"></script>
        <script src="<?= assets() ?>/lib/easing/easing.min.js"></script>
        <script src="<?= assets() ?>/lib/waypoints/waypoints.min.js"></script>
        <script src="<?= assets() ?>/lib/owlcarousel/owl.carousel.min.js"></script>
        <script src="<?= assets() ?>/lib/tempusdominus/js/moment.min.js"></script>
        <script src="<?= assets() ?>/lib/tempusdominus/js/moment-timezone.min.js"></script>
        <script src="<?= assets() ?>/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

        <!-- Template Javascript -->
        <script src="<?= assets() ?>/js/main.js"></script>
</body>

</html>

<script src="https://cdn.tailwindcss.com"></script>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap');

    body {
        font-family: 'Inter', sans-serif;
        background-color: #f7f9fc;
    }

    /* Style for the navigation tabs */
    .nav-tab {
        /* Updated base colors */
        @apply px-3 py-2 text-sm font-medium rounded-t-lg transition-colors duration-200;
        @apply hover:bg-gray-100 text-gray-600;
    }

    .nav-tab.active {
        /* Active tab uses the red accent color */
        @apply border-b-2 border-red-600 text-red-700 bg-gray-50 font-semibold;
    }

    /* Style for image container focus */
    .image-card-container:hover .project-image {
        transform: scale(1.05);
        filter: brightness(1.05);
    }
</style>