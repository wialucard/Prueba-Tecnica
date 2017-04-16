<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Usuarios</title>
	<!--CSS-->    
    <link rel="stylesheet" href="../media/css/bootstrap.css">
    <link rel="stylesheet" href="../media/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="../media/font-awesome/css/font-awesome.css">
    <!--Javascript-->    
    <script src="../media/js/jquery-1.10.2.js"></script>
    <script src="../media/js/jquery.dataTables.min.js"></script>
    <script src="../media/js/dataTables.bootstrap.min.js"></script>          
    <script src="../media/js/bootstrap.js"></script>
    <script src="../media/js/lenguajeusuario.js"></script>     
    <script>
    $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip(); 			
	});
    </script>        
</head>
<body>
<div class="col-md-8 col-md-offset-2">
    <h1>Registros</h1>  
</div>
<div class="col-md-8 col-md-offset-2" style="width:800px;"> 
<FORM METHOD="POST" ACTION="../php/edieli.php">
 	<table id="tuba" class="table table-striped table-bordered" cellspacing="0" >
     <thead>
		<tr>
			<th>Id</th>
       	    <th>Nombre</th>
       	    <th>Apellido</th>
            <th></th>            
		</tr>
	</thead>
    <tbody>
    </tbody>
	</table> 
  <div align="right">
  	<a href="../index.php" style="margin-right:30px;">Regresar al inicio </a>
    <label>Editar<label><input type="checkbox" name="eli" value="0" style="margin-right:10px;margin-left:10px;"/>
    <label>Eliminar<label><input type="checkbox" name="eli" value="1" style="margin-right:10px;margin-left:10px;"/>
    <button type="submit" name="submit" value="Submit">Procesar</button>   
  </div> 
</form>
</div>
</body>
</html>
