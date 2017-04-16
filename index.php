<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Prueba Paygo</title>
<link href="css/default.css" rel="stylesheet">
<script src="js/jquery.js"></script>
<script src="js/validate.js"></script>
</head>
<body>
<section>
<h2>Prueba Paygo</h2>
<FORM METHOD="POST" ACTION="php/escribir.php" enctype="multipart/form-data" id="subida" class="contact-form">
<div class="formulario">
    <p>
	<label>Numero de Registros a Consultar:</label>
	<input type="text" name="reg" id="reg" class="form-input">
	</p>
	<p>  
	<label>Tipo de Organizacion:</label>	    
		<select name="org">
 	 		<option value=0>Ascendente</option>
 	 		<option value=1>Desendente</option>  			
		</select>
	</p>
	<p>	
	<label>Elija el archivo CSV que desea abrir:</label>
	<input type="file" id="csv" name="csv"/>
	</p>
    <input class="form-btn" type="submit" value="Procesar" id="Procesar"/>  
	<input class="form-btn" type="reset" value="Limpiar"> 	
</div>
</form>
</section>
</body>
</html>
