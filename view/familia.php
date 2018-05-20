<?php
include "../model/familiaOP.class.php";

$familiaop = new FamiliaOP();
$familias = $familiaop->getFamilias();
$linhas = sizeof($familias);

?>
<div class="tamanho">
<div class="box caixabranca">
<div class="box-header">
<h3 class="box-title">Familias</h3>
</div>
<table class="table table-responsive table-hover">
    <thead>
        <tr>
            <th>Nome</th>
            <th>Membros</th>
            <th>Guerras</th>
            <th>Vitorias</th>
            <th>Derrotas</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
      <?php
      for ($i=0; $i < $linhas; $i++) { 
          $guerras = $familiaop -> qtsGuerras($familias[$i]['id']);
          $vitorias = $familiaop -> qtsVitorias($familias[$i]['id']);
          $derrotas = $familiaop -> qtsDerrotas($familias[$i]['id']);
      ?>
        <tr>
            <td><?=$familias[$i]['nome']?></td>
            <td><?=$familias[$i]['membros']?></td>
            <td><?=$guerras['total']?></td>
            <td><?=$vitorias['vitorias']?></td>
            <td><?=$derrotas['derrotas']?></td>
            <td id="<?=$familias[$i]['id']?>" name="<?=$familias[$i]['id']?>"><button class="btn btn-info" id="edit">Editar</button><button class="btn btn-danger" id="del">Deletar</button></td>
        </tr>
        <?php }
        ?>
    </tbody>
    <tfoot>
    </tfoot>
</table>
<button class="btn btn-success" id="add">Adicionar Familia</button>
</div>
</div>
<script>
  $(document).ready(function() {
    $('table').dataTable({
      'paging'      : true,
      'lengthChange': true,
      'searching'   : true,
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
        $("#conteudo").load("addfamilia.php");
      });

      $('.table').on("click","#edit",function(e) {
      e.preventDefault();
     
      var editar = $(this).parent('td').attr('name');
      $.post("editfamilia.php",
      {
          editar: editar

      }).done(function(data) {

      $("#conteudo").html(data)
      });

    });

      $('.table').on("click","#del",function(e) {
      e.preventDefault();
     
      var del = $(this).parent('td').attr('name');
      $.post("../controller/familia.php",
      {
          del: del

      }).done(function(data) {

      $("#conteudo").load("familia.php")
      });

    });                  
  });
</script>