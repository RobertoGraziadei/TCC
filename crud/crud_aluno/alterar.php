<?php
session_start();
if (!isset($_SESSION['nivel']) or $_SESSION['nivel'] == 2) {
    include "../../login/verif-log.php";
    die();
}
include('../../conecta.php');
$matricula = $_GET['matricula'];
$nome = $_GET['nome'];

//if('id_aluno' == $id){
$sql = "UPDATE aluno SET nome = '$nome' WHERE matricula = $matricula";
mysqli_query($conexao,$sql);
die("<script>
alert('Aluno alterado com sucesso!');
window.location.href = window.location.origin + '/roberto/TCC/crud/crud_aluno/formcad.php';
</script>");