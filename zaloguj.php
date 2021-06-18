<?php
session_start();

if (!isset($_POST['login']) || !isset($_POST['haslo'])) {
	header('Location: login.php');
	exit();
}

$login = $_POST['login'];
$haslo = $_POST['haslo'];
$haslo = md5($haslo); 

$login = htmlentities($login, ENT_QUOTES, "UTF-8");
$haslo = htmlentities($haslo, ENT_QUOTES, "UTF-8");
require_once "dodatkowe.php";

$result = mysqli_query($link, sprintf("SELECT * FROM studenci WHERE BINARY login='%s' AND BINARY haslo='%s'", 
mysqli_real_escape_string($link, $login),
mysqli_real_escape_string($link, $haslo))) or die($link->error);

$ile_rekordow = $result->num_rows;
if ($ile_rekordow > 0) {
	$row = $result->fetch_assoc();
	$_SESSION['user'] = $row['login'];
	
	$_SESSION['zalogowano'] = true;
	$id_student = $row['id_student'];
	$_SESSION['id_student'] = $id_student;
	
	unset($_SESSION['blad_logowania']);
	header('Location: uzytkownik.php');
}
else {
	$_SESSION['blad_logowania'] = '<span style="color:red">Błędny login lub hasło!</span>';
	header('Location: login.php');
}

$link->close();

?>


