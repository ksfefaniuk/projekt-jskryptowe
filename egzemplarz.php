<?php

$title = "YourLibrary.pl";
include 'widok.php';

require_once "dodatkowe.php";
$id_dzielo = $_GET['id_dzielo'];
$q="SELECT * from wydawnictwo order by id_wyd";
$q1="SELECT * FROM dzielo WHERE id_dzielo={$_GET['id_dzielo']}";
$result = mysqli_query($link, $q) or die($link->error);
$result1 = mysqli_query($link, $q1) or die($link->error);
?>
<br><br>
<div id="nowy_egzemplarz"><?php if (isset($_SESSION['zalogowano']) && $_SESSION['zalogowano'] == true) : ?>
	<h2>EGZEMPLARZE</h2>
	<h3>Wyszukaj egzemplarz</h3>
		<form action="szukaj_egzemplarz.php" method="POST"> 
		<input type="text" name="search" value="Wpisz sygnaturę">
		<input type="submit" value="Szukaj"></form><?php else: ?>
	<h2>EGZEMPLARZE</h2>
	<h3>Dodaj egzemplarz tego dzieła</h3>
	<form method="POST" action="nowy_egzemplarz.php">
		<select name = "id_dzielo">
		<?php
		while($row1=mysqli_fetch_array($result1)){
			echo "<option value='" . $row1[0] . "'>'" . $row1[1] . "'</option>";
		}?></select>
		<select name = "id_wyd">
		<option value = "id_wyd"> Wydawnictwo</option>
		<?php
		while($row=mysqli_fetch_array($result)){
			echo "<option value='" . $row[0] . "'>'" . $row[1] . "'</option>";
		}?></select>
		Rok wydania: <input type="number" name="rok_wydania" min="0" style="width: 80px;" value="2000">
		<input type="text" name="sygnatura" value="Sygnatura">
		<input type="submit" value="Potwierdź"><?php endif; ?>
	</form>
</div>

<?php
$id_dzielo=$_GET['id_dzielo'];
$q = "SELECT * FROM dzielo WHERE id_dzielo={$_GET['id_dzielo']}";

$result = mysqli_query($link, $q) or die($link->error);
$row = $result->fetch_assoc();

echo "<h2>".$row['tytul']."</h2>";
echo "<h3>".$row['autor']."</h2>";
?>

<br><br>

<?php

$q1 = "SELECT id_wyd,nazwa_wyd, egzemplarz.* FROM egzemplarz JOIN wydawnictwo ON id_wyd=wyd_id WHERE dzielo_id={$_GET['id_dzielo']}";
$result1 = mysqli_query($link, $q1) or die($link->error);
?>
<div>
	<table id="egztable">
		<thead>
			<tr>
				<th>Numer Egzemplarza</th>
				<th>Nazwa Wydawnictwa</th>
				<th>Rok Wydania</th>
				<th>Sygnatura</th>
			</tr>
		</thead>
		
		<?php
			while ($row1 = $result1->fetch_assoc()): ?>
		<tr><?php if (isset($_SESSION['zalogowano']) && $_SESSION['zalogowano'] == true) : ?>
			<td><?php echo $row1['id_egz']; ?></td>
			<td><?php echo $row1['nazwa_wyd']; ?></td>
			<td><?php echo $row1['rok_wydania']; ?></td>
			<td><?php echo $row1['sygnatura']; ?></td>
			<td><form method="POST" action="rezerwuj.php"><input type="submit" name="rezerwuj" value="Rezerwuj"></form></td>
			<?php else: ?>
			<td><?php echo $row1['id_egz']; ?></td>
			<td><?php echo $row1['nazwa_wyd']; ?></td>
			<td><?php echo $row1['rok_wydania']; ?></td>
			<td><?php echo $row1['sygnatura']; ?></td>
			<td><?php echo "<a class=\"tytul\" href=\"edytuj_egzemplarz.php?id_egz={$row1['id_egz']}\">Edytuj</a>" ?></td>
			<td><?php echo "<a class=\"tytul\" href=\"usun_egzemplarz.php?id_egz={$row1['id_egz']}\">Usuń</a>" ?></td>
			<?php endif; ?>	
		</tr>
		<?php endwhile; ?>
	</table>
</div>