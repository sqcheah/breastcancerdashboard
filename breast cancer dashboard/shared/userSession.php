<?php
//function to restrict which server pages can be accessed based on the account type

function checkFilePermission()
{
    $commonFiles = [];
    $AllowedFiles = [];
    $noRestrictFiles = ['index.php', 'login.php', 'about.php', 'logout.php', 'forgotPassword.php', 'resetPassword.php', 'connect.php', 'userSession.php'];
    if (isset($_SESSION) && !empty($_SESSION)) {
        $commonFiles = ['profile.php', 'dashboard1.php', 'dashboard2.php', 'article.php', 'import.php', 'changePassword.php'];
        switch ($_SESSION['curUser']['accType']) {
            case 'admin': {
                    $AllowedFiles = ['listUser.php', 'listArticle.php', 'updateUser.php', 'updateArticle.php', 'addAcc.php', 'addArticle.php'];
                    break;
                }
        }
    }
    return in_array(basename($_SERVER['PHP_SELF']), array_merge($commonFiles, $AllowedFiles, $noRestrictFiles));
}

//https://phppot.com/php/user-login-session-timeout-logout-in-php/
if (isset($_SESSION["curUser"]) && isset($_SESSION['loggedIn_time'])) {
    //set redirect for timeout or invalid file permission
    $session_duration = 60 * 60; //in seconds
    $timeDiff = time() - $_SESSION['loggedIn_time'];

    if ($timeDiff < $session_duration) {
        if (basename($_SERVER['PHP_SELF']) == 'login.php' || basename($_SERVER['PHP_SELF']) == 'register.php') {
            header("Location:dashboard1.php");
            exit;
        } else {
            checkFilePermission() ? '' : header("Location:dashboard1.php");
        }
    } else {
        //sleep(2);
        header("Location:logout.php?session_expired=1");
        //exit;
    }
} else {

    checkFilePermission() ? '' : header("Location:index.php");
}