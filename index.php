<?php
if(!isset($_SESSION['email'])){
    session_start();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <form action="" method="post">
        <label>Email:<input type="email" name="email" required><br></label>
        <label>Senha:<input type="password" name="senha" required></label><br><br>

        <input type="submit" value="Login"><br><br><br>

        <button><a href="inscreve.php">Inscrever-se</a></button>
    </form>
</body>
</html>
<?php
if($_POST){


include "conecta.php";


$email = $_POST['email'];
$senha = $_POST['senha'];

$sql = "SELECT * FROM usuario where email = '$email'";
$resultado = mysqli_query($conexao, $sql);
if(mysqli_num_rows($resultado) == 0){
    echo "Usuário inválido! Tente novamente";
    die();
}


$result = mysqli_fetch_assoc($resultado);
$hash = $result['senha'];
$user = $result['nome_usuario'];


$_SESSION['user'] = $user;


if(password_verify($senha, $hash) == true){
    header('location: redire.php');
}else{
    echo "Senha inválida! Tente novamente";
}
}
?>
