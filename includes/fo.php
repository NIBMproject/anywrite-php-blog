<?php

class Fo
{
    public function newFile($file, $to, $name)
    {
        $temp = $file['tmp_name'];
        if ($temp != "") {
            return move_uploaded_file($temp, $to . $name . "." . explode("/", $file['type'])[1]);
        }
    }

    public function deleteFile($path){
        if(file_exists("../".$path)){
            unlink("../".$path);
        }else{
            echo "no file";
        }
    }
}
