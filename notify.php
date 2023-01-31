<?php 
    require_once 'bootstrap.php';
    if(isUserLoggedIn()){
        
    }else{
        headers('Location: ./');
        exit;
    }
?>