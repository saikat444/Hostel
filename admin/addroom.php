<?php include 'includes/header.php'; ?>

<div class="main_body">
    <div class="add_room">
        <h2>Add Room </h2>


        <?php


        $db = new dataBase();
        if (isset($_POST['submit'])) {
            $floor = trim($_POST['floor']);
            $room = trim($_POST['roomNo']);
            $seat = trim($_POST['seat']);
            $id = trim($_SESSION['id']);

            if ($floor == '' || $room == '' || $seat == '') {
                echo "Please input data to the feild";
            } else {
                $query = "INSERT INTO rooms(floorno,roomno,seats,u_id)VALUES('$floor','$room','$seat','$id')";
                $data = $db->insert($query);
                if ($data) {
                    echo "Data insert Successfull";
                } else {
                    echo "Failed..!Something went wrong";
                }
            }
        }


        ?>


        <form action="" method="POST" enctype="maltipart/form-data">
            <table style="width: 100%;">

                <tr>
                    <td>Floor No : </td>
                    <td>
                        <input type="text" name="floor" id="floor">
                    </td>
                </tr>
                <tr>
                    <td>Room No : </td>
                    <td>
                        <input type="text" name="roomNo" id="roomNo">
                    </td>
                </tr>

                <tr>
                    <td>Total Seats</td>
                    <td>
                        <input type="text" name="seat" id="seat">
                    </td>
                </tr>

                <tr>
                    <td></td>
                    <td>
                        <input type="submit" name="submit" value="Save">
                    </td>
                </tr>
            </table>
        </form>
    </div>


    <?php include 'includes/footer.php'; ?>
</div>