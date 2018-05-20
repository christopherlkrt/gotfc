<?php 
include "../model/familiaOP.class.php";
$familiaop = new FamiliaOP();
$familias = $familiaop -> getFamilias();
$linhas=sizeof($familias);
 ?>
<div class="tamanho">
  <div class="caixabranca">
    <form method="post" id="formulario" name="formulario">
      <div class="form-group">
        <label for="desafiadora">Familia Desafiadora</label>
        <select class="form-control" id="desafiadora" name="desafiadora" required>
          <option selected>Escolha uma Familia</option>
          <?php for ($i=0; $i < $linhas; $i++) { 
           ?>
           <option value="<?=$familias[$i]['id']?>"><?=$familias[$i]['nome']?></option>
           <?php } ?>
         </select>
          </div> 
        <div class="form-group">
        <label for="desafiada">Familia Desafiada</label>
        <select class="form-control" id="desafiada" name="desafiada" required>
          <option selected>Escolha uma Familia</option>
           <?php for ($i=0; $i < $linhas; $i++) { 
           ?>
           <option value="<?=$familias[$i]['id']?>"><?=$familias[$i]['nome']?></option>
           <?php } ?>
           </select>
      </div>


      <div class="form-group">
        <label for="inicio">Data Inicial</label>
        <input type="date" id="inicio" class="form-control" id="inicio" name="inicio">
      </div>

        <div class="form-group">
        <label for="fim">Data Final</label>
        <input type="date" class="form-control" id="fim" name="fim">
      </div>


      <div class="form-group">
        <label for="vencedora">Familia Vencedora</label>
        <select class="form-control" id="vencedora" name="vencedora" required>
          <option selected>Escolha uma Familia</option>
           <?php for ($i=0; $i < $linhas; $i++) { 
           ?>
           <option value="<?=$familias[$i]['id']?>"><?=$familias[$i]['nome']?></option>
           <?php } ?>
           </select>
      </div>
      <input type="hidden" id="add" name="add" value="add">
      <input type="submit" class="btn btn-default" value="Adicionar">
    </form>
  </div>
</div>
<script>

  $( "#formulario" ).on( "submit", function( event ) {
   event.preventDefault();
   var formdata = new FormData(this);

   var link = "../controller/guerra.php";
   $.ajax({
    type: 'POST',
    url: link,
    data: formdata ,
    processData: false,
    contentType: false
  }).done(function () {
    $("#conteudo").load("guerra.php");
  });

});


</script>