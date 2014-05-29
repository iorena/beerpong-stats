<?php
	require_once 'yhteys.php';

	function checkPassword($username, $password)
	{
		
		$connection = getConnection();
		$sql = "SELECT playerid FROM players WHERE loginname = ? AND password = ? LIMIT 1";
		$query = $connection->prepare($sql);
		$query->execute(array($username, $password));
		$result = $query->fetchObject();
		if ($result == null) {
			return false;
		}
		return false;	

	}
?>
