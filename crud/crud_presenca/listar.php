<?php
session_start();
if (!isset($_SESSION['nivel']) or $_SESSION['nivel'] == 2) {
    header('location: ../../principal.php');
    die();
}
include('../../conecta.php');
echo "<link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css'>";
$sql = "SELECT * FROM disciplina";
$resultado = mysqli_query($conexao,$sql);

//Lista os itens
echo '<table class="table table-white table-striped">
<tr>
<th scope="col">Id</th>
<th scope="col">Nome</th>
<th colspan=3>Opções</th>
</tr>';

while ($dados = mysqli_fetch_assoc($resultado)) {
echo '<tr>';    
echo '<td>'.$dados['id_disciplinas'].'</td>';
echo '<td>'.$dados['nome_disciplina'] .'</td>';
echo '<td> <a href="formedit.php?id_disciplinas='.$dados['id_disciplinas'].'"> <img src="imagens/editar.png" width="20" height="20"> </a> </td>';
echo '<td> <a href="excluir?id_disciplinas='.$dados['id_disciplinas'].'"> <img src="imagens/excluir.png" width="20" height="20"> </a> </td>';
echo '</tr>';
}

echo '</table>'."<br>";
echo '<button><a href="index.php">Voltar</a></button>';
?>