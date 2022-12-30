<?php include 'library/database.php'; ?>
<?php
include 'library/session.php';
Session::checkLogin();
?>

<?php

class logMatch
{
    private $db;
    public function __construct()
    {
        $this->db = new dataBase();
    }

    public function matchData($email, $pass)
    {
        if (isset($email) && isset($pass)) {
            $query = $query = "SELECT * FROM admin_reg WHERE email = '$email' AND password = '$pass'";
            $result = $this->db->select($query);
            if ($result != false) {
                foreach ($result ?: [] as $value) {
                    $id = $value['id'];
                    $fnm = $value['firstname'];
                    $lnm = $value['lastname'];
                    $em =  $value['email'];
                    $ps = $value['password'];

                    if ($email == $em && $pass == $ps) {
                        Session::set("user_login", true);
                        Session::set("msg", "Inavlid code");
                        Session::set("id", $id);
                        Session::set("firstname", $fnm);
                        Session::set("lastname", $lnm);
                        header("Location: index.php");
                    } else {
                        return false;
                    }
                }
            }
        } else {
            return false;
        }
    }
}


?>