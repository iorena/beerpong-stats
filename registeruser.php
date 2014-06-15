<?php
	require_once './libs/models/users.php';
	require_once './libs/functions.php';
	require_once './libs/strings.php';
	if (isset($_POST["firstname"])) {
		$firstname = trimInput($_POST["firstname"]);
		if (strlen($firstname) > 15) {
			view("register", array('error' => 'Etunimi voi olla korkeintaan 15 merkkiä pitkä'));
		}
		if (illegalChars($firstname)) {
			view("register", array('error' => 'Etunimi voi sisältää vain kirjaimia ja merkkejä - _'));
		} 
	}
	if (isset( $_POST["lastname"])) {
		$lastname = trimInput($_POST["lastname"]);
		if (strlen($lastname) > 20) {
			view("register", array('error' => 'Sukunimi voi olla korkeintaan 20 merkkiä pitkä', 'firstname' => $firstname));
		}
		if (illegalChars($lastname)) {
			view("register", array('error' => 'Sukunimi voi sisältää vain kirjaimia ja merkkejä - _', 'firstname' => $firstname));
		}
	}

	if(empty($_POST["username"])) 
	{
		view("register", array('error' => 'Anna tunnus'));
	}
	$user = trimInput($_POST["username"]);
	if (illegalChars($user)) {
		view("register", array('firstname' => $firstname, 'lastname' => $lastname, 'error' => 'Tunnus voi sisältää vain kirjaimia ja merkkejä - _'));
	}

	if (strlen($user) > 15) {
		view("register", array('error' => 'Tunnus voi olla korkeintaan 15 merkkiä pitkä'));
	}
	
	

	if (userExists($user))
	{
		view("register", array('firstname' => $firstname, 'lastname' => $lastname, 'error' => 'Tunnus on jo käytössä'));
	}

	if (empty($_POST["password"]) || empty($_POST["password2"]))
	{
		view("register", array('username' => $user, 'firstname' =>  $firstname, 'lastname' => $lastname, 'error' => 'Anna salasana'));
	}
	$password = $_POST["password"];
	if (strcmp($password, $_POST["password2"]) != 0) {
		view("register", array('username' => $user, 'firstname' => $firstname, 'lastname' => $lastname, 'error' => 'Salasanat eivät täsmää'));
	}
	addUser($user, $password, $firstname, $lastname);
	session_start();
	$_SESSION['user'] = findUser($user, $password);	
	header('Location: mystats.php');

