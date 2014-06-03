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
	
	function unique($names) {
		for ($i = 0; $i<4; $i++) {
			for ($j = $i + 1; $j < 4; $j++) {
				if ($names[$i] == $names[$j]) {
					return false;
				}
			}
		}
		return true;
	}

	function scoreOfTen($p1, $p2, $p3, $p4) {
		if ($p1 + $p2 < 10 && $p3 + $p4 < 10) {
			return false;
		}
		return true;
	}
