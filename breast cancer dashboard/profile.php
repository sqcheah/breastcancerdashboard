<?php
//database connection, timeout counter and navbar
include("shared/connect.php");
include("shared/layout/header.php");
function getUser($conn, $email)
{
    return query($conn, "SELECT * FROM `user` WHERE `email`='$email'");
}
$result = getUser($conn, $_SESSION['curUser']['email']);
$row = mysqli_fetch_assoc($result);
?>


<div class="container py-5">
 <h2 class="text-center py-2">Profile</h2>
 <div class="card">
  <div class="card-body">
   <?php


            echo '
            <div class="my-5">
            <img id="output" src="./assets/avatar_placeholder.jpg" class="img-fluid mx-auto d-block border border-info" style="width:auto;height:10rem;"/>
            </div>

                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label for="Name">Name: </label>
                    </div>
                    <div class="col-md-8 mb-3">
                        <input type="text" class="form-control" name="name" id="name" value="' . $row['name'] . '" disabled>
                    </div>
                </div>


            <div class="row">
            <div class="col-md-4 mb-3">
                <label for="email">Email: </label>
            </div>
            <div class="col-md-8 mb-3">
                <input type="text" class="form-control" name="email" id="class" value="' . $row['email'] . '" disabled>
            </div>
        </div>
                    <div class="row">
            <div class="col-md-4 mb-3">
                <label for="Contact">Contact: </label>
            </div>
            <div class="col-md-8 mb-3">
                <input type="text" class="form-control" name="contact" id="contact" value="' . $row['contact'] . '" disabled>
            </div>
        </div>
        
        ';
            if ($_SESSION['curUser']['accType'] == 'user') {
                echo '
                    <div class="row">
            <div class="col-md-4 mb-3">
                <label for="Subscription Start Date">Subscription Start Date: </label>
            </div>
            <div class="col-md-8 mb-3">
                <input type="text" class="form-control" name="subscription_start_date" id="subscription_start_date" value="' . date('Y-m-d', strtotime($row['subscription_start_date'])) . '" disabled>
            </div>
        </div>
             <div class="row">
            <div class="col-md-4 mb-3">
                <label for="Subscription End Date">Subscription End Date: </label>
            </div>
            <div class="col-md-8 mb-3">
                <input type="text" class="form-control" name="subscription_start_date" id="subscription_end_date" value="' . date('Y-m-d', strtotime($row['subscription_end_date'])) . '" disabled>
            </div>
        </div>
        ';
            }

            ?>


   <div class="text-center">
    <a class="btn btn-primary" href="changePassword.php">Change Password</a>
   </div>

  </div>
 </div>
</div>

<?php
include("shared/layout/script.php");
include("shared/layout/footer.php");

?>