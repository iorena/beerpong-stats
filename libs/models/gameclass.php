<?php
	require_once './libs/models/games.php';

	class Game {
		private $id;
		private $team1;
		private $team2;
		private $venue;
		private $date;
		private $text;
	
		public function __construct($id, $team1, $team2, $date, $venue, $text) {
			$this->id = $id;
			$this->team1 = $team1;
			$this->team2 = $team2;
			$this->date = $date;
			$this->venue = $venue;
			$this->text = $text;
		}

		public function getVenue() {
			return $this->venue;
		}

		public function getTeam1() {
			return $this->team1;
		}
		
		public function getTeam2() {
			return $this->team2;
		}

		public function getId() {
			return $this->id;
		}

		public function setVenue($venue) {
			$this->venue = $venue;
		}

		public function getDate() {
			return $this->date;
		}

		public function getScore($id) {
			return getGameScore($this->id, $id);
		}

		public function getTeamName($id) {
			return getTeamID($this->id, $id);
		}

		public function getInfo() {
			return $this->text;
		}
	}
