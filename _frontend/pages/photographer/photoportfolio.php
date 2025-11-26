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
        <?= include_page('photoex/phsidebar') ?>
        <!-- Sidebar End -->

        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            <?= include_page('photoex/phnavbar') ?>
            <!-- Navbar End -->

            <!-- Professional Header Section -->
            <div class="professional-header">
                <div class="container">
                    <div class="header-content">
                        <h1 class="page-title">Photographer Portfolio</h1>
                        <p class="page-subtitle">Professional Event & Wedding Photography Services</p>
                    </div>
                </div>
            </div>

            <div class="container py-5">
                <div class="row justify-content-center">
                    <!-- Enhanced Professional Card -->
                    <div class="col-lg-11 mx-auto mb-5">
                        <div class="professional-card">
                            <div class="row g-0">
                                <div class="col-md-5">
                                    <div class="image-container">
                                        <img src="<?= assets() ?>/img/wed.jpg" class="profile-image" alt="Jamie Portrait">
                                        <div class="image-overlay">
                                            <span class="professional-badge">Professional Photographer</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-7">
                                    <div class="card-content">
                                        <div class="profile-header">
                                            <h2 class="profile-name">Jamie Portrait</h2>
                                            <span class="profile-role">Wedding & Event Photographer</span>
                                        </div>

                                        <div class="profile-info">
                                            <div class="info-item">
                                                <i class="fas fa-birthday-cake info-icon"></i>
                                                <span>35 years old</span>
                                            </div>
                                        </div>

                                        <div class="skills-section">
                                            <h4 class="section-label">Professional Skills</h4>
                                            <div class="skills-grid">
                                                <span class="skill-tag">Portraiture</span>
                                                <span class="skill-tag">Event Coverage</span>
                                                <span class="skill-tag">Candid Moments</span>
                                                <span class="skill-tag">Studio Lighting</span>
                                            </div>
                                        </div>

                                        <div class="bio-section">
                                            <p class="bio-text">
                                                Capturing the magic of your special days with a creative and personal touch. 
                                                Passionate about storytelling through images and creating timeless memories 
                                                that you'll cherish forever.
                                            </p>
                                        </div>

                                        <div class="action-section">
                                            <button type="button" class="primary-action-btn" data-bs-toggle="modal" data-bs-target="#viewPicturesModal">
                                                <i class="fas fa-images me-2"></i>
                                                <span>Manage Portfolio</span>
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

    <!-- PROFESSIONAL MODAL -->
    <div class="modal fade" id="viewPicturesModal" tabindex="-1" aria-labelledby="viewPicturesModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content professional-modal">
                <div class="modal-header">
                    <div class="modal-header-content">
                        <h5 class="modal-title" id="viewPicturesModalLabel">Portfolio Management</h5>
                        <p class="modal-subtitle">Upload and organize your professional photography work</p>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    
                    <div class="professional-tabs">
                        <input type="radio" name="tab-group" id="tab1" checked>
                        <input type="radio" name="tab-group" id="tab2">
                        <input type="radio" name="tab-group" id="tab3">
                        <input type="radio" name="tab-group" id="tab4">

                        <div class="tabs-navigation">
                            <label for="tab1" class="tab-nav-item">
                                <span class="tab-icon">💍</span>
                                <span class="tab-text">Wedding</span>
                            </label>
                            <label for="tab2" class="tab-nav-item">
                                <span class="tab-icon">🎂</span>
                                <span class="tab-text">Birthday</span>
                            </label>
                            <label for="tab3" class="tab-nav-item">
                                <span class="tab-icon">🎓</span>
                                <span class="tab-text">Graduation</span>
                            </label>
                            <label for="tab4" class="tab-nav-item">
                                <span class="tab-icon">🎉</span>
                                <span class="tab-text">Other Events</span>
                            </label>
                        </div>

                        <div class="tabs-content-wrapper">

                            <div id="content1" class="tab-panel">
                                <div class="panel-header">
                                    <h3 class="panel-title">Wedding Photography</h3>
                                    <p class="panel-description">Upload and manage your wedding event photography collection</p>
                                </div>
                                <form id="wedding-form">
                                    <div class="upload-zone">
                                        <div class="upload-icon-wrapper">
                                            <i class="fas fa-cloud-upload-alt upload-icon"></i>
                                        </div>
                                        <h4 class="upload-title">Upload Wedding Photos</h4>
                                        <label for="wedding-photo-upload" class="upload-trigger">
                                            <i class="fas fa-folder-open me-2"></i>Select Files
                                        </label>
                                        <input type="file" id="wedding-photo-upload" class="photo-upload-input" name="img" accept="image/*" multiple>
                                        <p class="upload-instructions">Maximum 5 photos • JPEG or PNG format • Up to 10MB each</p>
                                        <input type="hidden" name="category" value="wedding">

                                        <div class="preview-gallery row mt-4 g-3" id="wedding-preview"></div>

                                        <button type="submit" class="submit-upload-btn">
                                            <i class="fas fa-upload me-2"></i>Upload Selected Photos
                                        </button>
                                    </div>
                                </form>
                            </div>

                            <div id="content2" class="tab-panel">
                                <div class="panel-header">
                                    <h3 class="panel-title">Birthday Photography</h3>
                                    <p class="panel-description">Upload and manage your birthday celebration photography collection</p>
                                </div>
                                <form id="birthday-form">
                                    <div class="upload-zone">
                                        <div class="upload-icon-wrapper">
                                            <i class="fas fa-cloud-upload-alt upload-icon"></i>
                                        </div>
                                        <h4 class="upload-title">Upload Birthday Photos</h4>
                                        <label for="birthday-photo-upload" class="upload-trigger">
                                            <i class="fas fa-folder-open me-2"></i>Select Files
                                        </label>
                                        <input type="file" id="birthday-photo-upload" class="photo-upload-input" name="img" accept="image/*" multiple>
                                        <p class="upload-instructions">Maximum 5 photos • JPEG or PNG format • Up to 10MB each</p>
                                        <input type="hidden" name="category" value="birthday">

                                        <div class="preview-gallery row mt-4 g-3" id="birthday-preview"></div>

                                        <button type="submit" class="submit-upload-btn">
                                            <i class="fas fa-upload me-2"></i>Upload Selected Photos
                                        </button>
                                    </div>
                                </form>
                            </div>

                            <div id="content3" class="tab-panel">
                                <div class="panel-header">
                                    <h3 class="panel-title">Graduation Photography</h3>
                                    <p class="panel-description">Upload and manage your graduation ceremony photography collection</p>
                                </div>
                                <form id="graduation-form">
                                    <div class="upload-zone">
                                        <div class="upload-icon-wrapper">
                                            <i class="fas fa-cloud-upload-alt upload-icon"></i>
                                        </div>
                                        <h4 class="upload-title">Upload Graduation Photos</h4>
                                        <label for="graduation-photo-upload" class="upload-trigger">
                                            <i class="fas fa-folder-open me-2"></i>Select Files
                                        </label>
                                        <input type="file" id="graduation-photo-upload" class="photo-upload-input" name="img" accept="image/*" multiple>
                                        <p class="upload-instructions">Maximum 5 photos • JPEG or PNG format • Up to 10MB each</p>
                                        <input type="hidden" name="category" value="graduation">

                                        <div class="preview-gallery row mt-4 g-3" id="graduation-preview"></div>

                                        <button type="submit" class="submit-upload-btn">
                                            <i class="fas fa-upload me-2"></i>Upload Selected Photos
                                        </button>
                                    </div>
                                </form>
                            </div>

                            <div id="content4" class="tab-panel">
                                <div class="panel-header">
                                    <h3 class="panel-title">Other Events Photography</h3>
                                    <p class="panel-description">Upload and manage your corporate and social event photography collection</p>
                                </div>
                                <form id="events-form">
                                    <div class="upload-zone">
                                        <div class="upload-icon-wrapper">
                                            <i class="fas fa-cloud-upload-alt upload-icon"></i>
                                        </div>
                                        <h4 class="upload-title">Upload Event Photos</h4>
                                        <label for="events-photo-upload" class="upload-trigger">
                                            <i class="fas fa-folder-open me-2"></i>Select Files
                                        </label>
                                        <input type="file" id="events-photo-upload" class="photo-upload-input" name="img" accept="image/*" multiple>
                                        <p class="upload-instructions">Maximum 5 photos • JPEG or PNG format • Up to 10MB each</p>
                                        <input type="hidden" name="category" value="events">

                                        <div class="preview-gallery row mt-4 g-3" id="events-preview"></div>

                                        <button type="submit" class="submit-upload-btn">
                                            <i class="fas fa-upload me-2"></i>Upload Selected Photos
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
                
                <div class="modal-footer">
                    <input type="file" id="newPictureInput" accept="image/*" style="display: none;">
                    <button type="button" class="btn-modal-close" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- MODAL END -->
    
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
            const fileInputs = document.querySelectorAll('.photo-upload-input');

            const handleFileUpload = (event) => {
                const input = event.target;
                const files = input.files;

                const form = input.closest('form');
                if (!form) return;

                const previewArea = form.querySelector('.preview-gallery');
                if (!previewArea) return;

                previewArea.innerHTML = '';

                if (files.length === 0) {
                    return;
                }

                Array.from(files).forEach((file, index) => {
                    if (index >= 5) {
                        alert('You can only upload a maximum of 5 photos.');
                        return;
                    }

                    if (file.type.startsWith('image/')) {
                        const reader = new FileReader();

                        reader.onload = function(e) {
                            const newCol = document.createElement('div');
                            newCol.className = 'col-6 col-sm-4 col-md-3';

                            const newImg = document.createElement('img');
                            newImg.src = e.target.result;
                            newImg.className = 'preview-image';
                            newImg.alt = `Preview ${index + 1}`;

                            newCol.appendChild(newImg);
                            previewArea.appendChild(newCol);
                        };

                        reader.readAsDataURL(file);
                    } else {
                        console.warn(`File ${file.name} is not a valid image.`);
                    }
                });
            };

            fileInputs.forEach(input => {
                input.addEventListener('change', handleFileUpload);
            });
        });
    </script>

