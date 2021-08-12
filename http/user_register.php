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
        "name" => ["require" => 1, "max" => 100],            //table   col
        "email" => ["require" => 1, "max" => 200, "unique" => ['user','email']],
        "tp" => ["require" => 1, "max" => 15],
        "addr" => ["require" => 1, "max" => 250],
        "utype" => ["require" => 1],
        "dob" => ["require" => 1],
        "password" => ["require" => 1],
        "cpassword" => ["equalTo" => "password"],



    ];


    $vali->validate($_POST, $ruls, $cns);

    $vali->fileValidation($_FILES['myfile'], ['maxsize' => 1, 'types' => ['png', 'jpg', 'jpeg']], "Image");

    // print_r($vali->errorList);
    // echo $vali->isok;



    // if (isset($v)) {
    if ($vali->isok == true) {

        //save image

        if ($_FILES['myfile']['name'] == "") {
            $img_path =  "assets/img/up.png";
        } else {
            $img_path = 'assets/img/profiles/' . $_POST["email"] . "." . explode("/", $_FILES['myfile']['type'])[1];
        }

        //insert to db
        $db->insert("user", [
            "name" => $_POST['name'],
            "email" => $_POST['email'],
            "telephone" => $_POST['tp'],
            "address" => $_POST['addr'],
            "user_type" => $_POST['utype'],
            "dob" => $_POST['dob'],
            "password" =>  password_hash($_POST['password'], PASSWORD_DEFAULT),
            "join_date" => date("Y/m/d"),
            "img_path" => $img_path
        ]);


        $fo->newFile($_FILES['myfile'], '../assets/img/profiles/', $_POST['email']);
        $_SESSION['msg'] = ['success',['Hi! your account is created. enter email and password for login']];
        header("Location: ../?page=login");


    } else {
        $_SESSION['msg'] = ['error',$vali->errorList];
        header("Location: ../?page=register");
    }
}
?>




