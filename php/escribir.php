<?php
session_start();
$cs = $_FILES["csv"]["name"];
$explode_name = explode(".",$cs);
$trozos = end($explode_name);
//valida si el archivo es un CSV
if($trozos=="csv"){	
	$csvs = $_FILES["csv"]["tmp_name"];
	$cuantos = $_POST["reg"]; //numero de registros a imprimir
	$acen_decen = $_POST["org"];//acendente o decentende
	$gestor = fopen($csvs, "r");//abrir como lectura
	$nombres_campos = fgetcsv($gestor,0, ",");
	$numero = count($nombres_campos);//numero de columnas
	$uai="";
	//crear y llenar el arreglo 1 con todos los registros
	$ui=1;$uis=0;
	$registro = array(); //arreglo1
	$ordenid = array(); //arreglo2
	while ($datos = fgetcsv($gestor,0,",")){
			for ($c=0; $c < $numero; $c++) {			
				$registro[$ui][$c] = $datos[$c];
    	   }
		$ui++;				
	}
	$uis=$ui-1;//tamaño total del arreglo
	$_SESSION['uis'] = $uis; 	
	$_SESSION['registro'] = $registro;
	//Verificacion de mismo tamaño de regristos a consultar
	if($cuantos <= $uis){	
	 $ec=0;
		//registros designados de arreglo1 a arreglo2
		for ($iu=1; $iu <= $cuantos; $iu++) {		
					for ($ju=0; $ju < $numero; $ju++) {
						$ordenid[$iu][$ju] = $registro[$iu][$ju]; 	
					}		     			
		}  
		$_SESSION['ordenid'] = $ordenid; 	
		$_SESSION['cuantos'] = $cuantos;
		fclose($gestor);
	}else{
	 $ec=1;
	}
	//validacion para que no exceda el numero de registros
	if($ec == 0){
		$tabla = "";
		//Tipo de Orden de registros por id Ascendente/Descendente
		if($acen_decen == 0){		 	
			$uai="Ascendente";					
			for ($iu=1; $iu <= $cuantos; $iu++) {	//for para crear filas de registros 
			$edi_eli = '<input type=\"checkbox\" name=\"check_list[]\" value=\"'.$iu.'\"/>';
			$tabla.='{
				  "id":"'.$ordenid[$iu][0].'",
				  "nombre":"'.$ordenid[$iu][1].'",
				  "apellido":"'.$ordenid[$iu][2].'",
				  "acciones":"'.$edi_eli.'"
				},';		
			}		
		}else{  			
			$uai="Descendente";			
			for ($iu=$cuantos; $iu >= 1; $iu--) {	//for para crear filas de registros 
			$edi_eli = '<input type=\"checkbox\" name=\"check_list[]\" value=\"'.$iu.'\"/>';
			$tabla.='{
				  "id":"'.$ordenid[$iu][0].'",
				  "nombre":"'.$ordenid[$iu][1].'",
				  "apellido":"'.$ordenid[$iu][2].'",
				  "acciones":"'.$edi_eli.'"
				},';		
			}
		}	
		$tabla = substr($tabla,0, strlen($tabla) - 1);		
		$_SESSION['tabla']=$tabla; 
		echo "<script type=\"text/javascript\">alert(\"Se mostraran ".$cuantos." de los ".$uis." registros que tiene el archivo en forma ".$uai."\");document.location=\"listar.php\";</script>";  								
	}else{
		echo "<script type=\"text/javascript\">alert(\"El numero ".$cuantos." excede los ".$uis." registros que tiene el archivo, vuelve a intentarlo\");document.location=\"../index.php\";</script>";						 		
	}
}else{ 
	echo "<script type=\"text/javascript\">alert(\"El archivo ingresado no es un CSV, vuelve a intentarlo\");document.location=\"../index.php\";</script>";
}
?>

