<?php
session_start();
if (!isset($_SESSION['nivel']) or $_SESSION['nivel'] == 2) {
    header('location: ../../principal.php');
    die();
}
//conectar ao banco de dados.
include("conecta.php");

// Seleciona todos os dados da tabela historia
$sql = "SELECT * FROM horario";

// Executa o Select
$resultado = mysqli_query($conexao,$sql);


//Lista os itens
echo '<table border=1>
<tr>
<th>Dia</th>
<th>Número da Sala</th>
<th>Disciplina</th>
<th>Turma</th>
<th>Horário de inicio</th>
<th>Horário de fim</th>
<th colspan=3>Opções</th>
</tr>';

while ($dados = mysqli_fetch_assoc($resultado)) {
echo '<tr>';    
echo '<td>'.$dados['dia'] .'</td>';
echo '<td>'.$dados['fk_sala_n_sala'] .'</td>';
echo '<td>'.$dados['fk_disciplina_id_disciplina'] .'</td>';
echo '<td>'.$dados['fk_turma_id_turma'] .'</td>';
echo '<td>'.$dados['horario_inicio'] .'</td>';
echo '<td>'.$dados['horario_fim'] .'</td>';
echo '<td> <a href="formedit.php?id_horario='.$dados['id_horario'].'"> <img src="imagens/editar.png" width="20" height="20"> </a> </td>';
echo '<td> <a href="excluir.php?id_horario='.$dados['id_horario'].'"> <img src="imagens/excluir.png" width="20" height="20"> </a> </td>';
echo '</tr>';
}

echo '</table>'."<br>";
echo '<button><a href="index.php">Voltar</a></button>';
?>