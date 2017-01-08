<?php 
session_start();
include("../model/Model_barang.php");

$kat_barang = new Model_barang("localhost","root", "", "gudang");
if (isset($_REQUEST['id'])) {
	$kat_barang->deletekategori($_REQUEST['id']);
}
?>