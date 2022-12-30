<?php include 'includes/header.php'; ?>

<div class="main_body">

    <div class="flex_body">
        <div class="member_add_form">
            <h2 class="member_title">Add Member Form</h2>

            <?php

            $db = new dataBase();

            if (isset($_POST['submit'])) {
                $name = trim($_POST['name']);

                //Image inserted code
                $permitted = array("jpg", "jpeg", "png", "gif", "JPEG", "TIFF", "PSD", "PDF");
                $image = $_FILES['image']['name'];
                $image_size = $_FILES['image']['size'];
                $tmp = $_FILES['image']['tmp_name'];


                $div = explode(".", $image);
                $file_title = strtolower(end($div));
                $unique_pic = substr(md5(time()), 0, 10) . '.' . $file_title;
                $upload_pic = "upload/" . $unique_pic;



                $floor = $_POST['floor'];
                $room = $_POST['room'];
                $seat = isset($_POST['seat']) != "" ? $_POST['seat'] : 0;
                $occupation = $_POST['occupation'];
                $institution = $_POST['institution'];
                $division = $_POST['division'];
                $district = trim($_POST['district']);
                $upazila = trim($_POST['upazila']);
                $mobile = $_POST['mobile'];
                $nid = $_POST['nid'];
                $id = $_SESSION['id'];

                if ($name == '' || $image == '' || $floor == '' || $room == '' || $occupation == '' || $institution == '' || $division == '' || $district == '' || $upazila == '' || $mobile == '' || $nid == '') {
                    echo "Please input data to the data feild";
                } else {
                    if ($image_size >= 5000000) {
                        echo "Image too large...maximum 5 megabyte";
                    } else {
                        move_uploaded_file($tmp, $upload_pic);
                        $query = "INSERT INTO member(name,image,floor,room,seat,occupation,institution,division,district,upazila,mobile,nid,u_id)VALUES('$name','$unique_pic','$floor','$room','$seat','$occupation','$institution','$division','$district','$upazila','$mobile','$nid','$id')";

                        $data = $db->insert($query);
                        if ($data) {
                            echo "Data insert successfully";
                        } else {
                            echo "Something Went Wrong";
                        }
                    }
                }
            }


            ?>


            <form action="" method="POST" enctype="multipart/form-data">
                <table style="width: 100%;">
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
                        <td>Floor No : </td>
                        <td>
                            <input type="text" name="floor" id="floor">
                        </td>
                    </tr>

                    <tr>
                        <td>Room No : </td>
                        <td>
                            <input type="text" name="room" id="room">
                        </td>
                    </tr>

                    <tr>
                        <td>Seat No : </td>
                        <td>
                            <input type="number" name="seat" id="seat">
                        </td>
                    </tr>

                    <tr>
                        <td>Occupation : </td>
                        <td>
                            <select name="occupation" id="occupation">
                                <option value=""></option>
                                <option value="student"> Student</option>
                                <option value="job">Job Holder</option>
                                <option value="bussiness">Bussiness</option>
                                <option value="others">Others</option>
                            </select>
                        </td>
                    </tr>

                    <tr>
                        <td>Instution Name : </td>
                        <td>
                            <input type="text" name="institution" id="institution">
                        </td>
                    </tr>

                    <tr>
                        <td>Division : </td>
                        <td>
                            <select name="division" id="divison">
                                <option value=""></option>
                                <option value="dhaka">Dhaka</option>
                                <option value="mymensing">Mymensing</option>
                                <option value="chattogram">Chattogram</option>
                                <option value="rajshahi">Rajshahi</option>
                                <option value="sylhet">Sylhet</option>
                                <option value="rangpur">Rangpur</option>
                                <option value="khulna">Khulna</option>
                                <option value="barsihal">Barishal</option>
                            </select>
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

        <div class="available_rooms">
            <div class="room_show">
                <h2>Available Rooms & Seats</h2>
            </div>

            <div class="floor">
                <h4>Floor - 1</h4>
                <table style="width: 100%;">
                    <tr>
                        <th>Room</th>
                        <th>Seats</th>
                    </tr>

                    <?php

                    $fl = 1;
                    $rm = 100;
                    $query = "SELECT * FROM rooms WHERE roomno = '$rm' AND floorno = '$fl'";
                    $res = $db->select($query);
                    foreach ($res ?: [] as $val) {
                        $query1 = "SELECT SUM(seat) AS count FROM member WHERE room = '$rm' ";
                        $data = $db->select($query1);
                        foreach ($data ?: [] as $value) {
                            $sum = $value['count'];
                        }
                    ?>
                        <tr>
                            <td><?php echo $val['roomno']; ?></td>
                            <td><?php echo $val['seats'] - $sum; ?></td>
                        </tr>
                    <?php  }

                    ?>

                    <?php

                    $fl = 1;
                    $rm = 101;
                    $query = "SELECT * FROM rooms WHERE roomno = '$rm' AND floorno = '$fl'";
                    $res = $db->select($query);
                    foreach ($res ?: [] as $val) {
                        $query1 = "SELECT SUM(seat) AS count FROM member WHERE room = '$rm' ";
                        $data = $db->select($query1);
                        foreach ($data ?: [] as $value) {
                            $sum = $value['count'];
                        }
                    ?>
                        <tr>
                            <td><?php echo $val['roomno']; ?></td>
                            <td><?php echo $val['seats'] - $sum; ?></td>
                        </tr>
                    <?php  }

                    ?>

                    <?php

                    $fl = 1;
                    $rm = 102;
                    $query = "SELECT * FROM rooms WHERE roomno = '$rm' AND floorno = '$fl'";
                    $res = $db->select($query);
                    foreach ($res ?: [] as $val) {
                        $query1 = "SELECT SUM(seat) AS count FROM member WHERE room = '$rm' ";
                        $data = $db->select($query1);
                        foreach ($data ?: [] as $value) {
                            $sum = $value['count'];
                        }
                    ?>
                        <tr>
                            <td><?php echo $val['roomno']; ?></td>
                            <td><?php echo $val['seats'] - $sum; ?></td>
                        </tr>
                    <?php  }

                    ?>
                </table>


            </div>

            <hr>

            <div class="floor">
                <h4>Floor - 2</h4>
                <table style="width: 100%;">
                    <tr>
                        <th>Room</th>
                        <th>Seats</th>
                    </tr>

                    <?php

                    $fl = 2;
                    $rm = 201;
                    $query = "SELECT * FROM rooms WHERE roomno = '$rm' AND floorno = '$fl'";
                    $res = $db->select($query);
                    foreach ($res ?: [] as $val) {
                        $query1 = "SELECT SUM(seat) AS count FROM member WHERE room = '$rm' ";
                        $data = $db->select($query1);
                        foreach ($data ?: [] as $value) {
                            $sum = $value['count'];
                        }
                    ?>
                        <tr>
                            <td><?php echo $val['roomno']; ?></td>
                            <td><?php echo $val['seats'] - $sum; ?></td>
                        </tr>
                    <?php  }

                    ?>

                    <?php

                    $fl = 2;
                    $rm = 202;
                    $query = "SELECT * FROM rooms WHERE roomno = '$rm' AND floorno = '$fl'";
                    $res = $db->select($query);
                    foreach ($res ?: [] as $val) {
                        $query1 = "SELECT SUM(seat) AS count FROM member WHERE room = '$rm' ";
                        $data = $db->select($query1);
                        foreach ($data ?: [] as $value) {
                            $sum = $value['count'];
                        }
                    ?>
                        <tr>
                            <td><?php echo $val['roomno']; ?></td>
                            <td><?php echo $val['seats'] - $sum; ?></td>
                        </tr>
                    <?php  }

                    ?>

                    <?php

                    $fl = 2;
                    $rm = 203;
                    $query = "SELECT * FROM rooms WHERE roomno = '$rm' AND floorno = '$fl'";
                    $res = $db->select($query);
                    foreach ($res ?: [] as $val) {
                        $query1 = "SELECT SUM(seat) AS count FROM member WHERE room = '$rm' ";
                        $data = $db->select($query1);
                        foreach ($data ?: [] as $value) {
                            $sum = $value['count'];
                        }
                    ?>
                        <tr>
                            <td><?php echo $val['roomno']; ?></td>
                            <td><?php echo $val['seats'] - $sum; ?></td>
                        </tr>
                    <?php  }

                    ?>
                </table>


            </div>

            <hr>

            <div class="floor">
                <h4>Floor - 2</h4>
                <table style="width: 100%;">
                    <tr>
                        <th>Room</th>
                        <th>Seats</th>
                    </tr>

                    <?php

                    $fl = 3;
                    $rm = 301;
                    $query = "SELECT * FROM rooms WHERE roomno = '$rm' AND floorno = '$fl'";
                    $res = $db->select($query);
                    foreach ($res ?: [] as $val) {
                        $query1 = "SELECT SUM(seat) AS count FROM member WHERE room = '$rm' ";
                        $data = $db->select($query1);
                        foreach ($data ?: [] as $value) {
                            $sum = $value['count'];
                        }
                    ?>
                        <tr>
                            <td><?php echo $val['roomno']; ?></td>
                            <td><?php echo $val['seats'] - $sum; ?></td>
                        </tr>
                    <?php  }

                    ?>

                    <?php

                    $fl = 3;
                    $rm = 302;
                    $query = "SELECT * FROM rooms WHERE roomno = '$rm' AND floorno = '$fl'";
                    $res = $db->select($query);
                    foreach ($res ?: [] as $val) {
                        $query1 = "SELECT SUM(seat) AS count FROM member WHERE room = '$rm' ";
                        $data = $db->select($query1);
                        foreach ($data ?: [] as $value) {
                            $sum = $value['count'];
                        }
                    ?>
                        <tr>
                            <td><?php echo $val['roomno']; ?></td>
                            <td><?php echo $val['seats'] - $sum; ?></td>
                        </tr>
                    <?php  }

                    ?>

                    <?php

                    $fl = 3;
                    $rm = 303;
                    $query = "SELECT * FROM rooms WHERE roomno = '$rm' AND floorno = '$fl'";
                    $res = $db->select($query);
                    foreach ($res ?: [] as $val) {
                        $query1 = "SELECT SUM(seat) AS count FROM member WHERE room = '$rm' ";
                        $data = $db->select($query1);
                        foreach ($data ?: [] as $value) {
                            $sum = $value['count'];
                        }
                    ?>
                        <tr>
                            <td><?php echo $val['roomno']; ?></td>
                            <td><?php echo $val['seats'] - $sum; ?></td>
                        </tr>
                    <?php  }

                    ?>
                </table>


            </div>

            <hr>


            <div class="floor">
                <h4>Floor - 2</h4>
                <table style="width: 100%;">
                    <tr>
                        <th>Room</th>
                        <th>Seats</th>
                    </tr>

                    <?php

                    $fl = 4;
                    $rm = 401;
                    $query = "SELECT * FROM rooms WHERE roomno = '$rm' AND floorno = '$fl'";
                    $res = $db->select($query);
                    foreach ($res ?: [] as $val) {
                        $query1 = "SELECT SUM(seat) AS count FROM member WHERE room = '$rm' ";
                        $data = $db->select($query1);
                        foreach ($data ?: [] as $value) {
                            $sum = $value['count'];
                        }
                    ?>
                        <tr>
                            <td><?php echo $val['roomno']; ?></td>
                            <td><?php echo $val['seats'] - $sum; ?></td>
                        </tr>
                    <?php  }

                    ?>

                    <?php

                    $fl = 4;
                    $rm = 402;
                    $query = "SELECT * FROM rooms WHERE roomno = '$rm' AND floorno = '$fl'";
                    $res = $db->select($query);
                    foreach ($res ?: [] as $val) {
                        $query1 = "SELECT SUM(seat) AS count FROM member WHERE room = '$rm' ";
                        $data = $db->select($query1);
                        foreach ($data ?: [] as $value) {
                            $sum = $value['count'];
                        }
                    ?>
                        <tr>
                            <td><?php echo $val['roomno']; ?></td>
                            <td><?php echo $val['seats'] - $sum; ?></td>
                        </tr>
                    <?php  }

                    ?>

                    <?php

                    $fl = 4;
                    $rm = 403;
                    $query = "SELECT * FROM rooms WHERE roomno = '$rm' AND floorno = '$fl'";
                    $res = $db->select($query);
                    foreach ($res ?: [] as $val) {
                        $query1 = "SELECT SUM(seat) AS count FROM member WHERE room = '$rm' ";
                        $data = $db->select($query1);
                        foreach ($data ?: [] as $value) {
                            $sum = $value['count'];
                        }
                    ?>
                        <tr>
                            <td><?php echo $val['roomno']; ?></td>
                            <td><?php echo $val['seats'] - $sum; ?></td>
                        </tr>
                    <?php  }

                    ?>
                </table>


            </div>

            <hr>


            <div class="floor">
                <h4>Floor - 2</h4>
                <table style="width: 100%;">
                    <tr>
                        <th>Room</th>
                        <th>Seats</th>
                    </tr>

                    <?php

                    $fl = 5;
                    $rm = 501;
                    $query = "SELECT * FROM rooms WHERE roomno = '$rm' AND floorno = '$fl'";
                    $res = $db->select($query);
                    foreach ($res ?: [] as $val) {
                        $query1 = "SELECT SUM(seat) AS count FROM member WHERE room = '$rm' ";
                        $data = $db->select($query1);
                        foreach ($data ?: [] as $value) {
                            $sum = $value['count'];
                        }
                    ?>
                        <tr>
                            <td><?php echo $val['roomno']; ?></td>
                            <td><?php echo $val['seats'] - $sum; ?></td>
                        </tr>
                    <?php  }

                    ?>

                    <?php

                    $fl = 5;
                    $rm = 502;
                    $query = "SELECT * FROM rooms WHERE roomno = '$rm' AND floorno = '$fl'";
                    $res = $db->select($query);
                    foreach ($res ?: [] as $val) {
                        $query1 = "SELECT SUM(seat) AS count FROM member WHERE room = '$rm' ";
                        $data = $db->select($query1);
                        foreach ($data ?: [] as $value) {
                            $sum = $value['count'];
                        }
                    ?>
                        <tr>
                            <td><?php echo $val['roomno']; ?></td>
                            <td><?php echo $val['seats'] - $sum; ?></td>
                        </tr>
                    <?php  }

                    ?>

                    <?php

                    $fl = 5;
                    $rm = 503;
                    $query = "SELECT * FROM rooms WHERE roomno = '$rm' AND floorno = '$fl'";
                    $res = $db->select($query);
                    foreach ($res ?: [] as $val) {
                        $query1 = "SELECT SUM(seat) AS count FROM member WHERE room = '$rm' ";
                        $data = $db->select($query1);
                        foreach ($data ?: [] as $value) {
                            $sum = $value['count'];
                        }
                    ?>
                        <tr>
                            <td><?php echo $val['roomno']; ?></td>
                            <td><?php echo $val['seats'] - $sum; ?></td>
                        </tr>
                    <?php  }

                    ?>
                </table>


            </div>

            <hr>

            <div class="floor">
                <h4>Floor - 2</h4>
                <table style="width: 100%;">
                    <tr>
                        <th>Room</th>
                        <th>Seats</th>
                    </tr>

                    <?php

                    $fl = 6;
                    $rm = 601;
                    $query = "SELECT * FROM rooms WHERE roomno = '$rm' AND floorno = '$fl'";
                    $res = $db->select($query);
                    foreach ($res ?: [] as $val) {
                        $query1 = "SELECT SUM(seat) AS count FROM member WHERE room = '$rm' ";
                        $data = $db->select($query1);
                        foreach ($data ?: [] as $value) {
                            $sum = $value['count'];
                        }
                    ?>
                        <tr>
                            <td><?php echo $val['roomno']; ?></td>
                            <td><?php echo $val['seats'] - $sum; ?></td>
                        </tr>
                    <?php  }

                    ?>

                    <?php

                    $fl = 6;
                    $rm = 602;
                    $query = "SELECT * FROM rooms WHERE roomno = '$rm' AND floorno = '$fl'";
                    $res = $db->select($query);
                    foreach ($res ?: [] as $val) {
                        $query1 = "SELECT SUM(seat) AS count FROM member WHERE room = '$rm' ";
                        $data = $db->select($query1);
                        foreach ($data ?: [] as $value) {
                            $sum = $value['count'];
                        }
                    ?>
                        <tr>
                            <td><?php echo $val['roomno']; ?></td>
                            <td><?php echo $val['seats'] - $sum; ?></td>
                        </tr>
                    <?php  }

                    ?>

                    <?php

                    $fl = 6;
                    $rm = 603;
                    $query = "SELECT * FROM rooms WHERE roomno = '$rm' AND floorno = '$fl'";
                    $res = $db->select($query);
                    foreach ($res ?: [] as $val) {
                        $query1 = "SELECT SUM(seat) AS count FROM member WHERE room = '$rm' ";
                        $data = $db->select($query1);
                        foreach ($data ?: [] as $value) {
                            $sum = $value['count'];
                        }
                    ?>
                        <tr>
                            <td><?php echo $val['roomno']; ?></td>
                            <td><?php echo $val['seats'] - $sum; ?></td>
                        </tr>
                    <?php  }

                    ?>
                </table>


            </div>

            <hr>


            <div class="floor">
                <h4>Floor - 2</h4>
                <table style="width: 100%;">
                    <tr>
                        <th>Room</th>
                        <th>Seats</th>
                    </tr>

                    <?php

                    $fl = 7;
                    $rm = 701;
                    $query = "SELECT * FROM rooms WHERE roomno = '$rm' AND floorno = '$fl'";
                    $res = $db->select($query);
                    foreach ($res ?: [] as $val) {
                        $query1 = "SELECT SUM(seat) AS count FROM member WHERE room = '$rm' ";
                        $data = $db->select($query1);
                        foreach ($data ?: [] as $value) {
                            $sum = $value['count'];
                        }
                    ?>
                        <tr>
                            <td><?php echo $val['roomno']; ?></td>
                            <td><?php echo $val['seats'] - $sum; ?></td>
                        </tr>
                    <?php  }

                    ?>

                    <?php

                    $fl = 7;
                    $rm = 702;
                    $query = "SELECT * FROM rooms WHERE roomno = '$rm' AND floorno = '$fl'";
                    $res = $db->select($query);
                    foreach ($res ?: [] as $val) {
                        $query1 = "SELECT SUM(seat) AS count FROM member WHERE room = '$rm' ";
                        $data = $db->select($query1);
                        foreach ($data ?: [] as $value) {
                            $sum = $value['count'];
                        }
                    ?>
                        <tr>
                            <td><?php echo $val['roomno']; ?></td>
                            <td><?php echo $val['seats'] - $sum; ?></td>
                        </tr>
                    <?php  }

                    ?>

                    <?php

                    $fl = 7;
                    $rm = 703;
                    $query = "SELECT * FROM rooms WHERE roomno = '$rm' AND floorno = '$fl'";
                    $res = $db->select($query);
                    foreach ($res ?: [] as $val) {
                        $query1 = "SELECT SUM(seat) AS count FROM member WHERE room = '$rm' ";
                        $data = $db->select($query1);
                        foreach ($data ?: [] as $value) {
                            $sum = $value['count'];
                        }
                    ?>
                        <tr>
                            <td><?php echo $val['roomno']; ?></td>
                            <td><?php echo $val['seats'] - $sum; ?></td>
                        </tr>
                    <?php  }

                    ?>
                </table>


            </div>

        </div>


    </div>

    <?php include 'includes/footer.php'; ?>
</div>