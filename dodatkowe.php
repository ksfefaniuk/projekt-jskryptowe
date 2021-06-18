<?php

$host = "localhost";
$uzytkownik = "root";
$haslob = "";
$nazwab = "biblioteka"; 

$link = new mysqli($host, $uzytkownik, $haslob, $nazwab);
if (!$link) die("Nie udalo sie polaczyc");
?>