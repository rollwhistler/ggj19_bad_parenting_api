<?php 

function getCurrentStatus()
{
	$memoria = new memoria();
	$obj = $memoria->leeMemoria() ;
	$memoria->close();
	return json_encode( $obj ) ;
}