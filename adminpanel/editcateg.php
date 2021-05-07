<?php include 'includes/head.php';
require '../connect.php';
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM category where id= $id";
    $run_query = mysqli_query($conn, $query) or die(mysqli_error($conn));
    $category = mysqli_fetch_assoc($run_query);
}

if (isset($_POST["submit"])) {
    $name = $_POST['name']; 
    $id = $_POST['id']; 
    $query = "UPDATE category set 
     category_name='$name' 
     where  id='$id'";
       $run_query = mysqli_query($conn, $query);
    header('location:category.php');
} 

?>

<section class="section">

    <div class="box">
        <div class="box-header"> 
            <h3 class="tablename">Category</h3>

        </div>
        <div class="box-body">

            <form action="editcateg.php" class="form" method="post" enctype="multipart/form-data">
                <label for="Category">Category</label>
                <input type="hidden" name="id" value="<?php echo $category['id']  ?>">
                <input type="text" name="name" id="Category" class="form-control" value="<?php echo $category['category_name']  ?>">
                <!-- <label for="upimg" class=" form-control custom-file-upload">Upload Picture</label> -->
                <!-- <input type="file" id="upimg" name="fileToUpload"  class="form-control" onchange="document.getElementById('preview').src = window.URL.createObjectURL(this.files[0])"> -->
                <img id="preview" src="uploads/<?php echo $category['category_img'] ?>" class="thumbnailL" />
                <input type="submit" value="Update" class="btn" name="submit">
            </form>

        </div>
    </div>

</section>
<?php include 'includes/foot.php'; ?>