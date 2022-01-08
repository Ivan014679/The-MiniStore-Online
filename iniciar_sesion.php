<?php
	session_start();

    include ('lib/conexion.php');

    $objConexion = new conexion();
    $objConexion -> abrir_conexion();

    //if(array_key_exists('', array))
    $sql = "SELECT cedula,pass,name_lastname FROM usuarios WHERE cedula='".$_POST['nombredeusu']."'";
    $sentencia = $objConexion -> pdo -> prepare($sql); //prepara la sentencia 
    $sentencia -> execute(); //se ejecuta

    $resultado /*aqui obtenemos todo los datos*/= $sentencia -> fetchall(); /* filtra solo los datos de la tabla*/
    
    $usuario=array();
    $usuario = $resultado[0];
    //obtenemos los datos resultado de la consulta
    if($usuario['pass'] == $_POST['contra']){
        $_SESSION['nombre']=$usuario['name_lastname'];
        header('Location:ventas.php'); //redireccionamiento si es correcto
    }else{
        header('Location:login.php'); // si nell entonces otra vez al login 
    }

	/*if($_POST['nombredeusu']=="admin" && $_POST['contra'] == "admin"){
		$_SESSION['nombre']="daniel madroñero";
		header('Location:ventas.php'); //redireccionamiento si es correcto
	}else{
		header('Location:login.php'); // si nell entonces otra vez al login 
	}*/
?>
