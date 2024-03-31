<?php
// Conexão com o banco de dados 
$servername = "mysql";
$username = "root";
$password = "root";
$dbname = "universidade";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Verificar se o ID do aluno a ser excluído foi enviado via GET
if (isset($_GET["id"]) && !empty($_GET["id"])) {
    // Preparar e executar a declaração de exclusão
    $id = $_GET["id"];
    $sql = "DELETE FROM alunos WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        //echo "Registro de aluno excluído com sucesso!";
        header("Location: index.php");
	exit();
    } else {
        echo "Erro ao excluir registro de aluno: " . $conn->error;
    }
}

// Redirecionar de volta para a página principal após a exclusão


// Fechar conexão com o banco de dados
$conn->close();
?>
