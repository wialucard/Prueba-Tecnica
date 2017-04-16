<?php
session_start();
if(isset($_POST["submit"])){//to run PHP script on submit	
	//valores recibidos
	$seg = $_POST["seg"];	
	$registro_v = $_SESSION['registro'];//viejo registro
	$registro_n = array();//nuevo registro
	$registro_tem = array();//temporal registro
	$check_list = $_SESSION['check_list'];
	$ordenid=$_SESSION['ordenid'];
	$cuantos = $_SESSION['cuantos'];
	$resulo = count($check_list);//numero de filas
	$grua=0;$gru_va=0;
  	//valida si quiere eliminar registros
  	if($seg==0){		
		//Se elimina los registros
		$registro_tem = $registro_v;
		$uis = count($registro_tem); //numero de filas 
		for ($iu=0; $iu < $resulo; $iu++) {	
			$grua = $check_list[$iu];//indice a buscar
			$gru_va = $grua - $iu;
			$i=1;$j=1;
			//for para meter los registros viejos a los nuevos por temporal
			for ($i=1; $i <= $uis; $i++) {	 
					if($i==$gru_va){
						$j++;
						$registro_n[$i][0] = $i;
						$registro_n[$i][1] = $registro_tem[$j][1];
						$registro_n[$i][2] = $registro_tem[$j][2];
						$uis--;	
					}else{
						$registro_n[$i][0] = $i;
						$registro_n[$i][1] = $registro_tem[$j][1];
						$registro_n[$i][2] = $registro_tem[$j][2];
					}	
				$j++;													
			}			
			$registro_tem = $registro_n;			
		 }		
		//registros designados de arreglo1 a arreglo2
		for ($iue=1; $iue <= $cuantos; $iue++) {		
					for ($jue=0; $jue < 3; $jue++) {
						$ordenid[$iue][$jue] = $registro_tem[$iue][$jue]; 	
					}		     			
		} 		
		$_SESSION['ordenid']=$ordenid;
		//Se Actualiza la tabla
		$tabla = "";
			for ($iud=1; $iud <= $cuantos; $iud++) {	//for para crear filas de registros 
				$edi_eli = '<input type=\"checkbox\" name=\"check_list[]\" value=\"'.$iud.'\"/>';
				$tabla.='{
					  "id":"'.$ordenid[$iud][0].'",
					  "nombre":"'.$ordenid[$iud][1].'",
					  "apellido":"'.$ordenid[$iud][2].'",
					  "acciones":"'.$edi_eli.'"
					},';						
			}
		$tabla = substr($tabla,0, strlen($tabla) - 1);		
		$_SESSION['tabla']=$tabla;
		$_SESSION['registro'] = $registro_tem;		 
		echo "<script type=\"text/javascript\">alert(\"Eliminacion Completa\");document.location=\"listar.php\";</script>";	
 	 }else{ 
  		echo "<script type=\"text/javascript\">document.location=\"listar.php\";</script>";	
  	}
}
?>
