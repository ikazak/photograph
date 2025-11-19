<!DOCTYPE html>
<html lang="en">

<?= include_page('header') ?> <!-- Assuming this is still needed -->

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
        <?= include_page('photoex/phsidebar') ?> <!-- Assuming this is still needed -->
        <!-- Sidebar End -->

        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            <?= include_page('photoex/phnavbar') ?> <!-- Assuming this is still needed -->
            <!-- Navbar End -->

            <div class="container py-5">
                <div class="row justify-content-center">
                    <!-- Card 1: Displays Jamie Portrait's data -->
                    <div class="col-lg-10 mx-auto mb-4">
                        <div class="card bg-dark text-light border-secondary shadow-sm overflow-hidden">
                            <div class="row g-0">
                                <div class="col-md-4">
                                    <img src="<?= assets() ?>/img/wed.jpg" class="card-image-source img-fluid rounded-start w-100 h-100" alt="Jamie Portrait" style="object-fit: cover;">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body d-flex flex-column h-100">

                                        <h3 class="card-title h3 text-light">Jamie Portrait</h3>

                                        <p class="text-info text-uppercase fw-medium mb-2">Wedding & Event Photographer</p>

                                        <p class="text-muted mb-2"><i class="fas fa-birthday-cake me-1"></i> 35 years old</p>
                                        <div class="mb-3">

                                            <strong class="fs-6">Skills:</strong>
                                            <div>
                                                <span class="badge bg-secondary me-1 mb-1">Portraiture</span>
                                                <span class="badge bg-secondary me-1 mb-1">Event Coverage</span>
                                                <span class="badge bg-secondary me-1 mb-1">Candid Moments</span>
                                                <span class="badge bg-secondary me-1 mb-1">Studio Lighting</span>
                                            </div>
                                        </div>

                                        <p class="card-text text-muted mb-3 fs-6">
                                            Capturing the magic of your special days with a creative and personal touch. Passionate about storytelling through images.
                                        </p>
                                        <div class="text-end mt-auto">
                                            <button type="button" class="btn btn-sm btn-outline-light me-2" data-bs-toggle="modal" data-bs-target="#viewPicturesModal">
                                                <i class="fas fa-images me-1"></i> <b>Upload Photo</b>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <!-- Back to Top -->
            <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
        </div>
        <!-- Content End -->
    </div>

    <!-- MODAL HTML START -->
    <div class="modal fade" id="viewPicturesModal" tabindex="-1" aria-labelledby="viewPicturesModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content bg-dark text-light">
                <div class="modal-header border-secondary">
                    <h5 class="modal-title" id="viewPicturesModalLabel">More Pictures of Jamie Portrait</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p class="text-secondary">Existing pictures will be shown here. Use the tabs below to upload new works for specific categories.</p>

                    <div class="tab-container">
                        <input type="radio" name="tab-group" id="tab1" checked>
                        <input type="radio" name="tab-group" id="tab2">
                        <input type="radio" name="tab-group" id="tab3">
                        <input type="radio" name="tab-group" id="tab4">

                        <div class="tab-labels">
                            <label for="tab1" class="tab-label">Wedding 💍</label>
                            <label for="tab2" class="tab-label">Birthday 🎂</label>
                            <label for="tab3" class="tab-label">Graduation 🎓</label>
                            <label for="tab4" class="tab-label">Other Events 🎉</label>
                        </div>

                        <div class="tab-content-container">

                            <div id="content1" class="tab-content">
                                <h3>Wedding Upload</h3>
                                <p class="text-secondary">Upload pictures related to wedding events.</p>
                                <form id="wedding-form" >
                                    <div class="upload-section">
                                        <h4>Upload Photos:</h4>
                                        <label for="wedding-photo-upload" class="upload-button"><i class="fas fa-plus-circle me-1"></i> Choose Wedding Photos</label>
                                        <input type="file" id="wedding-photo-upload" class="photo-upload-input" name="img" accept="image/*" multiple>
                                        <p class="upload-note">Max 5 photos, JPEG or PNG format.</p>
                                        <input type="hidden" name="category" value="wedding">

                                        <div class="preview-area row mt-3 g-2" id="wedding-preview">
                                        </div>

                                        <button type="submit" class="btn btn-primary mt-3"><i class="fas fa-upload me-1"></i> Upload Selected Photos</button>
                                    </div>
                                </form>
                            </div>

                            <div id="content2" class="tab-content">
                                <h3>Birthday Upload</h3>
                                <p class="text-secondary">Upload pictures related to birthday events.</p>
                                <form id="birthday-form" >
                                    <div class="upload-section">
                                        <h4>Upload Photos:</h4>
                                        <label for="birthday-photo-upload" class="upload-button"><i class="fas fa-plus-circle me-1"></i> Choose Birthday Photos</label>
                                        <input type="file" id="birthday-photo-upload" class="photo-upload-input" name="img" accept="image/*" multiple>
                                        <p class="upload-note">Max 5 photos, JPEG or PNG format.</p>
                                        <input type="hidden" name="category" value="birthday">
                                        <div class="preview-area row mt-3 g-2" id="birthday-preview"></div>
                                        <button type="submit" class="btn btn-primary mt-3"><i class="fas fa-upload me-1"></i> Upload Selected Photos</button>
                                    </div>
                                </form>
                            </div>

                            <div id="content3" class="tab-content">
                                <h3>Graduation Upload</h3>
                                <p class="text-secondary">Upload pictures related to graduation events.</p>
                                <form id="graduation-form" >
                                    <div class="upload-section">
                                        <h4>Upload Photos:</h4>
                                        <label for="graduation-photo-upload" class="upload-button"><i class="fas fa-plus-circle me-1"></i> Choose Graduation Photos</label>
                                        <input type="file" id="graduation-photo-upload" class="photo-upload-input" name="img" accept="image/*" multiple>
                                        <p class="upload-note">Max 5 photos, JPEG or PNG format.</p>
                                        <input type="hidden" name="category" value="graduation">
                                        <div class="preview-area row mt-3 g-2" id="graduation-preview"></div>
                                        <button type="submit" class="btn btn-primary mt-3"><i class="fas fa-upload me-1"></i> Upload Selected Photos</button>
                                    </div>
                                </form>
                            </div>

                            <div id="content4" class="tab-content">
                                <h3>Other Events Upload</h3>
                                <p class="text-secondary">Upload pictures related to other corporate or social events.</p>
                                <form id="events-form" >
                                    <div class="upload-section">
                                        <h4>Upload Photos:</h4>
                                        <label for="events-photo-upload" class="upload-button"><i class="fas fa-plus-circle me-1"></i> Choose Event Photos</label>
                                        <input type="file" id="events-photo-upload" class="photo-upload-input" name="img" accept="image/*" multiple>
                                        <p class="upload-note">Max 5 photos, JPEG or PNG format.</p>
                                        <input type="hidden" name="category" value="events">
                                        <div class="preview-area row mt-3 g-2" id="events-preview"></div>
                                        <button type="submit" class="btn btn-primary mt-3"><i class="fas fa-upload me-1"></i> Upload Selected Photos</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>

                
                <div class="modal-footer border-secondary">
                    <!-- Hidden file input for picture selection -->
                    <input type="file" id="newPictureInput" accept="image/*" style="display: none;">
                    <!-- Button to trigger file input -->
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- MODAL HTML END -->
     <?= import_packages("datatable", "tyrax", "loading", "ctr", "path", "twal") ?>

    <script>
        addEventListener("DOMContentLoaded", () => {
            LOADING.load(true);

            setTimeout(() => LOADING.load(false), 1000)

        })
    </script>

    <script>
        addEventListener("DOMContentLoaded", ()=>{

            CTR.submit("#wedding-form",function(data){
            data.append("user_id",localStorage.getItem("id"))
            tyrax.post({
                //test:true,
                url: "photo/upload",
                request: data,
                response: (send) => {
                    if (send.code == 200) {
                        twal.ok("sumited successfuly").then(() => location.reload())
                    } else {
                        twal.err(send.message);
                    }
                }
            })
        })
        })

        
        
    </script>

        <script>
            addEventListener("DOMContentLoaded", ()=>{

                CTR.submit("#birthday-form",function(data){
            data.append("user_id",localStorage.getItem("id"))
            tyrax.post({
                //test:true,

                url: "photo/upload",
                request: data,
                response: (send) => {
                    if (send.code == 200) {
                        twal.ok("sumited successfuly").then(() => location.reload())
                    } else {
                        twal.err(send.message);
                    }
                }
            })
        })
            })

        
        
    </script>

        <script>
            addEventListener("DOMContentLoaded", ()=>{

                CTR.submit("#graduation-form",function(data){
            data.append("user_id",localStorage.getItem("id"))
            tyrax.post({
                //test:true,
                url: "photo/upload",
                request: data,
                
                response: (send) => {
                    if (send.code == 200) {
                        twal.ok("sumited successfuly").then(() => location.reload())
                    } else {
                        twal.err(send.message);
                    }
                }
            })
        })
            })

        
        
    </script>

         <script>
            addEventListener("DOMContentLoaded", ()=>{
                
                CTR.submit("#events-form",function(data){
            data.append("user_id",localStorage.getItem("id"))
            tyrax.post({
                //test:true,

                url: "photo/upload",
                request: data,
                response: (send) => {
                    if (send.code == 200) {
                        twal.ok("sumited successfuly").then(() => location.reload())
                    } else {
                        twal.err(send.message);
                    }
                }
            })
        })
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

    <!-- CUSTOM JAVASCRIPT FOR MODAL PICTURE UPLOAD -->

    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Select all file inputs with the class 'photo-upload-input'
            const fileInputs = document.querySelectorAll('.photo-upload-input');

            // Function to handle file selection and preview
            const handleFileUpload = (event) => {
                const input = event.target;
                const files = input.files;

                // Get the specific preview area for this input by finding the closest parent form 
                // and then querying for the associated preview-area
                const form = input.closest('form');
                if (!form) return;

                const previewArea = form.querySelector('.preview-area');
                if (!previewArea) return;

                // Clear previous previews from this tab's preview area
                previewArea.innerHTML = '';

                if (files.length === 0) {
                    return; // No files selected
                }

                // Loop through all selected files to create a preview for each
                Array.from(files).forEach((file, index) => {
                    // Limit to 5 files as per your note
                    if (index >= 5) {
                        alert('You can only upload a maximum of 5 photos.');
                        return;
                    }

                    if (file.type.startsWith('image/')) {
                        const reader = new FileReader();

                        reader.onload = function(e) {
                            // 1. Create the Bootstrap column container
                            const newCol = document.createElement('div');
                            // Use a smaller column class for multiple small previews
                            newCol.className = 'col-6 col-sm-4 col-md-3 mb-2';

                            // 2. Create the image element
                            const newImg = document.createElement('img');
                            newImg.src = e.target.result; // The data URL for the image preview
                            newImg.className = 'img-fluid rounded shadow';
                            newImg.alt = `Preview ${index + 1}`;

                            // 3. Append image to column, and column to the preview area
                            newCol.appendChild(newImg);
                            previewArea.appendChild(newCol);
                        };

                        reader.readAsDataURL(file); // Read the file as a data URL
                    } else {
                        // Alert if a non-image file was in the selection (optional, as 'accept' handles most of this)
                        // You might want a more sophisticated UI for error handling.
                        console.warn(`File ${file.name} is not a valid image.`);
                    }
                });
            };

            // Attach the listener to all file inputs
            fileInputs.forEach(input => {
                input.addEventListener('change', handleFileUpload);
            });
        });
    </script>


    <!-- Make sure Font Awesome is loaded if you use its icons (usually in <head>) -->
    <!-- Example: <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"> -->

