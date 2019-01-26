<?php 

function getDefaultObject()
{
	$objeto = new stdClass() ;
	
	$objeto->Padre = getDefaultPadre() ;
	$objeto->Hijos = array() ;
	$objeto->elementos = 1;
	
	return $objeto ;
}

function getDefaultPadre()
{
	$objetoP = new stdClass() ;
	
	$objetoP->ID = 1 ;
	$objetoP->Transform = array(
		'X' => 0 ,
		'Y' => 0 ,
		'Z' => 0 ,
	);
	
	return $objetoP ;
}

function getDefaultHijo( $id )
{
	$objetoH = new stdClass() ;
	
	$objetoH->ID = $id ;
	$objetoH->Transform = array(
		'X' => 0 ,
		'Y' => 0 ,
		'Z' => 0 ,
	);
	$objetoH->Movil = true ;
	$objetoH->Animacion = '' ;
	
	return $objetoH ;
}

