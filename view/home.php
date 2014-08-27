    <div id="meio">
    	<a href="<?php echo URL ?>adocoes.php"><div class="coluna">
        	<div class="titulo">
            	Adote um Animal
            </div>
            <div class="texto">
       	 		[Edite este texto e troque a imagem conforme desejar]
        	</div>
            <img src="view/imagens/banner-1.jpg" width="290" height="160" />
        </div></a>
        <a href="<?php echo URL ?>perdidos.php"><div class="coluna">
        	<div class="titulo">
            	Animais Perdidos
            </div>
            <div class="texto">
       	 		[Edite este texto e troque a imagem conforme desejar]
        	</div>
            <img src="view/imagens/banner-1.jpg" width="290" height="160" />            
        </div></a>
        <a href="<?php echo URL ?>quem-somos.php"><div class="coluna">
        	<div class="titulo">
            	Quem Somos
            </div>
            <div class="texto">
       	 		[Edite este texto e troque a imagem conforme desejar]
        	</div>
            <img src="view/imagens/banner-1.jpg" width="290" height="160" />
        </div></a>
        <div class="break"></div>
        <hr style="margin:15px 0px;" />
        <div class="filtros">
        	<div class="titulo">Aqui você pode buscar animais e ver quais estão desaparecidos ou disponíveis para adoção!</div>
        	<form action="<?php echo URL ?>pesquisar.php" method="post">
                <div class="filtro">
                    Nome:<br />
                    <input type="text" name="filtro_nome" value="" />
                </div>
                <div class="filtro">
                    Tipo:<br />        
                    <select name="filtro_tipo">
                    	<option value=""></option>
                        <option value="Cachorro">Cachorro</option>
                        <option value="Gato">Gato</option>
                        <option value="Pássaro">Pássaro</option>
                        <option value="Roedor">Roedor</option>
                        <option value="Réptil">Réptil</option>
                    </select>
                </div>
                <div class="filtro">
                	Tamanho:<br />        
                    <select name="filtro_tamanho">
                    	<option value=""></option>
                        <option value="Pequeno">Pequeno</option>
                        <option value="Médio">Médio</option>
                        <option value="Grande">Grande</option>
                    </select>
                </div>
                <div class="filtro">
                	Peso:<br />        
                    <input type="text" name="filtro_peso" value="" />
                </div>
                <div class="filtro">
                	Pelagem:<br />        
                    <input type="text" name="filtro_pelagem" value="" />
                </div>
                <div class="filtro-button">
                	<br />        
                    <input type="submit" value="Filtrar animais" />
                </div>
            </form>
        </div>
        <div class="break"></div>
    </div>