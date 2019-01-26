<?php

include( 'game-lib/comunes.class.php' ) ;
include( 'game-lib/memoria.class.php' ) ;

$llamada = getTipoLlamada();

switch ( $llamada )
{
	case 'crea' :
		include( 'game-lib/defaultObject.class.php' ) ;
		include( 'game-lib/crea.class.php' ) ;
		$respuesta = generaPartida() ;
		echo $respuesta ;
		die() ;
	break ;
	case 'unirse' :
		include( 'game-lib/defaultObject.class.php' ) ;
		include( 'game-lib/unirse.class.php' ) ;
		$respuesta = unirseAPartida() ;
		echo $respuesta ;
		die() ;
	break ;
	case 'status' :
		include( 'game-lib/status.class.php' ) ;
		$respuesta = getCurrentStatus() ;
		echo $respuesta ;
		die() ;
	break ;
	case 'accion-posicion' :
		include( 'game-lib/acciones.class.php' ) ;
		$objPeticion = getObjetoPeticion() ;
		$respuesta = setPosicion( $objPeticion ) ;
		echo $respuesta ;
		die() ;
	break ;
	case 'accion-coger' :
		include( 'game-lib/acciones.class.php' ) ;
		$objPeticion = getObjetoPeticion() ;
		$respuesta = setCoger( $objPeticion ) ;
		echo $respuesta ;
		die() ;
	break ;
	case 'accion-dejar' :
		include( 'game-lib/acciones.class.php' ) ;
		$objPeticion = getObjetoPeticion() ;
		$respuesta = setDejar( $objPeticion ) ;
		echo $respuesta ;
		die() ;
	break ;
	case 'default' :
	default :
		include( 'game-lib/status.class.php' ) ;
		$respuesta = getCurrentStatus() ;
		echo $respuesta ;
		die() ;
	break ;
}

