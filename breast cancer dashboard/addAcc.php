<?php
//database connection, timeout counter and navbar
include_once("shared/connect.php");
include_once("shared/sendMail.php");
$message = "";

function insertAcc($conn)
{
  $name = mysqli_real_escape_string($conn, $_POST['name']);
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $password = mysqli_real_escape_string($conn, $_POST['password']);
  $password = password_hash($password, PASSWORD_DEFAULT);
  $accType = mysqli_real_escape_string($conn, $_POST['accType']);
  $contact = $_POST['contact'];

  $result = query($conn, "SELECT * FROM `user` WHERE `email`='$email' LIMIT 0,1");
  if (mysqli_num_rows($result) != 0) {
    $GLOBALS['message'] = "<div class='alert alert-danger'>
   There's an existing account with this email.
</div>";
    return;
  }


  if ($accType == 'user') {
    $subscription_start_date = $_POST['subscription_start_date'];
    $subscription_end_date = $_POST['subscription_end_date'];

    query($conn, "INSERT INTO user (`name`,`email`,`contact`,`password`,`accType`,`subscription_start_date`,`subscription_end_date`) VALUES('$name','$email','$contact','$password','$accType','$subscription_start_date','$subscription_end_date')");

    sendMail($email, $name, "Account Info", "<p>Thank you for joining RSS. Your password is $password. Your subscription date is from $subscription_start_date to $subscription_end_date</p>", "http://" . $_SERVER['HTTP_HOST'] . substr($_SERVER['REQUEST_URI'], 0, strrpos($_SERVER['REQUEST_URI'], "/")) . "/login.php", "Login Here");
  } else if ($accType == 'admin') {
    query($conn, "INSERT INTO user (`name`,`email`,`contact`,`password`,`accType`) VALUES('$name','$email','$contact','$password','$accType')");
  }
  $GLOBALS['message']  = "<div class='alert alert-success'>
   Successfully registered
</div>";
  //$last_id = mysqli_insert_id($conn);
  // header("Location:driverDetails.php?id=$last_id");
  //exit();
}
if (isset($_POST['save'])) {
  insertAcc($conn);
}
include("shared/layout/header.php");
?>


<div class="container py-5">
  <h2 class="text-center py-2">Insert New Acc </h2>
  <div class="card">
    <div class="card-body">
      <?php


      echo ' <form action="' . basename($_SERVER['PHP_SELF']) . '" method="POST" class="needs-validation" novalidate>
     <div class="row">
 <div class="col-md-4 mb-3">
  <label for="Name">Name: </label>
 </div>
 <div class="col-md-8 mb-3">
  <input type="text" class="form-control" name="name" id="name" placeholder="Enter name" required>
  <div class="invalid-feedback">
   Field is required
  </div>
 </div>
</div>

 <div class="row">
     <div class="col-md-4 mb-3 ">
      <label for="Contact">Contact</label>
     </div>
     <div class="col-md-8 mb-3">
      <input type="text" class="form-control" pattern="^[0-9]*$" name="contact" id="contact" placeholder="Enter contact"
       required>
      <div class="invalid-feedback">
       Invalid phone number
      </div>
     </div>
    </div>

<div class="row">
 <div class="col-md-4 mb-3">
  <label for="Email">Email: </label>
 </div>
 <div class="col-md-8 mb-3">
  <input type="email" class="form-control" name="email" id="email" placeholder="Enter email" required>
  <div class="invalid-feedback">
   Field is required
  </div>
 </div>
</div>

<div class="row">
 <div class="col-md-4 mb-3">
  <label for="Password">Password: </label>
 </div>
 <div class="col-md-8 mb-3">
  <div class="input-group mb-3">

   <input type="text" class="form-control" placeholder="" name="password" id="password"
    aria-describedby="btnGeneratePassword" required>
   <button class="btn btn-outline-secondary " type="button" id="btnGeneratePassword">Generate</button>
   <div class="invalid-feedback">
    Field is required
   </div>
  </div>

 </div>
</div>

    <div class="row">
     <div class="col-md-4 mb-3 ">
      <label for="Account Type">Account Type</label>
     </div>
     <div class="col-md-8 mb-3">
      <select class="form-select" id="accType" name="accType">
       <option value="admin">Admin</option>
       <option value="user" selected>User</option>
      </select>
      <div class="invalid-feedback">
       Invalid account type
      </div>
     </div>
    </div>

<div id="userField">
<div class="row">
 <div class="col-md-4 mb-3">
  <label for="Subscription Start Date">Subscription Start Date: </label>
 </div>
 <div class="col-md-8 mb-3">
  <input type="date" class="form-control" name="subscription_start_date" id="subscription_start_date"
   placeholder="Enter date" required>
 
 </div>
  <div class="invalid-feedback">
   Field is required
  </div>
</div>

<div class="row">
 <div class="col-md-4 mb-3 ">
  <label for="Subscription End Date">Subscription End Date: </label>
 </div>
 <div class="col-md-8 mb-3">
  <input type="date" class="form-control" name="subscription_end_date" id="subscription_end_date"
   placeholder="Enter name" required>
  <div class="invalid-feedback">
   Field is required
  </div>
 </div>
</div>
</div>

' . $message . '
        ' ?>
      <div class="text-center">
        <button class="btn btn-primary" type="submit" name="save" value="save">Add</button>
        <a class="btn btn-primary" href="listUser.php">Back</a>
      </div>
      </form>


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
  $(document).ready(function() {
    $("#btnGeneratePassword").on('click', function() {
      var chars = "0123456789abcdefghijklmnopqrstuvwxyz!@#$%^&*()ABCDEFGHIJKLMNOPQRSTUVWXYZ";
      var passwordLength = 12;
      var password = "";
      for (var i = 0; i <= passwordLength; i++) {
        var randomNumber = Math.floor(Math.random() * chars.length);
        password += chars.substring(randomNumber, randomNumber + 1);
      }
      $('input[name="password"]').val(password);
    })



    $("#accType").change(function() {
      if ($(this).val() == "user") {

        $('#userField').show();
        $("#subscription_end_date").attr("required", '');
        $('#subscription_end_date').attr('data-error', 'This field is required.');
        $("#subscription_start_date").attr("required", '');
        $('#subscription_start_date').attr('data-error', 'This field is required.');
      } else {
        $('#userField').hide();
        $("#subscription_end_date").removeAttr("required");
        $('#subscription_end_date').removeAttr('data-error');
        $("#subscription_start_date").removeAttr("required");
        $('#subscription_start_date').removeAttr('data-error');

      }
    })
  });
</script>
<br><br>
<?php
include("shared/layout/footer.php");

?>