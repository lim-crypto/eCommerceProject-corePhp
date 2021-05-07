<?php
include 'header.php';

require 'connect.php';

    
$errors= array();
if (isset($_POST['login'])) {
    $email = mysqli_real_escape_string($conn,test_input( $_POST['email']));
    $password = mysqli_real_escape_string($conn,test_input( $_POST['password']));
    $password = md5($password); 
    $query  = "SELECT * from users where email='$email' and password='$password'  ";
    $run_query = mysqli_query($conn, $query) or die(mysqli_error($conn));
    $users = mysqli_fetch_assoc($run_query);
    if (mysqli_num_rows($run_query) > 0) {   
            $_SESSION["user_id"] = $users['id'];
            $_SESSION["email"] = $email;
            $_SESSION["role"] = $users['role']; 
            if(isset($_POST['r'])){
                $user = ['user_id' => $users['id'], 'email' => $email , 'password'=> $password, 'role'=>$users['role']]; 
                $user = serialize($user); 
                setcookie('user', $user, time() + (86400 * 30)); //30days 
            }  
        if ($users['role'] == 'admin') {
            echo ' admin login success';
            header('location:adminpanel/dashboard.php');
        } else {
            header('location:index.php');
        }
    
    } else {
        array_push($errors, "Wrong Email or Password" );
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
        <form id="log" class="form" action="login.php" method="POST">
            <h3>Log In</h3>
            <label for="email">Email Address</label><br>
            <input type="text" class="input" name="email"  value="<?php echo isset($_POST['email']) ? $email: ''; ?>" placeholder="Enter Your Email" required>

            <br>
            <label for="password">Password</label><br>
            <input type="password" class="input" name="password" id="password" placeholder="Enter Password" require> <i class="fas fa-eye" id="togglePassword"></i><br>
            <input type="checkbox" name="r" id="r" value="1">
            <label for="r">Remember Me</label>
            <!-- <i class="fas fa-eye-slash"></i> -->
            <br>
            <?php if (count($errors) > 0) : ?> 
                         <?php foreach ($errors as $error) : ?>
                                <h4 style="color:red;" ><?php echo $error ?></h4>              
                         <?php endforeach ?>
                 <?php endif ?>
            <input type="submit" name="login" value="Login" id="login" class="btn2">
            <p>Don't have an account? <a href="register.php">Sign Up</a> </p>
        </form>

        <div id="img">
            <div id="div1">
                <h1> A Day in a Garden</h1>

                <p>This website is a platform where we connect the buyers and sellers of plants within one community.
                </p>
            </div>
        </div>
    </div>
</div>
<script>
    const togglePassword = document.querySelector('#togglePassword');
    const password = document.querySelector('#password');

    togglePassword.addEventListener('click', function(e) {
        const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
        password.setAttribute('type', type);
        this.classList.toggle('fa-eye-slash');
    });
</script>
</body>

</html>