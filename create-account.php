
<?php
include('classes/DB.php');
if (isset($_POST['createaccount'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $email = $_POST['email'];
        if (!DB::query('SELECT username FROM users WHERE username=:username', array(':username'=>$username))) {
            if (strlen($username) >= 3 && strlen($username) <= 32) {
                    if (preg_match('/[a-zA-Z0-9_]+/', $username)) {
                            if (strlen($password) >= 6 && strlen($password) <= 60) {
                            if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                                    DB::query('INSERT INTO users VALUES (\'\', :username, :password, :email)', array(':username'=>$username, ':password'=>password_hash($password, PASSWORD_BCRYPT), ':email'=>$email));
                                    echo "Success!";
                            } else {
                                    echo 'Invalid email!';
                            }
                    } else {
                            echo 'Invalid password!';
                    }
                    } else {
                            echo 'Invalid username';
                    }
            } else {
                    echo 'Invalid username';
            }
    } else {
            echo 'Username already in use!';
    }
}
?>
<!doctype html>
<html lang="en">
  <head>
  <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.min.css" rel="stylesheet" id="bootstrap-css">

    <title>Register new user</title>
  </head>
  <body>
  
<form class="form-horizontal" action='' method="POST">
  <fieldset>
    <div id="legend">
      <legend class="">Register</legend>
    </div>
    <div class="control-group">
      <!-- Username -->
      <label class="control-label"  for="username">Username</label>
      <div class="controls">
        <input type="text" id="username" name="username" placeholder="" class="input-xlarge">
        <p class="help-block">Username can contain any letters or numbers, without spaces</p>
      </div>
    </div>
 
    <div class="control-group">
      <!-- E-mail -->
      <label class="control-label" for="email">E-mail</label>
      <div class="controls">
        <input type="text" id="email" name="email" placeholder="" class="input-xlarge">
        <p class="help-block">Please provide your E-mail</p>
      </div>
    </div>
 
    <div class="control-group">
      <!-- Password-->
      <label class="control-label" for="password">Password</label>
      <div class="controls">
        <input type="password" id="password" name="password" placeholder="" class="input-xlarge">
        <p class="help-block">Password should be at least 6 characters</p>
      </div>
    </div>
 
  
 
    <div class="control-group">
      <!-- Button -->
      <div class="controls">
      <button class="btn btn-success"name="createaccount">Create Account</button> 
      </div>
    </div>
  </fieldset>
</form>
<script src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
   </body>
</html>