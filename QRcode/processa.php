<?php
/* if ($_POST) { */
include "../conecta.php";
$matricula = $_GET['matricula'];
$sala = $_GET['sala'];
if ($sala == null) {
    echo 'Nenhuma sala selecionada';
    die;
}

$sql = "SELECT turma FROM aluno where matricula = $matricula";
$exe = mysqli_query($conexao, $sql);

if (mysqli_num_rows($exe) == 0) {
    echo 'Numero de matricula inválida';
    die;
}

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

$dia_semana_pt = array(
    'Sunday' => 'Domingo',
    'Monday' => 'Segunda-Feira',
    'Tuesday' => 'Terça-Feira',
    'Wednesday' => 'Quarta-Feira',
    'Thursday' => 'Quinta-Feira',
    'Friday' => 'Sexta-Feira',
    'Saturday' => 'Sábado',
);

$dia_semana_ing = $data->format('l');
$dia_semana = $dia_semana_pt[$dia_semana_ing];
echo "<br>" . $dia_semana;

//  ATÉ ESTA LINHA ESTA FEITO A INTEGRAÇÃO DA MATRICULA COM A TURMA DO ALUNO
//  PEGANDO A DATA E HORA COM O DIA DA SEMANA DA BATIDA DO QR CODE

// INFORMAÇÕES: TURMA, DATA E HORA; DIA DA SEMANA



echo "<link rel='stylesheet' href='../css/bootstrap.min.css'>";

$sql4 = "SELECT * FROM horario  
INNER JOIN sala ON horario.fk_sala_n_sala AND sala.n_sala = $sala
INNER JOIN disciplina ON horario.fk_disciplina_id_disciplina = disciplina.id_disciplinas
INNER join turma on horario.fk_turma_id_turma AND turma.id_turma =" . $dados['turma'] ."
WHERE horario.horario_inicio < NOW() AND horario.horario_fim > NOW()";

$resultado = mysqli_query($conexao, $sql4);

echo '<table class="table">
<tr>
<th scope="col">#</th>
<th scope="col">Dia</th>
<th scope="col">Turma</th>
<th scope="col">Disciplina</th>
<th scope="col">Professor</th>
<th scope="col">Sala</th>
<th scope="col">Horário de inicio</th>
<th scope="col">Horário de fim</th>
</tr>';

while($dados4 = mysqli_fetch_assoc($resultado)){
echo '<tr>';
echo '<td>' . $dados4['id_horario'] . '</td>';
echo '<td>' . $dados4['dia'] . '</td>';
echo '<td>' . $dados2['nome_turma'] . '</td>';
echo '<td>' . $dados4['nome_disciplina'] . '</td>'; // fk_disciplina_id_disciplina
echo '<td>' . $dados4['professor'] . '</td>';
echo '<td>' . $dados4['descricao'] . '</td>';
echo '<td>' . $dados4['horario_inicio'] . '</td>';
echo '<td>' . $dados4['horario_fim'] . '</td>';
echo '</tr>';
}
echo '</table>' . "<br>";

echo '<button><a href="index.php">Voltar</a></button>';

/*} else {
    header('location: form.php');
} */
