<?php
require_once("conf.php");
if(!isset($_SESSION['usuario'])){
	header("Location: ". URL.'login.php');
	exit();
}

if($_SERVER['REQUEST_METHOD'] == "POST"){
	require_once("controller/AdocaoController.php");
	$controller = new AdocaoController();
	$controller->inserir($_POST);

	header("Location: ". URL.'adocoes.php');
	exit();
}

require_once("view/header.php");
?>
<script type="text/javascript" src="view/javascript/jquery-ui/external/jquery/jquery.js"></script>
<div class="ultimos">
    <div class="titulo">Cadastre aqui um animal que precisa ser adotado!</div>
    <br /><br />

    <form action="#" method="post" enctype="multipart/form-data"> 
    	Nome:<br />        
        <input type="text" name="nome" value="" /><br /><br />
        
        Descrição:<br />        
        <textarea name="descricao" rows="4" cols="30"></textarea><br /><br />
        
        Tipo:<br />        
        <select name="tipo">
        	<option value="Cachorro">Cachorro</option>
            <option value="Gato">Gato</option>
            <option value="Pássaro">Pássaro</option>
            <option value="Roedor">Roedor</option>
            <option value="Réptil">Réptil</option>
        </select><br /><br />
        
        Peso:<br />        
        <input type="text" name="peso" value="" /><br /><br /> 
        
        Pelagem:<br />        
        <input type="text" name="pelagem" value="" /><br /><br /> 
        
        Tamanho:<br />        
        <select name="tamanho">
        	<option value="Pequeno">Pequeno</option>
            <option value="Médio">Médio</option>
            <option value="Grande">Grande</option>
        </select><br /><br />
    
    	Foto: <br />
        <input type="file" name="foto" value="" /><br /><br />
     
    	Local:<br />        
        <input type="text" name="local" value="" /><br /><br />
        
        Cidade:<br />        
        <input type="text" name="cidade" value="" /><br /><br />

		<input type="hidden" name="status" value="0" />
        <input type="hidden" name="usuario_id" value="<?php echo $_SESSION['usuario']['usuario_id'] ; ?>" />
        <input type="submit" value="Cadastrar Adoção" />
    </form>
</div>
<?php
require_once("view/footer.php");