</body>

</html>

<style>
/* ===== PROFESSIONAL WHITE LAYOUT ===== */

/* Global Styling */
body {
    background-color: #ffffff;
    font-family: 'Inter', 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    color: #2c3e50;
    line-height: 1.6;
}

/* Professional Header */
.professional-header {
    background: linear-gradient(135deg, #1a1a1a 0%, #2d2d2d 100%);
    padding: 40px 0;
    margin-bottom: 40px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
}

.header-content {
    text-align: center;
}

.page-title {
    color: #ffffff;
    font-size: 2.5em;
    font-weight: 700;
    margin-bottom: 10px;
    letter-spacing: -0.5px;
}

.page-subtitle {
    color: #ff4444;
    font-size: 1.1em;
    font-weight: 500;
    letter-spacing: 0.5px;
}

/* Professional Card */
.professional-card {
    background: #ffffff;
    border-radius: 12px;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
    overflow: hidden;
    border: 1px solid #e8e8e8;
    transition: box-shadow 0.3s ease;
}

.professional-card:hover {
    box-shadow: 0 8px 30px rgba(0, 0, 0, 0.12);
}

/* Image Container */
.image-container {
    position: relative;
    height: 100%;
    min-height: 450px;
    overflow: hidden;
}

.profile-image {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.4s ease;
}

.professional-card:hover .profile-image {
    transform: scale(1.05);
}

.image-overlay {
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    background: linear-gradient(to top, rgba(0, 0, 0, 0.8), transparent);
    padding: 20px;
}

.professional-badge {
    background: #ff4444;
    color: #ffffff;
    padding: 8px 16px;
    border-radius: 20px;
    font-size: 0.85em;
    font-weight: 600;
    letter-spacing: 0.5px;
    text-transform: uppercase;
}

/* Card Content */
.card-content {
    padding: 40px;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    height: 100%;
}

.profile-header {
    margin-bottom: 25px;
    border-bottom: 2px solid #f0f0f0;
    padding-bottom: 20px;
}

.profile-name {
    font-size: 2em;
    font-weight: 700;
    color: #1a1a1a;
    margin-bottom: 8px;
    letter-spacing: -0.5px;
}

.profile-role {
    color: #ff4444;
    font-size: 1em;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 1px;
}

/* Profile Info */
.profile-info {
    margin-bottom: 25px;
}

.info-item {
    display: flex;
    align-items: center;
    color: #555;
    font-size: 0.95em;
}

.info-icon {
    color: #ff4444;
    margin-right: 10px;
    font-size: 1.1em;
}

/* Skills Section */
.skills-section {
    margin-bottom: 25px;
}

.section-label {
    font-size: 1em;
    font-weight: 700;
    color: #1a1a1a;
    margin-bottom: 15px;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.skills-grid {
    display: flex;
    flex-wrap: wrap;
    gap: 10px;
}

.skill-tag {
    background: #f8f9fa;
    color: #1a1a1a;
    padding: 10px 18px;
    border-radius: 6px;
    font-size: 0.9em;
    font-weight: 600;
    border: 2px solid #e8e8e8;
    transition: all 0.3s ease;
}

.skill-tag:hover {
    background: #ff4444;
    color: #ffffff;
    border-color: #ff4444;
    transform: translateY(-2px);
}

/* Bio Section */
.bio-section {
    margin-bottom: 30px;
}

.bio-text {
    color: #555;
    font-size: 1em;
    line-height: 1.8;
}

/* Action Button */
.action-section {
    margin-top: auto;
}

.primary-action-btn {
    background: #ff4444;
    color: #ffffff;
    border: none;
    padding: 14px 32px;
    border-radius: 8px;
    font-size: 1em;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    cursor: pointer;
    transition: all 0.3s ease;
    box-shadow: 0 4px 12px rgba(255, 68, 68, 0.3);
}

.primary-action-btn:hover {
    background: #cc0000;
    transform: translateY(-2px);
    box-shadow: 0 6px 20px rgba(255, 68, 68, 0.4);
}

/* Professional Modal */
.professional-modal {
    background: #ffffff;
    border-radius: 12px;
    border: none;
}

.modal-header {
    background: #f8f9fa;
    border-bottom: 2px solid #e8e8e8;
    padding: 25px 30px;
}

.modal-header-content {
    flex: 1;
}

.modal-title {
    color: #1a1a1a;
    font-size: 1.6em;
    font-weight: 700;
    margin-bottom: 5px;
}

.modal-subtitle {
    color: #666;
    font-size: 0.95em;
    margin: 0;
}

.btn-close {
    background-color: transparent;
    border: none;
    font-size: 1.5em;
    opacity: 0.6;
    transition: opacity 0.3s ease;
}

.btn-close:hover {
    opacity: 1;
}

.modal-body {
    padding: 30px;
}

/* Professional Tabs */
.professional-tabs input[type="radio"] {
    display: none;
}

.tabs-navigation {
    display: flex;
    background: #f8f9fa;
    border-radius: 8px;
    padding: 8px;
    margin-bottom: 30px;
    border: 1px solid #e8e8e8;
}

.tab-nav-item {
    flex: 1;
    text-align: center;
    padding: 14px 10px;
    cursor: pointer;
    color: #555;
    font-weight: 600;
    transition: all 0.3s ease;
    border-radius: 6px;
    user-select: none;
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 5px;
}

.tab-icon {
    font-size: 1.5em;
}

.tab-text {
    font-size: 0.9em;
}

.tab-nav-item:hover {
    background: #e8e8e8;
}

#tab1:checked ~ .tabs-navigation label[for="tab1"],
#tab2:checked ~ .tabs-navigation label[for="tab2"],
#tab3:checked ~ .tabs-navigation label[for="tab3"],
#tab4:checked ~ .tabs-navigation label[for="tab4"] {
    background: #ff4444;
    color: #ffffff;
}

/* Tab Content */
.tabs-content-wrapper {
    min-height: 400px;
}

.tab-panel {
    display: none;
    animation: fadeIn 0.3s ease;
}

#tab1:checked ~ .tabs-content-wrapper #content1,
#tab2:checked ~ .tabs-content-wrapper #content2,
#tab3:checked ~ .tabs-content-wrapper #content3,
#tab4:checked ~ .tabs-content-wrapper #content4 {
    display: block;
}

