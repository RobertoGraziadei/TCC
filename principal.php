<?php
include "verif-log.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu</title>
    <link rel="shortcut icon" href="barra.ico" type="image/x-icon">
</head>

<body>
    <h1>Olá, <?php echo $_SESSION['user']; ?> </h1>
    <h2>Página do professor</h2>
    <div class="d">
        

        <button><a href="logout.php">Logout</a></button><br><br>
    </div>
</body>

</html>