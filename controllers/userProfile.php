<?php
class userProfile extends LoginController
{
        public static function doSomething() {
require_once('./classes/DB.php');
require_once('./classes/login.php');

$username = DB::query("SELECT username FROM users WHERE id=:id", array(':id'=>Login::isLoggedIn()));
$currentuser = DB::query("SELECT id FROM users WHERE id=:id", array(':id'=>Login::isLoggedIn()));
if (Login::isLoggedIn()) {
        echo 'Logged In as ' . $username[0]['username'] . "!";
       
} else {
        echo 'Not logged in';
}
 echo '<br/>';

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
}}}
?>

