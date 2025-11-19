<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wedding Prenup Packages - Cebu City</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            font-family: 'Times New Roman', Times, serif;
            background-color: #f2f2f2;
            color: #1a1a1a;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 20px;
        }

        .top-section {
            width: 100%;
            display: flex;
            justify-content: flex-end;
            padding-bottom: 20px;
        }

        .add-new-package-button {
            background-color: #ff0000;
            color: white;
            border: none;
            padding: 10px 20px;
            font-size: 1em;
            font-weight: bold;
            cursor: pointer;
            text-transform: uppercase;
            border-radius: 5px;
        }

        .add-new-package-button:hover {
            background-color: #cc0000;
        }

        .packages-container {
            display: flex;
            justify-content: center;
            align-items: flex-start;
            flex-wrap: wrap;
            gap: 20px;
        }

        .package-card {
            background-color: white;
            color: black;
            border: 1px solid #ccc;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 250px;
            height: 600px;
            display: flex;
            flex-direction: column;
            text-align: center;
            overflow: hidden;
            position: relative;
        }

        .card-management-icons {
            position: absolute;
            top: 10px;
            right: 10px;
            display: flex;
            gap: 5px;
            z-index: 10;
        }

        .card-management-icon {
            color: #ff0000;
            cursor: pointer;
            font-size: 1.2em;
        }

        .card-management-icon:hover {
            color: #cc0000;
        }

        .header {
            background-color: #1a1a1a;
            color: white;
            padding: 15px;
            position: relative;
            flex-shrink: 0;
        }

        .header h3 {
            margin: 0;
            font-size: 1.5em;
            letter-spacing: 1px;
        }

        .promo {
            background-color: #ff0000;
            color: white;
            padding: 5px 10px;
            font-size: 0.9em;
            font-weight: bold;
            display: inline-block;
            margin-top: 10px;
        }

        .price-section {
            padding: 20px;
            border-bottom: 1px dashed #ccc;
            flex-shrink: 0;
        }

        .price-section .promo-price {
            font-size: 2.5em;
            color: #ff0000;
            font-weight: bold;
            margin: 0;
        }

        .price-section .regular-price {
            font-size: 0.9em;
            text-decoration: line-through;
            color: #888;
        }

        .price-section .downpayment {
            font-size: 0.8em;
            color: #ff0000;
            margin-top: 5px;
        }

        .details-section {
            padding: 20px;
            text-align: left;
            flex-grow: 1;
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
        }

        .details-section h4 {
            font-size: 1.1em;
            margin-top: 0;
            margin-bottom: 10px;
            color: #ff0000;
            text-align: center;
            flex-shrink: 0;
        }

        .details-section ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
            flex-grow: 1;
        }

        .details-section li {
            position: relative;
            padding-left: 20px;
            margin-bottom: 8px;
            font-size: 0.9em;
        }

        .details-section li:before {
            content: '\2713';
            color: #ff0000;
            font-weight: bold;
            position: absolute;
            left: 0;
        }

        .button-container {
            padding: 0 20px 20px;
            margin-top: auto;
            flex-shrink: 0;
            display: flex;
            justify-content: space-around;
            gap: 10px;
        }

        .package-action-button {
            background-color: transparent;
            color: black;
            border: 1px solid black;
            padding: 10px;
            font-size: 1em;
            font-weight: bold;
            cursor: pointer;
            flex-grow: 1;
            text-transform: uppercase;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 4px;
        }

        .package-action-button i {
            margin: 0;
            font-size: 1.2em;
        }

        .package-action-button.add {
            color: #008000;
            border: 2px solid #008000;
        }

        .package-action-button.add:hover {
            background-color: rgba(0, 128, 0, 0.1);
        }

        .package-action-button.update {
            color: #ff0000;
            border: 2px solid #ff0000;
        }

        .package-action-button.update:hover {
            background-color: rgba(255, 0, 0, 0.1);
        }

        .package-action-button.delete {
            color: #ff0000;
            border: 2px solid #ff0000;
        }

        .package-action-button.delete:hover {
            background-color: rgba(255, 0, 0, 0.1);
        }

        .button-text {
            margin-left: 5px;
            color: inherit;
        }

        /* --- Modal Styles --- */
        .modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.8);
            justify-content: center;
            align-items: center;
        }

        .modal-content {
            background-color: white;
            color: black;
            padding: 30px;
            border: 2px solid #ff0000;
            width: 400px;
            max-width: 90%;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.5);
            position: relative;
            border-radius: 8px;
        }

        .close-button {
            color: #ff0000;
            position: absolute;
            top: 10px;
            right: 15px;
            font-size: 28px;
            font-weight: bold;
            cursor: pointer;
        }

        .close-button:hover,
        .close-button:focus {
            color: #cc0000;
            text-decoration: none;
        }

        .modal-content h2 {
            text-align: center;
            color: #ff0000;
            margin-top: 0;
        }

        .modal-content form {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .modal-content label {
            font-weight: bold;
            color: black;
        }

        .modal-content input[type="text"],
        .modal-content textarea {
            width: 100%;
            padding: 10px;
            background-color: #f2f2f2;
            color: black;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            font-family: 'Times New Roman', Times, serif;
        }

        .modal-content .button-group {
            display: flex;
            justify-content: flex-end;
            gap: 10px;
            margin-top: 20px;
        }

        .modal-content button {
            padding: 10px 20px;
            border: none;
            cursor: pointer;
            font-weight: bold;
            text-transform: uppercase;
            border-radius: 4px;
        }

        .modal-content .submit-button {
            background-color: #ff0000;
            color: white;
        }

        .modal-content .submit-button:hover {
            background-color: #cc0000;
        }

        .modal-content .cancel-button {
            background-color: #ccc;
            color: black;
        }

        .modal-content .cancel-button:hover {
            background-color: #999;
        }

        /* Update the top-section to use space-between */
        .top-section {
            width: 100%;
            display: flex;
            justify-content: space-between;
            /* Change from flex-end */
            align-items: center;
            /* Align items vertically */
            padding: 20px;
        }

        /* Add styles for the back button */
        .back-button {
            font-size: 1.5em;
            /* Adjust size as needed */
            color: #ff0000;
            /* Use the red color from the design */
            text-decoration: none;
        }

        .back-button:hover {
            color: #cc0000;
        }

        /* Ensure the add new package button stays on the right */
        .add-new-package-button {
            background-color: #ff0000;
            color: white;
            border: none;
            padding: 10px 20px;
            font-size: 1em;
            font-weight: bold;
            cursor: pointer;
            text-transform: uppercase;
            border-radius: 5px;
        }
    </style>
</head>

<body>

    <div class="top-section">
        <a href="<?= page('admin/services') ?>" class="back-button"><i class="fas fa-arrow-left"></i></a>
        <button id="add-new-package-btn" class="add-new-package-button">Add New Package</button>
    </div>

    <div class="packages-container" id="packageparent">

    </div>

    <div id="add-package-modal" class="modal">
        <div class="modal-content">
            <span class="close-button">&times;</span>
            <h2>Add New Package</h2>
            <form id="add-package-form">
                <label for="packageName">Package Name:</label>
                <input type="text" id="packageName" name="packageName">

                <label for="promoPrice">Promo Price (P):</label>
                <input type="text" id="promoPrice" name="promoPrice">

                <label for="regularPrice">Regular Price (P):</label>
                <input type="text" id="regularPrice" name="regularPrice">

                <label for="downpayment">Downpayment (P):</label>
                <input type="text" id="downpayment" name="downpayment">

                <label for="inclusions">Inclusions (separate each item with a new line):</label>
                <textarea id="inclusions" name="inclusions" rows="5"></textarea>

                <div class="button-group">
                    <button type="button" class="cancel-button">Cancel</button>
                    <button type="submit" class="submit-button">Add Package</button>
                </div>
            </form>
        </div>
    </div>

    <div id="edit-package-modal" class="modal">
        <div class="modal-content">
            <span class="close-button">&times;</span>
            <h2>Edit Package</h2>
            <form id="edit-package-form">
                <input type="hidden" id="edit-package-id">

                <label for="edit-packageName">Package Name:</label>
                <input type="text" id="edit-packageName" name="packageName" required>

                <label for="edit-promoText">Promo Text:</label>
                <input type="text" id="edit-promoText" name="promoText">

                <label for="edit-promoPrice">Promo Price (P):</label>
                <input type="text" id="edit-promoPrice" name="promoPrice" required>

                <label for="edit-regularPrice">Regular Price (P):</label>
                <input type="text" id="edit-regularPrice" name="regularPrice">

                <label for="edit-downpayment">Downpayment (P):</label>
                <input type="text" id="edit-downpayment" name="downpayment">

                <label for="edit-inclusions">Inclusions (separate each item with a new line):</label>
                <textarea id="edit-inclusions" name="inclusions" rows="5" required></textarea>

                <div class="button-group">
                    <button type="button" class="cancel-button">Cancel</button>
                    <button type="submit" class="submit-button">Save Changes</button>
                </div>
            </form>
        </div>
    </div>

    <script src="<?= assets('code/loading.js') ?>"></script>
    <?= import_twal() ?>
    <?= import_tyrux() ?>
    <script>
        // Get all modals and their buttons
        const addModal = document.getElementById("add-package-modal");
        const editModal = document.getElementById("edit-package-modal");
        const addNewBtn = document.getElementById("add-new-package-btn");
        const editIcons = document.querySelectorAll(".edit-icon");
        const closeButtons = document.querySelectorAll(".close-button");
        const cancelButtons = document.querySelectorAll(".cancel-button");

        // Event listener to open the "Add New" modal
        addNewBtn.addEventListener("click", () => {
            addModal.style.display = "flex";
        });

        // Event listeners to open the "Edit" modal and pre-fill data
        editIcons.forEach(icon => {
            icon.addEventListener("click", () => {
                const card = icon.closest(".package-card");
                const packageName = card.querySelector("h3").textContent;
                const promoText = card.querySelector(".promo") ? card.querySelector(".promo").textContent : '';
                const promoPrice = card.querySelector(".promo-price").textContent.replace('P', '').trim();
                const regularPrice = card.querySelector(".regular-price") ? card.querySelector(".regular-price").textContent.replace('Regular Price: P', '').trim() : '';
                const downpayment = card.querySelector(".downpayment") ? card.querySelector(".downpayment").textContent.replace('Downpayment P', '').trim() : '';
                const inclusions = Array.from(card.querySelectorAll(".details-section li")).map(li => li.textContent).join('\n');

                document.getElementById("edit-packageName").value = packageName;
                document.getElementById("edit-promoText").value = promoText;
                document.getElementById("edit-promoPrice").value = promoPrice;
                document.getElementById("edit-regularPrice").value = regularPrice;
                document.getElementById("edit-downpayment").value = downpayment;
                document.getElementById("edit-inclusions").value = inclusions;

                editModal.style.display = "flex";
            });
        });

        // Event listeners to close all modals
        closeButtons.forEach(btn => {
            btn.addEventListener("click", () => {
                addModal.style.display = "none";
                editModal.style.display = "none";
            });
        });

        cancelButtons.forEach(btn => {
            btn.addEventListener("click", () => {
                addModal.style.display = "none";
                editModal.style.display = "none";
            });
        });

        // Close modals when clicking outside
        window.addEventListener("click", (event) => {
            if (event.target === addModal || event.target === editModal) {
                event.target.style.display = "none";
            }
        });

        // Handle "Add New Package" form submission
        document.getElementById("add-package-form").onsubmit = function(event) {
            create();
        };

        // Handle "Edit Package" form submission
        document.getElementById("edit-package-form").onsubmit = function(event) {
            event.preventDefault();
            alert("Package updated!");
            editModal.style.display = "none";
        };

        // Event listeners for bottom card buttons
        document.querySelectorAll('.package-action-button.add').forEach(button => {
            button.addEventListener('click', function() {
                const packageName = this.closest('.package-card').querySelector('h3').textContent;
                alert(`Added "${packageName}" to your selection!`);
            });
        });

        document.querySelectorAll('.package-action-button.update').forEach(button => {
            button.addEventListener('click', function() {
                const packageName = this.closest('.package-card').querySelector('h3').textContent;
                alert(`Preparing to update "${packageName}". (This would open an edit modal)`);
            });
        });

        document.querySelectorAll('.package-action-button.delete').forEach(button => {
            button.addEventListener('click', function() {
                const packageName = this.closest('.package-card').querySelector('h3').textContent;
                if (confirm(`Are you sure you want to delete "${packageName}"?`)) {
                    this.closest('.package-card').remove();
                    alert(`"${packageName}" has been deleted.`);
                }
            });
        });

        addEventListener("DOMContentLoaded", function() {
            read();
        });


        function create() {
            event.preventDefault();
            const data = DOM.form_data("#add-package-form");
            data['service_id'] = "<?= get('id') ?>";

            tyrax.post({
                url: "package/add",
                request: data,
                wait: LOADING.load(true),
                done: LOADING.load(false),
                response: function(send) {
                    if (send.code == 404) {
                        twal.err({
                            text: send.message
                        });
                    } else if (send.code == 200) {
                        twal.ok({
                            text: send.message
                        }).then(() => location.reload());
                    }else if( send.code == 101){
                        twal.err({
                            text: send.message
                        });
                    }
                }
            })

        }

        function read() {
            const getid = "<?= get('id') ?>";
            tyrax.post({
                url: "package/get",
                request: {
                    id: getid
                },
                response: function(send) {
                    if (send.code == 200) {
                        const data = send.data;
                        data.forEach(column => {
                            DOM.add_html("#packageparent", `<div class="package-card">
            <div class="header">
                <h3>${column.package_name}</h3>
            </div>
            <div class="price-section">
                <div class="promo-price">₱${column.price}</div>
                <div class="regular-price">Regular Price: ₱${column.original}</div>
                <div class="downpayment">Downpayment ₱${column.downpayment}</div>
            </div>
            <div class="details-section">
                <h4>Inclusions</h4>
                <ul>
                        ${column.description}
                </ul>
            </div>
            <div class="button-container">
                
                <button id="edit-card" class="package-action-button"><i class="fas fa-edit card-management-icon edit-icon" data-package-id="2"></i></button>
                <button class="package-action-button delete" onclick="del(${column.id})"><i class="fas fa-trash-alt"></i></button>
            </div>
        </div>`);
                        });
                    }
                }
            })
        }


        function del(pid) {
            twal.ask({
                text: "Do you want to proceed deleting package?"
            }).then((result) => {
                if (result.confirm) {
                    tyrax.post({
                        url: "package/delete",
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
</body>

</html>