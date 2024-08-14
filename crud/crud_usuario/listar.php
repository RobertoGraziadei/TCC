<?php
session_start();
if (!isset($_SESSION['nivel']) or $_SESSION['nivel'] == 2) {
    header('location: ../../principal.php');
    die();
}
include('../../conecta.php');
echo "<link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css'>";
$sql = "SELECT * FROM usuario";
$resultado = mysqli_query($conexao, $sql);
echo '<table class="table table-white table-striped">
<tr>
<th scope="col">Nome do usuário</th>
<th scope="col">Email</th>
<th scope="col">Senha</th>
<th scope="col">Nivel de acesso</th>
<th colspan=3>Opções</th>
</tr>';
while ($dados = mysqli_fetch_assoc($resultado)) {
    echo '<tr>';
    echo '<td>' . $dados['nome_usuario'] . '</td>';
    echo '<td>' . $dados['email'] . '</td>';
    echo '<td>' . $dados['senha'] . '</td>';
    echo '<td>' . $dados['nivel'] . '</td>';
    echo '<td> <a href="formedit.php?nome_usuario=' . $dados['nome_usuario'] . '"> <img src="imagens/editar.png" width="20" height="20"> </a> </td>';
    echo '<td> <a href="excluir?nome_usuario=' . $dados['nome_usuario'] . '"> <img src="imagens/excluir.png" width="20" height="20"> </a> </td>';
    echo '</tr>';
}
echo '</table>' . "<br>";
echo '<button><a href="index.php">Voltar</a></button>';
