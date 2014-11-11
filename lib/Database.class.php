<?php
require_once 'DatabaseCRUD.class.php';

class Database extends DatabaseCRUD {
	
	public function readAllNames() {
		
		parent::query();
		
	}
	
	public function special($request) {
		
		// TODO: Queries such as table names, column comments, row count, and so on...
		
	}
	
}