<?php
include "../../conecta.php";
session_start();
if (!isset($_SESSION['nivel']) or $_SESSION['nivel'] == 2) {
    include "../../login/verif-log.php";
    die();
}
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="../../css/sweetalert2@11.js"></script>
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
                <h2><a href="../../login/redire.php"><img src="../../img/voltar.png"></a> Cadastrar aluno</h2>
                <nav>
                    <ul>
                        <li><a href="#"><button type="button" class="btn btn-outline-secondary" onclick="listar()">Ver alunos </button></a></td></a></li>
                    </ul>
                </nav>
            </header>
            <div style="text-align: center">
                <form action="cadastrar.php" method="post">
                    <input type="hidden" name="id_aluno">

                    <div class="container">
                        <div class="form-floating mb-3">
                            <input name="matricula" type="number" class="form-control" id="floatingInput" placeholder="" required>
                            <label for="floatingInput">Matricula</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input name="nome" type="text" class="form-control" id="floatingInput" placeholder="" required>
                            <label for="floatingInput">Nome do aluno</label>
                        </div>

                        <select name="turma" class="form-select" aria-label="Default select example" required>
                            <option disabled selected>Selecione a turma</option>
                            <?php
                            $sql = "SELECT * FROM turma";
                            $executaSQL = mysqli_query($conexao, $sql);
                            while ($dados = mysqli_fetch_assoc($executaSQL)) {
                            ?>
                                <option value="<?php echo $dados['id_turma']; ?>"><?php echo $dados['nome_turma']; ?></option>
                            <?php
                            }
                            ?>
                        </select><br><br>
                        <input class="btn btn-primary" type="submit" value="Cadastrar"><br><br><br><br>
                    </div>
                </form>
            </div>
        </div>

        <div id="listar">
            <header>
                <h2><a href="../../login/redire.php"><img src="../../img/voltar.png"></a> Alunos cadastrados</h2>
                <nav>
                    <ul>
                        <li><a href="#"><button type="button" class="btn btn-outline-secondary" onclick="cadastrar()">Cadastrar </button></a></td></a></li>
                    </ul>
                </nav>
            </header>
            <?php
            include('../../conecta.php');
            $sql = "SELECT * FROM usuario";
            $sql = "SELECT * FROM aluno
    inner join turma on turma = id_turma";
            $resultado = mysqli_query($conexao, $sql); ?>
            <table class=" container table table-white table-striped">
                <tr>
                    <th scope="col">Matricula</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Turma</th>
                    <th colspan=3>Opções</th>
                </tr>
                <?php
                while ($dados = mysqli_fetch_assoc($resultado)) { ?>
                    <tr>
                        <?php
                        echo '<td>' . $dados['matricula'] . '</td>';
                        echo '<td>' . $dados['nome'] . '</td>';
                        echo '<td>' . $dados['nome_turma'] . '</td>'; ?>

                        <td>
                            <a href="formedit.php?matricula=<?php echo $dados['matricula'] ?>" role="button" class="btn btn-info"><img src="imagens/editar.png" width="20" height="20"> </a>
                        </td>
                        <td>
                            <button class="btn btn-danger deleteButton"
                                data-url="excluir.php?matricula=<?php echo $dados['matricula']; ?>">
                                <img src="imagens/excluir.png" width="20" height="20">
                            </button>
                    </tr>
                <?php
                } ?>

            </table><br>
        </div>
</body>
<!-- <a href="../../login/redire.php"><button type="button" class="btn btn-secondary">Voltar</button></a> -->
</body>

<script>
    jQuery('#cadastrar').hide();

    function listar() {
        jQuery('#listar').show();
        jQuery('#cadastrar').hide();
    }

    function cadastrar() {
        jQuery('#cadastrar').show();
        jQuery('#listar').hide();
    }

    document.querySelectorAll('.deleteButton').forEach(button => {
        button.addEventListener('click', function(event) {
            event.preventDefault();
            const url = this.getAttribute('data-url');
            Swal.fire({
                title: 'Tem certeza?',
                text: 'Você não poderá reverter isso!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Sim, deletar!',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = url;
                }
            });
        });
    });
</script>

</html>