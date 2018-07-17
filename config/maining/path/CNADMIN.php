<?

class CNADMIN
{
  protected $link;
  private $HOST, $USER, $PW, $BD;

  public function CNADMIN()
  {
    $this->HOST = "localhost";
    $this->USER  = "root";
    $this->PW = "";
    $this->BD = "admin";
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
}
?>
