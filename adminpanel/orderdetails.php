<?php
include 'includes/head.php';
require '../connect.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
} else {
    header('location:orders.php');
}

$query = "SELECT    img, name, description,price,
orders.id, product_id, user_id, quantity, status ,orders.date as ordate, 
CONCAT(lastname ,', ',firstname,' ', middlename  ) AS Cname,
CONCAT(shipping_address.house_number,', ',  shipping_address.street , ', ',shipping_address.brgy , ' ', shipping_address.City , ', ' ,shipping_address.province) AS Address
FROM orders 
inner join  products on  products.id=orders.product_id 
inner join users on users.id=user_id 
left join shipping_address on  shipping_address_id=shipping_address.id
            Where orders.id = $id";

$run_query = mysqli_query($conn, $query) or die(mysqli_error($conn));
$order =  mysqli_fetch_assoc($run_query);

if (isset($_POST['stat'])) {
    $query = "UPDATE orders set 
    status='" . $_POST['stat'] . "'
where  id='$id'";
    $result = mysqli_query($conn, $query);
    header("location:order.php");
}

?>



<section class="section">


    <div class="box">
        <div class="box-header">
            <!-- <div class="addbutton"> <i class="fas fa-plus-circle"></i></div> -->
            <h3 class="tablename">Orders</h3>

        </div>
        <!-- /.box-header -->
        <div class="box-body">  
                <div class="fl">
                    <h6> Place Order <?php echo $order['ordate'] ?> </h6>
                    <h1> <?php echo $order['Cname'] ?> </h1>
                    <h3><?php echo $order['name'] ?> </h3>
                    <img class="thumbnailL" src="plant.jpg" alt="">
                </div>
                <!-- <p> </?php echo $order['description'] ?> </p> -->

  
                <div  >
                    <br><br><br>
                    <p>&#8369;<?php echo $order['price'] ?></p>
                    <p>Qty: <?php echo $order['quantity'] ?></p>
                    <b> Total Price: &#8369;<?php echo $order['quantity'] * $order['price'] ?> </b>
                    <p>Shipping Address: <?php echo $order['Address'] ?> </p>


                </div>
                <div class="fl">
                    <br><br><br>
                    <h4>Place Order: <?php echo $order['ordate'] ?> </h4> 
                    <form action="orderdetails.php?id=<?php echo $order['id'] ?>" method="POST">
                        <label for="status"> Status:  </label>   <?php echo $order['status'] ?>
                        <select name="stat" id="status" class="form-control"> 
                            <option type="submit" value="Place Order">Place Order</option>
                            <option type="submit" value="Shipped">Shipped</option>
                            <option type="submit" value="Delivered">Delivered</option>
                        </select>
                        <input type="submit" value="Save" class="btn">
                    </form>
                </div>


                <!-- <a href="orderdetails.php?id=</?php echo $order['id'] ?>">edit</a>  -->


        </div>
    </div>

</section>

<?php include 'includes/foot.php'; ?>