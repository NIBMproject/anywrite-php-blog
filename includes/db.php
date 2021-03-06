<?php

class Db
{
    private $host = "localhost";
    private $user = "root";
    private $password = "";
    private $db = "anywrite";

    private $conn;

    public function __construct()
    {
        $this->conn = new mysqli($this->host, $this->user, $this->password, $this->db);

        if ($this->conn->connect_error) {
            die("error : " . $this->conn->connect_error);
        }
    }

    public function __destruct()
    {
        mysqli_close($this->conn);
    }

    public function insert($table, $data)
    {
        $fields = "";
        $values = "";
        $c = 0;
        foreach ($data as $f => $v) {
            // echo $f."->".$v."<br>";
            $fields = $fields . "," . $f;
            $values = $values . ",'{$v}'";

            $c = $c + 1;
        }
        $fields[0] = " ";
        $values[0] = " ";
        $q = "INSERT INTO {$table} ($fields) VALUES ($values);";
        // echo $q;
        if ($this->conn->query($q) === TRUE) {
            // echo "ok";
            // $this->close();
            return true;
        } else {
            echo "insert error :<br>";
            echo $this->conn->error;

            // $this->close();
            return false;
        }
    }

    public function getDataCount($table, $col, $data)
    {
        $q = "SELECT id FROM {$table} WHERE {$col} = '{$data}'";
        $r = $this->conn->query($q);
        return $r->num_rows;
    }

    public function getDataCountTable($table)
    {
        $q = "SELECT id FROM {$table}";
        $r = $this->conn->query($q);
        return $r->num_rows;
    }

    public function queryExecute($q)
    {
        return $this->conn->query($q);
    }

    public function findDataById($table,$id,$col){
        $r = $this->conn->query("SELECT {$col} FROM {$table} WHERE id = '{$id}';");

        $data = $r->fetch_assoc();
        return $data[$col];
    }

    public function findRowById($table,$id){
        $r = $this->conn->query("SELECT * FROM {$table} WHERE id = '{$id}';");
        $data = $r->fetch_assoc();
        return $data;
    }

    public function updateCellById($table,$id,$col,$value){
        $r = $this->conn->query("UPDATE {$table} SET {$col} = '{$value}' WHERE id = {$id}");
        return $r;
    }

    public function deleteRowById($table,$id){
        $r = $this->conn->query("DELETE  FROM {$table} WHERE id = {$id}");
        return $r;
    }
}

 
// test run 

// $db = new Db();
// // $db->insert("user", [
// //     "name" => "sanda",
// //     "email" => "sanda@s.com",
// // ]);

// echo $db->findDataById("user",53,"name");