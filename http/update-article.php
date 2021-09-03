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
        'cover' => 'Image'

    ];
    $ruls = [
        "title" => ["require" => 1, "max" => 100],           
        "contex" => ["require" => 1, "max" => 10000, "min" => 1],
        "category"=>["require" => 1],



    ];

    // print_r($_FILES);

    $vali->validate($_POST, $ruls, $cns);

    $vali->fileValidation(
        $_FILES['cover'],
        [
            'maxsize' => 5,
            'types' => ['png', 'jpg', 'jpeg'],
            
        ],
        "Image"
    );


    if ($vali->isok == true) {


        if ($_FILES['cover']['name'] != "") {
            $d = date("Y-m-d h:i:sa");
            $fileName = sha1($d . $_SESSION['user']['email']);
            $img_path = 'assets/img/articles/' .$fileName. "." . explode("/", $_FILES['cover']['type'])[1];
            $fo->newFile($_FILES['cover'], '../assets/img/articles/', $fileName);
        }

        $db->updateCellById("article",$_POST['id'],"title",$_POST['title']);
        $db->updateCellById("article",$_POST['id'],"category_id",$_POST['category']);
        $db->updateCellById("article",$_POST['id'],"content",$_POST['contex']);



        
        $_SESSION['msg'] = ['',[]];
        header("Location: ../?page=my-article");
    } else {
        $_SESSION['msg'] = ['error', $vali->errorList];
        header("Location: ../?page=edit-article");
    }

}
