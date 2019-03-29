<?php

Route::set('index.php', function(){
  Index::CreateView('views/index');

});

Route::set('register', function(){
  Register::CreateView('views/register');
  Register::doSomething();
});

Route::set('login', function(){
  LoginController::CreateView('views/login');
  });

?>