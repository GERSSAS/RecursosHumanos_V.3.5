const registro = document.getElementById('registro');
const inputs = document.querySelectorAll('#registro input');

const expresiones = {
	usuario: /^[a-zA-Z0-9\_\-]{4,16}$/, // Letras, numeros, guion y guion_bajo
	nombre: /^[a-zA-ZÀ-ÿ\s]{1,40}$/, // Letras y espacios, pueden llevar acentos.
	password: /^.{4,12}$/, // 4 a 12 digitos.
	correo: /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/,
	telefono: /^\d{7,14}$/ // 7 a 14 numeros.
}
const campos = {
	usu_correo:false,
	usu_nombre:false,
	usu_apellido:false,
	usu_telefono:false,
	usu_pais_residencia:false,
	usu_residencia:false,
	usu_tipo_documento:false,
	usu_documento:false,
	usu_contraseña:false,
}
const validarmodal2=(e)=> {
    switch (e.target.name) {
        case "usu_nombre":
            if (expresiones.nombre.test(e.target.value)) {
                document.getElementById('usu_nombre').classList.remove('procesomalo');
                document.getElementById('usu_nombre').classList.add('procesobueno');
                document.querySelector('#contenedorname .error').classList.remove("error-activo");
                campos['usu_nombre']=true;
            } else {
                document.getElementById('usu_nombre').classList.add('procesomalo');
                document.getElementById('usu_nombre').classList.remove('procesobueno');
                document.querySelector('#contenedorname .error').classList.add("error-activo");
                campos['usu_nombre']=false;
            }
            break;
        case "usu_apellido":
            if (expresiones.nombre.test(e.target.value)) {
                document.getElementById('usu_apellido').classList.remove('procesomalo');
                document.getElementById('usu_apellido').classList.add('procesobueno');
                document.querySelector('#contenedorlastname .error').classList.remove("error-activo");
                campos['usu_apellido']=true;
            } else {
                document.getElementById('usu_apellido').classList.add('procesomalo');
                document.getElementById('usu_apellido').classList.remove('procesobueno');
                document.querySelector('#contenedorlastname .error').classList.add("error-activo");
                campos['usu_apellido']=false;
            }
            break;
        case "usu_correo":
            if (expresiones.correo.test(e.target.value)) {
                document.getElementById('usu_correo').classList.remove('procesomalo');
                document.getElementById('usu_correo').classList.add('procesobueno');
                document.querySelector('#contenedoremail .error').classList.remove("error-activo");
                campos['usu_correo']=true;
            } else {
                document.getElementById('usu_correo').classList.add('procesomalo');
                document.getElementById('usu_correo').classList.remove('procesobueno');
                document.querySelector('#contenedoremail .error').classList.add("error-activo");
                campos['usu_correo']=false;
            }
            break;
        // case "usu_telefono":
        //     if (expresiones.telefono.test(e.target.value)) {
        //         document.getElementById('usu_telefono').classList.remove('procesomalo');
        //         document.getElementById('usu_telefono').classList.add('procesobueno');
        //         document.querySelector('#contenedorphone .error').classList.remove("error-activo");
        //         campos['usu_telefono']=true;
        //     } else {
        //         document.getElementById('usu_telefono').classList.add('procesomalo');
        //         document.getElementById('usu_telefono').classList.remove('procesobueno');
        //         document.querySelector('#contenedorphone .error').classList.add("error-activo");
        //         campos['usu_telefono']=false;
        //     }
        //     break;
        // case "usu_pais_residencia":
        //     if (expresiones.nombre.test(e.target.value)) {
        //         document.getElementById('usu_pais_residencia').classList.remove('procesomalo');
        //         document.getElementById('usu_pais_residencia').classList.add('procesobueno');
        //         document.querySelector('#contenedorcountry .error').classList.remove("error-activo");
        //         campos['usu_pais_residencia']=true;
        //     } else {
        //         document.getElementById('usu_pais_residencia').classList.add('procesomalo');
        //         document.getElementById('usu_pais_residencia').classList.remove('procesobueno');
        //         document.querySelector('#contenedorcountry .error').classList.add("error-activo");
        //         campos['usu_pais_residencia']=false;
        //     }
        //     break;
        // case "usu_residencia":
        //     if (expresiones.nombre.test(e.target.value)) {
        //         document.getElementById('usu_residencia').classList.remove('procesomalo');
        //         document.getElementById('usu_residencia').classList.add('procesobueno');
        //         document.querySelector('#contenedorcity .error').classList.remove("error-activo");
        //         campos['usu_residencia']=true;
        //     } else {
        //         document.getElementById('usu_residencia').classList.add('procesomalo');
        //         document.getElementById('usu_residencia').classList.remove('procesobueno');
        //         document.querySelector('#contenedorcity .error').classList.add("error-activo");
        //         campos['usu_residencia']=false;
        //     }
        //     break;
        // case "usu_documento":
        //     if (expresiones.telefono.test(e.target.value)) {
        //         document.getElementById('usu_documento').classList.remove('procesomalo');
        //         document.getElementById('usu_documento').classList.add('procesobueno');
        //         document.querySelector('#contenedordocumento .error').classList.remove("error-activo");
        //         campos['usu_documento']=true;
        //     } else {
        //         document.getElementById('usu_documento').classList.add('procesomalo');
        //         document.getElementById('usu_documento').classList.remove('procesobueno');
        //         document.querySelector('#contenedordocumento .error').classList.add("error-activo");
        //         campos['usu_documento']=false;
        //     }
        //     break;
        case "usu_contraseña":
            if (expresiones.password.test(e.target.value)) {
                document.getElementById('usu_contraseña').classList.remove('procesomalo');
                document.getElementById('usu_contraseña').classList.add('procesobueno');
                document.querySelector('#contenedorpassword .error').classList.remove("error-activo");
                campos['usu_contraseña']=true;
            } else {
                document.getElementById('usu_contraseña').classList.add('procesomalo');
                document.getElementById('usu_contraseña').classList.remove('procesobueno');
                document.querySelector('#contenedorpassword .error').classList.add("error-activo");
                campos['usu_contraseña']=false;
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

if (campos.usu_nombre && campos.usu_apellido && campos.usu_correo  && campos.usu_contraseña){
    return true;
}else {
    e.preventDefault();
    alert("No tiene completos los campos o son datos invalidos");
    document.getElementById('formulario__mensaje').classList.add('formulario__mensaje-activo');
    return false;
}
});