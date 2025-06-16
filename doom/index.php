
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Empresa do Diego</title>
</head>
<body>

<?php
// Exemplo de senha criptografada (só para demonstração)
echo password_hash("12346", PASSWORD_DEFAULT);

// Receber dados do formulário
$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

if (!empty($dados['SendLogin'])) {
    var_dump($dados);

    // Configurações do banco
    $host = 'localhost';
    $user = 'root';
    $password = '';
    $database = 'system_cad';

    // Conectar ao banco
    $conn = new mysqli($host, $user, $password, $database);

    // Verificar conexão
    if ($conn->connect_error) {
        die("Falha na conexão: " . $conn->connect_error);
    }

    // Preparar consulta SQL
    $query_user = "SELECT id, password FROM user WHERE user = ? LIMIT 1";

    $stmt = $conn->prepare($query_user);
    $stmt->bind_param("s", $dados["user"]);
    $stmt->execute();

    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $now_user = $result->fetch_assoc();

        if (password_verify($dados['senha'], $now_user['password'])) {
            session_start();
            echo "Login efetuado com sucesso!";
            // Aqui você pode redirecionar ou continuar a sessão
        } else {
            echo "Senha incorreta.";
        }
    } else {
        echo "Usuário não encontrado.";
    }

    $stmt->close();
    $conn->close();
}
?>

<!--início do formulário-->
<form method="POST" action="">
  <label>usuário:</label>
<input type="text" name="user" placeholder="Digite o usuário">
<br></br>
<label>Senha:</label>
<input type="password" name="senha" placeholder="Digite a senha"> <br></br>

<input type="submit" name="SendLogin" value="Acessar"> <br></br>
</form>
