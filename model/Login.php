<?php
// include("Koneksi.php");

class Koneksi{
	
	function __construct($host, $username, $password, $db_name){
		$this->mysqli = new mysqli($host, $username, $password, $db_name);
		if (mysqli_connect_error()) {
			echo "Error : could not connect to database";
			exit;
		}else{
				 // echo "database sukses";
		}
	}

	public function __destruct(){
		$this->mysqli->close();
	}


	public function read_admin(){
		$query = "SELECT * FROM user";
		$result = $this->mysqli->query($query);
		$num_result = $result->num_rows;
		if ($num_result>0) {
			while ($rows = $result->fetch_assoc()) {
				$this->data_admin[]=$rows;
				print_r($rows);
			}
			return $this->data_admin;
		}
	}
}

$db = new Koneksi("localhost","root", "", "gudang");

if (isset($_POST['submit'])) {
	$username 	= $_POST['username'];
	$pass 		= $_POST['password'];
	$level		= $_POST['level'];

	$query = $db->mysqli->query("SELECT * from user where username ='$username' AND password='$pass'");


	$result	= $query->fetch_assoc();
// print_r($result);
	
	if (!empty($result)) {
		if ($level=="admin") {
			$_SESSION['aktif']="admin";

			$_SESSION["nama_user"]		= $result['nama_user'];
			$_SESSION['username']		= $result['username'];
			$_SESSION["password"]		= $result['password'];
			$_SESSION["jkel"]			= $result['jkel'];
			$_SESSION["alamat"]			= $result['alamat'];
			$_SESSION["no_tlp"]			= $result['no_tlp'];
			$_SESSION["level"]			= $result['level'];

			echo "<script>window.open('view/admin.php','_self')</script>";

		}elseif ($level=="user") {
			$_SESSION['aktif']='user';

			$_SESSION["nama_user"]		= $result['nama_user'];
			$_SESSION['username']		= $result['username'];
			$_SESSION["password"]		= $result['password'];
			$_SESSION["jkel"]			= $result['jkel'];
			$_SESSION["alamat"]			= $result['alamat'];
			$_SESSION["no_tlp"]			= $result['no_tlp'];
			$_SESSION["level"]			= $result['level'];

			echo "<script>window.open('view/gudang.php','_self')</script>";
		}

	}else if(empty($result)) {
		echo "<script>alert('Username atau password Sudah tidak ada!')</script>"; 
	}else{
		echo "<script>alert('Username atau password Salah!')</script>"; 
	}
	$db->mysqli->close();
}

?>