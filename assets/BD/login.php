<?php
// Inicia a sessão
session_start();

// Verifica se os dados do formulário foram submetidos
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Configurações do banco de dados
    $servername = "localhost:1433";
    $username = "root@";
    $password = "Cobrinha023";
    $dbname = "teste";

    // Dados do formulário
    $email = $_POST["email"];
    $senha = $_POST["senha"];

    // Cria a conexão com o banco de dados
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verifica a conexão
    if ($conn->connect_error) {
        die("Conexão falhou: " . $conn->connect_error);
    }

    // Consulta para verificar se o usuário existe no banco de dados
    $sql = "SELECT * FROM usuarios WHERE email='$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Usuário encontrado, verificar a senha
        $row = $result->fetch_assoc();
        if (password_verify($senha, $row['senha'])) {
            // Senha correta, login bem-sucedido
            // Inicia a sessão e armazena o ID do usuário
            $_SESSION['user_id'] = $row['id'];
            echo "<script>alert('Usuário logado com sucesso!'); window.location.href = 'teste.html';</script>";
        } else {
            // Senha incorreta
            echo "Email ou senha inválidos.";
        }
    } else {
        // Usuário não encontrado
        echo "Usuário não encontrado.";
    }

    // Fecha a conexão com o banco de dados
    $conn->close();
}
?>
