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
}
