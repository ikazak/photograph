<?php

// --- Database Configuration ---
$servername = "localhost"; // As seen in your phpMyAdmin
$username = "root"; // << CHANGE THIS to your MySQL username
$password = ""; // << CHANGE THIS to your MySQL password
$dbname = "photographer";   // As seen in your phpMyAdmin


// --- Create Connection ---
$con = new mysqli($servername, $username, $password, $dbname);

// Check Connection
if ($con->connect_error) {
    // In a real app, log this error and show a generic message to the user
    die("Connection failed: " . $con->connect_error);
}
/// --- Form Processing ---
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // 1. Get data from POST request (with basic sanitization for strings)
    $photographer_fname = trim($_POST['photographer_fname'] ?? '');
    $photographer_lname = trim($_POST['photographer_lname'] ?? '');
    $photographer_age_str = trim($_POST['photographer_age'] ?? ''); // Get as string first
    $type_of_photographer = trim($_POST['type_of_photographer'] ?? '');
    $phone = trim($_POST['phone'] ?? ''); // Not in 'photographers' table
    $address = trim($_POST['address'] ?? ''); // Not in 'photographers' table
    $email = trim($_POST['email'] ?? '');
    $raw_password = $_POST['password'] ?? '';
    $confirm_password = $_POST['confirm_password'] ?? '';
    $terms_checked = isset($_POST['termsCheck']); // Will be true if checkbox is checked

    // 2. Server-side Validation
    $errors = [];

    if (empty($photographer_fname)) {
        $errors[] = "First name is required.";
    }
    if (empty($photographer_lname)) {
        $errors[] = "Last name is required.";
    }
    if (empty($photographer_age_str)) {
        $errors[] = "Age is required.";
    } elseif (!ctype_digit($photographer_age_str) || (int)$photographer_age_str < 16 || (int)$photographer_age_str > 120) {
        $errors[] = "Invalid age. Must be a number between 16 and 120.";
    } else {
        $photographer_age = (int)$photographer_age_str; // Convert to integer after validation
    }

    if (empty($type_of_photographer)) {
        $errors[] = "Type of photographer is required.";
    }
    if (empty($email)) {
        $errors[] = "Email is required.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format.";
    }
    if (empty($raw_password)) {
        $errors[] = "Password is required.";
    } elseif (strlen($raw_password) < 6) {
        $errors[] = "Password must be at least 6 characters long.";
    }
    if ($raw_password !== $confirm_password) {
        $errors[] = "Passwords do not match.";
    }
    if (!$terms_checked) {
        $errors[] = "You must agree to the terms and conditions.";
    }

    // Check if email already exists (optional but good practice)
    if (empty($errors) && !empty($email)) {
        $stmt_check_email = $con->prepare("SELECT photographerID FROM photographers WHERE photographer_email = ?");
        if ($stmt_check_email) {
            $stmt_check_email->bind_param("s", $email);
            $stmt_check_email->execute();
            $stmt_check_email->store_result();
            if ($stmt_check_email->num_rows > 0) {
                $errors[] = "This email address is already registered.";
            }
            $stmt_check_email->close();
        } else {
            $errors[] = "Error checking email: " . $con->error; // Database error
        }
    }


    // 3. If no errors, proceed to insert
    if (empty($errors)) {
        // Hash the password
        $hashed_password = password_hash($raw_password, PASSWORD_DEFAULT);

        // Default/Placeholder values for columns not in the form
        $photographer_image_data = "NO_IMAGE_UPLOADED_YET"; // Placeholder for longblob
        $description = ""; // Default empty description
        $skills = "";      // Default empty skills
        $status = 1;       // Default status (e.g., 1 for active)
        $custom_type_column_value = "Registered"; // Default for the 'type' column if different from 'type_of_photographer'


        // Prepare SQL Statement (using Prepared Statements to prevent SQL injection)
        $sql = "INSERT INTO photographers (
                    photographer_image,
                    photographer_fname,
                    photographer_lname,
                    type_of_photographer,
                    photographer_age,
                    photographer_email,
                    photographer_password,
                    status,
                    description,
                    skills,
                    type
                ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $stmt = $con->prepare($sql);

        if ($stmt === false) {
            // In a real app, log this and show a user-friendly error
            echo "Error preparing statement: " . htmlspecialchars($con->error);
        } else {
            // Bind Parameters
            // "b" for blob, "s" for string, "i" for integer
            $stmt->bind_param(
                "bsssisissss",
                $photographer_image_data,
                $photographer_fname,
                $photographer_lname,
                $type_of_photographer,
                $photographer_age, // This is now an integer
                $email,
                $hashed_password,
                $status,
                $description,
                $skills,
                $custom_type_column_value
            );

            // Execute Statement
            if ($stmt->execute()) {
                $last_id = $con->insert_id;
                echo "Registration successful! Your Photographer ID is: " . $last_id;
                // In a real app, you might redirect to a login page or a "check your email" page.
                    header("Location: /_frontend/pages/loginpage.php ");
                    exit();
            } else {
                echo "Error during registration: " . htmlspecialchars($stmt->error);
                // Log the detailed error for debugging: error_log("MySQL Error: " . $stmt->error);
            }
            $stmt->close();
        }
    } else {
        // Display errors
        echo "<h4>Please correct the following errors:</h4>";
        echo "<ul>";
        foreach ($errors as $error) {
            echo "<li>" . htmlspecialchars($error) . "</li>";
        }
        echo "</ul>";
        echo '<p><a href="javascript:history.back()">Go Back</a></p>'; // Simple go back link
    }

    $con->close();

} else {
    // Not a POST request, redirect or show error
    echo "Invalid request method.";

}