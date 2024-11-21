<?php
session_start();
if (!isset($_SESSION['nivel']) or $_SESSION['nivel'] == 2) {
    include "../../login/verif-log.php";
    die();
}
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
                <h2>Cadastrar salas</h2>
                <nav>
                    <ul>
                        <li><a href="#"><button type="button" class="btn btn-outline-secondary" onclick="listar()">Ver salas </button></a></td></a></li>
                    </ul>
                </nav>
            </header>
            <br><br>
            <div style="text-align: center">
                <form action="cadastrar.php" method="post">
                    <label><input type="number" placeholder="Número da sala" name="n_sala" required></label><br><br>
                    <label><input type="text" placeholder="Descrição" name="descricao" required></label><br><br>
                    <input class="btn btn-primary" type="submit" value="Cadastrar"><br><br><br><br>
            </div>
            </form>
        </div>
        <div id="listar">
            <header>
                <h2>Salas cadastradas</h2>
                <nav>
                    <ul>
                        <li><a href="#"><button type="button" class="btn btn-outline-secondary" onclick="cadastrar()">Cadastrar </button></a></td></a></li>
                    </ul>
                </nav>
            </header>

            <?php
            include('../../conecta.php');
            $sql = "SELECT * FROM sala";
            $resultado = mysqli_query($conexao, $sql); ?>
            <table class="container table table-white table-striped">
                <tr>
                    <th scope="col">Número da sala</th>
                    <th scope="col">Descrição</th>
                    <th colspan=3>Opções</th>
                </tr>
                <?php
                while ($dados = mysqli_fetch_assoc($resultado)) { ?>
                    <tr>
                    <?php
                    echo '<td>' . $dados['n_sala'] . '</td>';
                    echo '<td>' . $dados['descricao'] . '</td>';
                    echo '<td> <a href="formedit.php?n_sala=' . $dados['n_sala'] . '"> <img src="imagens/editar.png" width="20" height="20"> </a> </td>';
                    echo '<td> <a href="excluir?n_sala=' . $dados['n_sala'] . '"> <img src="imagens/excluir.png" width="20" height="20"> </a> </td>';
                    echo '</tr>';
                }
                    ?>
            </table><br>


        </div>
        <a href="../../login/redire.php"><button type="button" class="btn btn-secondary">Voltar</button></a>
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