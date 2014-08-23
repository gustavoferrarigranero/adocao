<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="view/css/stylesheet.css" />
<title>Fabrica de Sonhos</title>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v2.0";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
</head>
<body>
<div id="centro">
	<a href="<?php echo URL ?>"><div class="logo">Fábrica de <span>Sonhos</span></div></a>
    <div class="usuario">
    	<?php  
		//unset($_SESSION['usuario']);
		//exit(var_dump($_SESSION['usuario']));
		if(isset($_SESSION['usuario']) && $_SESSION['usuario']){
			?>
            <span>Bem vindo(a)</span> <a href="<?php echo URL ?>minhaconta.php"><?php echo $_SESSION['usuario']['nome'] ?></a><span>, acesse </span><a href="<?php echo URL ?>minha-conta.php">sua conta</a>. | <a href="<?php echo URL ?>logout.php">sair</a>
            <?php
		}else{
			?>
			<a href="<?php echo URL ?>cadastro.php">Cadastre-se</a> &nbsp;&nbsp; ou &nbsp;&nbsp; <a href="<?php echo URL ?>login.php">Login</a>
			<?php	
		}
		?>
        
    	
    </div>
    <div class="break" style="border:1px solid #FFF;"></div>
    <div id="banner">
    	<img src="view/imagens/banner-1.jpg" alt="banner-1"/>
        <div id="menu">
        	<a href="<?php echo URL ?>">Home</a>
            <a href="<?php echo URL ?>desejos.php">Desejos</a>
            <a href="<?php echo URL ?>doacoes.php">Doações</a>
            <a href="<?php echo URL ?>quem-somos.php">Quem somos</a>
            <a href="<?php echo URL ?>projetos.php">Projetos</a>
            <a href="<?php echo URL ?>noticias.php">Notícias</a>
            <a href="<?php echo URL ?>contato.php">Contato</a>
        </div>
    </div>