.panel-header {
    margin-bottom: 30px;
    padding-bottom: 20px;
    border-bottom: 2px solid #f0f0f0;
}

.panel-title {
    color: #1a1a1a;
    font-size: 1.8em;
    font-weight: 700;
    margin-bottom: 8px;
}

.panel-description {
    color: #666;
    font-size: 1em;
    margin: 0;
}

/* Upload Zone */
.upload-zone {
    background: #f8f9fa;
    border: 2px dashed #d0d0d0;
    border-radius: 12px;
    padding: 40px;
    text-align: center;
    transition: all 0.3s ease;
}

.upload-zone:hover {
    border-color: #ff4444;
    background: #fff5f5;
}

.upload-icon-wrapper {
    margin-bottom: 20px;
}

.upload-icon {
    font-size: 3.5em;
    color: #ff4444;
}

.upload-title {
    color: #1a1a1a;
    font-size: 1.3em;
    font-weight: 700;
    margin-bottom: 20px;
}

.photo-upload-input {
    display: none;
}

.upload-trigger {
    display: inline-block;
    background: #ff4444;
    color: #ffffff;
    padding: 12px 28px;
    border-radius: 8px;
    font-weight: 700;
    cursor: pointer;
    transition: all 0.3s ease;
    margin-bottom: 15px;
}

