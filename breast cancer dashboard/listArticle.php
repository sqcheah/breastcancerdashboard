<?php
include("shared/connect.php");
include("shared/layout/header.php");
function getArticles($conn)
{
 return query($conn, "SELECT * FROM articles");
}
?>
<div class="container my-5 min-vh-100">
 <div class="row">
  <div class="col-md">
   <h2> Article List</h2>
  </div>
  <div class="col-md text-center">
   <a class="btn btn-primary" href="addArticle.php">Add Article</a>
  </div>
 </div>

 <hr style="border-top:5px solid rgba(0,0,0,.1)">



 <?php

 $result = getArticles($conn);
 if (mysqli_num_rows($result) > 0) {


  echo '<div class="container-fluid">
 <div class="container pt-5">
  <div class="table-responsive">
   <table class="table" id="example">
    <thead>
     <tr>
      <th>ID</th>
      <th>Title</th>
      <th>Created At</th>
      <th>Status</th>
      <th></th>
     </tr>
    </thead>
    <tbody>
    ';
  while ($item = mysqli_fetch_assoc($result)) {
   echo '
      <tr>
    <td>' . $item['id'] . '</td>
    <td>' . $item['title'] . '</td>
    <td>' . $item['timestamp'] . '</td>
    <td>' . $item['status'] . '</td>
    <td><a href="updateArticle.php?id=' . $item['id'] . '" class="btn btn-primary">Update</a></td>
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