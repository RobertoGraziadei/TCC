<?php
session_start();
if (!isset($_SESSION['nivel']) or $_SESSION['nivel'] == 2) {
    header('location: ../../index.php');
    die();
}
include('../../conecta.php');
$email = $_GET['email'];
// $nome_usuario = $_GET['nome_usuario'];
// $nivel = $_GET['nivel'];
$sql = "SELECT * FROM usuario WHERE email = '$email'";
$resultado = mysqli_query($conexao, $sql);
$dados = mysqli_fetch_assoc($resultado);
// var_dump($email);
// var_dump($nome_usuario);
// var_dump($nivel);
?>
<!DOCTYPE html>
<html lang="pt_br">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Aluno</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>

<body>

    <form action="alterar.php" method="get">

        <h2>Editar Usuário</h2>
        <label>Email<br><input type="email" name="email" value="<?php echo $dados['email']; ?>"></label><br><br>
        <label>Nome do usuario<br><input name="nome_usuario" type="text" value="<?php echo $dados['nome_usuario']; ?>"></label><br><br>
        <label>Editar o nivel<br><input name="nivel" type="number" value="<?php echo $dados['nivel']; ?>"></label><br><br>


        <button type="submit" class="btn btn-outline-success">Editar</button>
        <a href="listar.php" class="btn btn-outline-danger">Cancelar</button>

    </form>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>

</html>