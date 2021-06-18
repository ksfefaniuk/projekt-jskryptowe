<?php

$inside = true;

foreach($_POST as $check => $val) {
	if (empty($_POST[$check])) {
		$inside = false;
		break;
	}
}	

if ($inside) {
	$nazwa_wyd = $_POST['nazwa_wyd'];
	require_once "dodatkowe.php";
	$q = "INSERT INTO wydawnictwo (nazwa_wyd) VALUES ('$nazwa_wyd')";
	$result = mysqli_query($link, $q) or die($link->error);
}
$link->close();
header('Location: wydawnictwa.php');
?>