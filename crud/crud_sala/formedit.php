<?php
session_start();
if (!isset($_SESSION['nivel']) or $_SESSION['nivel'] == 2) {
    header('location: ../../index.php');
    die();
}
$n_sala = $_GET['n_sala'];
include('../../conecta.php');
$sql = "SELECT * FROM sala WHERE n_sala = $n_sala";
$resultado = mysqli_query($conexao, $sql);
$dados = mysqli_fetch_assoc($resultado);
?>
<!DOCTYPE html>
<html lang="pt_br">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar disciplina</title>

</head>

<body>

    <form action="alterar.php" method="get">

        <h2>Editar Sala</h2>
        <input type="hidden" name="n_sala" value="<?php echo $dados['n_sala']; ?>">
        <label>Descrição<br><input type="text" value="<?php echo $dados['descricao']; ?>" name="descricao"></label><br><br>
        <input type="submit" value="Editar"><br><br>
        <button><a href="index.php">Voltar</a></button>

    </form>

</body>

</html>