<?php
/* if (!isset($_SESSION['nivel']) or $_SESSION['nivel'] == 1) {
    include "../login/verif-log.php";
} */

date_default_timezone_set('America/Sao_Paulo');
$data = new DateTime('now');
$agora = $data->format('Y-m-d H:i:s');

echo "<link rel='stylesheet' href='../css/bootstrap.min.css'>";
echo '<script src="../css/bootstrap.min.js"></script>';

include "../../conecta.php";
$matricula = $_GET['matricula'];
$id_disciplina = $_GET['id_disciplinas'];
$id_turma = $_GET['id_turma'];
$hr_batida = $_GET['hr_batida'];

$sql4 = "SELECT * FROM horario 
INNER JOIN disciplina ON horario.fk_disciplina_id_disciplina = disciplina.id_disciplinas 
INNER JOIN turma on horario.fk_turma_id_turma = turma.id_turma 

WHERE horario.horario_inicio < NOW() AND horario.horario_fim > NOW() 
AND horario.dia = 'Segunda-Feira'
AND turma.id_turma = $id_turma
AND disciplina.id_disciplinas = $id_disciplina;
";
//echo $sql4;die;
$exe4 = mysqli_query($conexao, $sql4);

/* if ($verifi_sala = mysqli_num_rows($exe4) == 0) {
    echo "<script>
    alert('Aula inválida');
    window.location.href = 'chamada.php?sala=$sala';
    </script>";
    die();
} */

/* if ($verifi_sala = mysqli_num_rows($exe4) == 0) {
    echo "<script>Swal.fire({
    icon: 'error',
    title: 'Ops...',
    text: 'Aula inválida'  
});
</script>";
    die;
} */


$pega_id = mysqli_fetch_assoc($exe4);
$cadastra_presenca = "INSERT INTO presenca (hr_batida, fk_horario_id_horario, fk_aluno_matricula, presenca)
VALUES ('$agora'," . $pega_id['id_horario'] . ", $matricula , 1)";
$exe_cadastro = mysqli_query($conexao, $cadastra_presenca);

//echo $cadastra_presenca;die;

//$resultado = mysqli_query($conexao, $sql4);
/* header('lcoation: listar.php?id_disciplinas=<?php echo $id_disciplina; ?>&
    id_turma=<?php echo $id_turma;?>&
    hr_batida=<?php $hr_batida?>'); */
    
    echo "<script>
    window.location.href = 'listar.php?id_disciplinas=<?php echo $id_disciplina; ?>&
    id_turma=<?php echo $id_turma;?>&
    hr_batida=<?php $hr_batida?>
    ';
    </script>";
    
    die;