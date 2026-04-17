<?php
session_start();

if(!isset($_GET['matricula']) && !isset($_POST['matricula'])){
    echo "Aluno não encontrado!";
    exit;
}

$matricula = isset($_GET['matricula']) ? $_GET['matricula'] : $_POST['matricula'];

$aluno = null;
$index = null;

// 🔍 procurar pela matrícula
foreach($_SESSION['alunos'] as $i => $a){
    if($a['matricula'] == $matricula){
        $aluno = $a;
        $index = $i;
        break;
    }
}

if($aluno == null){
    echo "Aluno não encontrado!";
    exit;
}

// 💾 salvar alteração
if(isset($_POST['salvar'])){
    $_SESSION['alunos'][$index]['nome'] = $_POST['nome'];
    $_SESSION['alunos'][$index]['nota1'] = $_POST['nota1'];
    $_SESSION['alunos'][$index]['nota2'] = $_POST['nota2'];
    $_SESSION['alunos'][$index]['faltas'] = $_POST['faltas'];

    header("Location: buscar.php");
    exit;
}
?>

<h2>Editar Aluno</h2>

<form method="post">
    <!-- matrícula escondida -->
    <input type="hidden" name="matricula" value="<?php echo $aluno['matricula']; ?>">

    Matrícula: <br>
    <input type="text" value="<?php echo $aluno['matricula']; ?>" disabled><br>

    Nome:<br>
    <input type="text" name="nome" value="<?php echo $aluno['nome']; ?>"><br>

    Nota 1:<br>
    <input type="text" name="nota1" value="<?php echo $aluno['nota1']; ?>"><br>

    Nota 2:<br>
    <input type="text" name="nota2" value="<?php echo $aluno['nota2']; ?>"><br>

    Faltas:<br>
    <input type="text" name="faltas" value="<?php echo $aluno['faltas']; ?>"><br><br>

    <button type="submit" name="salvar">Salvar</button>
</form>