<?php 
include"../conecta.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teste de matricula</title>
</head>
<body>
    <form action="processa.php" method="post">
        <input type="number" name="matricula" placeholder="Matricula"><br>
        <input type="submit" value="Enviar">
    </form>
</body>
</html>