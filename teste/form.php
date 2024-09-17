<?php
include('../conecta.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teste de matricula</title>
</head>

<body>
    <form action="processa.php" method="get">
        <input type="number" name="matricula" placeholder="Matricula" required><br>

        <select name="sala" required>
            <option disabled selected>Selecione a sala</option>
            <?php
            $sql = "SELECT * FROM sala";
            $executaSQL = mysqli_query($conexao, $sql);
            while ($dados = mysqli_fetch_assoc($executaSQL)) {
            ?>
                <option value="<?php echo $dados['n_sala']; ?>" required><?php echo $dados['descricao']; ?></option>
            <?php
            }
            ?>
        </select><br><br>

        <input type="submit" value="Enviar"><br>
    </form>
</body>

</html>
<?php
echo "<link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css'>";
$sql = "SELECT * FROM aluno
    inner join turma on turma = id_turma";
$resultado = mysqli_query($conexao, $sql);


//Lista os itens
echo "<br>";
echo '<table class="table table-white table-striped">
<tr>
<th scope="col">Matricula</th>
<th scope="col">Nome</th>
<th scope="col">Turma</th>
</tr>';

while ($dados = mysqli_fetch_assoc($resultado)) {
    echo '<tr>';
    echo '<td>' . $dados['matricula'] . '</td>';
    echo '<td>' . $dados['nome'] . '</td>';
    echo '<td>' . $dados['nome_turma'] . '</td>';
    echo '</tr>';
}

echo '</table>' . "<br>";
echo '<button><a href="index.php">Voltar</a></button>';
?>