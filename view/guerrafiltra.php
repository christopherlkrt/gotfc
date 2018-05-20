<?php
include "../model/guerraOP.class.php";
include "../model/familiaOP.class.php";
$inicio = $_POST['inicio'];
$fim = $_POST['fim'];
$guerraop = new GuerraOP();
$guerras = $guerraop->getGuerrasFiltra($inicio, $fim);
$linhas = sizeof($guerras);

?>
<div class="tamanho">
  <div class="box caixabranca">
    <div class="box-header">
      <h3 class="box-title">Guerras</h3>
      <form class="form-inline" method="post" id="formulario" name="formulario">
          <div class="form-group">
            <label for="inicio">Data Inicial</label>
            <input type="date" id="inicio" class="form-control" id="inicio" name="inicio">
          </div>

          <div class="form-group">
            <label for="fim">Data Final</label>
            <input type="date" class="form-control" id="fim" name="fim">
          </div>

          <input type="hidden" name="filtrar" value="filtrar">
          <input type="submit" class="btn btn-primary" value="Filtrar">
        </form>
    </div>
    <table class="table table-responsive table-hover">
      <thead>
        <tr>
          <th>Desafiadora</th>
          <th>Desafiada</th>
          <th>Início</th>
          <th>Fim</th>
          <th>Vencedora</th>
          <th>Ações</th>
        </tr>
      </thead>
      <tbody>
        <?php
        for ($i=0; $i < $linhas; $i++) { 
          $familiaop = new FamiliaOP();
          $desafiadora = $familiaop -> getFamilia($guerras[$i]['id_desafiadora']); 
          $desafiada = $familiaop -> getFamilia($guerras[$i]['id_desafiada']);
          $vencedora = $familiaop -> getFamilia($guerras[$i]['id_vencedora']);

          ?>
          <tr>
            <td><?=$desafiadora['nome']?></td>
            <td><?=$desafiada['nome']?></td>
            <td><?=date('d/m/Y', strtotime($guerras[$i]['data_inicio']))?></td>
            <td><?=date('d/m/Y', strtotime($guerras[$i]['data_fim']))?></td>
            <td><?=$vencedora['nome']?></td>
            <td id="<?=$guerras[$i]['id']?>" name="<?=$guerras[$i]['id']?>"><button class="btn btn-info" id="edit">Editar</button><button class="btn btn-danger" id="del">Deletar</button></td>
          </tr>
          <?php }
          ?>
        </tbody>
        <tfoot>
        </tfoot>
      </table>
      <button class="btn btn-success" id="add">Adicionar guerra</button>
    </div>
  </div>
  <script>
    $(document).ready(function() {
      $('table').dataTable({
        'paging'      : true,
        'lengthChange': true,
        'searching'   : false,
        'ordering'    : true,
        'info'        : true,
        'autoWidth'   : false,
        language:{
          "sEmptyTable": "Nenhum registro encontrado",
          "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
          "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
          "sInfoFiltered": "(Filtrados de _MAX_ registros)",
          "sInfoPostFix": "",
          "sInfoThousands": ".",
          "sLengthMenu": "_MENU_ resultados por página",
          "sLoadingRecords": "Carregando...",
          "sProcessing": "Processando...",
          "sZeroRecords": "Nenhum registro encontrado",
          "sSearch": "Pesquisar",
          "oPaginate": {
            "sNext": "Próximo",
            "sPrevious": "Anterior",
            "sFirst": "Primeiro",
            "sLast": "Último"
          },
          "oAria": {
            "sSortAscending": ": Ordenar colunas de forma ascendente",
            "sSortDescending": ": Ordenar colunas de forma descendente"
          }
        },
        "lengthMenu": [[6, 12, 24, -1], [6, 12, 24, "All"]]
      });


      $("#add").click(function(e){
        e.preventDefault();
        $("#conteudo").load("addguerra.php");
      });

      $('.table').on("click","#edit",function(e) {
        e.preventDefault();

        var edit = $(this).parent('td').attr('name');
        $.post("editguerra.php",
        {
          edit: edit

        }).done(function(data) {

          $("#conteudo").html(data)
        });

      });

      $('.table').on("click","#del",function(e) {
        e.preventDefault();

        var del = $(this).parent('td').attr('name');
        $.post("../controller/guerra.php",
        {
          del: del

        }).done(function(data) {

          $("#conteudo").load("guerra.php")
        });

      });  

       $( "#formulario" ).on("submit", function( event ) {
   event.preventDefault();
   var formdata = new FormData(this);

     var link = "guerrafiltra.php";
     $.ajax({
      type: 'POST',
      url: link,
      data: formdata ,
      processData: false,
      contentType: false
    }).done(function (data) {
      $("#conteudo").html(data)
    });

    });

    });
  </script>