<?php
    require_once("config.php");
/* 
    $dao = new Dao();

    $usuarios =  $dao->select ("select * from tb_usuarios");

    echo json_encode($usuarios); */
    $usu = new Usuario();
    $usu->loadById(1);
    echo $usu;

?>