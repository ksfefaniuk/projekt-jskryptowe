<?php

session_start();
if (!isset($_SESSION['zalogowano'])) {
	header('Location: logowanie.php');
	exit();
}

include 'widok.php';
$id_student = $_SESSION['id_student'];
require_once "dodatkowe.php";
$q = "SELECT haslo FROM studenci WHERE id_student='$id_student'";
$result = mysqli_query($link, $q) or die($link->error);
$row = $result->fetch_assoc();

$set=true;

if (isset($_POST['haslo'])) {
	$starehaslo = $row['haslo'];
	$starehaslo1 = $_POST['starehaslo1'];
	$starehaslo1 = md5($starehaslo1);
	$haslo1 = $_POST['haslo1'];
	$haslo2 = $_POST['haslo2'];
	
	if (strlen($haslo1)<3 || strlen($haslo1)>30) {
		$set = false;
		$_SESSION['blad_haslo'] = "Hasło musi zawierać od 3 do 30 znakow!";
	}
	
	if ($haslo1 != $haslo2) {
		$set = false;
		$_SESSION['blad_haslo'] = "Hasła nie są takie same!";
	}
	if ($starehaslo != $starehaslo1) {
		$set = false;
		$_SESSION['blad_haslo'] = "Stare hasło jest nieprawidłowe";
	}
	if ($set) {
		$haslo1 = md5($haslo1);
		$wstaw = "UPDATE studenci SET haslo='$haslo1'";
		if ($link->query($wstaw)) {
			header('Location: uzytkownik.php');
		}
	}
	
}

?>
<h2>Zmiana hasła</h2>

<form method="POST">
Wprowadź swoje hasło: <br>
	<input type="password" name="starehaslo1"> <br><br>
	
Wprowadź nowe hasło: <br>
	<input type="password" name="haslo1"> <br><br>
	
Powtórz nowe hasło: <br>
	<input type="password" name="haslo2"> <br><br>
	<?php 
		if (isset($_SESSION['blad_haslo'])) {
			echo '<div class="blad">'.$_SESSION['blad_haslo'].'</div>';
			unset($_SESSION['blad_haslo']);
		}	
	?>
	<input type="submit" value="Potwierdź" name="haslo">
</form>