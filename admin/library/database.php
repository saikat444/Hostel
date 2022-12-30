
<?php

class dataBase
{
    public $host = "localhost";
    public $user = "root";
    public $pass = "";
    public $dbname = "mess";

    public $dblink;
    public $error;

    public function __construct()
    {
        $this->connectDB();
    }

    private function connectDB()
    {
        $this->dblink = new mysqli($this->host, $this->user, $this->pass, $this->dbname);
        if (!$this->dblink) {
            $this->error = "Connection failed" . $this->dblink->connect_errno;
            return false;
        }
    }

    //Seclet or Read Data
    public function select($query_data)
    {
        $result = $this->dblink->query($query_data) or die($this->dblink->error . __LINE__);
        if ($result->num_rows > 0) {
            return $result;
        } else {
            return false;
        }
    }

    //Insert Data function
    public function insert($insert_query_data)
    {
        $inserData = $this->dblink->query($insert_query_data) or die($this->dblink->error . __LINE__);
        if ($inserData === TRUE) {
            return true;
        } else {
            return false;
        }
    }
}

?>