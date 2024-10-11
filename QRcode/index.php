<?php
//$sala = $_GET['sala'];
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

<body>
    <div class="container">
        <header>
            <h2 style="font-size: 35px;">Página do professor </h2>
            <nav>
                <ul>
                    <!-- <li><a href="../nova-senha.php"><button type="button" class="btn btn-outline-info">Alterar senha   </button></a></td></a></li> -->
                    <li><a href="chamada.php"><button type="button" class="btn btn-outline-alert">Chamada <img src="../img/logout.png" width="20" height="20"></button></a></td></a></li>
                    <li><a href="../login/logout.php"><button type="button" class="btn btn-outline-danger">Sair <img src="../img/logout.png" width="20" height="20"></button></a></td></a></li>
                    <!-- <li><a href="#">Sobre</a></li>
                    <li><a href="#">Contato</a></li> -->
                </ul>
            </nav>
        </header>
        <main>
            <section>
                <p style="font-size: 25;">Olá, <?php echo $_SESSION['user']; ?></p>

                <br><br>
                <h3>Disciplinas ministradas</h3><br>
                <?php
                $nome_prof = $_SESSION['user'];
                $select_professor = "SELECT * FROM disciplina WHERE professor = '$nome_prof'";
                $exe_prof = mysqli_query($conexao, $select_professor);
                while ($dados_prof = mysqli_fetch_assoc($exe_prof)) { ?>
                    <a style="text-decoration: none" href="#" onclick="mostraTurma()"><?php echo $dados_prof['nome_disciplina'] ?></a><br>
                <?php
                }
                $select_professor2 = "SELECT * FROM disciplina WHERE professor = '$nome_prof'";
                $exe_prof2 = mysqli_query($conexao, $select_professor2);
                $dados_prof2 = mysqli_fetch_assoc($exe_prof2);

                $select_turma = "SELECT * FROM horario INNER JOIN disciplina ON fk_disciplina_id_disciplina = id_disciplinas
                INNER JOIN turma ON fk_turma_id_turma = id_turma WHERE fk_disciplina_id_disciplina =" . $dados_prof2['id_disciplinas'];
                $exe_turma = mysqli_query($conexao, $select_turma);
                while ($dados_turma = mysqli_fetch_assoc($exe_turma)) { ?>
                    <a id="nome_turma" style="text-decoration: none" href="#"><?php echo $dados_turma['nome_turma'] ?></a>
                <?php
                }
                ?>


                </form>

            </section>

        </main>
        <script>
            jQuery('#nome_turma').hide();
            function mostraTurma(){
                jQuery('#nome_turma').show();
            }
        </script>


        <div id="qrcode">
            <div id="qr-reader"></div>
            <div id="qr-reader-results"></div>

        </div>
</body>
</div>

</html>