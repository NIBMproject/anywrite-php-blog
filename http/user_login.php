<?php
// print_r($_POST);
require_once('../includes/auth.php');
$auth = new Auth();
// echo "ok";
$auth->login($_POST);

?>