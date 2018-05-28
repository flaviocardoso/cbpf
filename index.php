<?php
    include("conexao.php");

    $title = "Teste PHP";

    $pagina = (isset($_GET['pagina']))? $_GET['pagina'] : 1;
    $sql = "select * from programadores";
    $result = $PDO->query($sql);
    $rows = $result->fetchAll();
    $total = count($rows);
    $registro_nome = 4;
    
    $numPaginas = ceil($total/$registro_nome);
    $inicio = ($registro_nome*$pagina)-$registro_nome;
        
    $sql = "select * from programadores LIMIT $inicio,$registro_nome";
    $result = $PDO->query($sql);
    $rows = $result->fetchAll();
    $total = count($rows);
?>
<html>
<head>
    <title>Teste PHP</title>
    <meta charset="utf-8">   
    
</head>

<body>
    <?php echo "<p>Meu nome é Flávio</p>"; ?>
    <p>
    <?php
        
        //print_r($rows);
        //foreach ($rows as $row){
            //echo utf8_encode("<p>$row[1]<br>Site: $row[2]</p>");
        //}
        $a = 0;
        foreach($rows as $row){
            echo utf8_encode("<p>".$a++.") Nome: $row[1]<br>Site: $row[2]</p>");
        }
        if($pagina > 1){
            echo "<a href='?pagina=".($pagina - 1)."'>&laquo;</a> ";
        }
        for($i=1; $i < $numPaginas; $i++){
            $ativo = ($i == $pagina) ? 'numativo' : '';
            echo "<a href='?pagina=".$i."'> $i </a>";
        }
        if($pagina < $numPaginas){
            echo "<a href='?pagina=".($pagina + 1)."'>&raquo;</a>";
        }
    ?>
    </p>
</body>
</html>
<script>
    function setTitle(n){
        if(n == null){
            document.title = "<?php echo $title; ?>"; // string
        }else{
            document.title = "(" + n + ")" + "<?php echo $title; ?>"; // string
        }
        
    }
    var notes = <?php echo $total; ?>; // integer
    setTitle(notes);    
</script>