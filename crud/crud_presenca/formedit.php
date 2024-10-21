<?php
/* session_start();
if (!isset($_SESSION['nivel']) or $_SESSION['nivel'] == 2) {
    include "../../login/verif-log.php";
    die();
} */
$id_presenca = $_GET['id_presenca'];
include('../../conecta.php');
$sql = "SELECT * FROM presenca WHERE id_presenca = $id_presenca";
$resultado = mysqli_query($conexao,$sql);
$dados = mysqli_fetch_assoc($resultado);
var_dump($dados['id_presenca']);
?>
<!DOCTYPE html>
<html lang="pt_br">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar presenca</title>
    
</head>
<body>

<form action="alterar.php" method="get">

    <h2>Editar presenca</h2>
    <input type="hidden" name="id_presenca" value="<?php echo $dados['id_presenca'];?>">
    Edite o nome
    <input type="text" value="<?php echo $dados['id_presenca'];?>" name="id_presenca"><br><br>
       

    <input type="submit" value="Editar"/>

    <p>Deseja <a href="index.php">Voltar?</a></p>

</form>
    
</body>
</html>