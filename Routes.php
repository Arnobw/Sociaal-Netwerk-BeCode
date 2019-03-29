<?php

Route::set('index.php', function(){
  Index::CreateView('views/index');

});

Route::set('views/register.php', function(){
  Register::CreateView('register');
});

Route::set('views/login.php', function(){
  Login::CreateView('login');
});

?>