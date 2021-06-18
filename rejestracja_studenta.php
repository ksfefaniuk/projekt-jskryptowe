<?php
session_start();
if (!isset($_SESSION['zarejestrowano'])) {
	header('Location: index.php');
}
else {
	unset($_SESSION['zarejestrowano']);
}


if (isset($_SESSION['formularz_login'])) unset($_SESSION['formularz_login']);
if (isset($_SESSION['blad_login'])) unset($_SESSION['blad_login']);
if (isset($_SESSION['formularz_indeks'])) unset($_SESSION['formularz_indeks']);
if (isset($_SESSION['blad_indeks'])) unset($_SESSION['blad_indeks']);
if (isset($_SESSION['blad_haslo'])) unset($_SESSION['blad_haslo']);

$title = "Zarejestrowano!";
include 'widok.php';
?>

<p style="text-align:center; font-size:22px">Dziękujemy za rejestrację! Możesz się teraz zalogować.</p>
<p style="text-align:center"><a href="login.php">Zaloguj się!</a></p>