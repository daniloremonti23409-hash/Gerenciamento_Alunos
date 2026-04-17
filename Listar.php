

<?php

session_start();

if(isset($_POST["Apagar"])){
unset($_SESSION['alunos']);

}

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
   
    <style>
table, th, td {
  border: 1px solid black;
}
</style>

</head>
<body>
    
<?php
include("menu.php");

?>

<div class="container"></div>

<h2>Alunos cadastrados</h2>

<table>
<tr>
<th>Matricula</th>
<th>nome do Aluno</th>
<th>Nota 1</th>
<th>Nota 2</th>
<th>faltas</th>

</tr>

<?php
if(isset($_SESSION['alunos'])&& !empty($_SESSION['alunos'])){
    foreach($_SESSION['alunos'] as $aluno){
echo "<tr>";
echo"<td>" . $aluno["matricula"] . "</td>";
echo"<td>" . $aluno["nome"] . "</td>";
echo "<td>". $aluno["nota1"] . "</td>";
echo "<td>". $aluno["nota2"] . "</td>";
echo "<td>". $aluno["faltas"] . "</td>";
}
}
?>

<?php
$soma_medias = 0;
$total_alunos = 0;

$maior_media = -1;
$menor_media = 999;
$aluno_maior = "";
$aluno_menor = "";

$aprovados = array();
$reprovados = array();

foreach($_SESSION['alunos'] as $aluno){

    $media = ($aluno["nota1"] + $aluno["nota2"]) / 2;

    if($media >= 6 && $aluno["faltas"] <= 10){
        $situacao = "Aprovado";
        $aprovados[] = $aluno["nome"];
    } else {
        $situacao = "Reprovado";
        $reprovados[] = $aluno["nome"];
    }

    $soma_medias += $media;
    $total_alunos++;

    if($media > $maior_media){
        $maior_media = $media;
        $aluno_maior = $aluno["nome"];
    }

    if($media < $menor_media){
        $menor_media = $media;
        $aluno_menor = $aluno["nome"];
    }

    echo "<tr>";
    echo "<td>{$aluno["matricula"]}</td>";
    echo "<td>{$aluno["nome"]}</td>";
    echo "<td>{$aluno["nota1"]}</td>";
    echo "<td>{$aluno["nota2"]}</td>";
    echo "<td>{$aluno["faltas"]}</td>";
    echo "<td>$situacao</td>";
    echo "</tr>";
}

$media_geral = $total_alunos > 0 ? $soma_medias / $total_alunos : 0;

echo "<p>Média geral: $media_geral</p>";
echo "<p>Total de alunos: $total_alunos</p>";
echo "<p>Maior média: $aluno_maior ($maior_media)</p>";
echo "<p>Menor média: $aluno_menor ($menor_media)</p>";



?>


</table><br>
<form action="" method="post">
<label for="">Limpar dados</label><br><br>
<button type="submit" name="Apagar">Apagar dados</button><br><br>
</form>



</body>
</html>