<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>A Day in a Garden E-Commerce</title> 
    <link rel="icon" type="image/png" href="images/logo.png">

    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="style/responsivestyle.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Chewy&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/d3f7c8fad1.js" crossorigin="anonymous"></script>


</head>

<body>
    <?php session_start();


    if (isset($_COOKIE['user'])) {
        $user = unserialize($_COOKIE['user']);
        $_SESSION["user_id"] = $user['user_id'];
        $_SESSION["email"] =  $user['email'];
        $_SESSION["role"] = $user['role'];
 
    }





    ?>

    <div class="navbar" id="navbar">
        <div class="logo">
            <a href="index.php"> <img src="img/logo.png" width="55px"></a>
        </div>
        <nav>
            <ul id="MenuItems">
                <li><a href="index.php">Home</a></li>
                <li><a href="category.php">Category</a></li>
                <li><a href="plants.php">Plants</a></li>
                <?php if (isset($_SESSION["role"])) {
                    if ($_SESSION["role"]  == 'admin') {
                        echo '<li><a href="adminpanel/orders.php">Admin Panel</a></li>';
                    }else{
                            echo '  <li><a href="cart.php">Cart</a></li>';
                            echo '   <li><a href="orders.php">Orders</a></li>';
                    }
                } 
                ?>
                <li><a href="about.php">About</a></li>


                <?php if (isset($_SESSION['email'])) {
                    echo '<li><a href="logout.php">Logout</a></li>';
                } else {
                    echo '<li><a href="login.php">Login</a></li>';
                }
                ?>

            </ul>
        </nav>
        <img src="img/menu.png" class="menu-icon" onclick="menutoggle()">
    </div>