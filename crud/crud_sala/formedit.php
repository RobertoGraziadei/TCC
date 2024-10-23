<?php
session_start();
if (!isset($_SESSION['nivel']) or $_SESSION['nivel'] == 2) {
    include "../../login/verif-log.php";
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
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/layout.css">
    <title>Alterar</title>

</head>

<body>
    <div class="container">
        <header>
            <h2>Alterar Sala</h2>
            <nav>
                <ul>
                </ul>
            </nav>
        </header>
        <br><br>
        <div style="text-align: center;">

            <form action="alterar.php" method="get">
                <input type="hidden" name="n_sala" value="<?php echo $dados['n_sala']; ?>">
                <label style="text-align: left;">Descrição<br><input type="text" value="<?php echo $dados['descricao']; ?>" name="descricao"></label><br><br>
                <button type="submit" class="btn btn-outline-success">Editar</button>
                <a href="formcad.php" class="btn btn-outline-danger">Cancelar</a>

            </form>

</body>

</html>