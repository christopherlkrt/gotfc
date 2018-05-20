<?php 
include "../model/familia.class.php";
include "../model/familiaOP.class.php";
if (isset($_POST['add'])) {
	$nome = $_POST['nome'];
	$membros = $_POST['membros'];

	$familia = new Familia();
	$familia -> setNome($nome);
	$familia -> setMembros($membros);

	$familiaop = new FamiliaOP();
	$familiaop -> inserir($familia);
}
else if (isset($_POST['save'])) {
	$id = $_POST['save'];
	$nome = $_POST['nome'];
	$membros = $_POST['membros'];

	$familia = new Familia();
	$familia -> setId($id);
	$familia -> setNome($nome);
	$familia -> setMembros($membros);

	$familiaop = new FamiliaOP();
	$familiaop -> update($familia);
}
else if (isset($_POST['del'])){
	$id = $_POST['del'];
	$familiaop = new FamiliaOP();
	$familiaop -> deletar($id);
}

 ?>