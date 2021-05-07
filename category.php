<?php
include 'connect.php';
include 'header.php';
$conn = $GLOBALS['conn'];
?>
 
<!-----featured catergories------>
<div class="categories" id="categories">
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
<!------- footer ---------->
<?php include 'footer.php'; ?>


