<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <title></title>
</head>
<body>
    
</body>
</html> -->
<?php
echo "<link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css'>";
session_start();
if (!isset($_SESSION['nivel']) or $_SESSION['nivel'] == 2) {
    header('location: ../../principal.php');
    die();
}
//conectar ao banco de dados.
include('../../conecta.php');

// Seleciona todos os dados da tabela historia
$sql = "SELECT * FROM horario 
INNER JOIN sala ON fk_sala_n_sala = n_sala
INNER JOIN disciplina ON id_disciplinas = fk_disciplina_id_disciplina
INNER JOIN turma ON id_turma = fk_turma_id_turma
;";

// Executa o Select
$resultado = mysqli_query($conexao,$sql);

//Lista os itens
echo '<table class="table">
<tr>
<th scope="col">Turma</th>
<th scope="col">Dia</th>
<th scope="col">Disciplina</th>
<th scope="col">Sala</th>
<th scope="col">Horário de inicio</th>
<th scope="col">Horário de fim</th>
<th colspan=3>Opções</th>
</tr>';

while ($dados = mysqli_fetch_assoc($resultado)) {
echo '<tr>';    
echo '<td>'.$dados['nome_turma'] .'</td>';
echo '<td>'.$dados['dia'] .'</td>';
echo '<td>'.$dados['nome_disciplina'] .'</td>';
echo '<td>'.$dados['descricao'] .'</td>';
echo '<td>'.$dados['horario_inicio'] .'</td>';
echo '<td>'.$dados['horario_fim'] .'</td>';
echo '<td> <a href="formedit.php?id_horario='.$dados['id_horario'].'"> <img src="imagens/editar.png" width="20" height="20"> </a> </td>';
echo '<td> <a href="excluir.php?id_horario='.$dados['id_horario'].'"> <img src="imagens/excluir.png" width="20" height="20"> </a> </td>';
echo '</tr>';
}

echo '</table>'."<br>";
echo '<button><a href="index.php">Voltar</a></button>';
?>