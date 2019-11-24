<?php
session_start();
?>

<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link href="login.css" rel="stylesheet">
	<script type="text/javascript" src="login.js"></script>
	<link href="https://fonts.googleapis.com/css?family=Bree+Serif&amp;display=swap" rel="stylesheet">
	<title>ShareGames</title>
</head>
<body>
	<header>
		<nav>
			<ul> 
				<li><a href="#login">Login</a></li> 
				<li><a href="#cadastro" class="cadastre-se" onclick="mudarestado('login','cadastro');">Cadastre-se</a></li>
			</ul>
		</nav>
	</header>

	<article>
		<div class="anuncio">
			<img class="example" src="../../public/logo1.png" alt="some text">
			<h2>Troque experiências, troque aventuras! Uma nova forma de jogar algo novo</h2>
			<h2>Troque jogos</h2>
		</div>

		<div class="login" id="login">
			<form method="post" action="../controllers/loginController.php">
				<br>

				<h1>Entre com sua conta</h1>
				<img class="joystick" src="../../public/joystick2.png" alt="some text">

				<?php
				if(isset($_SESSION['loginErro'])){
					echo $_SESSION['loginErro'];
					unset($_SESSION['loginErro']);
				}
				?>

				<br>

				<label for="email_login"></label>
				<input id="email_login" name="email_login" required="required" type="email" placeholder="Email">
				<br>

				<label for="senha_login"></label>
				<input id="senha_login" name="senha_login" required="required" type="password" placeholder="Senha">

				<br>
				<input id = "manterlogado" type="checkbox" name="manterlogado" value="">
				<label for="manterlogado">Manter-me logado</label>

				<br>
				<br>

				<input type="submit" value="Entrar">

			</form>

			<p class="link">Ainda não tem conta?<button onclick="mudarestado('login','cadastro');"><strong>Criar nova conta</strong></button></p>

		</div>

		<div class="cadastro" id="cadastro">
			<h1>Criar uma conta</h1>
			<img class="joystick" src="../../public/joystick2.png" alt="some text">

			<form method="post" action="../controllers/cadastroUsuarioController.php">
				<h1>Sobre você</h1>
				<br>

				<label for="nome_cadastro"></label>
				<input id = "nome_cadastro" name="nome_cadastro" required="required" type="text" placeholder="Nome">

				<br>
				<label for="sobrenome"></label>
				<input id = "sobrenome" name="sobrenome_cadastro" required="required" type="text" placeholder="Sobrenome">

				<br>
				<label for="dataNascimento"></label>
				<input id = "dataNascimento" name="dataNascimento" required="required" type="text" pattern="^\d{2}/\d{2}/\d{4}$" placeholder="Data de Nascimento">

				<br>
				<label for="cpf"></label>
				<input id = "cpf" name="cpf" required="required" type="data" pattern="^\d{3}.\d{3}.\d{3}-\d{2}$" placeholder="CPF">

				<br>
				<label for="email_cadastro"></label>
				<input id = "email_cadastro" name="email_cadastro" required="required" type="email" placeholder="Email">

				<br>
				<label for="senha_cadastro"></label>
				<input id = "senha_cadastro" name="senha_cadastro" required="required" type="password" placeholder="Senha">

				<br>
				<br>

				<h1>Seu Endereço</h1>

				<br>
				<label for="cep"></label>
				<input id = "cep" name="cep" required="required" type="text" pattern="^\d{5}-\d{3}$" placeholder="CEP">

				<br>
				<label for="pais"></label>
				<input id = "pais" name="pais" required="required" type="text"  placeholder="País">

				<br>
				<label for="cidade"></label>
				<input id = "cidade" name="cidade" required="required" type="text"  placeholder="Cidade">

				<br>
				<label for="estado"></label>
				<input id = "estado" name="estado" required="required" type="text"  placeholder="Estado">

				<br>
				<label for="bairro"></label>
				<input id = "bairro" name="bairro" required="required" type="text" placeholder="Bairro">

				<br>
				<label for="rua"></label>
				<input id = "rua" name="rua" required="required" type="text" placeholder="Rua">

				<br>
				<label for="numero"></label>
				<input id = "numero" name="numero" required="required" type="number" placeholder="Número">

				<br>
				<label for="complemento"></label>
				<input id = "complemento" name="complemento" type="text" placeholder="Complemento">

				<br>
				<input id = "termoscondicoes" type="checkbox" required="required" name="termoscondicoes" value="">
				<label for = "termoscondicoes">Eu li e aceito os termos</label>

				<br>
				<br>

				<input type="submit" value="Cadastrar">
			</form>

			<p class="link">Já possui uma conta?<button onclick="mudarestado('cadastro', 'login');"><strong>Entre com seu email</strong></button></p>
		</div>
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
