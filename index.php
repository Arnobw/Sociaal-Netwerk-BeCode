<?php
include("modal/connect.php");
include("controllers/logincontrol.php");

if(login::isLoggedIn()){
    echo 'logged in';
    echo login::isLoggedIn();
}else{
    echo 'not logged in';
}
?>