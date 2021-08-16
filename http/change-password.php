<?php
session_start(); 
require_once('../includes/db.php');
require_once('../includes/validation.php');

if($_SESSION['user']){

// print_r($_POST);
$vali = new Validation();
$db = new Db();
if(isset($_POST['submit'])){

	$ruls = [
		"old-password" => ["require" => 1],
        "password" => ["require" => 1],
        "cpassword" => ["equalTo" => "password"],
    ];
    $cns = [];
    $vali->validate($_POST, $ruls, $cns);

    if($vali->isok == true){
    	if (password_verify($_POST['old-password'],$_SESSION['user']['password'])) {

    		$db->updateCellById("user",$_SESSION['user']['id'],"password",password_hash($_POST['password'], PASSWORD_DEFAULT));
	        $_SESSION['msg'] = ['success',['updated!']];
	        $_SESSION['user'] = $db->findRowById("user",$_SESSION['user']['id']);

            // header("Location: ../?page=profile");
        }
    }else {
        $_SESSION['msg'] = ['error',$vali->errorList];
        header("Location: ../?page=profile");
    }


  
}

}?>