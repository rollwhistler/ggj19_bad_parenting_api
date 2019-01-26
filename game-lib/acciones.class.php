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

function setPosicion( $objPeticion )
{
	if( !empty( $objPeticion->ID ) 
		&& isset( $objPeticion->Transform ) )
	{echo 2;
		if( $objPeticion->ID == 1 )
		{
			$memoria = new memoria();
			$obj = $memoria->leeMemoria() ;
			$obj->Padre->Transform = $objPeticion->Transform ;
			$json = $memoria->grabaMemoria( $obj ) ;
			$memoria->close();
			return $json ;
		}
		else
		{
			$memoria = new memoria();
			$obj = $memoria->leeMemoria() ;
			foreach( $obj->Hijos as $key => $value )
			{
				if( $value->ID == $objPeticion->ID )
				{
					$obj->Hijos[ $key ]->Transform = $objPeticion->Transform ;
					if( isset( $objPeticion->Animacion ) )
					{
						$obj->Hijos[ $key ]->Animacion = $objPeticion->Animacion ;
					}
				}
			}
			$json = $memoria->grabaMemoria( $obj ) ;
			$memoria->close();
			return $json ;
		}
	}
	else
	{
		return retornaStatus() ;
	}
}

function setCoger( $objPeticion )
{
	if( !empty( $objPeticion->ID ) )
	{
		$memoria = new memoria();
		$obj = $memoria->leeMemoria() ;
		foreach( $obj->Hijos as $key => $value )
		{
			if( $value->ID == $objPeticion->ID )
			{
				$obj->Hijos[ $key ]->Movil = false ;
			}
		}
		$json = $memoria->grabaMemoria( $obj ) ;
		$memoria->close();
		return $json ;
	}
	else
	{
		return retornaStatus() ;
	}
}

function setDejar( $objPeticion )
{
	if( !empty( $objPeticion->ID ) )
	{
		$memoria = new memoria();
		$obj = $memoria->leeMemoria() ;
		foreach( $obj->Hijos as $key => $value )
		{
			if( $value->ID == $objPeticion->ID )
			{
				$obj->Hijos[ $key ]->Movil = true ;
			}
		}
		$json = $memoria->grabaMemoria( $obj ) ;
		$memoria->close();
		return $json ;
	}
	else
	{
		return retornaStatus() ;
	}
}

function retornaStatus()
{
	$memoria = new memoria();
	$obj = $memoria->leeMemoria() ;
	$memoria->close();
	return json_encode( $obj ) ;
}