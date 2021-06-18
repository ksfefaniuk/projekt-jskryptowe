<?php
require_once "dodatkowe.php";

if (isset($_POST['submit'])) {
	$id_dzielo=$_GET['id_dzielo'];
	$tytul = $_POST['tytul'];
	$autor = $_POST['autor'];
	$kategoria = $_POST['kategoria'];
	
	$q = "UPDATE dzielo SET tytul='$tytul', autor='$autor', kategoria='$kategoria' WHERE id_dzielo='$id_dzielo'";
	
	mysqli_query($link, $q) or die($link->error);
	header('Location: ksiazki.php');
	
}
else {
	$id_dzielo = $_GET['id_dzielo'];
	$q = "SELECT * FROM dzielo WHERE id_dzielo='$id_dzielo'";

	$result = mysqli_query($link, $q) or die($link->error);
	$ksiazka = $result->fetch_assoc();

	$tytul = $ksiazka['tytul'];
	$autor = $ksiazka['autor'];
	$kategoria = $ksiazka['kategoria'];
}

include 'widok.php';
?>


<div id="nowe_dzielo">
	<form method="POST"><br><br>
		<input type="text" name="tytul" value="<?php echo $tytul;?>">
		<input type="text" name="autor" value="<?php echo $autor;?>">
		Kategoria: <select name="kategoria">
			<option value="horror" <?php if ($kategoria=="horror") echo "selected";?>>Horror</option>
			<option value="thriller" <?php if ($kategoria=="thriller") echo "selected";?>>Thriller</option>
			<option value="science fiction" <?php if ($kategoria=="science fiction") echo "selected";?>>Science fiction</option>
			<option value="kryminal" <?php if ($kategoria=="kryminal") echo "selected";?>>Kryminał</option>
			<option value="romans" <?php if ($kategoria=="romans") echo "selected";?>>Romans</option>
			<option value="nauka" <?php if ($kategoria=="nauka") echo "selected";?>>Nauka</option>
			<option value="psychologia" <?php if ($kategoria=="psychologia") echo "selected";?>>Psychologia</option>
			<option value="poezja" <?php if ($kategoria=="poezja") echo "selected";?>>Poezja</option>
			<option value="biografia" <?php if ($kategoria=="biografia") echo "selected";?>>Biografia</option>
			<option value="inna" <?php if ($kategoria=="inna") echo "selected";?>>Inna</option>
		</select>
		<input type="submit" value="Edytuj" style="" name='submit'>
	</form>
</div>