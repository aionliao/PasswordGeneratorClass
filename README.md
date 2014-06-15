Password generator class
======================

This class is a helper for generating passwords with several parameters.
By default it generates password 12 characters long, including digits, lower\uppercase characters and special symbols.
 
! You need to include php class file first.

For example: include_once( 'include/PasswordGenerator.php' );

## Basic Usage Example
$password = new PasswordGenerator;

echo $password->generate();


## Pin Code Generation example
$password = new PasswordGenerator;

$password->setPasswordLength(4);

$password->setUseDigits( true );

$password->setUseLowerChars( false );

$password->setUseUpperChars( false );

$password->setUseSpecialSymbols( false );

echo $password->generate();

