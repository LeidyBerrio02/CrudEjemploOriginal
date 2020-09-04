<?php 

class Usuario 
{
	private $id;
	private $nombre;
	private $edad;
	private $email;


	public function __GET($att)
	{
		return $this->$att;
	}

	public function __SET($att, $v)
	{
		$this->$att=$v;
	}
}




?>