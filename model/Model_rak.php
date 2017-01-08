<?php 

class Model_rak{	
	function __construct($host, $username, $password, $db_name){
		$this->mysqli = new mysqli($host, $username, $password, $db_name);
		if (mysqli_connect_error()) {
			echo "Error : could not connect to database";
			exit;
		}else{
				// echo "database sukses";
		}
	}

	public function readrak(){
		$result 	= $this->mysqli->query("SELECT * FROM rak");
		
		return $result->fetch_all();
	}

	public function insertrak($nama_rak,$jumlah_tampung,$nama_user){
		$query = "INSERT INTO rak VALUES(
		NULL,
		'$nama_rak',
		'$jumlah_tampung',
		'$nama_user'
		) 
		";
		$result = $this->mysqli->query($query) or die($this->mysqli->error);
		if ($result) {
			header('location:../view/rak.php');
		}
	}

	public function updaterak($nama_rak,$jumlah_tampung,$nama_user){
		$id = $_GET['id'];
		$query = "UPDATE rak SET 
		nama_rak		= '$nama_rak',
		jumlah_tampung	= '$jumlah_tampung',
		nama_user		= '$nama_user'
		WHERE id_rak 	= '$id' ";

		$result = $this->mysqli->query($query) or die($this->mysqli->error);
		if ($result) {
			header('location:../view/rak.php');
		}
	}

	public function deleterak($id){
		$query = "DELETE FROM rak WHERE id_rak ='$id' ";
		$result = $this->mysqli->query($query) or die($this->mysqli->error);
		if ($result) {
			header('location:../view/rak.php');
		}
	}

	public function getuser(){
		$query = $this->mysqli->query("SELECT * FROM user");
		return $query->fetch_all();
	}
}
?>