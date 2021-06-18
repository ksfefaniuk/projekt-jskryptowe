<?php


$title = "Twoje zam�wienia";
include 'widok.php';
$id_egz = $_GET['id_egz'];
$id_student = $_SESSION['id_student'];
$inside = true;	

if ($inside) {
	require_once "dodatkowe.php";
	$data_rezerwacji = $_POST['data_rezerwacji'];
	
	$q = "INSERT INTO rezerwacja (student_id,egz_id,data_rezerwacji) VALUES ('$id_student','$id_egz','$data_rezerwacji')";
	mysqli_query($link, $q) or die($link->error);
	header("Location: rezerwacja.php");
}
$link->close();
?>
