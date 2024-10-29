
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teste de matricula</title>
</head>




<?php 

if (empty ($_POST) == false ){

    var_dump($_POST);

    exit;

}


$dados = [
    [
        "cod" =>  22,
        "presenca" => 1
    ],
    [
        "cod" =>  25,
        "presenca" => 1
    ],
    [
        "cod" =>  12,
        "presenca" => 0
    ],
    [
        "cod" =>  2,
        "presenca" => 1
    ]

    ];

//Lista os itens
echo "<br>";
echo "<form action='./form.php' method='POST'>" ;
echo '<table border="1">
<tr>
<th scope="col">Cód.</th>
<th scope="col">Presença</th>

</tr>';

$a = 0;
foreach ($dados as $d) {
    echo '<tr>';
    echo '<td>' . '<input type="text" name="item['.$a .'][cod]" value="' . $d['cod']   . '" />' .   '</td>';
    echo '<td>' . '<input type="text" name="item['.$a .'][presenca]" value="' . $d['presenca']   . '" />' .   '</td>';
    echo '<td>' . $d['presenca'] . '</td>';
    $a++;

    echo '</tr>';


}
/*

item[0][cod]
item[0][presenca]
item[1][cod]
item[1][presenca]
item[2][cod]
item[2][presenca]


*/




echo '</table>' . "<br>";
echo "<input type='submit' value='Salvar'> ";

echo "</form>" ;
echo '<button><a href="index.php">Voltar</a></button>';
?>

  
</body>
</html>
