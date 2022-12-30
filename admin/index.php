<?php include 'includes/header.php'; ?>

<div class="main_body">
    <div class="member_list">
        <table style="width: 100%;">
            <tr>
                <th>SL</th>
                <th>Name</th>
                <th>Occupation</th>
                <th>Instution</th>
                <th>Floor No</th>
                <th>Room No</th>
                <th>Mobile</th>
                <th>Action</th>
            </tr>

            <?php

            $db = new dataBase();
            $sl = 0;
            $query = "SELECT * FROM member";
            $data = $db->select($query);
            foreach ($data ?: [] as $value) {
                $sl++; ?>
                <tr>
                    <td><?php echo $sl; ?></td>
                    <td><?php echo $value['name']; ?></td>
                    <td><?php echo $value['occupation']; ?></td>
                    <td><?php echo $value['institution']; ?></td>
                    <td><?php echo $value['floor']; ?></td>
                    <td><?php echo $value['room']; ?></td>
                    <td><?php echo $value['mobile']; ?></td>
                    <td><a href="member_view.php?mem_id=<?php echo $value['id']; ?>">View</a></td>
                </tr>
            <?php }

            ?>
        </table>
    </div>
    <?php include 'includes/footer.php'; ?>
</div>







<script src="js/custom.js"></script>
</body>

</html>