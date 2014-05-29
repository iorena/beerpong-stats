<?php
	require_once "./libs/models/users.php";
	require_once './libs/functions.php';
	if(empty($_POST["username"])) 
	{
		view("login", array('error' => 'Anna tunnus'));
	}
	$user = $_POST["username"];

	if (empty($_POST["password"]))
	{
		view("login", array('user' => $user, 'error' => 'Anna salasana'		));
	}
	$pass = $_POST["password"];
	if (checkPassword($user, $pass))
	{
		header('Location: mystats.php');
	} else {
		view("login",array('user' => $user, 'error' => 'Salasana väärin tai tunnusta ei löytynyt'));
	}

?>
