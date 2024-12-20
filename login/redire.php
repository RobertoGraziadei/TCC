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
    <link rel="stylesheet" href="../css/layoutInicial.css">
    <link rel="shortcut icon" href="barra.ico" type="image/x-icon">
    <title>Menu</title>
</head>
<style>
    .row {
        display: flex;
        justify-content: center;
    }
</style>


<body>
    <div class="container">
        <header>
            <h2 style="font-size: 24px;">Olá, <?php echo $_SESSION['user']; ?></h2>
            <nav>
                <ul>
                    <li><a href="logout.php"><button type="button" class="btn btn-outline-dark">
                                Sair <img src="../img/logout.png" width="20" height="20"></button></a></td></a></li>
                </ul>
            </nav>
        </header>
        <div class="container" style="margin-top: 30px;">
            <div class="row">
                <div class="card mb-5" style="width: 20rem;">
                    <div class="card-body">
                        <h5 class="card-title">Gerenciar usuários</h5>
                        <hr>
                        <a href="../crud/crud_usuario/formcad.php" role="button" style="font-size: 100%;" class="btn btn-secondary" type="button">Acessar</a>
                    </div>
                </div>
                <div class="card mb-5" style="width: 20rem;">
                    <div class="card-body">
                        <h5 class="card-title">Gerenciar turmas</h5>
                        <hr>
                        <a href="../crud/crud_turma/formcad.php" role="button" style="font-size: 100%;" class="btn btn-secondary" type="button">Acessar</a>
                    </div>
                </div>
                <div class="card mb-5" style="width: 20rem;">
                    <div class="card-body">
                        <h5 class="card-title">Gerenciar salas</h5>
                        <hr>
                        <a href="../crud/crud_sala/formcad.php" role="button" style="font-size: 100%;" class="btn btn-secondary" type="button">Acessar</a>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="card mb-3" style="width: 20rem;">
                    <div class="card-body">
                        <h5 class="card-title">Gerenciar disciplinas</h5>
                        <hr>
                        <a href="../crud/crud_disciplina/formcad.php" role="button" style="font-size: 100%;" class="btn btn-secondary" type="button">Acessar</a>
                    </div>
                </div>
                <div class="card mb-3" style="width: 20rem;">
                    <div class="card-body">
                        <h5 class="card-title">Gerenciar alunos</h5>
                        <hr>
                        <a href="../crud/crud_aluno/formcad.php" role="button" style="font-size: 100%;" class="btn btn-secondary" type="button">Acessar</a>
                    </div>
                </div>
                <div class="card mb-3" style="width: 20rem;">
                    <div class="card-body">
                        <h5 class="card-title">Gerenciar horários</h5>
                        <hr>
                        <a href="../crud/crud_horario/formcad.php" role="button" style="font-size: 100%;" class="btn btn-secondary" type="button">Acessar</a>
                    </div>
                </div>
            </div>
        </div>


        <!--             <div style="margin-top: 100px;" class="d-grid gap-2 col-8 mx-auto">
                <a href="../crud/crud_usuario/formcad.php" role="button" style="font-size: 200%;" class="btn btn-secondary" type="button">Gerenciar usuários</a>
            </div>

            <div style="margin-top: 20px;" class="d-grid gap-2 col-8 mx-auto">
                <a href="../crud/crud_turma/formcad.php" role="button" style="font-size: 200%;" class="btn btn-secondary" type="button">Gerenciar turmas</a>
            </div>

            <div style="margin-top: 20px;" class="d-grid gap-2 col-8 mx-auto">
                <a href="../crud/crud_sala/formcad.php" role="button" style="font-size: 200%;" class="btn btn-secondary" type="button">Gerenciar salas</a>
            </div> -->

        <!--             <div style="margin-top: 20px;" class="d-grid gap-2 col-8 mx-auto">
                <a href="../crud/crud_disciplina/formcad.php" role="button" style="font-size: 200%;" class="btn btn-secondary" type="button">Gerenciar disciplinas</a>
            </div>

            <div style="margin-top: 20px;" class="d-grid gap-2 col-8 mx-auto">
                <a href="../crud/crud_aluno/formcad.php" role="button" style="font-size: 200%;" class="btn btn-secondary" type="button">Gerenciar aluno</a>
            </div>

            <div style="margin-top: 20px;" class="d-grid gap-2 col-8 mx-auto">
                <a href="../crud/crud_horario/formcad.php" role="button" style="font-size: 200%;" class="btn btn-secondary" type="button">Gerenciar horário</a>
            </div> -->

        <!-- <a href="../crud/crud_presenca/"><button type="button" class="btn btn-primary">Cadastrar presença</button><br><br></a> -->
    </div>
</body>

</html>