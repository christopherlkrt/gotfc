<?php
include_once 'bd.class.php';
class FamiliaOP extends BD{
  public function __construct() {
    try {
      parent::__construct();


    } catch (PDOException  $e) {
      print $e->getMessage();
    }
  }

  public function inserir(Familia $familia) {
  
    try {
      $stmt = $this->pdo->prepare(
        'INSERT INTO familia (nome, membros) VALUES (?,?)');

      $stmt->bindValue(1, $familia->getNome());
      $stmt->bindValue(2, $familia->getMembros());

      if ($stmt->execute())
      { 	

        echo "inserido";

      }
      else
      {
       echo "Erro ao inserir";
     }

   } catch (PDOException  $e) {
    print $e->getMessage(); }

  }

  public function getFamilias() {
  try {
    $stmt = $this->pdo->query(
      "SELECT * FROM familia" );

    $resultado=$stmt->fetchAll();
    return $resultado;
  }
  catch (PDOException  $e) {
    print $e->getMessage();
  }
}

public function getFamilia($id) {
  try {
    $stmt = $this->pdo->query(
      "SELECT * FROM familia where id = $id" );
    $resultado=$stmt->fetch();
    return $resultado;
  }
  catch (PDOException  $e) {
    print $e->getMessage();
  }
}

  public function update(Familia $familia){
   try{
    $stmt=$this->pdo->prepare('UPDATE familia set nome = ? , membros= ?
      WHERE id= ? ');
    $stmt->bindValue(1, $familia->getNome());
    $stmt->bindValue(2, $familia->getMembros());
    $stmt->bindValue(3, $familia->getId());
    if ($stmt->execute())
    { 	
     echo "Registro Alterado com sucesso";
   }
   else
   {
     echo "Erro ao alterar";
   }
 } catch (PDOException  $e) {
  print $e->getMessage(); }
}


public function deletar($id){
  try{
    $stmt=$this->pdo->prepare("
      DELETE FROM familia WHERE id=$id");
    if ($stmt->execute())
    {   
      echo "Registro exluido com sucesso";
    }
    else
    {
      echo "Erro ao deletar";
    }
  } catch (PDOException  $e) {
   print $e->getMessage(); }
 }

public function qtsGuerras($id) {
  try {
    $stmt = $this->pdo->query(
      "SELECT DISTINCT count(familia.id) as total from familia, guerra where guerra.id_desafiadora=$id or guerra.id_desafiada=$id GROUP by familia.id" );
    $resultado=$stmt->fetch();
    return $resultado;
  }
  catch (PDOException  $e) {
    print $e->getMessage();
  }
}

public function qtsVitorias($id) {
  try {
    $stmt = $this->pdo->query(
      "SELECT DISTINCT count(familia.id) as vitorias from familia, guerra where guerra.id_vencedora=$id GROUP by familia.id" );
    $resultado=$stmt->fetch();
    return $resultado;
  }
  catch (PDOException  $e) {
    print $e->getMessage();
  }
}

public function qtsDerrotas($id) {
  try {
    $stmt = $this->pdo->query(
      "SELECT DISTINCT (SELECT DISTINCT count(familia.id) as total from familia, guerra where guerra.id_desafiadora=$id or guerra.id_desafiada=$id GROUP by familia.id)- IFNULL((SELECT DISTINCT count(familia.id) as vitorias from familia, guerra where guerra.id_vencedora=$id GROUP by familia.id), 0) as derrotas");
    $resultado=$stmt->fetch();
    return $resultado;
  }
  catch (PDOException  $e) {
    print $e->getMessage();
  }
}

 
}


?>

