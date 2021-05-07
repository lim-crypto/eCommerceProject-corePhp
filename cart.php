<?php
include 'connect.php';
include 'header.php';
if (!$_SESSION['user_id']) {
    header('location:login.php');
}
if (isset($_GET['cart_id'])) {
    $id = $_GET['cart_id'];
    // echo $id;
    $delete = "DELETE  FROM cart WHERE id = $id";
    $result = mysqli_query($conn, $delete);
}


if (isset($_GET['buynow'])) {
    $query = "SELECT * FROM cart where product_id='" . $_GET['buynow'] . "'  AND user_id = '" . $_SESSION['user_id'] . "'";
    $run_query = mysqli_query($conn, $query) or die(mysqli_error($conn));
    $order = mysqli_fetch_assoc($run_query);
    $query = "INSERT INTO orders (product_id, user_id, quantity) 
              VALUES('" . $_GET['buynow'] . "' , '" . $_SESSION['user_id'] . "' , '" . $order['quantity'] . "'  ) ";
    $result = mysqli_query($conn, $query);
    $delete = "DELETE  FROM cart WHERE  product_id='" . $_GET['buynow'] . "' AND user_id = '" . $_SESSION['user_id'] . "' ";
    $result = mysqli_query($conn, $delete);
}

// if (isset($_GET['qtyP'])) {
//     $quantity = $_GET['qtyP'] + 1;
//     $query = "UPDATE cart set 
//     quantity='$quantity'
//     where  id='" . $_GET['id'] . "'";
//     mysqli_query($conn, $query);
// }
// if (isset($_GET['qtyM'])) {
//     if ($_GET['qtyM'] > 1) {
//         $quantity = $_GET['qtyM'] - 1;
//         $query = "UPDATE cart set 
//         quantity='$quantity'
//         where  id='" . $_GET['id'] . "'";
//         mysqli_query($conn, $query);
//     }
// }


if (isset($_POST['save'])) {
    
        $quantity = $_POST['quantity'] ;
        $query = "UPDATE cart set 
        quantity='$quantity'
        where  id='" . $_POST['id'] . "'";
        mysqli_query($conn, $query);
    }

$query = "SELECT house_number, street, brgy, city, province FROM users where id = '" . $_SESSION['user_id'] . "'";
$run_query = mysqli_query($conn, $query) or die(mysqli_error($conn));
$user = mysqli_fetch_assoc($run_query);
if (isset($_POST['checkout'])) {
    $housenumber = mysqli_real_escape_string($conn,test_input( $_POST['housenumber']));
    $street = mysqli_real_escape_string($conn,test_input( $_POST['street']));
    $brgy = mysqli_real_escape_string($conn,test_input( $_POST['brgy']));
    $city = mysqli_real_escape_string($conn, test_input($_POST['city']));
    $province = mysqli_real_escape_string($conn,test_input( $_POST['province']));
    $query = "INSERT INTO shipping_address (  house_number, street, brgy, city, province ) 
                     VALUES (  '$housenumber', '$street', '$brgy', '$city', '$province' )";
    $result = mysqli_query($conn, $query);
    $shipping_address_id = mysqli_insert_id($conn);
    $query = "SELECT * FROM cart where user_id = '" . $_SESSION['user_id'] . "'";
    $run_query = mysqli_query($conn, $query);
    $cart = mysqli_fetch_all($run_query, MYSQLI_ASSOC);
    foreach ($cart as $order) {
        $query = "INSERT INTO orders (product_id, user_id, quantity, shipping_address_id)
                        VALUES('" . $order['product_id'] . "' , '" . $_SESSION['user_id'] . "' , '" . $order['quantity'] . "' ,'$shipping_address_id' ) ";
        $result = mysqli_query($conn, $query);
    }
    $delete = "DELETE  FROM cart WHERE user_id = '" . $_SESSION['user_id'] . "' ";
    $result = mysqli_query($conn, $delete);
    header('location: orders.php');
}
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
if (isset($_GET['addtocart'])) {
    if (!$_SESSION['user_id']) {
        header('location:login.php');
    } else {
        $query = "SELECT * FROM cart Where product_id = '" . $_GET['addtocart'] . "'  And user_id = '" . $_SESSION['user_id'] . "' ";
        $run_query = mysqli_query($conn, $query);
        $cart= mysqli_fetch_assoc($run_query);
        
        if(mysqli_num_rows($run_query)>0){
                $qty =  $cart['quantity'] ;
                $qty++;
            $query = "UPDATE cart set quantity= $qty
                            where product_id = '" . $_GET['addtocart'] . "'  And user_id = '" . $_SESSION['user_id'] . "' ";
                             mysqli_query($conn,$query) ; 
        }else{
        $query = " INSERT INTO cart (product_id, user_id, quantity)
         VALUES ( '" . $_GET['addtocart'] . "' , '" . $_SESSION['user_id'] . "' , 1)";
        $result = mysqli_query($conn, $query);
    }
}
}
?>


