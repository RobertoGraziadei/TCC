<?php

if (!isset($_SESSION['nivel']) or $_SESSION['nivel'] == 1) {
    include "../login/verif-log.php";
}

echo "<link rel='stylesheet' href='../css/bootstrap.min.css'>";
echo '<script src="../css/bootstrap.min.js"></script>';
include "../conecta.php";
$matricula = $_GET['matricula'];
$sala = $_GET['sala'];

$sql = "SELECT turma FROM aluno where matricula = $matricula";
$exe = mysqli_query($conexao, $sql);

if (mysqli_num_rows($exe) == 0) {
    echo "<script>
    alert('Número de matricula inválida');
    window.location.href = 'chamada.php?sala=$sala';
    </script>";
    die();
}


/* $verifi_sala = "SELECT * FROM horario
INNER JOIN sala ON horario.fk_sala_n_sala = sala.n_sala
Where sala.n_sala = $sala";
$exe_sala = mysqli_query($conexao, $exe_sala);

if($olhar_sala = mysqli_num_rows($exe_sala) ==) */

$dados = mysqli_fetch_assoc($exe);
//echo $dados['turma'] . "<br>";
$sql3 = "SELECT * FROM aluno where matricula = $matricula";
$exe3 = mysqli_query($conexao, $sql3);
$dados3 = mysqli_fetch_assoc($exe3);

$sql2 = "SELECT * FROM aluno inner join turma on id_turma =" . $dados3['turma'];
$exe2 = mysqli_query($conexao, $sql2);
$dados2 = mysqli_fetch_assoc($exe2);
//echo $dados3['nome'] . " pertence a turma " . $dados2['nome_turma'] . "<br>";

$sql5 = "SELECT * FROM horario";
$exe5 = mysqli_query($conexao, $sql5);

date_default_timezone_set('America/Sao_Paulo');
$data = new DateTime('now');
$agora = $data->format('Y-m-d H:i:s');
//echo $agora;

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
//echo "<br>" . $dia_semana;

//  ATÉ ESTA LINHA ESTA FEITO A INTEGRAÇÃO DA MATRICULA COM A TURMA DO ALUNO
//  PEGANDO A DATA E HORA COM O DIA DA SEMANA DA BATIDA DO QR CODE

// INFORMAÇÕES: TURMA, DATA E HORA; DIA DA SEMANA



//TESTANDO NOVOS DIAS
$dia_semana2 = 'Segunda-Feira';
//echo "<br>" . $dia_semana2;

$sql4 = "SELECT * FROM horario  
INNER JOIN sala ON horario.fk_sala_n_sala = sala.n_sala
INNER JOIN disciplina ON horario.fk_disciplina_id_disciplina = disciplina.id_disciplinas
INNER join turma on horario.fk_turma_id_turma = turma.id_turma
WHERE horario.fk_sala_n_sala = $sala AND horario.fk_turma_id_turma =" . $dados['turma'] . "
AND horario.horario_inicio < NOW() AND horario.horario_fim > NOW() AND horario.dia = '$dia_semana2'"; //TROCAR PARA $dia_semana PARA SER REALMENTE O DIA DA SEMANA
$exe4 = mysqli_query($conexao, $sql4);

if ($verifi_sala = mysqli_num_rows($exe4) == 0) {
    echo "<script>
    alert('Nenhuma aula encontrada!');
    window.location.href = 'chamada.php?sala=$sala';
    </script>";
    die();
}
$pega_id = mysqli_fetch_assoc($exe4);

$verifica = "SELECT * FROM presenca WHERE fk_aluno_matricula = $matricula
AND fk_horario_id_horario = " . $pega_id['id_horario'] . "
AND DATE(hr_batida) = DATE(NOW())";
$executa = mysqli_query($conexao, $verifica);
if(mysqli_num_rows($executa) > 0){

    $_SESSION['mensagem'] = "O aluno $nome_aluno ja está presente na aula!";
    header("location: chamada.php?sala=$sala");
    die;
}

    echo "<script>
    alert('Registro inválido. O aluno já foi registrado nesta aula!');
    window.location.href = 'chamada.php?sala=$sala';
    </script>";
    die();


$cadastra_presenca = "INSERT INTO presenca (hr_batida, fk_horario_id_horario, fk_aluno_matricula, presenca)
VALUES ('$agora'," . $pega_id['id_horario'] . ", $matricula , 1)";
$exe_cadastro = mysqli_query($conexao, $cadastra_presenca);
$resultado = mysqli_query($conexao, $sql4);
$nome_aluno = $dados3['nome'];
?>
<?php
    $_SESSION['mensagem'] = "Presença registrada do aluno(a) $nome_aluno";
    header("location: chamada.php?sala=$sala");
?>
