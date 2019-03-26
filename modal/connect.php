<?php

class DB {

  // Properties
  private static $dbHost = "localhost";
	private static $dbName = "socialnetwork";
	private static $dbUser = "root";
	private static $dbPass = "";
	private static $sharedPDO;
	protected $pdo;

  // Constructor
  private static function connect() {

		if(empty(self::$sharedPDO)) {
			self::$sharedPDO = new PDO("mysql:host=" . self::$dbHost . ";dbname=" . self::$dbName, self::$dbUser, self::$dbPass);
			self::$sharedPDO->exec("SET CHARACTER SET utf8");
			self::$sharedPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			self::$sharedPDO->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
		}

		return self::$sharedPDO;

	}

  // Methods
  public static function query($query, $params = array()) {
    $statement = self::connect()->prepare($query);
    $statement->execute($params);
    if (explode(' ', $query)[0] == 'SELECT') {
    $data = $statement->fetchAll();
    return $data;
    }
}

}

 ?>
