<?php

class Guerra {
	private $id;
	private $desafiadora;
	private $desafiada;
	private $inicio;
	private $fim;
	private $vencedora;


	public function setId($id)
	{
		$this->id=$id;
	}

	public function getId()
	{
		return $this->id;
	}

	public function setDesafiadora($desafiadora)
	{
		$this->desafiadora=$desafiadora;
	}

	public function getDesafiadora()
	{
		return $this->desafiadora;
	}

	public function setDesafiada($desafiada)
	{
		$this->desafiada=$desafiada;
	}

	public function getDesafiada()
	{
		return $this->desafiada;
	}

	public function setInicio($inicio)
	{
		$this->inicio=$inicio;
	}

	public function getInicio()
	{
		return $this->inicio;
	}
	public function setFim($fim)
	{
		$this->fim=$fim;
	}

	public function getFim()
	{
		return $this->fim;
	}
	public function setVencedora($vencedora)
	{
		$this->vencedora=$vencedora;
	}

	public function getVencedora()
	{
		return $this->vencedora;
	}
}


?>