</body>

</html>

<style>
    /* ... (Your existing CSS up to .upload-section) ... */

    /* Hide the actual file input (unchanged) */
    .upload-section input[type="file"] {
        width: 0.1px;
        height: 0.1px;
        opacity: 0;
        overflow: hidden;
        position: absolute;
        z-index: -1;
    }

    /* Style the label for the file input to look like a button (unchanged) */
    .upload-button {
        /* ... (Your existing .upload-button styles) ... */
        background-color: #00897b;
        color: white;
        /* ... */
    }

    /* Hide the default form submit buttons to rely on the custom-styled Bootstrap button */
    .upload-section button[type="submit"] {
        display: block;
        /* Make the upload button full width or styled as desired */
        width: 100%;
        max-width: 300px;
        /* Limit max width for better appearance */
        margin: 15px auto 0;
        /* Center it */
    }

    /* Style for the preview container */
    .preview-area img {
        height: 100%;
        width: 100%;
        object-fit: cover;
        aspect-ratio: 1/1;
        /* Ensure images are square for a neat grid */
    }

    /* --- Global Container and Typography --- */

    .tab-container {
        max-width: 800px;
        margin: 50px auto;
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.15);
        background-color: white;
        border-radius: 8px;
    }

    /* 1. HIDE the radio inputs (the functional core) */
    .tab-container input[type="radio"] {
        display: none;
    }

    /* --- Tab Labels Design --- */
    .tab-labels {
        display: flex;
        border-bottom: 2px solid #ddd;
        background-color: #e0e0e0;
        border-radius: 8px 8px 0 0;
    }

    /* Styling for the Clickable Tab Labels */
    .tab-label {
        flex-grow: 1;
        text-align: center;
        padding: 15px 10px;
        cursor: pointer;
        /* Key to signal clickability */
        color: #555;
        font-weight: 600;
        transition: background-color 0.3s, color 0.3s;
        border-right: 1px solid #ccc;
        user-select: none;
    }

    .tab-label:last-child {
        border-right: none;
    }

    /* 2. FUNCTIONALITY: Style the active tab using the :checked selector */
    /* Target the label that immediately follows the checked radio input */
    #tab1:checked+.tab-label,
    #tab2:checked+.tab-label,
    #tab3:checked+.tab-label,
    #tab4:checked+.tab-label {
        background-color: #3f51b5;
        /* Primary Color */
        color: white;
        border-bottom: 2px solid #3f51b5;
        border-right: none;
        position: relative;
        top: 1px;
        z-index: 2;
        border-radius: 8px 8px 0 0;
    }

    /* --- Tab Content Area Design --- */
    .tab-content-container {
        padding: 20px 25px;
        min-height: 250px;
        background-color: white;
        border-radius: 0 0 8px 8px;
        /* Add padding here, so it is easier to target content inside */
    }

    /* 3. FUNCTIONALITY: Hide all content by default */
    .tab-content {
        display: none;
        animation: fadein 0.3s ease-in;
    }

    /* 4. FUNCTIONALITY: Show the content corresponding to the checked radio */
    /* Use the General Sibling Combinator (~) to select the content container */
    #tab1:checked~.tab-content-container #content1,
    #tab2:checked~.tab-content-container #content2,
    #tab3:checked~.tab-content-container #content3,
    #tab4:checked~.tab-content-container #content4 {
        display: block;
    }

    /* --- Content & Photo Upload Styles --- */
    .tab-content h3 {
        color: #3f51b5;
        border-bottom: 1px solid #eee;
        padding-bottom: 10px;
        margin-top: 0;
        font-size: 1.5em;
    }

    .upload-section {
        border: 2px dashed #a0a0a0;
        padding: 25px;
        margin-top: 30px;
        border-radius: 8px;
        text-align: center;
        background-color: #fafafa;
    }

    .upload-section h4 {
        color: #333;
        margin-top: 0;
        margin-bottom: 15px;
        font-weight: 500;
    }

    /* Hide the actual file input */
    .upload-section input[type="file"] {
        width: 0.1px;
        height: 0.1px;
        opacity: 0;
        overflow: hidden;
        position: absolute;
        z-index: -1;
    }

    /* Style the label for the file input to look like a button */
    .upload-button {
        display: inline-block;
        padding: 12px 25px;
        background-color: #00897b;
        color: white;
        cursor: pointer;
        /* Use pointer as this button IS clickable */
        border-radius: 4px;
        font-weight: bold;
        border: none;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
        transition: background-color 0.2s;
    }

    .upload-button:hover {
        background-color: #00796b;
    }

    .upload-note {
        font-size: 0.85em;
        color: #666;
        margin-top: 15px;
    }

    @keyframes fadein {
        from {
            opacity: 0;
        }

        to {
            opacity: 1;
        }
    }

    .tab-container input[type="radio"] {
        display: none;
    }

    /* --- Tab Labels Design --- */
    .tab-labels {
        display: flex;
        border-bottom: 2px solid #ddd;
        background-color: #e0e0e0;
        border-radius: 8px 8px 0 0;
    }

    .tab-label {
        flex-grow: 1;
        text-align: center;
        padding: 15px 10px;
        cursor: pointer;
        color: #555;
        font-weight: 600;
        transition: background-color 0.3s, color 0.3s;
        border-right: 1px solid #ccc;
        user-select: none;
    }

    .tab-label:last-child {
        border-right: none;
    }

    .tab-label:hover {
        background-color: #c9c9c9;
    }

    /* --- ACTIVE TAB HIGHLIGHT (The answer to your request) --- */
    #tab1:checked+.tab-label,
    #tab2:checked+.tab-label,
    #tab3:checked+.tab-label,
    #tab4:checked+.tab-label {
        background-color: #3f51b5;
        /* Highlight Background */
        color: white;
        /* Highlight Text Color */
        border-bottom: 2px solid #3f51b5;
        border-right: none;
        position: relative;
        top: 1px;
        z-index: 2;
        border-radius: 8px 8px 0 0;
    }

    /* Ensure the active tab doesn't change color on hover */
    #tab1:checked+.tab-label:hover,
    #tab2:checked+.tab-label:hover,
    #tab3:checked+.tab-label:hover,
    #tab4:checked+.tab-label:hover {
        background-color: #3f51b5;
    }

    /* --- Content Visibility & Design --- */
    .tab-content-container {
        padding: 20px 25px;
        min-height: 250px;
        background-color: white;
        border-radius: 0 0 8px 8px;
    }

    .tab-content {
        display: none;
        animation: fadein 0.3s ease-in;
    }

    /* Show the content for the checked tab */
    #tab1:checked~.tab-content-container #content1,
    #tab2:checked~.tab-content-container #content2,
    #tab3:checked~.tab-content-container #content3,
    #tab4:checked~.tab-content-container #content4 {
        display: block;
    }

    .tab-content h3 {
        color: #3f51b5;
        border-bottom: 1px solid #eee;
        padding-bottom: 10px;
        margin-top: 0;
        font-size: 1.5em;
    }

    /* --- Upload Section Styles --- */
    .upload-section {
        border: 2px dashed #a0a0a0;
        padding: 25px;
        margin-top: 30px;
        border-radius: 8px;
        text-align: center;
        background-color: #fafafa;
    }

    .upload-section h4 {
        color: #333;
        margin-top: 0;
        margin-bottom: 15px;
        font-weight: 500;
    }

    .upload-section input[type="file"] {
        width: 0.1px;
        height: 0.1px;
        opacity: 0;
        overflow: hidden;
        position: absolute;
        z-index: -1;
    }

    .upload-button {
        display: inline-block;
        padding: 12px 25px;
        background-color: #00897b;
        color: white;
        cursor: pointer;
        border-radius: 4px;
        font-weight: bold;
        border: none;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
        transition: background-color 0.2s;
    }

    .upload-button:hover {
        background-color: #00796b;
    }

    .upload-note {
        font-size: 0.85em;
        color: #666;
        margin-top: 15px;
    }

    @keyframes fadein {
        from {
            opacity: 0;
        }

        to {
            opacity: 1;
        }
    }


    #tab1:checked+.tab-label,
    #tab2:checked+.tab-label,
    #tab3:checked+.tab-label,
    #tab4:checked+.tab-label {
        /* * These styles below create the "highlight" when the tab is clicked.
     */
        background-color: #3f51b5;
        /* Primary Color: Dark Blue */
        color: white;
        /* Text Color: White */
        border-bottom: 2px solid #3f51b5;
        /* Ensures the color continues down */
        position: relative;
        top: 1px;
        /* Slight lift to visually separate it from the bar */
        z-index: 2;
        border-radius: 8px 8px 0 0;
    }

    /* Optional: Add a hover state to the inactive tabs for a better user experience */
    .tab-label:hover {
        background-color: #c9c9c9;
    }

    /* Ensure the active tab doesn't change color on hover */
    #tab1:checked+.tab-label:hover,
    #tab2:checked+.tab-label:hover,
    #tab3:checked+.tab-label:hover,
    #tab4:checked+.tab-label:hover {
        background-color: #3f51b5;
        /* Locks the background color */
    }
</style>