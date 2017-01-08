<?php 
include('Login.php');

$query = $db->mysqli->query("SELECT * FROM user");
$data  = $query->fetch_assoc(); //untuk di gunakan di view
// print_r($data);

class UserCrud{	
	function __construct($host, $username, $password, $db_name){
		$this->mysqli = new mysqli($host, $username, $password, $db_name);
		if (mysqli_connect_error()) {
			echo "Error : could not connect to database";
			exit;
		}else{
				// echo "database sukses";
		}
	}

	public function read(){
		$query = "SELECT * FROM barang";
		$result = $this->mysqli->query($query);
		$num_result = $result->num_rows;
		if ($num_result>0) {
			while ($rows = $result->fetch_assoc()) {
				$this->data_barang[]=$rows;
				// print_r($rows);
			}
			return $this->data_barang;
		}
	}

	public function readuser(){
		$result = $this->mysqli->query("SELECT * FROM user");
		return $result->fetch_all();
	}

	public function insert($nama,$email,$address,$mob){
		$query = "INSERT INTO user VALUES(
		NULL,
		'$nama',
		'$email', 
		'$address', 
		'$mob') 
		";
		$result = $this->mysqli->query($query) or die($this->mysqli->error);
		if ($result) {
			header('location:../view/barang.php');
		}
	}

	public function update($nama, $email, $address, $mobile){
		$id = $_GET['id'];
		$query = "UPDATE user SET 
		nama		='$nama',
		email 		='$email', 
		address 	='$address', 
		mob			='$mobile' 
		WHERE id 	='$id' ";
		$result = $this->mysqli->query($query) or die($this->mysqli->error);
		if ($result) {
			header('location:../view/barang.php');
		}
	}

	public function delete($id){
		$query = "DELETE FROM user WHERE id='$id' ";
		$result = $this->mysqli->query($query) or die(mysqli_connect_error(). "data tidak ditemukan");
		if ($result) {
			header('location:location:../view/barang.php');
		}
	}
}

$db_user = new UserCrud("localhost","root", "", "gudang");
$db_user->read();
// print_r($db_barang);
?>
