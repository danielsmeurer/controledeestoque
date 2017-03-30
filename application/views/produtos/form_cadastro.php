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

if(!$categorias){?>
        <div class="alert alert-danger">Não nenhuma há nenhuma categoria de produto cadastrada ainda.<br>Para cadastrar produtos é preciso cadastrar pelo menos uma categoria primeiro.</div>
        <br>
        <?php echo anchor('categorias/form_cadastro', '<span class="glyphicon glyphicon-plus"></span> &nbsp;Categoria ', array('title' => 'Categoria', 'class'=>"btn btn-primary"));?>

 
<?php
}else{
echo "<p>";
echo form_label('Descrição', 'descricao');
echo form_open('produtos/form_cadastro'); 
$data = array(
        'name'          => 'descricao',
        'id'            => 'descricao',
        'value'         => set_value('descricao'),
        'maxlength'     => '255',
        'size'          => '50'        
);
echo form_input($data);	
echo form_error('descricao'); 
echo "</p><p>";
echo form_label('Código de Barras', 'codbarras').'<br>';
$data = array(
        'name'          => 'codbarras',
        'id'            => 'codbarras',
        'value'         => set_value('codbarras'),
        'maxlength'     => '40',
        'size'          => '50'        
);
echo form_input($data);	
echo form_error('codbarras'); 
echo "</p><p>";
echo form_label('Categoria do produto', 'categoria').'<br>';
echo form_dropdown('categoria', $categorias,0);


echo'<br><br>';
echo form_submit('submit_cadastro', 'Cadastrar');
echo '</p>'	;
echo form_close();
};
echo '<br><br><br>'.anchor('produtos/form_lista', 'Voltar', array( 'class'=>"btn btn-link"));
?>



	
