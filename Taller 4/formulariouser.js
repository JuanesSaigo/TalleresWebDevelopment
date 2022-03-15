const formulario = document.getElementById('formulario');
const inputs = document.querySelectorAll('#formulario input');

const expresiones = {
	usuario: /^[a-zA-Z0-9\_\-]{10,20}$/, // Letras, numeros, guion y guion_bajo
	nombre: /^[a-zA-ZÀ-ÿ\s]{1,25}$/, // Letras y espacios, pueden llevar acentos.
	password: /^.{15,20}$/, // 15 a 20.
	email: /^[a-zA-Z0-9_.+-]{1,80}@[a-zA-Z0-9-]{2,25}\.[a-zA-Z0-9-.]{2,15}$/,
	digito: /^\d{7,14}$/, // 7 a 14 numeros.
    direccion: /^(cll|cra|av|anv|trans)[\s-].{6,120}$/
}


const validarFormulario = (e) => {
    switch (e.target.name) {
        case "idusuario":
            if(expresiones.digito.test(e.target.value)){
                e.target.classList.remove('is-invalid');
                e.target.classList.add('is-valid');
            }
            else{
                e.target.classList.remove('is-valid');
                e.target.classList.add('is-invalid');
            }  
        break;
        case "nombre":
            if(expresiones.nombre.test(e.target.value)){
                e.target.classList.remove('is-invalid');
                e.target.classList.add('is-valid');
            }
            else{
                e.target.classList.remove('is-valid');
                e.target.classList.add('is-invalid');
            }   
        break;
        case "apellido":
            if(expresiones.nombre.test(e.target.value)){
                e.target.classList.remove('is-invalid');
                e.target.classList.add('is-valid');
            }
            else{
                e.target.classList.remove('is-valid');
                e.target.classList.add('is-invalid');
            }  
        break;
        case "direccion":
            if(expresiones.direccion.test(e.target.value)){
                e.target.classList.remove('is-invalid');
                e.target.classList.add('is-valid');
            }
            else{
                e.target.classList.remove('is-valid');
                e.target.classList.add('is-invalid');
            }  
        break;
        case "username":
            if(expresiones.usuario.test(e.target.value)){
                e.target.classList.remove('is-invalid');
                e.target.classList.add('is-valid');
            }
            else{
                e.target.classList.remove('is-valid');
                e.target.classList.add('is-invalid');
            }  
        break;
        case "contraseña":
            if(expresiones.password.test(e.target.value)){
                e.target.classList.remove('is-invalid');
                e.target.classList.add('is-valid');
            }
            else{
                e.target.classList.remove('is-valid');
                e.target.classList.add('is-invalid');
            }  
        break;
        case "concontraseña":
            if(e.target.value == document.getElementById('contraseña').value){
                e.target.classList.remove('is-invalid');
                e.target.classList.add('is-valid');
            }
            else{
                e.target.classList.remove('is-valid');
                e.target.classList.add('is-invalid');
            }  
        break;
        case "email":
            if(expresiones.email.test(e.target.value)){
                e.target.classList.remove('is-invalid');
                e.target.classList.add('is-valid');
            }
            else{
                e.target.classList.remove('is-valid');
                e.target.classList.add('is-invalid');
            }  
        break;
        case "telefono":
            if(expresiones.digito.test(e.target.value)){
                e.target.classList.remove('is-invalid');
                e.target.classList.add('is-valid');
            }
            else{
                e.target.classList.remove('is-valid');
                e.target.classList.add('is-invalid');
            }  
        break;
        case "flexRadioDefault1":
            document.getElementById('inp-color').classList.remove('visually-hidden');
            document.getElementById('inp-marca').classList.remove('visually-hidden');
            document.getElementById('inp-estilo').classList.remove('visually-hidden');
            document.getElementById('inp-modelo').classList.remove('visually-hidden');
            document.getElementById('inp-range').classList.remove('visually-hidden');
            document.getElementById("flexRadioDefault2").checked = false;
        break;
        case "flexRadioDefault2":
            document.getElementById('inp-color').classList.add('visually-hidden');
            document.getElementById('inp-marca').classList.add('visually-hidden');
            document.getElementById('inp-estilo').classList.add('visually-hidden');
            document.getElementById('inp-modelo').classList.add('visually-hidden');
            document.getElementById('inp-range').classList.add('visually-hidden');
            document.getElementById("flexRadioDefault1").checked = false;
        break;
    }
}

inputs.forEach((input)=>{
    input.addEventListener('keyup',validarFormulario);
    input.addEventListener('blur',validarFormulario);
    input.addEventListener('click',validarFormulario);
});

formulario.addEventListener('submit', (e)=>{
    e.preventDefault();
});