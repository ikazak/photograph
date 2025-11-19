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

            <!-- Button to Open Modal for Adding New Photographer -->
            <div class="p-4 text-end">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addPhotographerModal">
                    <i class="fas fa-plus"></i> Add Photographer
                </button>
            </div>

            <h1 class="text-center text-uppercase fw-bold border-bottom pb-2 mb-4 text-secondary">
                List of Photographer
            </h1>


            <!-- Card Section Start (STATIC EXAMPLE - 8 Cards, 4 per row on LG) -->
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
                            <!-- Fields for adding a photographer -->
                            <div class="mb-3">
                                <label for="addPhotographerFname" class="form-label">First Name</label>
                                <input type="text" class="form-control " id="addPhotographerFname" name="name" required>
                            </div>
                            <div class="mb-3">
                                <label for="addPhotographerLname" class="form-label">Last Name</label>
                                <input type="text" class="form-control" id="addPhotographerLname" name="lname" required>
                            </div>
                            <div class="mb-3">
                                <label for="addPhotographerLname" class="form-label">Email Address</label>
                                <input type="text" class="form-control" id="addPhotographerLname" name="username" required>
                            </div>
                            <div class="mb-3">
                                <label for="addPhotographerLname" class="form-label">contact</label>
                                <input type="text" class="form-control" id="addPhotographerLname" name="contact" required>
                            </div>
                            <div class="mb-3">
                                <label for="addPhotographerLname" class="form-label">skills</label>
                                <input type="text" class="form-control" id="addPhotographerLname" name="skill" required>
                            </div>
                            <div class="mb-3">
                                <label for="addTypeOfPhotographer" class="form-label">Descriptions</label>
                                <input type="text" name="description" class="form-control" id="addPhotographerLname">
                            </div>

                            <div class="mb-3">
                                <label for="serviceImage" class="form-label">Profile Image</label>
                                <input type="file" class="form-control" id="serviceImage" accept="image/*" name="img">
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" form="addPhotographerForm" id="submit" class="btn btn-primary">Save Photographer</button>
                            </div>
                            <!-- Add other fields as needed -->
                        </form>
                    </div>

                </div>
            </div>
        </div>

        <!-- Edit Photographer Modal (Added Structure) -->
        <div class="modal fade" id="editPhotographerModal" tabindex="-1" aria-labelledby="editPhotographerModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editPhotographerModalLabel">Edit Photographer</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="editPhotographerForm">
                            <input type="hidden" id="PhotographerID" name="photographerID"> <!-- For storing ID -->
                            <div class="mb-3 text-center">
                                <img src="#" alt="Current Photographer Image" id="currentPhotographerImage" class="rounded-circle mb-3" style="width: 100px; height: 100px; object-fit: cover; display: none;">
                                <p class="no-image-text" style="display: none;">No image provided.</p> <!-- For text fallback -->
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
                            <!-- Add other fields as needed -->
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
                var card = $(this).closest('.photographer-card');

                var photographerID = card.data('id');
                var fname = card.data('fname');
                var lname = card.data('lname');
                var type = card.data('type');
                var age = card.data('age');
                var email = card.data('email');
                var skills_data = card.data('skills');
                var description_data = card.data('description');
                var imageUrl = card.data('image-url'); // This comes from data-image-url on the card

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
                    $currentImage.attr('src', imageUrl).show(); // Use the imageUrl from data attribute
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
            //const $container = $('#photographerCardRow');
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
                            <div class="card h-100" style="width:300px;">
                                <div class="card-body text-center p-4 d-flex flex-column">
                                    <img src="${imageSrc}"
                                        alt="Photographer Jane Doe"
                                        class="rounded-circle mb-3 mx-auto photographer-image"
                                        style="width: 100px; height: 100px; object-fit: cover;">
                                    <h5 class="card-title mb-2 photographer-name">${name} ${lname}</h5>
                                    <p class="card-text text-muted photographer-type"><em>${column.description}</em></p>
                                    <p class="card-text text-muted small photographer-skills">Skills: ${skill}</p>
                                    <div class="mt-auto">
                                        <a href="#profile-link-jane" class="btn btn-sm btn-outline-primary photographer-profile-link">Profile</a>
                                        <button type="button" class="btn btn-sm btn-info btn-edit-photographer" data-bs-toggle="modal" data-bs-target="#editPhotographerModal">
                                            <i class="fas fa-edit"></i> Edit
                                        </button>
                                        <button type="button" onclick="del_photographer('${user_id}')" class="btn btn-sm btn-danger btn-delete-photographer" data-bs-toggle="modal" data-bs-target="#deletePhotographerModal">
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