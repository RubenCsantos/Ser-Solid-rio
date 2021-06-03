<?php 
include 'valid.php' ?>
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
          height: 350px;
          border: 2px solid #0c2340;
          border-radius: 8px;
          margin: 10px;
          padding: 10px;
        }

        
        .title {
          color: grey;
          font-size: 18px;
        }

        .EventosAtuais h6{
          font-size:15px;
          color: #00427D;
          
        }

        .EventosAtuais p{
          font-size:13px;
        }

        .EventosAtuais a{
          text-decoration: none;
          color: black;
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

        .Entidades .column {
          height: 250px;
          border: 7px solid white;
          padding: 5px;
          width: 40%;
          text-align: center;
          
          
        }

        .EventosAtuais img{
          max-width: 100px;
          max-height: 100px;
          margin: auto;
            
          
        }

        .Entidades img{
          max-width: 200px;
          max-height: 200px;
          margin-top: 25px;
          
        }

        .Entidades a{
          text-decoration: none;
          color: #ccc;
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
  

    </style>
   
</head>
<body>
    <div class="container">
      <div class="logo">
        <a href="index.php"><img src="images/ubi_logo.png" style="width: 100%;"></a>
      </div>
        <div class="validation">
        <ul>
          <li><a href="Login.php"><i class="fa fa-sign-in" aria-hidden="true"></i> Entrar</a></li>
          <li><a href="Registo.php"><i class="fa fa-fw fa-user"></i>Torna-te um de nós</a></li>
        </ul>
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
        <h2>Eventos a decorrer</h2>
        <p> <a href="Login.php"><i class="fa fa-plus-square-o" aria-hidden="true"></i>Consultar eventos futuros</a></p>
        </div>
        <br><br><br>
        <div class="slideshow">
          <?php queryCardsAtuaisIndex(); ?>

        </div>

      </div>
      <br><br>
      <div class="Entidades">
        <div class="border">
        <h2>Entidades Associadas</h2>
        </div>
        <br>
              <?php queryEntidadesIndex(); ?>
      </div>
    </div>
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