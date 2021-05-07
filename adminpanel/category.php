<?php include 'includes/head.php';
require '../connect.php';

$query = "SELECT * FROM category";
$run_query = mysqli_query($conn, $query) or die(mysqli_error($conn));
$categories = mysqli_fetch_all($run_query, MYSQLI_ASSOC);   
 
if(isset($_POST["submit"])) {
$name = $_POST['name'];
    

$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
 
  if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
  && $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
  }  
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded."; 
  } else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
     $img= basename( $_FILES["fileToUpload"]["name"]) ;
      $query = "INSERT INTO category (category_name, category_img) VALUES ('$name', '$img'  ) ";
      $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
      header('location:category.php');
    } else {
      echo "Sorry, there was an error uploading your file.";
    }
  } 
  
}
$notifs= array();

if (isset($_GET['del'])) {
    $id = $_GET['del'];
    $delete = "DELETE  FROM category WHERE id = $id";
    $result = mysqli_query($conn, $delete);
    echo $result;
    if($result!=1){
        array_push($notifs, "can't delete category with plants");
    }else{
        header('location:category.php');
    } 
}
?>
<section class="section">
    <div class="box">
        <div class="box-header">
            <i class="fas fa-plus-circle addbutton"></i>
            <h3 class="tablename">Category</h3>
            <?php if (count($notifs) > 0) : ?> 
                         <?php foreach ($notifs as $notif) : ?>
                                <h4 style="color:red;" ><?php echo $notif ?></h4>              
                         <?php endforeach ?>
                 <?php endif ?> 
        </div>
        <div class="box-body">
            <table class="table ">

                <tbody>
                    <tr> 
                        <th>Img</th>
                        <th>Category</th>
                        <th>Action</th> 
 
                    </tr>
                    <?php foreach ($categories as $category) : ?>
                   
                        <tr> 
                            <td>      <a href="plant.php?id=<?php echo $category['id'] ?>"> <img class="thumbnails" src="uploads/<?php echo $category['category_img'] ?>" alt="">      </a> </td>
                            <td>  <a href="plant.php?id=<?php echo $category['id'] ?>">   <?php echo $category['category_name']  ?>      </a>  </td>  
                            <td> <a id="g-btn" href="editcateg.php?id=<?php echo $category['id']  ?>">Edit</a> <a  id="remove-btn" href="category.php?del=<?php echo $category['id']  ?>">Delete</a> </td>  

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
        <div class="box-body">  
            <form action="category.php" class="form"  method="post"   enctype="multipart/form-data">
                <label for="Category">Category</label>
                <input type="text" name="name" id="Category" class="form-control"> 
                <label for="upimg" class=" form-control custom-file-upload">Upload Picture</label>
                <input type="file" id="upimg" name="fileToUpload"  class="form-control" onchange="document.getElementById('preview').src = window.URL.createObjectURL(this.files[0])">
                <img id="preview" class="thumbnailL" />
                <input type="submit" value="Add Category"  class="btn" name="submit"> 
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