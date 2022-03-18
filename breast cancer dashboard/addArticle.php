<?php
//database connection, timeout counter and navbar
include_once("shared/connect.php");

$message = "";
function insertArticle($conn)
{

  $title = mysqli_real_escape_string($conn, $_POST['title']);
  $content = htmlspecialchars($_POST['content']);
  query($conn, "INSERT INTO articles (`title`,`content`) VALUES('$title','$content')");
  $GLOBALS['message']  = "<div class='alert alert-success'>
   Successfully added article
</div>";
  //$last_id = mysqli_insert_id($conn);
  // header("Location:driverDetails.php?id=$last_id");
  //exit();
}
if (isset($_POST['save'])) {
  insertArticle($conn);
}
include("shared/layout/header.php");
?>


<div class="container py-5">
 <h2 class="text-center py-2">Insert New Article </h2>
 <div class="card">
  <div class="card-body">
   <?php


      echo ' <form action="' . basename($_SERVER['PHP_SELF']) . '" method="POST" class="needs-validation" novalidate>
     <div class="row">
 <div class="col-md-4 mb-3">
  <label for="Title">Title: </label>
 </div>
 <div class="col-md-8 mb-3">
  <input type="text" class="form-control" name="title" id="name" placeholder="Enter title" required>
  <div class="invalid-feedback">
   Field is required
  </div>
 </div>
</div>


<div class="row">
 <div class="col-12 mb-3 ">
  <label for="Content">Content: </label>
 </div>
 <div class="col-12 mb-3">
   <textarea rows="10" class="form-control"  name="content" id="content" placeholder="Enter content" required></textarea>
  <div class="invalid-feedback">
   Field is required
  </div>
 </div>
</div>

' . $message . '
        ' ?>
   <div class="text-center">
    <button class="btn btn-primary" type="submit" name="save" value="save">Add</button>
    <a class="btn btn-primary" href="listArticle.php">Back</a>
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
</script>
<script src="ckeditor/ckeditor.js"></script>
<script>
var roxyFileman = 'fileman/index.html';
// Replace the <textarea id="editor1"> with a CKEditor 4
// instance, using default configuration.
CKEDITOR.replace('content', {
 filebrowserUploadUrl: "upload.php",
 filebrowserUploadMethod: "form",
});
</script>
<br><br>
<?php
include("shared/layout/footer.php");

?>