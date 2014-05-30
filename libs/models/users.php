<?php
	require_once 'yhteys.php';

	function findUser($username, $password)
	{
		$connection = getConnection();
		$sql = "SELECT playerid FROM players WHERE loginname = ? AND password = ? LIMIT 1";
		$query = $connection->prepare($sql);
		$query->execute(array($username, $password));
		$result = $query->fetchColumn();
		return $result;	
	}

	function userExists($username) {
		$connection = getConnection();
		$sql = "SELECT playerid FROM players WHERE loginname = ?";
		$query = $connection->prepare($sql);
		$query->execute(array($username));
		$existinguser = $query->fetchColumn();
		if ($existinguser == null) {
			return false;
		}
		return true;
	}

	function addUser($username, $password, $firstname, $lastname) {
		$connection = getConnection();
		$sql = "INSERT INTO players (LoginName, FirstName, LastName, AdminStatus, Password) VALUES (?, ?, ?, 'b', ?)";
		$query = $connection->prepare($sql);
		$successful = $query->execute(array($username, $firstname, $lastname, $password));
		return $successful;		
		}
		
?>
