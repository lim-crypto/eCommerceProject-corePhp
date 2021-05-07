<?php include 'includes/head.php';
require '../connect.php';
if (isset($_GET['id'])) {
    $query = "SELECT * FROM products where id = " . $_GET['id'];
    $run_query = mysqli_query($conn, $query) or die(mysqli_error($conn));
    $products = mysqli_fetch_assoc($run_query);
}
// else{
//     header('location:product.php');
// }
  
$query = "SELECT * FROM category";
$run_query = mysqli_query($conn, $query) or die(mysqli_error($conn));
$categories = mysqli_fetch_all($run_query, MYSQLI_ASSOC);
 

// edit product
if (isset($_POST['edit'])) {
    $id = mysqli_real_escape_string($conn, $_POST['productid']);
    $category = mysqli_real_escape_string($conn, $_POST['category']);
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $price = mysqli_real_escape_string($conn, $_POST['price']); 
    $query = "UPDATE products set  
                    category_id='$category',
                    name='$name',
                    description='$description',
                    price='$price' 
                where  id='$id'";
    $result = mysqli_query($conn, $query);  
    header('location:product.php');
    // print_r($_POST);
}


?>



<section class="section">


    <div class="box">
        <div class="box-header"> 
            <h3 class="tablename">Products</h3>

        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <form action="editproduct.php" method="POST">
                <form action="product.php" method="POST" class="form">
                    <label for="Category">Category</label>
                    <select id="category" name="category" class="form-control"   >
                        <?php foreach ($categories as $category) : ?>
                            <option value="<?php echo $category['id'] ; ?>"><?php echo $category['category_name'] ?></option>
                        <?php endforeach ?>
                    </select>
                    <input type="text" name="productid" value="<?php echo $products['id'] ?>" hidden>
                    <label for="Name">Name</label>
                    <input type="text" id="Name" name="name" class="form-control" value="<?php echo $products['name'] ?>">

                    <label for="Description">Description</label>
                    <input type="text" id="Description" name="description" class="form-control"  value="<?php echo $products['description'] ?>">

                    <label for="Price">Price</label>
                    <input type="text" id="Price" name="price" class="form-control"   value="<?php echo $products['price'] ?>" >
<!-- 
                    <label for="Available">Available</label>
                    <input type="number" id="Available" name="available" class="form-control" value="<\?php echo $products['available'] ?>" > -->

                    <!-- <label for="upimg" class=" form-control custom-file-upload"   >Upload Picture</label>
                    <input type="file" id="upimg" name="img" class="form-control" onchange="document.getElementById('preview').src = window.URL.createObjectURL(this.files[0])"> -->
                    <img id="preview" class="thumbnailL"  src="uploads/<?php echo  $products['img'] ?> " />
                    <input type="submit" class="btn" name="edit" value="Save">
                </form>


            </form>
        </div>
    </div>

</section>

<?php include 'includes/foot.php'; ?>