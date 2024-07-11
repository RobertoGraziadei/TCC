<?php
include_once("../Login/autenticar.php");
?>
<!DOCTYPE HTML>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="../Bootstrap5/css/bootstrap.min.css" rel="stylesheet">
    <script src="../Bootstrap5/js/bootstrap.min.js"></script>    
    <title>Escaner - QR Code</title>		
</head>		
<BODY class="container-xxl" style="background-color: #4dd494 ;">
    <nav class="rounded shadow bg-light mt-3">
        <ul class="nav nav-pills nav-justified">
            <li class="nav-item"><img src="../logo.png" style="width:250px;" alt="logo"></img></li>
            <li class="nav-item mt-5"><button type="button" class="btn btn-outline-success"><a href="../operador.php" class="text-decoration-none text-black" aria-current="page">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="25" fill="currentColor" class="bi bi-house" viewBox="0 0 16 16"><path d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L2 8.207V13.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V8.207l.646.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.707 1.5ZM13 7.207V13.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V7.207l5-5 5 5Z"/>
            </svg></a></button></li>
            <li class="nav-item mt-5"><a href="../Operador/historico.php" class="text-decoration-none btn btn-outline-success">Histórico</a></li>
            <li class="nav-item mt-5"><a href="../Operador/buscar_aluno.php" class="text-decoration-none btn btn-outline-success">Autorizar Entrada</a></li>
            <li class="nav-item mt-5"><a href="../Operador/visualizar_cronograma.php" class="text-decoration-none btn btn-outline-success">Cronogramas</a></li>
            <li class="nav-item mt-5"><button type="button" class="btn btn-danger"><a href="../Login/sair.php" class="text-decoration-none text-light">Sair</a></button></li>
        </ul>
    </nav>   
    <div class="container-sm rounded mt-5 p-4 text-bg-success text-center" style="width: 50%;">
        <div id="qr-reader"></div>
        <div id="qr-reader-results"></div>
    </div>
</body>
    <script src="html5-qrcode.min.js"></script>
    <script>
        function docReady(fn) {
            if (document.readyState === "complete"
                || document.readyState === "interactive") {
                setTimeout(fn, 1);
            } else {
                document.addEventListener("DOMContentLoaded", fn);
            }
        }
        docReady(function () {
            var resultContainer = document.getElementById('qr-reader-results');
            var lastResult, countResults = 0;
            function onScanSuccess(decodedText, decodedResult) {
                if (decodedText !== lastResult) {
                    ++countResults;
                    lastResult = decodedText;
                    location.href = `result.php?comanda=${decodedText}`, decodedResult;
                    console.log(`Scan result ${decodedText}`, decodedResult);
                }
            }
            var html5QrcodeScanner = new Html5QrcodeScanner(
                "qr-reader", { fps: 10, qrbox: 250 });
            html5QrcodeScanner.render(onScanSuccess);
        });
    </script>
</html>