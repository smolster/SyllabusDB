<?php
	class User {
		private $login;
		private $password;
		private $usertype;
		
		public static function create($log, $pass, $type) {
			$mysqli = new mysqli("classroom.cs.unc.edu", "smolster", "Moleboy4=Moleboy4", "smolsterdb");
			
			$result = $mysqli->query("INSERT INTO Users VALUES ('" . $mysqli->real_escape_string($log) . "', '"
																. $mysqli->real_escape_string($pass) . "', '"
																. $mysqli->real_escape_string($type) . "')");
																
			if ($result) {
				return new User($log, $pass, $type);
			}
			return null;
		}
		
		private function __construct($log, $pass, $type) {
			$this->login = $log;
			$this->password = $pass;
			$this->usertype = $type;
		} 
		
		public static function findByLogin($log) {
			$mysqli = new mysqli("classroom.cs.unc.edu", "smolster", "Moleboy4=Moleboy4", "smolsterdb");
			
			$result = $mysqli->query("SELECT * FROM Users WHERE login='" . $mysqli->real_escape_string($log) . "'");
			if ($result) {
				$user_info = $result->fetch_assoc();
				return new User($user_info['login'], $user_info['password'], $user_info['usertype']);
			}
			return null;
		}
		
		public function getPassword() {
			return $this->password;
		}
		
		public function getUsertype() {
			return $this->usertype;
		}
		
		public function getCourses() {
			$mysqli = new mysqli("classroom.cs.unc.edu", "smolster", "Moleboy4=Moleboy4", "smolsterdb");
			
			if ($this->usertype == 'student') {	// This is a student, return the courses he TAKES.
				$result = $mysqli->query("SELECT * FROM Courses C, Enrolled E WHERE C.cid=E.cid AND E.login='" . $mysqli->real_escape_string($this->login) . "'");
			} else {							// This is a professor, return the courses he TEACHES.
				$result = $mysqli->query("SELECT * FROM Courses C WHERE C.login='" . $mysqli->real_escape_string($this->login) . "'");
			}
			
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
		
		public function getAssignments() {
			$mysqli = new mysqli("classroom.cs.unc.edu", "smolster", "Moleboy4=Moleboy4", "smolsterdb");
			
			if ($this->usertype == 'student') {
				$result = $mysqli->query("SELECT * FROM Assignments A, Enrolled E WHERE A.cid=E.cid and E.login='" . $mysqli->real_escape_string($this->login) . "'");
			} else if ($this->usertype == 'professor') {
				$result = $mysqli->query("SELECT C.cid, A.title, A.duedate, A.description FROM Assignments A, Courses C WHERE A.cid=C.cid and C.login='" . $mysqli->real_escape_string($this->login) . "'");
				//$result = $mysqli->query("SELECT * FROM Courses C, Assignments A WHERE A.cid=C.cid and C.login='kmp'");
			}
		//	if ($result == null) {
		//		return null;
		//	}
			if ($result->num_rows == 0) {
					return 0;
				} else if ($result) {
					$assignments = array();
					while ($row = $result->fetch_assoc()) {
						$assignments[] = $row;
					}
					return $assignments;
				}
				return null;
		}
		
		public function unenrollFromAll() {
			$mysqli = new mysqli("classroom.cs.unc.edu", "smolster", "Moleboy4=Moleboy4", "smolsterdb");
			
			$result = $mysqli->query("DELETE * FROM Enrolled WHERE E.login='" . $mysqli->real_escape_string($this->login) . "'");
			if ($result) {
				return $this;
			} else {
				return null;
			}
		}
		
		public function unenrollByCid($cid) {
			$mysqli = new mysqli("classroom.cs.unc.edu", "smolster", "Moleboy4=Moleboy4", "smolsterdb");
			
			$result = $mysqli->query("DELETE * FROM Enrolled WHERE cid=" . intval($cid) . " AND login='" . $mysqli->real_escape_string($this->login) . "'");
			if($result) {
				return array('cid' => $cid,
								'login' => $this->login);
			}
		}
		
		public function getJSON() {
			$json = array('login' => $this->login,
							'password' => $this->password,
							'usertype' => $this->usertype);
			
			return json_encode($json);
		}
	}
?>