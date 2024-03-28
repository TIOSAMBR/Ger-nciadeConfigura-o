<?php
// Conexão com o banco de dados 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "universidade";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Verificar se o formulário foi submetido
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["nome"];
    $endereco = $_POST["endereco"];
    $cidade = $_POST["cidade"];
    $estado = $_POST["estado"];
    $email = $_POST["email"];
    $telefone = $_POST["telefone"];

    // Preparar e executar a declaração de inserção
    $sql = "INSERT INTO alunos (nome, endereco, cidade, estado, email, telefone) VALUES ('$nome', '$endereco', '$cidade', '$estado', '$email', '$telefone')";

    if ($conn->query($sql) === TRUE) {
        echo "Novo registro de aluno adicionado com sucesso!";
        // Redirecionar de volta para a página principal após o sucesso
        header("Location: index.php");
        exit();
    } else {
        echo "Erro: " . $sql . "<br>" . $conn->error;
    }
}

// Fechar conexão com o banco de dados
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Adicionar Aluno</title>
</head>
<body>
    <nav>
        <div class="nav">
            <h1>Registros de Alunos</h1>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="#">Sobre</a></li>
                <li><a href="#">Contato</a></li>
            </ul>
        </div>
    </nav>

    <div class="container">
        <h2>Adicionar Aluno</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" required><br><br>
            <label for="endereco">Endereço:</label>
            <input type="text" id="endereco" name="endereco"><br><br>
            <label for="cidade">Cidade:</label>
            <input type="text" id="cidade" name="cidade"><br><br>
            <label for="estado">Estado:</label>
            <input type="text" id="estado" name="estado"><br><br>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email"><br><br>
            <label for="telefone">Telefone:</label>
            <input type="text" id="telefone" name="telefone"><br><br>
            <input type="submit" value="Adicionar Aluno">
        </form>
    </div>
</body>
</html>
