<?php

$title = "Wyszukiwanie";
include 'widok.php';

$szukanie = $_POST['search'];
echo $szukanie;
$szukanie = htmlentities($szukanie, ENT_QUOTES, "UTF-8");
require_once "dodatkowe.php";

$result = mysqli_query($link, sprintf("SELECT * FROM wydawnictwo WHERE nazwa_wyd like '%%%s%%' ORDER BY nazwa_wyd", 
mysqli_real_escape_string($link, $szukanie),
mysqli_real_escape_string($link, $szukanie))) or die($link->error);

?>

<br>
<div>
	<table>
		<thead>
			<tr><br>
				<th>Nazwa wydawnictwa</th>
			</tr>
		</thead>
		
		<?php
			while ($row = $result->fetch_assoc()): ?>
		<tr><?php if (isset($_SESSION['zalogowano']) && $_SESSION['zalogowano'] == true) : ?>
			<td><?php echo $row['nazwa_wyd']; ?></td><?php else: ?>
			<td><?php echo $row['nazwa_wyd']; ?>
			<td><?php echo "<a class=\"nazwa_wyd\" href=\"edytuj_wydawnictwo.php?id_wyd={$row['id_wyd']}\">Edytuj</a>" ?></td>
			<td><?php echo "<a class=\"nazwa_wyd\" href=\"usun_wydawnictwo.php?id_wyd={$row['id_wyd']}\">Usuń</a>" ?></td>
			<?php endif; ?>		
		</tr>
		<?php endwhile; ?>
	</table>
</div>