<?php 

class Model_penampungan{	
	function __construct($host, $username, $password, $db_name){
		$this->mysqli = new mysqli($host, $username, $password, $db_name);
		if (mysqli_connect_error()) {
			echo "Error : could not connect to database";
			exit;
		}else{
				// echo "database sukses";
		}
	}

	public function readpenampungan(){
		$result = $this->mysqli->query("
			SELECT * FROM penampungan as pe
			inner join supplier as su
			on pe.id_supplier = su.id_supplier
			inner join barang as brg
			on pe.id_barang = brg.id_barang
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

	public function insertpenampungan($id_supplier,$jumlah_unit,$tgl_masuk,$id_barang,$status){
		try {
			$this->beginTransaction();
			if ($status=="penampungan") {
				$query = "INSERT INTO penampungan VALUES(
				NULL,
				'$id_supplier',
				'$jumlah_unit',
				'$tgl_masuk',
				'$id_barang',
				'$status'
				)
				";
				$result = $this->mysqli->query($query) or die($this->mysqli->error);
				if ($result) {
					header('location:../view/barangmasuk.php');
				}	
			}elseif ($status=="gudang") {
				$query = "INSERT INTO penampungan VALUES(
				NULL,
				'$id_supplier',
				'$jumlah_unit',
				'$tgl_masuk',
				'$id_barang',
				'$status'
				)
				";

				$query1 = "UPDATE barang SET jml_normal = jml_normal + '$jumlah_unit' 
							where id_barang = '$id_barang' ";

				$result = $this->mysqli->query($query) or die($this->mysqli->error);
				$result = $this->mysqli->query($query1) or die($this->mysqli->error);
				if ($result) {
					header('location:../view/barang.php');
				}
			}
			$this->commit();
		} catch (Exception $e) {
			$message = "Transaksi Gagal !!!";
			echo "<script type='text/javascript'>alert('$message');</script>";
			echo "string";
			$this->rollback();
		}
	}

	public function updatepenampungan($id_supplier,$jumlah_unit,$tgl_masuk,$id_barang,$status){
		$id = $_GET['id'];
		if ($status=="penampungan") {
			$query = "UPDATE penampungan SET 
			id_supplier		= '$id_supplier',
			jumlah_unit		= '$jumlah_unit',
			tgl_masuk	 	= '$tgl_masuk',
			id_barang 		= '$id_barang',
			status 			= '$status'
			WHERE id_penampungan 	= '$id' ";

			$result = $this->mysqli->query($query) or die($this->mysqli->error);
			if ($result) {
				header('location:../view/barangmasuk.php');
			}	
		}elseif ($status=="gudang") {
			# code...
		}
		
	}

	public function deletepenampungan($id){
		$query = "DELETE FROM penampungan WHERE id_penampungan ='$id' ";
		$result = $this->mysqli->query($query) or die($this->mysqli->error);
		if ($result) {
			header('location:../view/barangmasuk.php');
		}
	}

	public function getsupplier(){
		$query = $this->mysqli->query("SELECT * FROM supplier");
		return $query->fetch_all();
	}

	public function getbarang(){
		$query = $this->mysqli->query("SELECT * FROM barang");
		return $query->fetch_all();
	}
}
?>