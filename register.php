<?php

include 'includes/config.php';
include 'includes/classes/Autoload.php'; // AUTO LOADING THE REQIURED CLASSES
// include 'includes/classes/Hash.php';
// include 'includes/classes/Account.php';
// include 'includes/classes/Constants.php';
// include 'includes/classes/InputSanitizer.php';
// include 'includes/classes/Autoload.php';
// spl_autoload_register(function ($class_name) { // Autoloading all php classes when their object is created using this function 
//     include 'includes/classes/' . $class_name . '.php';
// });

$account = new Account($con);

if (isset($_POST['submit'])) {
    $firstName =  InputSanitizer::sanitizeInput($_POST['fname']); // calling static function using ClassName::functionName
    $lastName = InputSanitizer::sanitizeInput($_POST['lname']);
    $username = InputSanitizer::sanitizeUsername($_POST['username']);
    $email = InputSanitizer::sanitizeEmail($_POST['email']);
    $confirmemail = InputSanitizer::sanitizeEmail($_POST['confirmemail']);
    $password = InputSanitizer::sanitizePassword($_POST['password']);
    $confirmpassword = InputSanitizer::sanitizePassword($_POST['confirmpassword']);

    $success = $account->register($firstName, $lastName, $username, $email, $confirmemail, $password,  $confirmpassword);
    if ($success) {
        $_SESSION["userLoggedIn"] = $username;
        header("location:index.php");
    }
}
function old($name)
{
    if (isset($_POST[$name])) {
        echo $_POST[$name];
    }
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
                <form action="#" method="POST">
                    <div class="form-group">
                        <input type="text" name="fname" id="fname" placeholder="First Name" value="<?php old('fname'); ?>">
                        <label for="fname">First Name</label>
                        <?php echo "<small style='color:red'>" . $account->getError(Constants::$firstNameError) . "</small>"; ?>
                    </div>
                    <div class="form-group">
                        <input type="text" name="lname" id="lname" placeholder="Last Name" value="<?php old('lname'); ?>">
                        <label for="lname">Last Name</label>
                        <?php echo "<small style='color:red'>" . $account->getError(Constants::$lastNameError) . "</small>"; ?>
                    </div>
                    <div class="form-group">
                        <input type="text" name="username" id="username" placeholder="Username" value="<?php old('username'); ?>">
                        <label for="username">Username</label>
                        <?php echo "<small style='color:red'>" . $account->getError(Constants::$userNameError) . "</small>"; ?>
                        <?php echo "<small style='color:red'>" . $account->getError(Constants::$userNameTaken) . "</small>"; ?>
                    </div>
                    <div class="form-group">
                        <input type="email" name="email" id="email" placeholder="Email" value="<?php old('email'); ?>">
                        <label for="email">Email</label>
                        <?php echo "<small style='color:red'>" . $account->getError(Constants::$emailInvalid) . "</small>"; ?>
                    </div>
                    <div class="form-group">
                        <input type="email" name="confirmemail" id="confirmemail" placeholder="Confirm Email" value="<?php old('confirmemail'); ?>">
                        <label for="confirmemail">Confirm Email</label>
                        <?php echo "<small style='color:red'>" . $account->getError(Constants::$emailDontMatch) . "</small>"; ?>
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" id="password" placeholder="Password" value="<?php old('password'); ?>">
                        <label for="password">Password</label>
                        <?php echo "<small style='color:red'>" . $account->getError(Constants::$passwordLengthError) . "</small>"; ?>
                    </div>
                    <div class="form-group">
                        <input type="password" name="confirmpassword" id="confirmpassword" placeholder="Confirm Password" value="<?php old('confirmpassword'); ?>">
                        <label for="confirmpassword">Confirm Password</label>
                        <?php echo "<small style='color:red'>" . $account->getError(Constants::$passwordMismatched) . "</small>"; ?>
                    </div>
                    <button type="submit" name="submit" id="submit">Submit</button>
                    <small><a href="/login.php">Already have an account ? Sign in here</a></small>
                </form>
            </div>
        </div>
    </div>
    <?php
    include 'includes/partials/scripts.php';
    ?>
</body>

</html>