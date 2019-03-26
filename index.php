<?php
include('./modal/connect.php');
include('./controllers/logincontrol.php');

if (Login::isLoggedIn()) {
        echo 'Logged In';
        echo Login::isLoggedIn();
} else {
        echo 'Not logged in';
}

?>
