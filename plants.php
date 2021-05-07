<?php
include 'connect.php';
include 'header.php';
$conn = $GLOBALS['conn'];
?>

<div class="small-container">
    <!--naka loop ito, ang lalabas na data ay galing sa data base naka loop sya, naka nested, check muna yung categ id, habang may nakukuha sya na categ id may sql code na magaganap sa loob non-->

    <?php                                                                     
    $plants = "SELECT DISTINCT category_id,category_name
                 FROM products
                 JOIN category
                 ON products.category_id = category.id";
    $get_plants = mysqli_query($conn, $plants);

    while ($plant = mysqli_fetch_assoc($get_plants)) {

        echo "<h2 class='title' id='" . $plant['category_name'] . "'> " . $plant['category_name'] . "</h2>";
        echo "  <div class='row'>";
        $category_plants = "SELECT products.id, img, name,   price,  category_name, category_id, AVG(rating) as rating, product_id 
                                FROM products
                                JOIN category
                                ON products.category_id = category.id
                                left join reviews on reviews.product_id= products.id 
                                WHERE category_id =' " . $plant['category_id'] . "'
                                GROUP by products.id  "; 
        $get_plants2 = mysqli_query($conn, $category_plants); 
        while ($category_plant = mysqli_fetch_assoc($get_plants2)) {
           $category_plant['rating'] = ($category_plant['rating'] == null) ? 0 : $category_plant['rating']  ;
            echo "<div class='col-4'>
            <a href='plantsdetails.php?id=" . $category_plant['id'] . " '>   <img src='adminpanel/uploads/" . $category_plant['img'] . "'></a>
                <h4> <a href='plantsdetails.php?id=" . $category_plant['id'] . " '> " . $category_plant['name'] . "</a></h4>
                <div class='Stars' style='--rating: ".$category_plant['rating']."  '></div>
                <p>₱" . $category_plant['price'] . "</p> 
                <a class='add-to-cart-button'  href='cart.php?addtocart=" . $category_plant['id'] . "'><i class='fa fa-shopping-cart'>   Add to Cart</i></a>
            </div>
                            ";
        }
        echo "</div>";
    }

    ?>
</div>
 
<!------- footer ---------->
<?php include 'footer.php'; ?>