<?php

// Recebe o id do usuário
$id = $_GET['id_aluno'];

// Conectar ao BD
include("conecta.php");


// Seleciona os dados do usuário da tabela
$sql = "SELECT * FROM aluno WHERE id_aluno = $id";

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
    <title>Editar Aluno</title>
    <link rel="stylesheet" href="main.css">
    
</head>
<body>

<form action="alterar.php" method="get">

    <h2>Editar Aluno</h2>
    Edite o Id
    <input type="number" name="id_aluno" value="<?php echo $dados['id_aluno'];?>"><br><br>
    Edite a matricula
    <input  type="number" value="<?php echo $dados['matricula'];?>" name="matricula"/><br><br>
    Edite o nome
    <input type="text" value="<?php echo $dados['nome'];?>" name="nome" id="nome"/><br><br>
       

    <input class="e" type="submit" value="Editar">

    <p>Deseja <a href="index.php">Voltar?</a></p>

</form>
    
</body>
</html>