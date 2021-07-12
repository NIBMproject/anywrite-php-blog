<?php



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

    include_once('views/ui/nav.php');

    include_once('views/pages/' . $page . '.php');

    include_once('views/ui/footer.php');
    ?>
</body>

</html>