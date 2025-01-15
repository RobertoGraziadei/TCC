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
$dados_sql = mysqli_fetch_assoc($resultado);
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
            <h2>Alterar Sala</h2>
            <nav>
                <ul>
                </ul>
            </nav>
        </header>
        <div class="container">

            <form action="alterar.php" method="get">
                <input type="hidden" name="n_sala" value="<?php echo $dados_sql['n_sala']; ?>">
                <!-- <div class="form-floating mb-3">
                            <input name="descricao" type="text" class="form-control" id="floatingInput" value="<?php echo $dados['descricao']; ?>" placeholder="" required>
                            <label for="floatingInput">Sala</label>
                        </div> -->

                        <label for="sala">Sala:</label><br>
                <select name="sala" class="form-select form-select-lg mb-3" aria-label="Large select example" required>
                    <?php
                    $sql = "SELECT * FROM sala";
                    $exe = mysqli_query($conexao, $sql);
                    while ($dados = mysqli_fetch_assoc($exe)) { ?>
                        <option value="<?php echo $dados['n_sala']; ?>"
                            <?php if ($dados_sql['descricao'] == $dados['descricao']) {
                                echo 'selected';
                            } ?>>
                            <?php echo $dados['descricao']; ?>
                        </option>
                    <?php } ?>
                </select><br>

                <button type="submit" class="btn btn-outline-success">Editar</button>
                <a href="formcad.php" class="btn btn-outline-danger">Cancelar</a>

            </form>

</body>

</html>