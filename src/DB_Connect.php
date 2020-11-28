<?php
	class DB_Connect {
		public $DB_SERVER;
		public $DB_USERNAME;
		public $DB_PASSWORD;
		public $DB_DATABASE;
		public static $instance;
		public $db;
		
		function __construct($server, $username, $password, $databse) {
			$this->DB_SERVER = $server;
			$this->DB_USERNAME = $username;
			$this->DB_PASSWORD = $password;
			$this->DB_DATABASE = $databse;
			$db = mysqli_connect($server,$username,$password,$databse);
		}
		static function testConnection($server, $username, $password, $databse) {
			if (!$db) {
				$instance = new DB_Connect($server, $username, $password, $databse);
			}
			return $instance;
		}
	}
?>