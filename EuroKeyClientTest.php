<?php

$key = file_get_contents("http://localhost/SIR1213/EURO930/EuroKeyWS.php");

$answer = json_decode($key);

var_dump($answer);

?>