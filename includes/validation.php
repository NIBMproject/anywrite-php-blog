<?php
require_once('db.php');
class Validation
{

    // require

    // min 
    // max 
    // equalTo 
    //unique


    public $isok = true;
    public $errorList = [];

    public function validate($data, $ruls, $coustomNames)
    {

        foreach ($ruls as $key => $val) {

            if (isset($data[$key])) {
                foreach ($val as $k => $v) {

                    $fieldName = array_key_exists($key, $coustomNames) ? ucwords($coustomNames[$key], " ") : ucwords($key, " ");
                    //check is required
                    if ($k == "require") {

                        if (isset($data[$key])) {
                            if ($data[$key] == "") {
                                array_push($this->errorList, "{$fieldName} This feild is required!");
                                $this->isok = $this->isok && false;
                            }
                        }
                    }
                    //check max
                    if ($k == "max") {
                        if (isset($data[$key])) {
                            if (strlen($data[$key]) >= $v) {
                                array_push($this->errorList, "{$fieldName} max {$v}!");
                                $this->isok = $this->isok && false;
                            }
                        }
                    }
                    //check min
                    if ($k == "min") {
                        if (isset($data[$key])) {
                            if (strlen($data[$key]) <= $v) {
                                array_push($this->errorList, "{$fieldName} min {$v}!");
                                $this->isok = $this->isok && false;
                            }
                        }
                    }
                    //password machine
                    if ($k == "equalTo") {
                        if (isset($data[$key])) {
                            if ($data[$key] != $data[$v]) {
                                array_push($this->errorList, "Password confirm faild!");
                                $this->isok = $this->isok && false;
                            }
                        }
                    }

                    //email is unique
                    if ($k == "unique") {
                        $db = new Db();
                        $r = $db->getDataCount($v[0], $v[1], $data[$key]);
                        if ($r != 0) {
                            array_push($this->errorList, "{$data[$key]} this email is all ready exist!");
                            $this->isok = $this->isok && false;
                        }
                    }
                }
            }
        }

        // print_r($errorList);

        return ["isOk" => $this->isok, "errors" => $this->errorList];
    }


    public function fileValidation($file, $ruls, $cn)
    {
        //ruls 
        //maxsize in mb
        //types
        if ($file['name'] != "") {
            if ($file['size'] > ($ruls['maxsize'] * 1024 * 1024)) {
                array_push($this->errorList, "{$cn} size is too big");
                $this->isok = $this->isok && false;
            }

            if (!in_array(explode("/", $file['type'])[1], $ruls['types'])) {

                array_push($this->errorList, "Invalid file type");
                $this->isok = $this->isok && false;
            }
        }
    }


    public function __destruct()
    {
        $isok = true;
        $errorList = [];
        // echo "des";
    }
}
