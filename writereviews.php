<?php

 include 'header.php';
require 'connect.php'; 
 
 
if(isset($_POST['submit'])){  
    $id  = mysqli_real_escape_string($conn, test_input( $_POST['product_id'])); 
     $rating  = mysqli_real_escape_string($conn,test_input( $_POST['rate']));
     $text = mysqli_real_escape_string($conn,test_input( $_POST['text']));
     $query = "INSERT INTO reviews ( product_id, user_id, rating, text) 
     VALUES ( '$id', '" . $_SESSION['user_id'] . "',  '$rating','$text')";
     $result = mysqli_query($conn, $query);
        header("location:plantsdetails.php?id=$id");
    }


function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>

<style>
    .rate {
        float: left;
        height: 46px;
        padding: 0 10px;
    } 
    .rate:not(:checked)>input {
        position: absolute;
        top: -9999px;
    } 
    .rate:not(:checked)>label {
        float: right;
        width: 1em;
        overflow: hidden;
        white-space: nowrap;
        cursor: pointer;
        font-size: 30px;
        color: #ccc;
    } 
    .rate:not(:checked)>label:before {
        content: '★ ';
    }

    .rate>input:checked~label {
        color: rgb(0, 150, 0);
    }

    .rate:not(:checked)>label:hover,
    .rate:not(:checked)>label:hover~label {
        color: rgb(0, 150, 0);
    }

    .rate>input:checked+label:hover,
    .rate>input:checked+label:hover~label,
    .rate>input:checked~label:hover,
    .rate>input:checked~label:hover~label,
    .rate>label:hover~input:checked~label {
        color: rgb(0, 150, 0);
    }
</style>

<div class="container2">
    <div class="container">
        <form id="reg" class="form" action="writereviews.php" method="POST">
            <div>
                <h3>Write Reviews</h3> 
                <input type="hidden" name="product_id" value="<?php echo $_GET['product_id']  ?> ">
                <label for="text">reviews</label><br>
                <div class="rate">
                    <input type="radio" id="star5" name="rate" value="5" />
                    <label for="star5" title="text">5 stars</label>
                    <input type="radio" id="star4" name="rate" value="4" />
                    <label for="star4" title="text">4 stars</label>
                    <input type="radio" id="star3" name="rate" value="3" />
                    <label for="star3" title="text">3 stars</label>
                    <input type="radio" id="star2" name="rate" value="2" />
                    <label for="star2" title="text">2 stars</label>
                    <input type="radio" id="star1" name="rate" value="1" />
                    <label for="star1" title="text">1 star</label>
                </div>
                <textarea name="text" id="text" class="input" cols="60" rows="10">  <?php echo $_SESSION['user_id'] ?></textarea>
                <input type="submit" name="submit" class="btn2">

            </div>

            <div class="about">
                <img src="adminpanel/uploads/<?php echo $plant['img'] ?>" id="plantsimg">
            </div>
        </form>
    </div>

</div>
<?php include 'footer.php'; ?>