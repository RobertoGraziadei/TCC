<?php
// Recebe o id do usuário
$matri = $_GET['matricula'];

// Conectar ao BD
include("conecta.php");


// Seleciona os dados do usuário da tabela usuáriio
$sql = "SELECT * FROM chamada WHERE id = $id";

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
    
</head>
<body>

<form action="alterar.php" method="post">

    <h2>Editar usuário</h2>
    <input type="hidden" name="id">
    Edite a matricula
    <input  type="number" id="id" value="<?php echo $dados['matricula'];?>" name="matri"/><br><br>
    Edite o nome
    <input type="text" value="<?php echo $dados['nome'];?>" name="nome" id="nome"/><br><br>
       

    <input type="submit" value="Editar"/>

    <p>Deseja <a href="index.php">Voltar!</a></p>

</form>
    
</body>
</html>