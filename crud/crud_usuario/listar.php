<?php
session_start();
if (!isset($_SESSION['nivel']) or $_SESSION['nivel'] == 2) {
    header('location: ../../principal.php');
    die();
}  
//conectar ao banco de dados.
include("conecta.php");

// Seleciona todos os dados da tabela historia
$sql = "SELECT * FROM usuario";

// Executa o Select
$resultado = mysqli_query($conexao, $sql);


//Lista os itens
echo '<table border=1>
<tr>
<th>Nome do usuário</th>
<th>Email</th>
<th>Senha</th>
<th>Nivel de acesso</th>
<th colspan=3>Opções</th>
</tr>';

while ($dados = mysqli_fetch_assoc($resultado)) {
echo '<tr>';    
echo '<td>'.$dados['nome_usuario'].'</td>';
echo '<td>'.$dados['email'].'</td>';
echo '<td>'.$dados['senha'] .'</td>';
echo '<td>'.$dados['nivel'] .'</td>';
/* echo '<td> <a href="formedit.php?matricula='.$dados['matricula'].'"> <img src="imagens/editar.png" width="20" height="20"> </a> </td>';
echo '<td> <a href="excluir?matricula='.$dados['matricula'].'"> <img src="imagens/excluir.png" width="20" height="20"> </a> </td>'; */
echo '</tr>';
}

echo '</table>'."<br>";
echo '<button><a href="index.php">Voltar</a></button>';
?>