<?php

//$numbers = array(3,5,11,15,45);
//$stars = array(3,7);

//$en = new CExtractor(5,1,50);
//$es = new CExtractor(2,1,11);

//$numbers = $en->extract();
//$stars = $es->extract();

include_once('CExtractor.php');

$EuroGen = new CEuroKey();


function keyAsHTML($n,$s) {
	$html = "";
	$html .= "<div class=\"key\">";
	// numeros
	$html .= "<ul class=\"numbers\">";
	foreach($n as $number) {
		$html.= "<li> $number </li>";
	}
	$html .= "</ul>";
	$html .= "<ul class=\"stars\">";
	foreach($s as $star) {
		$html.= "<li> $star </li>";
	}
	$html .= "</ul>";
	$html .= "</div>";
	return $html;
}

function keyAsXML($n,$s) {
	$root = new SimpleXMLElement("<div></div>");
	$root->addAttribute("class","key");
	
	$ln = $root->addChild("ul");
	$ln->addAttribute("class","numbers");
	
	$ls = $root->addChild("ul");
	$ls->addAttribute("class","stars");
	
	foreach($n as $number) {
		$ln->addChild("li",$number);
	}
	foreach($s as $star) {
		$ls->addChild("li",$star);
	}
	return $root->asXML();
}


?>

<html>
	<head>
	<title>
		Chave do Euromilhões
	</title>
	<link rel="stylesheet" href="css/euro.css" />
	</head>
	<body>
		<h1>A Chave Vencedora</h1>
		<?php echo keyAsHTML($EuroGen->numbers, $EuroGen->stars);?>
		<?php echo keyAsXML($EuroGen->numbers, $EuroGen->stars);?>
	</body>
</html>