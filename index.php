<?php
include 'includes/config.php';
include 'includes/classes/Autoload.php'; // AUTO LOADING THE REQIURED CLASSES
include 'includes/classes/Entitity.php';
include 'includes/partials/header.php';
if (!isset($_SESSION['userLoggedIn'])) {
    header("location:login.php");
}
if (isset($_POST['logout'])) {
    SessionHelper::logout();
    header("location:login.php");
}
$username = $_SESSION['userLoggedIn'];

$previewObj = new PreviewProvider($con, $username);
$img = $previewObj->getImagePreview(null);
$video = $previewObj->getVideoPreview(null);

$objCategories = new CategoryContainers($con);


?>

<body>
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled">Disabled</a>
                    </li>
                </ul>
                <ul class="navbar-nav ml-auto mb-2 mb-lg-0">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <?php
                            if (isset($_SESSION['userLoggedIn'])) {
                                echo $_SESSION['userLoggedIn'];
                            } else {
                                echo "NO USER";
                            }
                            ?>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Profile</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <form action="#" method="post">
                                    <button type="submit" class="dropdown-item" name="logout" id="logout">Logout </button>
                                </form>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <?php echo $previewObj->getVideoPreview(null); ?>
            </div>
        </div>

    </div>
    <div class="container">
        <?php echo $objCategories->getAllCategories(); ?>
    </div>
    <?php
    include 'includes/partials/scripts.php';
    ?>
</body>

</html>