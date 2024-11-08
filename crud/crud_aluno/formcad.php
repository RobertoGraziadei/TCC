<?php
include "../../conecta.php";
session_start();
if (!isset($_SESSION['nivel']) or $_SESSION['nivel'] == 2) {
    include "../../login/verif-log.php";
    die();
}
?>
<!DOCTYPE html>
<html lang="pt-BR">

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
                <h2>Cadastrar aluno</h2>
                <nav>
                    <ul>
                        <li><a href="#"><button type="button" class="btn btn-outline-secondary" onclick="listar()">Ver alunos </button></a></td></a></li>
                    </ul>
                </nav>
            </header>
            <br><br>
            <div style="text-align: center">
                <form action="cadastrar.php" method="post">
                    <input type="hidden" name="id_aluno">

                    <label><input type="number" name="matricula" placeholder="Matricula" required></label><br><br>
                    <label><input type="text" name="nome" placeholder="Nome" required></label><br><br>

                    <select name="turma" required>
                        <option disabled selected>Selecione a turma</option>
                        <?php
                        $sql = "SELECT * FROM turma";
                        $executaSQL = mysqli_query($conexao, $sql);
                        while ($dados = mysqli_fetch_assoc($executaSQL)) {
                        ?>
                            <option value="<?php echo $dados['id_turma']; ?>"><?php echo $dados['nome_turma']; ?></option>
                        <?php
                        }
                        ?>
                    </select><br><br>

                    <input type="submit" value="Cadastrar"><br><br><br><br>
            </div>
            </form>
        </div>
        <div id="listar">
            <header>
                <h2>Alunos cadastrados</h2>
                <nav>
                    <ul>
                        <li><a href="#"><button type="button" class="btn btn-outline-secondary" onclick="cadastrar()">Cadastrar </button></a></td></a></li>
                    </ul>
                </nav>
            </header>
            <?php
            include('../../conecta.php');
            $sql = "SELECT * FROM usuario";
            $sql = "SELECT * FROM aluno
    inner join turma on turma = id_turma";
            $resultado = mysqli_query($conexao, $sql); ?>
            <table class=" container table table-white table-striped">
                <tr>
                    <th scope="col">Matricula</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Turma</th>
                    <th colspan=3>Opções</th>
                </tr>
                <?php
                while ($dados = mysqli_fetch_assoc($resultado)) { ?>
                    <tr>
                        <?php
                        echo '<td>' . $dados['matricula'] . '</td>';
                        echo '<td>' . $dados['nome'] . '</td>';
                        echo '<td>' . $dados['nome_turma'] . '</td>';
                        echo '<td> <a href="formedit.php?matricula=' . $dados['matricula'] . '"> <img src="imagens/editar.png" width="20" height="20"> </a> </td>';
                        echo '<td> <a href="excluir?matricula=' . $dados['matricula'] . '"> <img src="imagens/excluir.png" width="20" height="20"> </a> </td>';
                    echo '</tr>';
                    } ?>

            </table><br>
</body>
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