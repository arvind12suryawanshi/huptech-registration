<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form huptech</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <form id="registrationForm" action="process_form.php"  method="post" onsubmit="return validateForm()">
    <!-- <h1 style = "color:red" align-items: center>Huptech Registration</h1> -->
    <h1 style="color: blue; text-align: center;  font-family: 'Montserrat', sans-serif;;">Huptech Registration</h1>


        <div class="form-group">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username">
            <div class="error" id="usernameError"></div>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email">
            <div class="error" id="emailError"></div>
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" id="password" name="password">
            <div class="error" id="passwordError"></div>
        </div>
        <div class="form-group">
            <label for="confirmPassword">Confirm Password:</label>
            <input type="password" id="confirmPassword" name="confirmPassword">
            <div class="error" id="confirmPasswordError"></div>
        </div>
        <div class="form-group">
            <input type="checkbox" id="termsAndConditions" name="termsAndConditions">
            <label for="termsAndConditions">I agree to the Terms & Conditions</label>
            <div class="error" id="termsAndConditionsError"></div>
        </div>
        <button type="submit">Register</button>
    </form>

    <script src="script.js"></script>
</body>
</html>
