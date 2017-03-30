
<div class="h1"><?php echo $title; ?></div>
<div class="row">
<table class="table table-striped">
<thead>
	<tr>
		<th>Distribuidor</th>
		<th>Editar</th>
		<th>Excluir</th>
	</tr>
</thead>
<tbody>
<?php 
echo '<br><br><br>'.anchor('distribuidores/form_cadastro', '<span class="glyphicon glyphicon-plus"></span> Distribuidor', array( 'class'=>"btn btn-primary"));


if($distribuidores):
	foreach ($distribuidores as $item):?>
	<tr>
		<td><?php echo anchor('distribuidores/form_distribuidor/'.$item->id, $item->nome, array('title' =>$item->nome.$item->nome, 'class'=>"editar"));?></td>
		<td><?php echo anchor('distribuidores/form_edita/'.$item->id, '<span class="glyphicon glyphicon-pencil"></span> Editar', array('title' => 'editar -'.$item->nome, 'class'=>"editar"));?></td>
		<td><span class="dist_excluir btn btn-link" id="<?php echo $item->id;?>"> <span  class="glyphicon glyphicon-minus"></span>Excluir</span>
		<?php /* echo anchor('#', '<span class="glyphicon glyphicon-minus">Excluir', array('title' => 'excluir -'.$item->nome, 'class'=>"cat_excluir",'id'=>$item->id))*/?></td>
	</tr>
	
<?php 	
	endforeach;
else: ?>
	<tr>
		<td rowspan="3" align="center"><strong>Não há nenhuma categoria cadastrada ainda.</strong></td>
	</tr>
<?php endif;?>
</tbody>
</table>

</div>

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
</div> <!-- /.modal -->