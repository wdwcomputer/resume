<?php
class Error {
	
	public function dieOnError($e) {
		
		echo "<p>FATAL ERROR:<br />";
		echo "Code: " . $e->getCode() . "<br />";
		echo "Message: " . $e->getMessage() . "</p>";
		die;
		
	}
	
	public function dieOnString($s) {
		
		die($s);
		
	}
	
}