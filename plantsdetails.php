<?php include 'header.php'; 
require 'connect.php';
if(isset($_GET['id'])){
    $query="SELECT  products.id, img, name, description, price, product_id, user_id,AVG(rating) as rating,text FROM products left join reviews on products.id=product_id where products.id = '".$_GET['id']."'";
$run_query = mysqli_query($conn, $query) or die(mysqli_error($conn));
$plant = mysqli_fetch_assoc($run_query);

$query="SELECT rating, text , CONCAT(lastname ,', ',firstname,' ', middlename  ) AS Cname  FROM  reviews inner join users on users.id=user_id where product_id = '".$_GET['id']."'";
$run_query = mysqli_query($conn, $query) or die(mysqli_error($conn));
$reviews = mysqli_fetch_all($run_query, MYSQLI_ASSOC);

}else{
    header('location:index.php');
}
?>
<div class="small-container"> 
    <div class="container">
        <div class="about">
            <h1 id="h1about"><?php echo $plant['name'] ?></h1> 
            <p><?php echo $plant['description']   ?>
            </p> 
            <?php $plant['rating'] = ($plant['rating'] == null) ? 0 : $plant['rating']  ?> 
            <div class="Stars" style="--rating:<?php echo $plant['rating']; ?>"></div>
            <p>&#8369; <?php echo $plant['price'] ?></p> 
            <br>
            <a class='add-to-cart-button'  href="cart.php?addtocart=<?php echo $plant['id'] ?>" ><i class='fa fa-shopping-cart'></i>  Add to Cart </a>
             <a class='add-to-cart-button'  href="shipping_address.php?buynow=<?php echo $plant['id'] ?>" >  <i class="fas fa-shopping-basket"></i>   Buy now </a>
       
        </div> 
        <div  class="about"  >
            <img src="adminpanel/uploads/<?php echo $plant['img'] ?>" alt="" id="plantsimg">
        </div>
    </div> 
</div>

<div class="small-container"> 
  <?php if(mysqli_num_rows($run_query) >0) : ?>
    <h1> REVIEWS</h1>
    <?php endif ?>
    <br>
    <div class="about">
        <?php  foreach($reviews as $review): ?> 

            <h3> <?php echo $review['Cname'];?> </h3>   <div class="Stars" style="--rating:<?php echo $review['rating']; ?>"></div>
        <p> <?php echo $review['text'] ?> </p>
        <br>
        <?php endforeach ?>
</div>

</div>
<br> <br> <br>
 
<?php include 'footer.php'; ?>