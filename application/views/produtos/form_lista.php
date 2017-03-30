
<div class="h1"><?php echo $title; ?></div>
<div class="row">
<table class="table table-striped">
<thead>
	<tr>
		<th>Produto</th>
		<th>Editar</th>
		<th>Excluir</th>
	</tr>
</thead>
<tbody>
<?php 
echo '<br><br><br>'.anchor('produtos/form_cadastro', '<span class="glyphicon glyphicon-plus"></span> Categoria', array( 'class'=>"btn btn-primary"));


if($produtos):
	foreach ($produtos as $produto):?>
	<tr>
		<td><?php echo anchor('produtos/form_produto/'.$produto->id, $produto->descricao, array('class'=>"editar"));?></td>
		<td><?php echo anchor('produtos/form_edita/'.$produto->id, '<span class="glyphicon glyphicon-pencil"></span> Editar', array('title' => 'editar -'.$produto->descricao, 'class'=>"editar"));?></td>
		<td><span class="cat_excluir btn btn-link" id="<?php echo $produto->id;?>"> <span  class="glyphicon glyphicon-minus"></span>Excluir</span>
		</td>
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