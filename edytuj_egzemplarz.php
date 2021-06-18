<?php
require_once "dodatkowe.php";

if (isset($_POST['submit'])) {
	$id_egz=$_GET['id_egz'];
	$id_wyd = $_POST['id_wyd'];
	$rok_wydania = $_POST['rok_wydania'];
	$sygnatura = $_POST['sygnatura'];
	
	$q = "UPDATE egzemplarz SET wyd_id='$id_wyd', rok_wydania='$rok_wydania', sygnatura='$sygnatura' WHERE id_egz='$id_egz'";
	
	mysqli_query($link, $q) or die($link->error);
	header('Location: egzemplarz.php?id_dzielo=$id_dzielo');
	
}
else {
	$id_egz=$_GET['id_egz'];
	$q = "SELECT * from egzemplarz where id_egz='$id_egz'";

	$result = mysqli_query($link, $q) or die($link->error);
	$egzemplarz = $result->fetch_assoc();

	$dzielo_id = $egzemplarz['dzielo_id'];
	$wyd_id = $egzemplarz['wyd_id'];
	$rok_wydania = $egzemplarz['rok_wydania'];
	$sygnatura = $egzemplarz['sygnatura'];
}


include 'widok.php';
?>
<?php

$title = "YourLibrary.pl";

require_once "dodatkowe.php";
$q="SELECT * from wydawnictwo order by id_wyd";
$q1="SELECT * from dzielo order by id_dzielo";
$result = mysqli_query($link, $q) or die($link->error);
?>

<div id="nowy_egzemplarz">
	<form method="POST" action="edytuj_egzemplarz.php">
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
		<input type="submit" value="PotwierdŸ">
	</form>
</div>