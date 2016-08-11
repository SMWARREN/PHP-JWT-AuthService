<?php
	require_once($_SERVER['DOCUMENT_ROOT'].'/new/authService.php');
	require_once($_SERVER['DOCUMENT_ROOT'].'/new/Services/Twilio.php');
	$errors         = array();
	$data           = array();
	
	if (empty($_POST['PHONE']))        $errors['PHONE'] = 'The username is required.';
	
	if ( ! empty($errors)) {
		$data['success'] = false;
		$data['errors']  = $errors;
	} else {
		$JWT = new JWToken();
		$JWT->validateJWTCookie();
		$phone = $_POST['PHONE'];
		$AccountSid = "ACebfea421b1b9c55b932d78ca6db994d3";
		// Your Account SID from www.twilio.com/console
		$AuthToken = "c22d6373032d89e332310d5465b3863b";
		// Your Auth Token from www.twilio.com/console
		$client = new Services_Twilio($AccountSid, $AuthToken);
		$verify = new interactWithDatabase();
		$verify->getVerify($JWT->decodedJWT->data->userName);
		$key = $verify->verified;
		$message = $client->account->messages->create(array(    "From" => "13012652804", // From a valid Twilio number
		"To" => "12022573230",   // Text this number
		"Body" => $key ,));
		$data = True;
	}

	echo json_encode($data);
	?>