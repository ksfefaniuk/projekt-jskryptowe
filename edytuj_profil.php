<?php

require_once "dodatkowe.php";

if (isset($_POST['submit'])) {
	$id_student=$_GET['id_student'];
	$imie = $_POST['imie'];
	$nazwisko = $_POST['nazwisko'];
	$indeks = $_POST['indeks'];
	$miasto = $_POST['miasto'];
	$ulica = $_POST['ulica'];
	$nr_domu = $_POST['nr_domu'];
	$nr_lokalu = $_POST['nr_lokalu'];
	$kod_pocztowy = $_POST['kod_pocztowy'];
	
	$q = "UPDATE studenci SET imie='$imie', nazwisko='$nazwisko',indeks='$indeks' WHERE id_student='$id_student'";
	
	mysqli_query($link, $q) or die($link->error);
	header('Location: uzytkownik.php');
	
}
else {
	$id_student = $_GET['id_student'];
	$q = "SELECT * FROM studenci WHERE id_student='$id_student'";

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