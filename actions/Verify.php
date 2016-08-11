<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/new/authService.php');


$errors         = array();      
$data           = array(); 

 if (empty($_POST['Number']))
        $errors['Number'] = 'The Number is required.';
		
    if ( ! empty($errors)) {
        $data['success'] = false;
        $data['errors']  = $errors;
    } else {
		
		$JWT = new JWToken();
		$JWT->validateJWTCookie();
		$verify = new interactWithDatabase();
		$data =  $verify->authVerify($JWT->decodedJWT->data->userName, $_POST['Number']);
		  }
	   echo json_encode($data);
	   ?>