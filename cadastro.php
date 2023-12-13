<?php
session_start(); // Inicia a sessão PHP, o que é necessário para utilizar variáveis de sessão.

$erro = ""; // Inicializa a variável de erro como uma string vazia.

// Verifica se o método de requisição é POST, o que normalmente indica que o formulário foi enviado.
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verifica se os campos nome, email ou senha estão vazios.
    if (empty($_POST['nome']) || empty($_POST['email']) || empty($_POST['cep'])) {
        $erro = "Por favor, preencha todos os campos."; // Define a mensagem de erro se algum campo estiver vazio.
    } else {
        require_once "processa_cadastro.php"; // Inclui o arquivo que processa o cadastro se todos os campos estiverem preenchidos.
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="estiloc.css"> <!-- Link para o arquivo CSS externo -->
    <title>Cadastro</title>
</head>
<body class="fundo">

  <div class="card">

     

    <h1 align="center">  <font color=""> <font size="10"> NIKE SHOP </h1>   </font> 
    
    <!-- Formulário de cadastro. O action está configurado para enviar os dados para a mesma página. -->
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <!-- Campos de nome, e-mail e senha -->
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" required placeholder="Digite seu Nome">

        <label for="email">E-mail:</label>
        <input type="email" id="email" name="email" required placeholder="Digite seu email">

        <label for="cpf">CPF:</label>
        <input type="text" id="cpf" name="cpf" maxlength="11" required placeholder="Digite seu CPF">

        <label for="modelo">Modelo:</label>
        <input type="text" id="modelo" name="modelo" required placeholder="Escolha o modelo de tenis">

        <label for="tamanho"> Tamanho:</label>
        <input type="text" id="tamanho" name="tamanho" required placeholder="Escolha seu tamanho" >

        <label for="cor"> Cor:</label>
        <input type="text" id="cor" name="cor" required placeholder="Escolha sua cor" >
 
        <label for="endereco"> Endereço:</label>
        <input type="text" id="endereco" name="endereco" required placeholder="DIgite seu endereço" >

        
        <label>  <font color="white"> CEP: </font>   </label>
        <input type="text" id="cep" name="cep" size="25" required placeholder="Digite seu CEP" required/>

  
       <label>  <font color="white"> Forma de Pagamento: </font> </label>
       <input type="text" id="formadepagamento" name="formadepagamento" size="25" required placeholder="Qual forma de pagamento?" required/>
   
    
       <label>  <font color="white"> Telefone: </font> </label>
       <input type="text" id="telefone" name="telefone" size="25" required placeholder="Digite seu telefone com o DDD" required/>
      
<br>
        <input type="submit" value="Cadastrar"> <!-- Botão de envio do formulário -->
    </form>
    <!-- Link para visualizar cadastros -->
    <a href="visualizar_cadastros.php" class="btn" align="center"> Visualizar Cadastros</a>

    <?php 
        // Verifica se há uma mensagem de erro para exibir.
        if (!empty($erro)): ?>
            <div class="mensagem erro">
                <?php echo $erro; // Exibe a mensagem de erro ?>
            </div>
        <?php 
        // Verifica se existe uma mensagem na sessão e se ela não está vazia.
        elseif (isset($_SESSION['mensagem']) && !empty($_SESSION['mensagem'])): ?>
            <div class="mensagem">
                <?php 
                echo $_SESSION['mensagem']; // Exibe a mensagem da sessão.
                unset($_SESSION['mensagem']); // Limpa a mensagem da sessão.
                ?>
            </div>
   </div>

<?php endif; ?>

</body>
</html>
