<?php
require_once 'DatabaseCRUD.class.php';

class Database extends DatabaseCRUD {
	
	public function readAllNames() {
		
		parent::query();
		
	}
	
}