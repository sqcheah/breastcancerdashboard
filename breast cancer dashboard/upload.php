<?php

//upload.php
$folderName = 'assets';
if (isset($_FILES['upload']['name'])) {
 $file = $_FILES['upload']['tmp_name'];
 $file_name = $_FILES['upload']['name'];
 $file_name_array = explode(".", $file_name);
 $extension = end($file_name_array);
 $new_image_name = rand() . '.' . $extension;
 chmod($folderName, 0777);
 $allowed_extension = array("jpg", "gif", "png");
 if (in_array($extension, $allowed_extension)) {
  move_uploaded_file($file, $folderName . '/' . $new_image_name);
  $function_number = $_GET['CKEditorFuncNum'];
  $url = $folderName . '/' . $new_image_name;
  $message = '';
  echo "<script type='text/javascript'>window.parent.CKEDITOR.tools.callFunction($function_number, '$url', '$message');</script>";
 }
}
//https://github.com/ckeditor/ckeditor4/issues/1894
//https://www.webslesson.info/2019/01/uploading-image-in-ckeditor-with-php.html