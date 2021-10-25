<?php
	define("DB_HOST", "localhost");
	define("DB_USER", "username");
	define("DB_PASS", "password");
	define("DB_NAME", "test");
?>

<?php
class Database {

	public $con;

	function __construct() {
		$this->con = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

		mysqli_query($this->con, "SET CHARACTER SET utf8");                              //added for bangla
		mysqli_query($this->con, "SET SESSION collation_connection = 'utf8_general_ci'"); //added for bangla

		if(!$this->con) {
			echo "Connection Error " . $this->connect_error . __LINE__;
		}
	}

	public function select($sql) {
		$result = $this->con->query($sql);
		if($result->num_rows > 0) {
			return $result;
		}
		else {
			return false;
		}

	}

}

?>

<?php


	$obj = new Database();
	$sql = "SELECT * FROM words";
	$result = $obj->select($sql);

	$entry = array();

	if($result) {

		while($row = $result->fetch_assoc()) {
			$entry[$row['word']] = array($row['word'], $row['pof'], $row['em'], $row['bm'], $row['ex']);
		}

		$num = count($entry);

	}

?>
