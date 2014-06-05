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

	function getVenueName($id) {
		$connection = getConnection();
		$sql = "SELECT venuename FROM venues WHERE venueid = ?";
		$query = $connection->prepare($sql);
		$query->execute(array($id));
		$result = $query->fetchColumn();
		return $result;
	}
