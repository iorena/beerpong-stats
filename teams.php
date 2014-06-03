<?php
	session_start();
	require './libs/functions.php';
	if (!loggedIn()) {
		view("login", array('error' => 'Kirjaudu sisään'));
	} else {
		$page = 'teams';
		require'./views/playernav.php';
	}

