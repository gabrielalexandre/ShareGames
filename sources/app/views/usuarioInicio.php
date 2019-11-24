<?php
session_start();

if(isset($_SESSION['jogoCadastradoSucesso'])){
	echo $_SESSION['jogoCadastradoSucesso'];
	unset($_SESSION['jogoCadastradoSucesso']);
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<link href="https://fonts.googleapis.com/css?family=Bree+Serif&amp;display=swap" rel="stylesheet">
	<title>Menus</title>
	<link rel="stylesheet" type="text/css" href="usuarioInicio.css">
	<script type="text/javascript" src="usuarioInicio.js"></script>
</head>
<body>
	<header>
		<nav>
			<ul> 
				<li><span><?php echo $_SESSION['nome'];?></span></li> 
				<li><a href="#">Configurações</a> 
					<ul class ="sub-menu"> 
						<li><a href="usuarioPerfil.php">Seu perfil</a></li> 
						<li><a href="#">Ajuda</a></li> 
						<li><a href="login.php">Sair</a></li>  
					</ul> 
				</li> 
			</ul>
			<img class="img-perfil" src="../../public/userpadrao.jpg" alt="foto do perfil">
		</nav>
	</header>
	<article>
		<button class="menu-principal" onclick="mudarCorButtonsMenu('menu-principal',0); exibirMenuPrincipal('opcao-1', 'opcao-2','opcao-3','opcao-4')" style="color: red">Loja</button></ul>
		<button class="menu-principal" onclick="mudarCorButtonsMenu('menu-principal',1); exibirMenuPrincipal('opcao-2','opcao-1', 'opcao-3','opcao-4')">Biblioteca</button></ul>
		<button class="menu-principal" onclick="mudarCorButtonsMenu('menu-principal',2); exibirMenuPrincipal('opcao-3','opcao-1', 'opcao-2','opcao-4')">Propostas de Troca</button></ul>
		<button class="menu-principal" onclick="mudarCorButtonsMenu('menu-principal',3); exibirMenuPrincipal('opcao-4','opcao-1', 'opcao-2','opcao-3')">Conversas</button></ul>
		<div class = "opcao-1"> 
			<li class = "item-loja"> 
				<h2> Jogos Disponíveis </h2>
				<div class="pesquisar-jogo">
					<form method="post" action="../controllers/pesquisaJogosController.php">
						<label for="pesquisa-jogo"></label>
						<input id="pesquisa-jogo" name="pesquisa-jogo" required="required" type="search" placeholder="Buscar Jogo">
						<br>
						<input type="submit" value="Buscar">
					</form>
				</div>
				<?php foreach($_SESSION['jogosLoja'] as $jogo){
					if($_SESSION['idUsuario']!= $jogo['idUsuario']){
						echo "<ul><figure><img class = \"img-capa\" src=\"../../public/upload/".$jogo['capa']."\">
						<figcaption><h3>".$jogo['nome_jogo']."</h3>
						<br>Cidade: Indefinida
						<br>Categoria: ".$jogo['categoria']."
						<br>Estado de uso: ".$jogo['anosUso']." anos
						<br>ID: ".$jogo['idJogo']."
						<br><button class =\"botao\" value = \"".$jogo['idJogo']."\"onclick=\"mudarEstado('confirmar')\">Solicitar Troca</button>
						</figcaption></figure></ul>";
					}
				}
				?>
				
			</li>
		</div>
		<div class="confirmar">
			<form method='post' action="../controllers/solicitacaoController.php">
				<h2>Escolha um jogo para oferecer</h2>
				<?php foreach($_SESSION['jogosUsuarioLogado'] as $jogo){
					echo "<input type=\"radio\" id = \"idJogoProposta\" required=\"required\" name=\"idJogoProposta\" value=\"".$jogo['idJogo']."\">".$jogo['nome_jogo']."<br>";
				}
				?>
				<br>
				<span> Para confirmar escreva o ID do jogo desejado <span>
					<br>
					<label for="idJogoDesejado"></label>
					<input type="number" id = "idJogoDesejado" name = "idJogoDesejado" required = "required"><br>
					<input onclick="mudarEstado('confirmar');" type="submit" value="solicitacao"><br>
				</form>
				<button onclick="mudarEstado('confirmar');">Cancelar</button>
			</div>
			<div class = "opcao-2" id ="opcao-2"> 
				<button onclick="mudarEstadoAndOcultBtn('cadastrar-jogo', 'btn-cadastro');" class="btn-cadastro">Cadastrar novo jogo</button>
				<div class="cadastrar-jogo">
					<form method="post" action="../controllers/cadastroJogoController.php" enctype="multipart/form-data">
						<h2>Insira os dados do  novo jogo</h2>
						<p>Nome:</p>
						<label for="nome-jogo"></label>
						<input id="nome-jogo" name="nome-jogo" required="required" type="text" placeholder="Nome do jogo">
						<p>Tempo de Uso:</p>
						<label for="anosUso-jogo"></label>
						<input id="anosUso-jogo" name="anosUso-jogo" required="required" type="number" placeholder="Tempo de uso(Anos)" >
						<p>Categoria:</p>
						<p><input type="radio" id = "categoria-jogo" required="required" name="categoria-jogo" value="Ação"> Ação
							<input type="radio" id = "categoria-jogo" required="required" name="categoria-jogo" value="Aventura"> Aventura
							<input type="radio" id = "categoria-jogo" required="required" name="categoria-jogo" value="Esporte"> Esporte
							<input type="radio" id = "categoria-jogo" required="required" name="categoria-jogo" value="RPG"> RPG
							<input type="radio" id = "categoria-jogo" required="required" name="categoria-jogo" value="outra">Outra</p>
							<p>Imagem da Capa:</p>
							<label for="capa-jogo"></label>
							<input class ="capa-jogo" id="capa-jogo" name="capa-jogo" required="required" type="file" accept=".jpg,.png" placeholder="Capa do jogo"><br>
							<input type="submit" value="Cadastrar Jogo"><br>
						</form>
						<button class="btn-ocultar" onclick="mudarEstadoAndExibeBtn('cadastrar-jogo', 'btn-cadastro');"><strong>Ocultar</strong></button>
					</div>
					<li class = "item-loja"> 
						<h2> Jogos Cadastrados na Sua Biblioteca</h2>
						<?php foreach($_SESSION['jogosUsuarioLogado'] as $jogo){
							echo "<ul><figure><img class = \"img-capa\" src=\"../../public/upload/".$jogo['capa']."\">
							<figcaption><h3>".$jogo['nome_jogo']."</h3>
							<br>Cidade: Indefinida
							<br>Categoria: ".$jogo['categoria']."
							<br>Estado de uso: ".$jogo['anosUso']." anos
							<br><button>Remover</button>
							</figcaption></figure></ul>";
						}
						?>
					</li>
				</div>
				<div class = "opcao-3"> 
					<li class = "item-loja"> 
						<h2> Propostas de Troca</h2>
						<?php 
						$quantidadeTrocas = 0;
						foreach($_SESSION['trocas'] as $troca){
							if($_SESSION['idUsuario'] == $troca['idUsuarioA']){
								$quantidadeTrocas= $quantidadeTrocas + 1;
							}
						}
						if($quantidadeTrocas == 0){
							echo "<p>Você não possuí nenhuma proposta</p>";
						}
						else{
							foreach($_SESSION['trocas'] as $troca){
								if($_SESSION['idUsuario'] != $troca['idUsuarioA']){
									echo "<p>O Usuário ".$troca['nomeUsuarioA']." deseja trocar o jogo ".$troca['nomeJogoA']." pelo jogo ".$troca['nomeJogoB']." com você!
									<button>Aceitar</button></p>";
								}
							}
						}
						?>
					</li>
				</div>
				<div class = "opcao-4">
					<h2>Suas Conversas</h2>
					<p>Aqui futuramente você poderá fazer suas negociações</p>
				</div>
			</article>
			<footer>
				<button>Sobre</button>
				<button>Quem somos</button>
				<button>Contato</button>
				<p>Criado e Desenvolvido por Hackers<br>Copyright<br>2019<p>
				</footer>
			</body>
			</html>