<?php
include("shared/connect.php");
include("shared/layout/header.php");
function getListUser($conn)
{
  return query($conn, "SELECT * FROM user");
}
?>
<div class="container my-5 min-vh-100">
 <div class="row">
  <div class="col-md">
   <h2> User List</h2>
  </div>
  <div class="col-md text-center">
   <a class="btn btn-primary" href="addAcc.php">Add User</a>
  </div>
 </div>

 <hr style="border-top:5px solid rgba(0,0,0,.1)">



 <?php

  $result = getListUser($conn);
  if (mysqli_num_rows($result) > 0) {


    echo '<div class="container-fluid">
 <div class="container pt-5">
  <div class="table-responsive">
   <table class="table" id="example">
    <thead>
     <tr>
      <th>ID</th>
      <th>Name</th>
      <th>Email</th>
      <th>Acc Type</th>
      <th></th>
     </tr>
    </thead>
    <tbody>
    ';
    while ($item = mysqli_fetch_assoc($result)) {
      echo '
      <tr>
    <td>' . $item['id'] . '</td>
    <td>' . $item['name'] . '</td>
    <td>' . $item['email'] . '</td>
    <td>' . $item['accType'] . '</td>
    <td><a href="updateUser.php?id=' . $item['id'] . '" class="btn btn-primary">Update</a></td>
    </tr>
    ';
    }
    echo '
    </tbody>
   </table>
  </div>
 </div>';
  } else {
    echo "<div class='alert alert-light'>
    No user available.
    </div>";
  }
  ?>
</div>
<?php
include("shared/layout/script.php");
include("shared/layout/footer.php");