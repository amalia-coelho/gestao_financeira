const login = document.getElementById('login');
const campos = document.querySelectorAll('.required');
const spans = document.querySelectorAll('.span-required');
const emailRegex = /[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?/gi

//botão de login

login.addEventListener('click', (event) =>{
    event.preventDefault;
    emailValidate();
    mainPasswordValidate();
})

//erros vermelhos
function setError(index){
    campos[index].style.outline = 'none';
    campos[index].style.border = '1px solid #e63636';
    spans[index].style.display = 'block';
}

function removeError(index){
    spans[index].style.display = 'none';
    campos[index].style.border = '';
    campos[index].style.outline = '1px solid #6c63ff';
}


function emailValidate(){
    if(!emailRegex.test(campos[0].value))
    {
        setError(0);
    }
    else
    {
        removeError(0);
    }
    
}


function mainPasswordValidate(){
    if(campos[1].value.length <8)
    {
        setError(1);
    }
    else
    {
        removeError(1);
    }
    
}

function showPassword() {
    const eye = document.querySelector(".uil-eye");
    const password = document.querySelector("#password");
    if (password.type === "password") {
      password.type = "text";
      eye.classList.toggle("uil-eye-slash");
      //   eye.classList.add("uil-eye-slash");
      
    }else{   
        password.type = "password";
        eye.classList.toggle("uil-eye-slash");
        // eye.classList.remove("uil-eye-slash");
        // eye.classList.add("uil-eye");
    }
  }
