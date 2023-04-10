const validar = document.getElementById('validar');
const campos = document.querySelectorAll('.required');
const spans = document.querySelectorAll('.span-required');
const emailRegex = /[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?/gi

//botão de validar



document.getElementById("input").addEventListener("input", function(event){

    //busca conteúdo do input
      var conteudo = document.getElementById("input").value;
  
      //valida conteudo do input 
      if (conteudo !== null && conteudo !== '') {
        //habilita o botão
        document.getElementById("botao").disabled = false;
      } else {
        //desabilita o botão se o conteúdo do input ficar em branco
        document.getElementById("botao").disabled = true;
      }
  });
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

function nameValidate(){
    if(campos[0].value.length <3)
    {
        setError(0);
        $( "validar" ).prop( "disabled", true );
    }
    else
    {
        removeError(0);
    }
}
function lastnameValidate(){
    if(campos[1].value.length <3)
    {
        setError(1);
    }
    else
    {
        removeError(1);
    }
}

function emailValidate(){
    if(!emailRegex.test(campos[2].value))
    {
        setError(2);
    }
    else
    {
        removeError(2);
    }
    
}
function yearValidate(){
    if(campos[3].value <14 || campos[3].value >100)
    {
        setError(3);
    }
    else
    {
        removeError(3);
    }
    
}

function mainPasswordValidate(){
    if(campos[4].value.length <8)
    {
        setError(4);
    }
    else
    {
        removeError(4);
        comparePassword();
    }
    
}

function comparePassword(){
    if(campos[4].value == campos[5].value && campos[5].value.length >=8)
    {
        removeError(5);
    }
    else
    {
        setError(5);
    }
    
};


//VIEW PASSWORD


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

function showPasswordtwo() {
    const eye = document.querySelector(".two");
    const password = document.querySelector("#confirmPassword");
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
