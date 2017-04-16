$(function(){
	$('#subida').submit(function(){
		var comprobar = $('#csv').val().length;	
		var reg = $('#reg').val().length;
		var regu = $('#reg').value;		
		if (reg>0){ 
			if (isNaN(regu)==true || /^([0-9])*$/.test(regu)==true){
				if(comprobar>0){ //comprobar de que si exista	
		   			return true;	  		   		
				}else{			
					alert('Seleccione un archivo CSV');			
					return false;
				}										
		 	}else{						
				alert('Escriba un Numero Valido');			
				return false; 				
		 	}				     	
   		}else{			
			alert('Escribe un numero para registros');
			return false;			
		}
	});
});

