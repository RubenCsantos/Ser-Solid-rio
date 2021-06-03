<?php include 'valid.php'; ?>
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

        .Eventos img{
          max-width: 100px;
          max-height: 100px;
          margin: auto;
            
          
        }

        .column {
          float: left;
          width: 20%;
          box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
          max-width: 250px;
          margin: auto;
          text-align: left;
          height: 360px;
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

        a{
          text-decoration: none;
          color: black;
        }

        .Entidades .column{
          width: 60%;
          height: 380px;
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
          
        }
        .but2{
          padding:8px 20px; 
          background:#ffffff; 
          border:2px solid #ccc;
          cursor:pointer;
          -webkit-border-radius: 5px;
          border-radius: 5px;
        }
        

        .border{
          border-bottom: 2px solid #0c2340;
        }

        .button{
          float: right;
        }

        .border p{
          float: right;
          font-size: 15pt;
        }

  

    </style>
   
</head>
<body>
    <div class="container">
      <div class="logo">
        <img src="images/ubi_logo.png" style="width: 100%;">
      </div>
      <div class="dropdown">
          <button onclick="myFunction()" class="dropbtn"><i class="fa fa-user-circle" aria-hidden="true"></i> O meu perfil</button>
          <div id="myDropdown" class="dropdown-content">
            <?php

            $host = "localhost";
            $dbusername = "root";
            $dbpassword = "";
            $dbname = "servoluntario";
            $dbcon = new mysqli($host, $dbusername, $dbpassword, $dbname);
            $idEntity = $_GET['id'];
            $query = mysqli_query($dbcon, "SELECT email from users2 where email = '$idEntity'");
            $query = mysqli_fetch_array($query);
            $query = $query['email'];

            echo "<a href='eventForm.php?id=$query'><i class='fa fa-plus' aria-hidden='true'></i> Criar Evento</a>
                  <a href='modalTable.php?id=$query'> Ver inscrições </a>
                  <a href='changePass.php?id=$query'>Alterar palavra-chave</a>"
            ?>
            
            <a href="Logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i>Sair</a>
          </div>
          <script src="dropdown.js"></script>
        </div>
    </div>

    
    
    <div class="Join">
    <img src="images/reitoria_original.jpg">
      <img class="image" src="images/ser_solidario.png">
      <div class="centered">Torna-te mais um fazer a diferença na vida de alguém.</div>
    </div>
    <div class="Eventos">
      <div class="EventosAtuais">
        <div class="border" style="margin-right: 170px;">
        <h2>Eventos da entidade que representa</h2>
        </div>
        <br>
        <div class="slideshow">
          <?php  queryCardsRep(); ?>

        </div>
      </div>
     
        

      </div>
    <br><br><br>
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