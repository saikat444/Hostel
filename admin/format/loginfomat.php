<?php include 'helper/validation.php'; ?>
<?php include 'class/match.php'; ?>

<?php

class logIn
{

    private $db;
    private $fm;
    private $data;
    public function __construct()
    {
        $this->db = new dataBase();
        $this->fm = new Format();
        $this->data = new logMatch();
    }

    public function loginFormat($email, $pass)
    {
        $email = $this->fm->Validate($email);
        $pass = $this->fm->Validate($pass);
        $email = mysqli_real_escape_string($this->db->dblink, $email);
        $pass = mysqli_real_escape_string($this->db->dblink, $pass);

        $allData = $this->data->matchData($email, $pass);
        if ($allData == false) {
            echo "Email or password does not match";
        }
    }

    public function signupFormat($firstName, $lastName, $email, $mobile, $pass, $conpass)
    {
        $firstName = $this->fm->Validate($firstName);
        $lastName = $this->fm->Validate($lastName);
        $email = $this->fm->Validate($email);
        $pass = $this->fm->Validate($pass);
        $email = mysqli_real_escape_string($this->db->dblink, $email);
        $pass = mysqli_real_escape_string($this->db->dblink, $pass);
        $conpass = mysqli_real_escape_string($this->db->dblink, $conpass);
        $firstName = $this->fm->nameValidate($firstName);
        $lastName = $this->fm->nameValidate($lastName);

        if ($firstName == '' || $lastName == '' || $email == '' || $pass == '') {
            echo "Please input the feild";
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "Incorrect email format";
        } else {
            $query = "INSERT INTO admin_reg(firstname,lastname,email,mobile,password,conpass)VALUES('$firstName','$lastName','$email','$mobile','$pass','$conpass')";
            $data = $this->db->insert($query);
            if ($data) {
                echo "Registration Successfull";
                header("Location: login.php");
            } else {
                return false;
            }
        }
    }
}

?>