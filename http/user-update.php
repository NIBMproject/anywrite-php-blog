<!-- validation -->
<?php

require_once('../includes/db.php');
require_once('../includes/validation.php');
require_once('../includes/fo.php');


session_start();



if (isset($_POST["submit"])) {
    // print_r($_POST);
    $vali = new Validation();
    $db = new Db();
    $fo = new Fo();
    $cns = [
        'tp' => 'telephone number',
        'addr' => 'address',
        'dob' => 'date of birth',
        'myfile' => 'profile picture'

    ];
    $ruls = [
        "name" => ["require" => 1, "max" => 100],            
        "tp" => ["require" => 1, "max" => 15],
        "addr" => ["require" => 1, "max" => 250],
        "dob" => ["require" => 1],
    ];


    $vali->validate($_POST, $ruls, $cns);

    $vali->fileValidation($_FILES['myfile'], ['maxsize' => 5,"require" => 0 ,'types' => ['png','PNG','jpg','JPG','JPEG', 'jpeg']], "Image");


    if ($vali->isok == true) {

        

        if ($_FILES['myfile']['name'] != "") {
            $fileName = sha1($_POST["email"]);
            $img_path = 'assets/img/profiles/' .$fileName. "." . explode("/", $_FILES['myfile']['type'])[1];
            $fo->newFile($_FILES['myfile'], '../assets/img/profiles/', $fileName);
            $db->updateCellById("user",$_SESSION['user']['id'],"img_path",$img_path);
        }

        $db->updateCellById("user",$_SESSION['user']['id'],"name",$_POST['name']);
        $db->updateCellById("user",$_SESSION['user']['id'],"address",$_POST['addr']);
        $db->updateCellById("user",$_SESSION['user']['id'],"telephone",$_POST['tp']);
        $db->updateCellById("user",$_SESSION['user']['id'],"dob",$_POST['dob']);


        
        $_SESSION['msg'] = ['success',['updated!']];
        $_SESSION['user'] = $db->findRowById("user",$_SESSION['user']['id']);
        header("Location: ../?page=profile");


    } else {
        $_SESSION['msg'] = ['error',$vali->errorList];
        header("Location: ../?page=profile");
    }
}
?>




