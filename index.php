<?php
session_start();


if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 'home';
}

$title = "blog | " . $page;

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once('views/ui/header.php'); ?>
</head>

<body>
    <?php
    require_once('includes/db.php');
    require_once('includes/validation.php');
    require_once('includes/fo.php');
    require_once('includes/pagination.php');
    require_once('includes/util.php');

    include_once('views/ui/nav.php');
    // echo "<br><br>";
    include_once('views/pages/' . $page . '.php');

    include_once('views/ui/footer.php');
    ?>
</body>

</html>