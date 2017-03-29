<h1><?php echo $title; ?></h1>
<table class="table table-striped">
<thead>
	<tr>
		<th>Categoria</th>
		<th>Editar</th>
		<th>excluir</th>
	</tr>
</thead>
<tbody>
<?php 
if($categorias):
	foreach ($categorias as $cat):?>
	<tr>
		<td><?php echo $cat->nome;?></td>
		<td><?php echo anchor('categorias/form_edita/'.$cat->id, 'Editar', array('title' => 'editar'.$cat->nome, 'class'=>"editar"));?></td>
		<td><?php echo anchor('categorias/form_exlui'.$cat->id, 'Excluir', array('title' => 'editar'.$cat->nome, 'class'=>"editar"))?></td>
	</tr>
	
<?php 
	endforeach;
endif;?>
</tbody>
</table>