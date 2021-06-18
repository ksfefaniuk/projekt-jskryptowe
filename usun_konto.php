<?php
session_start();
if (!isset($_SESSION['zalogowano'])) {
	header('Location: login.php');
	exit();
}
$id_student = $_SESSION['id_student'];
require_once "dodatkowe.php";
$q = "DELETE FROM studenci WHERE id_student='$id_student'";
$result = mysqli_query($link, $q) or die($link->error);

session_unset();
header('Location: rejestracja.php');

?>