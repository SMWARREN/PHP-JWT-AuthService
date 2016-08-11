<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/new/authService.php');

$errors         = array();      
$data           = array(); 

 if (empty($_POST['username']))
        $errors['username'] = 'The username is required.';

    if (empty($_POST['password']))
        $errors['password'] = 'The password is required.';

    if (empty($_POST['email']))
        $errors['email'] = 'The email is required.';

    if ( ! empty($errors)) {
        $data['success'] = false;
        $data['errors']  = $errors;
    } else {
		
		$name = $_POST['username'];
		$pass = $_POST['password'];
		$email = $_POST['email'];
		
		$db = new interactWithDatabase();
		$register = $db->registerLogin($name,$pass,$email);
        $data = $register;
		
	
		$JWT = new JWToken();
		$JWT->setSessionJWT();

		$JWT->encodeToJWT($name);
		$JWT->cookieJWT();
		  }
	   echo json_encode($data);