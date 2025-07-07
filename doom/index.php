
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
    <style>
    /* Reset */
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    body {
      background: linear-gradient(135deg, #1e3c72, #2a5298);
      color: #fff;
      min-height: 100vh;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      padding: 20px;
    }

    .login-container {
      background-color: rgba(255, 255, 255, 0.1);
      padding: 30px 40px;
      border-radius: 15px;
      box-shadow: 0 8px 25px rgba(0, 0, 0, 0.3);
      max-width: 400px;
      width: 100%;
    }

    .login-container h2 {
      text-align: center;
      margin-bottom: 20px;
      color: #fff;
    }

    label {
      font-weight: bold;
      display: block;
      margin-bottom: 5px;
    }

    input[type="text"],
    input[type="password"] {
      width: 100%;
      padding: 12px 15px;
      margin-bottom: 20px;
      border: none;
      border-radius: 8px;
      background-color: #f1f1f1;
      color: #333;
      font-size: 16px;
    }

    input[type="submit"] {
      width: 100%;
      padding: 12px;
      border: none;
      border-radius: 8px;
      background-color: #4CAF50;
      color: white;
      font-size: 16px;
      cursor: pointer;
      transition: background 0.3s ease;
    }

    input[type="submit"]:hover {
      background-color: #45a049;
    }

    .nav {
      display: flex;
      justify-content: center;
      margin-top: 30px;
      gap: 30px;
      list-style: none;
      padding: 0;
      color: #fff;
    }

    .nav li {
      font-size: 18px;
      cursor: pointer;
      transition: color 0.3s ease;
    }

    .nav li:hover {
      color: #c0d9ff;
    }

    .info {
      margin-top: 40px;
      text-align: center;
    }

    .info h2 {
      font-size: 22px;
      margin-bottom: 10px;
    }

    .obrigatorio-texto{
  position: relative;
  top: -20px; /* move 20px para cima */
  position: relative;
  left: -29px; /* Move 50 pixels para a esquerda */ 
}

.nav li {
  position: relative;
  font-size: 18px;
  cursor: pointer;
  transition: color 0.3s ease;
}

.nav li::after {
  content: "";
  position: absolute;
  left: 0;
  bottom: -5px; /* distância da barra para o texto */
  width: 0;
  height: 2px;
  background-color: #fff;
  transition: width 0.3s ease;
}

.nav li:hover::after {
  width: 100%;
}

.info-footer {
  background-color: #fff9c4; /* amarelo claro */
  color: #333;
  padding: 30px;
  width: 80%;
  max-width: 800px;
  margin: 60px auto 0 auto;
  border-top-left-radius: 40px;
  border-top-right-radius: 40px;
  border-bottom-left-radius: 100px;
  border-bottom-right-radius: 100px;
  overflow: hidden;
  box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
  position: relative;
  text-align: center;
}

/* efeito de "sumir" da tela no final */
.info-footer::after {
  content: "";
  position: absolute;
  bottom: -50px;
  left: 0;
  right: 0;
  height: 60px;
  background: #fff9c4;
  border-bottom-left-radius: 200px;
  border-bottom-right-radius: 200px;
}

  </style>
</head>
<body>
<img src="imagens/logodaempresa.png" alt="Logo da empresa fictícia"
     style="width: 400px; height: 175px; display: block; margin: 0 auto; transform: translateY(-40px); filter: drop-shadow(0 0 10px rgba(255, 255, 255, 0.2));;">
   
  <div class="login-container">
     <p class="obrigatorio-texto"><span style="color: red;">*</span>campo obrigatório</p>
    <h2>conecte-se</h2>
    <form method="POST" action="">
      <label for="usuario">*Usuário:</label>
      <input type="text" id="usuario" name="usuario" placeholder="Digite o usuário" required>

      <label for="senha">*Senha:</label>
      <input type="password" id="senha" name="senha_usuario" placeholder="Digite a senha" required>

      <input type="submit" name="Sendlogin" value="Acessar">
    </form>
  </div>

  <ul class="nav">
    <li>Home</li>
    <li>Produtos</li>
    <li>Informações</li>
  </ul>

  <div class="info-footer">
  <h2>Informações sobre a minha empresa:</h2>
  <p>Aqui você encontrará os melhores profissionais para checar e consertar seus eletrônicos, de um celular até a TV.</p>
</div>

</body>
</html>

