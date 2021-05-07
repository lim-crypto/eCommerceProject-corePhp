 <?php include 'header.php';
    require 'connect.php';
    
$errors= array(); 
    if (isset($_POST['register'])) {
        $contactnumber = mysqli_real_escape_string($conn, test_input( $_POST['contactnumber']));
        $email = mysqli_real_escape_string($conn,test_input( $_POST['email']));
        $email2 = mysqli_real_escape_string($conn,test_input( $_POST['email2']));
        $password = mysqli_real_escape_string($conn, test_input($_POST['password']));
        $password2 = mysqli_real_escape_string($conn,test_input( $_POST['password2']));
        $firstname = mysqli_real_escape_string($conn,test_input( $_POST['firstname']));
        $middlename = mysqli_real_escape_string($conn,test_input( $_POST['middlename']));
        $lastname = mysqli_real_escape_string($conn, test_input($_POST['lastname']));
        $housenumber = mysqli_real_escape_string($conn,test_input( $_POST['housenumber']));
        $street = mysqli_real_escape_string($conn,test_input( $_POST['street']));
        $brgy = mysqli_real_escape_string($conn,test_input( $_POST['brgy']));
        $city = mysqli_real_escape_string($conn, test_input($_POST['city']));
        $province = mysqli_real_escape_string($conn,test_input( $_POST['province']));
        if($password!=$password2){
            array_push($errors, "Password Do not match" );
        } 
        if( $email != $email2){
            array_push($errors, "email Do not match" );
        }
        if ($password == $password2 && $email == $email2) {
            $password = md5($password); 
            $query = "INSERT INTO users (contactnumber, email, password, firstname, middlename, lastname, house_number, street, brgy, city, province, role) 
                         VALUES ('$contactnumber', '$email', '$password', '$firstname', '$middlename', '$lastname', '$housenumber', '$street', '$brgy', '$city', '$province', 'user')";
            $result = mysqli_query($conn, $query);  
            $_SESSION["user_id"] =  mysqli_insert_id($conn);
            $_SESSION["email"] = $email;
            $_SESSION["role"] = 'user'; 
            header('location:plants.php');
        }  
    }
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
      }
    ?>
 <div class="container2">
     <div class="container">
         <form id="reg"  class="form" action="register.php" method="POST">
             <div>
                 <h3>Personal Information</h3>
                 <label for="firstname">Your Name</label><br>
                 <input type="text" class="input" name="firstname" placeholder="First name" required  value="<?php echo isset($_POST['firstname']) ? $firstname : ''; ?>"> <br>
                 <input type="text" class="input" name="middlename" placeholder="Middle name" required  value="<?php echo isset($_POST['middlename']) ? $middlename: ''; ?>">
                 <input type="text" class="input" name="lastname" placeholder="Last name" required  value="<?php echo isset($_POST['lastname']) ? $lastname: ''; ?>">
                 <br>
                 <label for="number">Contact Number</label><br>
                 <input type="number" class="input" name="contactnumber" id="number" placeholder="Contact Number" required  value="<?php echo isset($_POST['contactnumber']) ? $contactnumber: ''; ?>">
                 <br><br>
             </div>
             <div>
                 <h3>Address</h3>
                 <label for="email">Complete Address</label><br>
                 <input type="text" class="input" name="housenumber" placeholder="House number"  value="<?php echo isset($_POST['housenumber']) ? $housenumber: ''; ?>"><br>
                 <input type="text" class="input" name="street" placeholder="Street"  value="<?php echo isset($_POST['street']) ? $street: ''; ?>">
                 <input type="text" class="input" name="brgy" placeholder="Barangay" required  value="<?php echo isset($_POST['brgy']) ? $brgy: ''; ?>" >
                 <input type="text" class="input" name="city" placeholder="City" required  value="<?php echo isset($_POST['city']) ? $city: ''; ?>" >
                 <input type="text" class="input" name="province" placeholder="Province" required  value="<?php echo isset($_POST['province']) ? $province: ''; ?>" >
             </div>

             <div>
                 <h3>Register</h3>
    
                 <label for="email">Email Address</label><br>
                 <input type="email" class="input" name="email" placeholder="Enter Your Email" required  value="<?php echo isset($_POST['email']) ? $email: ''; ?>">
                 <input type="email" class="input" name="email2" placeholder="Confirm Your Email" required value="<?php echo isset($_POST['email2']) ? $email2: ''; ?>">
                 <br>
                 <label for="password">Password</label><br>
                 <input type="password" class="input" name="password" id="password" placeholder="Enter Password" required> <i class="fas fa-eye" id="togglePassword"></i><br>
                 <input type="password" class="input" name="password2" id="password2" placeholder="Confirm Password" required>
                 <i class="fas fa-eye" id="togglePassword2"></i><br>
                 <?php if (count($errors) > 0) : ?> 
                         <?php foreach ($errors as $error) : ?>
                            <h4 style="color:red;" ><?php echo $error ?></h4>  
                         <?php endforeach ?>
                 <?php endif ?>
                 <br>
                 <input type="submit" name="register" value="Register" id="login" class="btn2">
                 <p>Already have an account? <a href="login.php">Login</a> </p>
             </div>
         </form>
     </div>

 </div>
 <?php include 'footer.php'; ?>