<?php
if(!isset ($_SESSION)){
    session_start();
}
if (!isset($_SESSION['user'])) {
    die("<script>
    alert('Você precisa estar logado para acessar esta pagina');
    window.location.href = window.location.origin + '/index.php';
    </script>");
}
