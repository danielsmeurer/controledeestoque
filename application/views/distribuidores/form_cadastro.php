<h1><?php echo $title; ?></h1>
<?php
if(isset($msg['sucess'])):?>
<div class="alert alert-success"><?php echo $msg['sucess']; ?></div>
<?php
endif;
if(isset($msg['error'])):?>
<div class="alert alert-danger"><?php echo $msg['error']; ?></div>
<?php
endif;
echo "<p>";
echo form_label('Nome do Distribuidor', 'nome');
echo form_open('distribuidores/form_cadastro'); 
$data = array(
        'name'          => 'nome',
        'id'            => 'nome',
        'value'         => set_value('nome'),
        'maxlength'     => '100',
        'size'          => '50'        
);
echo form_input($data);	
echo form_error('nome'); 
echo "</p><p>";
echo form_label('CNPJ', 'cnpj').'<br>';
$data = array(
        'name'          => 'cnpj',
        'id'            => 'cnpj',
        'value'         => set_value('cnpj'),
        'maxlength'     => '40',
        'size'          => '50'        
);
echo form_input($data);	
echo form_error('cnpj'); 
echo "</p><p>";
echo'<br><br>';
echo form_submit('submit_cadastro', 'Cadastrar');
echo '</p>'	;
echo form_close();
echo '<br><br><br>'.anchor('distribuidores/form_lista', 'Voltar', array( 'class'=>"btn btn-link"));
?>



	
