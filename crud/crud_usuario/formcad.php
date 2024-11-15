<?php
session_start();
if (!isset($_SESSION['nivel']) or $_SESSION['nivel'] == 2) {
    include "../../login/verif-log.php";
    die();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <script rel="stylesheet" src="../../css/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../../css/layout.css">
    <script rel="stylesheet" src="../../css/jquery.min.js"></script>
    <img id="olho" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAABDUlEQVQ4jd2SvW3DMBBGbwQVKlyo4BGC4FKFS4+TATKCNxAggkeoSpHSRQbwAB7AA7hQoUKFLH6E2qQQHfgHdpo0yQHX8T3exyPR/ytlQ8kOhgV7FvSx9+xglA3lM3DBgh0LPn/onbJhcQ0bv2SHlgVgQa/suFHVkCg7bm5gzB2OyvjlDFdDcoa19etZMN8Qp7oUDPEM2KFV1ZAQO2zPMBERO7Ra4JQNpRa4K4FDS0R0IdneCbQLb4/zh/c7QdH4NL40tPXrovFpjHQr6PJ6yr5hQV80PiUiIm1OKxZ0LICS8TWvpyyOf2DBQQtcXk8Zi3+JcKfNafVsjZ0WfGgJlZZQxZjdwzX+ykf6u/UF0Fwo5Apfcq8AAAAASUVORK5CYII=" />
    <title>Cadastrar</title>
</head>

<body>
    <div class="container">
        <div id="cadastrar">
            <header>
                <h2>Cadastrar usuário</h2>
                <nav>
                    <ul>
                        <li><a href="#"><button type="button" class="btn btn-outline-secondary" onclick="listar()">Ver usuários </button></a></td></a></li>
                    </ul>
                </nav>

                
            </header>
            <br><br>


            
            <div style="text-align: center">
                <form action="cadastrar.php" method="post">
                    <label><input type="text" placeholder="Nome de usuário" name="user" required></label><br><br>
                    <label><input type="email" placeholder="Email" name="email" required></label><br><br>

                    <!-- COLOCAR O OLHO QUE ESTA NA TELA DE LOGIN PARA VER A SENHA -->
                    <label><input type="password" id="senha" type="password" name="senha" class="form__input" placeholder="Senha" required></label><br><br>


                    <label>Tipo de usuário:</label><br>
                    <label>Administrador<input type="radio" name="nivel" value="1" required></label><br>
                    <label>Professor<input type="radio" name="nivel" value="2" required></label><br><br>
                    <input type="submit" value="Cadastrar"><br><br>
            </div>
            </form>


            <svg xmlns="http://www.w3.org/2000/svg" class="icons">
    <symbol id="icon-arrow-right" viewBox="0 0 1792 1792">
      <path d="M1600 960q0 54-37 91l-651 651q-39 37-91 37-51 0-90-37l-75-75q-38-38-38-91t38-91l293-293H245q-52 0-84.5-37.5T128 1024V896q0-53 32.5-90.5T245 768h704L656 474q-38-36-38-90t38-90l75-75q38-38 90-38 53 0 91 38l651 651q37 35 37 90z" />
    </symbol>
    <symbol id="icon-lock" viewBox="0 0 1792 1792">
      <path d="M640 768h512V576q0-106-75-181t-181-75-181 75-75 181v192zm832 96v576q0 40-28 68t-68 28H416q-40 0-68-28t-28-68V864q0-40 28-68t68-28h32V576q0-184 132-316t316-132 316 132 132 316v192h32q40 0 68 28t28 68z" />
    </symbol>
    <symbol id="icon-user" viewBox="0 0 1792 1792">
      <path d="M1600 1405q0 120-73 189.5t-194 69.5H459q-121 0-194-69.5T192 1405q0-53 3.5-103.5t14-109T236 1084t43-97.5 62-81 85.5-53.5T538 832q9 0 42 21.5t74.5 48 108 48T896 971t133.5-21.5 108-48 74.5-48 42-21.5q61 0 111.5 20t85.5 53.5 62 81 43 97.5 26.5 108.5 14 109 3.5 103.5zm-320-893q0 159-112.5 271.5T896 896 624.5 783.5 512 512t112.5-271.5T896 128t271.5 112.5T1280 512z" />
    </symbol>
  </svg>
  <script>
    var senha = $('#senha');
    var olho = $("#olho");

    olho.mousedown(function() {
      senha.attr("type", "text");
    });

    olho.mouseup(function() {
      senha.attr("type", "password");
    });
    // para evitar o problema de arrastar a imagem e a senha continuar exposta, 
    //citada pelo nosso amigo nos comentários
    $("#olho").mouseout(function() {
      $("#senha").attr("type", "password");
    });
  </script>


        </div>
        <div id="listar">
            <header>
                <h2>Usuários cadastrados</h2>
                <nav>
                    <ul>
                        <li><a href="#"><button type="button" class="btn btn-outline-secondary" onclick="cadastrar()">Cadastrar </button></a></td></a></li>
                    </ul>
                </nav>
            </header>
            <?php
            include('../../conecta.php');
            $sql = "SELECT * FROM usuario";
            $resultado = mysqli_query($conexao, $sql); ?>
            <table class=" container table table-white table-striped">
                <tr>
                    <th scope="col">Nome do usuário</th>
                    <th scope="col">Email</th>
                    <th scope="col">Nivel de acesso</th>
                    <th colspan=3>Opções</th>
                </tr>
                <?php
                while ($dados = mysqli_fetch_assoc($resultado)) { ?>
                    <tr>
                        <?php
                        echo '<td>' . $dados['nome_usuario'] . '</td>';
                        echo '<td>' . $dados['email'] . '</td>';
                        if ($dados['nivel'] == 1) {
                            echo '<td>' . 'Administrador' . '</td>';
                        }
                        if ($dados['nivel'] == 2) {
                            echo '<td>' . 'Professor' . '</td>';
                        }
                        echo '<td> <a href="formedit.php?email=' . $dados['email'] . '"> <img src="imagens/editar.png" width="20" height="20"> </a> </td>';
                        echo '<td> <a href="excluir?email=' . $dados['email'] . '"> <img src="imagens/excluir.png" width="20" height="20"> </a> </td>'; ?>
                    </tr>
                <?php
                } ?>
            </table>
            <br>
        </div>
        <a href="../../login/redire.php"><button>Voltar</button></a>
</body>

<script>
    jQuery('#listar').hide();

    function listar() {
        jQuery('#listar').show();
        jQuery('#cadastrar').hide();
        jQuery('#olho').hide();
    }

    function cadastrar() {
        jQuery('#cadastrar').show();
        jQuery('#listar').hide();
        jQuery('#olho').show();
    }
</script>

</html>