<?php
$email = $_POST['email'];
$token = $_POST['token'];
$senha = $_POST['senha'];

require_once "conexao.php";
$conexao = conectar();
$sql = "SELECT * FROM `recuperar-senha` WHERE email='$email' AND 
        token='$token'";
$resultado = executarSQL($conexao, $sql);
$recuperar = mysqli_fetch_assoc($resultado);

if ($recuperar == null) {
    echo ("<script>
    alert(\"Email ou token incorreto. Tente fazer um novo pedido 
          de recuperação de senha.\");
    window.location.href = window.location.origin + '/index.php';
    </script>");
    die();
} else {
    // verificar a validade do pedido (data_criacao)
    // verificar se o link jah foi usado
    date_default_timezone_set('America/Sao_Paulo');
    $agora = new DateTime('now');
    $data_criacao = DateTime::createFromFormat(
        'Y-m-d H:i:s',
        $recuperar['data_criacao']
    );
    $umDia = DateInterval::createFromDateString('1 day');
    $dataExpiracao = date_add($data_criacao, $umDia);

    if ($agora > $dataExpiracao) {
        echo ("<script>
    alert(\"Essa solicitação de recuperação de senha expirou!
              Faça um novo pedido de recuperação de senha.\");
    window.location.href = window.location.origin + '/index.php';
    </script>");
        die();
    }

    if ($recuperar['usado'] == 1) {
        die("<script>
        alert(\"Esse pedido de recuperação de senha já foi utilizado anteriormente! Para recuperar a senha, faça um novo pedido de recuperação de senha.\");
        window.location.href = window.location.origin + '/index.php';
    </script>");
    }

    $hash = password_hash($senha, PASSWORD_ARGON2I);
    password_verify($senha, $hash);
    $sql2 = "UPDATE usuario SET senha='$hash' WHERE 
             email='$email'";
    executarSQL($conexao, $sql2);
    $sql3 = "UPDATE `recuperar-senha` SET usado=1 WHERE 
             email='$email' AND token='$token'";
    executarSQL($conexao, $sql3);

    echo ("<script>
    alert(\"Senha alterada!\");
    window.location.href = window.location.origin + '/index.php';
    </script>");
}
