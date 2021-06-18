<?php

if (isset($_SESSION['zalogowano']) && $_SESSION['zalogowano'] == true) {
	header('Location: uzytkownik.php');
	exit();
}
require_once "dodatkowe.php";
$title = "YourLibrary.pl";
include 'widok.php';
?>
<div id="login">
<form action="zaloguj.php" method="POST"><br>
Login: <br>
<input type="text" name="login"><br><br>

Hasło: <br>
<input type="password" name="haslo"><br><br>
<input type="submit" value="Zaloguj">
</form>
</div>
<?php
if (isset($_SESSION['blad_logowania'])) {
	echo $_SESSION['blad_logowania'];
}