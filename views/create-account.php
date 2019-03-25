<?php
include('../modal/connect.php');
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
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/styles/mdb.min.css">
    <link rel="stylesheet" href="../assets/styles/style.css">
    <title>Register new user</title>
  </head>
  <body>
  <div class="container" id="register-form">
  <!-- Default form register -->
<form class="text-center border border-light p-5"action='' method="POST">

<p class="h2 mb-6">Sign up</p>

<div class="form-row mb-8">

        <!-- username -->
        <input type="text" id="username" name="username" class="form-control mb-4" placeholder="Username">
    

      

<!-- E-mail -->
<input type="email" id="email" name="email" class="form-control mb-4" placeholder="E-mail">

<!-- Password -->
<input type="password" id="password" name="password" class="form-control" placeholder="Password" aria-describedby="defaultRegisterFormPasswordHelpBlock">
<small id="defaultRegisterFormPasswordHelpBlock" class="form-text text-muted mb-4">
    At least 8 characters and 1 digit
</small>




<!-- Sign up button -->
<button class="btn btn-info my-4 btn-block" name="createaccount" type="submit">Create account</button>

<hr>

</div>
<script src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
   </body>
</html>