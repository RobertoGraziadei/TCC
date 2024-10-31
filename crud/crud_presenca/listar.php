<?php
include('../../conecta.php');

//$hr_batida = $_GET['hr_batida'];

date_default_timezone_set('America/Sao_Paulo');
$data = new DateTime('now');
$agora = $data->format('Y-m-d');


if (empty($_POST) == false) {


    //update dos pares de código do registro e a presenção
//    var_dump($_POST);

    //exit;
    $altera = "";
    foreach ($_POST['registro'] as $g) {
        //4x
        //$g['cod'] .. 
        //$g['presenca'] .. 
        $altera = $altera .  "UPDATE presenca SET presenca=". $g['status'] ." WHERE id_presenca= ". $g['id_presenca'] .'; ';
    
    }

    $executa = mysqli_query($conexao, $altera);
    //exit;
}

$id_disciplinas = $_GET['id_disciplinas'];
$id_turma = $_GET['id_turma'];


$sql = "SELECT DISTINCT id_presenca, matricula, nome, presenca FROM aluno
LEFT JOIN presenca ON (presenca.fk_aluno_matricula = aluno.matricula) and (date (presenca.hr_batida) = '$agora')
INNER JOIN turma ON turma.id_turma = aluno.turma
INNER JOIN horario ON horario.fk_turma_id_turma = turma.id_turma
WHERE horario.fk_disciplina_id_disciplina = $id_disciplinas AND horario.fk_turma_id_turma = $id_turma
";
$result = mysqli_query($conexao, $sql);



echo "<link rel='stylesheet' href='../../css/bootstrap.min.css'>";


echo "<form action='./listar.php?id_disciplinas=$id_disciplinas&id_turma=$id_turma' method='POST'>"; //iniciio formulario 


//cabeçalhos da tabela
echo '<table class="container table table-white table-striped"> 
<tr>
<th scope="col">Nome</th>
<th scope="col">Matricula</th>
<th scope="col">Status</th>
</tr>';

$a = 0;


while ($dados = mysqli_fetch_assoc($result)) { //para cada um dos registros de presença
   
   //tr table row
    echo '<tr>';
     echo '<td>' . $dados['nome'] . '</td>';
     echo '<td>' . $dados['matricula'] . '</td>';

    //passando o parâmetro id_presenca que será enviado pelo POST no form
    echo '<td>';
     echo '<input type="hidden" name="registro[' . $a . '][id_presenca]" value="' . $dados['id_presenca']   . '" />' ;
   

        
      echo '<select name="registro[' . $a . '][status]" required>';
       echo '  <option value="0" '  .  ($dados['presenca']  == 0 ? 'selected' :  '')   .   '  >Ausente</option>';
       echo '  <option value="1" '    .  ($dados['presenca']  == 1 ? 'selected' :  '')   .    '  >Presente</option>';
     echo '</select>';
   
    echo '</td>';



    $a++;
}
 

echo '</td>' . 


'</tr>';

echo "<input type='submit' value='Salvar'>";
echo "</form>";

echo '<a href="../../QRcode/index.php"><button>Voltar</button></class=a>';
