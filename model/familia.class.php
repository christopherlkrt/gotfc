<?php

class Familia {
	private $id;
	private $nome;
	private $membros;

public function setNome($nome)
	{
		$this->nome=$nome;
	}

public function getNome()
	{
		return $this->nome;
	}


public function setId($id)
	{
		$this->id=$id;
	}

public function getId()
	{
		return $this->id;
	}

	public function setMembros($membros)
	{
		$this->membros=$membros;
	}

public function getMembros()
	{
		return $this->membros;
	}

}


?>