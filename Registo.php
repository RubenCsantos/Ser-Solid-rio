<?php include('valid.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script src="https://kit.fontawesome.com/ae49626ea4.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="estilos.css">
	<title>Ser Solidário - Registo</title>

	<style>

		body{
			margin: 0;
			padding: 0;
			font-family: sans-serif;
			background: url(images/wave3.PNG);
			background-size: cover;
			background-position: center;
			font-family: sans-serif;
		}

		h1{
			margin: 0;
			padding: 0 0 20px;
			text-align: center;
			font-size: 22px;
		}


		.footer{

			margin-left: 170px;
			margin-right: 170px;
			position: absolute;
			right: 0;
			bottom: 0;
			left: 0;
			border-top: 1px solid  #0c2340; 
			}

		.footer p{
			color:  #0c2340;
			font-size: 8pt;
		}

		.footer a{
			text-decoration: none;
			color:  #0c2340;
			font-size: 8pt;
		}

		.top_line{
			margin-left: 140px;
			margin-right: 140px;
			border-top: 1px solid  #fff;
		}

		::placeholder { /* Chrome, Firefox, Opera, Safari 10.1+ */
		  color: gray;
		}

		label {
  		cursor: default;
		  color: gray;
		  font-size:12px;
		}

		td{
			padding: 20px;
			
		}

		.PoliticaPrivacidade table{
			text-align: left;
			border: 1px solid white;
			border-radius: 10px;
		}

		p{
			color: white;
			font-size: 10px;
		}

	</style>

</head>
<body style="background-color: #fff;">
<div class="FullPage">
	<div class="container">
      <div class="logo">
	  <a href="index.php"><img src="images/ubi_logo.png" style="width: 100%"></a>
      </div>
	</div>
	
	<div class="registerbox">
		<h1>Faça parte de nós, e seja mais um a marcar a diferença.</h1>
		<div class="top_line"></div>
		<br>
		<br>
		<table align="center">
			<tr>
				<th>Dados Pessoais</th>
				<th>Credenciais de login</th>
			</tr>
			<tr>
				<td>
				<form action="valid.php" method="post">
					<br>
					<input class="reg1" type="text" name="nome" placeholder="Nome" required>
					<br><br><br>
					<input class="reg1" type="text" name="sobrenome" placeholder="Sobrenome" required>
					<br><br><br>
					<input class="reg1" type="tel1" name="contacto" placeholder="Contacto telefónico" required>
					<br><br><br>
					<input class="reg1" type="tel1" name="localidade" placeholder="Localidade" required>
					<br><br><br>
					<label for="birthday">Data de Nascimento: </label>
					<input  type="date" id="birthday" name="dateN" required>
				</td>

				<td>
					<br><br><br>
					<input class="reg2" type="email" name="email" placeholder="Email" required>
					<br><br><br>
					<input class="reg2" type="password" name="psword" placeholder="Password" required>
					<br><br><br>
					<input class="reg2" type="password" name="psword2" placeholder="Confirme a sua Password" required>
				</td>
					
			</tr>
		</table>
		<div class="PoliticaPrivacidade">
			<table align="center">
				<tr>
					<td><p><input type="radio" id="sim" name="autoriza" value="sim">
						<label for="sim">Sim</label><br></td></p>
					<td><p><input type="radio" id="nao" name="autoriza" value="nao">
						<label for="sim">Não</label><br></p>
					</td>
					<td> <p>Autorizo o tratamento dos meus dados pessoais, facultados no âmbito da minha inscrição no Banco de Solidariedade, para os fins inerentes às competências da Vice-Reitoria para a Responsabilidade Social, que inclui a sua cedência aos nossos parceiros para efeitos ações de voluntariado.</p> </td>
				</tr>
			</table>
		</div>
		<br>
		<input type="submit" name="submit_btn_Vol" value="Registar"/>
			<a href="Login.php">Já tens uma conta? Inicia a tua sessão aqui.</a>
		</form>
	</div>	
	<div class="footer">
			<div class="Contact">
				<p>Convento de Santo António <br>
					6201-001 Covilhã <br>
					Portugal <br>
				</p>
				<p>Tel: +351 275 242 016 | E-mail: vrfinanceirarhrs@ubi.pt <br> <a href="https://www.ubi.pt/">www.ubi.pt</a></p>
			</div>
	</div>	
</div>		
</body>
</html>