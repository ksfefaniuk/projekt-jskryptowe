<?php




$title = "Twoje zamówienia";
include 'widok.php';
$id_student = $_SESSION['id_student'];
require_once "dodatkowe.php";
$q = "SELECT id_egz,sygnatura,rezerwacja.* FROM rezerwacja JOIN egzemplarz on id_egz=egz_id WHERE student_id='$id_student' ORDER BY data_rezerwacji";
$result = mysqli_query($link, $q) or die($link->error);

?>
<h2>Twoje rezerwacje</h2>

<div>
	<table>
		<thead>
			<tr>
				<th>Numer rezerwacji</th>
				<th>Sygnatura egzemplarza</th>
				<th>Data rezerwacji</th>
				<th>Data odebrania</th>
				<th>Data zwrócenia</th>
			</tr>
		</thead>
		<?php
			while ($row = $result->fetch_assoc()): ?>
		<tr><?php if ($row['data_odebrania']=='') :?>
			<td><?php echo $row['id_rezerwacji']; ?></td>
			<td><?php echo $row['sygnatura']; ?></td>
			<td><?php echo $row['data_rezerwacji']; ?></td>
			<td><?php echo $row['data_odebrania']; ?></td>
			<td><?php echo $row['data_zwrocenia']; ?></td>
			<td><?php echo "<a class=\"tytul\" href=\"anuluj_rezerwacje.php?id_rezerwacji={$row['id_rezerwacji']}\">Anuluj</a>" ?></td><?php else: ?>
			<td><?php echo $row['id_rezerwacji']; ?></td>
			<td><?php echo $row['sygnatura']; ?></td>
			<td><?php echo $row['data_rezerwacji']; ?></td>
			<td><?php echo $row['data_odebrania']; ?></td>
			<td><?php echo $row['data_zwrocenia']; ?></td><?php endif; ?>	
		</tr>
		<?php endwhile;
		 ?>
	</table>
</div>