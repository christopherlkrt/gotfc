<?php
include_once 'bd.class.php';
class GuerraOP extends BD{
  public function __construct() {
    try {
      parent::__construct();


    } catch (PDOException  $e) {
      print $e->getMessage();
    }
  }

  public function inserir(Guerra $guerra) {
  
    try {
      $stmt = $this->pdo->prepare(
        'INSERT INTO guerra (id_desafiadora, id_desafiada, data_inicio, data_fim, id_vencedora) VALUES (?,?,?,?,?)');

      $stmt->bindValue(1, $guerra->getDesafiadora());
      $stmt->bindValue(2, $guerra->getDesafiada());
      $stmt->bindValue(3, $guerra->getInicio());
      $stmt->bindValue(4, $guerra->getFim());
      $stmt->bindValue(5, $guerra->getVencedora());

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

  public function getGuerras() {
  try {
    $stmt = $this->pdo->query(
      "SELECT * FROM guerra" );
    $resultado=$stmt->fetchAll();
    return $resultado;
  }
  catch (PDOException  $e) {
    print $e->getMessage();
  }
}

  public function getGuerra($id) {
  try {
    $stmt = $this->pdo->query(
      "SELECT * FROM guerra where id=$id" );
    $resultado=$stmt->fetch();
    return $resultado;
  }
  catch (PDOException  $e) {
    print $e->getMessage();
  }
}

  public function update(Guerra $guerra){
   try{
    $stmt=$this->pdo->prepare('UPDATE guerra set id_desafiadora = ? , id_desafiada = ? , data_inicio = ? , data_fim = ? , id_vencedora = ?
      WHERE id= ? ');
    $stmt->bindValue(1, $guerra->getDesafiadora());
    $stmt->bindValue(2, $guerra->getDesafiada());
    $stmt->bindValue(3, $guerra->getInicio());
    $stmt->bindValue(4, $guerra->getFim());
    $stmt->bindValue(5, $guerra->getVencedora());
    $stmt->bindValue(6, $guerra->getId());
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
      DELETE FROM guerra WHERE id= $id");
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

 public function getGuerrasFiltra($inicio, $fim) {
  try {
    $stmt = $this->pdo->query(
      "SELECT * from guerra WHERE data_inicio BETWEEN '$inicio' and '$fim' and data_fim BETWEEN '$inicio' and '$fim'" );
    $resultado=$stmt->fetchAll();
    return $resultado;
  }
  catch (PDOException  $e) {
    print $e->getMessage();
  }
}

 
}


?>

