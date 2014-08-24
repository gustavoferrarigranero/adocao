<?php
require_once("conf.php");
if(!isset($_SESSION['usuario'])){
	header("Location: ". URL.'login.php');
	exit();
}

require_once("controller/AdocaoController.php");
$adocaoController = new AdocaoController();

if(isset($_GET['adocao_id']) && $_GET['adocao_id']){
	
	$adocaoController->adotar($_GET['adocao_id']);
	header("Location: ". URL.'adocoes.php');
	exit();
	
}

if(isset($_GET['cancela_adocao_id']) && $_GET['cancela_adocao_id']){
	
	$adocaoController->cancelaAdotar($_GET['cancela_adocao_id']);
	header("Location: ". URL.'adocoes.php');
	exit();
	
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
    <div class="titulo">Veja aqui os animais disponíveis para adoção!<a href="<?php echo URL ?>nova-adocao.php"><div class="new">Cadastre um animal para adoção</div></a></div>
    <br /><br />
    <?php
                        
    $adocoes = $adocaoController->listar(array('filter_status'=>1,'order'=>'DESC'));

    if($adocoes->num_rows){
        foreach($adocoes->rows as $adocao){?>
        <div class="linha">
            <strong>Nome:</strong> <?php echo $adocao['nome'] ; ?> <strong>Descrição:</strong> <?php echo $adocao['descricao'] ; ?> 
            <br /> 
            <strong>Status da adoção:</strong> 
            <span>
            <?php if($adocao['status']==1){ ?>
            	Animal ja adotado! 
                <?php if($adocao['usuario_id'] == $_SESSION['usuario']['usuario_id']){ ?>
                Para cancelar sua adoção clique <a href="<?php echo URL ; ?>adocoes.php?cancela_adocao_id=<?php echo $adocao['adocao_id'] ; ?>">aqui!</a>
                <?php } ?>
            <?php }else{ ?>
            	Animal aguardando ser adotado! Adote clicando <a href="<?php echo URL ; ?>adocoes.php?adocao_id=<?php echo $adocao['adocao_id'] ; ?>">aqui!</a>
            <?php } ?>
            </span>
            <br /> 
            <strong>Tipo:</strong> <?php echo $adocao['tipo'] ; ?> <strong>Peso:</strong> <?php echo $adocao['peso'] ; ?> <strong>Pelagem:</strong> <?php echo $adocao['pelagem'] ; ?> <strong>Tamanho:</strong> <?php echo $adocao['tamanho'] ; ?><br />	
            <strong>Local:</strong> <?php echo $adocao['local'] ; ?> <strong>Cidade:</strong> <?php echo $adocao['cidade'] ; ?><br />
            <?php if($adocao['foto']){ ?>
            	<strong>Foto:</strong> <br />
            	<img src="<?php echo URL ?>admin/app/webroot/imagens/<?php echo $adocao['foto'] ; ?>" width="200" />
			<?php } ?>
            <hr />
            <br /><br /><br /><br />
        </div>
    <?php
        }
    }
    ?>
</div>
<?php
require_once("view/footer.php");
