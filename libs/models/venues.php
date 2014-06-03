<?php
	require_once 'yhteys.php';

	function getVenues() {
		$connection = getConnection();
		$sql = "SELECT venueid, venuename FROM venues";
		$query = $connection->prepare($sql);
		if ($query->execute()) {
			$result = $query->fetchAll();
			return $result;
		}
	}
