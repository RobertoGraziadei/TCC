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
    <link rel="shortcut icon" href="../../img/qrcode.ico">
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/layout.css">
    <title>Alterar</title>

</head>

<body>
    <div class="container">
        <header>
            <h2>Alterar aluno</h2>
            <nav>
                <ul>
                </ul>
            </nav>
        </header>
        <div class="container">
            <form action="alterar.php" method="get">
                <label style="text-align: left;"><input type="hidden" name="matricula" value="<?php echo $dados['matricula']; ?>"></label>
                <div class="form-floating mb-3">
                    <input name="nome" type="text" class="form-control" value="<?php echo $dados['nome']; ?>" id="floatingInput" placeholder="" required>
                    <label for="floatingInput">Nome do aluno</label>
                </div>
                <p>
                    <label for="floatingInput">Turma</label>
                    <select name="turma" class="form-select form-select-lg mb-3" id="floatingInput" aria-label="Large select example" required>
                        <?php
                        $sql = "SELECT * FROM aluno inner join turma on aluno.turma = turma.id_turma WHERE aluno.turma = id_turma";
                        $executaSQL = mysqli_query($conexao, $sql);
                        while ($dados = mysqli_fetch_assoc($executaSQL)) {
                        ?>
                            <option value="<?php echo $dados['id_turma']; ?>" required><?php echo $dados['nome_turma']; ?></option>
                        <?php
                        }
                        ?>
                    </select>
                </p>

                </section>

                <button type="submit" class="btn btn-outline-success">Editar</button>
                <a href="formcad.php" class="btn btn-outline-danger">Cancelar</button>

            </form>
            <script src="../../css/popper.min.js"></script>
            <script src="../../css/bootstrap.min.js"></script>
</body>

</html>