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
$caminho_arquivo = 'file.sql';
if (file_exists($caminho_arquivo)) {
    $nome_arquivo = basename($caminho_arquivo);
    // Configura os cabeçalhos para forçar o download
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename="' . $nome_arquivo . '"');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($caminho_arquivo));
    // Envia o arquivo para o navegador
    readfile($caminho_arquivo);
    exit;
} else {
    echo "Arquivo não encontrado!";
}
