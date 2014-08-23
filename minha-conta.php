<?php
require_once("conf.php");
if(!isset($_SESSION['usuario']) || !$_SESSION['usuario']){
	header("Location: ".URL);	
}
if($_SERVER['REQUEST_METHOD'] == "POST"){
	require_once("controller/UsuarioController.php");
	$controller = new UsuarioController();
	$controller->alterar($_POST);	
}
require_once("view/header.php");
?>
<script type="text/javascript" src="view/javascript/jquery-ui/external/jquery/jquery.js"></script>
<script type="text/javascript" src="view/javascript/jquery-ui/jquery-ui.min.js"></script>
<link rel="stylesheet" type="text/css" href="view/javascript/jquery-ui/jquery-ui.min.css"/>
<script type="text/javascript">
	$(document).ready(function(e) {
        $("input[name='dataNascimento']").datepicker({
			changeMonth: true,
			changeYear: true,
			monthNames: ["Janeiro","Fevereiro","Março","Abril","Maio","Junho",
			"Julho","Agosto","Setembro","Outubro","Novembro","Dezembro"],
			monthNamesShort: ["Jan", "Fev", "Mar", "Abr", "Mai", "Jun", "Jul", "Ago", "Set", "Out", "Nov", "Dez"],
			dayNamesMin: ["Dom","Seg","Ter","Qua","Qui","Sex","Sab"], // Column headings for days starting at Sunday
			dayNamesShort: ["Dom","Seg","Ter","Qua","Qui","Sex","Sab"], // Column headings for days starting at Sunday
			yearRange: "c-100:c+100",
			dateFormat: 'yy-mm-dd'
		});
    });	
</script>
<div class="centro-login">
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
    <form action="#" method="post" enctype="multipart/form-data">
    	<table>
        	<tr>
            	<td valign="top">
                	<input type="hidden" name="id" value="<?php echo $_SESSION['usuario']['id'] ?>" />
                    <input type="hidden" name="status" value="1" />
                    Nome: <br /><input type="text" name="nome" value="<?php echo $_SESSION['usuario']['nome'] ?>" /><br /><br />
                    CPF(maiores de 16 anos): <br /><input type="text" name="cpf" value="<?php echo $_SESSION['usuario']['cpf'] ?>" /><br /><br />
                    RG(maiores de 16 anos): <br /><input type="text" name="rg" value="<?php echo $_SESSION['usuario']['rg'] ?>" /><br /><br />
                    Data de Nascimento: <br /><input type="text" name="dataNascimento" value="<?php echo $_SESSION['usuario']['dataNascimento'] ?>" /><br /><br />
                    Endereço: <br /><input type="text" name="endereco" value="<?php echo $_SESSION['usuario']['endereco'] ?>" /><br /><br />
                    Bairro: <br /><input type="text" name="bairro" value="<?php echo $_SESSION['usuario']['bairro'] ?>" /><br /><br />
                    Cidade: <br /><input type="text" name="cidade" value="<?php echo $_SESSION['usuario']['cidade'] ?>" />
                </td>
                <td valign="bottom" style="padding-left:50px;">             
                    Estado: <br /><input type="text" name="estado" value="<?php echo $_SESSION['usuario']['estado'] ?>" /><br /><br />
                    CEP: <br /><input type="text" name="cep" value="<?php echo $_SESSION['usuario']['cep'] ?>" /><br /><br />
                    Telefone: <br /><input type="text" name="telefone" value="<?php echo $_SESSION['usuario']['telefone'] ?>" /><br /><br />
                    Celular: <br /><input type="text" name="celular" value="<?php echo $_SESSION['usuario']['celular'] ?>" /><br /><br />
                    Email: <br /><input type="text" name="email" value="<?php echo $_SESSION['usuario']['email'] ?>" /><br /><br />
                    Senha: <br /><input type="password" name="senha" value="<?php echo $_SESSION['usuario']['senha'] ?>" />
                </td>
            </tr>
            <tr>
            	<td align="right" colspan="2" style="padding-top:50px;">
                	<input type="submit" value="Alterar Cadastro" />
                </td>
            </tr>
        </table>
        
    </form>
</div>
<?php
require_once("view/footer.php");
