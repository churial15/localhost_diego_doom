
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Empresa do Diego</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<?php

// Configurações do banco de dados
$host = 'localhost';
$user = 'root'; // usuário padrão do XAMPP
$password = 'root'; // senha padrão do XAMPP (vazia)
$database = 'system_cad'; // substitua pelo nome do seu banco de dados

// Conectar ao banco de dados
$conn = new mysqli($host, $user, $password, $database);

// Verificar conexão
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

// Receber dados do forms
$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

// Acessar o IF quando o usuario clicar no botão de acesso do formulario
if (!empty($dados["Sendlogin"])) {
    // Preparar a consulta SQL
    $query_usuario = "SELECT id_user, senha FROM usuários WHERE usuário = ? LIMIT 1";
    $stmt = $conn->prepare($query_usuario);
    $stmt->bind_param("s", $dados["usuario"]);
    $stmt->execute();
    $resultado = $stmt->get_result();
    
    if ($resultado->num_rows == 1) {
        // Usuário encontrado, verificar senha
        $row_usuario = $resultado->fetch_assoc();
        if (md5($dados["senha_usuario"], $row_usuario['senha'])) {
            // Senha correta - iniciar sessão e redirecionar
            session_start();
            $_SESSION['id'] = $row_usuario['id'];
            $_SESSION['usuario'] = $dados["usuario"];
            
            header("Location: dashboard.php"); // redireciona para página restrita
            exit();
        } else {
            echo "<p style='color: red'>Erro: Senha incorreta!</p>";
        }
    } else {
        echo "<p style='color: red'>Erro: Usuário não encontrado!</p>";
    }
}

?>
<!-- Inicio do formulario -->
<form method="POST" action="">
    <div class='usuario'>
<label>Usuário: </label>
<input type="text" name="usuario" placeholder="digite o usuário" required><br><br></div>

    <div class='senha'>
<label>Senha: </label>
<input type="password" name="senha_usuario" placeholder="digite a senha" required><br><br></div>

<input type="submit" name="Sendlogin" value="Acessar">
</form>
<!-- fim do formulario -->
  <h3><ul>Home</ul> <ul>Produtos</ul> <ul>Infomações</ul></h3>
  <h2>Informações sobre a minha empresa: </h2>
  <form action=""></form>
</body>
</html>

