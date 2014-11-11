<?php
class Arrays {
	
	public function arrayToObject($array) {
		
		$obj = new stdClass;

		foreach($array as $k => $v) {
			if(strlen($k)) {
				if(is_array($v)) {
					$obj->{$k} = $this->arrayToObject($v); //RECURSION
				} else {
					$obj->{$k} = $v;
				}
			}
		}
		
		return $obj;
	}
	
}