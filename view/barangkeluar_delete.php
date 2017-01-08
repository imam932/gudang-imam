<?php 
session_start();
include("../model/Model_report.php");

$barang_kel = new Model_report("localhost","root", "", "gudang");
if (isset($_REQUEST['id'])) {
	$barang_kel->deletebarangkeluar($_REQUEST['id']);
}
?>