<!DOCTYPE html>
<html lang="en">

<?= include_page('header') ?>

<head>
    <style>
        :root {
            --primary: #dc3545;
            --secondary: #c82333;
            --accent: #dc3545;
            --danger: #dc3545;
            --light: #f8f9fa;
            --dark: #2d3748;
            --shadow: 0 10px 40px rgba(220, 53, 69, 0.12);
            --shadow-lg: 0 25px 60px rgba(220, 53, 69, 0.2);
        }

        body {
            background: linear-gradient(135deg, #dc354508 0%, #fae8e808 100%);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        /* Spinner Enhancement */
        #spinner {
            background: linear-gradient(135deg, rgba(220, 53, 69, 0.95) 0%, rgba(200, 35, 51, 0.95) 100%) !important;
        }

        .spinner-border {
            border-color: rgba(255, 255, 255, 0.2) !important;
            border-top-color: #ffffff !important;
            width: 4rem !important;
            height: 4rem !important;
        }

        /* Content Area */
        .content {
            background: linear-gradient(135deg, #f9fafb 0%, #f5f6f7 100%);
            min-height: 100vh;
        }

        /* Header Section with Red Background */
        .header-section {
            background: linear-gradient(135deg, #dc3545 0%, #c82333 100%);
            padding: 40px 50px;
            border-radius: 0 0 20px 0;
            box-shadow: 0 8px 30px rgba(220, 53, 69, 0.25);
            display: flex;
            justify-content: flex-end;
            align-items: center;
        }

        .btn-primary {
            background: linear-gradient(135deg, #1a202c, #0f1419) !important;
            border: none !important;
            padding: 12px 30px !important;
            font-weight: 600 !important;
            border-radius: 8px !important;
            transition: all 0.3s ease !important;
            box-shadow: 0 8px 24px rgba(15, 20, 25, 0.4) !important;
            color: white !important;
        }

        .btn-primary:hover {
            transform: translateY(-4px) !important;
            box-shadow: 0 14px 36px rgba(15, 20, 25, 0.5) !important;
            background: linear-gradient(135deg, #0f1419, #050709) !important;
        }

        .btn-primary i {
            margin-right: 8px;
        }

        /* Page Title */
        h1 {
            color: #dc3545;
            font-weight: 900 !important;
            letter-spacing: 2px;
            margin: 50px 0 30px !important;
            padding-bottom: 20px !important;
            border-bottom: 3px solid #dc3545;
            font-size: 2.8rem !important;
            text-transform: uppercase;
        }

        /* Container Styling */
        .container-fluid.pt-4 {
            padding: 50px 40px !important;
        }

        /* Card Grid */
        .row {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
            gap: 35px;
            align-items: start;
        }

        /* Photographer Card */
        .card {
            border: none !important;
            border-radius: 15px !important;
            overflow: hidden;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1) !important;
            transition: all 0.35s cubic-bezier(0.34, 1.56, 0.64, 1) !important;
            position: relative;
            background: white !important;
            height: 100% !important;
            width: 100% !important;
        }

        .card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 5px;
            background: linear-gradient(90deg, #dc3545, #c82333);
            z-index: 10;
        }

        .card:hover {
            transform: translateY(-15px) !important;
            box-shadow: 0 20px 50px rgba(220, 53, 69, 0.2) !important;
        }

        .card-body {
            padding: 35px 28px !important;
            display: flex;
            flex-direction: column;
            height: 100%;
            background: linear-gradient(135deg, #ffffff 0%, #fafbfc 100%);
            text-align: center;
        }

        /* Image Styling */
        .photographer-image {
            width: 150px !important;
            height: 150px !important;
            border-radius: 50% !important;
            object-fit: cover !important;
            border: 6px solid #dc3545 !important;
            box-shadow: 0 15px 40px rgba(220, 53, 69, 0.25) !important;
            margin: 0 auto 28px !important;
            transition: all 0.35s cubic-bezier(0.34, 1.56, 0.64, 1) !important;
            display: block !important;
        }

        .card:hover .photographer-image {
            transform: scale(1.18) !important;
            box-shadow: 0 20px 50px rgba(220, 53, 69, 0.35) !important;
        }

        /* Name Styling */
        .photographer-name {
            font-size: 1.5rem !important;
            font-weight: 800 !important;
            color: var(--dark) !important;
            margin-bottom: 12px !important;
            transition: all 0.3s ease !important;
            letter-spacing: 0.5px;
        }

        .card:hover .photographer-name {
            color: #dc3545;
        }

        /* Description */
        .photographer-type {
            font-size: 0.95rem !important;
            color: #666 !important;
            font-style: italic !important;
            line-height: 1.6 !important;
            min-height: 45px !important;
            margin-bottom: 15px !important;
        }

        /* Skills Badge */
        .photographer-skills {
            display: inline-block !important;
            background: rgba(220, 53, 69, 0.08) !important;
            color: #dc3545 !important;
            padding: 10px 18px !important;
            border-radius: 8px !important;
            font-size: 0.85rem !important;
            font-weight: 600 !important;
            margin: 15px 0 !important;
            border-left: 3px solid #dc3545;
        }

        /* Button Group */
        .mt-auto {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
            justify-content: center;
            margin-top: 25px;
        }

        /* Action Buttons */
        .btn-sm {
            padding: 10px 16px !important;
            font-weight: 600 !important;
            border-radius: 8px !important;
            transition: all 0.3s ease !important;
            border: none !important;
            font-size: 0.85rem !important;
        }

        .btn-outline-primary {
            background: linear-gradient(135deg, #2563eb, #1d4ed8) !important;
            color: white !important;
            border: none !important;
        }

        .btn-outline-primary:hover {
            transform: translateY(-2px) !important;
            box-shadow: 0 8px 20px rgba(37, 99, 235, 0.4) !important;
            color: white !important;
        }

        .btn-info {
            background: linear-gradient(135deg, #10b981, #059669) !important;
            color: white !important;
            border: none !important;
        }

        .btn-info:hover {
            transform: translateY(-2px) !important;
            box-shadow: 0 8px 20px rgba(16, 185, 129, 0.4) !important;
            color: white !important;
        }

        .btn-danger {
            background: linear-gradient(135deg, #2d3748, #1a202c) !important;
            color: white !important;
            border: none !important;
        }

        .btn-danger:hover {
            transform: translateY(-2px) !important;
            box-shadow: 0 8px 20px rgba(45, 55, 72, 0.4) !important;
            color: white !important;
        }

        /* Modal Styling */
        .modal-content {
            border: none !important;
            border-radius: 15px !important;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3) !important;
            overflow: hidden;
        }

        .modal-header {
            background: linear-gradient(135deg, #dc3545 0%, #c82333 100%) !important;
            color: white !important;
            border: none !important;
            padding: 28px 30px !important;
        }

        .modal-title {
            font-size: 1.35rem !important;
            font-weight: 700 !important;
            letter-spacing: 0.5px;
        }

        .btn-close {
            filter: brightness(0) invert(1) !important;
            opacity: 0.8 !important;
            transition: all 0.3s ease !important;
        }

        .btn-close:hover {
            opacity: 1 !important;
        }

        .modal-body {
            padding: 35px !important;
            background: linear-gradient(135deg, #f9fafb 0%, #f5f6f7 100%);
        }

        .form-label {
            font-weight: 700 !important;
            color: var(--dark) !important;
            margin-bottom: 10px !important;
            font-size: 0.95rem;
        }

        .form-control {
            border: 2px solid #e5e7eb !important;
            border-radius: 8px !important;
            padding: 13px 16px !important;
            font-size: 0.95rem !important;
            transition: all 0.3s ease !important;
            background: white !important;
        }

        .form-control:focus {
            border-color: #dc3545 !important;
            box-shadow: 0 0 0 4px rgba(220, 53, 69, 0.1) !important;
            background: #fafbfc !important;
        }

        .form-control::placeholder {
            color: #9ca3af !important;
        }

        .mb-3 {
            margin-bottom: 20px !important;
        }

        /* Modal Footer */
        .modal-footer {
            border: none !important;
            padding: 20px 30px 30px !important;
            background: linear-gradient(135deg, #f9fafb 0%, #f5f6f7 100%);
            display: flex;
            gap: 12px;
            justify-content: flex-end;
        }

        .modal-footer .btn {
            padding: 12px 28px !important;
            border-radius: 8px !important;
            font-weight: 600 !important;
            transition: all 0.3s ease !important;
            border: none !important;
        }

        .btn-secondary {
            background: #e5e7eb !important;
            color: var(--dark) !important;
        }

        .btn-secondary:hover {
            background: #d1d5db !important;
            color: var(--dark) !important;
        }

        /* Back to Top Button */
        .back-to-top {
            background: linear-gradient(135deg, #dc3545, #c82333) !important;
            border: none !important;
            border-radius: 50% !important;
            width: 55px !important;
            height: 55px !important;
            display: none !important;
            align-items: center !important;
            justify-content: center !important;
            box-shadow: 0 8px 25px rgba(220, 53, 69, 0.3) !important;
            transition: all 0.3s ease !important;
            color: white !important;
            right: 30px !important;
            bottom: 30px !important;
        }

        .back-to-top.show {
            display: flex !important;
        }

        .back-to-top:hover {
            transform: translateY(-5px) !important;
            box-shadow: 0 12px 35px rgba(220, 53, 69, 0.4) !important;
            color: white !important;
        }

        /* Responsive */
        @media (max-width: 1200px) {
            .row {
                grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            }
        }

        @media (max-width: 768px) {
            h1 {
                font-size: 1.8rem !important;
                margin: 20px 10px 20px !important;
            }

            .container-fluid.pt-4 {
                padding: 20px !important;
            }

            .row {
                grid-template-columns: 1fr;
                gap: 20px;
            }

            .card {
                width: 100% !important;
            }

            .header-section {
                padding: 20px !important;
                text-align: center !important;
            }

            .modal-body {
                padding: 25px !important;
            }
        }

        /* Animation */
        @keyframes slideInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .card {
            animation: slideInUp 0.5s ease-out;
        }

        /* Smooth scrolling */
        html {
            scroll-behavior: smooth;
        }
    </style>
</head>

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

            <!-- Header Section with Red Background -->
            <div class="header-section">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addPhotographerModal">
                    <i class="fas fa-plus"></i> Add Photographer
                </button>
            </div>

            <!-- Title Section -->
            <h1 class="text-center">
                List of Photographer
            </h1>

            <!-- Card Section Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row" id="photographerCardRow">
                </div>
            </div>
        </div>
        <!-- Card Section End -->

        <!-- Add Photographer Modal -->
        <div class="modal fade" id="addPhotographerModal" tabindex="-1" aria-labelledby="addPhotographerModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addPhotographerModalLabel">Add New Photographer</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="addPhotographerForm">
                            <div class="mb-3">
                                <label for="addPhotographerFname" class="form-label">First Name</label>
                                <input type="text" class="form-control" id="addPhotographerFname" name="name" required>
                            </div>
                            <div class="mb-3">
                                <label for="addPhotographerLname" class="form-label">Last Name</label>
                                <input type="text" class="form-control" id="addPhotographerLname" name="lname" required>
                            </div>
                            <div class="mb-3">
                                <label for="addPhotographerEmail" class="form-label">Email Address</label>
                                <input type="text" class="form-control" id="addPhotographerEmail" name="username" required>
                            </div>
                            <div class="mb-3">
                                <label for="addPhotographerContact" class="form-label">Contact</label>
                                <input type="text" class="form-control" id="addPhotographerContact" name="contact" required>
                            </div>
                            <div class="mb-3">
                                <label for="addPhotographerSkill" class="form-label">Skills</label>
                                <input type="text" class="form-control" id="addPhotographerSkill" name="skill" required>
                            </div>
                            <div class="mb-3">
                                <label for="addPhotographerDesc" class="form-label">Description</label>
                                <input type="text" name="description" class="form-control" id="addPhotographerDesc">
                            </div>
                            <div class="mb-3">
                                <label for="serviceImage" class="form-label">Profile Image</label>
                                <input type="file" class="form-control" id="serviceImage" accept="image/*" name="img">
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" form="addPhotographerForm" id="submit" class="btn btn-primary">Save Photographer</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Edit Photographer Modal -->
        <div class="modal fade" id="editPhotographerModal" tabindex="-1" aria-labelledby="editPhotographerModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editPhotographerModalLabel">Edit Photographer</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="editPhotographerForm">
                            <input type="hidden" id="PhotographerID" name="photographerID">
                            <div class="mb-3 text-center">
                                <img src="#" alt="Current Photographer Image" id="currentPhotographerImage" class="rounded-circle mb-3" style="width: 100px; height: 100px; object-fit: cover; display: none; border: 4px solid #dc3545; box-shadow: 0 8px 20px rgba(220, 53, 69, 0.15);">
                                <p class="no-image-text" style="display: none;">No image provided.</p>
                            </div>
                            <div class="mb-3">
                                <label for="photographerfname" class="form-label">First Name</label>
                                <input type="text" class="form-control" id="photographerfname" name="photographer_fname" required>
                            </div>
                            <div class="mb-3">
                                <label for="photographerlname" class="form-label">Last Name</label>
                                <input type="text" class="form-control" id="photographerlname" name="photographer_lname" required>
                            </div>
                            <div class="mb-3">
                                <label for="typeOfphotographer" class="form-label">Type of Photographer</label>
                                <input type="text" class="form-control" id="typeOfphotographer" name="type_of_photographer">
                            </div>
                            <div class="mb-3">
                                <label for="photographerage" class="form-label">Age</label>
                                <input type="number" class="form-control" id="photographerage" name="photographer_age">
                            </div>
                            <div class="mb-3">
                                <label for="photographeremail" class="form-label">Email</label>
                                <input type="email" class="form-control" id="photographeremail" name="photographer_email">
                            </div>
                            <div class="mb-3">
                                <label for="skills" class="form-label">Skills</label>
                                <input type="text" class="form-control" id="skills" name="skills">
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="editPhotographerImageFile" class="form-label">New Profile Image (Optional)</label>
                                <input type="file" class="form-control" id="editPhotographerImageFile" name="photographer_image_file" accept="image/*">
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" form="editPhotographerForm" class="btn btn-primary">Save Changes</button>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- Content End -->

    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

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

    <script>
        $(document).ready(function() {
            $('#photographerCardRow').on('click', '.btn-edit-photographer', function() {
                var card = $(this).closest('.card');

                var photographerID = card.data('id');
                var fname = card.data('fname');
                var lname = card.data('lname');
                var type = card.data('type');
                var age = card.data('age');
                var email = card.data('email');
                var skills_data = card.data('skills');
                var description_data = card.data('description');
                var imageUrl = card.data('image-url');

                $('#PhotographerID').val(photographerID);
                $('#photographerfname').val(fname);
                $('#photographerlname').val(lname);
                $('#typeOfphotographer').val(type);
                $('#photographerage').val(age ? parseFloat(age) : '');
                $('#photographeremail').val(email);
                $('#skills').val(skills_data);
                $('#description').val(description_data);

                var $currentImage = $('#currentPhotographerImage');
                var $noImageText = $currentImage.parent().find('.no-image-text');

                if (imageUrl && imageUrl !== 'https://via.placeholder.com/100/CCCCCC/FFFFFF?text=No+Image' && imageUrl !== '#') {
                    $currentImage.attr('src', imageUrl).show();
                    $noImageText.hide();
                } else {
                    $currentImage.hide().attr('src', '#');
                    $noImageText.text('No image available.').show();
                }
            });

            $('#addPhotographerModal, #editPhotographerModal').on('hidden.bs.modal', function() {
                $(this).find('form')[0].reset();
                $(this).find('input[type="file"]').val('');
                $('#currentPhotographerImage').hide().attr('src', '#');
                $('#currentPhotographerImage').parent().find('.no-image-text').hide();
            });
        });

        let basket = [];

        function displayAllphotographers(searchTerm = '') {
            const $noServicesMessage = $('#noServicesMessage');

            tyrax.get({
                url: "admin/get",
                response: function(send) {
                    if (send.code == 200) {
                        const data = send.data;
                        data.forEach(column => {
                            const imageSrc = column.img || "<?= assets('img/placeholder.png') ?>";
                            const name = column.name;
                            const lname = column.lname;
                            const skill = column.skill;
                            const status = column.status;
                            const description = column.description;
                            const user_id = column.user_id;
                            basket[user_id] = {
                                name: name,
                                lname: lname,
                                status: status,
                                skill: skill,
                                user_id: user_id
                            };

                            DOM.add_html("#photographerCardRow", `
                            <div class="card h-100" data-id="${user_id}" data-fname="${name}" data-lname="${lname}" data-type="${column.type || ''}" data-age="${column.age || ''}" data-email="${column.username || ''}" data-skills="${skill}" data-description="${description}" data-image-url="${imageSrc}">
                                <div class="card-body text-center p-4 d-flex flex-column">
                                    <img src="${imageSrc}"
                                        alt="Photographer ${name} ${lname}"
                                        class="rounded-circle mb-3 mx-auto photographer-image">
                                    <h5 class="card-title mb-2 photographer-name">${name} ${lname}</h5>
                                    <p class="card-text text-muted photographer-type"><em>${column.description}</em></p>
                                    <p class="card-text text-muted small photographer-skills"> ${skill}</p>
                                    <div class="mt-auto">
                                        <a href="#profile-link-${user_id}" class="btn btn-sm btn-outline-primary photographer-profile-link">Profile</a>
                                        <button type="button" class="btn btn-sm btn-info btn-edit-photographer" data-bs-toggle="modal" data-bs-target="#editPhotographerModal">
                                            <i class="fas fa-edit"></i> Edit
                                        </button>
                                        <button type="button" onclick="del_photographer('${user_id}')" class="btn btn-sm btn-danger btn-delete-photographer">
                                            <i class="fas fa-trash"></i> Delete
                                        </button>
                                    </div>
                                </div>
                            </div>`);
                        });
                    }
                }
            })
        }

        $('#photo').on('keyup', function() {
            displayAllphotographers($(this).val());
        });
        
        window.addEventListener("DOMContentLoaded", function() {
            displayAllphotographers();
        });
    </script>

</body>

</html>

<?= import_packages("tyrax", "twal", "loading", "ctr", "paths") ?>

<script>
    addEventListener("DOMContentLoaded", () => {
        LOADING.load(true);
        setTimeout(() => LOADING.load(false), 1000)
    })
</script>

<script>
    addPhotographerForm.addEventListener("submit", function() {
        event.preventDefault();
        $data = DOM.form_object("#addPhotographerForm");

        tyrax.post({
            url: "admin/add",
            request: $data,
            wait: () => LOADING.load(true),
            done: () => LOADING.load(false),
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
    function del_photographer(user_id) {
        twal.ask(`Are you sure to delete photographer id ${user_id}`)
        .then((click)=>{
            if(click.confirm){
                tyrax.post({
            url: "admin/delete",
            request: {
                user_id: user_id
            },
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
            }
        });
    }
</script>