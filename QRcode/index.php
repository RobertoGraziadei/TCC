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

<?php
include "navbar.php"; ?>

<body>
    <div class="container">
        <header>
            <h2 style="font-size: 30px;">Olá, <?php echo $_SESSION['user']; ?></h2>
        </header>
        <main>
            <section>
                <h3 style="text-align: center;">Disciplinas ministradas:</h3><br><p>
                <?php
                $select_professor = "SELECT DISTINCT id_disciplinas, nome_disciplina, nome_turma, id_turma FROM disciplina 
                INNER JOIN horario ON fk_disciplina_id_disciplina = id_disciplinas 
                INNER JOIN turma ON id_turma = fk_turma_id_turma
                WHERE fk_professor = " . $_SESSION['id_usuario'];
                //echo($select_professor);die;
                $exe_prof = mysqli_query($conexao, $select_professor);
                while ($dados_prof = mysqli_fetch_assoc($exe_prof)) {
                    "<br>" ?>
                    <div style="text-align: center;">
                    <a class="btn btn-secondary" href="../crud/crud_presenca/listar.php?id_disciplinas=<?php echo $dados_prof['id_disciplinas']; ?>&id_turma=<?php echo $dados_prof['id_turma']; ?>" onclick="mostraTurma()">
                        <?php echo $dados_prof['nome_disciplina'] . " - " . $dados_prof['nome_turma']; ?>
                    </a></div>
                    <p><p>
                <?php
                }
                ?>


                </form>

            </section>

        </main>
        <script>
            //jQuery('#nome_turma').hide();

            //function mostraTurma() {
            //   jQuery('#nome_turma').show();
            //}
        </script>


        <div id="qrcode">
            <div id="qr-reader"></div>
            <div id="qr-reader-results"></div>

        </div>
</body>
</div>

</html>