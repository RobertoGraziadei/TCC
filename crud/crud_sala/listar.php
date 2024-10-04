<?php
session_start();
if (!isset($_SESSION['nivel']) or $_SESSION['nivel'] == 2) {
    include "../../login/verif-log.php";
    die();
}
include('../../conecta.php');
echo "<link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css'>";
$sql = "SELECT * FROM sala";
$resultado = mysqli_query($conexao, $sql);
echo '<table class="table table-white table-striped">
<tr>
<th scope="col">Número da sala</th>
<th scope="col">descricao</th>
<th colspan=3>Opções</th>
</tr>';
while ($dados = mysqli_fetch_assoc($resultado)) {
    echo '<tr>';
    echo '<td>' . $dados['n_sala'] . '</td>';
    echo '<td>' . $dados['descricao'] . '</td>';
    echo '<td> <a href="formedit.php?n_sala=' . $dados['n_sala'] . '"> <img src="imagens/editar.png" width="20" height="20"> </a> </td>';
    echo '<td> <a href="excluir?n_sala=' . $dados['n_sala'] . '"> <img src="imagens/excluir.png" width="20" height="20"> </a> </td>';
    echo '</tr>';
}
echo '</table>' . "<br>";
echo '<button><a href="index.php">Voltar</a></button>';
