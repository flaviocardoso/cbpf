<?
/**
** classe Tecncio
**/
class ClassTecnico
{
  public $idtecn, $idos, $nome, $user, $setor, $datahora, $status, $laudo;

  public function setIdtecn($idtecn)
  {
    $this->idtecn = $idtecn;
  }
  public function setIdos($idos)
  {
    $this->idos = $idos;
  }
  public function setNome($nome)
  {
    $this->nome = $nome;
  }
  public function setUser($user)
  {
    $this->user = $user;
  }
  public function setSetor($setor)
  {
    $this->setor = $setor;
  }
  public function setDatahora($datahora)
  {
    $this->datahora = $datahora;
  }
  public function setStatus($status)
  {
    $this->status = $status;
  }
  public function setLaudo($laudo)
  {
    $this->laudo = $laudo;
  }

  public function getIdtecn()
  {
    return $this->idtecn;
  }
  public function getIdos()
  {
    return $this->idos;
  }
  public function getNome()
  {
    return $this->nome;
  }
  public function getUser()
  {
    return $this->user;
  }
  public function getSetor()
  {
    return $this->setor;
  }
  public function getDatahora()
  {
    return $this->datahora;
  }
  public function getStatus()
  {
    return $this->status;
  }
  public function getLaudo()
  {
    return $this->laudo;
  }
}
?>
