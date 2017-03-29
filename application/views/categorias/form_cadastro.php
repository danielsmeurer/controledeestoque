<h1><?php echo $title; ?></h1>
<?php
if(isset($msg['sucess'])):?>
<div class="sucesso"><?php echo $msg['sucess']; ?></div>
<?php
endif;
if(isset($msg['error'])):?>
<div class="erro"><?php echo $msg['error']; ?></div>
<?php
endif;

echo form_label('Nome da categoria', 'nome');
echo form_open('categorias/form_cadastro'); 
$data = array(
        'name'          => 'nome',
        'id'            => 'nome',
        'value'         => set_value('nome'),
        'maxlength'     => '100',
        'size'          => '50'        
);
echo form_input($data);	
echo form_error('nome'); 
echo'<br><br>';
echo form_submit('submit_cadastro', 'Cadastrar');
echo form_close();
?>

	
