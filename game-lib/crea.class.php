<?php 

function generaPartida()
{
	$memoria = new memoria();
	$memoria->resetMemoria() ;
	$obj = getDefaultObject() ;
	$json = $memoria->grabaMemoria( $obj ) ;
	$memoria->close();
	return $json ;
}