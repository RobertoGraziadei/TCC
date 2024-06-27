<?php

// Recebe o id do usuário
$id_horario = $_GET['id_horario'];
$dia = $_GET['dia'];
$horario = $_GET['horario'];

// Conectar ao BD
include("conecta.php");


// Seleciona os dados do usuário da tabela
$sql = "SELECT * FROM horario WHERE id_horario = $id_horario";

// Executa o Select
$resultado = mysqli_query($conexao,$sql);

// Gera o vetor com os dados buscados
$dados = mysqli_fetch_assoc($resultado);

?>

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
    <input type="date" name="dia" value="<?php echo $dados['dia'];?>">
    Edite o nome
    <input type="time" value="<?php echo $dados['horario'];?>" name="horario"/><br><br>
       

    <input type="submit" value="Editar"/>

    <p>Deseja <a href="index.php">Voltar?</a></p>

</form>
    
</body>
</html>