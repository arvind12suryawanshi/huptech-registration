<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$database = "registration";

$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Function to validate data
function validateData($data) {
    // Trim whitespace
    $data = trim($data);
    // Remove slashes
    $data = stripslashes($data);
    // Prevent HTML characters
    $data = htmlspecialchars($data);
    return $data;
}

// Form submission handling
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = validateData($_POST["username"]);
    $email = validateData($_POST["email"]);
    $password = validateData($_POST["password"]);
    $confirmPassword = validateData($_POST["confirmPassword"]);
    $termsAndConditions = isset($_POST["termsAndConditions"]) ? 1 : 0;

    // Validate data on the server side
    $errors = array();

    // Username validation
    if (strlen($username) < 3 || strlen($username) > 15) {
        $errors['username'] = "Username must be between 3 and 15 characters";
    }

    // Email validation
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "Invalid email format";
    }

    // Password validation
    if (!preg_match("/^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{8,}$/", $password)) {
        $errors['password'] = "Password must be at least 8 characters long and contain at least one number and one special character";
    }

    // Confirm password validation
    if ($password !== $confirmPassword) {
        $errors['confirmPassword'] = "Passwords do not match";
    }

    // Terms and conditions validation
    if (!$termsAndConditions) {
        $errors['termsAndConditions'] = "Please agree to the Terms & Conditions";
    }

    // Check if username or email already exists
    $check_existing = "SELECT * FROM users WHERE username='$username' OR email='$email'";
    $result = $conn->query($check_existing);
    if ($result->num_rows > 0) {
        $errors['existingUser'] = "User with this username or email already exists";
    }

    // If no errors, insert data into database
    if (empty($errors)) {
        $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";

        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        // Display errors
        foreach ($errors as $error) {
            echo "<p>$error</p>";
        }
    }
}

// Close database connection
$conn->close();
?>
