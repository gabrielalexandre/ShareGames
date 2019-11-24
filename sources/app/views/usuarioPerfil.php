<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Seu Perfil</title>
	<meta charset="UTF-8">
	<link href="https://fonts.googleapis.com/css?family=Bree+Serif&amp;display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="usuarioPerfil.css">
	<script type="text/javascript" src="usuarioPerfil.js"></script>
</head>
<body>
	<header>
		<nav>
			<ul> 
				<li><span><?php echo $_SESSION['nome'];?></span></li>
				<li><a href="#">Configurações</a> 
					<ul class ="sub-menu"> 
						<li><a href="#">Ajuda</a></li> 
						<li><a href="login.php">Sair</a></li>  
					</ul> 
				</li> 
			</ul>
			<img class="img-perfil" src="../../public/userpadrao.jpg" alt="foto do perfil">
		</nav>
	</header>

	<article>
		<a href="usuarioInicio.php" class="retorno">Voltar</a>
		<br>
		<button class="menu-principal" onclick="mudarCorButtonsMenu('menu-principal',0); exibirMenuPrincipal('opcao-1', 'opcao-2')" style="color: red">Sobre Você</button></ul>
		<button class="menu-principal" onclick="mudarCorButtonsMenu('menu-principal',1); exibirMenuPrincipal('opcao-2','opcao-1')">Seu Endereço</button></ul>

		<div class = "opcao-1"> 
			<button onclick="mudarEstadoAndOcultBtn('perfil-sobre', 'btn-editar');" class="btn-cadastro">Editar</button>
			<p>
				Nome: <?php echo $_SESSION['nome'];?><br>
				Sobrenome: <?php echo $_SESSION['sobrenome'];?><br>
				Data de Nascimento: <?php echo $_SESSION['dataNacimento'];?><br>
				CPF: <?php echo $_SESSION['cpf'];?><br>
				Email: <?php echo $_SESSION['email'];?><br>
			</p>
		</div>

		<div class = "opcao-2"> 
			<button onclick="mudarEstadoAndOcultBtn('perfil-sobre', 'btn-editar');" class="btn-cadastro">Editar</button>
			<p>
				CEP: <?php echo $_SESSION['cep'];?><br>
				País: <?php echo $_SESSION['pais'];?><br>
				Cidade: <?php echo $_SESSION['cidade'];?><br>
				Estado: <?php echo $_SESSION['estado'];?><br>
				Bairro: <?php echo $_SESSION['bairro'];?><br>
				Rua: <?php echo $_SESSION['rua'];?><br>
				Número: <?php echo $_SESSION['numero'];?><br>
				Complemento: <?php echo $_SESSION['complemento'];?>
			</p>
		</div>

	</article>


	<footer>
		<button>Sobre</button>
		<button>Quem somos</button>
		<button>Contato</button>
		<p>Criado e Desenvolvido por Hackers<br>Copyright<br>2019<p>
		</footer>

		<script type="text/javascript">


		</script>

	</body>
	</html>
