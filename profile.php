<?php
include('./modal/connect.php');
include('./controllers/logincontrol.php');

$username = "";
$age="";
if (isset($_GET['username'])) {
        if (DB::query('SELECT username FROM users WHERE username=:username', array(':username'=>$_GET['username']))) {

                $username = DB::query('SELECT username FROM users WHERE username=:username', array(':username'=>$_GET['username']))[0]['username'];
                $age = DB::query('SELECT age FROM users WHERE username=:username', array(':username'=>$_GET['username']))[0]['age'];
                $about = DB::query('SELECT about FROM users WHERE username=:username', array(':username'=>$_GET['username']))[0]['about'];
                $colour = DB::query('SELECT colour FROM users WHERE username=:username', array(':username'=>$_GET['username']))[0]['colour'];
                $topping = DB::query('SELECT topping FROM users WHERE username=:username', array(':username'=>$_GET['username']))[0]['topping'];
                if (isset($_POST['follow'])) {

                        $userid = DB::query('SELECT id FROM users WHERE username=:username', array(':username'=>$_GET['username']))[0]['id'];
                        $followerid = Login::isLoggedIn();

                        if (!DB::query('SELECT follower_id FROM followers WHERE user_id=:userid', array(':userid'=>$userid))) {
                                DB::query('INSERT INTO followers VALUES (\'\', :userid, :followerid)', array(':userid'=>$userid, ':followerid'=>$followerid));
                        } else {
                                echo 'Already following!';
                        }
                }

        } else {
                die('User not found!');
        }
}

?>


<!DOCTYPE html>
<html>

<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Page Title</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" media="screen" href="assets/styles/main.css">
        <script src="main.js"></script>
</head>

<body>
        <div id="container">
                <h1 id="profilename"><?php echo $username; ?>'s Profile</h1>

                <article id="info">

                        <div id="eendje"></div>

                        <div id="container2">

                                <p><span id="bold">Age :</span> <br /> <?php echo $age ?></p>
                                <p> <span id="bold">bout <?php echo $username; ?>: </span> <br />
                                        <?php echo $about; ?>
                                </p>

                                <p><span id="bold">Their favourite colour is </span> <br /> <?php echo $colour?>. </p>
                                <p> <span id="bold"><?php echo $username ?>'s preferred pizza topping is </span> <br />
                                        <?php echo $topping; ?>!</p>
                                <form action="profile.php?username=<?php echo $username; ?>" method="post">
                                        <input type="submit" name="follow" value="Follow">
                                </form>
                        </div>
                </article>
           
        </div>

       
     <form action="profile.php?username=<?php echo $username; ?>" method="post">
        <textarea name="postbody" rows="8" cols="80"></textarea>
        <input type="submit" name="post" value="Post">
</form>

<!-- <div class="posts">
        <?php echo $posts; ?>
</div> -->

</body>

</html>