<?php

$inside = true;

foreach($_POST as $check => $val) {
	if (empty($_POST[$check])) {
		$inside = false;
		break;
	}
}	

if ($inside) {
	$indeks = $_POST['indeks'];
	$imie = $_POST['imie'];
	$nazwisko = $_POST['nazwisko'];
	$miasto = $_POST['miasto'];
	$ulica = $_POST['ulica'];
	$nr_domu = $_POST['nr_domu'];
	$nr_lokalu = $_POST['nr_lokalu'];
	$kod_pocztowy = $_POST['kod_pocztowy'];
	require_once "dodatkowe.php";
	$q = "INSERT INTO studenci (indeks, imie,nazwisko,miasto,ulica,nr_domu,nr_lokalu,kod_pocztowy) VALUES ($indeks, '$imie', '$nazwisko', '$miasto', '$ulica', '$nr_domu', '$nr_lokalu', '$kod_pocztowy')";
	$result = mysqli_query($link, $q) or die($link->error);
}
$link->close();
header('Location: index.php');
?>