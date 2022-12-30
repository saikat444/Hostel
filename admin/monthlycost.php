<?php include 'includes/header.php'; ?>

<div class="main_body">

    <div class="monthly_cost">
        <h4>Current Month = <?php echo date('M'); ?></h4>

        <form action="" method="POST">
            <table>
                <tr>
                    <td>Select Month : </td>
                    <td>
                        <select name="month" id="month">
                            <option value=""></option>
                            <option value="jan">January</option>
                            <option value="feb">February</option>
                            <option value="mar">March</option>
                            <option value="april">April</option>
                            <option value="may">May</option>
                            <option value="jun">June</option>
                            <option value="jul">July</option>
                            <option value="aug">August</option>
                            <option value="sep">September</option>
                            <option value="oct">October</option>
                            <option value="nov">November</option>
                            <option value="dec">December</option>
                        </select>
                    </td>
                </tr>

                <tr>
                    <td>Select Year : </td>
                    <td>
                        <select name="year" id="year">
                            <option value=""></option>
                            <option value="2022">2022</option>
                            <option value="2023">2023</option>
                            <option value="2024">2024</option>
                            <option value="2025">2025</option>
                        </select>
                    </td>
                </tr>

                <tr>
                    <td></td>
                    <td>
                        <input type="submit" name="submit" value="See">
                    </td>
                </tr>
            </table>
        </form>

        <?php

        $db = new dataBase();
        if (isset($_POST['submit'])) {
            $month = $_POST['month'];
            $year = $_POST['year'];
            $query = "SELECT SUM(breakfast) AS count1 FROM meal WHERE month = '$month' AND year = '$year'";
            $data = $db->select($query);
            foreach ($data ?: [] as $value) {
                $breakfast = $value['count1'];
            }

            $query = "SELECT SUM(lunch) AS count2 FROM meal WHERE month = '$month' AND year = '$year'";
            $data = $db->select($query);
            foreach ($data ?: [] as $value) {
                $lunch = $value['count2'];
            }

            $query = "SELECT SUM(dinner) AS count3 FROM meal WHERE month = '$month' AND year = '$year'";
            $data = $db->select($query);
            foreach ($data ?: [] as $value) {
                $dinner = $value['count3'];
            }

            $query = "SELECT SUM(amount) AS count4 FROM total_cost WHERE month = '$month' AND year = '$year'";
            $data = $db->select($query);
            foreach ($data ?: [] as $value) {
                $amount = $value['count4'];
            }


            $total = $breakfast + $lunch + $dinner;
            $final = $amount / $total;
            echo "Meal Rate = " . round($final);
        }


        ?>


        <div class="all_calculation">
            <table style="width: 100%;">
                <tr>
                    <th>SL</th>
                    <th>Name</th>
                    <th>Breakfast</th>
                    <th>Lunch</th>
                    <th>Dinner</th>
                    <th>Total</th>
                    <th>Amount</th>
                    <th>Due</th>
                </tr>

                <?php


                $db = new dataBase();
                $query = "SELECT name FROM meal";
                $data = $db->select($query);
                $sl = 0;
                foreach ($data as $value) {
                    $sl++;
                    $query1 = "SELECT name, SUM(breakfast) AS t_breakfast,SUM(lunch) AS t_lunch,SUM(dinner) AS t_dinner FROM `meal` GROUP BY name;";
                    $res1 = $db->select($query1);
                    foreach ($res1 as $val1) {
                        echo $val1['name'];
                    }
                }



                /**
                    $res = $data->fetch_all(MYSQLI_ASSOC);
                    foreach ($res as $x => $val) {
                    echo $x . "<br>";
                    $arr = $val['name'];
                }
                 */
                ?>

            </table>
        </div>


    </div>



    <tr>
        <td><?php echo $sl; ?></td>
        <td><?php echo $value['name']; ?></td>
        <td><?php echo $break; ?></td>
        <td><?php echo $val1['t_lunch']; ?></td>
    </tr>



























    <?php include 'includes/footer.php'; ?>
</div>