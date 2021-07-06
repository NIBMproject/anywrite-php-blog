<?php

class Validation
{

    // require

    // min 
    // max 
    // equalTo 


    public function validate($data, $ruls, $coustomNames)
    {
        $isok = true;
        $errorList = [];
        foreach ($ruls as $key => $val) {

            if (isset($data[$key])) {
                foreach ($val as $k => $v) {

                    $fieldName = array_key_exists($key, $coustomNames) ? ucwords($coustomNames[$key], " ") : ucwords($key, " ");

                    if ($k == "require") {

                        if (isset($data[$key])) {
                            if ($data[$key] == "") {
                                array_push($errorList, "{$fieldName} This feild is required!");
                                $isok = $isok && false;
                            }
                        }
                    }
                    if ($k == "max") {
                        if (isset($data[$key])) {
                            if (strlen($data[$key]) >= $v) {
                                array_push($errorList, "{$fieldName} max {$v}!");
                                $isok = $isok && false;
                            }
                        }
                    }

                    if ($k == "min") {
                        if (isset($data[$key])) {
                            if (strlen($data[$key]) <= $v) {
                                array_push($errorList, "{$fieldName} min {$v}!");
                                $isok = $isok && false;
                            }
                        }
                    }

                    if($k == "equalTo"){
                        if (isset($data[$key])) {
                            if ($data[$key] != $data[$v]) {
                                array_push($errorList, "Password confirm faild!");
                                $isok = $isok && false;
                            }
                        }
                    }
                }
            }
        }

        // print_r($errorList);

        return ["isOk" => $isok,"errors" => $errorList];

    }
}
