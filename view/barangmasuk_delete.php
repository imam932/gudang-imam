<?php 
session_start();
include("../model/Model_penampungan.php");

$penampungan = new Model_penampungan("localhost","root", "", "gudang");																			

if (isset($_REQUEST['id'])) {
	$penampungan->deletepenampungan($_REQUEST['id']);
}
?>