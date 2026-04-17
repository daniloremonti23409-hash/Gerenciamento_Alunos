<?php
session_start();

?>
<?php



if(isset($_GET['buscar'])){

$matricula_busca = $_GET['buscar'];
$encontrado = false;

echo "<table border='1'>";
echo "<tr>
        <th>Matrícula</th>
        <th>Nome</th>
        <th>Nota 1</th>
        <th>Nota 2</th>
        <th>Faltas</th>
      </tr>";

foreach($_SESSION['alunos'] as $aluno){

    if($aluno['matricula'] == $matricula_busca){

        echo "<tr>";
        echo "<td>" . $aluno["matricula"] . "</td>";
        echo "<td>" . $aluno["nome"] . "</td>";
        echo "<td>" . $aluno["nota1"] . "</td>";
        echo "<td>" . $aluno["nota2"] . "</td>";
        echo "<td>" . $aluno["faltas"] . "</td>";
        echo "<td>
        <a href='editar.php?matricula={$aluno['matricula']}'>Editar</a> |
        <a href='excluir.php?matricula={$aluno['matricula']}'>Excluir</a>
      </td>";
        echo "</tr>";

        $encontrado = true;
        break;
    }
}

echo "</table>";

if(!$encontrado){
    echo "<p>Aluno não encontrado!</p>";
}
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
</head>
<body>

<?php

include("menu.php");
?>
    
<h2>Buscar Aluno</h2>

<form action="" method="get">
<label for="">Buscar Aluno</label><br>
<input type="text" name="buscar"><br><br>
<button type="submit">Buscar Aluno</button><br>

</form>

</body>
</html>