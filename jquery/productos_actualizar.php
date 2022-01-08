<?php
    include("../lib/conexion.php");
    $objConexion = new conexion();
    $objConexion -> abrir_conexion();

    $cod_producto = $_POST['cod_producto'];
    $campo = $_POST['campo'];
    $columna = $_POST['columna'];

    if($columna == "name_provider"){
        include("../lib/proveedores_ad.php");
        
        $objProveedoresAd= new proveedores_ad();
        $cod_proveedor = $objProveedoresAd -> searchProvider($objConexion -> pdo, $campo);
        $campo = $cod_proveedor;
    }
    $sql="update productos set ".$columna."=? where cod_product=?";
    $sentencia = $objConexion -> pdo -> prepare($sql);
    $sentencia -> execute (array($campo, $cod_producto));
?>