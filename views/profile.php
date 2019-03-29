
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