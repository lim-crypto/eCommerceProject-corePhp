<?php
include 'connect.php';
include 'header.php';
 
if (isset($_GET['id'])) {
    $query = "SELECT products.id, category_id, img , name, price, AVG(rating) as rating, product_id 
    FROM products left join reviews on reviews.product_id= products.id  
    where category_id = '" . $_GET['id'] . "'
    GROUP BY products.id
   ";
    $run_query = mysqli_query($conn, $query) or die(mysqli_error($conn));
    $plants = mysqli_fetch_all($run_query, MYSQLI_ASSOC);
} else {
    header('location:plants.php');
}
?>
<div class="small-container" id="plant">
    <h2 class="title"><?php echo $_GET['name'] ?> </h2>
    <div class="row">
        <?php foreach ($plants as $plant) : ?>
            <?php $plant['rating'] = ($plant['rating'] == null) ? 0 : $plant['rating']  ?>
            <div class="col-4">
                <a href="plantsdetails.php?id=<?php echo $plant['id'] ?>"><img src="adminpanel/uploads/<?php echo $plant['img'] ?>"></a>
                <h4> <a href="plantsdetails.php?id=<?php echo $plant['id'] ?>"> <?php echo $plant['name'] ?></h4></a>
                <div class="Stars" style="--rating:<?php echo $plant['rating']; ?>"></div>
                <p> &#8369; <?php echo $plant['price'] ?></p>
            </div>

        <?php endforeach ?>
    </div>
</div> 
<?php include 'footer.php'; ?>