<?php
require_once "dodatkowe.php";
if (isset($_POST['submit'])) {
	$id_wyd=$_GET['id_wyd'];
	$nazwa_wyd = $_POST['nazwa_wyd'];
	
	$q = "UPDATE wydawnictwo SET nazwa_wyd='$nazwa_wyd' WHERE id_wyd='$id_wyd'";
	
	mysqli_query($link, $q) or die($link->error);
	header('Location: wydawnictwa.php');
	
}
else {
	$id_wyd=$_GET['id_wyd'];
	$q = "SELECT * FROM wydawnictwo WHERE id_wyd='$id_wyd'";

	$result = mysqli_query($link, $q) or die($link->error);
	$ksiazka = $result->fetch_assoc();

	$nazwa_wyd = $ksiazka['nazwa_wyd'];
}


include 'widok.php';
?>


<div id="nowe_wydawnictwo">
	<form method="POST"><br><br>
		<input type="text" name="nazwa_wyd" value="<?php echo $nazwa_wyd;?>">
		
		<input type="submit" value="Edytuj" style="" name='submit'>
	</form>
</div>