<?php 
session_start();
include("../model/Model_barang.php");

$barang = new Model_barang("localhost","root", "", "gudang");
if (isset($_REQUEST['id'])) {
	$barang->deletebarang($_REQUEST['id']);
}
?>