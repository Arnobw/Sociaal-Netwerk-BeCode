<?php
include('./modal/connect.php');
include('./controllers/logincontrol.php');

$username = DB::query("SELECT username FROM users WHERE id=:id", array(':id'=>Login::isLoggedIn()));
if (Login::isLoggedIn()) {
        echo 'Logged In as ' . $username[0]['username'] . "!";
       
} else {
        echo 'Not logged in';
}
 echo '<br/>';
?>



<!DOCTYPE html>
<html>
<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Page Title</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" media="screen" href="main.css">
        <script src="main.js"></script>
</head>
<body>
        <div id="container">
                <div id="info">
                        <h1>Newest users:</h1>
                        <ul>
                                <?php
                                $query = DB::query("SELECT username FROM users ORDER BY id DESC");
                                $length =count($query);
                               for($i = 0; $i < $length && $i<10; $i++){
                                       echo "<li>";
                                 echo ($query[$i]['username']);
                                echo "</li>";
                               }
                                ?>
                        </ul>
                </div>
        </div>
</body>
</html>