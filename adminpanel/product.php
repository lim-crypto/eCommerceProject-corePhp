<?php include 'includes/head.php';
require '../connect.php';
$query = "SELECT * FROM category inner join  products on  category.id = products.category_id ORDER by date desc";
$run_query = mysqli_query($conn, $query) or die(mysqli_error($conn));
$products = mysqli_fetch_all($run_query, MYSQLI_ASSOC);

$query = "SELECT * FROM category";
$run_query = mysqli_query($conn, $query) or die(mysqli_error($conn));
$categories = mysqli_fetch_all($run_query, MYSQLI_ASSOC);
if (isset($_POST["submit"])) {
}


// add product
if (isset($_POST['addproduct'])) {
    $category = mysqli_real_escape_string($conn, $_POST['category']);
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $price = mysqli_real_escape_string($conn, $_POST['price']);
    // $available = mysqli_real_escape_string($conn, $_POST['available']);
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    if (
        $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif"
    ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            $img = basename($_FILES["fileToUpload"]["name"]);
            $query = "INSERT INTO products (img, category_id,name, description, price  ) 
         VALUES ('$img',  '$category', '$name', '$description', '$price'  )";
            $result = mysqli_query($conn, $query);
            header('location:product.php');
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}


//delete product
if (isset($_GET['del'])) {
    $id = $_GET['del'];
    $delete = "DELETE  FROM products WHERE id = $id";
    $result = mysqli_query($conn, $delete);
    header('location:product.php');
}

?>

<section class="section">


    <div class="box">
        <div class="box-header">
            <i class="fas fa-plus-circle addbutton"></i>
            <h3 class="tablename">Products</h3>

        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <table class="table ">

                <tbody>
                    <tr>
                        <!-- <th>ID</th> -->
                        <th>Img</th>
                        <th>Category</th>
                        <th>Name</th>
                        <!-- <th>Description</th> -->
                        <th>Price</th>
                        <!-- <th>Available</th> -->
                        <th>date added</th>
                        <th>Action</th>

                    </tr>
                    <?php foreach ($products as $product) : ?>
                        <tr>
                            <!-- <td></?php echo isset($product['id']) ? $product['id'] : ''; ?></td> -->

                            <td>  <a href="../plantsdetails.php?id=<?php echo $product['id'] ?>"> <img class="thumbnails" src="uploads/<?php echo isset($product['img']) ? $product['img'] : ''; ?>"  >  </a> </td>
                            <td>  <?php echo isset($product['category_name']) ? $product['category_name'] : ''; ?></td>
                            <td>  <a href="../plantsdetails.php?id=<?php echo $product['id'] ?>"> <?php echo isset($product['name']) ? $product['name'] : ''; ?>  </a>   </td>
                            <!-- <td>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Impedit, neque animi. Atque minus, officiis saepe voluptas ipsum omnis vero inventore, earum blanditiis hic nulla repudiandae. Inventore ipsa tempore facere officiis est culpa maxime quae iusto, consequuntur sit quasi alias labore sed, debitis voluptatibus voluptatem ut tempora doloremque id praesentium porro voluptates animi non deleniti. Hic non perspiciatis nihil dolor unde delectus, ipsam suscipit accusamus corporis molestias placeat. Exercitationem nemo dolore commodi corporis adipisci ad consequatur sint quidem ea! Quisquam repellat expedita alias blanditiis, architecto explicabo similique necessitatibus quaerat soluta facere, eligendi nobis dicta voluptate facilis error ipsum iusto porro accusamus.</td> -->
                            <td>&#8369;<?php echo isset($product['price']) ? $product['price'] : ''; ?></td>
                            <!-- <td></?php echo isset($product['available']) ? $product['available'] : ''; ?></td> -->
                            <td><?php echo isset($product['date']) ? $product['date'] : ''; ?></td>
                            <td><a id="g-btn" href="editproduct.php?id=<?php echo $product['id'] ?>">Edit</a><a id="remove-btn" href="product.php?del=<?php echo $product['id'] ?>">Delete</a></td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>

</section>

<section class="modal">
    <div class="box modalbox">
        <div class="box-header">
            <i class="fas fa-times-circle cancelbutton"></i>
            <h3 class="tablename">Product</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <form action="product.php" method="POST" enctype="multipart/form-data" class="form">
                <label for="Category">Category</label>
                <select id="category" name="category" class="form-control">
                    <?php foreach ($categories as $category) : ?>
                        <option value="<?php echo $category['id'] ?>"><?php echo $category['category_name'] ?></option>
                    <?php endforeach ?>
                </select>
                <label for="Name">Name</label>
                <input type="text" id="Name" name="name" class="form-control">
                <label for="Description">Description</label>
                <input type="text" id="Description" name="description" class="form-control">
                <label for="Price">Price</label>
                <input type="text" id="Price" name="price" class="form-control">
                <!-- <label for="Available">Available</label>
                <input type="number" id="Available" name="available" min="1" class="form-control"> -->
                <label for="upimg" class=" form-control custom-file-upload">Upload Picture</label>
                <input type="file" id="upimg" name="fileToUpload" class="form-control" onchange="document.getElementById('preview').src = window.URL.createObjectURL(this.files[0])">
                <img id="preview" class="thumbnailL" />

                <input type="submit" class="btn" name="addproduct" value="Add product">

            </form>


        </div>
    </div>
</section>
<script>

const addbutton= document.querySelector('.addbutton');
const cancelbutton= document.querySelector('.cancelbutton');
const modal= document.querySelector('.modal');
 
 
addbutton.onclick = function() {
    modal.style.display = "block";
  }
   
cancelbutton.onclick = function() {
    modal.style.display = "none";
  }
  
window.onclick = function(event) {
    if (event.target == modal) {
      modal.style.display = "none";
    } 
  }

</script>
<?php include 'includes/foot.php'; ?>