<?php include 'includes/header.php'; ?>

<div class="main_body">
    <div class="stuff_block">


        <?php

        $db = new dataBase();
        if (isset($_POST['submit'])) {
            $name = trim($_POST['name']);

            //For image code
            $image = $_FILES['image']['name'];
            $image_size = $_FILES['image']['size'];
            $temp = $_FILES['image']['tmp_name'];

            $designation = $_POST['designation'];
            $department = $_POST['department'];
            $division = $_POST['division'];
            $district = $_POST['district'];
            $upazila = $_POST['upazila'];
            $gender = $_POST['gender'];
            $mobile = $_POST['mobile'];
            $nid = $_POST['nid'];
            $id = $_POST['nid'];
        }


        ?>

        <form action="" method="POST" enctype="multipart/form-data">
            <table>
                <tr>
                    <td>Name : </td>
                    <td>
                        <input type="text" name="name" id="name">
                    </td>
                </tr>

                <tr>
                    <td>Image : </td>
                    <td>
                        <input type="file" name="image" id="image">
                    </td>
                </tr>

                <tr>
                    <td>Designation : </td>
                    <td>
                        <input type="text" name="designation" id="designation">
                    </td>
                </tr>

                <tr>
                    <td>Department : </td>
                    <td>
                        <input type="text" name="department" id="department">
                    </td>
                </tr>

                <tr>
                    <td>Division : </td>
                    <td>
                        <input type="text" name="division" id="division">
                    </td>
                </tr>

                <tr>
                    <td>District : </td>
                    <td>
                        <input type="text" name="district" id="district">
                    </td>
                </tr>

                <tr>
                    <td>Upazila : </td>
                    <td>
                        <input type="text" name="upazila" id="upazila">
                    </td>
                </tr>

                <tr>
                    <td>Gender : </td>
                    <td>
                        <input type="radio" name="gender" value="male">Male
                        <input type="radio" name="gender" value="female">Female
                        <input type="radio" name="gender" value="custom">Custom
                    </td>
                </tr>

                <tr>
                    <td>Mobile : </td>
                    <td>
                        <input type="text" name="mobile" id="mobile">
                    </td>
                </tr>

                <tr>
                    <td>NID no : </td>
                    <td>
                        <input type="text" name="nid" id="nid">
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