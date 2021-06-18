<?php

$title = "Wyszukiwanie";
include 'widok.php';

$szukanie = $_POST['search'];
echo $szukanie;
$szukanie = htmlentities($szukanie, ENT_QUOTES, "UTF-8");
require_once "dodatkowe.php";
$result = mysqli_query($link, sprintf("SELECT id_wyd,nazwa_wyd, egzemplarz.* FROM egzemplarz join wydawnictwo on id_wyd=wyd_id WHERE sygnatura like '%%%s%%' ORDER BY sygnatura", 
mysqli_real_escape_string($link, $szukanie),
mysqli_real_escape_string($link, $szukanie))) or die($link->error);

?>

<br>
<div>
	<table id="egztable">
		<thead>
			<tr>
				<th>Nazwa Wydawnictwa</th>
				<th>Rok Wydania</th>
				<th>Sygnatura</th>
			</tr>
		</thead>
		
		<?php
			while ($row1 = $result->fetch_assoc()): ?>
		<tr><?php if (isset($_SESSION['zalogowano']) && $_SESSION['zalogowano'] == true) : ?>
			<td><?php echo $row1['nazwa_wyd']; ?></td>
			<td><?php echo $row1['rok_wydania']; ?></td>
			<td><?php echo $row1['sygnatura']; ?></td>
			<td><form method="POST" action="rezerwuj.php?id_egz=<?php echo $row1['id_egz'];?>"><input type="submit" name="rezerwuj" value="Rezerwuj"></form></td>
			<?php else: ?>
			<td><?php echo $row1['nazwa_wyd']; ?></td>
			<td><?php echo $row1['rok_wydania']; ?></td>
			<td><?php echo $row1['sygnatura']; ?></td>
			<td><?php echo "<a class=\"tytul\" href=\"edytuj_egzemplarz.php?id_egz={$row1['id_egz']}\">Edytuj</a>" ?></td>
			<td><?php echo "<a class=\"tytul\" href=\"usun_egzemplarz.php?id_egz={$row1['id_egz']}\">Usuñ</a>" ?></td>
			<?php endif; ?>	
		</tr>
		<?php endwhile; ?>
	</table>
</div>