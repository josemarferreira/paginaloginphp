<?php
    require_once "usuario.php";

    session_start();
    $user = new Usuario($_SESSION['first_name'], $_SESSION['last_name']);

    if(isset($_POST['sair'])){
        session_destroy();
        header("Location:index.php");
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
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/logado.css">
</head>
<body>
    <div id="logado">
        <form action="logado.php" method="post">
            <h1>Welcome<span class="dot">!</span></h1>
            <h2><?php echo $user->showName(); ?></h2>
            <button type="submit" class="btn btn-confirm" name="sair">Sign Out</button>
        </form>      
    </div>
</body>
</html>