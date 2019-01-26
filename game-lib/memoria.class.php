<?php 

class memoria
{
private $clave ;

public function __construct()
{
	$this->clave = 0xF00 ;
	$this->memo = 4096 ;
}

public function resetMemoria()
{
	$this->shm_id = shmop_open( $this->clave, "c", 0644, $this->memo ) ;
}

public function leeMemoria()
{
	$this->shm_id = shmop_open( $this->clave, "w", 0644, $this->memo ) ;
	$shm_data = shmop_read( $this->shm_id, 0, 0 ) ;
	if( empty( $shm_data ) )
	{
		$objeto = new \stdClass();
	}
	else
	{
		$objeto = json_decode( unserialize( $shm_data ) ) ;
	}
	return $objeto ;
}

public function grabaMemoria( $obj )
{
	$json =  json_encode( $obj ) ;
	$serializado = serialize( $json ) ;
	shmop_write( $this->shm_id, $serializado , 0);
	return $json ;
}

public function close()
{
	shmop_close( $this->shm_id ) ;
}

}