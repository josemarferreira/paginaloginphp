// const pwd = document.getElementById('password');
const eye = document.getElementById('eye');
const icon = eye.querySelector('i');
let show = false;

// Mostra ou Oculta a senha do usuário
// caso ele clique no olho no campo password
eye.addEventListener('click', () => {
    if(!show){
        icon.className = "bi bi-eye-slash-fill";
        senha.type = "text";
        show = !show;
    }
    else {
        icon.className = "bi bi-eye-fill";
        senha.type = "password";
        show = !show;
    }
});
