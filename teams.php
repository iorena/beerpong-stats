<?php
	session_start();
	require_once './libs/functions.php';
	if (!loggedIn()) {
		view("login", array('error' => 'Kirjaudu sisään'));
	} else {
		$page = 'teams';
		require'./views/playernav.php';
	}

