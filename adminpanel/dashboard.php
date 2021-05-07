<?php
include 'includes/head.php';
require '../connect.php';

$query = "SELECT COUNT(id) as users FROM  users";
$run_query = mysqli_query($conn, $query);
$users = mysqli_fetch_assoc($run_query);


$query = "SELECT COUNT(id) as categories FROM  category";
$run_query = mysqli_query($conn, $query);
$categories = mysqli_fetch_assoc($run_query);

$query = "SELECT COUNT(id) as plants FROM  products";
$run_query = mysqli_query($conn, $query);
$plants = mysqli_fetch_assoc($run_query);

$query = "SELECT COUNT(id) as orders FROM orders";
$run_query = mysqli_query($conn, $query);
$orders = mysqli_fetch_assoc($run_query);
  
?>

 

<section class="section">
    <div class="box">
        <div class="box-header">
            <h3 class="tablename">Dashboard</h3>
        </div>
        <div class="box-body">
            <div class="dl">
                <div class="dashboard-menu">
                    <div class="box-header">
                        <h3 class="tablename"> <i class="fas fa-users"></i> Users </h3>
                        <h1><?php echo $users['users'] - 1; ?></h1>

                    </div>
                    <a href="users.php"> more info </a>
                </div>
                <div class="dashboard-menu">
                    <div class="box-header">
                        <h3 class="tablename"> <i class="fas fa-seedling"></i> Categories </h3>
                        <h1><?php echo $categories['categories']; ?></h1>
                    </div>
                    <a href="category.php"> more info </a>
                </div>
                <div class="dashboard-menu">
                    <div class="box-header">
                        <h3 class="tablename"> <i class="fas fa-leaf"></i> Plants </h3>
                        <h1><?php echo $plants['plants']; ?></h1>
                    </div>
                    <a href="product.php"> more info </a>
                </div>
                <div class="dashboard-menu">
                    <div class="box-header">
                        <h3 class="tablename"><i class="fas fa-shopping-basket"></i> Orders </h3>
                        <h1><?php echo $orders['orders']; ?> </h1>
                    </div>
                    <a href="orders.php"> more info </a>
                </div>
            </div>

            <div id="chartContainer" style="height: 370px; width: 100%;"></div>
        </div>
    </div>
</section>


<section class="section">
    <div class="box">
        <div class="box-header">
            <h3 class="tablename"> </h3>
        </div>
        <div class="box-body">
            <div id="chartContainer2" style="height: 370px; width: 100%;"></div>
        </div>
    </div>
</section>



















<script type="text/javascript"> 
    window.onload = function() {
        CanvasJS.addColorSet("greenShades", [ //colorSet Array

            "Green",
            "#3CB371",
            "#90EE90",
            "rgb(85, 139, 47)"
        ]);

        var chart = new CanvasJS.Chart("chartContainer", {
            theme: "light1", // "light2", "dark1", "dark2"
            animationEnabled: false, // change to true	
            colorSet: "greenShades",
            title: {
                text: ""
            },
            data: [{
                // Change type to "bar", "area", "spline", "pie",etc.
                type: "column",
                dataPoints: [{
                    label: "Users",
                    y: <?php echo $users['users'] - 1; ?>
                }, {
                    label: "Categories",
                    y: <?php echo $categories['categories']; ?>
                }, {
                    label: "Plants",
                    y: <?php echo $plants['plants']; ?>
                }, {
                    label: "Orders",
                    y: <?php echo $orders['orders']; ?>
                }]
            }]
        });
        chart.render();
 
                    
        







        //no database
        var chart = new CanvasJS.Chart("chartContainer2", {
            theme: "light1", // "light2", "dark1", "dark2"
            animationEnabled: false, // change to true	
            colorSet: "greenShades",
            title: {
                text: "Sales"
            },
            data: [{
                // Change type to "bar", "area", "spline", "pie", "column" , etc.
                type: "spline",
                dataPoints: [

               
                    {
                        label: "Jan",
                        y: 1
                    },
                    {
                        label: "Feb",
                        y: 2
                    },
                    {
                        label: "Mar",
                        y:2
                    },
                    {
                        label: "Apr",
                        y: 2
                    },     {
                        label: "May",
                        y: 3
                    },
                    {
                        label: "Jun",
                        y: 1
                    },
                    {
                        label: "Jul",
                        y: 1
                    },
                    {
                        label: "Aug",
                        y: 2
                    },
                    {
                        label: "Sep",
                        y: 1
                    },
                    {
                        label: "Oct",
                        y: 2
                    }, 
                    {
                        label: "Nov",
                        y:1
                    },  {
                        label: "Dec",
                        y: 2
                    }
                ]
            }]
        });
        chart.render();

    }
</script>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js">
</script>


<?php include 'includes/foot.php'; ?>