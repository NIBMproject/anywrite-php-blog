<?php 
// print_r($_POST);
session_start();
require_once('../includes/db.php');
require_once('../includes/fo.php');

$db = new Db();
$fo = new Fo();

if(isset($_SESSION['user'])){
	if(isset($_POST['delete'])){
		$img = $db->findDataById("article",$_POST['id'],"image");
		$fo->deleteFile($img);
		$db->deleteRowById("article",$_POST['id']);

		header("Location: ../?page=my-article");
	}

	echo "ok";

	if(isset($_POST['update'])){
		echo "update";
	}
}



?>