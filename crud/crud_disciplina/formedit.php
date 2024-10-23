<?php
session_start();
if (!isset($_SESSION['nivel']) or $_SESSION['nivel'] == 2) {
    include "../../login/verif-log.php";
    die();
}
$id_disciplina = $_GET['id_disciplinas'];
include('../../conecta.php');
$sql = "SELECT * FROM disciplina WHERE id_disciplinas = $id_disciplina";
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
            <h2>Alterar disciplina</h2>
            <nav>
                <ul>
                </ul>
            </nav>
        </header>
        <br><br>
        <div style="text-align: center;">
            <form action="alterar.php" method="get">
                <input type="hidden" name="id_disciplinas" value="<?php echo $dados['id_disciplinas']; ?>">
                <label style="text-align: left;">Nome da disciplina<br><input type="text" value="<?php echo $dados['nome_disciplina']; ?>" name="nome_disciplina"></label><br><br>
                <button type="submit" class="btn btn-outline-success">Editar</button>
                <a href="formcad.php" class="btn btn-outline-danger">Cancelar</a>

            </form>

</body>

</html>