
function validar_formulario()
{
	var bool = false;
	var frm = document.getElementById("formUsuario");
	for (i=0;i<frm.elements.length;i++)
	{
		bool = ((bool) || (frm.elements[i].value == ''));
	}
	if (bool){
		alert("Todos los campos deben ser completados");	
	}
	return !(bool);
}