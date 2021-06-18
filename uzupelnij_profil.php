<?php
session_start();
if (!isset($_SESSION['zalogowano'])) {
	header('Location: login.php');
	exit();
}

$title = "Uzupełnianie danych";
include 'baza.php';
require_once "dodatkowe.php";

$id_student = $_SESSION['zalogowany'];
$ktore = $_GET['dane'];


if(isset($_POST['submit'])) {
	
	if ($ktore==1) {
		if ($_POST['imie']!="") {
			$imie = $_POST['imie'];
			$q = "UPDATE studenci SET imie='$imie' WHERE id_student='$id_student'";
			mysqli_query($link, $q) or die($link->error);
			header('Location: uzytkownik.php');
			exit();

		}
	}
	else if ($ktore==2) {
		if ($_POST['nazwisko']!="") {
			$imie = $_POST['nazwisko'];
			$q = "UPDATE studenci SET nazwisko='$nazwisko' WHERE id_student='$id_student'";
			mysqli_query($link, $q) or die($link->error);
			header('Location: uzytkownik.php');
			exit();

		}
	}
}

if (!isset($ktore)) {
	header('Location: uzytkownik.php');
	exit();
}


if ($ktore==1) :
?>

<form method="POST">
	Imię: <br>
	<input type="text" name="imie" value=<?php echo $_SESSION['imie']; ?>><br>
	<input type="submit" value="Potwierdź" name="submit">
</form>