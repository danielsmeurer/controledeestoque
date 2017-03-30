<h1><?php echo $title; ?></h1>
<?php
if(isset($msg['sucess'])):?>
<div class="msg sucesso btn-success"><?php echo $msg['sucess']; ?></div>
<?php
endif;
if(isset($msg['error'])):?>
<div class="msg erro btn-danger"><?php echo $msg['error']; ?></div>
<?php
endif;

echo form_label('Nome do distribuidor', 'nome');
echo form_open('distribuidores/form_edita/'.$id); 
$data = array(
        'name'          => 'nome',
        'id'            => 'nome',
        'value'         => $nome_atual,
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
        'value'         => $cnpj_atual,
        'maxlength'     => '18',
        'size'          => '50'        
);
echo form_input($data);	
echo form_error('cnpj'); 
echo "</p><p>";
echo'<br><br>';
echo'<br><br>';
echo form_submit('submit_edita', 'Enviar',array( 'class'=>"btn btn-default"));
echo form_close();
echo '<br><br><br>'.anchor('distribuidores/form_lista', 'Voltar', array( 'class'=>"btn btn-link"));
?>



	
