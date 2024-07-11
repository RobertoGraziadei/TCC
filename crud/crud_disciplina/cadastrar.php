<?php
session_start();
if (!isset($_SESSION['nivel']) or $_SESSION['nivel'] == 2) {
    header('location: ../../principal.php');
    die();
}

//conectar ao banco de dados.
include("conecta.php");

//receber os dados do formulário.
$id_disciplinas = $_POST['id_disciplinas'];
$nome = $_POST['nome'];


//comando sql.
$sql = "INSERT INTO disciplina (nome) VALUES ('$nome')";

header("location: listar.php");
 
//executar o comando sql.
mysqli_query($conexao, $sql);

?>