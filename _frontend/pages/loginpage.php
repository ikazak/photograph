<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>PPhotography - Login</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">


    <!-- Favicon -->
    <link href="<?= assets() ?>/img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Roboto:wght@500;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="<?= assets() ?>/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="<?= assets() ?>/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="<?= assets() ?>/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="<?= assets() ?>/css/style.css" rel="stylesheet">

    <?php code_library() ?>

    <style>
        :root {
            --logo-red: #D81921;
            --logo-black: #1E1E1E;
        }

        body {
            font-family: 'Open Sans', sans-serif;
        }

        #left-panel-login {
            background: linear-gradient(135deg, #a71019 0%, var(--logo-black) 100%);
        }

        #left-panel-login h1,
        #left-panel-login .display-4 {
            color: #FFFFFF;
            font-weight: bold;
        }

        #left-panel-login p {
            color: #FFFFFF;
        }

        #left-panel-login .lead {
            opacity: 0.85;
        }

        #left-panel-login .bottom-text {
            opacity: 0.6 !important;
        }

        .rounded-logo {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            object-fit: cover;
            border: 3px solid rgba(255, 255, 255, 0.8);
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.25);
        }


        #login-button {
            background-color: var(--logo-red);
            border-color: var(--logo-red);
            color: white;
            font-weight: 600;
            padding-top: 0.75rem;
            padding-bottom: 0.75rem;
        }

        #login-button:hover {
            background-color: #b8161d;
            border-color: #b8161d;
        }

        #forgot-password-link,
        #signup-link {
            color: var(--logo-red);
            text-decoration: none;
        }

        #forgot-password-link:hover,
        #signup-link:hover {
            color: #b8161d;
            text-decoration: underline;
        }

        #login-form-container .form-control {
            border-radius: 0.25rem;
        }

        #login-form-container .form-control:focus {
            border-color: var(--logo-red);
            box-shadow: 0 0 0 0.25rem rgba(216, 25, 33, 0.25);
        }

        #login-form-container .form-check-input {
            border-color: #ced4da;
        }

        #login-form-container .form-check-input:checked {
            background-color: var(--logo-red);
            border-color: var(--logo-red);
        }

        #login-form-container .form-check-label,
        #login-form-container .form-floating>label {
            color: #6c757d;
        }

        #login-form-container>div>.text-center.mb-4 h3 {
            color: #212529;
            font-weight: 700;
        }

        #login-form-container>div>.text-center.mb-4 .text-muted {
            color: #6c757d !important;
        }

        #login-form-container p {
            color: #495057;
        }

        #togglePasswordVisibility i {
            color: #6c757d;
        }

        #togglePasswordVisibility i:hover {
            color: var(--logo-red);
        }

        /* Caps Lock Warning Style - can be adjusted */
        #capsLockWarning {
            font-size: 0.875em;
        }
        .backbutton{
            height: 30px;
            width: 100px;
            cursor: pointer;
            background-color: #f07278ff;
            color: while;
            border-radius: 10px;
            
        }
        .backbutton:hover{
            background-color: orangered;
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

        <!-- Sign In Start -->
        <div class="container-fluid p-0">
            <div class="row g-0" style="min-height: 100vh;">

                <div class="col-lg-7 d-none d-lg-flex flex-column justify-content-between p-5" id="left-panel-login">
                    <div>
                        <a href="<?= page('home.php') ?>"><button class="backbutton">back</button></a>
                    </div>
                    <div>
                        <div class="text-center mb-4">
                            <img src="<?= assets() ?>/img/logop.jpg" alt="PPhotography Logo" class="rounded-logo">
                        </div>
                        <h1 class="display-4 mb-3 text-center">PPhotography</h1>
                        <p class="lead text-center">
                            At PPhotography, we believe every picture tells a story. Let us help you tell yours with stunning, high-quality images.
                        </p>
                    </div>
                    <div>
                        <p class="bottom-text text-center">Pretty. Powerful. Photography.</p>
                    </div>
                </div>

                <div class="col-lg-5 d-flex flex-column justify-content-center align-items-center p-4 p-sm-5" style="background-color: #FFFFFF;" id="login-form-container">
                    <div class="w-100" style="max-width: 400px;">

                        <div class="text-center mb-4">
                            <h3 class="mb-1">Login</h3>
                            <p class="text-muted">Welcome! Login to get amazing discounts and offers only for you.</p>
                        </div>

                        <form id="loginform">
                            <div class="form-floating mb-3">
                                <input name="email" type="email" class="form-control" id="email" placeholder="name@example.com" required>
                                <label for="email">Email address</label>
                            </div>
                            <div class="form-floating mb-4 position-relative">
                                <input name="password" type="password" class="form-control" id="password" placeholder="Password" required>
                                <label for="password">Password</label>
                                <span class="position-absolute top-50 end-0 translate-middle-y pe-3" id="togglePasswordVisibility" style="cursor: pointer; z-index: 5;">
                                    <i class="fas fa-eye" aria-hidden="true"></i>
                                </span>
                            </div>
                            <div id="capsLockWarning" class="form-text text-danger mb-2" style="display: none;">
                                Caps Lock is ON
                            </div>
                            <div class="d-flex align-items-center justify-content-between mb-4">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                    <label class="form-check-label" for="exampleCheck1">Remember me</label>
                                </div>
                                <a href="#" id="forgot-password-link">Forgot your password?</a>
                            </div>
                            <button type="submit" class="btn py-3 w-100 mb-4" id="login-button">LOGIN</button>
                            <p class="text-center mb-0">Don't have an Account? <a href="<?= page('registerpage') ?>" id="signup-link">Sign Up</a></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Sign In End -->
    </div>

    <?= import_packages("datatable", "tyrax", "loading", "ctr", "path", "twal") ?>

    <script>
        addEventListener("DOMContentLoaded", () => {
            LOADING.load(true);

            setTimeout(() => LOADING.load(false), 1000)

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
    <?= import_tyrux() ?>
    <?= import_twal() ?>
    <?= import_loading() ?>

    <script>
        //add
        on_submit("#loginform", async function(event) {
            event.preventDefault();
            $data = get_form_data("#loginform");
            tyrax.post({
                url: "login/login",
                request: $data,
                response: (send) => {
                    if (send.code == 404) {
                        twal.err({
                            text: send.message
                        })
                    }
                    if (send.code == 200) {
                        $id = send.user_id;
                        localStorage.setItem("id", $id);
                        twal.success({
                            text: send.message

                        }).then(() => location.href = "<?= page('photographer/photodashboard') ?>")

                    }
                    if (send.code == 201) {
                        $id = send.user_id;
                        localStorage.setItem("id", $id);
                        twal.success({
                            text: send.message

                        }).then(() => location.href = "<?= page('admin/homepage') ?>")

                    }
                    if (send.code == 203) {
                        $id = send.user_id;
                        localStorage.setItem("id", $id);
                        twal.success({
                            text: send.message

                        }).then(() => location.href = "<?= page('users/home') ?>")

                    }
                }

            })

        });

        // SCRIPT FOR PASSWORD TOGGLE & CAPS LOCK
        document.addEventListener('DOMContentLoaded', function() {
            const passwordInput = document.getElementById('password');
            const togglePasswordButton = document.getElementById('togglePasswordVisibility');
            const capsLockWarning = document.getElementById('capsLockWarning');

            if (passwordInput && togglePasswordButton) {
                const eyeIcon = togglePasswordButton.querySelector('i');

                togglePasswordButton.addEventListener('click', function() {
                    const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
                    passwordInput.setAttribute('type', type);

                    if (type === 'password') {
                        eyeIcon.classList.remove('fa-eye-slash');
                        eyeIcon.classList.add('fa-eye');
                    } else {
                        eyeIcon.classList.remove('fa-eye');
                        eyeIcon.classList.add('fa-eye-slash');
                    }
                });
            }

            if (passwordInput && capsLockWarning) {
                function checkCapsLock(event) {
                    // Check if getModifierState is available (it might not be on all event types)
                    if (typeof event.getModifierState === 'function') {
                        if (event.getModifierState("CapsLock")) {
                            capsLockWarning.style.display = "block";
                        } else {
                            capsLockWarning.style.display = "none";
                        }
                    }
                }

                passwordInput.addEventListener('keyup', checkCapsLock);
                passwordInput.addEventListener('keydown', checkCapsLock);

                passwordInput.addEventListener('focus', function(event) {
                    // Attempt to check on focus, but primarily rely on key events
                    // Some browsers might not update getModifierState on focus without a key event
                    setTimeout(() => { // Use a timeout to allow browser to process state
                        if (navigator.getModifierState) { // Modern way to check, not tied to event
                            if (navigator.getModifierState("CapsLock")) {
                                capsLockWarning.style.display = "block";
                            } else {
                                // It might be off, but if it was on before focus and no key was pressed,
                                // this might not hide it. Rely on subsequent keyup/keydown or blur.
                            }
                        } else if (event.getModifierState && event.getModifierState("CapsLock")) {
                            // Fallback if navigator.getModifierState is not supported
                            capsLockWarning.style.display = "block";
                        }
                    }, 50); // Adjust delay if needed
                });

                passwordInput.addEventListener('blur', function() {
                    capsLockWarning.style.display = "none";
                });
            }
        });
    </script>
</body>

</html>