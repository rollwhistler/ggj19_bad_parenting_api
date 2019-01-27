<?php 

function unirseAPartida()
{
	guardaLog( 'Inicio - nuevo hijo : ' . microtime() ) ;
	$memoria = new memoria();
	$obj = $memoria->leeMemoria() ;
	$obj->elementos++ ;
	$obj->Hijos[] = getDefaultHijo( $obj->elementos ) ;
	$json = $memoria->grabaMemoria( $obj ) ;
	$memoria->close();
	guardaLog( 'Fin - nuevo hijo : ' . microtime() ) ;
	return $json ;
}