<?php
session_start();

if(!isset($_GET['matricula'])){
    echo "Aluno não encontrado!";
    exit;
}

$matricula = $_GET['matricula'];

foreach($_SESSION['alunos'] as $i => $a){
    if($a['matricula'] == $matricula){

        unset($_SESSION['alunos'][$i]);
        $_SESSION['alunos'] = array_values($_SESSION['alunos']);

        echo "<p>Aluno excluído com sucesso!</p>";
        echo "<a href='buscar.php'>Voltar</a>";
        exit;
    }
}

echo "Aluno não encontrado!";
?>