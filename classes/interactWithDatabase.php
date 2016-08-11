<?php
class interactWithDatabase
	{
		
		public $verified;
		
	function __construct()
		{
		}

	public function authUser($username, $password)
		{
		$db = new openDatabase();
		$options = ['cost' => 8, 'salt' => hashSalt, ];
		$dbPassword = $db->querySingle('SELECT password FROM users WHERE username LIKE"' . $username . '"', true);
		$newPassword = password_verify($password, $dbPassword['password']);
		if ($newPassword)
			{
			return True;
			}
		  else
			{
			return False;
			}

		$db->close();
		}

	public function authToken($username, $token)
		{
		$db = new openDatabase();
		$dbToken = $db->querySingle('SELECT value FROM users WHERE username="' . $username . '"', true);
		if ($dbToken['value'] === $token)
			{
			echo "Your Token Has Been Validated<br />";
			}
		  else
			{
			echo "Wrong Token";
			}

		$db->close();
		}


	public function authVerify($username, $number)
		{
		$db = new openDatabase();
		$dbVerify= $db->querySingle('SELECT verify FROM users WHERE username LIKE"' . $username . '"', true);
	
		if ($dbVerify['verify'] === $number)
			{
			return True;
			}
		  else
			{
			return False;
			}

		$db->close();
		}
		
	public function getVerify($username)
		{
		$db = new openDatabase();
		
		$this->verified = $db->querySingle('SELECT verify FROM users WHERE username LIKE"'  . $username . '"', true);
		$db->close();
		}
	public function destroyToken($username)
		{
		$db = new openDatabase();
		$update = "UPDATE users SET value = '' WHERE username = '$username'";
		$db->exec($update);
		$db->close();
		}

	public function registerLogin($username, $password, $value)
		{
		$db = new openDatabase();
		$avalUser = $db->querySingle('SELECT username FROM users WHERE username LIKE"' . $username . '"', true);
		$avalEmail = $db->querySingle('SELECT value FROM users WHERE value LIKE"' . $value . '"', true);
		if (!stristr($avalUser["username"], $username))
			{
			if (!stristr($avalEmail["value"], $value))
				{
				try
					{
					$randomNumber = rand(1000, 9999);

					$options = ['cost' => 8, 'salt' => hashSalt, ];
					$encryptPass = password_hash($password, PASSWORD_BCRYPT, $options);
					$smt = $db->prepare("INSERT INTO users (username, password, value, verify) VALUES (:name, :pass, :value, :verify)");			$smt->bindValue(':verify', $randomNumber, SQLITE3_TEXT);
					$smt->bindValue(':name', $username, SQLITE3_TEXT);
					$smt->bindValue(':pass', $encryptPass, SQLITE3_TEXT);
					$smt->bindValue(':value', $value, SQLITE3_TEXT);
					$smt->execute();
					$db->close();
					return True;
					}

				catch(PDOException $e)
					{
					return False;
					}
				}
			  else
				{
				return "The Email is in Use.";
				}
			}
		  else
			{
			return "The Username is in Use.";
			}
		}
	}

?>