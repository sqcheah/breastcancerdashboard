<?php
function getArticlesMenu($conn)
{
     return query($conn, "SELECT * FROM articles WHERE `status`='show'");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
 <meta charset="UTF-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <link href="./shared/css/bootstrap.min.css" rel="stylesheet">
 <link href="./shared/Datatables/dataTables.min.css" rel="stylesheet">
 <script src="./shared/script/jquery-3.5.1.js"></script>
 <!--
 <link href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css" rel="stylesheet">
-->
 <title>RSS Breast Cancer Dashboard</title>
 <style>
 .navbar.navbar-inverse {
  border: none;
 }

 .navbar .navbar-brand {
  padding-top: 0px;
 }

 .navbar .navbar-brand img {
  height: 50px;
 }

 .navbar-mainbg {
  background-color: #FDA9FE;
 }
 </style>
</head>

<body>


 <nav class="navbar navbar-expand-md navbar-dark navbar-mainbg" aria-label="Fourth navbar example">
  <div class="container-fluid">
   <a class="navbar-brand" href="#">
    <img src="./assets/logo.png" class="rounded-circle">
   </a>
   <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample04"
    aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
   </button>

   <div class="collapse navbar-collapse" id="navbarsExample04">
    <ul class="navbar-nav me-auto mb-2 mb-md-0">
     <li class="nav-item">
      <a class="nav-link active" aria-current="page" href="index.php">Home</a>
     </li>
     <?php
                         if (isset($_SESSION['curUser']) && !empty($_SESSION['curUser'])) {
                              echo '     <li class="nav-item">
      <a class="nav-link active" aria-current="page" href="dashboard1.php">Mamogram Data</a>
     </li>
        <li class="nav-item">
      <a class="nav-link active" aria-current="page" href="dashboard2.php">San Diego Data</a>
     </li>';


                              $articleResult = getArticlesMenu($conn);
                              if (mysqli_num_rows($articleResult) > 0) {
                                   echo '
     <li class="nav-item dropdown">
      <a class="nav-link active dropdown-toggle" href="#" id="dropdownArticle" data-bs-toggle="dropdown" aria-expanded="false">Articles</a>
      <ul class="dropdown-menu dropdown-menu-end " aria-labelledby="dropdownArticle">
      ';

                                   while ($articleRow = mysqli_fetch_assoc($articleResult)) {
                                        echo '  <li><a class="dropdown-item" href="article.php?id=' . $articleRow['id'] . '">' . $articleRow['title'] . '</a></li>';
                                   }

                                   echo '   
                               </ul>
                              </li>';
                              }

                              if ($_SESSION['curUser']['accType'] == 'admin') {
                                   echo '     <li class="nav-item">
      <a class="nav-link active" aria-current="page" href="listUser.php">User List</a>
     </li>
        <li class="nav-item">
      <a class="nav-link active" aria-current="page" href="listArticle.php">Article List</a>
     </li>';
                              }
                         }
                         ?>
     <li class="nav-item">
      <a class="nav-link active" aria-current="page" href="about.php">About</a>
     </li>
    </ul>
    <ul class="navbar-nav mb-2 mb-md-0">
     <?php
                         if (isset($_SESSION['curUser']) && !empty($_SESSION['curUser'])) {


                              echo '
     <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-bs-toggle="dropdown" aria-expanded="false"> <img
        src="./assets/avatar_placeholder.jpg" alt="mdo" width="32" height="32" class="rounded-circle"></a>
      <ul class="dropdown-menu dropdown-menu-end " aria-labelledby="dropdown04">
       <li><a class="dropdown-item" href="profile.php">Profile</a></li>
       <li class="dropdown-divider"></li>
       <li><a class="dropdown-item" href="logout.php">Logout</a></li>
      </ul>
     </li>
     ';
                         } else {
                              echo '
       <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="login.php">Login</a>
          </li>
     ';
                         }
                         ?>
    </ul>
   </div>
  </div>
 </nav>