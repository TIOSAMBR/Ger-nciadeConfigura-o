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

// Verificar se o ID do aluno a ser editado foi enviado via GET
if (isset($_GET["id"]) && !empty($_GET["id"])) {
    $id = $_GET["id"];

    // Verificar se o formulário de edição foi submetido
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nome = $_POST["nome"];
        $endereco = $_POST["endereco"];
        $cidade = $_POST["cidade"];
        $estado = $_POST["estado"];
        $email = $_POST["email"];
        $telefone = $_POST["telefone"];

        // Preparar e executar a declaração de atualização
        $sql = "UPDATE alunos SET nome='$nome', endereco='$endereco', cidade='$cidade', estado='$estado', email='$email', telefone='$telefone' WHERE id=$id";

        if ($conn->query($sql) === TRUE) {
            echo "Registro de aluno atualizado com sucesso!";
            // Redirecionar de volta para a página principal após a atualização
            header("Location: index.php");
            exit();
        } else {
            echo "Erro ao atualizar registro de aluno: " . $conn->error;
        }
    }

    // Consultar detalhes do aluno com base no ID fornecido
    $sql = "SELECT * FROM alunos WHERE id=$id";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $nome = $row["nome"];
        $endereco = $row["endereco"];
        $cidade = $row["cidade"];
        $estado = $row["estado"];
        $email = $row["email"];
        $telefone = $row["telefone"];
    } else {
        echo "Registro de aluno não encontrado";
        exit();
    }
} else {
    echo "ID do aluno não fornecido";
    exit();
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
    <title>Editar Aluno</title>
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
        <h2>Editar Aluno</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) . "?id=$id"; ?>" method="POST">
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" value="<?php echo $nome; ?>" required><br><br>
            <label for="endereco">Endereço:</label>
            <input type="text" id="endereco" name="endereco" value="<?php echo $endereco; ?>"><br><br>
            <label for="cidade">Cidade:</label>
            <input type="text" id="cidade" name="cidade" value="<?php echo $cidade; ?>"><br><br>
            <label for="estado">Estado:</label>
            <input type="text" id="estado" name="estado" value="<?php echo $estado; ?>"><br><br>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="<?php echo $email; ?>"><br><br>
            <label for="telefone">Telefone:</label>
            <input type="text" id="telefone" name="telefone" value="<?php echo $telefone; ?>"><br><br>
            <input type="submit" value="Atualizar Aluno">
        </form>
    </div>
</body>
</html>
