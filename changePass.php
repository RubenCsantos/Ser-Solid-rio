<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script src="https://kit.fontawesome.com/ae49626ea4.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="estilos.css">
	<title>Ser Solidário - Administração</title>

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

      .Titulo{
        margin-left: 85px;
			margin-right: 85px;
			border-top: 1px solid  #fff;
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
        text-align: left;
        }

        .footer a{
        text-decoration: none;
        color: #0c2340;
        font-size: 9pt;
        }

        h1{
			margin: 0;
			padding: 0px 0 20px;
			text-align: center;
			font-size: 22px;
            color:  #fff;
    }
    
        .changesInput{
      position: relative;
      top:0px;
      line-height: 0px;
      -webkit-border-radius: 15px;
      border-radius: 5px;
      padding: 15px 30px;
      font-size: 12px;
      background: none;
      color: white;
      border-color: #fff;

    }
      </style>
   
</head>
<body style="background-color: white;">
    <div class="container">
      <div class="logo">
      <a href="index.php"><img src="images/ubi_logo.png" style="width: 100%;"></a>
      </div>
      <div class="dropdown">
          <button onclick="myFunction()" class="dropbtn"><i class="fa fa-user-circle" aria-hidden="true"></i> O meu perfil</button>
          <div id="myDropdown" class="dropdown-content">
            <a href="changePass.php">Alterar password</a>
            <a href="Logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i>Sair</a>
          </div>
          <script src="dropdown.js"></script>
        </div>
    </div>

    

    <div class="ChangePass">
    <h1>Alteração da palavra-chave</h1>
        <div class="FormPass">
          <div class="Titulo">
          </div>
          <br><br><br><br>
            <form action="valid.php" method="POST">
                <input class="changesInput" type="password" id="passAtual" name="passAtual" placeholder="Palavra-chave atual"><br><br><br>
                <input class="changesInput" type="password" id="newPass" name="newPass" placeholder="Palavra-chave nova"><br><br><br>
                <input class="changesInput" type="password" id="newPassConf" name="newPassConf" placeholder="Confirmar palavra-chave"><br><br><br>
                <br><br><br>
                <input type="submit" name="changePass" value="Guardar Alterações">
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