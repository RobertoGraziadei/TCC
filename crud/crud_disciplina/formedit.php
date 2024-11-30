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
$dados_sql = mysqli_fetch_assoc($resultado);

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
        <div class="container">
            <form action="alterar.php" method="get">
                <input type="hidden" name="id_disciplinas" value="<?php echo $dados_sql['id_disciplinas']; ?>">

                <label style="text-align: left;" for="disciplina">Disciplina:</label><br>
                <select name="nome_disciplina" class="form-select form-select-lg mb-3" aria-label="Large select example" required>
                    <?php
                    $sql = "SELECT * FROM disciplina";
                    $exe = mysqli_query($conexao, $sql);
                    while ($dados = mysqli_fetch_assoc($exe)) { ?>
                        <option value="<?php echo $dados['nome_disciplina']; ?>"
                            <?php if ($dados_sql['nome_disciplina'] == $dados['nome_disciplina']) {
                                echo 'selected';
                            } ?>>
                            <?php echo $dados['nome_disciplina']; ?>
                        </option>
                    <?php } ?>
                </select>

                <button type="submit" class="btn btn-outline-success">Editar</button>
                <a href="formcad.php" class="btn btn-outline-danger">Cancelar</a>
            </form>

</body>

</html>