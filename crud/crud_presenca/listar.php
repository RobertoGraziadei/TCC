<?php
include('../../conecta.php');
$id_disciplinas = $_GET['id_disciplinas'];
$id_turma = $_GET['id_turma'];
//$hr_batida = $_GET['hr_batida'];

$sql = "SELECT nome, presenca FROM aluno
LEFT JOIN presenca ON (presenca.fk_aluno_matricula = aluno.matricula) and (date (presenca.hr_batida) = '2024-10-22')
INNER JOIN turma ON turma.id_turma = aluno.turma
INNER JOIN horario ON horario.fk_turma_id_turma = turma.id_turma
WHERE horario.fk_disciplina_id_disciplina = $id_disciplinas AND horario.fk_turma_id_turma = $id_turma
";
$result = mysqli_query($conexao, $sql);

echo "<link rel='stylesheet' href='../../css/bootstrap.min.css'>";
echo '<table class="container table table-white table-striped">
<tr>
<th scope="col">Nome</th>
<th scope="col">Status</th>
</tr>';

while ($dados = mysqli_fetch_assoc($result)) {
    echo '<tr>';
    echo '<td>' . $dados['nome'] . '</td>';
    if ($dados['presenca'] == 1) {
        echo '<td>' . 'Presente' . '</td>';
    }
    if ($dados['presenca'] == 0) {
        echo '<td>' .
        'Ausente'
        . '</td>';
    }
    echo '</tr>';
}
echo '<a href="../../QRcode/index.php"><button>Voltar</button></a>';
?>