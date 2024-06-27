<?php

// Recebe o id do usuário
$id_turma = $_GET['id_turma'];

// Conectar ao BD
include("conecta.php");


// Seleciona os dados do usuário da tabela
$sql = "SELECT * FROM turma WHERE id_turma = $id_turma";

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
    <input type="hidden" name="id_turma" value="<?php echo $dados['id_turma'];?>">
    Edite o nome
    <input type="text" value="<?php echo $dados['nome'];?>" name="nome" id="nome"/><br><br>
       

    <input type="submit" value="Editar"/>

    <p>Deseja <a href="index.php">Voltar?</a></p>

</form>
    
</body>
</html>