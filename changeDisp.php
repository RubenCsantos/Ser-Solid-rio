<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script src="https://kit.fontawesome.com/ae49626ea4.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="estilos.css">
	<title>Ser Solidário - Disponibilidade</title>

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

        .footer{

            margin-left: 85px;
            margin-right: 85px;
            position: absolute;
            right: 0;
            bottom: 0;
            left: 0;
            border-top: 1px solid #0c2340; 
            }

            .footer p{
            color: #0c2340;
            font-size: 8pt;
            text-align: left;
            }

            .footer a{
            text-decoration: none;
            color: #0c2340;
            font-size: 9pt;
            }

            .Titulo{
            margin-right: 80px;
            margin-left: 80px;
            border-bottom: 1px solid white;
            }

            p, th{
			color: white;
		    }

            .Dias td{
			padding: 5px;
			color: white;
			text-align: left;
			
		}
		
		.DispTable table{
			text-align: center;
			border: 2px solid white;
            border-radius: 10px;
            padding: 10px;
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
      border-radius: 20px;

    }
    </style>
   
</head>
<body style="background-color: white;">
    <div class="container">
      <div class="logo">
        <a href="entrar.php"><img src="images/ubi_logo.png" style="width: 100%;"></a>
      </div>
        <div class="dropdown">
          <button onclick="myFunction()" class="dropbtn"><i class="fa fa-user-circle" aria-hidden="true"></i> O meu perfil</button>
          <div id="myDropdown" class="dropdown-content">
            <a href="changePass.php">Alterar palavra-chave</a>
            <a href="changeDisp.php">Alterar disponibilidade </a>
            <a href="Logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i>Sair</a>
          </div>
          <script src="dropdown.js"></script>
        </div>
    </div>

    <div class="ChangeDisp">
        <div class="FormPass">
            <div class="Titulo">
            <h1>Alteração da disponibilidade</h1>
            </div>
            <br>
            <form action="valid.php" method="POST">
               <br><br>
                <div class="DispTable">
                    <table align="center">
                        <tr >
                            <th colspan = "3"> Disponibilidade </th>
                        </tr>
                        <tr>
                                <td>
                                <div class='Disponibilidade'>
                                    <p> Estarei disponível no seguinte horário: </p>
                                    <p>
                                    <input type='time' name='horas[]' min='00:00' max='23:59' value='21:00' required> -
                                    <input type='time' name='horas[]' min='00:00' max='23:59' value='21:30' required> </p>
                    
                                </td>
                        </tr>
                        <tr>
                                <td>
                                    <div class="Dias">
                                    <p> Nos seguintes dias: </p>
                                    <table>
                                        <div class="multiselect" style=" color: white; text-align: left;">
                                            <div id="checkboxes">
                                            <tr>
                                            
                                                <td><label for="checkbox">
                                                        <input type="checkbox"   name="days[]" value="Segunda-Feira"/>Segunda-Feira</label></td>
                                                <td><label for="checkbox">
                                                        <input type="checkbox"  name="days[]" value="Terça-Feira"/>Terça-Feira</label></td>
                                            </tr>
                                            <tr>			
                                                    <td><label for="checkbox">
                                                        <input type="checkbox"  name="days[]" value="Quarta-Feira"/>Quarta-Feira</label></td>
                                                    <td><label for="checkbox">
                                                        <input type="checkbox"  name="days[]" value="Quinta-Feira"/>Quinta-Feira</label></td>
                                            </tr>
                                            <tr>
                                                    <td><label for="checkbox">
                                                        <input type="checkbox"  name="days[]" value="Sexta-Feira"/>Sexta-Feira</label></td>
                                                    <td><label for="checkbox">
                                                        <input type="checkbox"  name="days[]" value="Sábado"/>Sábado</label></td>
                                                    
                                            </tr>
                                            <tr>
                                                <td><label for="checkbox">
                                                    <input type="checkbox"  name="days[]" value="Domingo"/>Domingo</label></td>
                                            </tr>
                                            </div>
                                        </div>

                                    </table>
                    </table>                
                </div> 
                <br>
                <input class="changesInput" type="password" id="pass" name="pass" placeholder="Palavra-chave atual" required><br><br>
                <input type="submit" name="changeDisp" value="Alterar">
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
           

    
</body>
</html>