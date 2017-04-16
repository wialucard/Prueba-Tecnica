<?php
session_start();
if(isset($_POST["submit"])){//to run PHP script on submit	
	//valores recibidos
	$regis1 = array();//array donde va la info 1
	$regis2 = array();//array donde va la info 2	
	$regis1 = $_POST["regis_edit1"];
	$regis2 = $_POST["regis_edit2"];
	//variables sesion
	$check = $_SESSION['check_list'];
	$ordenid=$_SESSION['ordenid'];
	$cuantos = $_SESSION['cuantos'];
	$resulo = count($check);//numero de filas	
	$grua=0;
	//Se edita el registro
	for ($iu=0; $iu < $resulo; $iu++) {	
		$grua = $check[$iu];//indice de ordenide
		$ordenid[$grua][1] = $regis1[$iu];
		$ordenid[$grua][2] = $regis2[$iu];
	}
	$_SESSION['ordenid']=$ordenid;
	//Se Actualiza la tabla
	$tabla = "";
		for ($iu=1; $iu <= $cuantos; $iu++) {	//for para crear filas de registros 
			$edi_eli = '<input type=\"checkbox\" name=\"check_list[]\" value=\"'.$iu.'\"/>';
			$tabla.='{
				  "id":"'.$ordenid[$iu][0].'",
				  "nombre":"'.$ordenid[$iu][1].'",
				  "apellido":"'.$ordenid[$iu][2].'",
				  "acciones":"'.$edi_eli.'"
				},';		
		}
	$tabla = substr($tabla,0, strlen($tabla) - 1);		
	$_SESSION['tabla']=$tabla; 
	echo "<script type=\"text/javascript\">alert(\"Edicion Completa\");document.location=\"listar.php\";</script>";	
}
?>
