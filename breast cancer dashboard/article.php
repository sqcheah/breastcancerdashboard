<?php
include("shared/connect.php");



if (isset($_GET) && !empty($_GET)) {
 $result = getArticle($conn, $_GET['id']);
 $row = mysqli_fetch_assoc($result);
} else {
 if ($_SESSION['curUser']['accType'] == 'admin') {
  header("Location:listArticle.php");
 } else {
  header("Location:index.php");
 }
}

function getArticle($conn, $id)
{
 return query($conn, "SELECT * FROM articles WHERE id='$id'");
}

include("shared/layout/header.php");
?>
<div class="container py-3">
 <?php
 echo '<h1 class="text-center">' . $row['title'] . '</h1>
  <hr/>
 <br/>
 ' . htmlspecialchars_decode($row['content']) . '
 <br/>
 <hr/>
<p> Created At: ' . $row['timestamp'] . '</p>
';
 ?>
</div>
<?php
include("shared/layout/script.php");
include("shared/layout/footer.php");