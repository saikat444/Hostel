<?php

class Format
{

    private $db;

    public function __construct()
    {
        $this->db = new dataBase();
    }

    public function Validate($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        //$data = md5($data);
        return $data;
    }

    public function nameValidate($name)
    {
        if (preg_match("/^[a-zA-Z-' ]*$/", $name)) {
            return $name;
        } else {
            echo "Name only characters" . "<br>";
        }
    }
}
