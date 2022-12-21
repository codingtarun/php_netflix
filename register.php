<?php
include 'includes/config.php';
include 'includes/classes/Hash.php';
include 'includes/classes/Account.php';
include 'includes/classes/Constants.php';
include 'includes/classes/InputSanitizer.php';

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
        echo "Data Saved";
        //header("location:index.php");
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
                        <input type="text" name="fname" id="fname" placeholder="First Name">
                        <label for="fname">First Name</label>
                        <?php echo "<small style='color:red'>" . $account->getError(Constants::$firstNameError) . "</small>"; ?>
                    </div>
                    <div class="form-group">
                        <input type="text" name="lname" id="lname" placeholder="Last Name">
                        <label for="lname">Last Name</label>
                        <?php echo "<small style='color:red'>" . $account->getError(Constants::$lastNameError) . "</small>"; ?>
                    </div>
                    <div class="form-group">
                        <input type="text" name="username" id="username" placeholder="Username">
                        <label for="username">Username</label>
                        <?php echo "<small style='color:red'>" . $account->getError(Constants::$userNameError) . "</small>"; ?>
                        <?php echo "<small style='color:red'>" . $account->getError(Constants::$userNameTaken) . "</small>"; ?>
                    </div>
                    <div class="form-group">
                        <input type="email" name="email" id="email" placeholder="Email">
                        <label for="email">Email</label>
                        <?php echo "<small style='color:red'>" . $account->getError(Constants::$emailInvalid) . "</small>"; ?>
                    </div>
                    <div class="form-group">
                        <input type="email" name="confirmemail" id="confirmemail" placeholder="Confirm Email">
                        <label for="confirmemail">Confirm Email</label>
                        <?php echo "<small style='color:red'>" . $account->getError(Constants::$emailDontMatch) . "</small>"; ?>
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" id="password" placeholder="Password">
                        <label for="password">Password</label>
                        <?php echo "<small style='color:red'>" . $account->getError(Constants::$passwordLengthError) . "</small>"; ?>
                    </div>
                    <div class="form-group">
                        <input type="password" name="confirmpassword" id="confirmpassword" placeholder="Confirm Password">
                        <label for="confirmpassword">Confirm Password</label>
                        <?php echo "<small style='color:red'>" . $account->getError(Constants::$passwordMismatched) . "</small>"; ?>
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