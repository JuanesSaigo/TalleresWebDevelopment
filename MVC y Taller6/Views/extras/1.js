var alertList = document.querySelectorAll('.alert');
alertList.forEach(function (alert) {
    new bootstrap.Alert(alert)
});

const expresiones = {
	usuario: /^[a-zA-Z0-9\_\-]{5,20}$/, // Letras, numeros, guion y guion_bajo
	nombre: /^[a-zA-ZÀ-ÿ\s]{3,25}$/, // Letras y espacios, pueden llevar acentos.
	password: /^.{8,20}$/, // 15 a 20.
	email: /^[a-zA-Z0-9_.+-]{1,80}@[a-zA-Z0-9-]{3,25}\.[a-zA-Z0-9-.]{2,15}$/,
	digito: /^\d{7,14}$/, // 7 a 14 numeros.
    fnac: /^\d\d\/\d\d\/\d\d\d\d$/
}

const validarFormulario = (e) => {
    switch (e.target.name) {
        case "inp-nombre-p":
            if(expresiones.nombre.test(e.target.value)){
                e.target.classList.remove('is-invalid');
                e.target.classList.add('is-valid');
            }
            else{
                e.target.classList.remove('is-valid');
                e.target.classList.add('is-invalid');
            }   
        break;
        case "inp-apellido-p":
            if(expresiones.nombre.test(e.target.value)){
                e.target.classList.remove('is-invalid');
                e.target.classList.add('is-valid');
            }
            else{
                e.target.classList.remove('is-valid');
                e.target.classList.add('is-invalid');
            }  
        break;
        case "inp-fnac-p":
            if(expresiones.fnac.test(e.target.value)){
                e.target.classList.remove('is-invalid');
                e.target.classList.add('is-valid');
            }
            else{
                e.target.classList.remove('is-valid');
                e.target.classList.add('is-invalid');
            }  
        break;
        case "inp-user-p":
            if(expresiones.usuario.test(e.target.value)){
                e.target.classList.remove('is-invalid');
                e.target.classList.add('is-valid');
            }
            else{
                e.target.classList.remove('is-valid');
                e.target.classList.add('is-invalid');
            }  
        break;
        case "inp-pass-p":
            if(expresiones.password.test(e.target.value)){
                e.target.classList.remove('is-invalid');
                e.target.classList.add('is-valid');
            }
            else{
                e.target.classList.remove('is-valid');
                e.target.classList.add('is-invalid');
            }  
        break;
        case "inp-pass2-p":
            if(e.target.value == document.getElementById('inp-pass-p').value){
                e.target.classList.remove('is-invalid');
                e.target.classList.add('is-valid');
            }
            else{
                e.target.classList.remove('is-valid');
                e.target.classList.add('is-invalid');
            }  
        break;
        case "inp-email-p":
            if(expresiones.email.test(e.target.value)){
                e.target.classList.remove('is-invalid');
                e.target.classList.add('is-valid');
            }
            else{
                e.target.classList.remove('is-valid');
                e.target.classList.add('is-invalid');
            }  
        break;
    }
}

inputs.forEach((input)=>{
    input.addEventListener('keyup',validarFormulario);
    input.addEventListener('blur',validarFormulario);
    input.addEventListener('click',validarFormulario);
});