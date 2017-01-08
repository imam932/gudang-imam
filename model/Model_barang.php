<?php 

class Model_barang{	
	function __construct($host, $username, $password, $db_name){
		$this->mysqli = new mysqli($host, $username, $password, $db_name);
		if (mysqli_connect_error()) {
			echo "Error : could not connect to database";
			exit;
		}else{
				// echo "database sukses";
		}
	}

	public function readbarang(){
		$result = $this->mysqli->query("
					SELECT * FROM barang as brg
					inner join kategori_barang as kb
					on brg.id_kategori = kb.id_kategori
					inner join rak as r
					on brg.id_rak = r.id_rak
					");
		
		return $result->fetch_all();
	}

	public function insertbarang($nama_barang,$jml_normal,$jml_diperbaiki,$jml_rusak,$id_kategori,$id_rak){
		$query = "INSERT INTO barang VALUES(
		NULL,
		'$nama_barang',
		'$jml_normal',
		'$jml_diperbaiki',
		'$jml_rusak',
		'$id_kategori',
		'$id_rak'
		)
		";
		$result = $this->mysqli->query($query) or die($this->mysqli->error);
		if ($result) {
			header('location:../view/barang.php');
		}
	}

	public function updatebarang($nama_barang,$jml_normal,$jml_diperbaiki,$jml_rusak,$id_kategori,$id_rak){
		$id = $_GET['id'];
		$query = "UPDATE barang SET 
		nama_barang		= '$nama_barang',
		jml_normal 		= '$jml_normal',
		jml_diperbaiki 	= '$jml_diperbaiki',
		jml_rusak 		= '$jml_rusak',
		id_kategori 	= '$id_kategori',
		id_rak 			= '$id_rak'
		WHERE id_barang 	= '$id' ";

		$result = $this->mysqli->query($query) or die($this->mysqli->error);
		if ($result) {
			header('location:../view/barang.php');
		}
	}

	public function deletebarang($id){
		$query = "DELETE FROM barang WHERE id_barang ='$id' ";
		$result = $this->mysqli->query($query) or die($this->mysqli->error);
		if ($result) {
			header('location:../view/barang.php');
		}
	}

	public function getKategori(){
		$query = $this->mysqli->query("SELECT * FROM kategori_barang");
		return $query->fetch_all();
	}

	public function getrak(){
		$query = $this->mysqli->query("SELECT * FROM rak");
		return $query->fetch_all();
	}

	public function readbarangkategori(){
		$result 	= $this->mysqli->query("SELECT * FROM kategori_barang");
		
		return $result->fetch_all();
	}

	public function insertkategori($nama_kategori){
		$query = "INSERT INTO kategori_barang VALUES(
		NULL,
		'$nama_kategori'
		) 
		";
		$result = $this->mysqli->query($query) or die($this->mysqli->error);
		if ($result) {
			header('location:../view/barang_kategori.php');
		}
	}

	public function updatekategori($nama_kategori){
		$id = $_GET['id'];
		$query = "UPDATE kategori_barang SET 
		nama_kategori		= '$nama_kategori'
		WHERE id_kategori 	= '$id' ";

		$result = $this->mysqli->query($query) or die($this->mysqli->error);
		if ($result) {
			header('location:../view/barang_kategori.php');
		}
	}

	public function deletekategori($id){
		$query = "DELETE FROM kategori_barang WHERE id_kategori ='$id' ";
		$result = $this->mysqli->query($query) or die($this->mysqli->error);
		if ($result) {
			header('location:../view/barang_kategori.php');
		}
	}
}

$db_barang = new Model_barang("localhost","root", "", "gudang");

// print_r($db_barang);

$query = $db_barang->mysqli->query("SELECT * FROM user");
$data  = $query->fetch_assoc(); 
?>