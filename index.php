<?php

$title = "YourLibrary.pl";
include 'widok.php';

?>
<!DOCTYPE html>
<html lang="pl"><head>
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<link rel="stylesheet" href="style.css"?v<?php echo time();?>">
</head>
<body>
<br><br>
<?php
require_once "dodatkowe.php";
$q = "SELECT * FROM studenci order by imie";
$result = mysqli_query($link, $q) or die($link->error);
?>
<br>
<form action="szukaj_studenta.php" method="POST"> 
		<input type="text" name="search" value="Wpisz indeks lub nazwisko">
		<input type="submit" value="Szukaj"></form><br><br>
<div>
	<table id="studenttable">
		<thead>
			<tr>
				<th>Indeks</th>
				<th>Login</th>
				<th>Imie</th>
				<th>Nazwisko</th>
				<th>Miasto</th>
				<th>Ulica</th>
				<th>Nr Domu</th>
				<th>Nr lokalu</th>
				<th>Kod pocztowy</th>
			</tr>
		</thead>
		
		<?php
			while ($row = $result->fetch_assoc()): ?>
		<tr>
			<td><?php echo $row['indeks']; ?></td>
			<td><?php echo $row['login']; ?></td>
			<td><?php echo $row['imie']; ?></td>
			<td><?php echo $row['nazwisko']; ?></td>
			<td><?php echo $row['miasto']; ?></td>
			<td><?php echo $row['ulica']; ?></td>
			<td><?php echo $row['nr_domu']; ?></td>
			<td><?php echo $row['nr_lokalu']; ?></td>
			<td><?php echo $row['kod_pocztowy']; ?></td>
			<td><?php echo "<a class=\"tytul\" href=\"edytuj_studenta.php?id_student={$row['id_student']}\">Edytuj</a>" ?></td>
			<td><?php echo "<a class=\"tytul\" href=\"usun_studenta.php?id_student={$row['id_student']}\">Usuń</a>" ?></td>
		</tr>
		<?php endwhile; ?>
	</table>
</div>
</body>
</html>