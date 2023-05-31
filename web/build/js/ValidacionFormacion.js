const registro2 = document.getElementById('alertaformacion');
const inputs1 = document.querySelectorAll('#alertaformacion input');


const expresiones2 = {
    usuario: /^[a-zA-Z0-9\_\-]{4,16}$/, // Letras, numeros, guion y guion_bajo
    password: /^.{4,12}$/, // 4 a 12 digitos.
    nombre: /^[a-zA-ZÀ-ÿ\s]{1,40}$/, // Letras y espacios, pueden llevar acentos.
    fecha: /^(?:(?:31(\/|-|\.)(?:0?[13578]|1[02]))\1|(?:(?:29|30)(\/|-|\.)(?:0?[13-9]|1[0-2])\2))(?:(?:1[6-9]|[2-9]\d)?\d{2})$|^(?:29(\/|-|\.)0?2\3(?:(?:(?:1[6-9]|[2-9]\d)?(?:0[48]|[2468][048]|[13579][26])|(?:(?:16|[2468][048]|[3579][26])00))))$|^(?:0?[1-9]|1\d|2[0-8])(\/|-|\.)(?:(?:0?[1-9])|(?:1[0-2]))\4(?:(?:1[6-9]|[2-9]\d)?\d{2})$/,
}
const campos2 = {
    form_tituloname: false,
    form_nombre: false,
    form_conocimientos: false,
    form_fecha_fin: false,
 
}
const validarmodal1 = (e) => {
    switch (e.target.name) {

        case "form_tituloname":
            if (expresiones2.nombre.test(e.target.value)) {
                document.getElementById('form_tituloname').classList.remove('procesomalo');
                document.getElementById('form_tituloname').classList.add('procesobueno');
                document.querySelector('#cont_tituloname .error').classList.remove("error-activo");
                campos2['form_tituloname'] = true;
            } else {
                document.getElementById('form_tituloname').classList.add('procesomalo');
                document.getElementById('form_tituloname').classList.remove('procesobueno');
                document.querySelector('#cont_tituloname .error').classList.add("error-activo");
                campos2['form_tituloname'] = false;
            }
            break;

        case "form_nombre":
            if (expresiones2.nombre.test(e.target.value)) {
                document.getElementById('form_nombre').classList.remove('procesomalo');
                document.getElementById('form_nombre').classList.add('procesobueno');
                document.querySelector('#cont_nombre .error').classList.remove("error-activo");
                campos2['form_nombre'] = true;
            } else {
                document.getElementById('form_nombre').classList.add('procesomalo');
                document.getElementById('form_nombre').classList.remove('procesobueno');
                document.querySelector('#cont_nombre .error').classList.add("error-activo");
                campos2['form_nombre'] = false;
            }
            break;
        case "form_conocimientos":
            if (expresiones2.nombre.test(e.target.value)) {
                document.getElementById('form_conocimientos').classList.remove('procesomalo');
                document.getElementById('form_conocimientos').classList.add('procesobueno');
                document.querySelector('#cont_conocimientos .error').classList.remove("error-activo");
                campos2['form_conocimientos'] = true;
            } else {
                document.getElementById('form_conocimientos').classList.add('procesomalo');
                document.getElementById('form_conocimientos').classList.remove('procesobueno');
                document.querySelector('#cont_conocimientos .error').classList.add("error-activo");
                campos2['form_conocimientos'] = false;
            }
            break;
        case "form_fecha_fin":
            if (expresiones2.password.test(e.target.value)) {
                document.getElementById('form_fecha_fin').classList.remove('procesomalo');
                document.getElementById('form_fecha_fin').classList.add('procesobueno');
                document.querySelector('#cont_fecha_fin .error').classList.remove("error-activo");
                campos2['form_fecha_fin'] = true;
            } else {
                document.getElementById('form_fecha_fin').classList.add('procesomalo');
                document.getElementById('form_fecha_fin').classList.remove('procesobueno');
                document.querySelector('#cont_fecha_fin .error').classList.add("error-activo");
                campos2['form_fecha_fin'] = false;
            }
            break;
    }
}
//ejecuta la funcion 
inputs1.forEach((input) => {
    input.addEventListener('keyup', validarmodal1);
    input.addEventListener('blur', validarmodal1);
});


//que valide y no envie
registro2.addEventListener('submit', (e) => {

    if (campos2.form_tituloname && campos2.form_nombre && campos2.form_conocimientos && campos2.form_fecha_fin) {
        $(document).on("submit", "#alertaformacion", function () {
            swal("Se ha agregado con exito!", "Presiona el boton!", "success");
            // location.reload();
            await new Promise(r => setTimeout(r, 2000))
        });
        return true;
    } else {
        e.preventDefault();
        alert("No tiene hhhcompletos los campos llenos o son datos invalidos");
        return false;
    }


});