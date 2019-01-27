<?php

function getTipoLlamada()
{
	if( !isset( $_GET[ 'call' ] ) )
	{
		die( 'Tipo de llamada no definida' ) ;
	}
	
	$llamadasValidas = array(
		'default' ,
		'crea' ,
		'unirse' ,
		'status' ,
		'accion-posicion' ,
		'accion-coger' ,
		'accion-dejar' ,
	);
	
	if( !in_array( $_GET[ 'call' ] , $llamadasValidas ) )
	{
		die( 'Tipo de llamada no válida' ) ;
	}
	
	return $_GET[ 'call' ] ;
}

function getObjetoPeticion()
{
	$peticion = file_get_contents('php://input') ;

	if ( empty( $peticion ) )
	{
		die( 'Petición no válida' ) ;
	}

	$peticion = urldecode( $peticion ) ;

	$obj_peticion = json_decode( $peticion ) ;

	$last_json_error = json_last_error() ;

	if ( $last_json_error > 0 )
	{
		guardaLog( 'json_error: ' . $last_json_error . ' -> ' . $peticion ) ; 
		die( 'json_error: ' . $last_json_error ) ;
	}
	
	return $obj_peticion ;

}

function guardaLog( $txt )
{
	$f = fopen( 'log.log' , 'a' ) ;
	$linea = date( "Y-m-d H:i:s" ) . ' ' . $txt . '
' ;
	fputs( $f , $linea ) ;
	fclose( $f ) ;
}