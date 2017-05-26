function validarEmail() {
	var email = document.getElementById("email");
   	if ((email.includes('@')) && (email.includes('.'))) {
       alert("Error: La dirección de correo es incorrecta.");
       return false;
    }
    return true;
}


function validar_formulario()
{
	var bool = false;
	var frm = document.getElementById("formUsuario");
	for (i=0;i<frm.elements.length;i++)
	{
		if (frm.elements[i].id!='imagen') {
			bool = ((bool) || (frm.elements[i].value == ''));
		}
	}
	if (bool){
		alert("Todos los campos con * deben ser completados");	
	}
	return (!bool);
}

function validar(){
	return (validarEmail() && validar_formulario());
}