<?php 
session_start();
include("../model/Model_rak.php");

$rak = new Model_rak("localhost","root", "", "gudang");
if (isset($_REQUEST['id'])) {
	$rak->deleterak($_REQUEST['id']);
}
?>