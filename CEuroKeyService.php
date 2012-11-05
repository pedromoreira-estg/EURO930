<?php
include_once 'CExtractor.php';

class CEuroKeyService {
	
	public $status = 1;
	public $data   = null;
	
	public function __construct( ){
		$this->data = new CEuroKey();
	}
	
	public function getAsJSON() {
		return json_encode($this);
	}
	
	public function getAsPHP() {
		return serialize($this);
	}
	
	public function getAsXML() {
		// TODO
	}	
}

$temp = new CEuroKeyService();
echo $temp->getAsJSON();

?>