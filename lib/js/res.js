function permite(elEvento, permitidos){
	//variables que definen los caracteres permitidos
	var numeros = "0123456789";
	var letras = " abcdefghijklmnñopqrstuvwxyzABCDEFGHIJKLMNÑOPQRSTUVWXYZ";
	var num_letras = numeros + letras;
	var teclas_especiales = [8, 37, 39, 46];
		//8 = BackSpace, 46 = Supr, 37 = flecha izq, 39 = flecha derecha
		
		//seleccionar los caracteres apartir del parametro de la funcion
	switch(permitidos)	{
		case  'num':
					permitidos = numeros;
					break;
		
		case 'letras':
					permitidos = letras;
					break;
					
		case 'num_letras':
					permitidos = num_letras;
					break;
	}
	
		//obtener la tecla pulsada
	var evento = elEvento || window.event;
	var cod_caracter = evento.charCode || evento.keyCode;
	var caracter = String.fromCharCode(cod_caracter);
	
		//comprobar so ña tecña pulsada es alguna de las teclas especiales
				//teclas de borrado o flechas horizontales
	var tecla_especial = false;
		for(var i in teclas_especiales)	{
			if(cod_caracter == teclas_especiales[i])	{
				tecla_especial = true;
				break;
			}
		}
		
		//comprobar si la tecla pulsada se encuentra entre los caracteres permitidos
		//o si es una tecla especial
		return permitidos.indexOf(caracter) != -1 || tecla_especial;
}