<h1><?php echo $title; ?></h1>
<div class="jumbotron">
<p>
<strong>Nome: </strong><?php echo $categoria[0]->nome; ?>
</p>
<div class="btn-group">
<?php echo anchor('categorias/form_edita/'.$categoria[0]->id, '<span class="glyphicon glyphicon-pencil"></span> &nbsp;Editar ', array('title' => 'Editar'.$categoria[0]->nome, 'class'=>"btn btn-primary"));?>
	
</div>
</div>
<?php echo '<br><br><br>'.anchor('categorias/form_lista', 'Voltar', array( 'class'=>"btn btn-link"));?>

<!-- Modal -->
<div class="modal fade" id="delete-modal-categoria" tabindex="-1" role="dialog" aria-labelledby="modalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="modalLabel">Excluir Item</h4>
      </div>
      <div class="modal-body">
        Deseja realmente excluir este item?
      </div>
      <div class="modal-footer">
        <button type="button" id="confirm" class="btn btn-primary" >Sim</button>
 		<button type="button" class="btn btn-default" data-dismiss="modal">N&atilde;o</button>
      </div>
    </div>
  </div>
</div> <!-- /.modal -->

