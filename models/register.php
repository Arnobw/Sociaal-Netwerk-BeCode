<?php
require_once('../classes/DB.php');

if (isset($_POST['createaccount'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];
  $email = $_POST['email'];
  $age = $_POST['age'];
  $about = $_POST['about'];
  $colour = $_POST['colour'];
  $topping = $_POST['topping'];
  if (!DB::query('SELECT username FROM users WHERE username=:username', array(':username'=>$username))) {
          if (strlen($username) >= 3 && strlen($username) <= 32) {
                  if (preg_match('/[a-zA-Z0-9_]+/', $username)) {
                          if (strlen($password) >= 6 && strlen($password) <= 60) {
                          if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                          if (!DB::query('SELECT email FROM users WHERE email=:email', array(':email'=>$email))) {
                                  DB::query('INSERT INTO users VALUES (\'\', :username, :password, :email, :age, :about, :colour, :topping)', array(':username'=>$username, ':password'=>password_hash($password, PASSWORD_BCRYPT), ':email'=>$email, ':age'=>$age, ':about'=>$about, ':colour'=>$colour, ':topping'=>$topping));
                                  echo "Success!";
                          } else {
                                  echo 'Email in use!';
                          }
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
          echo 'User already exists!';
  }
}
?>