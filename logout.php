<?php
	$page = 'login';
	$data['error'] = "Olet kirjautunut ulos.";
	unset($_SESSION['user']);
	require_once 'views/common.php';
