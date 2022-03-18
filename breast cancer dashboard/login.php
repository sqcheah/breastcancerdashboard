<?php
include_once("shared/connect.php");


if (isset($_COOKIE['rememberme']) && !empty($_COOKIE['rememberme'])) {
   $cookie = json_decode($_COOKIE["rememberme"]);
}

//validation
$message = "";

if (isset($_POST) && !empty($_POST)) {
   $postEmail = mysqli_real_escape_string($conn, $_POST["email"]);
   $result = getUser($conn, $postEmail);

   if (!$result || mysqli_num_rows($result) == 0) {

      $message = "<div class='alert alert-danger my-3'>
 Invalid username or password!
</div>";
   } else {
      $row = mysqli_fetch_assoc($result);
      $dbpassword = $row["password"];
      $postPassword = $_POST["password"];
      if (password_verify($postPassword, $dbpassword)) {

         if ($row['status'] != "ACTIVE") {
            $message = "<div class='alert alert-danger my-3'>
 Invalid username or password!
</div>";
         } else {
            if (!isset($_POST['rememberme'])) {
               if (isset($_COOKIE['rememberme']) && !empty($_COOKIE['rememberme'])) {
                  setcookie("rememberme", "", $time - (10 * 365 * 24 * 60 * 60));
                  // unset($_COOKIE['rememberme']);
               }
            } else {
               if (!isset($_COOKIE['rememberme'])) {
                  $expiry = time() + (10 * 365 * 24 * 60 * 60);
                  $cookie = array('email' => $postEmail, "expiry" => $expiry);
                  setcookie("rememberme", json_encode($cookie), $expiry);
               }
            }
            if ($cookie->username != $_POST['username']) {
               $expiry = time() + (10 * 365 * 24 * 60 * 60);
               $cookie = array('username' => $postEmail, "expiry" => $expiry);
               setcookie("rememberme", json_encode($cookie), $expiry);
            }
            $_SESSION["curUser"] = $row;
            $_SESSION['loggedIn_time'] = time();
            header("Location:dashboard1.php");
            exit();

            $message = "<div class='alert alert-success'>
 Successfully login! Redirecting...
</div>";
         }

         $_SESSION["curUser"] = $row;
         $_SESSION['loggedIn_time'] = time();
         header("Location:dashboard1.php");
         exit();
         $message = "<div class='alert alert-success'>Successfully login! Redirecting...</div>";
      } else {
         var_dump($_POST);
         $message = "<div class='alert alert-danger'>
 Invalid username or password!
</div>";
      }
   }
}

function getUser($conn, $postEmail)
{

   return query($conn, "SELECT * FROM user WHERE lower(email)='" . strtolower($postEmail) . "'");
}
include("shared/layout/header.php");

?>

<div class="container py-5">
 <h1 class="text-center py-2">Login</h1>
 <div class="card mx-auto">
  <div class="card-body">
   <img class="img-fluid mx-auto d-block py-5 rounded-circle" style="height:20%;width:20%;" src="assets/logo.png"
    alt="logo">
   <div class="px-5">
    <?php
            //if redirected from session expiry
            if (isset($_GET['session_expired'])) {
               echo "<div class='alert alert-danger mx-auto' >
            Session expired. Please login again!
            </div>";
            }
            ?>
    <form action='<?php echo basename($_SERVER['PHP_SELF']) ?>' method="POST" class='needs-validation' novalidate>
     <div class="row">
      <label for="Email"><b>Email</b></label>
      <input type="text" class="form-control" placeholder="Enter Email" name="email" id="email"
       value='<?php echo empty($cookie) ? '' : $cookie->email ?>' required>
      <div class="invalid-feedback">
       Please enter email
      </div>
     </div>
     <div class="row">

      <label for="psw"><b>Password</b></label>
      <input type="password" class="form-control pwd1" placeholder="Enter Password" name="password" required>
      <div class="invalid-feedback">
       Please enter password.
      </div>
     </div>
     <?php echo $message ?>

     <div>
      <!-- Remember me -->
      <div class="custom-control custom-checkbox ">
       <input type="checkbox" class="custom-control-input" id="rememberusername" name="rememberusername"
        <?php echo (empty($cookie) ? "" : "checked") ?>>
       <label class="custom-control-label" for="rememberusername">Remember username</label>
      </div>
     </div>

     <div class="text-center p-3">
      <input class="btn btn-primary mb-3" type="submit" value="Login"><br>
     </div>
     <hr />
     <div>

      <div class="text-center">
       <a href="forgotPassword.php">Forgot password?</a>
      </div>
      <!-- Forgot password 
      <div class="text-center">
       <p>New around here? <a href="register.php">Register here</a></p>
      </div>-->
     </div>
    </form>
   </div>
  </div>
 </div>
</div>
<?php
include("shared/layout/script.php");
?>
<script>
(function() {
 'use strict';
 window.addEventListener('load', function() {
  // Fetch all the forms we want to apply custom Bootstrap validation styles to
  var forms = document.getElementsByClassName('needs-validation');
  // Loop over them and prevent submission
  var validation = Array.prototype.filter.call(forms, function(form) {
   form.addEventListener('submit', function(event) {
    if (form.checkValidity() === false) {
     event.preventDefault();
     event.stopPropagation();
    }
    form.classList.add('was-validated');

   }, false);
  });
 }, false);
})();
/*
$(".reveal1").on('mousedown touchstart', function() {
 var $pwd = $(".pwd1");

 $pwd.attr('type', 'text');
 $(".reveal1").html(`<i class="fas fa-eye"></i>`);


}).on('mouseup touchend', function() {
 var $pwd = $(".pwd1");
 $pwd.attr('type', 'password');
 $(".reveal1").html(`<i class="fas fa-eye-slash"></i>`);

});*/
</script>

<?php
include("shared/layout/footer.php");
?>