<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php echo $title; ?></title>
	<link rel="stylesheet" href=" <?php echo base_url('/assets/css/style.css'); ?> ">	
	<script src="//code.jquery.com/jquery-1.12.0.min.js"></script>	
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="style.css">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<nav class="navbar navbar-inverse ">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#" >Controle de Estoque</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        <li><a data-target="home">Início</a></li>
		    <li><a data-target="sobre" >Categorias</a></li>
		    <li><a data-target="habilidades" >Lotes</a></li>
		    <li><a data-target="portifolio" >Produtos</a></li>
		    <li><a data-target="contato" >Fornecedores</a></li>              
      </ul>
    </div>
  </div>
</nav>
<div id="main" class="container">