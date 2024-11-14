<?php
include('../../conecta.php');
echo "<link rel='stylesheet' href='../../css/bootstrap.min.css'>";
echo '<script src="../../css/bootstrap.min.js"></script>';
echo "<link rel='stylesheet' href='../../css/layout.min.css'>";

date_default_timezone_set('America/Sao_Paulo');
$data = new DateTime('now');
$agora = $data->format('Y-m-d');

$id_disciplinas = $_GET['id_disciplinas'];
$id_turma = $_GET['id_turma'];
if (empty($_GET['hr_batida'])) {
    $data = $agora;
} else {
    $data = $_GET['hr_batida'];
}

$sql = "SELECT DISTINCT id_presenca, matricula, nome, presenca FROM aluno
LEFT JOIN presenca ON (presenca.fk_aluno_matricula = aluno.matricula) and (date (presenca.hr_batida) = '$data')
INNER JOIN turma ON turma.id_turma = aluno.turma
INNER JOIN horario ON horario.fk_turma_id_turma = turma.id_turma
WHERE horario.fk_disciplina_id_disciplina = $id_disciplinas AND horario.fk_turma_id_turma = $id_turma
";
//echo $sql;die;
$result = mysqli_query($conexao, $sql);

$dados = [];

while ($linha = mysqli_fetch_assoc($result)) {
    $dados[] = $linha;
}

?>
<form action="" method="get">
    <label><input name="id_presenca" type="hidden" value="<?php echo $dados['id_presenca'] ?>" /></label>
</form>