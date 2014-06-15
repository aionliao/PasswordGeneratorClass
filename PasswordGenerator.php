<?php 
class PasswordGenerator {
	private $passwordLength = 8;

	public function generate() {
		$password = '';
		for ($i = 0; $i < $this->getPasswordLength(); $i++ ) {
			$password .= rand(0,9);
		}
		return $password;
	}

	public function getPasswordLength() {
		return $this->passwordLength;
	}
	public function setPasswordLength( int $value ) {
		$this->passwordLength = $value;
	}
}
?>