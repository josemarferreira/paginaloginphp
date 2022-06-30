const first_name = document.getElementById('first_name');
const nome = document.getElementById('f_name');
const info_first = document.getElementById('info_first');

const last_name = document.getElementById('last_name');
const last = document.getElementById('last');
const info_last = document.getElementById('info_last');

const email = document.getElementById('email');
const mail = document.getElementById('mail');
const info_email = document.getElementById('info_email');

const pwd = document.getElementById('senha');
const senha = document.getElementById('pwd');
const info_senha = document.getElementById('info_senha');
const info_pwd = document.getElementById('info_pass');

const form = document.getElementById('form-group');

let erro = false;

form.addEventListener('submit', event => {

    // Verificar Nome
    if (first_name.value == ""){
        showErro(nome,info_first, "Please, Insert a name");
        erro = true;
    } else {
        if (!validarNome(first_name.value)) {
            showErro(nome,info_first, "Please, Insert a correct name");
            erro = true;
        }
    }

    // Verificar sobrenome
    if (last_name.value == ""){
        showErro(last,info_last, "Please, Insert a last name");
        erro = true;
    } else {
        if (!validarNome(last_name.value)) {
            showErro(last,info_last, "Please, Insert a correct last name");
            erro = true;
        }
    }

    // Verificar email
    if (email.value == ""){
        showErro(mail,info_email, "Please, Insert a email");
        erro = true;
    } else {
        if (!checkarEmail(email.value)) {
            showErro(mail ,info_email, "Please, Insert a correct email");
            erro = true;
        }
    }

    // Verificar Senha
    if (pwd.value == "") {
        showErro(senha, info_senha, "Please, Insert a password");
        info_pwd.style.visibility = "visible";
        info_pwd.style.color = "#e63946";
        erro = true;
    } else {
        if (!checkSenha(pwd.value)) {
            showErro(senha, info_senha, "");
            erro = true;
        }
    }

    // Se existir algum erro, cancela a submissão
    if (erro) {
        event.preventDefault();
        erro = false;
    }
});


// Verifica se o nome digitado, é válido
// não podendo possuir números ou caracteres especiais
function validarNome(nome) {
    // verificar caracteres especiais ou números no nome
    let carac = (/[^a-zA-Z ]/gi).test(nome);

    return !carac;
}

// Verifica se o email digitado, é válido
function checkarEmail(email) {
    let dominio = email.split("@"); // separa o dominio do email, se houver.
    console.log(dominio);
    if (dominio.length == 2) {
        return checkarDominio(dominio[1]);
    }
    return false;
}

// Verifica se o domino digitado é válido
function checkarDominio(dominio) {
    let teste = dominio.split(".");
    console.log(teste);
    if (teste.length >= 2) {
        for (item of teste) {
            if (item == "") { // verifica se não foram digitados pontos em sequência
                return false;
            }
        }
        return true;
    }
    return false; // caso o dominio não tenha ponto
}

// Mostrar o erro
function showErro(campo, info, texto_info) {
    campo.className = "input-group erro";
    info.innerHTML = texto_info;
}

// Retira o Erro
function retirarErro(campo, info) {
    campo.className = "input-group";
    info.innerHTML = "";
}


// Retirar erros ao digitar nos campos
email.addEventListener('keyup', () => {
    retirarErro(mail,info_email);
})

first_name.addEventListener('keyup', () => {
    retirarErro(nome,info_first);
})

last_name.addEventListener('keyup', () => {
    retirarErro(last,info_last);
})

pwd.addEventListener('keyup', () => {
    info_pwd.style.display = "block";
    info_pwd.style.color = "#e63946";
    checkSenha(pwd.value);
    retirarErro(senha,info_senha);
});


let lower = document.getElementById('lower');
let number = document.getElementById('number');
let upper = document.getElementById('upper');
let min = document.getElementById('minimum');

// Validar Senha
function checkSenha(senha) {
    let passValidate = 0;
    let num = /[0-9]/;
    let letter_min = /[a-z]/;
    let letter_max = /[A-Z]/;
    
    if (senha != "") {
        passValidate += temItem(senha, num, number); // verifica se tem numero
        passValidate += temItem(senha, letter_max, upper); // verifica se tem letra maiuscula
        passValidate += temItem(senha, letter_min, lower); // verifica se tem letra minuscula

        if (senha.length >= 6) {
            check(min, true);
            passValidate++;
        } else {
            check(min);
        }

        if (passValidate == 4) {
            return true;
        }
    } else {
        check(upper);
        check(min);
        check(lower);
        check(number);
    }

    return false;
}

// Verifica se a senha satisfaz as regras
function temItem(senha, reg, item) {
    if(reg.test(senha)) {
        check(item, true);
        return 1;
    } else {
        check(item);
    }
    return 0;
}

// Muda o estilo das regras conforme, se elas foram
// cumpridas ou não
function check(campo, valido=false) {
    let icon = campo.querySelector('i');
    if (valido) {
        icon.className = "bi bi-check";
        campo.style.color = "#9ef01a";
    } else {
        icon.className = "bi bi-x";
        campo.style.color = "#e63946";
    }
}