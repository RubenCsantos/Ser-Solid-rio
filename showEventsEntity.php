<?php include 'valid.php' ;
    $host = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $dbname = "servoluntario";
    $dbcon = new mysqli($host, $dbusername, $dbpassword, $dbname);

    $idEvent = $_GET['idEntity'];
    
    $nome = mysqli_query($dbcon, "SELECT nome as nomes FROM entidade WHERE id = '$idEvent'");
    $nome = mysqli_fetch_array($nome);
    $nome = $nome['nomes'];
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="estilos.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Ser Solidário</title>

    <style>

.footer{

width: 82%;
position:relative;
bottom: 0px;
right: 170px;
left: 170px;
top: 35px;
border-top: 2px solid #0c2340; 
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


        .EventosAtuais{
          margin-right: 170px;
      
        }

        .column {
          float: left;
          width: 20%;
          box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
          max-width: 250px;
          margin: auto;
          text-align: left;
          height: 375px;
          border: 2px solid #0c2340;
          border-radius: 8px;
          margin: 10px;
          padding: 10px;
        }

        
        .title {
          color: grey;
          font-size: 18px;
        }

        h6{
          font-size:15px;
          color: #00427D;
          
        }

        p{
          font-size:13px;
        }

        .EventosAtuais a{
          text-decoration: none;
          color: black;
        }

        .Entidades .column{
          max-width: 250px;
          width: 25%;
          padding: 15px;
          height: 375px;

        }

        

        .slideshow:after {
          content: "";
          display: table;
          clear: both;
        }

        .Entidades{
          content: "";
          display: table;
          clear: both;
          margin-right: 170px;
          
        }

        .border{
          border-bottom: 2px solid #0c2340;
          margin-right:170px;
        }

        .button{
          float: right;
        }

        .border p{
          float: right;
          font-size: 15pt;
        }

        .Eventos img{
          max-width: 100px;
          max-height: 100px;
          margin: auto;
            
          
        }
  

    </style>
   
</head>
<body>
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
    <div class="Join">
      <img src="images/reitoria_original.jpg">
      <img class="image" src="images/ser_solidario.png">
      <div class="centered"><p style = "font-family:Futura;" font-size="15px;">Torna-te mais um fazer a diferença na vida de alguém.</p></div>
      <a href="Registo.php"><button class="btn">Junte-se a nós.</button></a>
    </div>
    <div class="Eventos">
      <div class="EventosAtuais">
        <div class="border" style="margin-right: 170px;">
        <h2>Eventos a decorrer</h2>
        </div>
        <br><br>
        <div class="slideshow">
          <?php  queryAtuaisTodosEnt(); ?>

        </div>

      </div>
      <br><br>
      <div class="Entidades">
        <div class="border">
        <?php echo "<h2>Todos os eventos de " . $nome . " </h2>" ?>
        </div>
              <?php queryTodosEnt(); ?>
      </div>
    </div>
   <br><br>
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