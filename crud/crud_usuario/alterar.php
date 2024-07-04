<?php

// Conectar ao BD
include("conecta.php");

// receber os dados do formulário
//$id = $_GET['id_aluno'];
$matricula = $_GET['matricula'];
$nome = $_GET['nome'];

//if('id_aluno' == $id){
$sql = "UPDATE aluno SET nome = '$nome' WHERE matricula = $matricula";
mysqli_query($conexao,$sql);
//}
//else{
/*$sql2 = "UPDATE aluno SET id_aluno = '$id', nome = '$nome' WHERE matricula = $matricula";
mysqli_query($conexao,$sql2);
//}
*/
if ($conexao->error) {

    die("Falha ao editar usuário no sistema:". $conexao->error);

}else {
    header("location: listar.php");
}
// executa o comando no BD

?>