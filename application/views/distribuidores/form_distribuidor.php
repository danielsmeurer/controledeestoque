<h1><?php echo $title; ?></h1>
<div class="jumbotron">
<p>
<strong>Nome: </strong><?php echo $distribuidor[0]->nome; ?>
<br>
<strong>CNPJ: </strong><?php echo $distribuidor[0]->cnpj; ?>
</p>
<div class="btn-group">
<?php echo anchor('distribuidores/form_edita/'.$distribuidor[0]->id, '<span class="glyphicon glyphicon-pencil"></span> &nbsp;Editar ', array('title' => 'Editar'.$distribuidor[0]->nome, 'class'=>"btn btn-primary"));?>
	
</div>
</div>
<?php echo '<br><br><br>'.anchor('distribuidores/form_lista', 'Voltar', array( 'class'=>"btn btn-link"));?>
