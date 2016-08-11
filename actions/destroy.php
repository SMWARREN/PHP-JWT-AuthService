<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/new/authService.php');

 
		
		$JWT = new JWToken();
		$JWT->destroyCookieJWT();
		$JWT->destroySessionJWT();

		
		
		?>