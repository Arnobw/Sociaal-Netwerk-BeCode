<?php
class Index extends Controller {
  public static function doSomething() {
    $query = DB::query("SELECT username FROM users ORDER BY id DESC");
    $length =count($query);
 for($i = 0; $i < $length && $i<10; $i++){
           echo "<li>";
     echo ($query[$i]['username']);
    echo "</li>";
   }
 
  }
}
   ?>