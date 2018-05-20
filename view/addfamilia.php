<div class="tamanho">
  <div class="caixabranca">
    <form method="post" id="formulario" name="formulario">
      <div class="input-group form-group">
        <label for="nome">Nome</label>
        <input type="text" class="form-control" id="nome" name="nome" required>
        </div>
        <div class="input-group form-group"
        <label for="membros">Membros</label>
        <input type="number" class="form-control" id="membros" name="membros" required>
      </div>
      <input type="hidden" id="ingadd" name="add" value="add">
      <input type="submit" class="btn btn-default" value="Adicionar">
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