<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="estilos.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="SelectCheckbox.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
    <title>Ser Solidário</title>
    <style>
        table, tr, td{
            border: 3px solid #0c2340; 
        }

        .footer{

        width: 100%;
        position: relative;
        bottom: 0;
        right: 0;
        left: 0;
        border-top: 1px solid #0c2340; 
        background-color: white;
        }

        .footer p{
        color: #0c2340;
        font-size: 8pt;
        }

        .footer a{
        text-decoration: none;
        color: #0c2340;
        font-size: 9pt;
        }

        h2{
            color: #0c2340;
            text-align: center;
            font-weight: normal;
            font-size: 15pt;
            border: none;
            outline: none;
            background:#0c2340;
            color: #fff;
            border-radius: 20px;
            width: 100%;
            margin-bottom: 20px;
            height: 35px;
            
            }

        h2:hover{
            cursor: pointer;
            background: #2E4F78;
            color: #fff;
        }    

        h1{
		margin: 0;
		padding: 0 0 20px;
		text-align: center;
		font-size: 22px;
		}    

        label{
            color: #0c2340;
        }

        textarea {
            -webkit-border-radius: 5px;
            -moz-border-radius: 5px;
            border-radius: 5px;
        }
        
        .Form{
            border-top: 1px solid #0c2340;
        }

        p{
            color: #0c2340;
            font-size: 12px;
        }


        
    </style>
</head>

<body style="background-color: white;">
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

            echo "<a href='eventForm.php?id=2'><i class='fa fa-plus' aria-hidden='true'></i> Criar Evento</a>
                  <a href='modalTable.php?id=2'> Ver inscrições </a>
                  <a href='changePass.php?id=2'>Alterar palavra-chave</a>"
            ?>
            
            <a href="Logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i>Sair</a>
          </div>
          <script src="dropdown.js"></script>
        </div>
    </div>
        <div class="criacaoEvento">
        <br><br>
            <h1>Criação de um novo evento</h1>
            <div class="Form">
            <form method="post" action="valid.php">
            <br>
                <div class="FormularioEntidade">
                    <div class="DadosPessoais"> 
                        <h2>Identificação da Entidade Responsável</h2>
                        <table>
                                <tr>
                                    <td> <input type="text" id="ent" name="ent" placeholder="Entidade responsável" required></td>
                                    
                                </tr>
                                <tr>
                                <td> <input type="email" id="email" name="email" placeholder="Email Representante" required></td>
                                    
                                </tr>
                                <tr>
                                <td> <input type="tel" id="telf" name="telf" placeholder="Contacto telefónico" required></td>
                                </tr>
                        </table>
                    </div>
                    <div class="DescricaoProj">
                        <h2> Descrição do Projeto </h2>
                            <table border="2">
                                <tr>
                                    <td colspan="3"><input style="padding:15px 65px;" type="text" id="nome" name="nome" placeholder="Nome do Evento" required> <input style="padding:15px 65px;" type="text" id="local" name="local" placeholder="Localização" required> <input style="padding:15px 55px;" type="text" id="uIntervencao" name="uIntervencao" placeholder="Área de Intervenção" required> <input style="padding:15px 55px; " type="number" min = "0" id="nVol" name="nVol" placeholder="Número de Voluntários" required></td>
                                </tr>
                                <tr>
                                    <td><textarea rows="8" cols="80" name="descricao" placeholder="Descrição" required></textarea></td>
                                    <td><textarea rows="8" cols="80" name="caracteristicas" placeholder="Características do Voluntário" ></textarea></td>
                                </tr>
                            </table>
                
                    <div class="Duracao">
                    <h2>Duração </h2>

                            <table>
                                <tr>
                                    <th style=" color: #0c2340 ; text-align: center;"> Horário e Datas </th>
                                </tr>
                            <tr>
                                <td >
                                    <div class="hour" style="color: white;">
                                        <p>Data do Início</p>
                                        <input type="datetime-local" name="inicio" min="00:00" max="23:59" value="00/00/0000 00:00:00" required/> <br>
                                        <p>Data do Fim</p>
                                        <input type="datetime-local"  name="fim" min="00:00" max="23:59" value="00/00/0000 00:00:00" required/>
                                    <div>
                                    <br>  
                                </td>
                            </tr>
                        </table>
                    </div>
                    <input type="submit" name="entity_sub" value="Submeter"/>
                <br>
                <div>
            </form>
            </div>
            <br>
            
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