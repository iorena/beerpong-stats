<?php
	require 'users.php';
	if(empty($_POST["username"])) 
	{
		view("login", array('error' => "Syötä käyttäjätunnus",));
	}
	$user = $_POST[”username"];

	if (empty($_POST["password"]))
	{
		view("login", array('user' => $user, 'error' => "Anna salasana",		));
	}
	$pass = $_POST["password"];
	if (checkPassword($user, $pass))
	{
		header('Location: data.html');
	} else {
		view("login",array('user' = $user, 'error' => "Salasana väärin tai tunnusta ei löytynyt"));
	}

?>
