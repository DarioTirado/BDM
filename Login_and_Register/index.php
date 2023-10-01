<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Login </title>
    <link rel="stylesheet" href="style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

</head>


<body>


    <div class="wrapper">
        <form method = "POST" action="../PHP/VALIDAR_LOGIN.php">
            <h1 >Login</h1>

            <div class="input-box">
                <input type="text" placeholder="Username" name="user" required>
                <i class='bx bxs-user'></i>

            </div>
            <div class="input-box">
                <input type="password" placeholder="Password" name="pass" required>
                <i class="'bx bxs-lock-alt"></i>

            </div>
            <div class="remember-forgot">
                <label><input type="checkbox"> Remember me</label>
                <a href="#">Forgot password?</a>
            </div>

            <input name="BTN_INGRESAR" class="btn btn-primary btn-block fa-lg gradient-custom-2 mb-3" type="submit" value="Log In">
            <div class="register-link">
                <p>Don't have an account? <a href="register.html">Register</a></p>
            </div>
        </form>

    </div>

</body>

<script src="java_log_register.js" ></script>
</html>