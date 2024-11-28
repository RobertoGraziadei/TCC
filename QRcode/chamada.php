<?php
if (isset($_GET['sala']) and $_GET['sala'] !== null) {
    $sala = $_GET['sala'];
}
include "../conecta.php";
session_start();
if (!isset($_SESSION['nivel']) or $_SESSION['nivel'] == 1) {
    die("<script>
    alert('Página dedicada aos professores');
    window.location.href = window.location.origin + '/roberto/TCC/login/logout.php';
    </script>");
}
?>
<!DOCTYPE HTML>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <script src="../css/jquery.min.js"></script>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <script src="../css/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../css/layout.css">

    <title>Escaner - QR Code</title>
</head>
<?php
include "navbar.php"; ?>

<body>
    <div class="container">
        <header>
            <h2 style="font-size: 30px;">Controle de frequência </a></h2>
        </header>
        <main>
            <section>
                <p style="font-size: 25;"><?php echo $_SESSION['user']; ?></p>

                <form action="processa.php" method="get">
                    <div style="text-align: center; font-size: 25px;">
                        <div class="container">
                            <select class="form-select form-select-lg mb-3" aria-label="Large select example" name="sala" required>
                        </div>


                        <option selected value="">Selecione a sala</option>
                        <?php
                        $sql = "SELECT * FROM sala";
                        $executaSQL = mysqli_query($conexao, $sql);
                        while ($dados = mysqli_fetch_assoc($executaSQL)) { ?>
                            <option
                                <?php
                                if (isset($_GET['sala']) and $_GET['sala'] !== null) {
                                    if ($_GET['sala'] == $dados['n_sala']) {
                                        echo " selected ";
                                    }
                                }
                                ?>
                                value="<?php echo $dados['n_sala']; ?>"><?php echo $dados['descricao']; ?>
                            </option>
                        <?php
                        }
                        ?>

                        </select>
                    </div>
                    <div class="row">
                        <div class="col s12 m12  center-align">
                            <a href="#" class="btn btn-secondary btn-lg" role="button" onclick="mostraInput()">Entrada Manual</a>
                            <a href="#" class="btn btn-secondary btn-lg" role="button" onclick="mostraQrcode()">Entrada automática</a>
                        </div>
                    </div>
                    <!-- <a class="btn btn-secondary btn-lg link1" role="button" href="#" onclick="mostraInput()" style="text-decoration: none"> Entrada Manual </a>
                    <a class="btn btn-secondary btn-lg link2" href="#" role="button" onclick="mostraQrcode()" style="text-decoration: none"> Entrada Automática</a> -->
                    <!--                     <div class="row">
                        <div style="margin-top: 20px;" class="d-grid gap-2 col-8 mx-auto">
                            <a href="#" class="btn btn-secondary link2" role="button" onclick="mostraQrcode()" style="text-decoration: none"> Entrada Automática</a>
                        </div>
                    </div> -->
                    <br>

                    <div id="matricula">
                        <div class="container">
                            <div class="form-floating mb-3">
                                <input name="nome" type="number" class="form-control" id="matricula" placeholder="" required>
                                <label for="matricula" style="font-size: 70%;">Matricula</label>
                            </div>
                        </div>
                        <!-- <input id="matricula" type="number" name="matricula" placeholder="Matricula" required> -->
                        <input id="enviar" class="d-grid gap-2 col-6 mx-auto btn btn-success" type="submit" value="Enviar">

                    </div>
                </form>
    </div>

    </section>

    </main>
    <script>
        jQuery('#qr-reader').show();
        jQuery('#matricula').hide();
        jQuery('#enviar').hide();

        function mostraInput() {
            jQuery('#qr-reader').hide();
            jQuery('#matricula').show();
            jQuery('#enviar').show();
        }

        function mostraQrcode() {
            jQuery('#qr-reader').show();
            jQuery('#matricula').hide();
            jQuery('#enviar').hide();
        }
    </script>


    <div id="qr-reader">
</body>
<script src="html5-qrcode.min.js"></script>
<script>
    function docReady(fn) {
        if (document.readyState === "complete" ||
            document.readyState === "interactive") {
            setTimeout(fn, 1);
        } else {
            document.addEventListener("DOMContentLoaded", fn);
        }
    }
    docReady(function() {
        var resultContainer = document.getElementById('qr-reader-results');
        var lastResult, countResults = 0;

        function onScanSuccess(decodedText, decodedResult) {
            if (decodedText !== lastResult) {
                let inputSala = document.getElementsByName("sala")[0];
                let sala = inputSala.value;
                if (sala == "") {
                    alert("Selecione uma sala!");
                } else {
                    ++countResults;
                    lastResult = decodedText;
                    location.href = `processa.php?sala=${sala}&matricula=${decodedText}`, decodedResult;
                    console.log(`Scan result ${decodedText}`, decodedResult);
                }
            }
        }
        var html5QrcodeScanner = new Html5QrcodeScanner(
            "qr-reader", {
                fps: 10,
                qrbox: 250
            });
        html5QrcodeScanner.render(onScanSuccess);
    });
</script>
</div>

</html>