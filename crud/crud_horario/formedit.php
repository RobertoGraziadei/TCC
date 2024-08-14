<?php include('../../conecta.php');
session_start();
if (!isset($_SESSION['nivel']) or $_SESSION['nivel'] == 2) {
    header('location: ../../principal.php');
    die();
}?>
<!DOCTYPE html>
<html lang="pt_br">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar disciplina</title>
    
</head>
<body>

<form action="alterar.php" method="get">

    <h2>Editar disciplina</h2>
    <h2>Crud do horário</h2>
    <input type="hidden" name="id_horario" value="<?php echo $dados['id_horario']; ?>">
        <select name="dia" require>
            <option value="<?php echo $dados['dia'];?>"></option>
            <option value="Segunda-feira">Segunda-feira</option>
            <option value="Terça-feira">Terça-feira</option>
            <option value="Quarta-feira">Quarta-feira</option>
            <option value="Quinta-feira">Quinta-feira</option>
            <option value="Sexta-feira">Sexta-feira</option>
        </select><br><br>
        <select name="n_sala" require>
            <option value="<?php echo $dados['n_sala'];?>"></option>
            <option value="a">109</option>
            <option value="b">108</option>
            <option value="c">107</option>
        </select><br><br>
        
        <select name="disciplina" require>
            <option value="<?php echo $dados['fk_disciplina_id_disciplina'];?>"></option>
            <option value="a">Português</option>
            <option value="b">Matemática</option>
            <option value="c">História</option>
        </select><br><br>
        <select name="turma" require>
            <option value="<?php echo $dados['fk_turma_id_turma'];?>"></option>
            <option value="a">INF31</option>
            <option value="b">ADM31</option>
            <option value="c">INF21</option>
        </select><br><br>
        <label>Horário inicial <input type="time" name="horario-inicio" value="<?php echo $dados['horario_inicio'];?>" required></label><br>
        <label>Horário final <input type="time" name="horario-fim" value="<?php echo $dados['horario_inicio'];?>" required></label><br><br>

    <p>Deseja <a href="index.php">Voltar?</a></p>

</form>
    
</body>
</html>
<?php

$id_horario = $_GET['id_horario'];
$dia = $_GET['dia'];
$sala = $_GET['n_sala'];
$turma = $_GET['turma'];
$disciplina = $_GET['disciplina'];
$horario_i = $_GET['horario_inicial'];
$horario_f = $_GET['horario_fim'];

$sql = "SELECT * FROM horario WHERE id_horario = $id_horario";
$resultado = mysqli_query($conexao,$sql);
$dados = mysqli_fetch_assoc($resultado);
var_dump($id_horario);
var_dump($dia);

?>