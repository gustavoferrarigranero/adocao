<?php
require_once("conf.php");

require_once("controller/AnimalController.php");
$animalController = new AnimalController();
require_once("controller/PerdidoController.php");
$perdidoController = new PerdidoController();
require_once("controller/AdocaoController.php");
$adocaoController = new AdocaoController();

$sqlfiltro = "";

if(isset($_POST['filtro_nome']) && !empty($_POST['filtro_nome'])){
	$sqlfiltro .= " AND a.nome LIKE '%".$_POST['filtro_nome']."%' ";
}

if(isset($_POST['filtro_tipo']) && !empty($_POST['filtro_tipo'])){
	$sqlfiltro .= " AND a.tipo = '".$_POST['filtro_tipo']."' ";
}

if(isset($_POST['filtro_tamanho']) && !empty($_POST['filtro_tamanho'])){
	$sqlfiltro .= " AND a.tamanho = '".$_POST['filtro_tamanho']."' ";
}

if(isset($_POST['filtro_peso']) && !empty($_POST['filtro_peso'])){
	$sqlfiltro .= " AND a.peso LIKE '%".$_POST['filtro_peso']."%' ";
}

if(isset($_POST['filtro_pelagem']) && !empty($_POST['filtro_pelagem'])){
	$sqlfiltro .= " AND a.pelagem LIKE '%".$_POST['filtro_pelagem']."%' ";
}

$animais = $animalController->listarFiltro($sqlfiltro);

$animaisFinal = array();

if($animais->num_rows){
	
	foreach($animais->rows as $animal){
		
		$adocao = false;
		$perdido = false;
		
		$dadosAdocao = $adocaoController->isAdocao($animal['animal_id']);
		$dadosPerdido = $perdidoController->isAdocao($animal['animal_id']);
		
		$dados = array();
		
		if($dadosAdocao->num_rows){
			$adocao = true;
			$dados = $dadosAdocao->row;
		}
		
		if($dadosPerdido->num_rows){
			$perdido = true;
			$dados = $dadosPerdido->row;
		}
		
		$animaisFinal[] = array(
			'animal_id'		=>$animal['animal_id'],
			'nome'			=>$animal['nome'],
			'descricao'		=>$animal['descricao'],
			'tipo'			=>$animal['tipo'],
			'tamanho'		=>$animal['tamanho'],
			'peso'			=>$animal['nome'],
			'pelagem'		=>$animal['nome'],
			'foto'			=>$animal['foto'],
			'perdido'		=>$perdido,
			'adocao'		=>$adocao,
			'local'			=>$dados['local'],
			'cidade'		=>$dados['cidade'],
			'status'		=>$dados['status'],
			'id'			=>($adocao) ? $dados['adocao_id'] : $dados['perdido_id'] ,
		);
		
	}
}

//exit(var_dump($animais));


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
    <div class="titulo">Veja abaixo os animais que foram encontrados a partir da sua busca!</div>
    <br /><br />
    <?php
                        
    if($animaisFinal){
        foreach($animaisFinal as $animal){?>
        <div class="linha">
            <strong>Nome:</strong> <?php echo $animal['nome'] ; ?> <strong>Descrição:</strong> <?php echo $animal['descricao'] ; ?> 
            <br /> 
            <strong>Status da adoção:</strong> 
            <span>
            <?php if($animal['adocao']){ ?>
				<?php if($animal['status']==1){ ?>
                    Animal ja adotado! 
                    <?php if(isset($_SESSION['usuario']) && $animal['usuario_id'] == $_SESSION['usuario']['usuario_id']){ ?>
                    Para cancelar sua adoção clique <a href="<?php echo URL ; ?>adocoes.php?cancela_adocao_id=<?php echo $animal['adocao_id'] ; ?>">aqui!</a>
                    <?php } ?>
                <?php }else{ ?>
                    Animal aguardando ser adotado! Adote clicando <a href="<?php echo URL ; ?>adocoes.php?adocao_id=<?php echo $animal['adocao_id'] ; ?>">aqui!</a>
                <?php } ?>
			<?php }else{ ?>
            	<?php if($animal['status']==1){ ?>
                    Animal Encontrado! 
                    <?php if(isset($_SESSION['usuario']) && $animal['usuario_id'] == $_SESSION['usuario']['usuario_id']){ ?>
                    Para marcar como desaparecido novamente clique <a href="<?php echo URL ; ?>perdidos.php?cancela_perdido_id=<?php echo $animal['perdido_id'] ; ?>">aqui!</a>
                    <?php } ?>
                <?php }else{ ?>
                    Animal Desaparecido! Avise-nos que foi encontrado clicando <a href="<?php echo URL ; ?>perdidos.php?perdido_id=<?php echo $animal['perdido_id'] ; ?>">aqui!</a>
                <?php } ?>
            <?php } ?>
            </span>
            <br /> 
            <strong>Tipo:</strong> <?php echo $animal['tipo'] ; ?> <strong>Peso:</strong> <?php echo $animal['peso'] ; ?> <strong>Pelagem:</strong> <?php echo $animal['pelagem'] ; ?> <strong>Tamanho:</strong> <?php echo $animal['tamanho'] ; ?><br />	
            <strong>Local:</strong> <?php echo $animal['local'] ; ?> <strong>Cidade:</strong> <?php echo $animal['cidade'] ; ?><br />
            <?php if($animal['foto']){ ?>
            	<strong>Foto:</strong> <br />
            	<img src="<?php echo URL ?>admin/app/webroot/imagens/<?php echo $animal['foto'] ; ?>" width="200" />
			<?php } ?>
            <br />
            <br />
            <br />
            <?php if($animal['adocao']){ ?>
            	<a href="<?php echo URL ; ?>visualizar.php?tipo=adocao&id=<?php echo $animal['id'] ; ?>">veja mais!</a>
            <?php }else{ ?>
            	<a href="<?php echo URL ; ?>visualizar.php?tipo=perdido&id=<?php echo $animal['id'] ; ?>">veja mais!</a>
            <?php } ?>
            <hr />
            <br /><br /><br /><br />
        </div>
    <?php
        }
    }else{
		?>
		<div class="linha">Sua busca não retornou nenhum resultado, tente novamente com outra busca!</div>
		<?php	
	}
    ?>
</div>
<?php
require_once("view/footer.php");
