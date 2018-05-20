<?php 
include "../model/guerra.class.php";
include "../model/guerraOP.class.php";
if (isset($_POST['add'])) {

	$desafiadora = $_POST['desafiadora'];
	$desafiada = $_POST['desafiada'];
	$inicio = date('Y-m-d', strtotime($_POST['inicio']));
	$fim = date('Y-m-d', strtotime($_POST['fim']));
	$vencedora = $_POST['vencedora'];


	$guerra = new Guerra();
	$guerra -> setDesafiadora($desafiadora);
	$guerra -> setDesafiada($desafiada);
	$guerra -> setInicio($inicio);
	$guerra -> setFim($fim);
	$guerra -> setVencedora($vencedora);

	$guerraop = new GuerraOP();
	$guerraop -> inserir($guerra);
}
else if (isset($_POST['save'])) {
	print_r($_POST);
	$id = $_POST['save'];
	$desafiadora = $_POST['desafiadora'];
	$desafiada = $_POST['desafiada'];
	$inicio = $_POST['inicio'];
	$fim = $_POST['fim'];
	$vencedora = $_POST['vencedora'];


	$guerra = new Guerra();
	$guerra -> setId($id);
	$guerra -> setDesafiadora($desafiadora);
	$guerra -> setDesafiada($desafiada);
	$guerra -> setInicio($inicio);
	$guerra -> setFim($fim);
	$guerra -> setVencedora($vencedora);

	$guerraop = new GuerraOP();
	$guerraop -> update($guerra);
}
else if (isset($_POST['del'])){
	$id = $_POST['del'];
	$guerraop = new guerraOP();
	$guerraop -> deletar($id);
}

 ?>