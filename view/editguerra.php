<?php 
include "../model/familiaOP.class.php";
include "../model/guerraOP.class.php";

$id = $_POST['edit'];
$familiaop = new FamiliaOP();
$familias = $familiaop -> getFamilias();
$linhas=sizeof($familias);
$guerraop = new GuerraOP();
$guerra = $guerraop -> getGuerra($id);
 ?>
<div class="tamanho">
  <div class="caixabranca">
    <form method="post" id="formulario" name="formulario">
      <div class="form-group">
        <label for="desafiadora">Familia Desafiadora</label>
        <select class="form-control" id="desafiadora" name="desafiadora" required>
          <?php $desafiadora = $familiaop -> getFamilia($guerra['id_desafiadora']); ?>
          <option selected value="<?=$desafiadora['id']?>"><?=$desafiadora['nome']?></option>
          <?php for ($i=0; $i < $linhas; $i++) { 
           ?>
           <option value="<?=$familias[$i]['id']?>"><?=$familias[$i]['nome']?></option>
           <?php } ?>
         </select>
          </div> 
        <div class="form-group">
        <label for="desafiada">Familia Desafiada</label>
        <select class="form-control" id="desafiada" name="desafiada" required>
          <?php $desafiada = $familiaop -> getFamilia($guerra['id_desafiada']); ?>
          <option selected value="<?=$desafiada['id']?>"><?=$desafiada['nome']?></option>
           <?php for ($i=0; $i < $linhas; $i++) { 
           ?>
           <option value="<?=$familias[$i]['id']?>"><?=$familias[$i]['nome']?></option>
           <?php } ?>
           </select>
      </div>


      <div class="form-group">
        <label for="inicio">Data Inicial</label>
        <input type="date" id="inicio" class="form-control" id="inicio" name="inicio" value="<?=$guerra['data_inicio']?>">
      </div>

        <div class="form-group">
        <label for="fim">Data Final</label>
        <input type="date" class="form-control" id="fim" name="fim" value="<?=$guerra['data_fim']?>">
      </div>


      <div class="form-group">
        <label for="vencedora">Familia Vencedora</label>
        <select class="form-control" id="vencedora" name="vencedora" required>
          <?php $vencedora = $familiaop -> getFamilia($guerra['id_vencedora']); ?>
          <option selected value="<?=$vencedora['id']?>"><?=$vencedora['nome']?></option>
           <?php for ($i=0; $i < $linhas; $i++) { 
           ?>
           <option value="<?=$familias[$i]['id']?>"><?=$familias[$i]['nome']?></option>
           <?php } ?>
           </select>
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