<?php 
include('../modal/connect.php');
include('../controllers/logincontrol.php');
if(!login::isLoggedIn()){
die("not logged in");
}
if(isset($_POST['confirm'])){
    if(isset($_POST['alldevices'])){
        DB::query('DELETE FROM login_tokens WHERE user_id=:userid', array(':userid'=>login::isLoggedIn()));
    }else{
        if(isset($_COOKIE['SNID'])){
        DB::query('DELETE FROM login_tokens WHERE token=:token', array(':token'=>sha1($_COOKIE['SNID'])));
        }
        setcookie('SNID', '1', time()-3600);
        setcookie('SNID_', '1', time()-3600);
    }
}
?>
<h1>Logout of your account</h1>
<p>ARE YOU SURE YOU'D LIKE TO LOGOUT?</p>
<form action="logout.php" method="post">
<input type="checkbox" name="alldevices" value=""/>Logout of all devices?<br />
<input type="submit" name="confirm" value="confirm"/>
</form>