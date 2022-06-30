<?php
    require_once 'conexao.php';

    $email = isset($_POST['email']) ? $_POST['email'] : "";
    $password = isset($_POST['password']) ? $_POST['password'] : "";
    $remember = isset($_POST['save']) ? $_POST['save'] : "";
    $mensagem_senha = "";
    $erro = false;

    // Verifica se o campo email e senha foi digitado
    if ($email != ""){
        $login = checkarEmail($email, $conn); //consulta se o email está cadastrado

        if($login != ""){ //caso esteja verifica se a senha foi digitada
            if(checkarSenha($login['pwd'], $password)){ //checka a senha
                // inicia sessão e armazena nome do usuário
                // e redireciona para a página de logado
                session_start();
                $_SESSION['first_name'] = $login['first_name'];
                $_SESSION['last_name'] = $login['last_name'];

                header('Location:logado.php');
            }
            // caso a senha esteja errada
            else{
                $mensagem_senha = "Invalid Password, insert again";
                $erro = true;
            }
        }
        // Caso o usuário ou a senha esteja inválida informa o usuário
        else{
            $email = "";
           $password = "";
           $erro = false;
            echo '<div id="modal">
                <div class="modal-content">
                    <p>Your email or password is invalid </p>
                    <input type="button" id="fechar" value="Try Again..." class="btn btn-modal">
                </div>
            </div>';
           
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sora:wght@400;700;800&display=swap" rel="stylesheet"> 
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
    <div id="fundo">
        <header id="top">
            <div id="logo">
                <div class="box"></div>
                <p class="text-logo">Anywhere app<span class="dot">.</span></p>
            </div>
            <ul id="menu">
                <li><a href="index.php">Home</a></li>
                <li><a href="register.php">Join</a></li>
            </ul>
        </header>

        <main class="container">
            <header id="banner">
                <h3>START FOR FREE</h3>
                <h1>Sign in to Anywhere app<span class="dot">.</span></h1>
                <p>Not a member? <a href="register.php">Sign up now</a></p>
            </header>

            <form action="index.php" method="post" id="form-group">
                <div class="input-group" id='mail'>
                    <input type="text" name="email" id="email" value="<?php echo $email; ?>">
                    <label for="email">Email</label>
                    <span><i class="bi bi-envelope-fill"></i></span>
                </div>
                <span id="info_email"></span>

                <!-- Mostra o Campo de Senha de acordo com a condição -->
                <?php
                    if ($erro){
                        echo '<div class="input-group erro" id="senha">
                                <input type="password" name="password" id="password" autofocus>
                                <label for="password">Password</label>
                                <span id="eye"><i class="bi bi-eye-fill"></i></span>
                             </div>
                            <span id="info_senha" style="visibility: visible; color: var(--danger);">'.$mensagem_senha.'</span>';
                    }
                    else {
                        echo '<div class="input-group" id="senha">
                                <input type="password" name="password" id="password">
                                <label for="password">Password</label>
                                <span id="eye"><i class="bi bi-eye-fill"></i></span>
                             </div>
                            <span id="info_senha">'.$mensagem_senha.'</span>';
                    }
                ?>
                <div id="options">
                    <div id="remember">
                        <div class="input-checkbox">
                            <input type="checkbox" name="save" id="save">
                        </div>
                        <label for="save">Remember me</label>
                    </div>
                    <a href="#" class="link">Forgot password?</a>
                </div>

                <div id="button">
                    <button type="submit" class="btn btn-confirm" id="confirma">Sign In</button>
                </div>
            </form>
        </main>
        
    </div>

    <script src="js/validacao.js"></script>
    <script src="js/show_senha.js"></script>
    <script src="js/modal.js"></script>
</body>
</html>