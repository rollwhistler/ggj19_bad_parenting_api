<?php 

function unirseAPartida()
{
	$memoria = new memoria();
	$obj = $memoria->leeMemoria() ;
	$obj->elementos++ ;
	$obj->Hijos[] = getDefaultHijo( $obj->elementos ) ;
	$json = $memoria->grabaMemoria( $obj ) ;
	$memoria->close();
	return $json ;
}