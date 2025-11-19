<!DOCTYPE html>
<html lang="en">

<?= include_page('header') ?>

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
        <?= include_page('sidebar') ?>
        <!-- Sidebar End -->


        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            <?= include_page('navbar') ?>
            <!-- Navbar End -->


            <div class="container">
                <div class="header-bar">
                    <h1>Add Pree Event Session</h1>
                    <button id="add-card-btn" class="add-button">+ Add New Card</button>
                </div>

                <div class="card-grid" id="card-grid">
                    
                    
                    
                </div>
            </div>

            <div id="card-modal" class="modal">
                <div class="modal-content">
                    <span class="close-btn">&times;</span>
                    <h2>Add/Edit Card</h2>
                    <form id="card_form">
                        <input type="hidden" id="card-id">
                        <label for="name-input">Name</label>
                        <input name="prename" type="text" id="name-input" required>

                        <label for="price-input">Price</label>
                        <input name="preprice" type="text" id="price-input" placeholder="$0.00" required>

                        <label for="description-input">Description</label>
                        <textarea name="predescription" id="description-input" rows="3"></textarea>

                        <button type="submit" id="submit-card-btn">Save Card</button>
                    </form>
                </div>
            </div>
            <!-- Content End -->


            <!-- Back to Top -->
            <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
        </div>

        <?= import_packages("datatable", "tyrax", "loading", "ctr", "path", "twal") ?>

        <script>
            addEventListener("DOMContentLoaded", () => {
                LOADING.load(true);

                setTimeout(() => LOADING.load(false), 1500)

            })
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

