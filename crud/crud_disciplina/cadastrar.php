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
$nome = $_POST['nome_disciplina'];


//comando sql.
$sql = "INSERT INTO disciplina (nome_disciplina) VALUES ('$nome')";
mysqli_query($conexao, $sql);

header("location: listar.php");
 

?>