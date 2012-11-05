<?php

    class CEuroKey {
		
	const MINN = 1;
	const MAXN = 50;
	const MINS = 1;
	const MAXS = 11;
	const NN   = 5;
	const NS   = 2;
	
	
	public $numbers = null;
	public $stars   = null;
	
	private 	$_nn;
	private 	$_ns;
	private 	$_minn;
	private 	$_maxn;
	private 	$_mins;
	private 	$_maxs;
	
	private     $_extractor_n;
	private		$_extractor_s;
	
	public function __construct(
				$nn    = CEuroKey::NN,
				$ns    = CEuroKey::NS,
				$minn  = CEuroKey::MINN,
				$maxn  = CEuroKey::MAXN,
				$mins  = CEuroKey::MINS,
				$maxs  = CEuroKey::MAXS) {
					
		$this->_nn    = $nn;
		$this->_ns    = $ns;
		$this->_minn  = $minn;
		$this->_maxn  = $maxn;
		$this->_mins  = $mins;
		$this->_maxs  = $maxs;
		
		$this->_extractor_n = new CExtractor($this->_nn, $this->_minn, $this->_maxn);
		$this->_extractor_s = new CExtractor($this->_ns, $this->_mins, $this->_maxs);
		
		$this->numbers = $this->_extractor_n->extract();
		$this->stars   = $this->_extractor_s->extract();
	}
				
	public function generateEuroKey() {
		$this->numbers = $this->_extractor_n->extract();
		$this->stars   = $this->_extractor_s->extract();
	}
	
}

class CExtractor {
	
	private $_set = array();	// represents the set of items
	private $_ext = array();	// the extracted items
	private $_n;				// number of items to extract
	private $_min;
	private $_max;
	
	public function __construct($n,$min,$max) {
		$this->_n = $n;
		
		if ($min > $max) {
			$this->_max = $min;
			$this->_min = $max;
		} else {
			$this->_max = $max;
			$this->_min = $min;
		}
		
		//$this->initSet();
	}
	
	private function initSet() {
		for($i=0;$i< $this->_max - $this->_min + 1; $i++) {
			$this->_set[$i] = $this->_min + $i;
		}
	}
	
	private function initExt() {
		$this->_ext = array();
	}
	
	
	public function extract() {
		$this->initSet();
		$this->initExt();
		
		for($i=0;$i < $this->_n; $i++) {
			$idx = rand(0,count($this->_set)-1);	// generates a random index idx
			$this->_ext[] = $this->_set[$idx];  // puts the corresponding element into _ext
			array_splice($this->_set,$idx,1);	// removes it from _set
		}	
		sort($this->_ext);
		return $this->_ext;
	}
}
?>