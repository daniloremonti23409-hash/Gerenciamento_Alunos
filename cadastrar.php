
<?php

session_start();

if(!isset($_SESSION['alunos'])){
$_SESSION['alunos']=array();

};
if($_SERVER["REQUEST_METHOD"]=="POST"){

    $matricula = $_POST["matricula"];
    $nome = $_POST["nome"];
    $nota1 = $_POST["nota1"];
    $nota2 = $_POST["nota2"];
    $faltas = $_POST["faltas"];


$novo_aluno = array(

    "matricula" => $matricula,
"nome" => $nome,
"nota1" => $nota1,
"nota2" => $nota2,
"faltas" => $faltas

);

$_SESSION['alunos'][]=$novo_aluno;

echo "aluno $nome cadastrado com sucesso!";


}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de aluno</title>
    
</head>
<body>
<?php

include("menu.php");    

?>
<div class="container">
<h2>Cadastro de alunos</h2>

<form action="" method="post">
<label for="">Matricula</label>
<input type="text" name="matricula"><br><br>

<label for="">Nome</label>
<input type="text" name="nome"><br><br>

<label for="">Nota 1</label>
<input type="number" name="nota1"><br><br>

<label for="">Nota 2</label>
<input type="number" name="nota2"><br><br>

<label for="">Numero de faltas</label>
<input type="number" name="faltas">

<button type="submit" name="cadastrar">Cadastrar Aluno</button>

</form>

</div>

</body>
</html>