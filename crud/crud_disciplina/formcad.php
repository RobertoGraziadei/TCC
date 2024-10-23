<?php
session_start();
if (!isset($_SESSION['nivel']) or $_SESSION['nivel'] == 2) {
    include "../../login/verif-log.php";
    die();
}
include "../../conecta.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <script rel="stylesheet" src="../../css/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../../css/layout.css">
    <script rel="stylesheet" src="../../css/jquery.min.js"></script>
    <title>Cadastrar</title>
</head>

<body>
    <div class="container">
        <div id="cadastrar">
            <header>
                <h2>Cadastrar disciplinas</h2>
                <nav>
                    <ul>
                        <li><a href="#"><button type="button" class="btn btn-outline-secondary" onclick="listar()">Ver disciplinas </button></a></td></a></li>
                    </ul>
                </nav>
            </header>
            <br><br>
            <div style="text-align: center">
                <form action="cadastrar.php" method="post">
                    <input type="hidden" name="id_disciplinas">
                    <input type="text" name="nome_disciplina" placeholder="Nome da disciplina" required><br>
                    </select><br><br>

                    <input type="submit" value="Cadastrar"><br><br><br><br>
            </div>
            </form>
        </div>
        <div id="listar">
            <header>
                <h2>Disciplinas cadastrados</h2>
                <nav>
                    <ul>
                        <li><a href="#"><button type="button" class="btn btn-outline-secondary" onclick="cadastrar()">Cadastrar </button></a></td></a></li>
                    </ul>
                </nav>
            </header>
            <?php
            include('../../conecta.php');
            $sql = "SELECT * FROM disciplina";
            $resultado = mysqli_query($conexao, $sql); ?>
            <table class="container table table-white table-striped">
                <tr>
                    <th scope="col">Nome da disciplina</th>
                    <th colspan=3>Opções</th>
                </tr>
                <?php
                while ($dados = mysqli_fetch_assoc($resultado)) { ?>
                    <tr>
                    <?php
                    echo '<td>' . $dados['nome_disciplina'] . '</td>';
                    echo '<td> <a href="formedit.php?id_disciplinas=' . $dados['id_disciplinas'] . '"> <img src="imagens/editar.png" width="20" height="20"> </a> </td>';
                    echo '<td> <a href="excluir?id_disciplinas=' . $dados['id_disciplinas'] . '"> <img src="imagens/excluir.png" width="20" height="20"> </a> </td>';
                    echo '</tr>';
                } ?>
            </table><br>
            </div>
            <a href="../../login/redire.php"><button>Voltar</button></a>
</body>

<script>
    jQuery('#listar').hide();

    function listar() {
        jQuery('#listar').show();
        jQuery('#cadastrar').hide();
    }

    function cadastrar() {
        jQuery('#cadastrar').show();
        jQuery('#listar').hide();
    }
</script>

</html>