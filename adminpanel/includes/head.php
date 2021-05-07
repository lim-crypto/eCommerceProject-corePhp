<?php

session_start();

if ($_SESSION['role'] != 'admin') {
    echo 'not admin';
    header('location:../login.php');
} 
?> 

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>A Day in a Garden E-Commerce</title> 

    <link rel="icon" type="image/png" href="../images/logo.png">
     
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Chewy&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/d3f7c8fad1.js" crossorigin="anonymous"></script>

</head>

<body>
    <header>
        <div class="menu">
            <span class="bar a"></span>
            <span class="bar b"></span>
            <span class="bar c"></span>
        </div>
        <div class="logo"><img src="logo.png" width="50px">A Day in a Garden</div>

    </header>
    <aside class="aside">
        <nav class="nav">
            <div class="logo"> <img src="logo.png" width="50px"> A Day in a Garden </div>
            <a href="dashboard.php">Dashboard</a>
            <a href="users.php">Users</a>
            <a href="product.php">Plants</a>
            <a href="category.php">Category</a>
            <a href="orders.php">Orders</a>
            <a href="../index.php">Client Side</a> 

            <a href="../logout.php">Logout</a> 

        </nav>
        
    </aside> 

    <script>
          const menu = document.querySelector('.menu'); 
  const aside = document.querySelector('.aside');  
  
  menu.addEventListener('click', ()=> {
      menu.classList.toggle("change"); 
      aside.classList.toggle("left");   
      
  });
    </script>