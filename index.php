<?php
$rootPath = $_SERVER['DOCUMENT_ROOT'];


if (isset($_GET['page'])){
    $page = $_GET['page'];
}else{
    $page = 'home';
}

    $title = "blog | " . $page;

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once($rootPath . '/views/ui/header.php'); ?>
</head>

<body>
    <?php


    include_once($rootPath . '/views/ui/nav.php');

    include_once($rootPath.'/views/pages/'.$page.'.php');

    include_once($rootPath . '/views/ui/footer.php');
    ?>
</body>

</html>