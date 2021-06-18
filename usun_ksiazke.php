<?php
require_once "dodatkowe.php";
$q = "DELETE FROM dzielo WHERE id_dzielo={$_GET['id_dzielo']}";

mysqli_query($link, $q) or die($link->error);

$link->close();

header('Location: ksiazki.php');
?>