<?php
    $server = 'localhost';
    $user = 'josemar';
    $pwd = 'meusqlserver';
    $db = 'conta';

    try{
        $conn = new PDO('mysql:host='.$server.';dbname='.$db,$user,$pwd);
    }
    catch (PDOException $e) {
        print "Error: " . $e->getMessage() . "<br>";
        die();
    }

    // Checka se o email está cadastrado
    function checkarEmail($email, $conexao){   
        $sql = $conexao->prepare("SELECT first_name, last_name, email, pwd FROM usuarios WHERE email=:param");
        $sql->bindParam(':param', $email);
        $sql->execute();
        $result = $sql->fetch(PDO::FETCH_ASSOC);
        
        if($result != ""){
            return $result;
        }
        return false;
    }

    //Checka se a Senha é Válida
    function checkarSenha($hash, $senha){
        return password_verify($senha, $hash);
    }

?>