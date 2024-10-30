<?php
include('../../conecta.php');
$id_disciplinas = $_GET['id_disciplinas'];
$id_turma = $_GET['id_turma'];
//$hr_batida = $_GET['hr_batida'];

date_default_timezone_set('America/Sao_Paulo');
$data = new DateTime('now');
$agora = $data->format('Y-m-d');


if (empty($_POST) == false) {


    //update dos pares de código do registro e a presenção
    var_dump($_POST);

    $sql = "";
    foreach ($_POST['item'] as $g) {


        //4x
        //$g['cod'] .. 
        //$g['presenca'] .. 

        $sql = $sql .  " update from pessoas set nome=" . $nome .  " where id = " .  $id .  '; ';
    }


    $result = mysqli_query($conexao, $sql);


    exit;
}



$sql = "SELECT DISTINCT id_presenca, matricula, nome, presenca FROM aluno
LEFT JOIN presenca ON (presenca.fk_aluno_matricula = aluno.matricula) and (date (presenca.hr_batida) = '$agora')
INNER JOIN turma ON turma.id_turma = aluno.turma
INNER JOIN horario ON horario.fk_turma_id_turma = turma.id_turma
WHERE horario.fk_disciplina_id_disciplina = $id_disciplinas AND horario.fk_turma_id_turma = $id_turma
";
$result = mysqli_query($conexao, $sql);

echo "<link rel='stylesheet' href='../../css/bootstrap.min.css'>";
echo "<form action='./listar.php' method='POST'>";
echo '<table class="container table table-white table-striped">
<tr>
<th scope="col">Nome</th>
<th scope="col">Matricula</th>
<th scope="col">Status</th>
</tr>';

$a = 0;
while ($dados = mysqli_fetch_assoc($result)) {
    echo '<tr>';
    echo '<td>' . $dados['nome'] . '</td>';
    echo '<td>' . $dados['matricula'] . '</td>';



    echo '<td>' . '<input type="hidden" name="registro['.$a .'][presenca]" value="' . $dados['id_presenca']   . '" />' .   '</td>';

    echo '<td>' . '<input type="hidden" name="registro['.$a .'][status]" value="' . $dados['presenca']   . '" />';

    echo '<label for="presenca"></label><br>
    <select name="presenca" required>
        <?php
        foreach($dados as $dados2)' .
            '<option value="<?php echo $dados2["presenca"]; ?>"'.
                '<?php if ($dados2["presenca"] == $dados2["presenca"]) {'.'
                    echo "selected";
                } ?>>
                <?php echo $dados2["presenca"]; ?>'.'
            </option>
        <?php } ?>
    </select><br><br>';




    //trocar o if debaixo por um select para [$a] a presença




    /*     if ($dados['presenca'] == 1) {
        echo '<td>' . 'Presente' . '</td>';
    }if ($dados['presenca'] != 1) {
        echo '<td>' .'Ausente' . '</td>';
    } */
    echo '</td>' . '</tr>';
}
echo "<input type='submit' value='Salvar'>";
echo "</form>";


echo '<a href="../../QRcode/index.php"><button>Voltar</button></class=a>';
