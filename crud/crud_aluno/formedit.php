<?php
include('../../conecta.php');
session_start();
if (!isset($_SESSION['nivel']) or $_SESSION['nivel'] == 2) {
    include "../../login/verif-log.php";
    die();
}
$matricula = $_GET['matricula'];
$sql = "SELECT * FROM aluno WHERE matricula = $matricula";
$resultado = mysqli_query($conexao, $sql);
$dados = mysqli_fetch_assoc($resultado);
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

        <h2>Editar Aluno</h2>
        <label>Matricula<input type="number" name="matricula" value="<?php echo $dados['matricula']; ?>"></label><br><br>
        <label>Edite o nome<input type="text" name="nome" value="<?php echo $dados['nome']; ?>"></label><br><br>

        <p><select name="turma" required>
        <?php
        $sql = "SELECT * FROM aluno inner join turma on aluno.turma = turma.id_turma WHERE aluno.turma = id_turma";
        $executaSQL = mysqli_query($conexao, $sql);
        while ($dados = mysqli_fetch_assoc($executaSQL)) {
        ?>
            <option value="<?php echo $dados['id_turma']; ?>" required><?php echo $dados['nome_turma']; ?></option>
        <?php
        }
        ?>
        </select></p>

        </section>

        <button type="submit" class="btn btn-outline-success">Editar</button>
        <a href="listar.php" class="btn btn-outline-danger">Cancelar</button>

    </form>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>

</html>