<?php
require_once "../conecta.php";
$return_var = NULL;
$output = NULL;
$command = "C:\\wamp64\\bin\\mysql\\mysql8.0.31\\bin\\mysqldump.exe -u root $banco > file.sql";
$resultado = exec($command, $output, $return_var);

if ($resultado === false) {
    echo "Não foi possível fazer backup";
    die;
}
?>
<a href="file.sql">Fazer Download</a>