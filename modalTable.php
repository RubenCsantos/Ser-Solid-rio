<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="estilos.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Ser Solidário</title>

    <style>
        .Content {
            margin-right: 170px;
            margin-left: 170px;
        }

        .tabela {
            text-align: center;
        }

        .footer {

            margin-left: 170px;
            margin-right: 170px;
            position: absolute;
            right: 0;
            bottom: 0;
            left: 0;
            border-top: 2px solid #0c2340 ;
        }

        .linha{
            margin-left: 170px;
            margin-right: 170px;
            border-top: 2px solid #0c2340 ;
        }

        .footer p {
            color: #0c2340;
            font-size: 8pt;
        }

        .footer a {
            text-decoration: none;
            color: #0c2340;
            font-size: 9pt;
        }

        .clearfix p {
            font-size: 10pt;
            color: white;
            text-align: center;
        }

        .titulo {
            border-bottom: 1px solid white;
        }

        table,
        td,
        th {
            border: 1px solid black;
            background: white;
            text-align: left;
        }
        
        table{
            border-radius: 7px;
            border: 3px solid #0c2340;
        }

        th {
            background-color: #0c2340;
            color: #fff;
        }

        .modal {
            text-align: center;
        }

        h1{
			margin: 0;
			padding: 0 0 20px;
			text-align: center;
			font-size: 22px;
            color: #0c2340;
		}
    </style>

</head>

<body style="background-color: #fff;">
    <div class="FullPage">
        <div class="container">
            <div class="logo">
            <img src="images/ubi_logo.png" style="width: 100%;">
            </div>
            <div class="dropdown">
                <button onclick="myFunction()" class="dropbtn"><i class="fa fa-user-circle" aria-hidden="true"></i> O
                    meu perfil</button>
                <div id="myDropdown" class="dropdown-content">
                    <?php

                        $host = "localhost";
                        $dbusername = "root";
                        $dbpassword = "";
                        $dbname = "servoluntario";
                        $dbcon = new mysqli($host, $dbusername, $dbpassword, $dbname);
                        $idEntity = $_GET['id'];
                        $query = mysqli_query($dbcon, "SELECT id from users2 where email = '$idEntity'");
                        $query = mysqli_fetch_array($query);
                        $query = $query['id'];

                        echo "<a href='eventForm.php?id=$query'><i class='fa fa-plus' aria-hidden='true'></i> Criar Evento</a>
                            <a href='changePass.php?id=$query'>Alterar palavra-chave</a>
                            <a href='indexRep.php?id=$idEntity'>Página Principal</a>"
                            
                    ?>

                    <a href="Logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i>Sair</a>
                </div>
                <script src="dropdown.js"></script>
            </div>
        </div>
        <div class="Content">
            <div class="titulo">
            <br><br><br>
                <h1>Consulta de Inscrições </h1>
                <div class="linha"></div><br><br>
            </div>
            <br>
            <div class="tabela">
                <?php
                    $host = "localhost";
                    $dbusername = "root";
                    $dbpassword = "";
                    $dbname = "servoluntario";
                    $dbcon = new mysqli($host, $dbusername, $dbpassword, $dbname);

                    $idEntity = $_GET['id'];


                    $query = mysqli_query($dbcon,"SELECT * FROM eventos WHERE email = '$idEntity' ");
                    $option = '';

                    if($query){

                    
                    while($row = mysqli_fetch_array($query))
                    {
                        
                        $option .= '<option value = "'.$row['title'].'">'.$row['title'].'</option>';
                        

                    }
                    }
                    echo "<form action='modalTable.php?id=$idEntity' method='POST'>
                            <div class='input-group'>
                            <label style='color: #0c2340;' for='entidade'>Escolha o evento que pretende consultar:</label>
                            <select name='NomeEvento'>
                                $option; 
                            </select> 
                        </div>
                        <br>
                        <div class='modalTablee'>
                        <input type = 'submit' name='Verificar' value='Consultar'></div>
                        </form><br><br>";

                        if(isset($_POST['Verificar'])){
                            $host = "localhost";
                            $dbusername = "root";
                            $dbpassword = "";
                            $dbname = "servoluntario";
                            $dbcon = new mysqli($host, $dbusername, $dbpassword, $dbname);
                    
                            $info = mysqli_query($dbcon, "SELECT id as idEvent from eventos WHERE title = '$_POST[NomeEvento]'");
                            $info = mysqli_fetch_array($info);
                            $info = $info['idEvent'];

                            $query = mysqli_query($dbcon,"SELECT idUser FROM inscritos WHERE idEvento = '$info'");
            
                                    echo "<div class='modal'>
                                            <table align = center>
                                                <tr>
                                                    <th>Nome</th>
                                                    <th>Sobrenome</th>
                                                    <th>Contacto</th>
                                                </tr>";
                                    if($query){
                                    while($row = mysqli_fetch_array($query)){
                                        
                                        $nomes = mysqli_query($dbcon, "SELECT nome as nomeID from users2 WHERE id = '$row[idUser]'");
                                        $nomes = mysqli_fetch_array($nomes);
                                        $nomes = $nomes['nomeID'];

                                        $sobrenomes = mysqli_query($dbcon, "SELECT sobrenome as sobrenomeID from users2 WHERE id = '$row[idUser]'");
                                        $sobrenomes = mysqli_fetch_array($sobrenomes);
                                        $sobrenomes = $sobrenomes['sobrenomeID'];

                                        $contactos = mysqli_query($dbcon, "SELECT contactoTel as contactoTelID from users2 WHERE id = '$row[idUser]'");
                                        $contactos = mysqli_fetch_array($contactos);
                                        $contactos = $contactos['contactoTelID'];

                                            echo " <tr>
                                                        <td> " . $nomes . "</td>
                                                        <td> " . $sobrenomes . "</td>
                                                        <td> " . $contactos . "</td>
                                                    </tr>";
                                    
                                    }}
                                    echo "</table></div>";
                        
                        }
            ?>

            </div>
        </div>



    </div>
    <div class="footer">
        <div class="Contact">
            <p>Convento de Santo António <br>
                6201-001 Covilhã <br>
                Portugal <br>
            </p>
            <p>Tel: +351 275 242 016 | E-mail: vrfinanceirarhrs@ubi.pt <br> <a href="https://www.ubi.pt/">www.ubi.pt</a>
            </p>


        </div>
    </div>
</body>

</html>