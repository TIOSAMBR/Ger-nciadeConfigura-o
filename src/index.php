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

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Registros de Alunos</title>
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
        <?php

        // Consultar registros de alunos no banco de dados
        $sql = "SELECT * FROM alunos";
        $result = $conn->query($sql);

        // Exibir registros de alunos em uma tabela HTML
        echo "<h2>Lista de Alunos</h2>";
        echo "<table>";
        echo "<tr><th>ID</th><th>Nome</th><th>Endereço</th><th>Cidade</th><th>Estado</th><th>Email</th><th>Telefone</th><th>Ações</th></tr>";
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["id"] . "</td>";
                echo "<td>" . $row["nome"] . "</td>";
                echo "<td>" . $row["endereco"] . "</td>";
                echo "<td>" . $row["cidade"] . "</td>";
                echo "<td>" . $row["estado"] . "</td>";
                echo "<td>" . $row["email"] . "</td>";
                echo "<td>" . $row["telefone"] . "</td>";
                echo "<td><a href='edit.php?id=" . $row["id"] . "'>Editar</a> | <a href='delete.php?id=" . $row["id"] . "'>Excluir</a></td>"; // Links para edição e exclusão
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='8'>Nenhum registro encontrado</td></tr>";
        }
        echo "</table>";
        ?>

        <a href="adicionar_aluno.php" class="add-button">Adicionar Aluno</a>
    </div>
</body>
</html>

<?php
// Fechar conexão com o banco de dados
$conn->close();
?>
