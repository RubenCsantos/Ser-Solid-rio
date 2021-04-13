<?php
include 'valid.php';

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

        .DetalhesEvento{
        margin-right: 170px;
        margin-left: 170px;
        }

        .header{
            border-bottom: 1px solid #0c2340;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="logo">

            <a href="indexRep.php"><img src="images/ubi_logo.png" style="width: 100%";></a>
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
                $emailRep = $_GET['id'];
                $query = mysqli_query($dbcon, "SELECT id as  from users2 WHERE email = '$emailRep'");
                $query = mysqli_fetch_array($query);
                $query = $query['id'];

                echo "<a href='eventForm.php?id=$query'><i class='fa fa-plus' aria-hidden='true'></i> Criar Evento</a>
                    <a href='changePass.php?id=$query'>Alterar palavra-chave</a>"
                ?>
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
            $dbname = "sersolidario";
            $dbcon = new mysqli($host, $dbusername, $dbpassword, $dbname);

            $idEvento = $_GET['idEvento'];
            $query = mysqli_query($dbcon,"SELECT * FROM evento  where ID_Evento = '$idEvento'");
           
        

            while($row = mysqli_fetch_array($query)){

                $nome = $row['NomeEntidade'];
                $id = mysqli_query($dbcon, "Select id_entidade from entidades where entidade_nome = '$nome'");
                $id = mysqli_fetch_array($id);
                $id = $id['id_entidade'];

                
                if($query){
                    echo "<form action='valid.php?id=$id&idEvento=$row[ID_Evento]' method = 'POST'>
                        <div class='header'>
                            <h4> Duração e horário: </h4>
                            <input type='text' name='duracao' value= '" . $row['Duracao'] . "'/>
                            <br><br>
                            <input type='time' name='horario[]' min='00:00' max='23:59' value='21:00' /> -
                            <input type='time'  name='horario[]' min='00:00' max='23:59' value='21:00'/>
                            <br><br>
                            <h4> Nome do evento: </h4>
                            <input type='text' name='idProj' value='" . $row['Id_Projeto'] . "'/>
                            <h4> Responsável pelo evento: <input type='text' name='Pcont' value='" . $row['PaxContacto'] . "'/>
                            </div>
                            <div class='conteudo'>
                                <h4> Área de Intervenção: </h4>
                                <input type='text' name='areaInt' value= '" . $row['AreaInterv'] . "'/>
                                <h4> Tarefas a realizar:  </h4>
                                <textarea rows='8' cols='67' name='tarefas'>" . $row['Tarefas'] . "</textarea>
                                <h4> Caraterísticas requeridas num voluntário: </h4>
                                <textarea rows='8' cols='67' name='perfil'>" . $row['CarateristicasVol'] . "</textarea>
                                <h4> Número de Voluntários necessários: </h4>
                                <input type='number' min = '0' name='NRVoluntarios' value='" . $row['Nr_Vol'] . "'/>
                                <h4> Dias da semana em que ocorre: </h4>
                                <div class='multiselect'>
                                        <div id='checkboxes'>
                                        <label for='checkbox'>
                                            <input type='checkbox'  name='dia[]' value='Segunda-Feira'/>Segunda-Feira</label><br>
                                        <label for='checkbox'>
                                            <input type='checkbox'  name='dia[]' value='Terça-Feira'/>Terça-Feira</label><br>
                                        <label for='checkbox'>
                                            <input type='checkbox' name='dia[]' value='Quarta-Feira'/>Quarta-Feira</label><br>
                                        <label for='checkbox'>
                                            <input type='checkbox'  name='dia[]' value='Quinta-Feira'/>Quinta-Feira</label><br>
                                        <label for='checkbox'>
                                            <input type='checkbox'  name='dia[]' value='Sexta-Feira'/>Sexta-Feira</label><br>
                                        <label for='checkbox'>
                                            <input type='checkbox'  name='dia[]' value='Sábado'/>Sábado</label><br>
                                        <label for='checkbox'>
                                            <input type='checkbox'  name='dia[]' value='Domingo'/>Domingo</label><br>
                                        </div>
                                    </div>
                                <h4> Em caso de dúvida, contacte: </h4>
                                <p>" . $row['PaxContacto'] . ",</p>
                                <input type='email' name='email' value='" . $row['Email'] . "'>,<input type='tel' name='Tlf' value=' " . $row['Contacto'] . "'>

                                
                            </div>
                            <br>
                            <input type='submit' name='ChangeEvent' value='Aplicar alterações'>
                            </form>

                            <script type='text/javascript'>
                            $(function() {

                            $('input[name='duracao']').daterangepicker({
                                autoUpdateInput: true,
                                locale: {
                                    cancelLabel: 'Limpar',
                                    applyLabel: 'Confirmar',
                                    format: 'YYYY-MM-DD',
                                    daysOfWeek: [
                                                    'Dom',
                                                    'Seg',
                                                    'Ter',
                                                    'Qua',
                                                    'Qui',
                                                    'Sex',
                                                    'Sáb'
                                                ],

                                    monthNames: [
                                                    'Janeiro',
                                                    'Fevereiro',
                                                    'Março',
                                                    'Abril',
                                                    'Maio',
                                                    'Junho',
                                                    'Julho',
                                                    'Agosto',
                                                    'Setembro',
                                                    'Outubro',
                                                    'Novembro',
                                                    'Dezembro'
                                                ],
                                }
                            });

                            $('input[name='duracao']').on('apply.daterangepicker', function(ev, picker) {
                                $(this).val(picker.startDate.format('YYYY-MM-DD') + ' - ' + picker.endDate.format('YYYY-MM-DD'));
                            });

                            $('input[name='duracao']').on('cancel.daterangepicker', function(ev, picker) {
                                $(this).val('');
                            });

                            });
                            </script>   
                            <br>";
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