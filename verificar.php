<?php
include("conexao.php");
include("biblio.php");

$user = entrada($_POST['user']);
$senha = entrada($_POST['senha']);

try{
  $sql_user = "SELECT nome, user, setor, senha, coord, nivel FROM usuario where user=:user";
  $stmt = $PDO->prepare($sql_user);
  $stmt->bindParam(':user', $user, PDO::PARAM_STR);
  $stmt->execute();

  $result = $stmt->rowCount();

  if($result > 0){
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    if($row['user'] == $user && $row['senha'] == $senha){
      echo "Login com sucesso";

      session_start();
      $_SESSION['user'] = $row['user'];
      $_SESSION['nome'] = $row['nome'];
      //$_SESSION['email'] = $row['email'];
      //$_SESSION['telefone'] = $row['telefone'];
      $_SESSION['setor'] = $row['setor'];
      $_SESSION['nivel'] = $row['nivel'];
      $_SESSION['ativo'] = $row['ativo'];
      $_SESSION['cadastro'] = $row['cadastro'];
      if($row['nivel'] < 3){
        $_SESSION['coord'] = $row['coord'];
      }else{
        $_SESSION['coord'] = "";
      }
      header("Location: /cbpf");
    }else{
      echo "Login ou senha incorretos";
      header("Location:login.php?err=1");exit;
    }
  }else{
    echo "Login não encontrado";
    header("Location: login.php?err=2");exit;
  }
}catch(PDOException $e){
  echo "ERROR: " . $e->getMessage();
}

 ?>
