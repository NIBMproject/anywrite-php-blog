<?php

require_once("db.php");
session_start();
class Auth
{
    public function login($data)
    {
        $db = new Db();
        if (isset($data['email']) && isset($data['password'])) {
            // $pw = password_hash($data['password'],PASSWORD_DEFAULT);
            // echo $pw;
            $q = "SELECT * FROM user WHERE email = '{$data['email']}'";
            $r = $db->queryExecute($q);
            // print_r($q);
            // echo "<pre>";
            // print_r($r);
            // echo "</pre>";


            if ($r->num_rows == 1) {

                $user = $r->fetch_assoc();
                print_r($user);
                if (password_verify($data['password'], $user['password'])) {
                    // echo "passok";
                    $_SESSION['user'] = $user;
                    header("Location: ../?page=home");
                } else {
                    // echo "incorrect password";
                    $_SESSION['msg'] = ['error', ['Incorrect password']];
                    header("Location: ../?page=login");
                }
                // header("Location: ../?page=home");
            } else {
                // echo "invalid email address";
                $_SESSION['msg'] = ['error', ['Invalid email address']];
                header("Location: ../?page=login");
            }
        }
    }
}
