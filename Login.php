<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script src="https://kit.fontawesome.com/ae49626ea4.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="estilos.css">
	<title>Ser Solidário - Login</title>

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
			font-size: 9pt;
		}

		@import "https://use.fontawesome.com/releases/v5.5.0/css/all.css";

		.loginbox{
		width: 380px;
		height: 480px;
		background: #0c2340;
		color: #fff;
		top: 50%;
		left: 50%;
		position: absolute;
		transform: translate(-50%,-50%);
		box-sizing: border-box;
		padding: 50px 15px;
		border-radius: 20px;
		}

		.avatar{
		width: 100px;
		height: 100px;
		border-radius: 50%;
		position: absolute;
		top: -15%;
		left: calc(50% - 50px);
		}

		.loginbox i{
		width: 26px;
		float: left;
		margin-left: 100px;
		text-align: center;
		}

		.loginbox p{
		margin: 0;
		padding: 0;
		padding-left: 15px;
		font-weight: bold;
		}

		.loginbox input{
		width: 100%;
		margin-bottom: 20px;
		}

		.loginbox input[type="email"], input[type="password"]
		{
		border: none;
		outline: none;
		background: none;
		color: white;
		font-size: 18px;
		width: 80%;
		float: left;
		margin: 20px 10px;
		border-bottom: 1px solid #fff;
		}

		.loginbox input[type="submit"]
		{
		border: none;
		outline: none;
		height: 40px;
		background: #2E4F78;
		color: #fff;
		font-size: 18px;
		border-radius: 20px;
		}

		.loginbox input[type="submit"]:hover
		{
		cursor: pointer;
		background: whitesmoke;
		color: #000;
		}

		.loginbox a{
		text-decoration: none;
		font-size: 12px;
		line-height: 20px;
		color: darkgray;
		padding-left: 20px;
		}

		.loginbox a:hover{
		color: #fff;
		}


		.login-page{
		width: 80%;
		margin: auto;
		padding-top: 50px;
		}

		h3{
		color: white;
		text-align: center;
		font-weight: normal;
		font-size: 30px;

		}

		.formLogin{
		text-align: center;
		}

		input[type=email] , input[type=password], input[type=text], input[type=tel]{
		padding:15px 30px; 
		-webkit-border-radius: 15px;
		border-radius: 5px;
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
	<div class="loginbox">
				<img src="images/user.PNG" class="avatar">
				<h1>Iniciar Sessão</h1>
				<form action="valid.php" method="post">
					<p>Email</p>
					<input type="email" name="email" placeholder="Email" required/>
					<p>Password</p>
					<input type="password" name="psword" placeholder="Password" required/>
					<input type="submit" name="login_btn" value="Login"/>
					<input type="submit" name="" value="Login com conta Google"/>
					<a href="Registo.php">Não tem uma conta? Torne-se um de nós aqui.</a>
				</form>

	</div>	
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
</body>
</html>