<?php include 'includes/header.php'; ?>

<div class="main_body">

    <div class="cost_block">

        <?php

        $db = new dataBase();
        if (isset($_POST['submit'])) {
            $month = $_POST['month'];
            $date = $_POST['date'];
            $year = $_POST['year'];
            $taka = $_POST['taka'];
            $id = $_SESSION['id'];

            $query = "INSERT INTO total_cost(month,date,year,amount,u_id)VALUES('$month','$date','$year','$taka','$id')";
            $data = $db->insert($query);
            if ($data) {
                echo "Data save successfully";
            } else {
                echo "Something went wrong";
            }
        }

        ?>



        <form action="" method="POST" enctype="multipart/form-data">
            <table>
                <tr>
                    <td>Month : </td>
                    <td>
                        <input type="text" name="month" id="month" value="<?php echo date('M'); ?>">
                    </td>
                </tr>

                <tr>
                    <td>Date : </td>
                    <td>
                        <input type="date" name="date" id="date">
                    </td>
                </tr>

                <tr>
                    <td>Year : </td>
                    <td>
                        <input type="text" name="year" id="year" value="<?php echo date('Y'); ?>">
                    </td>
                </tr>


                <tr>
                    <td>Taka : </td>
                    <td>
                        <input type="number" name="taka" id="taka" placeholder="Only integer value">
                    </td>
                </tr>

                <tr>
                    <td></td>
                    <td>
                        <input type="submit" name="submit" id="submit" value="Save">
                    </td>
                </tr>
            </table>
        </form>
    </div>






    <?php include 'includes/footer.php'; ?>
</div>