<?php
include "verif-log.php";
if (!isset($_SESSION['nivel']) or $_SESSION['nivel'] == 1) {
    header('location: redire.php');
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Menu</title>
    <link rel="stylesheet" href="css/inicial-professor.css">
</head>
<body>
    <div class="container">
        <header>
        <h2>Página do professor(a)</h2>
            <nav>
                <ul>
                <li><a href="nova-senha.php"><button type="button" class="btn btn-outline-info">Alterar senha   </button></a></td></a></li>
                <li><a href="logout.php"><button type="button" class="btn btn-outline-danger">Sair   <img src="img/logout.png" width="20" height="20"></button></a></td></a></li>
                    <!-- <li><a href="#">Sobre</a></li>
                    <li><a href="#">Contato</a></li> -->
                </ul>
            </nav>
        </header>
        <main>
            <section>
                <p>Olá professor, <?php echo $_SESSION['user']; ?>.</p>
            </section>
        </main>
        
    </div>
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
    
</body>
</html>
