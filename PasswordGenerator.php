<?php 
class PasswordGenerator {
	public function generate() {
		$password = rand(5, 15);
		return $password;
	}
}
?>