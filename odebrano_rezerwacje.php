<?php
require_once "dodatkowe.php";
$todaydate = date("Y-m-d", time());
$data_odebrania = date('Y-m-d', strtotime($todaydate));
$q ="UPDATE rezerwacja SET data_odebrania='{$data_odebrania}' WHERE id_rezerwacji='{$id_rezerwacji}'";


mysqli_query($link, $q) or die($link->error);

$link->close();
header("Location: zarzadzaj.php");
?>