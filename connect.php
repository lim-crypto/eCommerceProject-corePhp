<?php
$conn = new mysqli ("localhost","root","","plantdb");
if(!$conn)
{
    die("Connection Failed". mysqli_connect_error());
    echo"cant connect";
}
?>