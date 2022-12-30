<?php include 'includes/header.php'; ?>

<div class="main_body">
    <div class="meal_block">

        <h3>Add Meal </h3>


        <form action="" method="POST">




            <table style="border: 1px solid;">

                <tr>
                    <td>Month : </td>
                    <td>
                        <input type="text" name="month" value="<?php echo date('M'); ?>">
                    </td>
                </tr>

                <tr>
                    <td>Year : </td>
                    <td>
                        <input type="text" name="year" id="year" value="<?php echo date('Y'); ?>">
                    </td>
                </tr>

                <tr>
                    <td>Date : </td>
                    <td>
                        <input type="date" name="date" id="date">
                    </td>
                </tr>
                <tr>
                    <th>SL</th>
                    <th>Name</th>
                    <th>Breakfast</th>
                    <th>Lunch</th>
                    <th>Dinner</th>
                </tr>

                <?php

                $db = new dataBase();
                $sl = 0;
                $query = "SELECT * FROM member";
                $result = $db->select($query);
                foreach ($result as $value) {
                    $sl++;
                ?>
                    <tr>
                        <td><?php echo $sl; ?></td>
                        <td>
                            <input type="text" name="name[]" value="<?php echo $value['name']; ?>" id="name">
                        </td>
                        <td>
                            <input type="text" name="breakfast[]" id="breakfast">
                        </td>
                        <td>
                            <input type="text" name="lunch[]" id="lunch">
                        </td>
                        <td>
                            <input type="text" name="dinner[]" id="dinner">
                        </td>
                    </tr>
                <?php }

                ?>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>
                        <input type="submit" name="submit" value="Submit">
                    </td>
                </tr>

            </table>
        </form>


        <?php


        if (isset($_POST['submit'])) {
            $i = 0;
            $limit = 3;
            $month = $_POST['month'];
            $year = $_POST['year'];
            $date = $_POST['date'];
            foreach ($_POST['name'] as $member) {
                $breakfast = $_POST['breakfast'][$i] != "" ? $_POST['breakfast'][$i] : 0;
                $lunch = $_POST['lunch'][$i] != "" ? $_POST['lunch'][$i] : 0;
                $dinner = $_POST['dinner'][$i] != "" ? $_POST['dinner'][$i] : 0;
                $id = $_SESSION['id'];
                if ($breakfast > $limit || $lunch > $limit || $dinner > $limit) {
                    echo "Maximum 3 meals acceptable";
                } else {
                    $query = "INSERT INTO meal(month,year,date,name,breakfast,lunch,dinner,u_id)VALUES('$month','$year','$date','$member','$breakfast','$lunch','$dinner','$id')";
                    $data = $db->insert($query);
                }
                $i++;
            }

            if ($data) {
                echo "Save successfully";
            } else {
                echo "Something went wrong";
            }
        }


        ?>




    </div>

    <?php include 'includes/footer.php'; ?>
</div>