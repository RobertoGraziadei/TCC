<?php
include "verif-log.php";
if (!isset($_SESSION['nivel']) or $_SESSION['nivel'] == 2) {
    header('location: ../QRcode/index.php'); 
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/layout.css">
    <title>Menu</title>
    <link rel="shortcut icon" href="barra.ico" type="image/x-icon">
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
        <p>Olá, administrador(a) <?php echo $_SESSION['user']; ?>.</p>
            <a href="../crud/crud_aluno/"><button type="button" class="btn btn-primary">Cadastrar aluno</button><br><br></a>
            <a href="../crud/crud_disciplina/"><button type="button" class="btn btn-primary">Cadastrar disciplinas</button><br><br></a>
            <a href="../crud/crud_horario/"><button type="button" class="btn btn-primary">Cadastrar horário</button><br><br></a>
            <a href="../crud/crud_presenca/"><button type="button" class="btn btn-primary">Cadastrar presença</button><br><br></a>
            <a href="../crud/crud_sala/"><button type="button" class="btn btn-primary">Cadastrar sala</button><br><br></a>
            <a href="../crud/crud_turma/"><button type="button" class="btn btn-primary">Cadastrar turma</button><br><br></a>
            <a href="../crud/crud_usuario/"><button type="button" class="btn btn-primary">Cadastrar usuário</button><br><br><br></a>
</div>
</body>

</html>