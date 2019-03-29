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

  Route::set('logout', function(){
    LoginController::CreateView('views/logout');
    });

  Route::set('bye', function(){
    LoginController::CreateView('views/bye');
    });
    Route::set('profile', function(){
      userProfile::CreateView('views/profile');
      });
  ?>

