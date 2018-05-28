<?php
$s = "";

function setor($area){
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