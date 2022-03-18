<?php
//connect to database
//https: //websitebeaver.com/prepared-statements-in-php-mysqli-to-prevent-sql-injection
session_start();
date_default_timezone_set("Asia/Kuala_Lumpur");
//$conn = new mysqli("sql202.epizy.com", "epiz_27015830", "CjDbokV7Xqq2X", "epiz_27015830_busbooking");
try {
    $conn = new mysqli("localhost", "root", "", "breastcancerdb");

    if (mysqli_connect_error()) {
        exit('Error connecting to database');
    }
} catch (Exception $e) {
    echo $e->getMessage();
}
$conn->set_charset("utf8mb4");
function query($conn, $query)
{
    return mysqli_query($conn, $query);
}
include("shared/userSession.php");