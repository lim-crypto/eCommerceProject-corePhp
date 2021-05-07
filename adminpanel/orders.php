<?php 
include 'includes/head.php';
require '../connect.php';
$query = "SELECT  img, name, orders.id, quantity,price, status ,  orders.date, CONCAT(lastname ,', ',firstname,' ', middlename  ) AS Cname
                    FROM orders
                    inner join  products on  products.id=orders.product_id 
                    INNER join users on user_id=users.id 
                    ORDER by orders.date DESC";
$run_query = mysqli_query($conn, $query) or die(mysqli_error($conn));
$orders = mysqli_fetch_all($run_query, MYSQLI_ASSOC); 
?>

<section class="section">


    <div class="box">
        <div class="box-header">
            <!-- <div class="addbutton"> <i class="fas fa-plus-circle"></i></div> -->
            <h3 class="tablename">Orders</h3> 
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <table class="table ">

                <tbody>
                    <tr> 
                        <th>Customer's Name</th>  
                        <th>Plant's Name</th> 
                        <th>quantity</th>
                        <!-- <th>Price</th> -->
                        <!-- <th>Total Price</th> -->
                        <th>status</th>
                        <th>action</th>
                    </tr>
                   <?php  foreach($orders as $order) : ?>

                    <tr> 
                    <td><?php echo $order['Cname'] ?> </td>  
                        <td><?php echo $order['name'] ?> </td>
                        <td><?php echo $order['quantity'] ?></td>
                        <!-- <td></?php echo $order['price'] ?></td> -->
                        <!-- <td></?php echo $order['quantity']*$order['price'] ?></td> -->
                        <td><?php echo $order['status'] ?></td> 
                        <td><a  id="g-btn" href="orderdetails.php?id=<?php echo $order['id'] ?>">Veiw details</a></td>

                    </tr>

                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>

</section>

<?php include 'includes/foot.php'; ?>
