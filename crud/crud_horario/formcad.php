<?php
include('../../conecta.php');
session_start();
if (!isset($_SESSION['nivel']) or $_SESSION['nivel'] == 2) {
    include "../../login/verif-log.php";
    die();
}
?>
<!DOCTYPE html>
<html lang="pt_br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <script src="../../css/bootstrap.min.js"></script> <!-- Corrigido src (rel não é válido aqui) -->
    <link rel="stylesheet" href="../../css/layout.css">
    <script src="../../css/jquery.min.js"></script> <!-- Corrigido src -->
    <title>Cadastrar</title>
</head>

<body>
    <div class="container">
        <div id="cadastrar">
            <header>
                <h2><a href="../../login/redire.php"><img src="../../img/voltar.png"></a> Cadastrar horário</h2>
                <nav>
                    <ul>
                        <li><a href="#"><button type="button" class="btn btn-outline-secondary" onclick="listar()">Ver horário </button></a></li>
                    </ul>
                </nav>
            </header>
            <div style="text-align: center">
                <form action="cadastrar.php" method="post">
                    <input type="hidden" name="id_horario">
                    <div class="container">
                        <select class="form-select form-select-lg mb-3" aria-label="Large select example" name="turma" required>
                            <option disabled selected>Selecione a turma</option>
                            <?php
                            $sql = "SELECT * FROM turma";
                            $executaSQL = mysqli_query($conexao, $sql);
                            while ($dados = mysqli_fetch_assoc($executaSQL)) {
                                echo '<option value="' . $dados['id_turma'] . '">' . $dados['nome_turma'] . '</option>';
                            }
                            ?>
                        </select>

                        <!-- Selecione o dia -->
                        <select class="form-select form-select-lg mb-3" aria-label="Large select example" name="dia" required>
                            <option disabled selected>Selecione o dia</option>
                            <option value="Segunda-Feira">Segunda-Feira</option>
                            <option value="Terça-Feira">Terça-Feira</option>
                            <option value="Quarta-Feira">Quarta-Feira</option>
                            <option value="Quinta-Feira">Quinta-Feira</option>
                            <option value="Sexta-Feira">Sexta-Feira</option>
                            <option value="Sábado">Sábado</option>
                        </select>

                        <!-- Selecione a disciplina -->
                        <select class="form-select form-select-lg mb-3" aria-label="Large select example" name="disciplina" required>
                            <option disabled selected>Selecione a disciplina</option>
                            <?php
                            $sql = "SELECT * FROM disciplina";
                            $executaSQL = mysqli_query($conexao, $sql);
                            while ($dados = mysqli_fetch_assoc($executaSQL)) {
                                echo '<option value="' . $dados['id_disciplinas'] . '">' . $dados['nome_disciplina'] . '</option>';
                            }
                            ?>
                        </select>

                        <!-- Selecione o professor -->
                        <select class="form-select form-select-lg mb-3" aria-label="Large select example" name="professor" required>
                            <option disabled selected>Selecione o professor</option>
                            <?php
                            $sql = "SELECT DISTINCT id_usuario, nome_usuario FROM usuario";
                            $executaSQL = mysqli_query($conexao, $sql);
                            while ($dados = mysqli_fetch_assoc($executaSQL)) {
                                echo '<option value="' . $dados['id_usuario'] . '">' . $dados['nome_usuario'] . '</option>';
                            }
                            ?>
                        </select>

                        <!-- Selecione a sala -->
                        <select class="form-select form-select-lg mb-3" aria-label="Large select example" name="sala" required>
                            <option disabled selected>Selecione a sala</option>
                            <?php
                            $sql = "SELECT * FROM sala";
                            $executaSQL = mysqli_query($conexao, $sql);
                            while ($dados = mysqli_fetch_assoc($executaSQL)) {
                                echo '<option value="' . $dados['n_sala'] . '">' . $dados['descricao'] . '</option>';
                            }
                            ?>
                        </select>

                        <!-- Horários -->
                        <label>Horário inicial <input type="time" name="horario_inicio" required></label><br>
                        <label>Horário final <input type="time" name="horario_fim" required></label><br><br>
                    </div>
                    <input class="btn btn-primary" type="submit" value="Cadastrar"><br><br><br><br>
                </form>
            </div>
        </div>

        <!-- Seção para listar horários cadastrados -->
        <div id="listar">
            <header>
                <h2><a href="../../login/redire.php"><img src="../../img/voltar.png"></a> Horários cadastrados</h2>
                <nav>
                    <ul>
                        <li><a href="#"><button type="button" class="btn btn-outline-secondary" onclick="cadastrar()">Cadastrar </button></a></li>
                    </ul>
                </nav>
            </header>
            <?php
            $sql = "SELECT * FROM horario 
                    INNER JOIN sala ON fk_sala_n_sala = n_sala
                    INNER JOIN disciplina ON id_disciplinas = fk_disciplina_id_disciplina
                    INNER JOIN turma ON id_turma = fk_turma_id_turma
                    INNER JOIN usuario ON id_usuario = fk_professor";
            $resultado = mysqli_query($conexao, $sql);
            ?>
            <table class="container table table-white table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Dia</th>
                        <th scope="col">Turma</th>
                        <th scope="col">Disciplina</th>
                        <th scope="col">Professor</th>
                        <th scope="col">Sala</th>
                        <th scope="col">Horário de inicio</th>
                        <th scope="col">Horário de fim</th>
                        <th colspan="3">Opções</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($dados = mysqli_fetch_assoc($resultado)) {
                        echo '<tr>';
                        echo '<td>' . $dados['id_horario'] . '</td>';
                        echo '<td>' . $dados['dia'] . '</td>';
                        echo '<td>' . $dados['nome_turma'] . '</td>';
                        echo '<td>' . $dados['nome_disciplina'] . '</td>';
                        echo '<td>' . $dados['nome_usuario'] . '</td>';
                        echo '<td>' . $dados['descricao'] . '</td>';
                        echo '<td>' . $dados['horario_inicio'] . '</td>';
                        echo '<td>' . $dados['horario_fim'] . '</td>';
                        echo '<td><a href="formedit.php?id_horario=' . $dados['id_horario'] . '"><img src="imagens/editar.png" width="20" height="20"></a></td>';
                        echo '<td><a href="excluir.php?id_horario=' . $dados['id_horario'] . '"><img src="imagens/excluir.png" width="20" height="20"></a></td>';
                        echo '</tr>';
                    }
                    ?>
                </tbody>
            </table><br>
        </div>

        <!-- <a href="../../login/redire.php"><button type="button" class="btn btn-secondary">Voltar</button></a> -->
    </div>

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
</body>

</html>