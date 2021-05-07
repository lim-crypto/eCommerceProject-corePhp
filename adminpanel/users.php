<?php
include 'includes/head.php';
include '../connect.php';

$query = "SELECT id, CONCAT(lastname ,', ',firstname,' ', middlename  ) AS Name, CONCAT(street , ', ',brgy , ' ', City , ', ' ,province) AS Address, contactnumber, email 
FROM users WHERE role ='user'";
$run_query = mysqli_query($conn, $query) or die(mysqli_error($conn));
$users = mysqli_fetch_all($run_query, MYSQLI_ASSOC);


if (isset($_GET['user_id'])) {
    $id = $_GET['user_id']; 
    $delete = "DELETE  FROM users WHERE id = $id";
    $result = mysqli_query($conn, $delete);
}
?>
<section class="section">


    <div class="box">
        <div class="box-header">
            <!-- <div class="addbutton"> <i class="fas fa-plus-circle"></i></div> -->
            <h3 class="tablename">Users</h3>

        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <table class="table ">

                <tbody>
                    <tr> 
                        <th>Name</th>
                        <th>Contact Number</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>Action</th>
                    </tr>
                    <?php foreach ($users as $user) : ?>
                        <tr>
                            <td> <?php echo $user['Name'] ?> </td>
                            <td> <?php echo $user['contactnumber'] ?> </td>
                            <td> <?php echo $user['email'] ?> </td>
                            <td> <?php echo $user['Address'] ?> </td>
                            <td> <a id="remove-btn" href="users.php?user_id=<?php echo $user['id'] ?>">DELETE</a></td>

                        </tr>
                    <?php endforeach ?>


                </tbody>
            </table>
        </div>
    </div>


</section>

<?php include 'includes/foot.php'; ?>