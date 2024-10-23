<?php
session_start();
if (!isset($_SESSION['nivel']) or $_SESSION['nivel'] == 2) {
    include "../../login/verif-log.php";
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
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/layout.css">
    <title>Editar Aluno</title>
</head>

<body>
    <div class="container">
        <header>
            <h2>Alterar Usuário</h2>
            <nav>
                <ul>
                </ul>
            </nav>
        </header>
        <br><br>
        <div style="text-align: center;">
            <form action="alterar.php" method="get">
                <label style="text-align: left;">Email<br><input type="email" name="email" value="<?php echo $dados['email']; ?>"></label><br><br>
                <label style="text-align: left;">Nome do usuário<br><input name="nome_usuario" type="text" value="<?php echo $dados['nome_usuario']; ?>"></label><br><br>
                <label style="text-align: left;">Editar o nivel<br>
                    <input name="nivel" type="number" value="<?php echo $dados['nivel']; ?>"></label><br><br>


                <label for="nivel">Nivel</label>
                <select name="nivel" required>
                    <?php
                    foreach ($dados as $val) { ?>
                        <option value="<?php echo $val['nivel']; ?>"
                            <?php if ($dados['nivel'] == $val['nivel']) {
                                echo 'selected';
                            } ?>>
                            <?php echo $val['nivel']; ?>
                        </option>
                    <?php } ?>
                </select><br><br>


                <button type="submit" class="btn btn-outline-success">Editar</button>
                <a href="formcad.php" class="btn btn-outline-danger">Cancelar</a>
        </div>

        </form>
        <script src="../../css/popper.min.js"></script>
        <script src="../../css/bootstrap.min.js"></script>
</body>

</html>