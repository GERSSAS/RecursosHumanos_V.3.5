const login = document.getElementById('login');
const inputslogin = document.querySelectorAll('#login input');

const expresioneslogin = {
	usuario: /^[a-zA-Z0-9\_\-]{4,16}$/, // Letras, numeros, guion y guion_bajo
	nombre: /^[a-zA-ZÀ-ÿ\s]{1,40}$/, // Letras y espacios, pueden llevar acentos.
	password: /^.{4,12}$/, // 4 a 12 digitos.
	correo: /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/,
	telefono: /^\d{7,14}$/ // 7 a 14 numeros.
}
const camposlogin = {
	usu_correo:false,
	usu_contraseña:false,
}
const validarmodal2=(e)=> {
    switch (e.target.name) {
        case "usu_correo":
            if (expresioneslogin.correo.test(e.target.value)) {
                document.getElementById('usu_correo').classList.remove('procesomalo');
                document.getElementById('usu_correo').classList.add('procesobueno');
                document.querySelector('#contenedor .error').classList.remove("error-activo");
                camposlogin['usu_correo']=true;
            } else {
                document.getElementById('usu_correo').classList.add('procesomalo');
                document.getElementById('usu_correo').classList.remove('procesobueno');
                document.querySelector('#contenedor .error').classList.add("error-activo");
                camposlogin['usu_correo']=false;
            }
            break;
        case "usu_contraseña":
            if (expresioneslogin.password.test(e.target.value)) {
                document.getElementById('usu_contraseña').classList.remove('procesomalo');
                document.getElementById('usu_contraseña').classList.add('procesobueno');
                document.querySelector('#contenedorcontra .error').classList.remove("error-activo");
                camposlogin['usu_contraseña']=true;
            } else {
                document.getElementById('usu_contraseña').classList.add('procesomalo');
                document.getElementById('usu_contraseña').classList.remove('procesobueno');
                document.querySelector('#contenedorcontra .error').classList.add("error-activo");
                camposlogin['usu_contraseña']=false;
            }
            break;
    }
}
//ejecuta la funcion 
inputslogin.forEach((input) => {
    input.addEventListener('keyup', validarmodal2);
    input.addEventListener('blur', validarmodal2);
});
//que valide y no envie
login.addEventListener('submit',(e) =>{

if (camposlogin.usu_correo && camposlogin.usu_contraseña){
    return true;
}else {
    e.preventDefault();
    alert("no tiene completos los campos o tiene datos invalidos");
    document.getElementById('formulario__mensaje').classList.add('formulario__mensaje-activo');
    return false;
}
});