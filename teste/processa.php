<?php
include "../conecta.php";
$matricula = $_POST['matricula'];

$sql = "SELECT turma FROM aluno where matricula = $matricula";
$exe = mysqli_query($conexao, $sql);

$dados = mysqli_fetch_assoc($exe);
echo $dados['turma'] . "<br>";

$sql2 = "SELECT * FROM aluno inner join turma on id_turma =" . $dados['turma'];
$exe2 = mysqli_query($conexao, $sql2);

$dados2 = mysqli_fetch_assoc($exe2);
echo "Este aluno pertence a turma " . $dados2['nome_turma'];
//
/* $sql2 = "SELECT * FROM horario inner join aluno on fk_turma_id_turma = $turma
inner join disciplina on fk_disciplina_id_disciplina = id_disciplinas";
$exe2 = mysqli_query($conexao, $sql2);

$dados2 = mysqli_fetch_assoc($exe2);
echo $dados2['nome_disciplina']; */