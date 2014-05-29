<?php
	require_once 'yhteys.php';
	$connection = getConnection();

	public static function checkPassword($username, $password)
	{
		
		$sql = "SELECT * FROM users WHERE LoginName = ?";
		$query = $connection->prepare($sql);
		$result = $query->execute(array($username));
		if ($result == null) {
			return false;
		}
		if ($result->password == $password)
		{
			return true;
		}
		return false;	

	}
?>
