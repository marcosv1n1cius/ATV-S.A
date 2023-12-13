<?php
session_start(); // Inicia a sessão

// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Conectar com o banco de dados
    $servername = "localhost"; // ou o endereço do seu servidor de banco de dados
    $username = "root";    // seu nome de usuário do banco de dados
    $password = "";    // sua senha do banco de dados
    $dbname = "revisaodw"; // nome do banco de dados

    // Criar conexão
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificar conexão
    if ($conn->connect_error) {
        $mensagem = "Conexão falhou: " . $conn->connect_error;
    }

    // Coletar dados do formulário
    $nome = $conn->real_escape_string($_POST['nome']);
    $email = $conn->real_escape_string($_POST['email']);
    $cpf = $conn->real_escape_string($_POST['cpf']); 
    $modelo = $conn->real_escape_string($_POST['modelo']); 
    $tamanho = $conn->real_escape_string($_POST['tamanho']); 
    $cor = $conn->real_escape_string($_POST['cor']); 
    $endereco = $conn->real_escape_string($_POST['endereco']); 
    $cep = $conn->real_escape_string($_POST['cep']); 
    $formadepagamento = $conn->real_escape_string($_POST['formadepagamento']); 
    $telefone = $conn->real_escape_string($_POST['telefone']); 


    // Criar o comando SQL para inserir os dados
    $sql = "INSERT INTO usuarios (nome, email, cpf, modelo, tamanho, cor, endereco, cep, formadepagamento, telefone) VALUES ('$nome', '$email', '$cpf','$modelo','$tamanho','$cor','$endereco','$cep','$formadepagamento','$telefone')";

    // Executar o comando SQL
    if ($conn->query($sql) === TRUE) {
        $_SESSION['mensagem'] = "Cadastro realizado com sucesso!";
    } else {
        $_SESSION['mensagem'] = "Erro ao realizar cadastro: " . $conn->error;
    }
    // Fechar conexão
    $conn->close();

    // Redireciona para a página do formulário
    header("Location: cadastro.php");
    exit;
}
?>
