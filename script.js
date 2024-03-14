function validateForm() {
    var username = document.getElementById("username").value;
    var email = document.getElementById("email").value;
    var password = document.getElementById("password").value;
    var confirmPassword = document.getElementById("confirmPassword").value;
    var termsAndConditions = document.getElementById("termsAndConditions").checked;
    
    // Resetting errors
    document.querySelectorAll('.error').forEach(function(element) {
        element.innerHTML = '';
    });

    // Username validation
    if (username.length < 3 || username.length > 15) {
        document.getElementById("usernameError").innerHTML = "Username must be between 3 and 15 characters";
        return false;
    }

    // Email validation
    var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailRegex.test(email)) {
        document.getElementById("emailError").innerHTML = "Invalid email address";
        return false;
    }

    // Password validation
    var passwordRegex = /^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{8,}$/;
    if (!passwordRegex.test(password)) {
        document.getElementById("passwordError").innerHTML = "Password must be at least 8 characters long and contain at least one number and one special character";
        return false;
    }

    // Confirm password validation
    if (password !== confirmPassword) {
        document.getElementById("confirmPasswordError").innerHTML = "Passwords do not match";
        return false;
    }

    // Terms and conditions validation
    if (!termsAndConditions) {
        document.getElementById("termsAndConditionsError").innerHTML = "Please agree to the Terms & Conditions";
        return false;
    }

    return true;
}
