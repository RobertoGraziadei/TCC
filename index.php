<?php
if(!isset($_SESSION['email'])){
    session_start();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <form action="processa.php" method="post">
        <label>Email:<input type="email" name="email"><br></label>
        <label>Senha:<input type="password" name="senha"></label><br>

        <input type="submit" value="Login"><br><br><br>

        <button><a href="inscreve.php">Inscrever-se</a></button>
    </form>
</body>
</html>
