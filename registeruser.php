<?php
	require_once './libs/models/users.php';
	require_once './libs/functions.php';
	if(empty($_POST["username"])) 
	{
		view("register", array('error' => 'Anna tunnus'));
	}
	$user = $_POST["username"];
	
	if (isset($_POST["firstname"])) {
		$firstname = $_POST["firstname"];
	}
	if (isset( $_POST["lastname"])) {
		$lastname = $_POST["lastname"];
	}

	if (userExists($user))
	{
		view("register", array('firstname' => $firstname, 'lastname' => $lastname, 'error' => 'Tunnus on jo käytössä'));
	}

	if (empty($_POST["password"]) || empty($_POST["password2"]))
	{
		view("register", array('user' => $user, 'error' => 'Anna salasana'		));
	}
	$password = $_POST["password"];
	if (strcmp($password, $_POST["password2"]) != 0) {
		view("register", array('user' => $user, 'error' => 'Salasanat eivät täsmää'));
	}
	addUser($user, $password, $firstname, $lastname);
