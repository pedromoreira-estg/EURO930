<?php
include_once 'CEuroKeyService.php';


if (!isset($_GET['nn'])) {
	$nn = CEuroKey::NN;
} else {
	$nn = $_GET['nn'];
}

if (!is_numeric($nn)) {
	$nn = CEuroKey::NN;	
}


if (!isset($_GET['ns'])) {
	$ns = CEuroKey::NS;
} else {
	$ns = $_GET['ns'];
}

if (!is_numeric($ns)) {
	$ns = CEuroKey::NS;	
}


$temp = new CEuroKeyService($nn,$ns);
echo ($temp->getAsJSON());

?>
