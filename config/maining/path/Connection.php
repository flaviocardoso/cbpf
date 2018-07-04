<?php
class CN
{
  protected $link;
  private $HOST, $USER, $PW, $BD;

  public function CN()
  {
    $this->HOST = "localhost";
    $this->USER  = "root";
    $this->PW = "";
    $this->BD = "link";
    $this->connect();
  }

  private function connect()
  {
    try
    {
      $this->link = new PDO('mysql:host=' . $this->HOST . ';dbname=' . $this->BD, $this->USER, $this->PW);
    }
    catch (PDOException $e)
    {
      echo 'ERRO' . $e->getMessage();
    }

  }

  public function verfUSER($user,$senha)
  {
    $flag= "";
    try
    {
      $sql_user = "SELECT nome, user, setor, senha, coord, nivel FROM usuario where user=:user";
      $stmt = $this->link->prepare($sql_user);
      $stmt->bindParam(':user', $user, PDO::PARAM_STR);
      $stmt->execute();

      $result = $stmt->rowCount();

      if($result > 0){
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if($row['user'] == $user && $row['senha'] == $senha){
          session_start();
          $_SESSION['user'] = $row['user'];
          $_SESSION['nome'] = $row['nome'];
          $_SESSION['setor'] = $row['setor'];
          $_SESSION['nivel'] = $row['nivel'];
          $_SESSION['ativo'] = $row['ativo'];
          $_SESSION['cadastro'] = $row['cadastro'];
          if($row['nivel'] < 3){
            $_SESSION['coord'] = $row['coord'];
          }else{
            $_SESSION['coord'] = "";
          }
          $flag = "OK";
        }else{
          $flag = "PWORUSERWRONG";
        }
      }else{
        $flag = "USERNOFOUND";
      }
    }
    catch (PDOException $e)
    {
      echo 'ERRO' . $e->getMessage();
    }
    return $flag;
  }
}

?>
