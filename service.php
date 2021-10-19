<?php
    
    require_once 'conexion.php';
    require_once 'lib/nusoap.php';

    function insertCelulares( $marca, $modelo )
    {
        try {
            $conexion = new Conexion();
            $consulta = $conexion->prepare( "INSERT INTO especificaciones (Marca,Modelo)
    VALUES (:marca,:modelo) " );
            $consulta->bindParam( ":marca", $marca, PDO::PARAM_STR );
            $consulta->bindParam( ":modelo", $modelo, PDO::PARAM_STR );

            $consulta->execute();
            $ultimoID = $conexion->lastInsertId();
            return join( ",", array( $ultimoID ) );

        } catch ( Exception $e ) {
            return join( ",", array( false ) );

        }
}

$server=new nusoap_server();
$server->configureWSDL("serviceCelular","urn:serviceCelular");

$server->register("insertCelulares",
    array("marca"=>'xsd:string',"modelo"=>"xsd:string"),
    array("return"=>"xsd:string"),
    "urn:serviceCelular",
    "urn:serviceCelular#insertCelulares",
    "rcp",
    "encoded",
    "inserta un dato");

    $post = file_get_contents('php://input');
    $server->service($post);


?>
