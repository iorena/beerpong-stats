<?php
	require_once 'yhteys.php';
	
	class Game {
		private $id;
		private $team1;
		private $team2;
		private $venue;
		private $date;
	
		public function __construct($id, $team1, $team2, $date, $venue) {
			$this->id = $id;
			$this->team1 = $team1;
			$this->team2 = $team2;
			$this->date = $date;
			$this->venue = $venue;
		}

		public function getVenue() {
			return $venue;
		}

		public function setVenue($venue) {
			$this-venue = $venue;
		}

		public function getDate() {
			return $date;
		}
	}
	
	function addIndivScore($game, $playerid, $score, $drink) {
		$connection = getConnection();
		$sql = "INSERT INTO indivscores (game, player, score, drink)
		VALUES (?, ?, ?, ?);";
		$query = $connection->prepare($sql);
		$query->execute(array($game, $playerid, $score, $drink));
	}

	function addGame($team1, $team2, $date, $venue) {

		$connection = getConnection();
		$sql = "INSERT INTO games (gameid, team1, team2, gamedate, venue)
		VALUES (DEFAULT, ?, ?, ?, ?) RETURNING gameid;";
		$query = $connection->prepare($sql);
		$query->execute(array($team1, $team2, $date, $venue));
		return $query->fetchColumn();

	}


	function getGameScore($game, $id) {
		$connection = getConnection();
		$sqlopponent = "SELECT SUM(score) FROM indivscores WHERE game = ? AND player != ? AND player NOT IN (SELECT player1 FROM teams, games WHERE gameid = ? AND teamid = team1 OR teamid = team2 AND player2 = ?) AND player NOT IN (SELECT player2 FROM teams, games WHERE gameid = ? and teamid = team1 OR teamid = team2 AND player1 = ?)";
		$query = $connection->prepare($sqlopponent);
		$query->execute(array($game, $id, $game, $id, $game, $id));
		$opponentscore = $query->fetchColumn();
		$sql = "SELECT SUM(score) FROM indivscores WHERE game = ? AND (player = ? OR player IN (SELECT player1 FROM teams, games WHERE gameid = ? AND (teamid = team1 OR teamid = team2) AND player2 = ?) OR player IN (SELECT player2 FROM teams, games WHERE gameid = ? AND (teamid = team1 OR teamid = team2) AND player1 = ?))";
		$connection = getConnection();
		$query = $connection->prepare($sql);
		$query->execute(array($game, $id, $game, $id, $game, $id));
		$score = $query->fetchColumn();
		return $score.'-'.$opponentscore;
	
	}
 

	function getGames($id, $number) {
		$connection = getConnection();
		$sql = "SELECT gameid, gamedate FROM games WHERE ? IN (SELECT player1 FROM teams, games WHERE team1 = teamid OR team2 = teamid) OR ? IN (SELECT player2 FROM teams, games WHERE team1 = teamid OR team2 = teamid)";
		$query = $connection->prepare($sql);
		if ($query->execute(array($id, $id))) {
			return array_slice($query->fetchAll(), 0, $number);
		}
		return null;

	}
