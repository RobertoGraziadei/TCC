<?php
session_start();
if (!isset($_SESSION['nivel']) or $_SESSION['nivel'] == 2) {
    header('location: ../../principal.php');
    die();
}
//conectar ao banco de dados.
include("conecta.php");

// Seleciona todos os dados da tabela historia
$sql = "SELECT * FROM disciplina";

// Executa o Select
$resultado = mysqli_query($conexao,$sql);


//Lista os itens
echo '<table border=1>
<tr>
<!--<th>Id</th>-->
<th>Nome da disciplina</th>
<th colspan=3>Opções</th>
</tr>';

while ($dados = mysqli_fetch_assoc($resultado)) {
echo '<tr>';
echo '<td>'.$dados['nome_disciplina'] .'</td>';
echo '<td> <a href="formedit.php?id_disciplinas='.$dados['id_disciplinas'].'"> <img src="imagens/editar.png" width="20" height="20"> </a> </td>';
echo '<td> <a href="excluir?id_disciplinas='.$dados['id_disciplinas'].'"> <img src="imagens/excluir.png" width="20" height="20"> </a> </td>';
echo '</tr>';
}

echo '</table>'."<br>";
echo '<button><a href="index.php">Voltar</a></button>';
?>