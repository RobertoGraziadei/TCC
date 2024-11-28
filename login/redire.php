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

            <div style="margin-top: 100px;" class="d-grid gap-2 col-8 mx-auto">
                <a href="../crud/crud_usuario/formcad.php" role="button" style="font-size: 200%;" class="btn btn-secondary" type="button">Gerenciar usuários</a>
            </div>

            <div style="margin-top: 20px;" class="d-grid gap-2 col-8 mx-auto">
                <a href="../crud/crud_turma/formcad.php" role="button" style="font-size: 200%;" class="btn btn-secondary" type="button">Gerenciar turmas</a>
            </div>

            <div style="margin-top: 20px;" class="d-grid gap-2 col-8 mx-auto">
                <a href="../crud/crud_sala/formcad.php" role="button" style="font-size: 200%;" class="btn btn-secondary" type="button">Gerenciar salas</a>
            </div>

            <div style="margin-top: 20px;" class="d-grid gap-2 col-8 mx-auto">
                <a href="../crud/crud_disciplina/formcad.php" role="button" style="font-size: 200%;" class="btn btn-secondary" type="button">Gerenciar disciplinas</a>
            </div>

            <div style="margin-top: 20px;" class="d-grid gap-2 col-8 mx-auto">
                <a href="../crud/crud_aluno/formcad.php" role="button" style="font-size: 200%;" class="btn btn-secondary" type="button">Gerenciar aluno</a>
            </div>

            <div style="margin-top: 20px;" class="d-grid gap-2 col-8 mx-auto">
                <a href="../crud/crud_horario/formcad.php" role="button" style="font-size: 200%;" class="btn btn-secondary" type="button">Gerenciar horário</a>
            </div>

            <!-- <a href="../crud/crud_presenca/"><button type="button" class="btn btn-primary">Cadastrar presença</button><br><br></a> -->
        </span>
</div>
</body>

</html>