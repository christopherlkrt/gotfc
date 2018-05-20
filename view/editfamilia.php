<?php 
include "../model/familiaOP.class.php";
$id = $_POST['editar'];
$familiaop = new FamiliaOP();
$familia = $familiaop -> getFamilia($id);

 ?>

<div class="tamanho">
  <div class="caixabranca">
    <form method="post" id="formulario" name="formulario">
      <div class="input-group form-group">
        <label for="nome">Nome</label>
        <input type="text" class="form-control" id="nome" name="nome" value="<?=$familia['nome']?>" required>
        </div>
        <div class="input-group form-group"
        <label for="membros">Membros</label>
        <input type="number" class="form-control" id="membros" name="membros"  value="<?=$familia['membros']?>" required>
      </div>
      <input type="hidden" id="save" name="save" value="<?=$id?>">
      <input type="submit" class="btn btn-default" value="Salvar">
    </form>
  </div>
</div>
<script>

  $( "#formulario" ).on( "submit", function( event ) {
   event.preventDefault();
   var formdata = new FormData(this);

   var link = "../controller/familia.php";
   $.ajax({
    type: 'POST',
    url: link,
    data: formdata ,
    processData: false,
    contentType: false
  }).done(function () {
    $("#conteudo").load("familia.php");
  });

});


</script>