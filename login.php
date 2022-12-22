<?php
include 'includes/config.php';
include 'includes/classes/Autoload.php'; // AUTO LOADING THE REQIURED CLASSES

$account = new Account($con);

if (isset($_POST['submit'])) {
    $username = InputSanitizer::sanitizeUsername($_POST['username']);
    $password = InputSanitizer::sanitizePassword($_POST['password']);

    $success = $account->login($username, $password);
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
                <h3>Sign In</h3>
                <h5>to continue watching</h5>
                <form action="#" method="POST">
                    <div class="form-group">
                        <input type="text" name="username" id="username" placeholder="Username" value="<?php old('username'); ?>">
                        <label for="username">Username</label>
                        <?php echo "<small style='color:red'>" . $account->getError(Constants::$loginFailed) . "</small>"; ?>
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" id="password" placeholder="Password">
                        <label for="password">Password</label>
                    </div>
                    <button type="submit" name="submit" id="submit">Login</button>
                    <small><a href="/register.php">Need an account ? Sign up here</a></small>
                </form>
            </div>
        </div>
    </div>
    <?php
    include 'includes/partials/scripts.php';
    ?>
</body>

</html>