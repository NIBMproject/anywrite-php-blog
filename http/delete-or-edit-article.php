<?php 
// print_r($_POST);
session_start();
require_once('../includes/db.php');
require_once('../includes/fo.php');

$db = new Db();
$fo = new Fo();

if(isset($_SESSION['user'])){
	if(isset($_POST['delete'])){
		if($_SESSION["user"]['id'] == $db->findDataById("article",$_POST['id'],"user_id") ){
			$img = $db->findDataById("article",$_POST['id'],"image");
			$fo->deleteFile($img);
			$db->deleteRowById("article",$_POST['id']);
		}
		header("Location: ../?page=my-article");
	}



	if(isset($_POST['update'])){
		// echo "ok";
		header("Location: ../?page=edit-article&id={$_POST['id']}");
	}
}



?>