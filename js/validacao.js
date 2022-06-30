const form = document.getElementById('form-group');

const campo_email = document.getElementById('mail');
const email = document.getElementById('email');

const campo_senha = document.getElementById('senha');
const senha = document.getElementById('password');

const info_email = document.getElementById('info_email');
const info_senha = document.getElementById('info_senha');

// Verifica se os campos são válidos
form.addEventListener('submit', evento => {
    
    // Caso o campo email e a senha não foi preenchido
    if (email.value == ""){
        // caso a senha não foi preenchida, pede ao usuário que insira a senha
        if (senha.value == ""){
            solicitarValor(evento, campo_senha, senha, info_senha, "Please, Insert Your Password"); 
        }
        // caso email não foi preenchido, pede ao usuário que insira o email
        solicitarValor(evento, campo_email, email, info_email, "Please, Insert a Email");
    }
    // caso somente a senha não foi preenchida, pede ao usuário que insira a senha
    else {
        if (senha.value == ""){
            solicitarValor(evento, campo_senha, senha, info_senha, "Please, Insert Your Password"); 
        }
    }  
});

// Retirar os erros em Destaque dos Campos ao digitar ou ao mudar de foco
email.addEventListener('keyup', () => {
    retirarErro(campo_email, info_email);
});

senha.addEventListener('keyup', () => {
    retirarErro(campo_senha, info_senha);
});

// Retirar os erros em Destaque dos Campos
function retirarErro(campo, info){
    campo.className = "input-group";
    info.style.visibility = "hidden";
}

// Validar os Campos
function solicitarValor(evento, campo, input, info, texto_info){
    evento.preventDefault(); // pausa o evento de submit
    campo.className = "input-group erro";
    info.style.visibility = "visible";
    info.innerHTML = texto_info;
    input.focus();
    return;
}