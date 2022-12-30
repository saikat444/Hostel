<?php include 'library/database.php'; ?>
<?php
include 'library/session.php';
Session::checkSession();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome Hostel Life</title>
    <link rel="shortcut icon" type="image/png" href="images/hotel.png" />
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/custom.css" />
</head>

<body>




    <header>
        <div class="top-container">
            <div class="mess_images">
                <img style="width: 150px" src="images/download.png" alt="no images">
            </div>
            <div class="mess_title">
                <h1>Bachelors Home </h1>
                <p>Realse Stress and feel your life</p>
            </div>
            <div class="icon_bar">
                <div class="admin_profile">
                    <img src="images/download.png" alt="no images">
                    <h2><?php echo Session::get('firstname'); ?></h2>
                </div>

                <a href="logout.php?action=logout">Log out</a>
            </div>

        </div>






        <div class="side_bar">
            <div class="side-menu">
                <a href=""><i style="color: black;" class="fa fa-bar-chart" aria-hidden="true"></i> Dashboard</a>
                <a href="index.php"><i style="color: black;" class="fa fa-home" aria-hidden="true"></i> Home</a>
                <a href="monthlycost.php?u_id=<?php echo Session::get('id'); ?>"><i style="color: black;" class="fa fa-handshake-o" aria-hidden="true"></i> Monthly Cost</a>
                <a href="meal.php?u_id=<?php echo Session::get('id'); ?>"><i style="color: black;" class="fa fa-cutlery" aria-hidden="true"></i> Add Meal</a>
                <a href="cost.php?u_id=<?php echo Session::get('id'); ?>"><i style="color: black;" class="fa fa-money" aria-hidden="true"></i> Add Cost</a>
                <a href="addmember.php?u_id=<?php echo Session::get('id'); ?>"><i style="color: black;" class="fa fa-male" aria-hidden="true"></i> Add Member</a>
                <a href="addroom.php?u_id=<?php echo Session::get('id'); ?>"><i style="color: black;" class="fa fa-bed" aria-hidden="true"></i> Add Room</a>
                <a href="stuff.php?u_id=<?php echo Session::get('id'); ?>"><i style="color: black;" class="fa fa-angle-double-right" aria-hidden="true"></i> Add Stuff</a>
                <a href=""><i style="color: black;" class="fa fa-plus-square" aria-hidden="true"></i> Add Chef</a>
                <a href=""><i style="color: black;" class="fa fa-shopping-cart" aria-hidden="true"></i> Add Accessories</a>
            </div>
        </div>
    </header>