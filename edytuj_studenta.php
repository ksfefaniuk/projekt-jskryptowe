<?php
require_once "dodatkowe.php";

if (isset($_POST['submit'])) {
	$id_student=$_GET['id_student'];
	$indeks = $_POST['indeks'];
	$imie = $_POST['imie'];
	$nazwisko = $_POST['nazwisko'];
	$miasto = $_POST['miasto'];
	$ulica = $_POST['ulica'];
	$nr_domu = $_POST['nr_domu'];
	$nr_lokalu = $_POST['nr_lokalu'];
	$kod_pocztowy = $_POST['kod_pocztowy'];
	
	$q = "UPDATE studenci SET indeks='$indeks', imie='$imie',nazwisko='$nazwisko', miasto='$miasto', ulica='$ulica', nr_domu='$nr_domu',nr_lokalu='$nr_lokalu',kod_pocztowy='$kod_pocztowy' WHERE id_student='$id_student'";
	
	mysqli_query($link, $q) or die($link->error);
	header('Location: index.php');
	
}
else {
	$id_student = $_GET['id_student'];
	$q = "SELECT * FROM studenci WHERE id_student='$id_student'";

	$result = mysqli_query($link, $q) or die($link->error);
	$student = $result->fetch_assoc();

	$indeks = $student['indeks'];
	$imie = $student['imie'];
	$nazwisko = $student['nazwisko'];
	$miasto = $student['miasto'];
	$ulica = $student['ulica'];
	$nr_domu = $student['nr_domu'];
	$nr_lokalu = $student['nr_lokalu'];
	$kod_pocztowy = $student['kod_pocztowy'];
}


include 'widok.php';
?>

<div id="nowy_student">
	<form method="POST"><br><br><h3> Dane studenta: </h3>
		Numer indeksu: <input type="text" name="indeks" value="<?php echo $indeks;?>">
		Imię: <input type="text" name="imie" value="<?php echo $imie;?>">
		Nazwisko: <input type="text" name="nazwisko" value="<?php echo $nazwisko;?>"><br>
		<br><h3> Adres studenta: </h3>
		Miasto: <input type="text" name="miasto" value="<?php echo $miasto;?>">
		Ulica: <input type="text" name="ulica" value="<?php echo $ulica;?>">
		Numer domu: <input type="text" name="nr_domu" value="<?php echo $nr_domu;?>">
		Numer lokalu: <input type="text" name="nr_lokalu" value="<?php echo $nr_lokalu;?>">
		Kod pocztowy: <input type="text" name="kod_pocztowy" value="<?php echo $kod_pocztowy;?>"><br><br>
		<input type="submit" value="Edytuj" style="font-size: 17px;" name='submit'>
	</form>
</div>