<?php

namespace PitouFW\Core;

use Exception;
use PDO;

abstract class DB {
	private static ?PDO $instance = null;
	private static string
        $db_host = DB_HOST,
        $db_name = DB_NAME,
        $db_user = DB_USER,
        $db_pass = DB_PASS;

	public static function get(): PDO {
		if (self::$instance == null) {
			try	{
				self::$instance = new PDO('mysql:host='.self::$db_host.';dbname='.self::$db_name, self::$db_user, self::$db_pass);
				self::$instance->exec("SET CHARACTER SET utf8");
			}
			catch (Exception $e) {
				die('Erreur : ' . $e->getMessage());
			}
		}

		return self::$instance;
	}

    public static function standalone(string $db_host, string $db_name, string $db_user, string $db_pass): PDO {
        $instance = new PDO('mysql:host='.$db_host.';dbname='.$db_name, $db_user, $db_pass);
        $instance->exec("SET CHARACTER SET utf8");

        return $instance;
	}
}
