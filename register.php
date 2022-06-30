<?php
    require_once "conexao.php";

    $first = isset($_POST['first_name']) ? $_POST['first_name'] : "";
    $last = isset($_POST['last_name']) ? $_POST['last_name'] : "";
    $email = isset($_POST['email']) ? $_POST['email'] : "";
    $senha = isset($_POST['password']) ? $_POST['password'] : "";
    $erro = false;

    if (!isEmpty($senha, $email, $first, $last)){
        if (!checkarEmail($email, $conn)) {
            $hash = password_hash($senha, PASSWORD_DEFAULT); // criptografa a senha
            // Prepara a query e executa
            $sql = $conn->prepare("INSERT INTO usuarios (first_name, last_name, email, pwd)
            VALUES (:first, :last, :mail, :hash)");
            $sql->bindParam(':first', $first, PDO::PARAM_STR);
            $sql->bindParam(':last', $last, PDO::PARAM_STR);
            $sql->bindParam(':mail', $email, PDO::PARAM_STR);
            $sql->bindParam(':hash', $hash, PDO::PARAM_STR);
            $sql->execute();
        } else {
            $erro = true;
        } 
    }
    else {
        $erro = false;
    }


    function isEmpty($senha, $email, $first, $last){
        if ($senha == "" or $email == "" or $first == "" or $last == ""){
            return true;
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
    <link rel="stylesheet" href="css/register.css">
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
                <h1>Create new account<span class="dot">.</span></h1>
                <p>Already A Member? <a href="index.php">Log In</a></p>
            </header>
            <!-- Formulário -->
            <form action="register.php" method="post" id="form-group">
               
                <div class="input-group" id="f_name">
                    <input type="text" name="first_name" id="first_name" value="">
                    <label for="first_name">First Name</label>
                    <span><i class="bi bi-person-fill"></i></span>
                </div>
                <span id="info_first"></span>
    
                <div class="input-group" id="last">
                    <input type="text" name="last_name" id="last_name">
                    <label for="last_name">Last Name</label>
                    <span><i class="bi bi-person-fill"></i></span>
                </div>
                <span id="info_last"></span>
             
                <?php
                    if ($erro) {
                        echo '<div class="input-group erro" id="mail">
                                <input type="text" name="email" id="email">
                                <label for="email">Email</label>
                                <span><i class="bi bi-envelope-fill"></i></span>
                            </div>
                            <span id="info_email">Email já Cadastrado</span>';
                    } else {
                        echo '<div class="input-group" id="mail">
                            <input type="text" name="email" id="email">
                            <label for="email">Email</label>
                            <span><i class="bi bi-envelope-fill"></i></span>
                            </div>
                            <span id="info_email"></span>';
                    }
                ?>

                <div class="input-group" id="pwd">
                    <input type="password" name="password" id="senha">
                    <label for="password">Password</label>
                    <span id="eye"><i class="bi bi-lock-fill"></i></span>
                </div>
                <span id="info_senha"></span>
                
                <div id="info_pass">
                    <p id="minimum"><i class="bi bi-x"></i>Minimum 6 characters</p>
                    <p id="lower"><i class="bi bi-x"></i>Minimum 1 lowercase letter</p>
                    <p id="upper"><i class="bi bi-x"></i>Minimum 1 capital letter</p>
                    <p id="number"><i class="bi bi-x"></i>Minimum 1 number</p>
                </div>

                <div id="button">
                    <button type="submit" class="btn btn-confirm" id="create">Create account</button>
                </div>
            </form>
        </main>
    </div>
    <script src="js/validacao_cadastro.js"></script>
</body>
</html>