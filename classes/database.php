<?php 


class openDatabase extends SQLite3

	{
	function __construct()
		{
		try
			{
			$this->open(databaseName);
			}

		catch(Exception $exception)
			{
			echo $exception->getMessage();
			}
		}
	}

class createMockData

	{
	function __construct()
		{
		$db = new openDatabase();
		//$db->exec('DROP TABLE IF EXISTS users');
		$db->exec('CREATE TABLE IF NOT EXISTS users (username varchar(255), password varchar (255), value varchar (255), verify varchar (255))');

		// INSERT MOCK DATA

		$db->exec('INSERT INTO users (username, password, value, verify) VALUES ("Sean","$2y$08$da39a3ee5e6b4b0d3255beNpz4g5NuM8Sq1hHxeOxz2JK.SBNpFlu", "Sean.Warren@gmail.com","1234")');
		$db->close();

		}
	}
    
    ?>