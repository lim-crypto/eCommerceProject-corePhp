<?php
include 'connect.php';
$conn = $GLOBALS['conn'];
include 'header.php';

$query = "SELECT products.id,  img , name, price, orders.product_id, AVG(reviews.rating) as rating ,reviews.product_id,
COUNT(orders.product_id) AS product_idCount
FROM products
inner join orders
ON products.id = orders.product_id
left join reviews
on reviews.product_id= products.id 
GROUP BY orders.product_id 
ORDER BY product_idCount  DESC  
LIMIT 4";
$run_query = mysqli_query($conn, $query);
$bestselling = mysqli_fetch_all($run_query, MYSQLI_ASSOC);

$query = "SELECT products.id,  img , name, price, products.date , rating
FROM products left JOIN reviews on reviews.product_id = products.id
ORDER BY date DESC  
LIMIT 8";
$run_query = mysqli_query($conn, $query);
$newplants = mysqli_fetch_all($run_query, MYSQLI_ASSOC);
?>

<body>
    <div class="header">
        <div class="container">
            <div class="row">
                <div class="col2">
                    <h1>A Day in a Garden</h1>
                    <p>This website is a platform where we connect the buyers <br> sellers of plants within one community.</p>

                    <a href="plants.php" class="btn">Start Shopping &#8594;</a>
                </div>
                <div class="col2">
                    <img src="img/home-back.png">
                </div>
            </div>
        </div>
    </div>

    <div class="small-container" id="plant"> 
        <h2 class="title">New Plants</h2>
        <div class="row">
            <?php foreach ($newplants as $new) : ?>
                <?php $new['rating'] = ($new['rating'] == null) ? 0 : $new['rating']  ?>
                <div class="col-4">
                <a href="plantsdetails.php?id=<?php echo $new['id'] ?>"> <img src="adminpanel/uploads/<?php echo $new['img'] ?>"></a>
                    <h4><a href="plantsdetails.php?id=<?php echo $new['id'] ?>"><?php echo $new['name'] ?> </a> </h4>
                    <div class="Stars" style="--rating:<?php echo $new['rating']; ?>"></div>
                    <p>&#8369; <?php echo $new['price'] ?></p>
                </div>
            <?php endforeach ?>
        </div>
    
    </div> 
    <div class="offer">
        <div class="small-container">
            <div class="row">
                <div class="col-2">
                    <?php
                    $best_product = "SELECT product_id, COUNT(product_id) AS product_idCount
                FROM orders
                GROUP BY product_id
                ORDER BY product_idCount DESC";

                    $best_plant = mysqli_query($conn, $best_product);

                    while ($best = mysqli_fetch_assoc($best_plant)) {

                        $best_id = $best['product_id'];
                        $best_plant_name = "SELECT * FROM products WHERE id = $best_id";
                        $best_plant_id = mysqli_query($conn, $best_plant_name);

                        while ($best_product_name = mysqli_fetch_assoc($best_plant_id)) {
                            echo "<img src='adminpanel/uploads/" . $best_product_name['img'] . "'>";
                        }
                        break;
                    }
                    ?>
                </div>
                <div class="col-2">
                    <h1 id="best-selling">BEST SELLING!!</h1>
                    <!--naka base ito sa may pinakamabbenta na poduct sa database--->
                    <?php

                    $best_product = "SELECT product_id, COUNT(product_id) AS product_idCount
                    FROM orders
                    GROUP BY product_id
                    ORDER BY product_idCount DESC";

                    $best_plant = mysqli_query($conn, $best_product);

                    while ($best = mysqli_fetch_assoc($best_plant)) {

                        $best_id = $best['product_id'];
                        $best_plant_name = "SELECT * FROM products WHERE id = $best_id";
                        $best_plant_id = mysqli_query($conn, $best_plant_name);

                        while ($best_product_name = mysqli_fetch_assoc($best_plant_id)) {

                            echo "
                            <h1>" . $best_product_name['name'] . "</h1>
                            <small>" . $best_product_name['description'] . "</small>
                            ";
                        }
                        break;
                    }
                    ?>
                    <br>
                    <!-- <a href="" class="btn">Buy Now &#8594;</a> -->
                </div>
            </div>
        </div>
    </div>
    <!-- <h2 class="title">Best selling Plants</h2> -->
    <div class="small-container" id="plant">
        <!-----Indoor plants------>
        <h2 class="title">Best selling Plants</h2>
        <div class="row">
            <?php foreach ($bestselling as $bestsell) : ?>
                <?php $bestsell['rating'] = ($bestsell['rating'] == null) ? 0 : $bestsell['rating']  ?>
                <div class="col-4">
                    <a href="plantsdetails.php?id=<?php echo $bestsell['id'] ?>"><img src="adminpanel/uploads/<?php echo $bestsell['img'] ?>"></a>
                    <h4> <a href="plantsdetails.php?id=<?php echo $bestsell['id'] ?>"><?php echo $bestsell['name'] ?></a></h4>
                    <div class="Stars" style="--rating:<?php echo $bestsell['rating']; ?>;"></div>
                    <p> &#8369; <?php echo $bestsell['price'] ?></p>

                </div>
            <?php endforeach  ?>
        </div>
        <!-- <div class="row">
            <div class="col2">
                <a href="" class="btn">Start Shopping &#8594;</a>
            </div>
        </div> -->
    </div>
    <!-----featured catergories------>
    <div class="categories" id="category">
        <div class="small-container">
            <h1 class="title">Categories of Plants</h1>
            <div class="row">
                <?php
                $plants = "SELECT * FROM category";
                $get_plants = mysqli_query($conn, $plants);
                while ($plant = mysqli_fetch_assoc($get_plants)) {
                    echo "
              
                <div class='col-3'>
                <a href='plant.php?id=" . $plant['id'] . "&name=" . $plant['category_name'] . "'><img src='adminpanel/uploads/" . $plant['category_img'] . "'></a>
                <h3>   <a href='plant.php?id=" . $plant['id'] . "&name=" . $plant['category_name'] . "'> " . $plant['category_name'] . " </a></h3>
            </div>
                ";

                
                }
                ?>
            </div>
        </div>
    </div>
    <button onclick="topFunction()" id="myBtn" title="Go to top"><i class="fa fa-chevron-up"></i></button>
 

    <!------- footer ---------->
    <?php include 'footer.php'; ?>