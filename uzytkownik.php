<?php


include 'widok.php';
require_once "dodatkowe.php";
$id_student=$_SESSION['zalogowano'];
$q="SELECT * FROM studenci where id_student='$id_student'";
$result = mysqli_query($link, $q);

$student = $result->fetch_assoc();
$login = $student['login'];
$imie = $student['imie'];
$nazwisko = $student['nazwisko'];
?>
<h2>Twój profil</h2>
 <?php

/*
echo $login."<br>";
//
if ($imie!="") {
	echo $imie."";
	echo "<a href='uzupelnij_profil.php?dane=1'><br>Edytuj swoje imię</a><br><br>";
	$_SESSION['imie'] = $imie;
}
else {
	echo "<a href='uzupelnij_profil.php?dane=1'>Dodaj imię</a><br>";
}

if ($nazwisko!="") {
	echo $nazwisko."";
	echo "<a href='uzupelnij_profil.php?dane=2'><br>Edytuj swoje nazwisko</a><br><br>";
	$_SESSION['nazwisko'] = $nazwisko;
}
else {
	echo "<a href='uzupelnij_profil.php?dane=2'>Dodaj nazwisko</a><br>";
} */
?> 

<a href="nowe_haslo.php"> Ustaw nowe hasło</a><br>
<br>
<a href="usun_konto.php">Usuń konto</a>