<?php

$title = "YourLibrary.pl";
include 'widok.php';

?>
<style><?php include "style.css"  ?></style> 
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<link rel="stylesheet" href="style.css"?v<?php echo time();?>">
</head>
<br>

<div id="nowe_wydawnictwo">
	<?php if (isset($_SESSION['zalogowano']) && $_SESSION['zalogowano'] == true) : ?>
	<h2>WYDAWNICTWA</h2>
	<h3>Wyszukaj wydawnictwo</h3>
		<form action="szukaj_wydawnictwo.php" method="POST"> 
		<input type="text" name="search" value="Wpisz nazwę wydawnictwa">
		<input type="submit" value="Szukaj"></form>
	<?php else: ?>
	<h2>WYDAWNICTWA</h2>
	<h3>Wyszukaj wydawnictwo</h3>
		<form action="szukaj_wydawnictwo.php" method="POST"> 
		<input type="text" name="search" value="Wpisz nazwę wydawnictwa">
		<input type="submit" value="Szukaj"></form>
	<form action="nowe_wydawnictwo.php" method="POST">
	<h3>Dodaj nowe wydawnictwo</h3>
		<input type="text" name="nazwa_wyd" value="Nazwa wydawnictwa">
		<input type="submit" value="Potwierdź"><?php endif; ?>
	</form>
</div>
<?php
require_once "dodatkowe.php";
$q1 = "SELECT * FROM wydawnictwo order by nazwa_wyd";
$result1 = mysqli_query($link, $q1) or die($link->error);
?>
<br><br>

<div>
	<table id="wydawnictwotable">
		<thead>
			<tr>
				<th>Nazwa wydawnictwa</th>
			</tr>
		</thead>
		
		<?php
			while ($row = $result1->fetch_assoc()): ?>
		<tr><?php if (isset($_SESSION['zalogowano']) && $_SESSION['zalogowano'] == true) : ?>
			<td><?php echo $row['nazwa_wyd']; ?></td><?php else: ?>
			<td><?php echo $row['nazwa_wyd']; ?>
			<td><?php echo "<a class=\"nazwa_wyd\" href=\"edytuj_wydawnictwo.php?id_wyd={$row['id_wyd']}\">Edytuj</a>" ?></td>
			<td><?php echo "<a class=\"nazwa_wyd\" href=\"usun_wydawnictwo.php?id_wyd={$row['id_wyd']}\">Usuń</a>" ?></td>
			<?php endif; ?>		
		</tr>
		<?php endwhile;
		 ?>
	</table>
</div>