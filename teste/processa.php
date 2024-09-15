<?php
include "../conecta.php";
$matricula = $_POST['matricula'];
$sala = $_POST['sala'];

$sql = "SELECT turma FROM aluno where matricula = $matricula";
$exe = mysqli_query($conexao, $sql);

$dados = mysqli_fetch_assoc($exe);
echo $dados['turma'] . "<br>";
$sql3 = "SELECT * FROM aluno where matricula = $matricula";
$exe3 = mysqli_query($conexao, $sql3);
$dados3 = mysqli_fetch_assoc($exe3);

$sql2 = "SELECT * FROM aluno inner join turma on id_turma =" . $dados3['turma'];
$exe2 = mysqli_query($conexao, $sql2);
$dados2 = mysqli_fetch_assoc($exe2);
echo $dados3['nome'] . " pertence a turma " . $dados2['nome_turma'] . "<br>";

date_default_timezone_set('America/Sao_Paulo');
    $data = new DateTime('now');
    $agora = $data->format('d/m/Y H:i');

echo $agora;

//  ATÉ ESTA LINHA ESTA FEITO A INTEGRAÇÃO DA MATRICULA COM A TURMA DO ALUNO
//  PEGANDO A DATA E HORA DA BATIDA DO QR CODE


/* $sql4 = "SELECT * FROM horario inner join aluno on fk_turma_id_turma =" . $dados3['turma'];
$exe4 = mysqli_query($conexao, $sql4);
echo $exe4; */
