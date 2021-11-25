<?php
	$usuario = "txrlfgbv_tutorias";
	$password = "XannaxVarela1234";
	$servidor = "94.242.61.132";
	$basededatos = "txrlfgbv_tutorias";
	$conexion = mysqli_connect( $servidor, $usuario, $password ) or die ("No se ha podido conectar al servidor de Base de datos");
	$db = mysqli_select_db( $conexion, $basededatos ) or die ( "Upps! Pues va a ser que no se ha podido conectar a la base de datos" );

	/*function file_name($string) {
		// Tranformamos todo a minusculas
		$string = strtolower($string);
		//Rememplazamos caracteres especiales latinos
		$find = array('á', 'é', 'í', 'ó', 'ú', 'ñ');
		$repl = array('a', 'e', 'i', 'o', 'u', 'n');
		$string = str_replace($find, $repl, $string);
	
		// Añadimos los guiones
		$find = array(' ', '&', '\r\n', '\n', '+');
		$string = str_replace($find, '-', $string);
		// Eliminamos y Reemplazamos otros carácteres especiales
		$find = array('/[^a-z0-9\-<>]/', '/[\-]+/', '/<[^>]*>/');
		$repl = array('', '-', '');
		$string = preg_replace($find, $repl, $string);
		return $string;
	}*/
    
?>