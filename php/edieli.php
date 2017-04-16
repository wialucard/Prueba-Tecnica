<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Usuarios</title>
	<!--CSS-->    
    <link rel="stylesheet" href="../media/css/bootstrap.css">
    <link rel="stylesheet" href="../media/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="../media/font-awesome/css/font-awesome.css">
</head>
<body>
<div class="col-md-8 col-md-offset-2">
    <h1>Editar o Eliminar Registro</h1>  
</div>  
<div class="col-md-8 col-md-offset-2" style="width:600px;"> 
<?php
session_start();
if(isset($_POST["submit"])){//to run PHP script on submit		
	if(isset($_POST['eli'])){			
 		if(!empty($_POST["check_list"])){		
			$ordenide = $_SESSION['ordenid'];	
			$check_list = $_POST["check_list"];
			$_SESSION['check_list'] = $check_list;//
			$resulo = count($check_list);//numero de filas	
			
			//Editar 
			if($_POST['eli']==0){				
					?>
					<FORM METHOD="POST" ACTION="editar.php">
                    <table id="tabla" class="table table-striped table-bordered" cellspacing="0">
					<thead bgcolor="#A6DBF1">
					<tr>
						<th>Id</th>
       	    			<th>Nombre</th>
       	    			<th>Apellido</th>            			           
					</tr>
					</thead>
    				<tbody>   
                    <?php
					$grua=0;
					$regis_edit1 = array();//array donde va la info 1
					$regis_edit2 = array();//array donde va la info 2
					for ($iu=0; $iu < $resulo; $iu++) {	
					$grua = $check_list[$iu];//indice de ordenide
					?>  
                    <tr>                  
                    	<th><?php echo $ordenide[$grua][0]; ?></th>
                        <th><input type="text" name="regis_edit1[]" value="<?php echo $ordenide[$grua][1]; ?>"></th>  
                        <th><input type="text" name="regis_edit2[]" value="<?php echo $ordenide[$grua][2]; ?>"></th>     					     				</tr>
					<?php
					}
                    ?>                    
                     </tbody>
					 </table>
                    <input type="submit" name="submit" value="Editar" id="Editar" />
                    </form>					
					<?php							
			}else{ 
			
			//Eliminar
				?>
					<FORM METHOD="POST" ACTION="eliminar.php">
                    <table id="tabla" class="table table-striped table-bordered" cellspacing="0">
					<thead bgcolor="#A6DBF1">
					<tr>
						<th>Id</th>
       	    			<th>Nombre</th>
       	    			<th>Apellido</th>            			           
					</tr>
					</thead>
    				<tbody>   
                    <?php
					$grua=0;
					for ($iu=0; $iu < $resulo; $iu++) {	
					$grua = $check_list[$iu];
					?>  
                    <tr>                  
                    	<th><?php echo $ordenide[$grua][0]; ?></th>
                        <th><?php echo $ordenide[$grua][1]; ?></th>  
                        <th><?php echo $ordenide[$grua][2]; ?></th>     					 
    				</tr>
					<?php
					}
                    ?>                    
                     </tbody>
					 </table>
                     
                     <br/>Esta seguro de eliminar estos registros?
					<select name="seg">
  						<option value=0>Si</option>
  						<option value=1>No</option>  			
					</select>
                    <input type="submit" name="submit" value="Procesar" />
                    </form>					
				<?php			
			}									
		}else{ 
			echo "<script type=\"text/javascript\">alert(\"No has selecionado ninguna fila, vuelve a intentarlo\");document.location=\"listar.php\";</script>";
		}		
	}else{
		echo "<script type=\"text/javascript\">alert(\"No has elegido un proceso, vuelve a intentarlo\");document.location=\"listar.php\";</script>";
	}
}
?>
</div>
</body>
</html>