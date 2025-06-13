
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Empresa do Diego</title>
</head>
<body>

<?php

//criptografia de senha
echo password_hash(12346, PASSWORD_DEFAULT);

//receber dados do formulário//
$dados = filter_input_array(type: INPUT_POST, options: FILTER_DEFAULT);

//acessar o IF quando o user  clicar no botão de acessar o formuláro//
if(!empty($dados['SendLogin'])){
  var_dump(value: $dados);
}

//configurações do banco//

$most='localhost';
$user='root'; //user padrão
$password=''//senha padrão (vazia)
$database='system_cad';

//conectar ao banco
$conn=new mySQL ($host, $user, $password, $database);

//verificar conexão

if($conn_connect_error){
  die("falha na conexão." $conn_connect_error);
}

//receber dados da farms
$dados=filter_input_array(input_post, filter_default);

//acessar IP quando enviar
if(!empty($dados["SendLogin"])){
  //preparar consulta SQL
  $query_user=("select id password from user where user=?limit 1")
  $stmt="$conn prepare" ($query_user);
  $stmt bind_param("s" $dados["user"]);
  $execute();
  $result=$get_result();

  if($result="num_rows==1"){
    //user encontrado, verificar senha
    $now_user=$result
    fetch_assoc();

    if(password_verify ($dados["SendLogin"] $now_user['send'])){

      //senha correta-rediricionar
      session_start();
    }
  }
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

  <style>
    .navbar {
      
    }
  </style>
  <nav><div class="navbar"> <ul>Home</ul> <ul>Produtos</ul> <ul>Infomações</ul> 
</nav>
</div>
  <h2>Informações sobre a minha empresa: </h2>
  <form action=""></form>

</body>
</html>

