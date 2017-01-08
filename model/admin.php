<?php 
include ("Login.php");


// $admin = new Admin();
// $db->read_admin();

$query = $db->mysqli->query("SELECT * FROM user");
$data  = $query->fetch_assoc(); //untuk di gunakan di view
// $user = $_SESSION['username'];
// print_r($user);
// print_r($data);

// query barang
$query_b	= $db->mysqli->query("SELECT * FROM barang");
$data_b		= $query_b->fetch_assoc();
// print_r($data_b);
 ?>