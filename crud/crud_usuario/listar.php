<?php
session_start();
if (!isset($_SESSION['nivel']) or $_SESSION['nivel'] == 2) {
    include "../../login/verif-log.php";
    die();
}
echo "<link rel='stylesheet' href='../../css/bootstrap.min.css'>";
include('../../conecta.php');
$sql = "SELECT * FROM usuario";
$resultado = mysqli_query($conexao, $sql);
echo '<table class=" container table table-white table-striped">
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
    echo '<td>' . '************' . '</td>';
    echo '<td>' . $dados['nivel'] . '</td>';
    echo '<td> <a href="formedit.php?email=' . $dados['email'] . '"> <img src="imagens/editar.png" width="20" height="20"> </a> </td>';
    echo '<td> <a href="excluir?email=' . $dados['email'] . '"> <img src="imagens/excluir.png" width="20" height="20"> </a> </td>';
    echo '</tr>';
}
echo '</table>' . "<br>";
echo '<div class="container"><a href="formcad.php"><button>Voltar</button></a></div>';