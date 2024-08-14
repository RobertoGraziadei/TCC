<?php
session_start();
if (!isset($_SESSION['nivel']) or $_SESSION['nivel'] == 2) {
    header('location: ../../principal.php');
    die();
}
$id_turma = $_GET['id_turma'];
include('../../conecta.php');
$sql = "SELECT * FROM turma WHERE id_turma = $id_turma";
$resultado = mysqli_query($conexao, $sql);
$dados = mysqli_fetch_assoc($resultado);
?>

<!DOCTYPE html>
<html lang="pt_br">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar turma</title>

</head>

<body>

    <form action="alterar.php" method="get">

        <h2>Editar disciplina</h2>
        <input type="hidden" name="id_turma" value="<?php echo $dados['id_turma']; ?>">
        <label>Edite o nome<br><input type="text" value="<?php echo $dados['nome_turma']; ?>" name="nome_turma"></label><br><br>
        <input type="submit" value="Editar"><br><br>
        <button><a href="index.php">Voltar</a></button>

    </form>

</body>

</html>