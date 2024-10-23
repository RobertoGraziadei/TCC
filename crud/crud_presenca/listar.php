<?php
include('../../conecta.php');

$sql = "SELECT * FROM aluno 
INNER JOIN turma ON aluno.turma = turma.id_turma
INNER JOIN presenca ON aluno.matricula = presenca.fk_aluno_matricula
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