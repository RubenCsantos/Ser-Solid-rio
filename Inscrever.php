<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="estilos.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<title>Ser Solidário</title>
	<style>

        h5,h6,p{
            color: white;
        }
		.footer{

			margin-left: 170px;
			margin-right: 170px;
			position: absolute;
			right: 0;
			bottom: 0;
			left: 0;
			border-top: 1px solid white; 
			}

		.footer p{
			color: white;
			font-size: 8pt;
		}

		.footer a{
			text-decoration: none;
			color: white;
			font-size: 9pt;
        }
        
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
			bottom: -10px;
			left: 0;
            border-top: 1px solid  #0c2340; 
            display: flex;
         display: -webkit-flex;
       flex-direction: column;
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
        
        .borda{
        border-top: 1px solid  #fff;
        margin-right:30px; 
        margin-left:30px; 
        }

        
/*INSCRIÇÃO EM EVENTOS*/
.criacaobox{
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

.criacaobox input[type="submit"]
{
  border: none;
  outline: none;
  height: 40px;
  background: #2E4F78;
  color: #fff;
  font-size: 18px;
  border-radius: 20px;
}

.criacaobox input[type="submit"]:hover
{
cursor: pointer;
background: whitesmoke;
color: #000;
}

input[type=email] , input[type=password], input[type=text], input[type=tel]{
  padding:15px 30px; 
  -webkit-border-radius: 15px;
  border-radius: 5px;
  }

  .criacaobox input{
		width: 100%;
		margin-bottom: 0px;
		}

		.criacaobox input[type="email"], input[type="password"]
		{
		border: none;
		outline: none;
		background: none;
		color: white;
		font-size: 18px;
		width: 80%;
		float: left;
		margin: 30px 10px;
		border-bottom: 1px solid #fff;
		}
	</style>
</head>
<body style="background-color: #FFF;">
	
<div class="container">
      <div class="logo">
        <a href="entrar.php"><img src="images/ubi_logo.png" style="width: 100%;"></a>
      </div>
        <div class="dropdown">
          <button onclick="myFunction()" class="dropbtn"><i class="fa fa-user-circle" aria-hidden="true"></i> O meu perfil</button>
          <div id="myDropdown" class="dropdown-content">
            <a href="changePass.php">Alterar palavra-chave</a>
            <a href="Logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i>Sair</a>
          </div>
          <script src="dropdown.js"></script>
        </div>
    </div>
    <?php 
        $host = "localhost";
        $dbusername = "root";
        $dbpassword = "";
        $dbname = "servoluntario";
        $dbcon = new mysqli($host, $dbusername, $dbpassword, $dbname);

        $id = $_GET['idInscricao'];
        $id2 = $_GET['idInfo'];
        $query = "SELECT * FROM eventos  where id = '$id'";
        $result = mysqli_query($dbcon, $query);

        while($row = mysqli_fetch_array($result)){
            if($result){
                echo "<div class='criacaobox'>
                        <h1>Formulário de Inscrição</h1>
                        <div class='borda'></div>
                        <div class='RegisterForm'>
                            <form action='valid.php?idInscricaoUser=$row[id]&idInfo=$id2' method='POST'> 	
                                <br>
                                <div class='loginValidation'>
                                    <input type='email' name='emailVol' placeholder='Email@exemplo.com' required>
                                    <br><br>
                                    <input type='password' name='passVol' required>
                                </div>

                                <br><br><br> 
                                <input type ='submit' name ='inscrever_btn_Vol' value='Inscrever'>
                            </form>
                        </div>	
                    </div>";
            }
        }
        
        ?>


    
	<br>
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