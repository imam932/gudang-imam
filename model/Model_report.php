<?php 

class Model_report{	
	function __construct($host, $username, $password, $db_name){
		$this->mysqli = new mysqli($host, $username, $password, $db_name);
		if (mysqli_connect_error()) {
			echo "Error : could not connect to database";
			exit;
		}else{
				// echo "database sukses";
		}
	}

	public function readreport(){
		$result = $this->mysqli->query("
			SELECT * FROM report as re
			inner join user as us
			on re.id_user = us.id_user
			inner join barang brg
			on re.id_barang = brg.id_barang
			");
		
		return $result->fetch_all();
	}

	public function beginTransaction(){
		$this->mysqli->query("BEGIN");
		$this->mysqli->query("TRANSACTION");
	}

	public function commit(){
		$this->mysqli->query("COMMIT");
	}

	public function rollback(){
		$this->mysqli->query("ROLLBACK");
	}

	public function insertreport($nama_report,$id_user,$id_barang,$jumlah,$tgl_report,$isi_report){
		try{
			$this->beginTransaction();
			// $jum = $jumlah;
			$query = "INSERT INTO report VALUES(
			NULL,
			'$nama_report',
			'$id_user',
			'$id_barang',
			'$jumlah',
			'$tgl_report',
			'$isi_report'
			)
			";
			$query1 = "UPDATE barang SET jml_normal = jml_normal-'$jumlah' 
						where id_barang = '$id_barang' ";

			$result = $this->mysqli->query($query) or die($this->mysqli->error);
			$result = $this->mysqli->query($query1) or die($this->mysqli->error);
			if ($result) {
				header('location:../view/barangkeluar.php');
			}
			$this->commit();
		}catch(Exception $e){
			$message = "Transaksi Gagal !!!";
			echo "<script type='text/javascript'>alert('$message');</script>";
			echo "Gagal";
			$this->rollback();
		}
	}

	public function deletebarangkeluar($id){
		$query = "DELETE FROM report WHERE id_report ='$id' ";
		$result = $this->mysqli->query($query) or die($this->mysqli->error);
		if ($result) {
			header('location:../view/barangkeluar.php');
		}
	}

	public function getuser(){
		$query = $this->mysqli->query("SELECT * FROM user");
		return $query->fetch_all();
	}

	public function getbarang(){
		$query = $this->mysqli->query("SELECT * FROM barang");
		return $query->fetch_all();
	}
}
?>