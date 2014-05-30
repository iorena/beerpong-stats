<?php
	function view($page, $data) {
		require ''.$page.'.php';
		exit();
	}
	
	function loggedIn() {
		if (isset($_SESSION['user'])) {
			return true;
		}
		return false;
	}
