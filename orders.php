<?php
include 'connect.php';
include 'header.php';

if (!$_SESSION['user_id']) {
    header('location:login.php');
}

?>


<div class="cart" id="cart">
    <div class="small-container">
        <h1 style="text-align: center; padding: 20px;">MY ORDERS</h1>



        <?php
        $cart_items = "SELECT *
                            FROM products
                            JOIN orders 
                            ON   products.id = orders.product_id 
                            WHERE user_id = '" . $_SESSION['user_id'] . "' 
                            ORDER by orders.date DESC
                            ";


        $get_items = mysqli_query($conn, $cart_items);
        $total_price = 0;
        ?>

        <?php if (mysqli_num_rows($get_items) > 0) : ?>
            <table>

                <tr>
                    <th>IMG</th>
                    <th>PLANT'S NAME</th>
                    <th>QUANTITY</th>
                    <th>PRICE</th>
                    <th>TOTAL PRICE</th>
                    <th>Status</th>

                </tr>

            <?php endif ?>


            <?php

            if (mysqli_num_rows($get_items) > 0) {
                while ($product_cart = mysqli_fetch_assoc($get_items)) {

                    $total_price += $product_cart['price'] * $product_cart['quantity'];
                    // <td><input type='checkbox'></td>
                    if($product_cart['status']=='Delivered'){
                        $product_cart['status']="Delivered : <br><a href='writereviews.php?product_id=".$product_cart['product_id']."'>  write reviews</a>";
                    }
                    echo   "
                    <tr>

                    <td><img src='adminpanel/uploads/" . $product_cart['img'] . "'  id='cart-img'></td>

                    <td style='text-align: left;'><h3>" . $product_cart['name'] . "</h3> </td>

                    <td>" . $product_cart['quantity'] . "</td>

                    <td>₱" . $product_cart['price'] . "</td>
 
                    <td>₱" . $product_cart['price'] * $product_cart['quantity'] . "</td>
                    <td>" . $product_cart['status'] . "</td>
                    </tr>
                ";
                }
                echo "
                                <tr id='last-row'>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td><h1>Total</h1></td>
                                <td><h1>₱" . $total_price . "</h1>     </td>
                                <td></td>
                            </tr>
                                ";
            }
            ?>
            </table>

    </div>
</div>
<?php if (mysqli_num_rows($get_items) == 0) : ?>
    <div style="text-align: center; ">
        <h1 id="empty">EMPTY</h1>
    </div>
<?php endif ?>
<!------- footer ---------->
<?php include 'footer.php'; ?>