<?php
	function trimInput($input) {
		return ltrim(rtrim($input));
	}
	
	function illegalChars($input) {
		if (strpbrk($input, '!?"#¤%&/()=') == false) {
			return false;
		}
		return true;	
	}
