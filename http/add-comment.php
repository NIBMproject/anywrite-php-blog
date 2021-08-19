<?php
session_start();
require_once('../includes/db.php');
require_once('../includes/util.php');


if(isset($_GET['txt'])){

	$db = new Db();
	$util = new Util();
	if($_GET['txt'] != ""){
		$db->insert("comment",[
			"text" => $_GET['txt'],
			"articleId" => $_GET['aid'],
			"user_id" => $_SESSION['user']['id']
		]);
	}


	$data = array();
	$p = array();
	$r = $db->queryExecute("SELECT * FROM comment WHERE articleId = '{$_GET['aid']}' ORDER BY createAt DESC");
	if($r->num_rows >0){
		while($row = $r->fetch_assoc()){
			$newrow = array(
				"txt"=>$row['text'],
				"time" => $util->getTimeDiff($row['createAt']),
				"userPic" => $db->findDataById("user",$row['user_id'],"img_path"),
				"userName"=> $db->findDataById("user",$row['user_id'],"name")
			);
			array_push($p, $newrow);
		}
		$data = array_chunk($p,4);
	}


	header('Content-Type: application/json');
	echo json_encode($data) ;
}else{
	$db = new Db();
	$util = new Util();
	$data = array();
	$p = array();
	$r = $db->queryExecute("SELECT * FROM comment WHERE articleId = {$_GET['aid']} ORDER BY createAt DESC");
	if($r->num_rows >0){
		while($row = $r->fetch_assoc()){
			// echo $row['user_id'];
			// print_r($row);
			// echo " <br>";
			// echo $db->findDataById("user",$row['user_id'],"img_path");
			$newrow = array(
				"txt"=>$row['text'],
				"time" => $util->getTimeDiff($row['createAt']),
				"userPic" => $db->findDataById("user",$row['user_id'],"img_path"),
				"userName"=> $db->findDataById("user",$row['user_id'],"name")
			);

			// print_r($newrow);
			array_push($p, $newrow);
		}
		$data = array_chunk($p,4);
	}


	header('Content-Type: application/json');
	echo json_encode($data) ;

}

?>