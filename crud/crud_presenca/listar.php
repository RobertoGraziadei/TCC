<?php
include('../../conecta.php');

date_default_timezone_set('America/Sao_Paulo');
$data = new DateTime('now');
$agora = $data->format('Y-m-d');

if (empty($_POST) == false) {
    //var_dump($_POST);die;
    $altera = "";
    foreach ($_POST['registro'] as $g) {
        $altera = $altera .  "UPDATE presenca SET presenca=" . $g['status'] . " WHERE id_presenca= " . $g['id_presenca'] . "; ";
        //echo $altera;die;
    }
    $executa = mysqli_query($conexao, $altera);
}

$id_disciplinas = $_GET['id_disciplinas'];
$id_turma = $_GET['id_turma'];

$sql = "SELECT DISTINCT id_presenca, matricula, nome, presenca FROM aluno
LEFT JOIN presenca ON (presenca.fk_aluno_matricula = aluno.matricula) and (date (presenca.hr_batida) = '$agora')
INNER JOIN turma ON turma.id_turma = aluno.turma
INNER JOIN horario ON horario.fk_turma_id_turma = turma.id_turma
WHERE horario.fk_disciplina_id_disciplina = $id_disciplinas AND horario.fk_turma_id_turma = $id_turma
";
//echo $sql;die;
/* $sql = "SELECT 
    id_presenca,
    matricula,
    nome,
    presenca,
    turma,
    id_disciplinas
FROM aluno LEFT JOIN(
    SELECT * FROM presenca
    INNER JOIN horario ON horario.id_horario = presenca.fk_horario_id_horario
	INNER JOIN turma ON horario.fk_turma_id_turma = turma.id_turma
    INNER JOIN disciplina ON horario.fk_disciplina_id_disciplina = disciplina.id_disciplinas) AS tabelao
    ON aluno.matricula = tabelao.fk_aluno_matricula
    
    WHERE turma = $id_turma
    "; */

$result = mysqli_query($conexao, $sql);

echo "<link rel='stylesheet' href='../../css/bootstrap.min.css'>";
echo "<form action='listar.php?id_disciplinas=$id_disciplinas&id_turma=$id_turma' method='POST'>";
echo '<table class="container table table-white table-striped"> 
<tr>
<th scope="col">Nome</th>
<th scope="col">Matricula</th>
<th scope="col">Status</th>
</tr>';

$a = 0;
while ($dados = mysqli_fetch_assoc($result)) {
    //var_dump($dados);die;
    echo '<tr>';
    echo '<td>' . $dados['nome'] . '</td>';
    echo '<td>' . $dados['matricula'] . '</td>';
    echo '<td>';
    echo '<input type="text" name="registro['.$a.'][id_presenca]" value="' . $dados['id_presenca'] . '" />';
    echo '<select name="registro['.$a.'][status]" required>';
    echo '  <option value="0" ' . ($dados['presenca']  == 0 ? 'selected' :  '') . ' >Ausente</option>';
    echo '  <option value="1" ' . ($dados['presenca']  == 1 ? 'selected' :  '') . ' >Presente</option>';
    echo '</select>';
    echo '</td>';
    echo '</tr>';
    $a++;
}
echo '</table>';
echo '<div class="container">';
echo "<input type='submit' class='btn btn-primary' value='Salvar'>";
echo "</form>";
echo '<a href="../../QRcode/index.php" class="btn btn-secondary">Voltar</a>';
echo '</div>';
