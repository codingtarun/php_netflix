<?php
include 'includes/classes/InputSanitizer.php';


if (isset($_POST['submit'])) {
    $firstName =  InputSanitizer::sanitizeInput($_POST['fname']); //calling static function using ClassName::functionName
    $lastName = InputSanitizer::sanitizeInput($_POST['lname']);
    $username = InputSanitizer::sanitizeInput($_POST['username']);
    $email = InputSanitizer::sanitizeInput($_POST['email']);
    $confirmemail = InputSanitizer::sanitizeInput($_POST['confirmemail']);
    $password = $_POST['password'];
    $confirmpassword = $_POST['confirmpassword'];
}

include 'includes/partials//header.php';

?>

<body>
    <div class="container-fluid g-0">
        <div class="login_form">
            <div class="login_form_box">
                <h1>Php Netflix</h1>
                <h3>Sign Up</h3>
                <h5>to continue watching</h5>
                <form action="" method="POST">
                    <div class="form-group">
                        <input type="text" name="fname" id="fname" placeholder="First Name">
                        <label for="fname">First Name</label>
                    </div>
                    <div class="form-group">
                        <input type="text" name="lname" id="lname" placeholder="Last Name">
                        <label for="lname">Last Name</label>
                    </div>
                    <div class="form-group">
                        <input type="text" name="username" id="username" placeholder="Username">
                        <label for="username">Username</label>
                    </div>
                    <div class="form-group">
                        <input type="email" name="email" id="email" placeholder="Email">
                        <label for="email">Email</label>
                    </div>
                    <div class="form-group">
                        <input type="email" name="confirmemail" id="confirmemail" placeholder="Confirm Email">
                        <label for="confirmemail">Confirm Email</label>
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" id="password" placeholder="Password">
                        <label for="password">Password</label>
                    </div>
                    <div class="form-group">
                        <input type="password" name="confirmpassword" id="confirmpassword" placeholder="Confirm Password">
                        <label for="confirmpassword">Confirm Password</label>
                    </div>
                    <button type="submit" name="submit" id="submit">Submit</button>
                    <small><a href="#">Already have an account ? Sign in here</a></small>
                </form>
            </div>
        </div>
    </div>
    <?php
    include 'includes/partials/scripts.php';
    ?>
</body>

</html>