<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT); // Hash da senha

    // Conectar ao banco de dados
    $conexao = new mysqli('localhost:1433', 'root@', 'Cobrinha023', 'teste');

    // Verificar conexão
    if ($conexao->connect_error) {
        die("Conexão falhou: " . $conexao->connect_error);
    }

    // Verificar se já existe um usuário com o mesmo nome ou email
    $sql_verificar = "SELECT * FROM usuarios WHERE nome='$nome' OR email='$email'";
    $resultado_verificar = $conexao->query($sql_verificar);
    if ($resultado_verificar->num_rows > 0) {
        echo "Já existe um usuário com o mesmo nome ou e-mail.";
    } else {
        // Inserir usuário no banco de dados
        $sql = "INSERT INTO usuarios (nome, email, senha) VALUES ('$nome', '$email', '$senha')";
        if ($conexao->query($sql) === TRUE) {
            // Exibir mensagem de sucesso
            echo "<script>alert('Usuário registrado com sucesso!'); window.location.href = 'teste.html';</script>";
            exit();
        } else {
            echo "Erro ao registrar o usuário: " . $conexao->error;
        }
    }

    $conexao->close();
}
?>
