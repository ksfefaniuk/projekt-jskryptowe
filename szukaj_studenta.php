<?php

$title = "Wyszukiwanie";
include 'widok.php';

$szukanie = $_POST['search'];
echo $szukanie;
$szukanie = htmlentities($szukanie, ENT_QUOTES, "UTF-8");
require_once "dodatkowe.php";

$result = mysqli_query($link, sprintf("SELECT * FROM studenci WHERE nazwisko like '%%%s%%' OR indeks like '%%%s%%' ORDER BY imie", 
mysqli_real_escape_string($link, $szukanie),
mysqli_real_escape_string($link, $szukanie))) or die($link->error);

?>

<br><br>
<div>
	<table>
		<thead>
			<tr>
				<th>Indeks</th>
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
		<tr><div id "szukaj">
			<td><?php echo $row['indeks']; ?></td>
			<td><?php echo $row['imie']; ?></td>
			<td><?php echo $row['nazwisko']; ?></td>
			<td><?php echo $row['miasto']; ?></td>
			<td><?php echo $row['ulica']; ?></td>
			<td><?php echo $row['nr_domu']; ?></td>
			<td><?php echo $row['nr_lokalu']; ?></td>
			<td><?php echo $row['kod_pocztowy']; ?></td>
		</tr></div>
		<?php endwhile; ?>
	</table>
</div>