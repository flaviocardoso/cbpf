<?php
function setor($area){
    $s = "";

    switch($area){
        case "comp":
            $s = "Computação";
            break;
        case "elet":
            $s = "Eletrônica";
            break;
        case "meca":
            $s = "Mecânica";
            break;
        case "marc":
            $s = "Marcenaria";
            break;
        case "vidr":
            $s = "Vidro";
            break;
        case "webi":
            $s = "Web Institucional";
            break;
        case "segu":
            $s = "Segurança da Rede";
            break;
    }

    return $s;
}
function setor_data($area){
  $s = "";

  switch($area){
      case "Computação":
          $s = "comp";
          break;
      case "Eletrônica":
          $s = "elet";
          break;
      case "Mecânica":
          $s = "meca";
          break;
      case "Marcenaria":
          $s = "marc";
          break;
      case "Vidro":
          $s = "vidr";
          break;
      case "Web Institucional":
          $s = "webi";
          break;
      case "Segurança da Rede":
          $s = "segu";
          break;
  }

  return $s;
}

function entrada($data){
    $data = trim($data);
    $data = stripcslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function nivel($p){
    $r = "";
    switch($p) {
      case 3:
        $r = "USUARIO";
        break;

      case 2:
        $r = "DESENVOLVEDOR";
        break;
      case 1:
        $r = "ADMINSTRADOR";
        break;
    }
    return $r;
}
