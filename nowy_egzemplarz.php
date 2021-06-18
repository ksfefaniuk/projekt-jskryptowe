<?php
require_once "dodatkowe.php";
$inside = true;

include 'widok.php';	

if ($inside) {
	require_once "dodatkowe.php";
	$id_dzielo = $_POST['id_dzielo'];
	$id_wyd = $_POST['id_wyd'];
	$rok_wydania = $_POST['rok_wydania'];
	$sygnatura = $_POST['sygnatura'];
	
	$q = "INSERT INTO egzemplarz (dzielo_id,wyd_id,rok_wydania,sygnatura) VALUES ('$id_dzielo','$id_wyd','$rok_wydania', '$sygnatura')";
	mysqli_query($link, $q) or die($link->error);
	header("Location: egzemplarz.php?id_dzielo=$id_dzielo");
}
$link->close();
?>