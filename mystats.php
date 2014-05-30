<?php
	session_start();
	require './libs/functions.php';
	if (!loggedIn()) {
		view("login", array('error' => 'Kirjaudu sisään'));
	} else {
		$page = 'mystats';
		require'./views/playernav.php';
	}
		
