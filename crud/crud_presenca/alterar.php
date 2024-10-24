<?php
session_start();
if (!isset($_SESSION['nivel']) or $_SESSION['nivel'] == 2) {
    include "../../login/verif-log.php";
    die();
}
include('../../conecta.php');
$dia = $_GET['dia'];
$sql = "UPDATE dia SET 
dia = '$dia' WHERE id_dia = $id_dia";
mysqli_query($conexao, $sql);
echo("<script>
window.location.href = window.location.origin + '/roberto/TCC/crud/crud_presenca/listar.php';
</script>");