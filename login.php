<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <div class="login-box">
            <h2>LOGIN</h2>
            <p>How do i get started?</p>

            <div class="input-group">
                <input type="text" id="username" placeholder="Username">
            </div>

            <div class="input-group">
                <input type="password" id="password" placeholder="Password">
            </div>
            <div class="login-button">
                <button onclick="login()">Login Now</button>
            </div>
            <br>
            <div class="register-button">
                 <a href="register.html" class="register-button">Register</a>
            </div>
            <div class="social-login">
                <p>Login with Others</p>
                <button class="google-btn">Login with Google</button>
                <button class="facebook-btn">Login with Facebook</button>
            </div>
        </div> 
    </div>
    <script src="script.js"></script>
</body>
</html>