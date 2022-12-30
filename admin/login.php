<?php include 'format/loginfomat.php'; ?>




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
            background-image: url("images/hostel-yellow-sign-cloudy-background-211820624.jpg");
            background-repeat: no-repeat;
            background-position: center;
            background-size: cover;
            height: 550px;
            background-color: #ccc;
        }

        .log-pannel {
            background-image: url("images/pngtree-searching-hostel-banner-hotel-journey-image_1091602.jpg");
        }
    </style>
</head>

<body>



    <header>
        <div class="container">
            <div class="row">
                <div class="log-pannel">
                    <div class="log-in-block">


                        <?php

                        $log = new logIn();



                        if (isset($_POST['submit'])) {
                            $email = $_POST['email'];
                            $pass = $_POST['pass'];
                            if ($email == '' && $pass == '') {
                                echo "<h6 style='color:red'>Please input the field</h6>";
                            } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                                echo "Incorrect email format";
                            } else {
                                $logdata = $log->loginFormat($email, $pass);
                            }
                        }




                        ?>

                        <form action="" method="POST" enctype="multipart/form-data">
                            <table>
                                <tr>
                                    <td>Email : </td>
                                    <td>
                                        <input type="text" name="email" id="Email">
                                    </td>
                                </tr>

                                <tr>
                                    <td>Password : </td>
                                    <td>
                                        <input type="password" name="pass" id="pass">
                                    </td>
                                </tr>

                                <tr>
                                    <td></td>
                                    <td>
                                        <input type="submit" name="submit" value="Log in">
                                    </td>
                                </tr>
                            </table>
                        </form>
                        <a href="signup.php">Do you have any account...?</a>
                    </div>
                </div>
            </div>
        </div>
    </header>











    <script src="js/custom.js"></script>
</body>

</html>