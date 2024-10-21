<?php
include('../../conecta.php');

$sql = "SELECT * FROM aluno 
INNER JOIN turma ON aluno.turma = turma.id_turma
INNER JOIN presenca ON aluno.matricula = presenca.fk_aluno_matricula
";
$result = mysqli_query($conexao, $sql);

echo "<link rel='stylesheet' href='../../css/bootstrap.min.css'>";
echo '<table class="table table-white table-striped">
<tr>
<th scope="col">Nome</th>
<th scope="col">Matricula</th>
<th scope="col">Turma</th>
<th scope="col">Status</th>
<th colspan=3>Opções</th>
</tr>';

while ($dados = mysqli_fetch_assoc($result)) {
    echo '<tr>';
    echo '<td>' . $dados['nome'] . '</td>';
    echo '<td>' . $dados['matricula'] . '</td>';
    echo '<td>' . $dados['nome_turma'] . '</td>';
    echo '<td>' . $dados['presenca'] . '</td>';
    echo '<td> <a href="formedit.php?matricula=' . $dados['matricula'] . '"> <img src="imagens/editar.png" width="20" height="20"> </a> </td>';
    echo '<td> <a href="excluir?matricula=' . $dados['matricula'] . '"> <img src="imagens/excluir.png" width="20" height="20"> </a> </td>';
    echo '</tr>';
}
