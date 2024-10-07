<?php
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="../Bootstrap5/css/bootstrap.min.css" rel="stylesheet">
    <script src="../Bootstrap5/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../css/layout.css">

    <title>Escaner - QR Code</title>
</head>

<body>
    <div class="container">
        <header>
            <h2 style="font-size: 35px;">Página do professor </h2>
            <nav>
                <ul>
                    <!-- <li><a href="../nova-senha.php"><button type="button" class="btn btn-outline-info">Alterar senha   </button></a></td></a></li> -->
                    <li><a href="../login/logout.php"><button type="button" class="btn btn-outline-danger">Sair <img src="../img/logout.png" width="20" height="20"></button></a></td></a></li>
                    <!-- <li><a href="#">Sobre</a></li>
                    <li><a href="#">Contato</a></li> -->
                </ul>
            </nav>
        </header>
        <main>
            <section>
                <p style="font-size: 25;">Olá, <?php echo $_SESSION['user']; ?></p>




                <?php
                $sql = "SELECT * FROM aluno  inner join turma on turma = id_turma";
                $resultado = mysqli_query($conexao, $sql);


                //Lista os itens
                echo "<br>";
                echo '<table class="table table-white table-striped">
                <tr>
                <th scope="col">Matricula</th>
                <th scope="col">Nome</th>
                <th scope="col">Turma</th>
                </tr>';

                while ($dados = mysqli_fetch_assoc($resultado)) {
                    echo '<tr>';
                    echo '<td>' . $dados['matricula'] . '</td>';
                    echo '<td>' . $dados['nome'] . '</td>';
                    echo '<td>' . $dados['nome_turma'] . '</td>';
                    echo '</tr>';
                }
                ?>


                <form action="processa.php" method="get">
                    <div style="text-align: center; font-size: 25px;">
                        <select name="sala" required>
                            <option selected value="">Selecione a sala</option>
                            <?php
                            $sql = "SELECT * FROM sala";
                            $executaSQL = mysqli_query($conexao, $sql);
                            while ($dados = mysqli_fetch_assoc($executaSQL)) {
                            ?>
                                <option value="<?php echo $dados['n_sala']; ?>"><?php echo $dados['descricao']; ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>

                    <div style="text-align: center; font-size: 20px">
                        <input type="number" name="matricula" placeholder="Matricula" required>
                        <input type="submit" value="Enviar">

                    </div>
                </form>

            </section>

        </main>


        <div id="qr-reader"></div>
        <div id="qr-reader-results"></div>

    </div>
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
                ++countResults;
                lastResult = decodedText;
                location.href = `processa.php?sala=${sala}&matricula=${decodedText}`, decodedResult;
                console.log(`Scan result ${decodedText}`, decodedResult);
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