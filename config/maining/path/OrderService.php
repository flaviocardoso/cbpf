<?
/**
**classe OrderService
**/
class ClassOS
{
  public $idos, $user, $nos, $nome, $email, $coord, $ala, $sala, $telefone, $setor, $arq_name, $arq, $arq_type, $datahora, $descr;

  public function setIdos($idos)
  {
    $this->idos = $idos;
  }
  public function setUser($user)
  {
    $this->user = $user;
  }
  public function setNos($nos)
  {
    $this->nos = $nos;
  }
  public function setNome($nome)
  {
    $this->nome = $nome;
  }
  public function setEmail($email)
  {
    $this->email = $email;
  }
  public function setCoord($coord)
  {
    $this->coord = $coord;
  }
  public function setAla($ala)
  {
    $this->ala = $ala;
  }
  public function setSala($sala)
  {
    $this->sala = $sala;
  }
  public function setTelefone($telefone)
  {
    $this->telefone = $telefone;
  }
  public function setArq_name($arq_name)
  {
    $this->arq_name = $arq_name;
  }
  public function setArq($arq)
  {
    $this->arq = $arq;
  }
  public function setArq_type($arq_type)
  {
    $this->arq_type = $arq_type;
  }
  public function setDatahora($datahora)
  {
    $this->datahora = $datahora;
  }
  public function setDescr($descr)
  {
    $this->descr = $descr;
  }

  public function getIdos()
  {
    return $this->idos;
  }
  public function getUser()
  {
    return $this->user;
  }
  public function getNos()
  {
    return $this->nos;
  }
  public function getNome()
  {
    return $this->nome;
  }
  public function getEmail()
  {
    return $this->email;
  }
  public function getCoord()
  {
    return $this->coord;
  }
  public function getAla()
  {
    return $this->ala;
  }
  public function getSala()
  {
    return $this->sala;
  }
  public function getTelefone()
  {
    return $this->telefone;
  }
  public function getArq_name()
  {
    return $this->arq_name;
  }
  public function getArq()
  {
    return $this->arq;
  }
  public function getArq_type()
  {
    return $this->arq_type;
  }
  public function getDatahora()
  {
    return $this->datahora;
  }
  public function getDescr()
  {
    return $this->descr;
  }
}

?>
