<?php
//database connection, timeout counter and navbar
include_once("shared/connect.php");
$message = "";

function updateAcc($conn)
{
  $email = $_SESSION['curUser']['email'];
  $password = mysqli_real_escape_string($conn, $_POST['password']);
  $password = password_hash($password, PASSWORD_DEFAULT);

  $result = query($conn, "UPDATE `user` SET `password`='$password' WHERE `email`='$email'");
  $GLOBALS['message']  = "<div class='alert alert-success'>
   Successfully change password
</div>";
  //$last_id = mysqli_insert_id($conn);
  // header("Location:driverDetails.php?id=$last_id");
  //exit();
}
if (isset($_POST['submit'])) {
  updateAcc($conn);
}
include("shared/layout/header.php");
?>

<div class="container py-5 my-5">

 <div class="card bodyContainer">

  <div class="card-body">
   <h2 class="text-center py-2">Change Password</h2>
   <hr />
   <form action="<?php echo basename($_SERVER['PHP_SELF']) ?>" method="POST" novalidate class="needs-validation"
    oninput="confirmPassword.setCustomValidity(confirmPassword.value == password.value ? '' : 'Password does not match' )">

    <div class="row">
     <div class="col-md-4 mb-3">
      <label for="Password">Password: </label>
     </div>
     <div class="col-md-8 mb-3">
      <input type="password" class="form-control" name="password" id="password" placeholder="Enter password"
       pattern="^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9]).{8,}$" required>
      <div class="invalid-feedback">
       Password must have minimum eight characters, at least one upper case English letter, one lower case English
       letter and one number
      </div>
     </div>
    </div>

    <div class="row">
     <div class="col-md-4 mb-3">
      <label for="Confirm Password">Confirm Password: </label>
     </div>
     <div class="col-md-8 mb-3">
      <input type="password" class="form-control" name="confirmPassword" id="confirmPassword"
       pattern="^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9]).{8,}$" placeholder="Enter confirm password" required>
      <div class="invalid-feedback">
       Password does not match
      </div>

     </div>
    </div>


    <?php echo $message ?>

    <div class="text-center">
     <button class="btn btn-primary" type="submit" name="submit" value="submit">Change Password</button>
    </div>
   </form>
   <br />
   <br />
   <br />

  </div>
 </div>
</div>
<?php
include("shared/layout/script.php");
?>
<script>
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

 $("#password, #confirmPassword ").keyup(function() {
  if ($("#confirmPassword").val() != $('#password').val()) {
   $("#confirmPassword").get(0).setCustomValidity('Password must be matched');
  } else {
   $("#confirmPassword").get(0).setCustomValidity('');
  }
 });


}, false);
</script>
<br><br>
<?php
include("shared/layout/footer.php");

?>