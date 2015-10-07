<?php

class Password
{

	public function __construct(){
		$this->checkBlowfish();
	}

	private function checkBlowfish(){
		if (!defined("CRYPT_BLOWFISH") && !CRYPT_BLOWFISH) {
			echo "Algoritmo Blowfish no esta soportado";
			die();
		}
	}

	//PHP >= 5.5.0
	static public function getPassword($password){
		$option = array(
			"cost" => 7	
		);

		$hash = password_hash($password, PASSWORD_BCRYPT, $option);

		return $hash;
	}

	static public function passwordVerify($pass1, $pass2){
		if (password_verify($pass1, $pass2)) {
			return true;
		}

		return false;	
	}
}
$verificador = new Password();

$password1 = "12345";
$password2 = 12345;
echo md5($password1);
echo "<br>";

$hash = Password::getPassword($password1);
echo $hash;
echo "<br>";
echo "<br>";
if(Password::passwordVerify($password2, $hash)){
	echo "Contraseñas validas";
}else{
	echo "Contraseñas invalidas";
}