<?php
include('../../conecta.php');

date_default_timezone_set('America/Sao_Paulo');
$data = new DateTime('now');
$agora = $data->format('Y-m-d');



if (empty($_POST) == false) { // se vier post, faz isto (chamada)
    //var_dump($_POST);die;
    $ss  = "";
    foreach ($_POST['registro'] as $g) {
        $ss = $ss .  "UPDATE presenca SET presenca=" . $g['status'] . " WHERE id_presenca= " . $g['id_presenca'] . "; ";
        $executa = mysqli_query($conexao, $ss);
    }
}




$id_disciplinas = $_GET['id_disciplinas'];
$id_turma = $_GET['id_turma'];

if (empty($_GET['hr_batida'])){
    $data = $agora;
}
else{
    $data = $_GET['hr_batida'];
}

$sql = "SELECT DISTINCT id_presenca, matricula, nome, presenca FROM aluno
LEFT JOIN presenca ON (presenca.fk_aluno_matricula = aluno.matricula) and (date (presenca.hr_batida) = '$data')
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
echo "<form action='listar.php' method='GET'>";
echo "<div class='container'>";
echo "<h3>Selecione a data para ver as presenças dos alunos</h3>";

echo "<input type='date' name='hr_batida' required>";
echo "<input type='hidden' name='id_disciplinas' value='$id_disciplinas' />";
echo "<input type='hidden' name='id_turma' value='$id_turma' />";



echo "<input onclick='' type='submit' value='Ver'>";
echo "</div>";

echo "</form>";








//echo "<link rel='stylesheet' href='../../css/layout.css'>";
echo "<div id='mostraAluno'>";
echo "<h3 class='container' style='margin-top:20px;'>Alunos registrados</h3>";
echo "<form action='listar.php?id_disciplinas=$id_disciplinas&id_turma=$id_turma&hr_batida=$agora' method='POST'>";
echo '<table class="container table table-white table-striped"> 
<tr>
<th scope="col">Nome</th>
<th scope="col">Matricula</th>
<th scope="col">Status</th>
</tr>';

$a = 0;

$dados = [];
while ($d = mysqli_fetch_assoc($result)) {

    $dados[] = $d;
}



foreach ($dados as $d) {

    //var_dump($dados);die;

    if (!(empty($d['id_presenca']))) {
        echo '<tr>';
        echo '<td>' . $d['nome'] . '</td>';
        echo '<td>' . $d['matricula'] . '</td>';
        echo '<td>';
        echo '<input type="hidden" name="registro[' . $a . '][id_presenca]" value="' . $d['id_presenca'] . '" />';
        echo '<select name="registro[' . $a . '][status]" required>';
        echo '  <option value="0" ' . ($d['presenca']  == 0 ? 'selected' :  '') . ' >Ausente</option>';
        echo '  <option value="1" ' . ($d['presenca']  == 1 ? 'selected' :  '') . ' >Presente</option>';
        echo '</select>';
        echo '</td>';
        echo '</tr>';
        $a++;
    }
}
echo '</table>';
echo '<div class="container">';
echo "<input type='submit' class='btn btn-primary' value='Salvar'>";
echo '<a href="../../QRcode/index.php" class="btn btn-secondary">Voltar</a>';
echo "</form>";


echo "<h3 style='margin-top:20px;'>Alunos ausentes</h3>";



//while ($dados = mysqli_fetch_assoc($result)) {

foreach ($dados as $d) {
    if (empty($d['id_presenca'])) {
        echo '<p>' . $d['nome'] . '</p>';
    }
}

echo "</div>";
echo '</div>';

"<script>
jQuery(#mostraAluno).hide
function mostraAluno{
jQuery(#mostraAluno).show
}
</script>";