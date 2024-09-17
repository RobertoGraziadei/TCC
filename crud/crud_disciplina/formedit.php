<?php
session_start();
if (!isset($_SESSION['nivel']) or $_SESSION['nivel'] == 2) {
    header('location: ../../index.php');
    die();
}
$id_disciplina = $_GET['id_disciplinas'];
include('../../conecta.php');
$sql = "SELECT * FROM disciplina WHERE id_disciplinas = $id_disciplina";
$resultado = mysqli_query($conexao,$sql);
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
    <input type="hidden" name="id_disciplinas" value="<?php echo $dados['id_disciplinas'];?>">
    Nome da disciplina
    <input type="text" value="<?php echo $dados['nome_disciplina'];?>" name="nome_disciplina"/><br><br>
    <input type="text" value="<?php echo $dados['professor'];?>" name="professor"/><br><br>
       

    <input type="submit" value="Editar"><br><br>

    <button><a href="index.php">Cancelar</a></button>

</form>
    
</body>
</html>