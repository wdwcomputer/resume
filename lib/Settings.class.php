<?php
class Settings {
	
	private $settings;
	
	public function __construct($settingsFile) {

		$error = new Error();
		$arrays = new Arrays();

		if ($settingsFile && file_exists($settingsFile)) {
			try {
				$this->settings = $arrays->arrayToObject(parse_ini_file($settingsFile, true));
			} catch (Exception $e) {
				$error->dieOnError($e);
			}
		} else {
			$error->dieOnString("ERROR: Cannot finc settings file.");
		}
		
		return TRUE;
		
	}
	
	public function getSettings() {
		
		return $this->settings;
		
	}
	
}