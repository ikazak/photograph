    <!DOCTYPE html>
    <html lang="en" class="dark">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Package Selector</title>
        <script src="https://cdn.tailwindcss.com"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
        <style>
            /* Custom styles for a dark theme and rounded corners */
            body {
                font-family: 'Inter', sans-serif;
                background-color: #1a202c;
                /* Dark background */
                color: #e2e8f0;
                /* Light text */
            }

            .rounded-card {
                border-radius: 1.5rem;
                /* Rounded corners */
            }

            .transition-transform {
                transition-property: transform;
                transition-duration: 300ms;
            }

            .hover-scale:hover {
                transform: scale(1.02);
            }

            .selected-package {
                border: 2px solid #6366f1;
                /* Highlight selected card */
            }

            .status-pill {
                padding: 0.25rem 0.75rem;
                border-radius: 9999px;
                font-weight: bold;
                font-size: 0.75rem;
                text-transform: uppercase;
            }

            .btn {
                height: 50px;
                width: 150px;
                background-color: blue;
                border-radius: 20px;

            }
        </style>
    </head>

    <body class="bg-gray-900 text-gray-100 min-h-screen flex items-center justify-center p-4">

        <div class="w-full max-w-5xl bg-gray-800 rounded-3xl shadow-xl overflow-hidden p-6 md:p-10">

            <header class="flex justify-between items-center mb-6">
                <button id="backBtn" class="hidden text-gray-400 hover:text-white transition-colors duration-300">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-8 h-8">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" />
                    </svg>
                </button>
                <div class="flex items-center space-x-2">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-8 h-8 text-indigo-400">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                    </svg>
                    <span id="userName" class="text-xl font-semibold"></span>
                </div>
                <a href="<?= page('loginpage.php') ?>" onclick="return confirm('Are you sure you want to log out?');">
                    <button id="logoutBtn" class="text-gray-400 hover:text-white transition-colors duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-8 h-8">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 9V7.5a2.25 2.25 0 0 1 2.25-2.25h.25c1.03 0 2.01.2 2.9.56l.09.03a4.522 4.522 0 0 1 1.625 1.575M16.5 14.25c1.616 1.616 1.776 3.016 1.776 3.016m0 0a2.25 2.25 0 0 1-2.25 2.25H6.5a2.25 2.25 0 0 1-2.25-2.25V7.5c0-1.24 1.01-2.25 2.25-2.25h.25M17.5 14.25v2.25a2.25 2.25 0 0 1-2.25 2.25H6.5a2.25 2.25 0 0 1-2.25-2.25V7.5" />
                        </svg>
                    </button></a>
            </header>

            <div class="flex justify-center mb-8 gap-4">
                <button id="showPackagesBtn" class="px-6 py-3 rounded-full font-semibold transition-colors duration-300 bg-indigo-600 hover:bg-indigo-700 text-white shadow-lg">
                    View Packages
                </button>
                <a href="<?= page('users/customization.php') ?>"><button id="showPackages2Btn" class="px-6 py-3 rounded-full font-semibold transition-colors duration-300 bg-gray-700 hover:bg-gray-600 text-gray-300 shadow-lg">
                    Customization
                </button></a>
                <button id="showOrderBtn" class="px-6 py-3 rounded-full font-semibold transition-colors duration-300 bg-gray-700 hover:bg-gray-600 text-gray-300 shadow-lg">
                    View My Orders
                </button>
            </div>

            <!-- Original Packages -->
            <section id="packagesSection" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

            </section>

            <!-- New Packages 2 -->
            <section id="packagesSection2" class="hidden grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <div class="package-card bg-gray-700 rounded-card p-4 shadow-lg flex flex-col items-center transition-transform hover-scale">
                    <img src="https://placehold.co/300x200/red/white?text=Package+2A" class="w-full h-auto rounded-lg mb-4">
                    <h3 class="text-2xl font-bold mb-1">Premium Package A</h3>
                    <p class="text-center text-gray-300 text-sm mb-4">Perfect for weddings and special occasions.</p>
                    <button class="btn mt-auto w-full py-3 rounded-full font-bold transition-colors duration-300">Select</button>
                </div>
                <div class="package-card bg-gray-700 rounded-card p-4 shadow-lg flex flex-col items-center transition-transform hover-scale">
                    <img src="https://placehold.co/300x200/red/white?text=Package+2B" class="w-full h-auto rounded-lg mb-4">
                    <h3 class="text-2xl font-bold mb-1">Premium Package B</h3>
                    <p class="text-center text-gray-300 text-sm mb-4">Includes drone and cinematic editing.</p>
                    <button class="btn mt-auto w-full py-3 rounded-full font-bold transition-colors duration-300">Select</button>
                </div>
                <div class="package-card bg-gray-700 rounded-card p-4 shadow-lg flex flex-col items-center transition-transform hover-scale">
                    <img src="https://placehold.co/300x200/red/white?text=Package+2C" class="w-full h-auto rounded-lg mb-4">
                    <h3 class="text-2xl font-bold mb-1">Premium Package C</h3>
                    <p class="text-center text-gray-300 text-sm mb-4">All-inclusive package with full day coverage.</p>
                    <button class="btn mt-auto w-full py-3 rounded-full font-bold transition-colors duration-300">Select</button>
                </div>
            </section>


            <section id="orderSection" class="hidden text-center">
                <h2 class="text-3xl font-bold text-white mb-6">My Current Orders</h2>

                <div class="mb-8">
                    <h3 class="text-2xl font-bold text-yellow-500 mb-4">Request Order</h3>
                    <div id="" class="space-y-4">
                        <div class="order-container" class="no-orders-container" id="request_container">



                        </div>
                    </div>
                </div>

                <div>
                    <h3 class="text-2xl font-bold text-blue-500 mb-4">Pending...</h3>
                    <div id="" class="space-y-4">
                        <div class="order-container" class="no-orders-container" id="completedOrdersContainer">



                        </div>
                    </div>
                </div>

                <div>
                    <h3 class="text-2xl font-bold text-green-500 mb-4">Completed</h3>
                    <div id="" class="space-y-4">
                        <div class="order-container" class="no-orders-container" id="on_going">



                        </div>
                    </div>
                </div>

                <button id="changePackageBtn" class="mt-8 px-6 py-3 rounded-full font-semibold transition-colors duration-300 bg-indigo-600 hover:bg-indigo-700 text-white shadow-lg">
                    View Packages
                </button>
            </section>

        </div>


        <div class="modal fade" id="paymentModal" tabindex="-1" aria-labelledby="paymentModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">

                    <div class="modal-header">
                        <h5 class="modal-title" id="paymentModalLabel">Payment Information</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <form id="bookingForm">
                            <div class="mb-3">
                                <label for="phoneNumber" class="form-label">Enter Gcash Number:</label>
                                <input type="tel" class="form-control" id="phoneNumber" name="phoneNumber">
                            </div>
                            <div>
                                <input type="hidden" name="id" id="id_request">
                            </div>

                            <div class="mb-3">
                                <label for="amount" class="form-label">Down Payment:</label>
                                <input type="number" class="form-control" name="amount" id="amount">
                            </div>

                            <button type="button" id="otpsend" class="btn btn-success mb-3">Send OTP</button>

                            <div class="mb-3">
                                <input type="text" class="form-control" id="otp" name="otp" placeholder="Enter OTP">
                            </div>


                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Back</button>
                                <button type="submit" id="submitForm" class="btn btn-primary">Confirm & Pay</button>
                            </div>
                        </form>
                    </div>


                </div>
            </div>
        </div>
        <?= import_packages("datatable", "tyrax", "loading", "ctr", "path", "twal") ?>

        <script>
            addEventListener("DOMContentLoaded", () => {
                LOADING.load(true);

                setTimeout(() => LOADING.load(false), 1000)

            })
        </script>


        <script>
            function pindot(donwpayment, id) {
                amount.value = donwpayment;
                id_request.value = id;
                // 1. Get the DOM element of the modal
                const myModalEl = document.getElementById('paymentModal');
                // 2. Create a new Bootstrap Modal instance
                const modal = new bootstrap.Modal(myModalEl);
                // 3. Call the 'show' method
                modal.show();
            }
        </script>

        <script>
            document.addEventListener('DOMContentLoaded', () => {
                const packagesSection = document.getElementById('packagesSection');
                const orderSection = document.getElementById('orderSection');
                const pendingOrdersContainer = document.getElementById('pendingOrdersContainer');
                const completedOrdersContainer = document.getElementById('completedOrdersContainer');
                const showPackagesBtn = document.getElementById('showPackagesBtn');
                const showOrderBtn = document.getElementById('showOrderBtn');
                const changePackageBtn = document.getElementById('changePackageBtn');
                const showPackages2Btn = document.getElementById('showPackages2Btn');
                const packagesSection2 = document.getElementById('packagesSection2');

                const selectBtns = document.querySelectorAll('.select-btn');
                const backBtn = document.getElementById('backBtn');
                const logoutBtn = document.getElementById('logoutBtn');
                const userNameEl = document.getElementById('userName');

                let pendingOrders = [];
                let completedOrders = [];

                // Set a hardcoded user name for demonstration purposes
                userNameEl.textContent = 'John Doe';

                // Function to show the packages section and hide the order section
                const showPackages = () => {
                    packagesSection.classList.remove('hidden');
                    orderSection.classList.add('hidden');
                    backBtn.classList.add('hidden');
                    packagesSection2.classList.add('hidden')

                    showPackagesBtn.classList.add('bg-indigo-600', 'text-white');
                    showPackagesBtn.classList.remove('bg-gray-700', 'text-gray-300');
                    showOrderBtn.classList.add('bg-gray-700', 'text-gray-300');
                    showOrderBtn.classList.remove('bg-indigo-600', 'text-white');
                };

                // Function to show the order section and hide the packages section
                const showOrder = () => {
                    packagesSection.classList.add('hidden');
                    orderSection.classList.remove('hidden');
                    packagesSection2.classList.add('hidden')

                    backBtn.classList.remove('hidden');
                    showOrderBtn.classList.add('bg-indigo-600', 'text-white');
                    showOrderBtn.classList.remove('bg-gray-700', 'text-gray-300');
                    showPackagesBtn.classList.add('bg-gray-700', 'text-gray-300');
                    showPackagesBtn.classList.remove('bg-indigo-600', 'text-white');
                    renderOrders();
                };

                // Show Packages 2 Section
                const showPackages2 = () => {
                    packagesSection.classList.add('hidden');
                    orderSection.classList.add('hidden');
                    packagesSection2.classList.remove('hidden');
                    backBtn.classList.add('hidden');

                    showPackages2Btn.classList.add('bg-indigo-600', 'text-white');
                    showPackages2Btn.classList.remove('bg-gray-700', 'text-gray-300');

                    showPackagesBtn.classList.add('bg-gray-700', 'text-gray-300');
                    showPackagesBtn.classList.remove('bg-indigo-600', 'text-white');

                    showOrderBtn.classList.add('bg-gray-700', 'text-gray-300');
                    showOrderBtn.classList.remove('bg-indigo-600', 'text-white');
                };


                // Function to render the orders in their respective containers
                const renderOrders = () => {
                    pendingOrdersContainer.innerHTML = '';
                    if (pendingOrders.length === 0) {
                        pendingOrdersContainer.innerHTML = '<p class="text-gray-400 text-lg">You have no pending orders.</p>';
                    } else {
                        pendingOrders.forEach((order, index) => {
                            const orderCard = document.createElement('div');
                            orderCard.className = 'bg-gray-700 rounded-card p-6 shadow-lg flex justify-between items-center transition-transform hover-scale';
                            orderCard.innerHTML = `
                                <div>
                                    <h4 class="text-xl font-bold">${order.name}</h4>
                                    <p class="text-xl font-extrabold text-indigo-400 mt-1">$${order.price}<span class="text-base font-normal text-gray-400">/mo</span></p>
                                    <span class="status-pill bg-yellow-400 text-yellow-900 mt-2 inline-block">Pending</span>
                                </div>
                                <button data-index="${index}" class="confirm-btn px-4 py-2 rounded-full font-semibold transition-colors duration-300 bg-green-500 hover:bg-green-600 text-white">
                                    Complete Order
                                </button>
                            `;
                            pendingOrdersContainer.appendChild(orderCard);
                        });
                    }

                    completedOrdersContainer.innerHTML = '';
                    if (completedOrders.length === 0) {
                        completedOrdersContainer.innerHTML = '<p class="text-gray-400 text-lg">You have no completed orders.</p>';
                    } else {
                        completedOrders.forEach(order => {
                            const orderCard = document.createElement('div');
                            orderCard.className = 'bg-gray-700 rounded-card p-6 shadow-lg flex justify-between items-center transition-transform hover-scale';
                            orderCard.innerHTML = `
                                <div>
                                    <h4 class="text-xl font-bold">${order.name}</h4>
                                    <p class="text-xl font-extrabold text-indigo-400 mt-1">$${order.price}<span class="text-base font-normal text-gray-400">/mo</span></p>
                                    <span class="status-pill bg-green-500 text-green-900 mt-2 inline-block">Complete</span>
                                </div>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-8 h-8 text-green-400">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                </svg>
                            `;
                            completedOrdersContainer.appendChild(orderCard);
                        });
                    }
                };

                // Event listener for package selection buttons
                selectBtns.forEach(button => {
                    button.addEventListener('click', () => {
                        const packageName = button.dataset.packageName;
                        const packagePrice = button.dataset.packagePrice;

                        // Add the selected package to pending orders
                        pendingOrders.push({
                            name: packageName,
                            price: packagePrice
                        });

                        // Highlight the selected card and un-highlight others
                        document.querySelectorAll('.package-card').forEach(card => card.classList.remove('selected-package'));
                        button.closest('.package-card').classList.add('selected-package');

                        showOrder();
                    });
                });

                

                // Event listener for confirming a pending order
                document.addEventListener('click', (event) => {
                    if (event.target.classList.contains('confirm-btn')) {
                        const index = event.target.dataset.index;
                        const [confirmedOrder] = pendingOrders.splice(index, 1);
                        completedOrders.push(confirmedOrder);
                        renderOrders();
                    }
                });

                // Event listeners for navigation buttons
                showPackagesBtn.addEventListener('click', showPackages);
                showOrderBtn.addEventListener('click', showOrder);
                changePackageBtn.addEventListener('click', showPackages);
                backBtn.addEventListener('click', showPackages);
                showPackages2Btn.addEventListener('click', showPackages2);
                logoutBtn.addEventListener('click', () => {
                    console.log('User logged out.');
                    // In a real application, you would handle the logout logic here
                });

                // Initial state
                showPackags();
            });
        </script>

    </body>


    </html>



    <script>
        addEventListener("DOMContentLoaded", function() {
            tyrax.get({
                url: "services/get",
                response: (send) => {
                    let data = send.data;
                    data.forEach(column => {
                        $id = column.servicesID;
                        $sname = column.services_name;
                        DOM.add_html("#packagesSection", `
                        <div class="package-card bg-gray-700 rounded-card p-4 shadow-lg flex flex-col items-center transition-transform hover-scale">
                    <img src="${column.img}" alt="Basic package image" class="w-full h-auto rounded-lg mb-4">
                    <h3 class="text-2xl font-bold mb-1">${column.services_name}</h3>
                    <p class="text-center text-gray-300 text-sm mb-4">${column.description}</p>
                    <a href="${PATH.page("users/package", {id:$id,sname:$sname})}"><button class="btn" data-package-name="Basic" data-package-price="9" class="select-btn mt-auto w-full py-3 rounded-full font-bold transition-colors duration-300 bg-indigo-600 hover:bg-indigo-700 text-white shadow-lg">
                        <b>Select</b>
                    </button></a>
                </div>`)
                    });
                },

            })
        })
    </script>

    <script>
        addEventListener("DOMContentLoaded", function() {
            tyrax.get({
                //inspect:true,
                url: "request/get",
                request: {
                    user: localStorage.getItem("id")
                },
                response: (send) => {
                    let data = send.data;
                    if (data.length == 0) {
                        DOM.add_html("#request_container", `
        <span class="no-order"><b>No Orders</b></span>`);
                        return;
                    }
                    data.forEach(column => {
                        let container = "#";
                        let status = column.status;
                        let button = ``;
                        if (status == 1) {
                            container = '#request_container';
                            button = `<button class="cancel-button" onclick="del(${column.id})" delid="${column.id}">❌ Cancel Order</button>`;
                        }

                        if (status == 2) {
                            container = '#completedOrdersContainer';
                            let canceled = `<button class="cancel-button" onclick="del(${column.id})" delid="${column.id}">❌ Cancel Order</button>`;
                            button = `<button class="cancel-button"  onclick="pindot(${column.downpayment},${column.id})">Pay</button> ${canceled}`;
                        }

                        if (status == 3) {
                            container = '#on_going';
                        }

                        DOM.add_html(container, `
                            <h2>📸Order Requested</h2>
                        <div class="order-details">
                                <p><strong>Service Name:</strong> <span>${column.services_name}</span></p>
                                <p><strong>Package:</strong> <span>${column.package_name}</span></p>
                                <p><strong>Photographer:</strong> <span>${column.photographer}</span></p>
                                <p><strong>date time:</strong> <span>${column.date_time}</span></p>
                                <p><strong>Total Price:</strong> <span class="price">${column.price}</span></p>
                                <p><strong>Down Payment:</strong> <span class="down-payment">${column.downpayment}</span></p>
                            </div>
                            <div class="cancel-button-container">
                                ${button}  
                            </div>`)
                    });



                },

            })
        })
    </script>



    <script>
        function del(pid) {

            twal.ask({

                text: "Do you want to proceed cancel your order?"
            }).then((result) => {
                if (result.confirm) {
                    tyrax.post({
                        //inspect:true,
                        url: "orders/delete",
                        request: {
                            id: pid
                        },
                        response: function(send) {
                            if (send.code == 200) {
                                twal.ok({
                                    text: "Canceled Successfully"
                                }).then(() => location.reload());
                            }
                        }
                    })
                }
            });
        }
    </script>

    <script>
        addEventListener("DOMContentLoaded", () => {
            otpsend.addEventListener("click", () => {
                sendOtp()
            })

            function sendOtp() {
                $data = {
                    phoneNumber: phoneNumber.value,
                    amount: amount.value
                }
                tyrax.post({
                    url: "payment/otp",
                    data: $data,
                    wait: () => {
                        window.LOADING.load(true)
                    },
                    done: () => {
                        window.LOADING.load(false)
                    },
                    response: (send) => {
                        if (send.code == 200) {
                            twal.ok("OTP Sent")
                        } else {
                            twal.err(send.message);
                        }

                    }

                })
            }


            CTR.submit("#bookingForm", (formdata) => {
                tyrax.post({
                    url: "payment/pay",
                    data: formdata,
                    response: (send) => {
                        if (send.code == 200) {
                            twal.ok("Payment sent").then(() => location.href = PATH.page("users/home"));
                        } else {
                            twal.err(send.message);
                        }
                    }
                });
            });
        })
    </script>


    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #ffffff;
            /* White background */
            color: #000000;
            /* Black text */
        }

        .rounded-card {
            border-radius: 1.5rem;
            border: 2px solid #e60000;
            /* Red border */
            background-color: #ffffff;
            /* White background */
            color: #000000;
            /* Black text */
        }

        .transition-transform {
            transition-property: transform;
            transition-duration: 300ms;
        }

        .hover-scale:hover {
            transform: scale(1.02);
            box-shadow: 0 0 10px rgba(230, 0, 0, 0.3);
            /* Soft red shadow */
        }

        .selected-package {
            border: 3px solid #ff0000;
            /* Highlight selected card */
            box-shadow: 0 0 12px rgba(255, 0, 0, 0.4);
        }

        /* BUTTONS */
        .btn,
        button,
        .px-6.py-3,
        .cancel-button,
        .confirm-btn {
            background-color: #e60000 !important;
            /* Red */
            color: #ffffff !important;
            /* White text */
            border: none;
            border-radius: 30px;
            font-weight: bold;
            transition: all 0.3s ease-in-out;
            height: 55px;
            width: 200px;
        }

        .btn:hover,
        button:hover,
        .cancel-button:hover,
        .confirm-btn:hover {
            background-color: #cc0000 !important;
            /* Darker red */
        }

        /* Header icons and text */
        header {
            color: #000000;
        }

        svg {
            color: #e60000;
        }

        /* Card Containers */
        .order-container {
            background-color: #ffffff;
            color: #000000;
            border: 2px solid #e60000;
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0 4px 10px rgba(230, 0, 0, 0.1);
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
        }

        .order-container h2 {
            text-align: center;
            color: #e60000;
            margin-bottom: 20px;
            font-size: 1.8em;
        }

        .order-details {
            border-top: 2px solid #e60000;
            padding-top: 20px;
        }

        .order-details p {
            font-size: 1.1em;
            color: #000000;
            margin: 15px 0;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .order-details p strong {
            color: #e60000;
        }

        .order-details .price,
        .order-details .down-payment {
            font-weight: bold;
            color: #e60000;
        }

        /* Section titles */
        h2,
        h3 {
            color: #000000;
        }

        .no-order {
            color: #e60000;
            font-weight: bold;
        }

        /* Modal */
        .modal-content {
            background-color: #ffffff;
            color: #000000;
            border: 2px solid #e60000;
            border-radius: 15px;
        }

        .modal-title,
        .form-label {
            color: #000000;
        }

        .btn-close {
            filter: invert(1);
            /* Make close button visible on white background */
        }

        /* Navbar and controls */
        #showPackagesBtn,
        #showOrderBtn,
        #changePackageBtn {
            background-color: #e60000;
            color: #ffffff;
        }

        #showPackagesBtn:hover,
        #showOrderBtn:hover,
        #changePackageBtn:hover {
            background-color: #cc0000;
        }

        /* Status pills */
        .status-pill {
            border-radius: 9999px;
            font-weight: bold;
            font-size: 0.75rem;
            text-transform: uppercase;
            padding: 0.25rem 0.75rem;
            color: #ffffff;
            background-color: #e60000;
        }

        /* Remove dark classes from Tailwind overrides */
        .bg-gray-900,
        .bg-gray-800,
        .bg-gray-700 {
            background-color: #ffffff !important;
        }

        .text-gray-100,
        .text-gray-200,
        .text-gray-300,
        .text-gray-400 {
            color: #000000 !important;
        }

        .text-indigo-400,
        .text-indigo-600 {
            color: #e60000 !important;
        }

        .shadow-lg {
            box-shadow: 0 4px 10px rgba(230, 0, 0, 0.1);
        }
    </style>