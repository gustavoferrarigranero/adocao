<?php
require_once("conf.php");
if(!isset($_SESSION['usuario'])){
	header("Location: ". URL.'login.php');
	exit();
}

if($_SERVER['REQUEST_METHOD'] == "POST"){
	require_once("controller/DepoimentoController.php");
	$controller = new DepoimentoController();
	$controller->inserir($_POST); 
	header("Location: ". URL.'visualizar.php?tipo='.$_POST['tipo'].'&id='.$_POST['id']);
	exit();
}

if(isset($_GET['tipo']) && $_GET['tipo'] == "adocao"){
	require_once("controller/AdocaoController.php");
	$controller = new AdocaoController();
}elseif(isset($_GET['tipo']) && $_GET['tipo'] == "perdido"){
	require_once("controller/PerdidoController.php");
	$controller = new PerdidoController();
}

require_once("controller/DepoimentoController.php");
$depoimentoController = new DepoimentoController();

if(isset($_GET['like']) && $_GET['like']){
	$depoimentoController->like($_GET['depoimento_id']);
	header("Location: ". URL.'visualizar.php?tipo='.$_GET['tipo'].'&id='.$_GET['id']);
	exit();
}
if(isset($_GET['deslike']) && $_GET['deslike']){
	$depoimentoController->deslike($_GET['depoimento_id']);
	header("Location: ". URL.'visualizar.php?tipo='.$_GET['tipo'].'&id='.$_GET['id']);
	exit();
}

$info = NULL;

if(isset($_GET['id']) && $_GET['id']){
	$info = $controller->get($_GET['id'])->row;
}

require_once("view/header.php");
?>
<script type="text/javascript" src="view/javascript/jquery-ui/external/jquery/jquery.js"></script>
<div class="ultimos">
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
    <div class="titulo" style="font-size:20px;"><?php echo $info['nome'] ; ?></div>
    <br /><br />
    <table width="100%">
    	<tr>
        	<td valign="top">
            	<?php if($info['foto']){ ?>
                    <img src="<?php echo URL ?>admin/app/webroot/imagens/<?php echo $info['foto'] ; ?>" width="300" /><br />
                <?php } ?>
            </td>
            <td valign="top">
                <strong>Descrição:</strong> <?php echo $info['descricao'] ; ?><br />
                <strong>Tipo:</strong> <?php echo $info['tipo'] ; ?><br />
                <strong>Status:</strong> 
                <?php if($_GET['tipo']=="adocao"){ ?>
                    <?php if($info['status']==1){ ?>
                        Animal ja adotado! 
                        <?php if($info['usuario_id'] == $_SESSION['usuario']['usuario_id']){ ?>
                        Para cancelar sua adoção clique <a href="<?php echo URL ; ?>adocoes.php?cancela_adocao_id=<?php echo $info['adocao_id'] ; ?>">aqui!</a>
                        <?php } ?>
                    <?php }else{ ?>
                        Animal aguardando ser adotado! Adote clicando <a href="<?php echo URL ; ?>adocoes.php?adocao_id=<?php echo $info['adocao_id'] ; ?>">aqui!</a>
                    <?php } ?>
                <?php }else{ ?>
                    <?php if($info['status']==1){ ?>
                        Animal Encontrado! 
                        <?php if($info['usuario_id'] == $_SESSION['usuario']['usuario_id']){ ?>
                            Para marcar como desaparecido novamente clique <a href="<?php echo URL ; ?>perdidos.php?cancela_perdido_id=<?php echo $info['perdido_id'] ; ?>">aqui!</a>
                            <?php } ?>
                        <?php }else{ ?>
                            Animal Desaparecido! Avise-nos que foi encontrado clicando <a href="<?php echo URL ; ?>perdidos.php?perdido_id=<?php echo $info['perdido_id'] ; ?>">aqui!</a>
                        <?php } ?>
                    <?php } ?>
                <br />
                <strong>Peso:</strong> <?php echo $info['peso'] ; ?><br />
                <strong>Pelagem:</strong> <?php echo $info['pelagem'] ; ?><br />
                <strong>Tamanho:</strong> <?php echo $info['tamanho'] ; ?><br />
                <strong>Local:</strong> <?php echo $info['local'] ; ?><br />
                <strong>Cidade:</strong> <?php echo $info['cidade'] ; ?><br />
                <br /><br />
                <strong>Deixe seu depoimento:</strong><br />
                <form action="#" method="post">
                	<input type="hidden" name="tipo" value="<?php echo $_GET['tipo'] ; ?>" />
                    <input type="hidden" name="id" value="<?php echo $_GET['id'] ; ?>" />
                	<input type="hidden" name="animal_id" value="<?php echo $info['animal_id'] ; ?>" />
                	<input type="hidden" name="usuario_id" value="<?php echo $info['usuario_id'] ; ?>" />
                    <input type="hidden" name="like" value="0" />
                	<input type="hidden" name="deslike" value="0" />
                	<textarea name="texto" cols="35"></textarea><br />
                    <input type="submit" value="Enviar depoimento" />
                </form>
                <br /><br /><br />
            </td>
        </tr>
    </table> 
    
    
    <h1>Depoimentos</h1>
    <?php

	$depoimentos = $depoimentoController->listar(array());
	
	if($depoimentos->num_rows){
		foreach($depoimentos->rows as $depoimento){
			?>
            <div>
            	<strong>Usuário: </strong><?php echo $depoimento['nome']; ?><br />
                <strong>Depoimento: </strong><?php echo $depoimento['texto']; ?><br />
                <div class="break"></div>
                <a href="<?php echo URL.'visualizar.php?tipo='.$_GET['tipo'].'&id='.$_GET['id'].'&deslike=true&depoimento_id='.$depoimento['depoimento_id']; ?>"><div class="deslike"><?php echo $depoimento['deslike']; ?></div></a>
                 <a href="<?php echo URL.'visualizar.php?tipo='.$_GET['tipo'].'&id='.$_GET['id'].'&like=true&depoimento_id='.$depoimento['depoimento_id']; ?>"><div class="like"><?php echo $depoimento['like']; ?></div></a>
                <div class="break"></div>
            </div>
            <hr />
            <?php
		}
	}
	?>
	<br /><br /><br /><br /><br /><br />      
</div>
<?php
require_once("view/footer.php");
