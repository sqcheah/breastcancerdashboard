<?php
//database connection, timeout counter and navbar
include("shared/connect.php");
include("shared/layout/header.php");
$message = "";
function updateUser($conn)
{
    $id = $_GET['id'];
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $accType = $_POST['accType'];
    $contact = $_POST['contact'];
    if ($accType == 'user') {
        $subscription_start_date = $_POST['subscription_start_date'];
        $subscription_end_date = $_POST['subscription_end_date'];
        query($conn, "UPDATE user SET `name`='$name',`email`='$email',`contact`='$contact',`subscription_start_date`='$subscription_start_date',`subscription_end_date`='$subscription_end_date' WHERE id='$id'");
    } else if ($accType == 'admin') {
        query($conn, "UPDATE user SET `name`='$name',`email`='$email',`contact`='$contact' WHERE id='$id'");
    }
    $GLOBALS['message']  = "<div class='alert alert-success'>
   Successfully update user
</div>";
    //$last_id = mysqli_insert_id($conn);
    // header("Location:driverDetails.php?id=$last_id");
    //exit();
}
if (isset($_POST['save'])) {
    updateUser($conn);
}

function getUser($conn, $id)
{
    return query($conn, "SELECT * FROM `user` WHERE `id`='$id'");
}
if (isset($_GET) && !empty($_GET)) {
    $result = getUser($conn, $_GET['id']);
    $row = mysqli_fetch_assoc($result);
} else {
    header("Location:listUser.php");
}

?>


<div class="container py-5">
 <h2 class="text-center py-2">Update User</h2>
 <div class="card">
  <div class="card-body">
   <?php


            echo ' <form action="' . basename($_SERVER['PHP_SELF']) . '?id=' . $_GET['id'] . '" method="POST" class="needs-validation" novalidate>
            <input type="hidden" name="accType" value="' . $row['accType'] . '">
            <div class="row">
                    <div class="col-md-4 mb-3">
                        <label for="Name">Name: </label>
                    </div>
                    <div class="col-md-8 mb-3">
                        <input type="text" class="form-control" name="name" id="name" value="' . $row['name'] . '" >
                    </div>
                </div>


            <div class="row">
            <div class="col-md-4 mb-3">
                <label for="email">Email: </label>
            </div>
            <div class="col-md-8 mb-3">
                <input type="text" class="form-control" name="email" id="email" value="' . $row['email'] . '" >
            </div>
        </div>
                    <div class="row">
            <div class="col-md-4 mb-3">
                <label for="Contact">Contact: </label>
            </div>
            <div class="col-md-8 mb-3">
                <input type="text" class="form-control" name="contact" id="contact" value="' . $row['contact'] . '" >
            </div>
        </div>
        ';
            if ($row['accType'] == 'user') {
                echo '
                    <div class="row">
            <div class="col-md-4 mb-3">
                <label for="Subscription Start Date">Subscription Start Date: </label>
            </div>
            <div class="col-md-8 mb-3">
                <input type="text" class="form-control" name="subscription_start_date" id="subscription_start_date" value="' . date('Y-m-d', strtotime($row['subscription_start_date'])) . '" >
            </div>
        </div>
             <div class="row">
            <div class="col-md-4 mb-3">
                <label for="Subscription End Date">Subscription End Date: </label>
            </div>
            <div class="col-md-8 mb-3">
                <input type="text" class="form-control" name="subscription_end_date" id="subscription_end_date" value="' . date('Y-m-d', strtotime($row['subscription_end_date'])) . '" >
            </div>
        </div>
        ';
            }
            echo '
            ' . $message . '
         <div class="text-center">
    <button class="btn btn-primary" type="submit" name="save" value="save">Update</button>
    <a class="btn btn-primary" href="listUser.php">Back</a>
   </div>
</form>
        ' ?>



  </div>
 </div>
</div>

<?php
include("shared/layout/script.php");
include("shared/layout/footer.php");

?>