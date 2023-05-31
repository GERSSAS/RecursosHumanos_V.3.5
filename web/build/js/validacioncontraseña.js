const registro = document.getElementById('passwords');
const inputs = document.querySelectorAll('#passwords input');

const expresiones = {
	password: /^.{4,12}$/ // 4 a 12 digitos.
}
const campos = {
	ContraseñaVieja:false,
	ContraseñaNueva:false,
}
const validarmodal2=(e)=> {
    switch (e.target.name) {

        case "ContraseñaVieja":
            if (expresiones.password.test(e.target.value)) {
                document.getElementById('usu_contraseña').classList.remove('procesomalo');
                document.getElementById('usu_contraseña').classList.add('procesobueno');
                document.querySelector('#contenedorpassword2 .error').classList.remove("error-activo");
                campos['ContraseñaVieja']=true;
            } else {
                document.getElementById('usu_contraseña').classList.add('procesomalo');
                document.getElementById('usu_contraseña').classList.remove('procesobueno');
                document.querySelector('#contenedorpassword2 .error').classList.add("error-activo");
                campos['ContraseñaVieja']=false;
            }
            break;

        case "ContraseñaNueva":
            if (expresiones.password.test(e.target.value)) {
                document.getElementById('usu_contraseña2').classList.remove('procesomalo');
                document.getElementById('usu_contraseña2').classList.add('procesobueno');
                document.querySelector('#contenedorpassword3 .error').classList.remove("error-activo");
                campos['ContraseñaNueva']=true;
            } else {
                document.getElementById('usu_contraseña2').classList.add('procesomalo');
                document.getElementById('usu_contraseña2').classList.remove('procesobueno');
                document.querySelector('#contenedorpassword3 .error').classList.add("error-activo");
                campos['ContraseñaNueva']=false;
            }
            break;
    }
}
//ejecuta la funcion 
inputs.forEach((input) => {
    input.addEventListener('keyup', validarmodal2);
    input.addEventListener('blur', validarmodal2);
});
//que valide y no envie
registro.addEventListener('submit',(e) =>{

if (campos.ContraseñaNueva && campos.ContraseñaVieja){
    $(document).on("submit","#passwords",function(){
        swal("Se ha actualizado con exito!", "Presiona el boton!", "success");
        location.reload();
      });
    return true;
}else {
    e.preventDefault();
    alert("No tiene completos los campos o son datos invalidos");
    document.getElementById('formulario__mensaje').classList.add('formulario__mensaje-activo');
    return false;
}


});