<?php
session_start();
if (!isset($_SESSION['nivel']) or $_SESSION['nivel'] == 2) {
    header('location: ../../principal.php');
    die();
}
include("conecta.php");
?>
<!DOCTYPE html>
<htm lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crud</title>
    <link rel="stylesheet" href="main.css">
</head>
<body>
    <div class="c"> Crud das presenças </div><br>
    <div class="d">
    <button><a href="formcad.html">Cadastrar </button></a><br><br>
    <button><a href="listar.php">Listar</button><br><br><br><br>
    <button><a href="/roberto/TCC/redire.php">Voltar</a></button>
</div>
</body>
</html>