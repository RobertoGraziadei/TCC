<?php
echo "<link rel='stylesheet' href='../../css/bootstrap.min.css'>";
session_start();
if (!isset($_SESSION['nivel']) or $_SESSION['nivel'] == 2) {
    include "../../login/verif-log.php";
    die();
}
include('../../conecta.php');
$sql = "SELECT * FROM turma";
$resultado = mysqli_query($conexao, $sql);
echo '<table class="table table-white table-striped">
<tr>
<th scope="col">Id da turma</th>
<th scope="col">Nome da turma</th>
<th colspan=3>Opções</th>
</tr>';
while ($dados = mysqli_fetch_assoc($resultado)) {
    echo '<tr>';
    echo '<td>' . $dados['id_turma'] . '</td>';
    echo '<td>' . $dados['nome_turma'] . '</td>';
    echo '<td> <a href="formedit.php?id_turma=' . $dados['id_turma'] . '"> <img src="imagens/editar.png" width="20" height="20"> </a> </td>';
    echo '<td> <a href="excluir?id_turma=' . $dados['id_turma'] . '"> <img src="imagens/excluir.png" width="20" height="20"> </a> </td>';
    echo '</tr>';
}
echo '</table>' . "<br>";
echo '<button><a href="index.php">Voltar</a></button>';
