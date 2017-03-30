<h1><?php echo $title; ?></h1>
<div class="jumbotron">
<p>
<strong>Descrição: </strong><?php echo $produto[0]->descricao; ?>
<br>
<strong>Código de barras: </strong><?php echo $produto[0]->codBarras; ?>
<br>
<strong>Categoria: </strong><?php echo $produto['categoria']; ?>
</p>
<div class="btn-group">
<?php /*echo anchor('produtos/form_edita/'.$produto[0]->id, '<span class="glyphicon glyphicon-pencil"></span> &nbsp;Editar ', array('title' => 'Editar', 'class'=>"btn btn-primary"));*/?>
	
</div>
</div>
<?php echo '<br><br><br>'.anchor('produtos/form_lista', 'Voltar', array( 'class'=>"btn btn-link"));?>

