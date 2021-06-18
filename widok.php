<?php
session_start();
?>

<!DOCTYPE html>
<html lang="pl"><head>
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<link rel="stylesheet" href="style.css" type="text/css">
<title><?php echo $title; ?></title>
</head>
<body id="bodywidok">
<div id="studentsearch">
	<?php 
	if (isset($_SESSION['zalogowano']) && $_SESSION['zalogowano'] == true) {
		echo '<a id="awidok" href="ksiazki.php"> Dzieła </a>';
		echo '<a id="awidok" href="wydawnictwa.php"> Wydawnictwa </a>';
		echo '<a id="awidok" href="rezerwacja.php"> Rezerwacja </a>';
		echo '<a id="awidok" class="menu" href="uzytkownik.php">Profil </a>';
		echo '<a id="awidok" class="menu" href="wyloguj.php">Wyloguj </a>';
}
	else {
		echo '<a id="awidok" href="index.php"> Studenci </a>';
		echo '<a id="awidok" href="ksiazki.php"> Książki </a>';
		echo '<a id="awidok" href="wydawnictwa.php"> Wydawnictwa </a>';
		echo '<a id="awidok" href="zarzadzaj.php"> Zarządzaj rezerwacjami </a>';
		echo '<a id="awidok" class="menu" href="rejestracja.php">Rejestracja </a>';
		echo '<a id="awidok" class="menu" href="login.php">Logowanie </a>';
}
	?>
</div>
<div id="main">
</div>
</body>
</html>








