<?php
require_once "dodatkowe.php";

$q = "DELETE FROM rezerwacja WHERE id_rezerwacji={$_GET['id_rezerwacji']}";

mysqli_query($link, $q) or die($link->error);

$link->close();
header("Location: rezerwacja.php");
?>