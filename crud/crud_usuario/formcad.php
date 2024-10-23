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
                    <label></label><input type="email" placeholder="Email" name="email" required></label><br><br>

                    <!-- COLOCAR O OLHO QUE ESTA NA TELA DE LOGIN PARA VER A SENHA -->
                    <label><input type="password" placeholder="Senha" name="senha" required></label><br><br>


                    <label>Tipo de usuário:</label><br>
                    <label>Administrador<input type="radio" name="nivel" value="1" required></label><br>
                    <label>Professor<input type="radio" name="nivel" value="2" required></label><br><br>
                    <input type="submit" value="Cadastrar"><br><br>
            </div>
            </form>
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
    }

    function cadastrar() {
        jQuery('#cadastrar').show();
        jQuery('#listar').hide();
    }
</script>

</html>