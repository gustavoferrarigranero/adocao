<div id="conteudo">
    <div class="doacoes">
        <div class="titulo">Últimas Doações</div>
        <span>Veja as doações, nessa área você acompanha as últimas doações feita por nossos usuários. </span><br /><br />
        <?php
        
        require_once("controller/DoacaoController.php");
        
        $doacaocontrole = new DoacaoController();
        
        $doacoes = $doacaocontrole->listar(array('limit'=>5,'order'=>'DESC'));
        
        foreach($doacoes->rows as $doacao){
            ?><div class="linha"><span>Valor: R$ <?php echo number_format($doacao['valor'],2,",",".") ; ?></span> - <strong>Data: <?php echo date("d/m/Y",strtotime($doacao['data'])) ; ?></strong></div><?php
        }
		?>
    </div>
    <div class="depoimentos">
        <div class="fb-comments" data-href="http://localhost/fabrica-de-sonhos/" data-width="650" data-numposts="1" data-colorscheme="dark"></div>
    </div>
</div>
</div>
<br /><br /><br />
</body>
</html>
