<?php

$title = "Wyszukiwanie";
include 'widok.php';

$szukanie = $_POST['search'];
echo $szukanie;
$szukanie = htmlentities($szukanie, ENT_QUOTES, "UTF-8");
require_once "dodatkowe.php";

$result = mysqli_query($link, sprintf("SELECT * FROM dzielo WHERE tytul like '%%%s%%' OR autor like '%%%s%%' ORDER BY tytul", 
mysqli_real_escape_string($link, $szukanie),
mysqli_real_escape_string($link, $szukanie))) or die($link->error);

?>

<br>
<div>
	<table>
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