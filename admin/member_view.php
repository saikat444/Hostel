<?php include 'includes/header.php'; ?>

<div class="main_body">

    <?php

    $db = new dataBase();
    if (isset($_GET['mem_id'])) {
        $memId = $_GET['mem_id'];

        $query = "SELECT * FROM member WHERE id = $memId";
        $data = $db->select($query);
        foreach ($data ?: [] as $value) {
        }
    }


    ?>

    <div class="member_block">
        <img src="upload/<?php echo $value['image']; ?>" alt="no images">
        <h4><?php echo $value['name']; ?></h4>
        <p><?php echo $value['division']; ?></p>
        <p><?php echo $value['district']; ?></p>
    </div>





    <?php include 'includes/footer.php'; ?>
</div>