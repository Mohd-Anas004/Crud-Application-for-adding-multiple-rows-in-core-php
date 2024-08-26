<?php include 'header.php';
include 'conn.php'; ?>
<div class="add">
    <a href="create.php" class="btn btn-success btn:hover"> Add</a>
</div>
<table class="table table-stripped table:hover">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">NAME</th>
            <th scope="col">EMAIL</th>
            <th scope="col">PHONE</th>
            <th scope="col">ADDRESS</th>
            <th scope="col">ROLL NO.</th>


        </tr>
    </thead>
    <tbody>
        <?php $sql = "SELECT * FROM student_details ORDER BY id  DESC";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)) { ?>

            <tr>
                <td><?= $row['id'] ?></td>
                <td><?= $row['name'] ?></td>
                <td><?= $row['email'] ?></td>
                <td><?= $row['phone'] ?></td>
                <td><?= $row['address'] ?></td>
                <td><?= $row['rollno'] ?></td>

                <td>
                    <button><a href="edit.php?id=<?= $row['id']; ?>" class="btn btn-primary btn:hover">EDIT</a></button>
                    <button><a href="delete.php?id=<?= $row['id']; ?>" class="btn btn-danger btn:hover">DELETE</a></button>
                </td>
            </tr>
        <?php } ?>




    </tbody>
</table>