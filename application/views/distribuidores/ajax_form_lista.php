<?php
if($distribuidores):
	foreach ($distribuidores as $dist):?>
	<tr>
		<td><?php echo anchor('distribuidores/form_distribuidor/'.$dist->id, $dist->nome, array('title' =>$dist->nome.$dist->nome, 'class'=>"editar"));?></td>
		<td><?php echo anchor('distribuidores/form_edita/'.$dist->id, '<span class="glyphicon glyphicon-pencil"></span> Editar', array('title' => 'editar -'.$dist->nome, 'class'=>"editar"));?></td>
		<td><span class="dist_excluir btn btn-link" id="<?php echo $dist->id;?>"> <span  class="glyphicon glyphicon-minus"></span>Excluir</span>
		<?php /* echo anchor('#', '<span class="glyphicon glyphicon-minus">Excluir', array('title' => 'excluir -'.$dist->nome, 'class'=>"cat_excluir",'id'=>$dist->id))*/?></td>
	</tr>
	
<?php 	
	endforeach;
else: ?>
	<tr>
		<td rowspan="3" align="center"><strong>Não há nenhuma distribuidor cadastrado ainda.</strong></td>
	</tr>
<?php endif;?>

<!-- Modal -->
<div class="modal fade" id="delete-modal-distribuidor" tabindex="-1" role="dialog" aria-labelledby="modalLabel">
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
</div> <!-- /.modal --> <!-- /.modal -->
<script src="<?php echo base_url('/assets/js/script.js'); ?>"></script>
