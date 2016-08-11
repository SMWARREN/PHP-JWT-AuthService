<?php
class JWToken

{
	public $token;

	public $tokenJWT;

	public $decodedJWT;

	public $authenticated = false;

	function __construct()
	{
	}

	public function encodeToJWT($username)
	{
		$tokenId = base64_encode(password_hash(hashSalt, PASSWORD_DEFAULT));
		$issuedAt = time();
		$notBefore = $issuedAt;
		$expire = $notBefore + 1800; // Adding 30 mins
		$serverName = authName;
		$this->token = ['iat' => $issuedAt, 'jti' => $tokenId, 'iss' => $serverName, 'nbf' => $notBefore, 'exp' => $expire, 'data' => ['userName' => $username, ]];
		$jwt = JWT::encode($this->token, secretKey, 'HS256');
		$this->tokenJWT = $jwt;
	}

	public function decodeToJWT()
	{
		try {
			$decode = JWT::decode($this->tokenJWT, secretKey, array(
				'HS256'
			));
			$this->decodedJWT = $decode;
			$this->authenticated = true;
		}

		catch(Exception $e) {
			$this->authenticated = false;
	// echo 'Caught exception: ', $e->getMessage(), "\n";

		}
	}

	public function cookieJWT()
	{
		$data = $this->tokenJWT;
		$date_of_expiry = time() + 30 * 60 * 1000 + 1600; // expires in 30 mins
		setcookie(authName, $data, $date_of_expiry, "/");
	}

	public function validateJWTCookie()
	{
		if (isset($_COOKIE[authName])) {
			$this->tokenJWT = $_COOKIE[authName];
			$this->decodeToJWT();
		}
		else {
			$this->authenticated = false;
		}
	}

	public function setCookieJWT()
	{
		$this->tokenJWT = $_COOKIE[authName];
	}

	public function destroyCookieJWT()
	{
		setcookie(authName, NULL, -1, "/");
	}

	public function setSessionJWT()
	{
		session_start();
		$_SESSION[authName] = $this->tokenJWT;
	}

	public function destroySessionJWT()
	{
		session_destroy();
	}
}

?>
