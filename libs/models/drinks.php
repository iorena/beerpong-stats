<?php 
	require_once 'yhteys.php';

	function getDrinks($venue) {
		$connection = getConnection();
		$sql = "SELECT drinkname FROM drinks, drinkprices WHERE drinks.drinkid = drinkprices.drinkid AND venue = ? AND drinkprice is not NULL"; 
		$query = $connection->prepare($sql);
		if ($query->execute(array($venue))) {
			$drinks = $query->fetchAll();
			return $drinks;
		}
	}
