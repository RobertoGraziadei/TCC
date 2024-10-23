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

<body>
    <div class="container">
        <header>
            <h2>Página do administrador</h2>
            <nav>
                <ul>
                    <!-- <li><a href="nova-senha.php"><button type="button" class="btn btn-outline-info">Alterar senha </button></a></td></a></li> -->
                    <li><a href="logout.php"><button type="button" class="btn btn-outline-danger">Sair <img src="../img/logout.png" width="20" height="20"></button></a></td></a></li>
                    <!-- <li><a href="#">Sobre</a></li>
                    <li><a href="#">Contato</a></li> -->
                </ul>
            </nav>
        </header>
        <p>
        <p>
        <p>Olá, <?php echo $_SESSION['user']; ?></p>
        <span>
        <a href="../crud/crud_usuario/formcad.php"><button type="button" class="btn btn-primary">Cadastrar usuário</button><br><br></a>
        <a href="../crud/crud_turma/formcad.php"><button type="button" class="btn btn-primary">Cadastrar turma</button><br><br></a>
        <a href="../crud/crud_sala/formcad.php"><button type="button" class="btn btn-primary">Cadastrar sala</button><br><br></a>
        <a href="../crud/crud_disciplina/formcad.php"><button type="button" class="btn btn-primary">Cadastrar disciplinas</button><br><br></a>
        <a href="../crud/crud_aluno/formcad.php"><button type="button" class="btn btn-primary">Cadastrar aluno</button><br><br></a>
            <a href="../crud/crud_horario/formcad.php"><button type="button" class="btn btn-primary">Cadastrar horário</button><br><br></a>
            <!-- <a href="../crud/crud_presenca/"><button type="button" class="btn btn-primary">Cadastrar presença</button><br><br></a> -->
        </span>
    </div>
</body>

</html>