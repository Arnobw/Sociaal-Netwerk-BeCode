<?php
include('./modal/connect.php');
include('./controllers/logincontrol.php');

$username = DB::query("SELECT username FROM users WHERE id=:id", array(':id'=>Login::isLoggedIn()));
$currentuser = DB::query("SELECT id FROM users WHERE id=:id", array(':id'=>Login::isLoggedIn()));
if (Login::isLoggedIn()) {
        echo 'Logged In as ' . $username[0]['username'] . "!";
       
} else {
        echo 'Not logged in';
}
 echo '<br/>';
$username = "";
$isFollowing = False;
if (isset($_GET['username'])) {
        if (DB::query('SELECT username FROM users WHERE username=:username', array(':username'=>$_GET['username']))) {
                $username = DB::query('SELECT username FROM users WHERE username=:username', array(':username'=>$_GET['username']))[0]['username'];
                $age = DB::query('SELECT age FROM users WHERE username=:username', array(':username'=>$_GET['username']))[0]['age'];
                $about = DB::query('SELECT about FROM users WHERE username=:username', array(':username'=>$_GET['username']))[0]['about'];
                $colour = DB::query('SELECT colour FROM users WHERE username=:username', array(':username'=>$_GET['username']))[0]['colour'];
                $topping = DB::query('SELECT topping FROM users WHERE username=:username', array(':username'=>$_GET['username']))[0]['topping'];
           
                $userid = DB::query('SELECT id FROM users WHERE username=:username', array(':username'=>$_GET['username']))[0]['id'];
                $followerid = Login::isLoggedIn();
               
                            
 
                
                 if (isset($_POST['follow'])) {
                      
                     
                        if (!DB::query('SELECT follower_id FROM followers WHERE user_id=:userid', array(':userid'=>$userid))) {
                                DB::query('INSERT INTO followers VALUES (\'\', :userid, :followerid)', array(':userid'=>$userid, ':followerid'=>$followerid));
                                echo "You're now following " . $username . ".";
                        } else {
                                echo 'Already following '. $username .'!';
                        }
                }
                if (isset($_POST['unfollow'])) {
                        if ($userid != $followerid) {
                                if (DB::query('SELECT follower_id FROM followers WHERE user_id=:userid', array(':userid'=>$userid))) {
                                        DB::query('DELETE FROM followers WHERE user_id=:userid AND follower_id=:followerid', array(':userid'=>$userid, ':followerid'=>$followerid));
                                }
                                $isFollowing = False;
                                echo "You unfollowed " . $username;
                        }
                }
                if (DB::query('SELECT follower_id FROM followers WHERE user_id=:userid', array(':userid'=>$userid))) {
                        //echo 'Already following!';
                        $isFollowing = True;
                }
                
        } else {
                die('User not found!');
        }
        if (isset($_POST['postbody'])) {
                $postbody = $_POST['postbody'];
                DB::query('INSERT INTO posts VALUES ("", :postbody, NOW(), :userid)', array(':postbody'=>$postbody, ':userid'=>$currentuser[0]['id']));
}
        $dbposts = DB::query('SELECT * FROM posts');
      
   
        $posts = "";
        foreach($dbposts as $p) {
                $posts .= htmlspecialchars($p['body']. " " .$p['user_id'])."
                <form action='profile.php?username=$username"."' method='post'>
                        <input type='submit' name='like' value='Like'>
                </form>
                <hr /></br />
                ";
        }
}
?>


<!DOCTYPE html>
<html>
<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?php echo $username ?></title>
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

<p><span id="bold">Age :</span> <br/> <?php echo $age ?></p>
<p> <span id="bold">About <?php echo $username; ?>: </span> <br/> 
<?php echo $about; ?>
</p>

<p><span id="bold">Their favourite colour is </span> <br/>  <?php echo $colour?>. </p>
<p> <span id="bold"><?php echo $username ?>'s preferred pizza topping is </span> <br /> <?php echo $topping; ?>!</p>
<form action="profile.php?username=<?php echo $username; ?>" method="post">
        <?php
        if ($userid != $followerid) {
                if ($isFollowing) {
                        echo '<input type="submit" name="unfollow" value="Unfollow">';
                } else {
                        echo '<input type="submit" name="follow" value="Follow">';
                }
        }
        ?>
</form>

</div>

</article>
<form action="profile.php?username=<?php echo $username; ?>" method="post">
        <textarea name="postbody" rows="8" cols="80"></textarea>
        <input type="submit" name="post" value="Post">
</form>

 <div class="posts">
        <?php echo $posts; ?>


</div> 
</div>


</body>
</html> 