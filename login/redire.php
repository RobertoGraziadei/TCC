<?php
include "verif-log.php";
if (!isset($_SESSION['nivel']) or $_SESSION['nivel'] == 2) {
    die("<script>
    window.location.href = window.location.origin + '/roberto/TCC/QRcode/index.php';
    </script>");
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/layout.css">
    <link rel="shortcut icon" href="barra.ico" type="image/x-icon">
    <title>Menu</title>
</head>

<div class="container">

    <body>
        <header>
        <h2 style="font-size: 30px;">Olá, <?php echo $_SESSION['user']; ?></h2>
            <nav>
                <ul>
                    <li><a href="logout.php"><button type="button" class="btn btn-outline-dark">
                    Sair <img src="../img/logout.png" width="20" height="20"></button></a></td></a></li>
                </ul>
            </nav>
        </header>
        <span>

            <div style="margin-top: 10px;">
                <div class="row">
                    <div class="col s4 m4 "><br> <a style="text-align: left;" href="../crud/crud_usuario/formcad.php"><button style="font-size: 20px; padding: 25px 50px;" type="button" class="btn btn-secondary btn-lg">Usuários</button></a> </div>

                    <div class="col s4 m4 "><br> <a style="text-align: left;" href="../crud/crud_turma/formcad.php"><button style="font-size: 20px; padding: 25px 50px;" type="button" class="btn btn-secondary btn-lg">Turmas</button></a> </div>

                    <div class="col s4 m4 "><br> <a style="text-align: left;" href="../crud/crud_sala/formcad.php"><button style="font-size: 20px; padding: 25px 50px;" type="button" class="btn btn-secondary btn-lg">Salas</button></a> </div>
                </div>

                <div class="row">
                    <div class="col s4 m4 "><br> <a href="../crud/crud_disciplina/formcad.php"><button style="font-size: 20px; padding: 25px 50px;" type="button" class="btn btn-secondary btn-lg">Disciplinas</button></a> </div>

                    <div class="col s4 m4 "><br> <a href="../crud/crud_aluno/formcad.php"><button style="font-size: 20px; padding: 25px 50px;" type="button" class="btn btn-secondary btn-lg">Alunos</button></a> </div>

                    <div class="col s4 m4 "><br> <a href="../crud/crud_horario/formcad.php"><button style="font-size: 20px; padding: 25px 50px;" type="button" class="btn btn-secondary btn-lg">Horários</button><br><br></a></div>
                </div>
            </div>



            <!-- <a href="../crud/crud_presenca/"><button type="button" class="btn btn-primary">Cadastrar presença</button><br><br></a> -->
        </span>
</div>
</body>

</html>