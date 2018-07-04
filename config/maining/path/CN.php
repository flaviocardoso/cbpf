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
      print 'ERRO' . $e->getMessage() . "<br/>";
      die();
    }

  }
  public function orderServicePorNOS($nos)
  {
    $rows = array();
    $count = 0;
    try
    {
      $sql = "SELECT idos FROM orderservice WHERE nos=:nos";
      $stmt = $this->link->prepare($sql1);
      $stmt->bindParam(':nos', $nos, PDO::PARAM_STR);
      $stmt->execute();
      $count = $stmt->rowCount();
      $rows = $stmt->fetch(PDO::FETCH_ASSOC);
    }
    catch (PDOException $e)
    {
      print 'ERRO' . $e->getMessage() . "<br/>";
    }
    return array($rows, $count);
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
      print 'ERRO' . $e->getMessage();
    }
    return $flag;
  }

  public function orderServicePorCoord($coord)
  {
    $rows = array();
    $count = 0;
    try{
      $sql = "SELECT os.idos as id, os.nos as nos, os.nome as solicitante, os.descr as descr, os.setor as setor, date_format(os.datahora, '%d/%m/%Y') as data, TIME(os.datahora) as hora, te.nome as tecnico, date_format(te.datahora, '%d/%m/%Y') as data_ultima, TIME(te.datahora) as hora_ultima, te.status as status, te.laudo as laudo FROM orderservice os JOIN (SELECT idos, nome, user, setor, datahora, status, laudo FROM tecnico group by idos desc) te using(idos) WHERE os.coord=:coord";
      $stmt = $this->link->prepare($sql);
      $stmt->bindParam(":coord", $coord, PDO::PARAM_STR);
      $stmt->execute();
      $count = $stmt->rowCount();
      $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    catch (PDOException $e)
    {
      print 'ERRO' . $e->getMessage();
    }
    return array($rows, $count);
  }

  public function consultaUser($user)
  {
    $rows = array();
    $count = 0;
    try
    {
      $sql = "select id, nome, email, telefone, setor, sala, coord, ala from usuario where user=:user";
      $stmt = $this->link->prepare($sql);
      $stmt->bindParam(":user", $user, PDO::PARAM_STR);
      $stmt->execute();
      $count = $stmt->rowCount();
      $rows = $stmt->fetch(PDO::FETCH_ASSOC);
    }
    catch (PDOException $e)
    {
      print 'ERRO' . $e->getMessage();
    }
    return array($rows, $count);
  }
  public function inserirOS($user, $nos, $nome, $email, $coord, $ala, $sala, $telefone, $setor, $arq, $dh, $descr)
  {
    $rows = array();
    $count = 0;
    try
    {
      $sql = "INSERT INTO orderservice (idos, user, nos, nome, email, coord, ala, sala, telefone, setor, arq, datahora, descr) VALUES (NULL, :user, :nos, :nome, :email, :coord, :ala, :sala, :telefone, :setor, :arq, :datahora, :descr)";
      $stmt = $PDO->prepare($sql);

      $stmt->bindParam(':user', $user, PDO::PARAM_STR);
      $stmt->bindParam(':nos', $nos, PDO::PARAM_STR);
      $stmt->bindParam(':nome', $nome, PDO::PARAM_STR);
      $stmt->bindParam(':email', $email, PDO::PARAM_STR);
      $stmt->bindParam(':coord', $coord, PDO::PARAM_STR);
      $stmt->bindParam(':ala', $ala, PDO::PARAM_STR);
      $stmt->bindParam(':sala', $sala, PDO::PARAM_STR);
      $stmt->bindParam(':telefone', $telefone, PDO::PARAM_STR);
      $stmt->bindParam(':setor', $setor, PDO::PARAM_STR);
      $stmt->bindParam(':arq', $arq, PDO::PARAM_STR);
      $stmt->bindParam(':datahora', $dh, PDO::PARAM_STR);
      $stmt->bindParam(':descr', $descr, PDO::PARAM_STR);

      $stmt->execute();

      $result = $stmt->rowCount();
    }
    catch (PDOException $e)
    {
      print 'ERRO' . $e->getMessage();
    }
    return array($rows, $count);
  }

  public function inserirTecnNOVAOS($id, $setor, $dh, $status)
  {
    $rows = array();
    $count = 0;
    try
    {
      $sql = "INSERT INTO tecnico(idtecn, idos, nome, user, setor, datahora, status, laudo) VALUES(NULL, :id, NULL, NULL, :setor, :datahora, :status, NULL)";
      $stmt2 = $this->link->prepare($sql);
      $stmt2->bindParam(':id', $id, PDO::PARAM_INT);
      $stmt2->bindParam(':setor', $setor, PDO::PARAM_STR);
      $stmt2->bindParam(':datahora', $dh, PDO::PARAM_STR);
      $stmt2->bindParam(':status', $status, PDO::PARAM_STR);
      $stmt2->execute();
      $count = $stmt->rowCount();
    }
    catch (PDOException $e)
    {
      print 'ERRO' . $e->getMessage();
    }
    return array($rows, $count);
  }

  public function orderServicePorSetor($setor)
  {
    $rows = array();
    $count = 0;
    try
    {
      $sql = "SELECT os.idos as id, os.nos as nos, os.nome as solicitante, os.descr as descr, os.setor as setor, DATE(os.datahora) as data, TIME(os.datahora) as hora, te.nome as tecnico, te.datahora as dhultima, te.status as status, te.laudo as laudo FROM orderservice os JOIN (SELECT idos, nome, setor, datahora, status, laudo FROM tecnico group by idos desc) te using(idos) where te.setor=:setor";
      $stmt = $this->link->prepare($sql);
      $stmt->bindParam(':setor', $setor, PDO::PARAM_STR);
      $stmt->execute();
      $count = $stmt->rowCount();
      $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    catch (PDOException $e)
    {
      print 'ERRO' . $e->getMessage();
    }
    return array($rows, $count);
  }

  public function orderServicePorSolic($user)
  {
    $row = array();
    $count = 0;
    try
    {
      $sql = "SELECT os.idos as id, os.nos as nos, os.nome as solicitante, os.descr as descr, os.setor as setor, date_format(os.datahora, '%d/%m/%Y') as data, TIME(os.datahora) as hora, te.nome as tecnico, date_format(te.datahora, '%d/%m/%Y') as data_ultima, TIME(te.datahora) as hora_ultima, te.status as status, te.laudo as laudo FROM orderservice os JOIN (SELECT idos, nome, setor, datahora, status, laudo FROM tecnico group by idos desc) te using(idos) where os.user=:user";
      //$sql1 = "SELECT * FROM tecnico as JOIN orderservice as os using "
      $stmt = $this->link->prepare($sql);
      $stmt->bindParam(':user', $user, PDO::PARAM_STR);
      $stmt->execute();
      $count = $stmt->rowCount();
      $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    catch (PDOException $e)
    {
      print 'ERRO' . $e->getMessage();
    }
    return array($rows, $count);
  }

  public function orderServicePorTec($user, $setor)
  {
    $row = array();
    $count = 0;
    try
    {
      $sql = "SELECT os.idos as id, os.nos as nos, os.nome as solicitante, os.descr as descr, os.setor as setor, date_format(os.datahora, '%d/%m/%Y') as data, TIME(os.datahora) as hora, te.nome as tecnico, date_format(te.datahora, '%d/%m/%Y') as data_ultima, TIME(te.datahora) as hora_ultima, te.status as status, te.laudo as laudo FROM orderservice os JOIN (SELECT idos, nome, user, setor, datahora, status, laudo FROM tecnico group by idos desc) te using(idos) WHERE te.user=:user and te.setor=:setor";

      $stmt = $this->link->prepare($sql);
      $stmt->bindParam(":user", $user, PDO::PARAM_STR);
      $stmt->bindParam(":setor", $setor, PDO::PARAM_STR);
      $stmt->execute();
      $count = $stmt->rowCount();
      $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    catch (PDOException $e)
    {
      print 'ERRO' . $e->getMessage();
    }
    return array($rows, $count);
  }
}

?>
