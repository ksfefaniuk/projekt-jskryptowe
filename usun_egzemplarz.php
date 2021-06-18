<?php
require_once "dodatkowe.php";

$q = "DELETE FROM egzemplarz WHERE id_egz={$_GET['id_egz']}";

mysqli_query($link, $q) or die($link->error);

$link->close();
header("Location: ksiazki.php");
?>