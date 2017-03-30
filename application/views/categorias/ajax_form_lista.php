<?php
if($categorias):
	foreach ($categorias as $cat):?>
	<tr>
		<td><?php echo anchor('categorias/form_categoria/'.$cat->id, $cat->nome, array('title' =>$cat->nome.$cat->nome, 'class'=>"editar"));?></td>
		<td><?php echo anchor('categorias/form_edita/'.$cat->id, '<span class="glyphicon glyphicon-pencil"></span> Editar', array('title' => 'editar -'.$cat->nome, 'class'=>"editar"));?></td>
		<td><span class="cat_excluir btn btn-link" id="<?php echo $cat->id;?>"> <span  class="glyphicon glyphicon-minus"></span>Excluir</span>
		<?php /* echo anchor('#', '<span class="glyphicon glyphicon-minus">Excluir', array('title' => 'excluir -'.$cat->nome, 'class'=>"cat_excluir",'id'=>$cat->id))*/?></td>
	</tr>
	
<?php 	
	endforeach;
else: ?>
	<tr>
		<td rowspan="3" align="center"><strong>Não há nenhuma categoria cadastrada ainda.</strong></td>
	</tr>
<?php endif;?>

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
<script src="<?php echo base_url('/assets/js/script.js'); ?>"></script>
