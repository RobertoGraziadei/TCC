<?php
session_start();
include "../../login/verif-log.php";
if (!isset($_SESSION['nivel']) or $_SESSION['nivel'] == 2) {
    die("<script>
    window.location.href = window.location.origin + '/roberto/TCC/QRcode/index.php';
    </script>");
    }
include('../../conecta.php');
?>
<!DOCTYPE html>
<htm lang="pt-BR">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Crud</title>
    </head>

    <body>
        <h1> Crud dos alunos </h1><br>
        <button><a href="formcad.php">Cadastrar </button></a><br><br>
        <button><a href="listar.php">Listar</button><br><br><br><br>
        <button><a href="/roberto/TCC/login/redire.php">Voltar</a></button>
        </div>
    </body>

    </html>