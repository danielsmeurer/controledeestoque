$(document).ready(function(){
	$("#cnpj").mask("99.999.999/9999-99");
	$('.cat_excluir').on('click',function(){
		var id = $(this).attr('id');
		$('#delete-modal-categoria').modal();
		$("#confirm").attr('onclick','excluirCategoria('+id+')');		
				
	})	

})

function excluirCategoria(id){
	$.post( "ajax_excluir_categoria", {cat_id : id},function( data ) {
		$.post( "ajax_form_lista", function( data ) {
		  	$('tbody').html(data);
		  });
		setTimeout(function(){
		$('#delete-modal-categoria').modal("hide");		 
		}, 700);
	  	
	})
}

function excluirDistribuidor(id){
	$.post( "ajax_excluir_distribuidor", {dist_id : id},function( data ) {
		$.post( "ajax_form_lista", function( data ) {
		  	$('tbody').html(data);
		  });
		setTimeout(function(){
		$('#delete-modal-categoria').modal("hide");		 
		}, 700);
	  	
	})
}