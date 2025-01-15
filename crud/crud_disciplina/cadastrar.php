<?php
session_start();
if (!isset($_SESSION['nivel']) or $_SESSION['nivel'] == 2) {
    include "../../login/verif-log.php";
    die();
}
include('../../conecta.php');
$id_disciplinas = $_POST['id_disciplinas'];
$nome = $_POST['nome_disciplina'];

$sql1 = "SELECT * FROM disciplina WHERE nome_disciplina = '$nome'";
$executa1 = mysqli_query($conexao, $sql1);
//echo $sql1;die;
if ($verifica = mysqli_num_rows($executa1) != 0) {
  die("<script>
alert('Já existe uma disciplina com esse nome!');
window.location.href = window.location.origin + '/crud/crud_disciplina/formcad.php';
</script>");
}

$sql = "INSERT INTO disciplina (nome_disciplina) VALUES ('$nome')";
mysqli_query($conexao, $sql);
die("<script>
alert('Disciplina cadastrada com sucesso!');
window.location.href = window.location.origin + '/crud/crud_disciplina/formcad.php';
</script>");
?>