<script>
    card_form.addEventListener("submit", function() {
        event.preventDefault();
        $data = DOM.form_object("#card_form");

        tyrax.post({
            url: "preevent/add",
            request: $data,
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
    })
</script>


<script>
    addEventListener("DOMContentLoaded", function() {
        tyrax.get({
            url: "preevent/get",
            response: (send) => {
                let data = send.data;
                data.forEach(column => {
                    DOM.add_html("#card-grid", `
                    <div class="card" data-id="1">
                        <h3 class="card-name">${column.prename}</h3>
                        <p class="card-price">₱${column.preprice}</p>
                        <p class="card-description">${column.predescription}</p>
                        <div class="card-actions">
                            <i class="fas fa-edit edit-icon" title="Edit"></i>
                            <i class="fas fa-trash-alt delete-icon" onclick="del(${column.id})" title="Delete"></i>
                        </div>
                    </div>
                    `)
                });
            },

        })
    })
</script>

<script>
    function del(pid) {
            twal.ask({
                text: "Do you want to proceed deleting package?"
            }).then((result) => {
                if (result.confirm) {
                    tyrax.post({
                        url: "preevent/delete",
                        request: {
                            id: pid
                        },
                        response: function(send) {
                            if (send.code == 200) {
                                twal.ok({
                                    text: "Deleted Successfully"
                                }).then(() => location.reload());
                            }
                        }
                    })
                }
            });
        }
</script>


<script>
    document.addEventListener('DOMContentLoaded', () => {
        const cardGrid = document.getElementById('card-grid');
        const addCardBtn = document.getElementById('add-card-btn');
        const modal = document.getElementById('card-modal');
        const closeBtn = document.querySelector('.close-btn');
        const cardForm = document.getElementById('card_form');

        // Form Inputs
        const cardIdInput = document.getElementById('card-id');
        const nameInput = document.getElementById('name-input');
        const priceInput = document.getElementById('price-input');
        const descriptionInput = document.getElementById('description-input');

        let nextCardId = 6; // Start ID after the initial 5 cards

        // --- Modal Functions ---
        const openModal = () => {
            modal.classList.add('active');
        };

        const closeModal = () => {
            modal.classList.remove('active');
            // Clear the form after closing
            cardForm.reset();
            cardIdInput.value = '';
        };

        // Open Modal Listener
        addCardBtn.addEventListener('click', () => {
            // Set form for adding a new card
            document.querySelector('.modal h2').textContent = 'Add New Card';
            document.getElementById('submit-card-btn').textContent = 'Add Card';
            openModal();
        });

        // Close Modal Listeners
        closeBtn.addEventListener('click', closeModal);
        window.addEventListener('click', (event) => {
            if (event.target === modal) {
                closeModal();
            }
        });

        // --- Card Creation/Update Function ---
        const createCardElement = (id, name, price, description) => {
            const cardDiv = document.createElement('div');
            cardDiv.classList.add('card');
            cardDiv.setAttribute('data-id', id);
            cardDiv.innerHTML = `
            <h3 class="card-name">${name}</h3>
            <p class="card-price">${price}</p>
            <p class="card-description">${description}</p>
            <div class="card-actions">
                <i class="fas fa-edit edit-icon" title="Edit"></i>
                <i class="fas fa-trash-alt delete-icon" title="Delete"></i>
            </div>
        `;
            return cardDiv;
        };

        // --- Form Submission Handler ---
        cardForm.addEventListener('submit', (event) => {
            event.preventDefault();

            const id = cardIdInput.value;
            const name = nameInput.value;
            const price = priceInput.value;
            const description = descriptionInput.value;

            if (id) {
                // EDIT/UPDATE existing card
                const existingCard = document.querySelector(`.card[data-id="${id}"]`);
                if (existingCard) {
                    existingCard.querySelector('.card-name').textContent = name;
                    existingCard.querySelector('.card-price').textContent = price;
                    existingCard.querySelector('.card-description').textContent = description;
                    // Add a temporary subtle glow animation for update confirmation
                    existingCard.style.boxShadow = '0 0 10px 3px #007bff';
                    setTimeout(() => existingCard.style.boxShadow = '', 500);
                }
            } else {
                // ADD new card
                const newCard = createCardElement(nextCardId++, name, price, description);
                cardGrid.appendChild(newCard);
                // Add a simple fade-in animation for new card
                newCard.style.opacity = '0';
                setTimeout(() => newCard.style.opacity = '1', 10);
            }

            closeModal();
        });

        // --- Delegation for Edit/Delete Clicks ---
        cardGrid.addEventListener('click', (event) => {
            const target = event.target;

            // Find the closest card element
            const card = target.closest('.card');
            if (!card) return;

            // --- DELETE Functionality ---
            

            // --- EDIT Functionality ---
            if (target.classList.contains('edit-icon')) {
                // Populate modal with card data
                cardIdInput.value = card.dataset.id;
                nameInput.value = card.querySelector('.card-name').textContent;
                priceInput.value = card.querySelector('.card-price').textContent;
                descriptionInput.value = card.querySelector('.card-description').textContent;

                // Set modal for editing
                document.querySelector('.modal h2').textContent = 'Edit Card';
                document.getElementById('submit-card-btn').textContent = 'Save Changes';
                openModal();
            }
        });
    });
</script>

<style>
    .container {
        max-width: 1200px;
        margin: 0 auto;
        /* Remove text-align: center; as Flexbox will handle alignment */
    }

    /* --- NEW Header Bar Styling --- */
    .header-bar {
        display: flex;
        /* Enable Flexbox */
        justify-content: space-between;
        /* Pushes items to opposite ends */
        align-items: center;
        /* Vertically aligns them */
        margin-bottom: 30px;
        /* Provides space between the header and the card grid */
    }

    /* Update h1 styling to remove margin-bottom that might interfere */
    .header-bar h1 {
        color: #333;
        margin: 0;
        /* Remove default margins to prevent layout issues */
        font-size: 2em;
        /* Ensure it's prominent */
    }

    /* Remove or update .add-button styling */


    h1 {
        color: #333;
        margin-bottom: 20px;
    }

    /* --- Add Button Styling --- */
    .add-button {
        padding: 10px 20px;
        margin-bottom: 30px;
        margin-top: 30px;
        background-color: #ff0040ff;
        color: white;
        border: none;
        border-radius: 5px;
        font-size: 16px;
        cursor: pointer;
        transition: background-color 0.3s, transform 0.2s;
        /* Simple Animation */
    }

    .add-button:hover {
        background-color: #0056b3;
        transform: translateY(-2px);
    }

    /* --- Card Grid Layout --- */
    .card-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 20px;
    }

    /* --- Individual Card Styling --- */
    .card {
        background-color: white;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        text-align: left;
        transition: box-shadow 0.3s ease-in-out, transform 0.3s;
        /* Simple Animation */
    }

    .card:hover {
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.15);
        transform: translateY(-5px);
        /* Lift animation */
    }

    .card-name {
        color: #333;
        margin-top: 0;
        margin-bottom: 10px;
        font-size: 1.5em;
    }

    .card-price {
        color: #28a745;
        /* Green for price */
        font-size: 1.2em;
        font-weight: bold;
        margin-bottom: 10px;
    }

    .card-description {
        color: #666;
        font-size: 0.9em;
        margin-bottom: 15px;
    }

    /* --- Card Actions (Icons) --- */
    .card-actions {
        text-align: right;
    }

    .edit-icon,
    .delete-icon {
        cursor: pointer;
        font-size: 1.1em;
        margin-left: 10px;
        transition: color 0.2s;
    }

    .edit-icon {
        color: #ffc107;
        /* Yellow/Gold for Edit */
    }

    .edit-icon:hover {
        color: #e0a800;
    }

    .delete-icon {
        color: #dc3545;
        /* Red for Delete */
    }

    .delete-icon:hover {
        color: #c82333;
    }

    /* --- Modal Styling --- */
    .modal {
        display: none;
        /* Hidden by default */
        position: fixed;
        z-index: 1;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgba(0, 0, 0, 0.4);
        /* Fade-in animation for modal container */
        opacity: 0;
        transition: opacity 0.3s ease-in-out;
    }

    .modal.active {
        display: block;
        opacity: 1;
    }

    .modal-content {
        background-color: #fefefe;
        margin: 10% auto;
        /* Center the modal vertically */
        padding: 20px;
        border-radius: 8px;
        width: 90%;
        max-width: 400px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
        /* Slide-down animation for modal content */
        transform: translateY(-50px);
        transition: transform 0.3s ease-in-out;
    }

    .modal.active .modal-content {
        transform: translateY(0);
    }

    .close-btn {
        color: #aaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
        cursor: pointer;
    }

    .close-btn:hover,
    .close-btn:focus {
        color: #333;
        text-decoration: none;
    }

    /* --- Form Styling --- */
    #card_form input[type="text"],
    #card_form textarea {
        width: 100%;
        padding: 10px;
        margin: 8px 0 15px 0;
        display: inline-block;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
    }

    #submit-card-btn {
        width: 100%;
        background-color: #28a745;
        color: white;
        padding: 10px 15px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-size: 16px;
        transition: background-color 0.3s;
    }

    #submit-card-btn:hover {
        background-color: #1e7e34;
    }
</style>