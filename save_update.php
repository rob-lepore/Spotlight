<?php
require_once 'bootstrap.php';
if(isUserLoggedIn()){
    $user = $dbh->getUserData($_COOKIE["username"]);

    var_dump($_FILES);

    if($_POST['username'] != $user[0]["username"]){
        $data['username'] = $_POST['username'];
        registerLoggedUser($_POST['username']);
    }
    if($_POST['first_name'] != $user[0]["first_name"]){
        $data['first_name'] = $_POST['first_name'];
    }
    if($_POST['last_name'] != $user[0]["last_name"]){
        $data['last_name'] = $_POST['last_name'];
    }
    if(isset($_FILES['profile_pic'])){
        list($result, $msg) = uploadImage(UPLOAD_DIR, $_FILES['profile_pic']);
        $data['profile_pic'] = $msg;
    }
    $dbh->updateUserData($user[0]["username"], $data);

    header('Location: ' . '/Spotlight/profile.php?user=' . $_POST['username']);
}else{
    header('Location: ./');
}
?>