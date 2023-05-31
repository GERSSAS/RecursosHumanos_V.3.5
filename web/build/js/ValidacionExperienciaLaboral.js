const Experienciaform = document.getElementById('alertaexperiencia');
const inputexp = document.querySelectorAll('#alertaexperiencia input');



const expresionesexp = {
    usuario: /^[a-zA-Z0-9\_\-]{4,16}$/, // Letras, numeros, guion y guion_bajo
    password: /^.{4,12}$/, // 4 a 12 digitos.
    nombre: /^[a-zA-ZÀ-ÿ\s]{1,40}$/, // Letras y espacios, pueden llevar acentos.
    fecha: /^(?:(?:31(\/|-|\.)(?:0?[13578]|1[02]))\1|(?:(?:29|30)(\/|-|\.)(?:0?[13-9]|1[0-2])\2))(?:(?:1[6-9]|[2-9]\d)?\d{2})$|^(?:29(\/|-|\.)0?2\3(?:(?:(?:1[6-9]|[2-9]\d)?(?:0[48]|[2468][048]|[13579][26])|(?:(?:16|[2468][048]|[3579][26])00))))$|^(?:0?[1-9]|1\d|2[0-8])(\/|-|\.)(?:(?:0?[1-9])|(?:1[0-2]))\4(?:(?:1[6-9]|[2-9]\d)?\d{2})$/,
}
const camposexp = {
    hist_fecha_inicio: false,
    hist_fecha_fin: false,
    hist_cargo: false,
    hist_empresa: false,
    hist_ciudad: false,
    hist_pais: false,
 
}
const validarexp = (e) => {
    switch (e.target.name) {

        case "hist_fecha_inicio":
            if (expresionesexp.password.test(e.target.value)) {
                document.getElementById('hist_fecha_inicio').classList.remove('procesomalo');
                document.getElementById('hist_fecha_inicio').classList.add('procesobueno');
                document.querySelector('#cont_fecha_inicio .error').classList.remove("error-activo");
                camposexp['hist_fecha_inicio'] = true;
            } else {
                document.getElementById('hist_fecha_inicio').classList.add('procesomalo');
                document.getElementById('hist_fecha_inicio').classList.remove('procesobueno');
                document.querySelector('#cont_fecha_inicio .error').classList.add("error-activo");
                camposexp['hist_fecha_inicio'] = false;
            }
            break;

        case "hist_fecha_fin":
            if (expresionesexp.password.test(e.target.value)) {
                document.getElementById('hist_fecha_fin').classList.remove('procesomalo');
                document.getElementById('hist_fecha_fin').classList.add('procesobueno');
                document.querySelector('#cont_fecha_final .error').classList.remove("error-activo");
                camposexp['hist_fecha_fin'] = true;
            } else {
                document.getElementById('hist_fecha_fin').classList.add('procesomalo');
                document.getElementById('hist_fecha_fin').classList.remove('procesobueno');
                document.querySelector('#cont_fecha_final .error').classList.add("error-activo");
                camposexp['hist_fecha_fin'] = false;
            }
            break;
        case "hist_cargo":
            if (expresionesexp.nombre.test(e.target.value)) {
                document.getElementById('hist_cargo').classList.remove('procesomalo');
                document.getElementById('hist_cargo').classList.add('procesobueno');
                document.querySelector('#cont_hist_cargo .error').classList.remove("error-activo");
                camposexp['hist_cargo'] = true;
            } else {
                document.getElementById('hist_cargo').classList.add('procesomalo');
                document.getElementById('hist_cargo').classList.remove('procesobueno');
                document.querySelector('#cont_hist_cargo .error').classList.add("error-activo");
                camposexp['hist_cargo'] = false;
            }
            break;
        case "hist_empresa":
            if (expresionesexp.password.test(e.target.value)) {
                document.getElementById('hist_empresa').classList.remove('procesomalo');
                document.getElementById('hist_empresa').classList.add('procesobueno');
                document.querySelector('#cont_empresa .error').classList.remove("error-activo");
                camposexp['hist_empresa'] = true;
            } else {
                document.getElementById('hist_empresa').classList.add('procesomalo');
                document.getElementById('hist_empresa').classList.remove('procesobueno');
                document.querySelector('#cont_empresa .error').classList.add("error-activo");
                camposexp['hist_empresa'] = false;
            }
            break;
        case "hist_ciudad":
            if (expresionesexp.password.test(e.target.value)) {
                document.getElementById('hist_ciudad').classList.remove('procesomalo');
                document.getElementById('hist_ciudad').classList.add('procesobueno');
                document.querySelector('#cont_ciudad .error').classList.remove("error-activo");
                camposexp['hist_ciudad'] = true;
            } else {
                document.getElementById('hist_ciudad').classList.add('procesomalo');
                document.getElementById('hist_ciudad').classList.remove('procesobueno');
                document.querySelector('#cont_ciudad .error').classList.add("error-activo");
                camposexp['hist_ciudad'] = false;
            }
            break;
        case "hist_pais":
            if (expresionesexp.password.test(e.target.value)) {
                document.getElementById('hist_pais').classList.remove('procesomalo');
                document.getElementById('hist_pais').classList.add('procesobueno');
                document.querySelector('#cont_pais .error').classList.remove("error-activo");
                camposexp['hist_pais'] = true;
            } else {
                document.getElementById('hist_pais').classList.add('procesomalo');
                document.getElementById('hist_pais').classList.remove('procesobueno');
                document.querySelector('#cont_pais .error').classList.add("error-activo");
                camposexp['hist_pais'] = false;
            }
            break;
    }
}
//ejecuta la funcion 
inputexp.forEach((input) => {
    input.addEventListener('keyup', validarexp);
    input.addEventListener('blur', validarexp);
});



//que valide y no envie
Experienciaform.addEventListener('submit', (e) => {

    if (camposexp.hist_fecha_inicio && camposexp.hist_fecha_fin && camposexp.hist_cargo && camposexp.hist_empresa && camposexp.hist_ciudad && camposexp.hist_pais) {
        $(document).on("submit", "#alertaexperiencia", function () {
            swal("Se ha agregado con exito!", "Presiona el boton!", "success");
            location.reload(5000);
        });
        return true;
    } else {
        e.preventDefault();
        alert("No tiene completos los campos llenos o son datos invalidos");
        return false;
    }


});