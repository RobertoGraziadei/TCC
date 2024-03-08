<?php
//conectar ao banco de dados.
include("conecta.php");

// Seleciona todos os dados da tabela historia
$sql = "SELECT * FROM historia";

// Executa o Select
$resultado = mysqli_query($conexao,$sql);


//Lista os itens
echo '<table border=1>
<tr>
<th>Id</th>
<th>Texto</th>
<th>1° escolha</th>
<th>2° escolha</th>
<th>ID de destino da 1° escolha</th>
<th>ID de destino da 2° escolha</th>
<th colspan=3>Nome da imagem</th>
</tr>';

while ($dados = mysqli_fetch_assoc($resultado)) {
echo '<tr>';    
echo '<td>'.$dados['id_historia'].'</td>';
echo '<td>'.$dados['texto'] .'</td>';
echo '<td>'.$dados['texto1'] .'</td>';
echo '<td>'.$dados['texto2'] .'</td>';
echo '<td>'.$dados['escolha1'] .'</td>';
echo '<td>'.$dados['escolha2'] .'</td>';
echo '<td>'.$dados['nome_imagem'].'</td>';
echo '<td> <a href="formedit.php?id='.$dados['id_historia'].'"> <img src="Imagem/editar.png" width="20" height="20"> </a> </td>';
echo '<td> <a href="excluir?id='.$dados['id_historia'].'"> <img src="Imagem/lixeira.png" width="20" height="20"> </a> </td>';
echo '</tr>';
}

echo '</table>';
?>