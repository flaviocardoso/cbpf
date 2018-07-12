<?php
//require 'OrderService.php';

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
  public function orderServicePorNOS($OS)
  {
    $rows = array();
    $count = 0;
    try
    {
      $sql = "SELECT idos FROM orderservice WHERE nos=:nos";
      $stmt = $this->link->prepare($sql);
      $stmt->bindParam(':nos', $OS->nos, PDO::PARAM_STR);
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
      $sql_user = "SELECT nome, user, email, setor, senha, coord, nivel FROM usuario where user=:user";
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
          //não aceitar se estiver vázios os campos abaixo -> enviar para cadastramento de usuário
          if($row['setor'] == "" || $row['nivel'] == "" || $row['email'] == "" || $row['coord'] == "")
          {
            $flag = "CADASTRAR";
          }
          else
          {
            $_SESSION['setor'] = $row['setor'];
            $_SESSION['nivel'] = $row['nivel'];
            $_SESSION['ativo'] = $row['ativo'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['coord'] = $row['coord'];
            $flag = "OK";
          }
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
/**
* verifica cada coordenação
**/
  public function orderServicePorCoord($OS, $CON = NULL)
  {
    $rows = array();
    $count = 0;
    try{
      $sql = "SELECT os.idos as id, os.nos as nos, os.nome as solicitante, os.descr as descr,";
      $sql .= " os.setor as setor, date_format(os.datahora, '%d/%m/%Y') as data, TIME(os.datahora)";
      $sql .= " as hora, os.arq_name as arqnome, os.arq as arquivo, os.arq_type as arqtype, te.nome as tecnico,";
      $sql .= " date_format(te.datahora, '%d/%m/%Y') as data_ultima, TIME(te.datahora) as hora_ultima, te.status as status,";
      $sql .= " te.laudo as laudo FROM orderservice os JOIN (SELECT idos, nome, user, setor, datahora, status, laudo";
      $sql .= " FROM tecnico group by idos desc) te using(idos) WHERE os.coord=:coord";

      if(!empty($CON->anoinicial))
      {
        $sql .= " AND YEAR(os.datahora)=:anoinicial";
      }
      if(!empty($CON->mesinicial))
      {
        $sql .= " AND MONTH(os.datahora)=:mesinicial";
      }
      if(!empty($CON->diainicial))
      {
        $sql .= " AND DAY(os.datahora)=:diainicial";
      }

      $stmt = $this->link->prepare($sql);
      $stmt->bindParam(":coord", $OS->coord, PDO::PARAM_STR);

      if(isset($CON->anoinicial))
      {
        $stmt->bindParam(":anoinicial", $CON->anoinicial, PDO::PARAM_INT);
      }
      if(isset($CON->mesinicial))
      {
        $stmt->bindParam(":mesinicial", $CON->mesinicial, PDO::PARAM_INT);
      }
      if(isset($CON->diainicial))
      {
        $stmt->bindParam(":diainicial", $CON->diainicial, PDO::PARAM_INT);
      }

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
  public function inserirOS($OS)
  {
    $rows = array();
    $count = 0;
    try
    {
      $sql = "INSERT INTO orderservice (idos, user, nos, nome, email, coord, ala, sala, telefone, setor, arq_name, arq, arq_type, datahora, descr) VALUES (NULL, :user, :nos, :nome, :email, :coord, :ala, :sala, :telefone, :setor, :arqname, :arq, :arqtype, :datahora, :descr)";
      $stmt = $this->link->prepare($sql);

      $stmt->bindParam(':user', $OS->user, PDO::PARAM_STR);
      $stmt->bindParam(':nos', $OS->nos, PDO::PARAM_STR);
      $stmt->bindParam(':nome', $OS->nome, PDO::PARAM_STR);
      $stmt->bindParam(':email', $OS->email, PDO::PARAM_STR);
      $stmt->bindParam(':coord', $OS->coord, PDO::PARAM_STR);
      $stmt->bindParam(':ala', $OS->ala, PDO::PARAM_STR);
      $stmt->bindParam(':sala', $OS->sala, PDO::PARAM_STR);
      $stmt->bindParam(':telefone', $OS->telefone, PDO::PARAM_STR);
      $stmt->bindParam(':setor', $OS->setor, PDO::PARAM_STR);
      $stmt->bindParam(':arqname', $OS->arq_name, PDO::PARAM_STR);
      $stmt->bindParam(':arq', $OS->arq, PDO::PARAM_STR);
      $stmt->bindParam(':arqtype', $OS->arq_type, PDO::PARAM_STR);
      $stmt->bindParam(':datahora', $OS->dh, PDO::PARAM_STR);
      $stmt->bindParam(':descr', $OS->descr, PDO::PARAM_STR);

      $stmt->execute();

      $count = $stmt->rowCount();
    }
    catch (PDOException $e)
    {
      print 'ERRO' . $e->getMessage();
    }
    return array($rows, $count);
  }

  public function inserirTecnNOVAOS($Tec)
  {
    $rows = array();
    $count = 0;
    try
    {
      $sql = "INSERT INTO tecnico(idtecn, idos, nome, user, setor, datahora, status, laudo) VALUES(NULL, :id, NULL, NULL, :setor, :datahora, :status, NULL)";
      $stmt = $this->link->prepare($sql);
      $stmt->bindParam(':id', $Tec->id, PDO::PARAM_INT);
      $stmt->bindParam(':setor', $Tec->setor, PDO::PARAM_STR);
      $stmt->bindParam(':datahora', $Tec->dh, PDO::PARAM_STR);
      $stmt->bindParam(':status', $Tec->status, PDO::PARAM_STR);
      $stmt->execute();
      $count = $stmt->rowCount();
    }
    catch (PDOException $e)
    {
      print 'ERRO' . $e->getMessage();
    }
    return array($rows, $count);
  }

  public function orderServicePorSetor($OS)
  {
    $rows = array();
    $count = 0;
    try
    {
      $sql = "SELECT os.idos as id, os.nos as nos, os.nome as solicitante, os.descr as descr, os.setor as setor, date_format(os.datahora, '%d/%m/%Y') as data, TIME(os.datahora) as hora, os.arq_name as arqnome, os.arq as arquivo, os.arq_type as arqtype, te.nome as tecnico, date_format(te.datahora, '%d/%m/%Y') as data_ultima, TIME(te.datahora) as hora_ultima, te.status as status, te.laudo as laudo FROM orderservice os JOIN (SELECT idos, nome, setor, datahora, status, laudo FROM tecnico group by idos desc) te using(idos) where te.setor=:setor";
      $stmt = $this->link->prepare($sql);
      $stmt->bindParam(':setor', $OS->setor, PDO::PARAM_STR);
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

  public function orderServicePorSolic($OS)
  {
    $row = array();
    $count = 0;
    try
    {
      $sql = "SELECT os.idos as id, os.nos as nos, os.nome as solicitante, os.descr as descr, os.setor as setor, date_format(os.datahora, '%d/%m/%Y') as data, TIME(os.datahora) as hora,  os.arq_name as arqnome, os.arq as arquivo, os.arq_type as arqtype, te.nome as tecnico, date_format(te.datahora, '%d/%m/%Y') as data_ultima, TIME(te.datahora) as hora_ultima, te.status as status, te.laudo as laudo FROM orderservice os JOIN (SELECT idos, nome, setor, datahora, status, laudo FROM tecnico group by idos desc) te using(idos) where os.user=:user";
      //$sql1 = "SELECT * FROM tecnico as JOIN orderservice as os using "
      $stmt = $this->link->prepare($sql);
      $stmt->bindParam(':user', $OS->user, PDO::PARAM_STR);
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

  public function orderServicePorTec($OS)
  {
    $row = array();
    $count = 0;
    try
    {
      $sql = "SELECT os.idos as id, os.nos as nos, os.nome as solicitante, os.descr as descr, os.setor as setor, date_format(os.datahora, '%d/%m/%Y') as data, TIME(os.datahora) as hora, os.arq_name as arqnome, os.arq as arquivo, os.arq_type as arqtype, te.nome as tecnico, date_format(te.datahora, '%d/%m/%Y') as data_ultima, TIME(te.datahora) as hora_ultima, te.status as status, te.laudo as laudo FROM orderservice os JOIN (SELECT idos, nome, user, setor, datahora, status, laudo FROM tecnico group by idos desc) te using(idos) WHERE te.user=:user and te.setor=:setor";

      $stmt = $this->link->prepare($sql);
      $stmt->bindParam(":user", $OS->user, PDO::PARAM_STR);
      $stmt->bindParam(":setor", $OS->setor, PDO::PARAM_STR);
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

  public function orderServicePorID($id)
  {
    $row = array();
    $count = 0;
    try
    {
      $sql = "SELECT idos as id, user, nos, nome as solicitante, descr, setor, date_format(datahora, '%d/%m/%Y') as data, TIME(datahora) as hora FROM orderservice WHERE idos=:id";
      $stmt = $this->link->prepare($sql);
      $stmt->bindParam(":id", $id, PDO::PARAM_INT);
      $stmt->execute();
      $rows = $stmt->fetch(PDO::FETCH_ASSOC);
      $count = $stmt->rowCount();
    }
    catch (PDOException $e)
    {
      print 'ERRO' . $e->getMessage();
    }
    return array($rows, $count);
  }

  public function buscaUser($user)
  {
    $row = array();
    $count = 0;
    try
    {
      $sql = "SELECT nome, email, telefone, sala, coord, ala FROM usuario WHERE user=:user";
      $stmt = $this->link->prepare($sql);
      $stmt->bindParam(":user", $user, PDO::PARAM_STR);
      $stmt->execute();
      $rows = $stmt->fetch(PDO::FETCH_ASSOC);
      $count = $stmt->rowCount();
    }
    catch (PDOException $e)
    {
      print 'ERRO' . $e->getMessage();
    }
    return array($rows, $count);
  }

  public function buscaTecnLaudoPorID($id)
  {
    $row = array();
    $count = 0;
    try
    {
      $sql = "SELECT nome, datahora, status, laudo FROM tecnico WHERE idos=:id order by datahora desc";
      $stmt = $this->link->prepare($sql);
      $stmt->bindParam(":id", $id, PDO::PARAM_INT);
      $stmt->execute();
      $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
      $count = $stmt->rowCount();
    }
    catch (PDOException $e)
    {
      print 'ERRO' . $e->getMessage();
    }

    return array($rows, $count);
  }

  public function orderServiceUserPorID($id)
  {
    $rows = array();
    $count = 0;
    try
    {
      $sql = "SELECT os.nos as nos, os.descr as descr, os.setor as setor, os.arq as arquivo, os.arq_name as arqnome, date_format(os.datahora, '%d/%m/%Y') as data, TIME(os.datahora) as hora, us.nome as nome, us.email as email, us.telefone as telefone, us.sala as sala, us.coord as coord, us.ala as ala FROM orderservice os INNER JOIN (SELECT user, nome, email, telefone, sala, coord, ala FROM usuario) us USING(user) WHERE os.idos=:id";
      $stmt = $this->link->prepare($sql);
      $stmt->bindParam(":id", $id, PDO::PARAM_INT);
      $stmt->execute();
      $rows = $stmt->fetch(PDO::FETCH_ASSOC);
      $count = $stmt->rowCount();
    }
    catch (PDOException $e)
    {
      print 'ERRO' . $e->getMessage();
    }
    return array($rows, $count);
  }

  public function buscaArquivoPorID($id)
  {
    $rows = array();
    $count = 0;
    try
    {
      $sql = "SELECT arq_name as arqname, arq as arquivo, arq_type as arqtype FROM orderservice WHERE idos=:id";
      $stmt = $this->link->prepare($sql);
      $stmt->bindParam(":id", $id, PDO::PARAM_INT);
      $stmt->execute();
      $rows = $stmt->fetch(PDO::FETCH_ASSOC);
      $count = $stmt->rowCount();
    }
    catch (PDOException $e)
    {
      print 'ERRO' . $e->getMessage();
    }
    return array($rows, $count);
  }

  public function inserirTecnAltOS($Tec)
  {
    $dt = new DateTime("now", new DateTimeZone('America/Sao_Paulo'));
    $dh = $dt->format('Y-m-d H:i:s');
    $rows = array();
    $count = 0;
    try
    {
      $sql = "INSERT INTO tecnico(idtecn, idos, nome, user, setor, datahora, status, laudo) VALUES(NULL, :idos, :nome, :user, :setor, :datahora, :status, :laudo)";
      $stmt = $this->link->prepare($sql);
      $stmt->bindParam(":idos", $Tec->idos, PDO::PARAM_INT);
      $stmt->bindParam(":nome", $Tec->nome, PDO::PARAM_STR);
      $stmt->bindParam(":user", $Tec->user, PDO::PARAM_STR);
      $stmt->bindParam(":setor", $Tec->setor, PDO::PARAM_STR);
      $stmt->bindParam(":datahora", $dh, PDO::PARAM_STR);
      $stmt->bindParam(":status", $Tec->status, PDO::PARAM_STR);
      $stmt->bindParam(":laudo", $Tec->laudo, PDO::PARAM_STR);
      $stmt->execute();
      $rows = $stmt->fetch(PDO::FETCH_ASSOC);
      $count = $stmt->rowCount();
    }
    catch (PDOException $e)
    {
      print 'ERRO' . $e->getMessage();
    }
    return array($rows, $count);
  }


}
?>