<div class="cart" id="cart">

    <div class="small-container">

        <h1 style="text-align: center; padding: 20px;">My Cart</h1>



        <?php
        $cart_items = "SELECT *
                            FROM products
                            JOIN  cart 
                            ON   products.id = cart.product_id 
                            WHERE user_id = '" . $_SESSION['user_id'] . "' 
                            ORDER by cart.date DESC
                            ";


        $get_items = mysqli_query($conn, $cart_items);
        $total_price = 0;
        ?>

        <?php if (mysqli_num_rows($get_items) > 0) : ?>
            <table>

                <tr>
                    <th>IMG</th>
                    <th>PLANT'S NAME</th>
                    <th>PRICE</th>
                    <th>QUANTITY</th>
                    <th>TOTAL PRICE</th>

                    <th colspan="2">ACTION</th>

                </tr>


                <?php

                if (mysqli_num_rows($get_items) > 0) {
                    while ($product_cart = mysqli_fetch_assoc($get_items)) { 
                        $total_price += $product_cart['price'] * $product_cart['quantity'];

                        echo "
                    <form action='cart.php' method='POST' >
                    <tr>
                    <td><img  src='adminpanel/uploads/" . $product_cart['img'] . "' id='cart-img'></td> 
                    <td style='text-align: left;'><h3>" . $product_cart['name'] . "</h3> </td>
                    <td>₱" . $product_cart['price'] . "</td>  
                    <td> <input  style='width: 30px;  type='number' name='quantity' value='" . $product_cart['quantity'] . "' > 
                                 <input type='hidden' name='id' value='" . $product_cart['id'] . "' >  
                                    <input type='submit' name='save' value='save'     >
                    </td> 
                    <td>₱" . $product_cart['price'] * $product_cart['quantity'] . "</td> 
                    <td><a  href='cart.php?cart_id=" . $product_cart['id'] . "'  id='remove-btn'>Delete</a></td>
                    <td><a  href='shipping_address.php?buynow=" . $product_cart['product_id'] . "'  id='buy-btn'>Buy</a></td>
                    </tr>
                    </form>
      
               
                    ";
                    }
                    echo " <tr id='last-row'>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td><h1>Total</h1></td>
                                <td><h1>₱" . $total_price . "</h1></td>
                                
                            </tr>
                                ";

                    // <td colspan='2' ><a  href='shipping_address.php' id='buy-btn'>Check out</a></td>

                }
                ?>
            </table>
            <div class="container">
                <form action="cart.php" id="reg"  class="form" method="POST">

                    <div>
                        <h3>Shipping Address</h3>
                        <label for="hn">House number</label> 
                        <input type="text" class="input" id="hn" name="housenumber" placeholder="House number" value="<?php echo $user['house_number'] ?>"> 
                        <label for="street">Street</label>
                        <input type="text" class="input" id="street" name="street" placeholder="Street" value="<?php echo $user['street'] ?>">  
                        <label for="brgy">Barangay</label>
                        <input type="text" class="input" id="brgy" name="brgy" placeholder="Barangay" value=" <?php echo $user['brgy'] ?>" required> <br> 
                 
                    </div>
                    
                    <div> <br><br>
                        <label for="city">City</label><br>
                        <input type="text" class="input" id="city" name="city" placeholder="City" value="<?php echo $user['city'] ?>" required>
                        <label for="province">Province</label>
                        <input type="text" class="input" id="Province" name="province" placeholder="Province" value=" <?php echo $user['province'] ?>" required>
                        <input type="submit" name="checkout" value="checkout" class="btn2">
                    </div>
                </form> 
            </div>
        <?php endif ?>
    </div>
</div>
<?php if (mysqli_num_rows($get_items) == 0) : ?>
    <div style="text-align: center; ">
        <h1 id="empty">EMPTY</h1>
    </div>
<?php endif ?>
<!------- footer ---------->

<?php include 'footer.php'; ?>