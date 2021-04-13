<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script src="https://kit.fontawesome.com/ae49626ea4.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="estilos.css">
	<title>Ser Solidário - Administração</title>


    <style>
        .List{
            text-align: center;
        }

        table, td, th{
            border: 2px solid #0c2340;
            background: white;
            text-align: left;
            
        }
        table{
            border-radius: 7px;
            border: 5px solid white;
        }

        th{
            background-color: #0c2340;
            color: white;
        }

        a{
            text-decoration: none;
            color: black;
        }

        .titulo{
            border-bottom: 1px solid #0c2340;
        }

        p{
            color:  #0c2340;
        }

        h1{
			margin: 0;
			padding: 50px 0 20px;
			text-align: center;
			font-size: 22px;
            color:  #0c2340;
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
        color: white;
        font-size: 9pt;
        }

    </style>
</head>
<body style="background-color: white;">
    <div class="container">
      <div class="logo">
      <a href="adminPage.php"><img src="images/ubi_logo.png" style="width: 100%;"></a>
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


    <div class="AdminPage">
        <div class="titulo">
        <h1>Administração da Plataforma</h1>
        </div>
        <br>
        <div class="FormAdmin">
            <br>
        <button id="form1but" class="button" style="padding: 8px 37px;" onclick="togEnt()"><i class="fa fa-plus" aria-hidden="true"></i> Registar Entidade</button>
        <br><br>
            <div id = "form1" style = "display:none">
                <form method="post" action="valid.php" enctype="multipart/form-data">
                <div class="input-group">
                    <input style="color: #0c2340;" type="file" name="image" id="image" required>
                    </div>
                    <br>
                    <div class="input-group">
                        <input type="text" name="nomeEnt" placeholder="Nome da Entidade" required>
                    </div>
                    <br>
                    <div class="input-group">
                        <input type="email" name="emailEnt" placeholder="Email" required>
                    </div>
                    <br>
                    <div class="input-group">
                        <input type="tel" name="tlfEnt"  placeholder="Contacto" required>
                    </div>
                    <br>
                    <div class="input-group">
                        <input type="text" name="morada" placeholder="Morada" required>
                    </div>
                    <br>
                    <div class="input-group">
                        <input type="submit" id="registerEnt" class="btn" name="registerEnt" value="Registar">
                    </div>
                </form>
                <br>
            </div>
        
        </div>

            <script>

                function togEnt() {
                    var nav = document.getElementById("form1");

                    if (nav.style.display === "none") {
                        nav.style.display= "block";
                    } else {
                        nav.style.display = "none";
                    }
                }
                

            </script>
        
        
        
        <div>
            <br>

        <?php
            $host = "localhost";
            $dbusername = "root";
            $dbpassword = "";
            $dbname = "servoluntario";
            $dbcon = new mysqli($host, $dbusername, $dbpassword, $dbname);
            $query = ("SELECT nome FROM entidade");
            $result = mysqli_query($dbcon, $query);
            $option = '';
            while($row = mysqli_fetch_array($result))
            {
                $option .= '<option value = "'.$row['nome'].'">'.$row['nome'].'</option>';
            }
        ?>
        <div class="FormAdmin">
        <button id="form2but" class="button" onclick="togRep()"><i class="fa fa-plus" aria-hidden="true"></i> Registar Representante</button>
        <br><br>
            <div id = "form2" style = "display:none">
                <form method="post" action="valid.php">

                    <div class="input-group">
                        <label style="color: black;" for="entidade">Escolha a entidade a representar: </label>
                        <select id="entidade" name="entidadeRep" style="width:200px">
                            <option value="0"></option>
                            <?php echo $option; ?>
                        </select> 
                    </div>
                    <br>
                    <div class="input-group">
                        <input type="text" name="nomeRep" placeholder="Nome" required>
                    </div>
                    <br>
                    <div class="input-group">
                        <input type="text" name="sobreRep"  placeholder="Sobrenome" required>
                    </div>
                    <br>
                    <div class="input-group">
                        <input type="email" name="emailRep" placeholder="Email" required>
                    </div>
                    <br>
                    <div class="input-group">
                        <input type="tel" name="tlfRep" placeholder="Contacto telefónico" required>
                    </div>
                    <br>
                    <div class="input-group">
                        <input type="password" name="psRep" minlength ="8" maxlength="32" placeholder="Palavra-Chave" required>
                    </div>
                    <br>
                    <div class="input-group">
                        <input type="submit" class="btn" name="registerRep" value="Registar">
                    </div>
                </form>
            </div>
        </div>

            <script>
                function togRep() {
                    var nav = document.getElementById("form2");

                    if (nav.style.display === "none") {
                        nav.style.display= "block";
                    } else {
                        nav.style.display = "none";
                    }
                }
                

            </script>
        </div>
        
        <div>
            <br>
            <div class="List">
                <button id="list1but"  class="button" style="padding: 8px 19px;" onclick="togUserVol()"><i class="fa fa-fw fa-user"></i>Listagem de voluntários</button>
                <br><br>
                <div id="list1" style="display: none">

                        
                        <br>
                        <button class="button"><a href="generate_excel_volunt.php?export=true">Exportar tabela</a></button>
                        
                </div>
            </div>
                            
                    <script>
                        function togUserVol() {
                            var nav = document.getElementById("list1");

                            if (nav.style.display === "none") {
                                nav.style.display= "block";
                            } else {
                                nav.style.display = "none";
                            }
                        }
                    </script>

        </div>

        <div>
            <br>
            <div class="List">
                <button id="list2but"  class="button" style="padding: 8px 8px;" onclick="togUserRep()"><i class="fa fa-fw fa-user"></i>Listagem de representantes</button>
                <br><br>
                <div id="list2" style="display: none">

                <?php 
                            $host = "localhost";
                            $dbusername = "root";
                            $dbpassword = "";
                            $dbname = "servoluntario";
                            $dbcon = new mysqli($host, $dbusername, $dbpassword, $dbname);
                            
                            $query = ("SELECT * FROM users2 where userType = 2"); //You don't need a ; like you do in SQL
                            $result = mysqli_query($dbcon,$query);
                            $total = mysqli_num_rows($result);
                            
        
                            if($total != 0){
                                echo "<table align = center> 
                                            <tr>
                                                <th> Nome </th>
                                                <th> Sobrenome </th>
                                                <th> Entidade </th>
                                                <th colspan='2'> Email </th>
                                            </tr>"; // start a table tag in the HTML

                                while($row = mysqli_fetch_array($result)){   //Creates a loop to loop through results
                                    
                                    $nomeEnt = mysqli_query($dbcon, "SELECT nome as nameEnt FROM entidade WHERE representante = '$row[email]'");
                                    $nomeEnt = mysqli_fetch_array($nomeEnt);
                                    $nomeEnt = $nomeEnt['nameEnt'];

                                    echo "<tr>  
                                            <td>" . $row['nome'] . "</td>
                                            <td>" . $row['sobrenome'] . "</td>
                                            <td>" . $nomeEnt . "</td>
                                            <td>" . $row['email'] . "</td>
                                            <td> <button class='button'><a href='remove.php?idUser=$row[id]'>Eliminar</a></button></td>
                                        </tr>";  //$row['index'] the index here is a field name
                                }
                                echo "</table>"; //Close the table in HTML
                            }
                            else{
                                echo "<p>Não existem representantes registados.<p>";
                            }
                        ?>
                        <br>
                        <button class="button"><a href="generate_excel_rep.php?export=true">Exportar tabela</a></button>
                </div>
            </div>

                    <script>
                        function togUserRep() {
                            var nav = document.getElementById("list2");

                            if (nav.style.display === "none") {
                                nav.style.display= "block";
                            } else {
                                nav.style.display = "none";
                            }
                        }

                    </script>
        </div>

        <div>
            <br>
           <div class="List">
            <button id="list3but" class="button" style="padding: 8px 20px;" onclick="togListEnt()"><i class="fa fa-id-card" aria-hidden="true"></i> Listagem de entidades</button>
            <br><br>

                <div id="list3" class="list" style="display: none">
                        
                <?php 
                            $host = "localhost";
                            $dbusername = "root";
                            $dbpassword = "";
                            $dbname = "servoluntario";
                            $dbcon = new mysqli($host, $dbusername, $dbpassword, $dbname);
                            
                            $query = ("SELECT * FROM entidade"); //You don't need a ; like you do in SQL
                            $result = mysqli_query($dbcon,$query);
                            $total = mysqli_num_rows($result);


                            
                            if($total != 0){

                                echo "<table align = center> <tr><th> Entidade </th>
                                <th> Contacto </th>
                                <th> Email </th>
                                <th colspan='2'> Morada </th></tr>"; // start a table tag in the HTML

                                while($row = mysqli_fetch_array($result)){   //Creates a loop to loop through results
                                
                                
                                echo "<tr>
                                        <td>" . $row['nome'] . "</td>
                                        <td>" . $row['contacto'] . "</td>
                                        <td>" . $row['email'] . "</td>
                                        <td>" . $row['morada'] . "</td>
                                        <td> <button class='button'><a href='remove.php?idEntid=$row[id]'>Eliminar</a></button></td>
                                    </tr>";  //$row['index'] the index here is a field name
                                
                                }
                                echo "</table>";
                            }
                            else{
                                echo "<p>Não existem entidades registadas.</p>";
                            }
                        ?>
                      
                        <br>
                        <button class="button"><a href="generate_excel_ent.php?export=true">Exportar tabela</a></button>
                    </div>
                </div>
        </div>

                       
                    <script>
                        function togListEnt() {
                            var nav = document.getElementById("list3");

                            if (nav.style.display === "none") {
                                nav.style.display= "block";
                            } else {
                                nav.style.display = "none";
                            }
                        }

                    </script>
        </div>

        <div>
            <br>
            <div class="List">
                <button id="list4but" class="button" style="padding: 8px 26px;" onclick="togEvent()"><i class="fa fa-calendar" aria-hidden="true"></i> Listagem de eventos</button>
                <br><br>
                    <div id="list4" style="display: none">
                            
                    <?php 
                                $host = "localhost";
                                $dbusername = "root";
                                $dbpassword = "";
                                $dbname = "servoluntario";
                                $dbcon = new mysqli($host, $dbusername, $dbpassword, $dbname);
                                
                                $query = ("SELECT * FROM eventos"); //You don't need a ; like you do in SQL
                                $result = mysqli_query($dbcon,$query);
                                $total = mysqli_num_rows($result);


                                
                                if($total != 0){

                                    echo "<table align = center> 
                                            <tr>
                                                <th> Entidade </th>
                                                <th colspan='2'> Evento </th>
                                            </tr>"; // start a table tag in the HTML

                                    while($row = mysqli_fetch_array($result)){   //Creates a loop to loop through results
                                    
                                        $nomeEnt = mysqli_query($dbcon, "SELECT nome as nameEnt FROM entidade WHERE id = '$row[idEntidade]'");
                                        $nomeEnt = mysqli_fetch_array($nomeEnt);
                                        $nomeEnt = $nomeEnt['nameEnt'];

                                        echo "<tr>
                                                <td>" . $nomeEnt . "</td>
                                                <td>" . $row['title'] . "</td>
                                                <td> <button class='button'><a href='remove.php?idEvent=$row[id]'>Eliminar</a></button></td>
                                            </tr>";  //$row['index'] the index here is a field name
                                        
                                    }
                                    echo "</table><br>";
                                }
                                else{
                                    echo "<p>Não existem eventos registados.</p>";
                                }
                            ?>        
                           
                            <button class="button"><a href="generate_excel_eventos.php?export=true">Exportar tabela</a></button>
                    </div>
                        
                </div>
            </div>
                        

                    <script>
                        function togEvent() {
                            var nav = document.getElementById("list4");

                            if (nav.style.display === "none") {
                                nav.style.display= "block";
                            } else {
                                nav.style.display = "none";
                            }
                        }

                    </script>
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