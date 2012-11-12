<?php
include_once 'CExtractor.php';

class CEuroKeyService {
	
	public $status = 1;
	public $data   = null;
	
	public function __construct($n = CEuroKey::NN,$s = CEuroKey::NS){
		$this->data = new CEuroKey($n,$s);
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

?>