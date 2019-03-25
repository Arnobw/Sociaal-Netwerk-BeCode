<?php
include('./classes/DB.php');
include('./classes/Login.php');

$username = "";

if (isset($_GET['username'])) {
        if (DB::query('SELECT username FROM users WHERE username=:username', array(':username'=>$_GET['username']))) {

                $username = DB::query('SELECT username FROM users WHERE username=:username', array(':username'=>$_GET['username']))[0]['username'];
                $age = DB::query('SELECT age FROM users WHERE age=:age', array(':age'=>$_GET['age']))[0]['age'];
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
<h1><?php echo $username; ?>'s Profile</h1>

<article>

<h2> About <?php echo $username; ?>:</h2>
<p>Age : <?php echo $age ?></p>

</article>
<form action="profile.php?username=<?php echo $username; ?>" method="post">
        <input type="submit" name="follow" value="Follow">
</form>
