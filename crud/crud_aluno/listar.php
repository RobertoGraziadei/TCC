<?php
session_start();
if (!isset($_SESSION['nivel']) or $_SESSION['nivel'] == 2) {
    include "../../login/verif-log.php";
    die();
}
include('../../conecta.php');
echo "<link rel='stylesheet' href='../../css/bootstrap.min.css'>";
$sql = "SELECT * FROM aluno
    inner join turma on turma = id_turma";
$resultado = mysqli_query($conexao, $sql);


//Lista os itens
echo '<table class="table table-white table-striped">
<tr>
<th scope="col">Matricula</th>
<th scope="col">Nome</th>
<th scope="col">Turma</th>
<th colspan=3>Opções</th>
</tr>';

while ($dados = mysqli_fetch_assoc($resultado)) {
    echo '<tr>';
    echo '<td>' . $dados['matricula'] . '</td>';
    echo '<td>' . $dados['nome'] . '</td>';
    echo '<td>' . $dados['nome_turma'] . '</td>';
    echo '<td> <a href="formedit.php?matricula=' . $dados['matricula'] . '"> <img src="imagens/editar.png" width="20" height="20"> </a> </td>';
    echo '<td> <a href="excluir?matricula=' . $dados['matricula'] . '"> <img src="imagens/excluir.png" width="20" height="20"> </a> </td>';
    echo '</tr>';
}

echo '</table>' . "<br>";
echo '<button><a href="index.php">Voltar</a></button>';
