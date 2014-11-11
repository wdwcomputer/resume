<?php
class DatabaseCRUD {
	
	private $settings;
	private $db;
	private $selectString;
	private $insertString;
	private $updateString;
	private $whereString;
	private $orderString;
	private $limitInt;
	
	public function __construct() {
		
		$s = new Settings(_RESUME_SETTINGS_FILENAME);
		$this->settings = (object) $s->getSettings();
		
	}
	
	private function open() {
		
		$error = new Error();

		if (sizeof($this->settings) && is_object($this->settings)) {
			$dbEngine = (isset($this->settings->database->engine) ? $this->settings->database->engine : NULL);
			$dbServer = (isset($this->settings->database->server) ? $this->settings->database->server : NULL);
			$dbName = (isset($this->settings->database->name) ? $this->settings->database->name : NULL);
			$dbUser = (isset($this->settings->database->user) ? $this->settings->database->user : NULL);
			$dbPass = (isset($this->settings->database->pass) ? $this->settings->database->pass : NULL);

			$dbDsn = "{$dbEngine}:host={$dbServer};dbname={$dbName}";
			
			if ($dbEngine && $dbServer && $dbName && $dbUser) {
				try {
					$this->db = new PDO($dbDsn, $dbUser, $dbPass);
				} catch (PDOException $e) {
					$error->dieOnError($e);
				}
			} else {
				$error->dieOnString("ERROR: Missing arguments in connection to database.");
			}
		} else {
			$error->dieOnString("ERROR: Unable to read settings file.");
		}

		return TRUE;
		
	}
	
	private function close() {

		$error = new Error();
		
		try {
			$this->db = NULL;
		} catch (Exception $e) {
			$error->dieOnError($e);
		}

		return TRUE;
		
	}
	
	protected function where($whereText) {
		
		if ($whereText)
			$this->whereString = $whereText;
		else
			return FALSE;

		return TRUE;
	}
	
	protected function order($orderText) {
		
		if ($orderText)
			$this->orderString = $orderText;
		else
			return FALSE;

		return TRUE;
		
	}
	
	protected function limit($limitNum) {
		
		if ($limitNum)
			$this->limitInt = intval($limitNum);
		else
			return FALSE;

		return TRUE;
		
	}
	
	protected function select($selectText) {
		
		if ($selectText)
			$this->selectString = $selectText;
		else
			return FALSE;

		return TRUE;
		
	}
	
	protected function insert($insertText) {
		
		if ($insertText)
			$this->insertString = $insertText;
		else
			return FALSE;

		return TRUE;
		
	}
	
	protected function update($updateText) {
		
		if ($updateText)
			$this->updateString = $updateText;
		else
			return FALSE;

		return TRUE;
		
	}
	
	protected function query() {
		
		$this->open();
		$this->close();
		
	}
	
}