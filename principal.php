<?php
include "verif-log.php";
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Página Inicial Black</title>
    <link rel="stylesheet" href="css/inicial-professor.css">
</head>
<body>
    <div class="container">
        <header>
            <h1>Página Inicial</h1>
            <nav>
                <ul>
                    <li><a href="#">Ver presença</a></li>
                    <!-- <li><a href="#">Sobre</a></li>
                    <li><a href="#">Contato</a></li> -->
                </ul>
            </nav>
        </header>
        <main>
            <section>
                <h2>Página do professor(a)</h2>
                <p>Olá professor, <?php echo $_SESSION['user']; ?></p>
            </section>
        </main>
        <?php echo '<td> <a href="logout.php"><button type="button" class="btn btn-outline-secondary">Logout  <img src="img/logout.png" width="20" height="20"></button></a></td>';?>
    </div>

    
</body>
</html>
