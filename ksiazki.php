<?php

$title = "YourLibrary.pl";
include 'widok.php';

?>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<link rel="stylesheet" href="style.css"?v<?php echo time();?>">
</head>
<br>
<div id="nowe_dzielo">
	<?php if (isset($_SESSION['zalogowano']) && $_SESSION['zalogowano'] == true) : ?>
	<h2>DZIEŁA</h2>
	<h3>Wyszukaj dzieło</h3>
	<form action="szukaj_ksiazki.php" method="POST"> 
	<input type="text" name="search" value="Wpisz tytuł lub autora">
	<input type="submit" value="Szukaj"></form>
	<?php else: ?>
	<h2>DZIEŁA</h2>
	<h3>Wyszukaj dzieło</h3>
	<form action="szukaj_ksiazki.php" method="POST"> 
	<input type="text" name="search" value="Wpisz tytuł lub autora">
	<input type="submit" value="Szukaj"></form>
	<h3>Dodaj nowe dzieło</h3>
	<form action="nowe_dzielo.php" method="POST">
		<input type="text" name="tytul" value="Tytuł">
		<input type="text" name="autor" value="Autor">
		Kategoria: <select name="kategoria">
			<option value="horror">Horror</option>
			<option value="thriller">Thriller</option>
			<option value="science fiction">Science Fiction</option>
			<option value="kryminal">Kryminał</option>
			<option value="romans">Romans</option>
			<option value="nauka">Nauka</option>
			<option value="psychologia">Psychologia</option>
			<option value="poezja">Poezja</option>
			<option value="biografia">Biografia</option>
			<option value="inna">Inna</option></select>
		<input type="submit" value="Potwierdź"><?php endif; ?>
	</form>
</div>
<?php
require_once "dodatkowe.php";
$q = "SELECT * FROM dzielo order by tytul";
$result = mysqli_query($link, $q) or die($link->error);
?>
<br><br>

<div>
	<table id="dzielotable">
		<thead>
			<tr>
				<th>Tytuł</th>
				<th>Autor</th>
				<th>Kategoria</th>
			</tr>
		</thead>
		
		<?php
			while ($row = $result->fetch_assoc()): ?>
		<tr>
			<?php if (isset($_SESSION['zalogowano']) && $_SESSION['zalogowano'] == true) : ?>
			<td><?php echo $row['tytul']; ?></td>
			<td><?php echo $row['autor']; ?></td>
			<td><?php echo $row['kategoria']; ?></td>
			<td><?php echo "<a class=\"tytul\" href=\"egzemplarz.php?id_dzielo={$row['id_dzielo']}\"> Sprawdź egzemplarz </a>" ?></td>
			<?php else: ?>
			<td><?php echo $row['tytul']; ?></td>
			<td><?php echo $row['autor']; ?></td>
			<td><?php echo $row['kategoria']; ?></td>
			<td><?php echo "<a class=\"tytul\" href=\"edytuj_dzielo.php?id_dzielo={$row['id_dzielo']}\">Edytuj</a>" ?></td>
			<td><?php echo "<a class=\"tytul\" href=\"usun_ksiazke.php?id_dzielo={$row['id_dzielo']}\">Usuń</a>" ?></td>
			<td><?php echo "<a class=\"tytul\" href=\"egzemplarz.php?id_dzielo={$row['id_dzielo']}\"> Sprawdź egzemplarz </a>" ?></td>
			<?php endif; ?>
		</tr>
		<?php endwhile; ?>
	</table>
</div>