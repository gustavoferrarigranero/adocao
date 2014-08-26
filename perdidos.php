<?php
require_once("conf.php");

require_once("controller/PerdidoController.php");
$perdidoController = new PerdidoController();

if(isset($_GET['perdido_id']) && $_GET['perdido_id']){
	
	$perdidoController->avisar($_GET['perdido_id']);
	header("Location: ". URL.'perdidos.php');
	exit();
	
}

if(isset($_GET['cancela_perdido_id']) && $_GET['cancela_perdido_id']){
	
	$perdidoController->cancelaAvisar($_GET['cancela_perdido_id']);
	header("Location: ". URL.'perdidos.php');
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
    <div class="titulo">Veja aqui os animais desaparecidos!<a href="<?php echo URL ?>novo-perdido.php"><div class="new">Cadastre um animal desaparecido</div></a></div>
    <br /><br />
    <?php
                        
    $perdidos = $perdidoController->listar(array('filter_status'=>1,'order'=>'DESC'));

    if($perdidos->num_rows){
        foreach($perdidos->rows as $perdido){?>
        <div class="linha">
            <strong>Nome:</strong> <?php echo $perdido['nome'] ; ?> <strong>Descrição:</strong> <?php echo $perdido['descricao'] ; ?> 
            <br /> 
            <strong>Situação:</strong> 
            <span>
            <?php if($perdido['status']==1){ ?>
            	Animal Encontrado! 
                <?php if($perdido['usuario_id'] == $_SESSION['usuario']['usuario_id']){ ?>
                Para marcar como desaparecido novamente clique <a href="<?php echo URL ; ?>perdidos.php?cancela_perdido_id=<?php echo $perdido['perdido_id'] ; ?>">aqui!</a>
                <?php } ?>
            <?php }else{ ?>
            	Animal Desaparecido! Avise-nos que foi encontrado clicando <a href="<?php echo URL ; ?>perdidos.php?perdido_id=<?php echo $perdido['perdido_id'] ; ?>">aqui!</a>
            <?php } ?>
            </span>
            <br /> 
            <strong>Tipo:</strong> <?php echo $perdido['tipo'] ; ?> <strong>Peso:</strong> <?php echo $perdido['peso'] ; ?> <strong>Pelagem:</strong> <?php echo $perdido['pelagem'] ; ?> <strong>Tamanho:</strong> <?php echo $perdido['tamanho'] ; ?><br />	
            <strong>Local:</strong> <?php echo $perdido['local'] ; ?> <strong>Cidade:</strong> <?php echo $perdido['cidade'] ; ?><br />
            <?php if($perdido['foto']){ ?>
            	<strong>Foto:</strong> <br />
            	<img src="<?php echo URL ?>admin/app/webroot/imagens/<?php echo $perdido['foto'] ; ?>" width="200" />
			<?php } ?>
            <br />
            <br />
            <br />
            <a href="<?php echo URL ; ?>visualizar.php?tipo=perdido&id=<?php echo $perdido['perdido_id'] ; ?>">veja mais!</a>
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
