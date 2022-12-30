<?php include 'format/loginfomat.php' ?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bachelor's Home</title>
    <link rel="shortcut icon" href="images/hotel.png" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/custom.css" />

    <style>
        body {
            background-image: url("images/jk0mZA.jpg");
            background-repeat: no-repeat;
            background-position: center;
            background-size: cover;
            height: 550px;
            background-color: #ccc;
        }
    </style>
</head>

<body>


    <div class="container">
        <div class="row">
            <div class="signUp-block">

                <?php

                $db = new dataBase();
                $signUp = new logIn();

                if (isset($_POST['submit'])) {
                    $firstName = $_POST['fname'];
                    $lastName = $_POST['lname'];
                    $email = $_POST['email'];
                    $mobile = $_POST['mobile'];
                    $pass = $_POST['pass'];
                    $conPass = $_POST['conpass'];

                    $signData = $signUp->signupFormat($firstName, $lastName, $email, $mobile, $pass, $conPass);
                }





                ?>


                <form action="" method="POST" enctype="multipart/form-data">
                    <table>
                        <tr>
                            <td>First Name : </td>
                            <td>
                                <input type="text" name="fname" id="fname">
                            </td>
                        </tr>

                        <tr>
                            <td>Last Name : </td>
                            <td>
                                <input type="text" name="lname" id="lname">
                            </td>
                        </tr>

                        <tr>
                            <td>Email : </td>
                            <td>
                                <input type="email" name="email" id="email">
                            </td>
                        </tr>

                        <tr>
                            <td>Mobile : </td>
                            <td>
                                <input type="text" name="mobile" id="mobile">
                            </td>
                        </tr>

                        <tr>
                            <td>Password : </td>
                            <td>
                                <input type="password" name="pass" id="pass">
                            </td>
                        </tr>

                        <tr>
                            <td>Confirm Password : </td>
                            <td>
                                <input type="password" name="conpass" id="conpass">
                            </td>
                        </tr>

                        <tr>
                            <td></td>
                            <td>
                                <input type="submit" name="submit" value="Sign Up">
                            </td>
                        </tr>
                    </table>
                </form>

                <a href="login.php">Already you have an account...!</a>
            </div>
        </div>
    </div>














    <script src="js/custom.js"></script>
</body>

</html>