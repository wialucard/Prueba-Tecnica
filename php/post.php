<?php
//valida si el archivo es un CSV
session_start(); 
$tablas=$_SESSION['tabla'];
echo '{"data":['.$tablas.']}';	//arreglo 	
?>

