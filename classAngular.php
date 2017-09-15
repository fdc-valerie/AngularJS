<?php
class AngularClass{
	private static $servername = "localhost";
	private static $username = "root";
	private static  $password = "admin123";
	private static $dbname = "Faculty";
	private static $conn = null;

	public function __construct(){
		$this->pdo = $this->dbConnect();
	}

	public function dbConnect(){
		if(null == self::$conn){
			try{
	   			$x = new PDO("mysql:host=".self::$servername.";dbname=".self::$dbname.";", self::$username, self::$password);
	   		// self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		    }
			catch(PDOException $e){
		    	echo "Connection failed: " . $e->getMessage();
		    }	
		}
		return $x;
	}
	public function insertRow($datas){
			$sql = "SELECT * from TEACHER ";
			$stmt = $this->pdo->prepare($sql);
			$sql= "INSERT INTO TEACHER (ID, first_name, last_name, subject, type)
			VALUES  (null,'".$datas->first_name."','".$datas->last_name."','".$datas->subject."','"."asdasd"."')";

			$this->pdo->exec($sql);
			echo "New data added succesfully";
			echo "<br>";
	}

	public function viewRow(){
		$sql = "SELECT * from TEACHER where flag=1";
		$stmt = $this->pdo->prepare($sql);
		$stmt->execute(array());
		return $stmt -> fetchAll();
	}  

}
?>

