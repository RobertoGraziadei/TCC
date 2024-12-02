<?php
session_start();
if (!isset($_SESSION['nivel']) or $_SESSION['nivel'] == 2) {
    include "../../login/verif-log.php";
    die();
}
$id_turma = $_GET['id_turma'];
include('../../conecta.php');
$sql = "SELECT * FROM turma WHERE id_turma = $id_turma";
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
            <h2>Alterar turma</h2>
            <nav>
                <ul>
                </ul>
            </nav>
        </header>
            <form action="alterar.php" method="get">
                
                <div class="container">
                <input type="hidden" name="id_turma" value="<?php echo $dados_sql['id_turma']; ?>">

                        <label for="turma">Turma:</label><br>
                <select name="nome_turma" class="form-select form-select-lg mb-3" aria-label="Large select example" required>
                    <?php
                    $sql = "SELECT * FROM turma";
                    $exe = mysqli_query($conexao, $sql);
                    while ($dados = mysqli_fetch_assoc($exe)) { ?>
                        <option value="<?php echo $dados['nome_turma']; ?>"
                            <?php if ($dados_sql['nome_turma'] == $dados['nome_turma']) {
                                echo 'selected';
                            } ?>>
                            <?php echo $dados['nome_turma']; ?>
                        </option>
                    <?php } ?>
                </select>
                        
                        <button type="submit" class="btn btn-outline-success">Editar</button>
                        <a href="formcad.php" class="btn btn-outline-danger">Cancelar</a>
                    </div>
        </div>
        </form>

</body>

</html>