.upload-trigger:hover {
    background: #cc0000;
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(255, 68, 68, 0.3);
}

.upload-instructions {
    color: #666;
    font-size: 0.9em;
    margin: 0;
}

/* Preview Gallery */
.preview-gallery {
    margin-top: 25px;
}

.preview-image {
    width: 100%;
    height: 200px;
    object-fit: cover;
    border-radius: 8px;
    border: 2px solid #e8e8e8;
    transition: all 0.3s ease;
}

.preview-image:hover {
    border-color: #ff4444;
    transform: scale(1.03);
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
}

/* Submit Button */
.submit-upload-btn {
    margin-top: 25px;
    background: #1a1a1a;
    color: #ffffff;
    border: none;
    padding: 14px 32px;
    border-radius: 8px;
    font-weight: 700;
    font-size: 1em;
    cursor: pointer;
    transition: all 0.3s ease;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.submit-upload-btn:hover {
    background: #000000;
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
}

/* Modal Footer */
.modal-footer {
    background: #f8f9fa;
    border-top: 2px solid #e8e8e8;
    padding: 20px 30px;
}

.btn-modal-close {
    background: #ffffff;
    color: #1a1a1a;
    border: 2px solid #d0d0d0;
    padding: 10px 24px;
    border-radius: 8px;
    font-weight: 700;
    cursor: pointer;
    transition: all 0.3s ease;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.btn-modal-close:hover {
    background: #1a1a1a;
    color: #ffffff;
    border-color: #1a1a1a;
}

/* Spinner */
.spinner-border.text-primary {
    border-color: #ff4444;
    border-right-color: transparent;
}

/* Back to Top */
.back-to-top {
    background: #ff4444 !important;
    border: none !important;
    transition: all 0.3s ease;
}

.back-to-top:hover {
    background: #cc0000 !important;
    transform: translateY(-5px);
    box-shadow: 0 6px 20px rgba(255, 68, 68, 0.4);
}

/* Animations */
@keyframes fadeIn {
    from {
        opacity: 0;
        transform: translateY(10px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

/* Responsive Design */
@media (max-width: 768px) {
    .page-title {
        font-size: 1.8em;
    }

    .page-subtitle {
        font-size: 1em;
    }

    .card-content {
        padding: 25px;
    }

    .profile-name {
        font-size: 1.6em;
    }

    .image-container {
        min-height: 300px;
    }

    .tab-nav-item {
        padding: 12px 8px;
    }

    .tab-icon {
        font-size: 1.3em;
    }

    .tab-text {
        font-size: 0.8em;
    }

    .upload-zone {
        padding: 25px;
    }

    .upload-icon {
        font-size: 2.5em;
    }

    .modal-body {
        padding: 20px;
    }

    .preview-image {
        height: 150px;
    }
}

@media (max-width: 576px) {
    .professional-header {
        padding: 25px 0;
    }

    .tabs-navigation {
        flex-wrap: wrap;
    }

    .tab-nav-item {
        flex: 1 1 45%;
        margin-bottom: 5px;
    }
}