<?php
	class Course {
		private $cid;
		private $login;
		private $title;
		
		public static function create($login, $title) {
			$mysqli = new mysqli("classroom.cs.unc.edu", "smolster", "Moleboy4=Moleboy4", "smolsterdb");
			
			$result = $mysqli->query("INSERT INTO Courses (login, title) VALUES ('" . $mysqli->real_escape_string($login) . "', '"
																						. $mysqli->real_escape_string($title) . "')");
			if ($result) {
				$cid = $mysqli->insert_id;
				return new Course($cid, $login, $title);
			}
			return null;
		}
		
		private function __construct($cid, $login, $title) {
			$this->cid = $cid;
			$this->login = $login;
			$this->title = $title;
		}
		
		public static function findByCid($cid) {
			$mysqli = new mysqli("classroom.cs.unc.edu", "smolster", "Moleboy4=Moleboy4", "smolsterdb");
			
			$result = $mysqli->query("SELECT * FROM Courses WHERE cid='" . $mysqli->real_escape_string($cid) . "'");
			if ($result->num_rows == 0) {
				return 0;
			} else if ($result) {
				$course_info = $result->fetch_assoc();
				return new Course($course_info['cid'], $course_info['login'], $course_info['title']);
			}
			return null;
		}
		
		public static function findAllByProfessor($login) {
			$mysqli = new mysqli("classroom.cs.unc.edu", "smolster", "Moleboy4=Moleboy4", "smolsterdb");
			
			$result = $mysqli->query("SELECT * FROM Courses WHERE login='" . $mysqli->real_escape_string($login) . "'");
			if ($result->num_rows == 0) {
				return 0;
			} else if ($result) {
				$courses = array();
				while ($row = $result->fetch_assoc()) {
					$courses[] = $row;
				}
				return $courses;
			}
			return null;
		}
		
		public static function searchByTitle($title) {
			$mysqli = new mysqli("classroom.cs.unc.edu", "smolster", "Moleboy4=Moleboy4", "smolsterdb");
			
			$result = $mysqli->query("SELECT title FROM Courses WHERE title LIKE '%". $mysqli->real_escape_string($title) . "%'");
			if ($result->num_rows == 0) {
				return 0;
			} else if ($result) {
				$courses = array();
				while ($row = $result->fetch_assoc()) {
					$courses[] = $row;
				}
				return $courses;
			}
			return null;
		}
		
		public function unenrollAll() {
			$mysqli = new mysqli("classroom.cs.unc.edu", "smolster", "Moleboy4=Moleboy4", "smolsterdb");
			
			$result = $mysqli->query("DELETE * FROM Enrolled WHERE E.cid=" . intval($this->cid));
			if ($result) {
				return $this;
			} else {
				return null;
			}
		}
		
		public function getJSON() {
			$json = array('cid' => $this->cid,
							'login' => $this->login,
							'title' => $this->title);
			
			return json_encode($json);
		}
	}
?>