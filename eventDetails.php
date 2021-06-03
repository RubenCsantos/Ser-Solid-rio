<?php
include 'valid.php'
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

        width: 100%;
        position: relative;
        bottom: 0;
        right: 0;
        left: 0;
        border-top: 1px solid white; 
        background-color: #0c2340;
        
        }

        .footer p{
        color: white;
        font-size: 8pt;
        margin-right: 170px;
        margin-left: 170px;
        }

        .footer a{
        text-decoration: none;
        color: white;
        font-size: 9pt;
        }

        img{
        max-width: 125px;
          max-height: 125px;
          margin: auto;
          float: right;
        }

        .DetalhesEvento{
        margin-right: 170px;
        margin-left: 170px;
        }

        .header{
            border-bottom: 1px solid #0c2340;
        }

        h3{
            color: black;
        }

        a{
            text-decoration: none;
            color: white;
        }

        .button{
            background-color: #0c2340;
            color: white;
            font-size: 16px;
            padding: 12px 24px;
            border: none;
            cursor: pointer;
            border-radius: 5px;
            float: right;
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
                <a href="Logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i>Sair</a>
            </div>
            </div>
            <script src="dropdown.js"></script>
    </div>
    <div class="DetalhesEvento">
        <?php 
            $host = "localhost";
            $dbusername = "root";
            $dbpassword = "";
            $dbname = "servoluntario";
            $dbcon = new mysqli($host, $dbusername, $dbpassword, $dbname);

            $id = $_GET['id'];
            $idInfo2 = $_GET['idInfo'];
            $query = "SELECT * FROM eventos WHERE id = '$id'";
            $result = mysqli_query($dbcon, $query);

            while($row = mysqli_fetch_array($result)){

                $nVol = mysqli_query($dbcon, "SELECT COUNT(idUser) as count FROM inscritos WHERE idEvento = '$row[id]'");
                $nVol = mysqli_fetch_array($nVol);
                $nVol = $nVol['count'];

                $info = mysqli_query($dbcon, "SELECT nome as name FROM entidade WHERE id = '$row[idEntidade]'");
                $info = mysqli_fetch_array($info);
                $info = $info['name'];

                $info2 = mysqli_query($dbcon, "SELECT representante as rep FROM entidade WHERE id = '$row[idEntidade]'");
                $info2 = mysqli_fetch_array($info2);
                $info2 = $info2['rep'];

                $info3 = mysqli_query($dbcon, "SELECT nome as nameRep FROM users2 WHERE email = '$info2'");
                $info3 = mysqli_fetch_array($info3);
                $info3 = $info3['nameRep'];

                $info4 = mysqli_query($dbcon, "SELECT email as emailRep FROM users2 WHERE email = '$info2'");
                $info4 = mysqli_fetch_array($info4);
                $info4 = $info4['emailRep'];

                
                $info5 = mysqli_query($dbcon, "SELECT contactoTel as contactoTel FROM users2 WHERE email = '$info2'");
                $info5 = mysqli_fetch_array($info5);
                $info5 = $info5['contactoTel'];

                $imagens = mysqli_query($dbcon, "SELECT image as infos FROM entidade WHERE representante = '$row[email]'");
                $imagens = mysqli_fetch_array($imagens);
                $imagens = $imagens['infos'];

                if($result){
                    echo "<div class='header'>
                    <img src='data:image/jpeg;base64,".base64_encode($imagens )."' height='200' width='200' class='img-thumnail' />
                            <h6>" . $row['dataInicio'] . ", " . $row['dataFim'] ."</h6>
                            <h1>" . $row['title'] . "</h1>
                            <h4> Responsável pelo evento: " . $info . "</h4>
                            </div>
                            <div class='conteudo'>
                                <h4> Área de Intervenção: </h4>
                                <p>" . $row['uIntervencao'] . "</p>
                                <h4> Descrição do evento:  </h4>
                                <p>" . $row['descricao'] . "</p>
                                <h4> Caraterísticas requeridas num voluntário: </h4>
                                <p>" . $row['caracteristicas'] . "</p>
                                <h4> Inscrições: </h4>
                                <p>" . $row['nVoluntarios'] . "</p>
                                <h4> Local onde irá ocorrer: </h4>
                                <p>" . $row['local'] . "</p>
                                <h4> Inscrições: </h4>
                                <p>" . $nVol . " voluntário(s) inscrito(s) de " . $row['nVoluntarios'] . " vagas.</p>
                                <h4> Em caso de dúvida, contacte: </h4>
                                <p>" . $info3 . ", </p><p>" . $info4 . ", " . $info5 . "</p>
                            </div>";
                    if($nVol >= $row['nVoluntarios']){
                        echo "<p> Não existem mais vagas para este evento. </p>";
                    }
                    else{
                        echo " <button class='button' ><a href='Inscrever.php?idInscricao=$row[id]&idInfo=$idInfo2''>Inscrever</a></button><br><br><br><br>";
                    }
                }
            }

            ?>
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