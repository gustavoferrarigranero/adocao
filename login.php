<?php
require_once("conf.php");
if($_SERVER['REQUEST_METHOD'] == "POST"){
	require_once("controller/UsuarioController.php");
	$controller = new UsuarioController();
	$controller->verificaLogin($_POST);

	if(isset($_SESSION['sucesso'])){
		$_SESSION['usuario'] = $_SESSION['sucesso'] ;
		unset($_SESSION['sucesso']);
		header("Location: " . URL);
		exit();
	}
}
require_once("view/header.php");
?>
<div class="centro-login">
	<?php
    if(isset($_SESSION['erro'])){
		?>
		<div class="erro"><?php echo $_SESSION['erro'] ?></div>
		<?php
		unset($_SESSION['erro']);
	}
	?>
    <?php
    if(isset($_SESSION['sucesso'])){
		?>
		<div class="sucesso"><?php echo $_SESSION['sucesso'] ?></div>
		<?php
		unset($_SESSION['sucesso']);
	}
	?>
    <form action="#" method="post">
    	<table>
        	<tr>
            	<td valign="top">
                    Email: <br /><input type="text" name="email" value="" /><br /><br />
                    Senha: <br /><input type="password" name="senha" value="" />
                </td>
            </tr>
            <tr>
            	<td align="right" style="padding-top:50px;">
                	<input type="submit" value="Logar" />
                </td>
            </tr>
        </table>
        
    </form>
</div>
<?php
require_once("view/footer.php");
