<?php include 'header.php'; 
 require 'connect.php';
 
 $query = "SELECT house_number, street, brgy, city, province FROM users where id = '" . $_SESSION['user_id'] . "'";
 $run_query = mysqli_query($conn, $query) or die(mysqli_error($conn));
 $user = mysqli_fetch_assoc($run_query);  
 if (isset($_POST['checkout'])) { 
    $product_id = $_POST['product_id'];
    $housenumber = mysqli_real_escape_string($conn,test_input( $_POST['housenumber']));
    $street = mysqli_real_escape_string($conn,test_input( $_POST['street']));
    $brgy = mysqli_real_escape_string($conn,test_input( $_POST['brgy']));
    $city = mysqli_real_escape_string($conn, test_input($_POST['city']));
    $province = mysqli_real_escape_string($conn,test_input( $_POST['province']));
    $query = "INSERT INTO shipping_address (  house_number, street, brgy, city, province ) 
                     VALUES (  '$housenumber', '$street', '$brgy', '$city', '$province' )";
    $result = mysqli_query($conn, $query); 
    $shipping_address_id= mysqli_insert_id($conn);

    $query = "SELECT * FROM cart where product_id='$product_id'  AND user_id = '" . $_SESSION['user_id'] . "'";
    $run_query = mysqli_query($conn, $query) or die(mysqli_error($conn));
    $order = mysqli_fetch_assoc($run_query); 
    if( $order['quantity']==null){
        $order['quantity']=1;
    }
    $query = "INSERT INTO orders (product_id, user_id, quantity, shipping_address_id) 
              VALUES('$product_id ' , '" . $_SESSION['user_id'] . "' , '" . $order['quantity'] . "' ,'$shipping_address_id' ) ";
    $result = mysqli_query($conn, $query); 

    $delete = "DELETE  FROM cart WHERE  product_id='$product_id'  AND user_id = '" . $_SESSION['user_id'] . "' ";
    $result = mysqli_query($conn, $delete);
    header('location:orders.php');
}
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }  
 ?> 

 <div class="container2">
     <div class="container">
         <form id="reg"  class="form" action="shipping_address.php" method="POST"> 
             <div>
                        <h3>Shipping Address</h3>
                        <input type="hidden" name="product_id" value="<?php echo $_GET['buynow'] ?>" >
                        <label for="hn">House number</label> 
                        <input type="text" class="input" id="hn" name="housenumber" placeholder="House number" value="<?php echo $user['house_number'] ?>"> <br>
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

 </div>
 
<?php include 'footer.php';?>