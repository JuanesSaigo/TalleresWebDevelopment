const formulario = document.getElementById('formulario');
const inputs = document.querySelectorAll('#formulario input');

const expresiones = {
	usuario: /^[a-zA-Z0-9\_\-]{5,20}$/, // Letras, numeros, guion y guion_bajo
	nombre: /^[a-zA-ZÀ-ÿ\s]{3,25}$/, // Letras y espacios, pueden llevar acentos.
	password: /^.{8,20}$/, // 15 a 20.
	email: /^[a-zA-Z0-9_.+-]{1,80}@[a-zA-Z0-9-]{3,25}\.[a-zA-Z0-9-.]{2,15}$/,
	digito: /^\d{7,14}$/, // 7 a 14 numeros.
    fnac: /^\d\d\/\d\d\/\d\d\d\d$/
}
function calcularEdad(fecha) {
    var hoy = new Date();
    var cumpleanos = new Date(fecha);
    var edad = hoy.getFullYear() - cumpleanos.getFullYear();
    var m = hoy.getMonth() - cumpleanos.getMonth();

    if (m < 0 || (m === 0 && hoy.getDate() < cumpleanos.getDate())) {
        edad--;
    }

    return edad;
}

const validarFormulario = (e) => {
    switch (e.target.name) {
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
        case "fnac":
            if(expresiones.fnac.test(e.target.value)){
                e.target.classList.remove('is-invalid');
                e.target.classList.add('is-valid');
                document.getElementById('edadn').value = calcularEdad(e.target.value) ;
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
        case "flexRadioDefault1":
            document.getElementById('inp-enf1').classList.remove('visually-hidden');
            document.getElementById('inp-enf2').classList.remove('visually-hidden');
            document.getElementById('inp-enf3').classList.remove('visually-hidden');
            document.getElementById('inp-enf4').classList.remove('visually-hidden');
            document.getElementById('inp-enf5').classList.remove('visually-hidden');
            document.getElementById("flexRadioDefault2").checked = false;
            document.getElementById('inp-enf1').checked = false;
        break;
        case "flexRadioDefault2":
            document.getElementById('flexCheckDefault1').checked = false;
            document.getElementById('flexCheckDefault2').checked = false;
            document.getElementById('flexCheckDefault3').checked = false;
            document.getElementById('flexCheckDefault4').checked = false;
            document.getElementById('exampleFormControlTextarea1').value="";
            document.getElementById('inp-enf1').classList.add('visually-hidden');
            document.getElementById('inp-enf2').classList.add('visually-hidden');
            document.getElementById('inp-enf3').classList.add('visually-hidden');
            document.getElementById('inp-enf4').classList.add('visually-hidden');
            document.getElementById('inp-enf5').classList.add('visually-hidden');
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