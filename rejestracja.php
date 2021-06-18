<?php
session_start();
if (isset($_SESSION['zalogowano']) && $_SESSION['zalogowano'] == true) {
	header('Location: uzytkownik.php');
	exit();
}

$title = "Rejestracja";

if (isset($_POST['login'])) {
	$dobrze = true;
	
	$login = $_POST['login'];	
	if (strlen($login)<3 || strlen($login)>30) {		// Sprawdzenie ilosci znaków
		$dobrze = false;
		$_SESSION['blad_login'] = "Login musi posiadać od 3 do 30 znaków!";
	}
	
	if (!ctype_alnum($login)) {		// Sprawdzenie znaków
		$dobrze = false;
		$_SESSION['blad_login'] = "Login może zawierać tylko litery (bez polskich znaków) i cyfry!";
	}

	$indeks = $_POST['indeks'];	
	if (strlen($indeks) < 3 || strlen($indeks) > 7) {		// Sprawdzenie ilosci znaków
		$dobrze = false;
		$_SESSION['blad_indeks'] = "Numer indeksu musi posiadać od 3 do 7 znaków!";
	}
	
	if (!ctype_digit($indeks)) {		// Sprawdzenie znaków
		$dobrze = false;
		$_SESSION['blad_indeks'] = "Numer indeksu może zawierać tylko cyfry!";
	}
	
	$haslo1 = $_POST['haslo1'];
	$haslo2 = $_POST['haslo2'];
	
	if (strlen($haslo1)<4 || strlen($haslo1)>30) {		// Sprawdzenie długości haseł
		$dobrze = false;
		$_SESSION['blad_haslo'] = "Hasło musi zawierać od 4 do 30 znaków!";
	}
	
	if ($haslo1 != $haslo2) {		// Sprawdzenie czy hasła są takie same
		$dobrze = false;
		$_SESSION['blad_haslo'] = "Hasła nie są takie same!";
	}
	
	$imie = $_POST['imie'];	
	$nazwisko = $_POST['nazwisko'];
	$miasto = $_POST['miasto'];
	$ulica = $_POST['ulica'];
	$nr_domu = $_POST['nr_domu'];
	$nr_lokalu = $_POST['nr_lokalu'];
	$kod_pocztowy = $_POST['kod_pocztowy'];
	require_once "dodatkowe.php";
	
	$q1 = "SELECT id_student FROM studenci WHERE login='$login'";
	$result1 = mysqli_query($link, $q1) or die($link->error);
		
	$ile_loginow = $result1->num_rows;
	if ($ile_loginow>0) {		// Sprawdzenie czy istnieje taki użytkownik w bazie
		$dobrze = false;
		$_SESSION['blad_login'] = "Istnieje już taki użytkownik!";
	}
		

	if ($dobrze) {
		$haslo1 = md5($haslo1);
		
		$wstaw = "INSERT INTO studenci (login,indeks, haslo,imie,nazwisko,miasto,ulica,nr_domu,nr_lokalu, kod_pocztowy) VALUES ('$login','$indeks', '$haslo1','$imie','$nazwisko','$miasto','$ulica','$nr_domu','$nr_lokalu','$kod_pocztowy')";
		if ($link->query($wstaw)) {
			$_SESSION['zarejestrowano'] = true;
			header('Location: rejestracja_studenta.php');
		}
	}
	
}

include 'widok.php';
?>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<link rel="stylesheet" href="style.css"?v<?php echo time();?>">
</head>
<form method="POST"><div id = "rejestracja">
	<div id = "rejestracjatak">
	<h2>REJESTRACJA</h2>
	<p>Podaj wymagane dane logowania * :</p> <br>
	Login * : <br>
	<input type="text" name="login" value="<?php 
		if (isset($_SESSION['formularz_login'])) {
			echo $_SESSION['formularz_login'];
			unset ($_SESSION['formularz_login']);
		}
	?>"><br>
	<?php 
		if (isset($_SESSION['blad_login'])) {
			echo '<div class="blad">'.$_SESSION['blad_login'].'</div>';
			unset($_SESSION['blad_login']);
		}	
	?>
	Numer indeksu * : <br>
	<input type="text" name="indeks" value="<?php 
		if (isset($_SESSION['formularz_indeks'])) {
			echo $_SESSION['formularz_indeks'];
			unset ($_SESSION['formularz_indeks']);
		}
	?>"><br>
	<?php 
		if (isset($_SESSION['blad_indeks'])) {
			echo '<div class="blad">'.$_SESSION['blad_indeks'].'</div>';
			unset($_SESSION['blad_indeks']);
		}	
	?>
	Hasło * : <br>
	<input type="password" name="haslo1"><br>
	<?php 
		if (isset($_SESSION['blad_haslo'])) {
			echo '<div class="blad">'.$_SESSION['blad_haslo'].'</div>';
			unset($_SESSION['blad_haslo']);
		}	
	?>
	Powtórz hasło * : <br>
	<input type="password" name="haslo2"><br>
	</div>
	<div id="rejestracjanie">
	<p>Podaj swoje dane (niewymagane do rejestracji) :</p> <br>

	Imię: <br>
	<input type="text" name="imie" value=""><br>

	Nazwisko: <br>
	<input type="text" name="nazwisko" value=""><br>

	Miasto: <br>
	<input type="text" name="miasto" value=""><br>

	Ulica: <br>
	<input type="text" name="ulica" value=""><br>

	Numer domu: <br>
	<input type="text" name="nr_domu" value=""><br>

	Numer lokalu: <br>
	<input type="text" name="nr_lokalu" value=""><br>

	Kod pocztowy: <br>
	<input type="text" name="kod_pocztowy" value=""><br>

	<br><input type="submit" value="Zarejestruj się">
</form>
<br><br>
<p>Masz już konto?</p> <a href="login.php">Zaloguj się!</a>
</div></div>