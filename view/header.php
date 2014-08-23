<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="view/css/stylesheet.css" />
<title>Sistema de Adoções</title>
</head>
<body>
<div id="centro">
	<a class="a-logo" href="<?php echo URL ?>"><div class="logo">Adoção de Animais</div></a>
    <div class="break"></div>
    <div id="menu">
        <a href="<?php echo URL ?>">Home</a>
        <a href="<?php echo URL ?>adocoes.php">Adoções</a>
        <a href="<?php echo URL ?>perdidos.php">Animais Perdidos</a>
        <a href="<?php echo URL ?>quem-somos.php">Quem somos</a>
        <a href="<?php echo URL ?>contato.php">Contato</a>
        <div class="usuario">
			<?php  
            if(isset($_SESSION['usuario']) && $_SESSION['usuario']){
                ?>
                <span>Bem vindo(a)</span> <a href="<?php echo URL ?>minhaconta.php"><?php echo $_SESSION['usuario']['nome'] ?></a><span>, acesse </span><a href="<?php echo URL ?>minha-conta.php">sua conta</a>|<a href="<?php echo URL ?>logout.php">sair</a>
                <?php
            }else{
                ?>
                <a href="<?php echo URL ?>cadastro.php">Cadastre-se</a>ou<a href="<?php echo URL ?>login.php">Login</a>
                <?php	
            }
            ?>
        
    	
    	</div>
    </div>
    <div class="break"></div>
