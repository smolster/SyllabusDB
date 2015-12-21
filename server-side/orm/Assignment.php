<?php
	class Assignment {
		private $aid;
		private $cid;
		private $duedate;
		private $title;
		private $description;
		
		public static function create($aid, $cid, $duedate, $title, $description) {
			$mysqli = new mysqli("classroom.cs.unc.edu", "smolster", "Moleboy4=Moleboy4", "smolsterdb");
			
			$result = $mysqli->query("INSERT INTO Assignments (cid, duedate, title, description) VALUES ('" . intval($cid) . "', '"
																						. $mysqli->real_escape_string($duedate) . "', '"
																						. $mysqli->real_escape_string($title) . "', '"
																						. $mysqli->real_escape_string($description) . "')");
																
			if ($result) {
				$aid = $mysqli->insert_id;
				return new Assignment($aid, $cid, $duedate, $title, $description);
			}
			return null;
		}
		
		private function __construct($aid, $cid, $duedate, $title, $description) {
			$this->aid = $aid;
			$this->cid = $cid;
			$this->duedate = $duedate;
			$this->title = $title;
			$this->description = $description;
		}
		
		public static function findAllByCid($cid) {
			$mysqli = new mysqli("classroom.cs.unc.edu", "smolster", "Moleboy4=Moleboy4", "smolsterdb");
			
			$result = $mysqli->query("SELECT * FROM Assignments WHERE cid=" . intval($cid));
			if ($result->num_rows == 0) {
				return 0;
			} else if ($result) {
				$assignments = array();
				while ($row = $result->fetch_assoc()) {
					$assignments[] = $row;
				}
				return $assignments;
			}
		}
		
		public function remove() {
			$mysqli = new mysqli("classroom.cs.unc.edu", "smolster", "Moleboy4=Moleboy4", "smolsterdb");
			
			$result = $mysqli->query("DELETE * FROM Assignments WHERE aid=" . intval($this->aid));
			if ($result) {
				return $this;
			} else {
				return null;
			}
		}
		
		public function getJSON() {
			$json = array('aid' => $this->aid,
							'cid' => $this->cid,
							'duedate' => $this->duedate,
							'title' => $this->title,
							'description' =>$this->description);
			return json_encode($json);
		}
	}
?>