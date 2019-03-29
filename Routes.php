<?php

Route::set('views/index.php', function(){
  Index::CreateView('index');

});

Route::set('views/register.php', function(){
  Register::CreateView('register');
});

Route::set('views/login.php', function(){
  Login::CreateView('login');
});

?>