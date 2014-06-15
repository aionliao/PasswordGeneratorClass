<?php 
/**
* Password generator class
*
* This class is helper for generating passwords with several parameters.
* By default it generates password 12 characters long, including digits, lower\uppercase characters and special symbols.
* 
* Basic Usage Example
* $password = new PasswordGenerator;
* echo $password->generate();
*
* Pin Code Generation example
* $password = new PasswordGenerator;
* $password->setPasswordLength(4);
* $password->setUseDigits( true );
* $password->setUseLowerChars( false );
* $password->setUseUpperChars( false );
* $password->setUseSpecialSymbols( false );
* echo $password->generate();
* 
* @package security
* @subpackage passwords
*/
class PasswordGenerator {
	private $_passwordLength = 12;

	private $_useDigits = true;
	private $_useLowerChars = true;
	private $_useUpperChars = true;
	private $_useSpecialSymbols = true;

	private $_digits = array('0','1','2','3','4','5','6','7','8','9');
	private $_lowerChars = array('a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z');
	private $_upperChars;
	private $_specialSymbols = array('!','@','#','$','%','^','&','*','(',')');

	function __construct() {
		$this->_upperChars = array_map( 'strtoupper', $this->getLowerChars() );
	}

	public function generate() {
		$password = '';
		$symbols = $this->getResultSymbolsSet();
		if( count($symbols) > 0 ) {
			for ($i = 0; $i < $this->getPasswordLength(); $i++ ) {
				$password .= $symbols[ rand(0, ( count( $symbols ) - 1 ) ) ];
			}
		}
		return str_shuffle( $password );
	}

	/* Setters And Getters */
	public function getPasswordLength() {
		return $this->_passwordLength;
	}
	public function setPasswordLength( $value ) {
		$this->_passwordLength = (int) $value;
	}
	public function getDigits() {
		return $this->_digits;
	}
	public function getLowerChars() {
		return $this->_lowerChars;
	}
	public function getUpperChars() {
		return $this->_upperChars;
	}
	public function getSpecialSymbols() {
		return $this->_specialSymbols;
	}
	public function getUseDigits() {
		return $this->_useDigits;
	}
	public function setUseDigits( $value ) {
		$this->_useDigits = (boolean) $value;
	}
	public function getUseLowerChars() {
		return $this->_useLowerChars;
	}
	public function setUseLowerChars( $value ) {
		$this->_useLowerChars = (boolean) $value;
	}
	public function getUseUpperChars() {
		return $this->_useUpperChars;
	}
	public function setUseUpperChars( $value ) {
		$this->_useUpperChars = (boolean) $value;
	}
	public function getUseSpecialSymbols() {
		return $this->_useSpecialSymbols;
	}
	public function setUseSpecialSymbols( $value ) {
		$this->_useSpecialSymbols = (boolean) $value;
	}
	public function getResultSymbolsSet() {
		$symbolsArray = array();
		if( $this->getUseDigits() ) $symbolsArray = array_merge( $symbolsArray, $this->getDigits() );
		if( $this->getUseLowerChars() ) $symbolsArray = array_merge( $symbolsArray, $this->getLowerChars() );
		if( $this->getUseUpperChars() ) $symbolsArray = array_merge( $symbolsArray, $this->getUpperChars() );
		if( $this->getUseSpecialSymbols() ) $symbolsArray = array_merge( $symbolsArray, $this->getSpecialSymbols() );
		return $symbolsArray;
	}
}
?>