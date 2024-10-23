<?php
include('../../conecta.php');
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
                <h2>Cadastrar horário</h2>
                <nav>
                    <ul>
                        <li><a href="#"><button type="button" class="btn btn-outline-secondary" onclick="listar()">Ver horário </button></a></td></a></li>
                    </ul>
                </nav>
            </header>
            <br><br>
            <div style="text-align: center">
                <form action="cadastrar.php" method="post">
                    <input type="hidden" name="id_horario">
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


                    <select name="dia" required>
                        <option disabled selected>Selecione o dia</option>
                        <option value="Segunda-Feira">Segunda-Feira</option>
                        <option value="Terça-Feira">Terça-Feira</option>
                        <option value="Quarta-Feira">Quarta-Feira</option>
                        <option value="Quinta-Feira">Quinta-Feira</option>
                        <option value="Sexta-Feira">Sexta-Feira</option>
                        <option value="Sábado">Sábado</option>
                    </select><br><br>


                    <select name="disciplina" required>
                        <option disabled selected>Selecione a disciplina</option>
                        <?php
                        $sql = "SELECT * FROM disciplina";
                        $executaSQL = mysqli_query($conexao, $sql);
                        while ($dados = mysqli_fetch_assoc($executaSQL)) {
                        ?>
                            <option value="<?php echo $dados['id_disciplinas']; ?>"><?php echo $dados['nome_disciplina']; ?></option>
                        <?php
                        }
                        ?>
                    </select><br><br>


                    <select name="professor" required>
                        <option disabled selected>Selecione o professor</option>
                        <?php
                        $sql = "SELECT DISTINCT id_usuario,nome_usuario FROM horario INNER JOIN usuario ON id_usuario = fk_professor";
                        $executaSQL = mysqli_query($conexao, $sql);
                        while ($dados = mysqli_fetch_assoc($executaSQL)) {
                        ?>
                            <option value="<?php echo $dados['id_usuario']; ?>"><?php echo $dados['nome_usuario']; ?></option>
                        <?php
                        }
                        ?>
                    </select><br><br>


                    <select name="sala" required>
                        <option disabled selected>Selecione a sala</option>
                        <?php
                        $sql = "SELECT * FROM sala";
                        $executaSQL = mysqli_query($conexao, $sql);
                        while ($dados = mysqli_fetch_assoc($executaSQL)) {
                        ?>
                            <option value="<?php echo $dados['n_sala']; ?>"><?php echo $dados['descricao']; ?></option>
                        <?php
                        }
                        ?>
                    </select><br><br>


                    <label>Horário inicial <input type="time" name="horario_inicio" required></label><br>
                    <label>Horário final <input type="time" name="horario_fim" required></label><br><br>


                    <input class="b" type="submit" value="Cadastrar"><br><br><br><br>
            </div>
            </form>
        </div>
        <div id="listar">
            <header>
                <h2>Horários cadastrados</h2>
                <nav>
                    <ul>
                        <li><a href="#"><button type="button" class="btn btn-outline-secondary" onclick="cadastrar()">Cadastrar </button></a></td></a></li>
                    </ul>
                </nav>
            </header>
            <?php
            include('../../conecta.php');
            $sql = "SELECT * FROM horario 
INNER JOIN sala ON fk_sala_n_sala = n_sala
INNER JOIN disciplina ON id_disciplinas = fk_disciplina_id_disciplina
INNER JOIN turma ON id_turma = fk_turma_id_turma
INNER JOIN usuario ON id_usuario = fk_professor
;";

            $resultado = mysqli_query($conexao, $sql); ?>
            <table class=" container table table-white table-striped">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Dia</th>
                    <th scope="col">Turma</th>
                    <th scope="col">Disciplina</th>
                    <th scope="col">Professor</th>
                    <th scope="col">Sala</th>
                    <th scope="col">Horário de inicio</th>
                    <th scope="col">Horário de fim</th>
                    <th colspan=3>Opções</th>
                </tr>
                <?php
                while ($dados = mysqli_fetch_assoc($resultado)) { ?>
                    <tr>
                    <?php
                    echo '<td>' . $dados['id_horario'] . '</td>';
                    echo '<td>' . $dados['dia'] . '</td>';
                    echo '<td>' . $dados['nome_turma'] . '</td>';
                    echo '<td>' . $dados['nome_disciplina'] . '</td>';
                    echo '<td>' . $dados['nome_usuario'] . '</td>';
                    echo '<td>' . $dados['descricao'] . '</td>';
                    echo '<td>' . $dados['horario_inicio'] . '</td>';
                    echo '<td>' . $dados['horario_fim'] . '</td>';
                    echo '<td> <a href="formedit.php?id_horario=' . $dados['id_horario'] . '"> <img src="imagens/editar.png" width="20" height="20"> </a> </td>';
                    echo '<td> <a href="excluir.php?id_horario=' . $dados['id_horario'] . '"> <img src="imagens/excluir.png" width="20" height="20"> </a> </td>';
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