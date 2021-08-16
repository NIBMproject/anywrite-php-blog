

<?php 
//set views
require_once('../includes/db.php');
require_once('../includes/util.php');
$db = new Db();
$util = new Util();
if(isset($_GET['id'])){
	$oldview = $db->findDataById("article",$_GET['id'],"views");
	$db->updateCellById("article",$_GET['id'],"views",$oldview+1);
	// echo "ok";
	header("Location:../?page=read-article&id={$_GET['id']}");


}
?>

