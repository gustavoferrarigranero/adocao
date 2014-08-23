<?php
require_once("conf.php");
if(!isset($_SESSION['usuario'])){
	header("Location: ". URL.'login.php');
	exit();
}
if($_SERVER['REQUEST_METHOD'] == "POST"){
	mail(EMAIL,"Contato - Doação de Animais - ".$_POST['nome'],$_POST['mensagem']);
	$_SESSION['sucesso'] = "Email enviado com sucesso, em breve entraremos em contato!";
}
require_once("view/header.php");
?>
<?php
if(isset($_SESSION['erro'])){
	?>
	<div class="erro"><?php echo $_SESSION['erro'] ?></div>
	<?php
	unset($_SESSION['erro']);
}
if(isset($_SESSION['sucesso'])){
	?>
	<div class="sucesso"><?php echo $_SESSION['sucesso'] ?></div>
    
	<?php
	unset($_SESSION['sucesso']);
}
?>
<div id="infos">
    <div class="titulo">Notícias</div>
    <span>Editar texto!. </span><br /><br />
    <form action="#" method="post">         
    	Nome: <br /><input type="text" name="nome" value="" />  <br /><br />
        Descrição: <br /><textarea name="mensagem" rows="10" cols="50"></textarea><br /><br />
        <input type="submit" value="Enviar mensagem" />
    </form>
</div>
<?php
require_once("view/footer.php");
