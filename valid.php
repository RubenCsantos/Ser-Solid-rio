<?php


if(isset($_POST['submit_btn_Vol'])) //REGISTO
{
    $host = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $dbname = "servoluntario";
    $dbcon = new mysqli($host, $dbusername, $dbpassword, $dbname);

    $name = $_POST['nome'];
    $secondname = $_POST['sobrenome'];
    $contactoTel = $_POST['contacto'];
    $localidade = $_POST['localidade'];
    $dateNascimento = $_POST['dateN'];
    $email = $_POST['email'];
    $psw1 = $_POST['psword']; 
    $psw2 = $_POST['psword2'];
    $autoriza = $_POST['autoriza'];


    if($dbcon){

        $queryVerify = mysqli_query($dbcon, "SELECT * FROM users2 WHERE email = '$email'");
            
        if($psw1 != $psw2){
            echo "<script type='text/javascript>alert('As password's não coincídem.')</script> ";
            header ("Location: Registo.php?message='As password's não coincídem'");
        }else{
            if(mysqli_num_rows($queryVerify)>0){
                $row = mysqli_fetch_array($queryVerify);
                if($row['email'] == $email){
                    
                echo "<script type='text/javascript>alert('Este email já existe! Por favor registe-se com outro email.')</script> ";
                    header ("Location: Registo.php?message='Este e-mail já existe!'");
                }
            }else{
    
                     $pswEncrypted = md5($_POST['psword']); //encriptar password
                     mysqli_query($dbcon, "INSERT INTO users2 (nome,sobrenome,contactoTel,localidade,dataNascimento,email,password,autoriza, userType, horaDisp, diaDisp) VALUES ('$name','$secondname','$contactoTel','$localidade','$dateNascimento','$email','$pswEncrypted','$autoriza', '0', '', '')");
                    header ("Location: Login.php");
            }
        }



    }
    
}

if(isset($_POST['login_btn'])) //LOGIN
{
    $host = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $dbname = "servoluntario";
    $dbcon = new mysqli($host, $dbusername, $dbpassword, $dbname);

    $email = $_POST['email'];
    $psw1 = md5($_POST['psword']);



    if($dbcon){

        $queryVerify = mysqli_query($dbcon, "SELECT * FROM users2 WHERE email = '$email' AND password = '$psw1'");
            
        if($queryVerify){

            while($row = mysqli_fetch_array($queryVerify)){
                if($row['userType'] == 1){
                    header("Location: adminPage.php");
                } else {
                    if($row['userType']=='0'){
                        header("Location: entrar.php?id=$row[id]");
                    }
                    else{
                        header("Location: indexRep.php?id=$row[email]");
                    }
                }

            }

        } else{
            
            header("Location: Login.php?message='Credencias erradas, tente novamente.'");
        }
    }
    
}

if(isset($_POST['changePass'])) //ALTERAR PASSWORD
{
    $host = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $dbname = "servoluntario";
    $dbcon = new mysqli($host, $dbusername, $dbpassword, $dbname);

    $passAtual = md5($_POST['passAtual']);
    $passNova = md5($_POST['newPass']);
    $passConf = md5($_POST['newPassConf']);

    $query = mysqli_query($dbcon,"SELECT password, userType FROM users2 WHERE password = '$passAtual'");
    

    if($query){
        while($row = mysqli_fetch_array($query)){
            if($passNova == $passConf && $row['userType']=='0'){
                mysqli_query($dbcon, "UPDATE users2 SET Password = '$passNova' WHERE Password = '$passAtual'");
                header("Location: entrar.php");
            }
            else{

                if($passNova == $passConf && $row['userType']=='1'){
                    mysqli_query($dbcon, "UPDATE users2 SET Password = '$passNova' WHERE Password = '$passAtual'");
                    header("Location: adminPage.php");
                } else{
                    mysqli_query($dbcon, "UPDATE users2 SET Password = '$passNova' WHERE Password = '$passAtual'");
                    header("Location: indexRep.php?id=$_GET[id]");
                }    
            }
        }
    }
}

if(isset($_POST['changeDisp'])){  //ALTERAR DISPONIBILIDADE
    $host = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $dbname = "servoluntario";
    $dbcon = new mysqli($host, $dbusername, $dbpassword, $dbname);

    $passAtual = md5($_POST['pass']);
    $horasArray = $_POST['horas'];
    $time = implode("-", $horasArray);
    $diasArray = $_POST['days'];
    $dia = implode("-", $diasArray);

    $query = mysqli_query($dbcon,"SELECT * FROM users2 where password = '$passAtual'");
    

    if($query){
        
        while($row = mysqli_fetch_array($query)){
                mysqli_query($dbcon, "UPDATE users2 SET horaDisp = '$time', diaDisp = '$dia' WHERE  Password = '$passAtual' ");
                header("Location: entrar.php?id=$row[id]");
        }
    }


}

if(isset($_POST['registerEnt'])) //REGISTAR ENTIDADE
{
    $host = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $dbname = "servoluntario";
    $dbcon = new mysqli($host, $dbusername, $dbpassword, $dbname);

    $file = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));  

    $nomeEnt = $_POST['nomeEnt'];
    $emailEnt = $_POST['emailEnt'];
    $contactEnt = $_POST['tlfEnt'];
    $morada = $_POST['morada'];



    if($dbcon){

            $queryVerify = mysqli_query($dbcon, "SELECT * FROM entidade WHERE nome = '$nomeEnt'");

            if(mysqli_num_rows($queryVerify)>0){
                $row = mysqli_fetch_array($queryVerify);
                if($row['nome'] == $nomeEnt){
                    
                echo "<script type='text/javascript>alert('Esta entidade já existe! Por favor registe uma nova entidade.')</script> ";
                    header ("Location: Registo.php?message='Esta entidade já existe!'");
                }
            }else{

                    mysqli_query($dbcon, "INSERT INTO entidade (nome,email,contacto,morada,image) VALUES ('$nomeEnt','$emailEnt','$contactEnt','$morada','$file')");

                    header ("Location: adminPage.php");
                 
            }
    }
}

if(isset($_POST['registerRep'])) //REGISTAR REPRESENTANTE
{
    $host = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $dbname = "servoluntario";
    $dbcon = new mysqli($host, $dbusername, $dbpassword, $dbname);

    $entidadeRep = $_POST['entidadeRep'];
    $nomeRep = $_POST['nomeRep'];
    $sobrenomeRep = $_POST['sobreRep'];
    $emailRep = $_POST['emailRep'];
    $contactRep = $_POST['tlfRep'];
    $pswRep = md5($_POST['psRep']);



    if($dbcon){
        $queryIDEnt = mysqli_query($dbcon, "SELECT id from entidade where nome = '$entidadeRep'");
        $queryIDEnt = mysqli_fetch_array($queryIDEnt);
        $queryIDEnt = $queryIDEnt['id'];
       
        $queryVerify = mysqli_query($dbcon, "SELECT * FROM users2 WHERE email = '$emailRep'");
           

           if(mysqli_num_rows($queryVerify)>0){
               $row = mysqli_fetch_array($queryVerify);
               if($row['email'] == $emailRep){
                   
                   header ("Location: adminPage.php?message='Este e-mail já existe!'");
                   die("<p>Este email já existe</p>");
                   
                   
               }
           }else{
                   mysqli_query($dbcon, "INSERT INTO users2 (nome,sobrenome,contactoTel,localidade,dataNascimento,email,password,autoriza,userType) VALUES ('$nomeRep','$sobrenomeRep','$contactRep','','','$emailRep','$pswRep','sim','2')");
                   mysqli_query($dbcon, "UPDATE entidade SET Representante = '$emailRep' WHERE Id = '$queryIDEnt'");
                   echo "<p> Representante registado com sucesso. </p>";
                   header ("Location: adminPage.php");
           }
           
   }
}

if(isset($_POST['entity_sub'])) //REGISTAR EVENTO
{
    $host = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $dbname = "servoluntario";
    $dbcon = new mysqli($host, $dbusername, $dbpassword, $dbname);

    $entidade = $_POST['ent'];
    $nomeEvento = $_POST['nome'];
    $local = $_POST['local'];
    $uI = $_POST['uIntervencao'];
    $nV = $_POST['nVol'];
    $descricao = $_POST['descricao'];
    $caracteristicas = $_POST['caracteristicas'];
    $dataInicio = $_POST['inicio'];
    $dataFim = $_POST['fim'];
    $emailRep = $_POST['email'];



    if($dbcon){

            $queryVerify = mysqli_query($dbcon, "SELECT * FROM entidade WHERE nome = '$entidade'");

            if(mysqli_num_rows($queryVerify)>0){
                $row = mysqli_fetch_array($queryVerify);
                if($row['nome'] == $entidade){

                $entidadeID=$row['id'];   

                mysqli_query($dbcon, "INSERT INTO eventos (title,descricao,uIntervencao,dataInicio,dataFim,nVoluntarios,caracteristicas,idEntidade,ativo,local,email) VALUES ('$nomeEvento','$descricao','$uI','$dataInicio','$dataFim','$nV','$caracteristicas','$entidadeID','sim','$local','$emailRep')");

                header ("Location: eventForm.php");

                }
            }else{

                echo "<script type='text/javascript>alert('Esta entidade não existe! Por favor insira uma entidade existente.')</script> ";
                header ("Location: eventForm.php?message='Esta entidade não existe!'");
            }
    }
}

function queryCardsAtuais(){  //Eventos atuais
    $host = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $dbname = "servoluntario";
    $dbcon = new mysqli($host, $dbusername, $dbpassword, $dbname);

    $date = mysqli_query($dbcon, "SELECT DATE(SYSDATE()) as data");
    $date = mysqli_fetch_array($date);
    $date = $date["data"];
    $query ="SELECT * FROM eventos WHERE dataInicio >= $date";
    $result = mysqli_query($dbcon, $query);

    $idInfo = $_GET['id'];

    if(mysqli_num_rows($result)>0){
        $row = mysqli_fetch_array($result);
        if($row['dataInicio'] >= $date){

        $entidadeID=$row['idEntidade'];   
        }
    }    

    if($query){
        
        while($row = mysqli_fetch_array($result)){

            $nVol = mysqli_query($dbcon, "SELECT COUNT(idUser) as count FROM inscritos WHERE idEvento = '$row[id]'");
            $nVol = mysqli_fetch_array($nVol);
            $nVol = $nVol['count'];

            $imagens = mysqli_query($dbcon, "SELECT image as infos FROM entidade WHERE representante = '$row[email]'");
            $imagens = mysqli_fetch_array($imagens);
            $imagens = $imagens['infos'];

            echo "<div class='column'>
                        <div class='content'>
                        <img src='data:image/jpeg;base64,".base64_encode($imagens )."' height='200' width='200' class='img-thumnail' />  
                        <h6>" . $row['dataInicio'] . ", " . $row['dataFim'] . "</h6>
                        <p class='title'>" . $row['title'] . "</p>
                        <p> Área de Intervenção: " . $row['uIntervencao'] . "</p>
                        <p> Voluntários Necessários: " . $row['nVoluntarios'] . "</p>
                        <p> Inscrições: " . $nVol . "/" . $row['nVoluntarios'] . "</p>
                        <p><button class='button'><a href='eventDetails.php?id=$row[id]&idInfo=$idInfo'>Ver mais</a></button></p>
                    </div>
                </div>";
        }
    }
    else{
        echo "<p> De momento, não existem eventos a decorrer. </p>";
    }

}

function queryEntidades () //ENTIDADES ASSOCIADAS À CAUSA
{
    $host = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $dbname = "servoluntario";
    $dbcon = new mysqli($host, $dbusername, $dbpassword, $dbname);
    $query = mysqli_query($dbcon,"SELECT * FROM entidade");

    if($query){
        while($row = mysqli_fetch_array($query)){
            echo '<div class="column">
                    <div class="content">
                    <p><img src="data:image/jpeg;base64,'.base64_encode($row['image'] ).'" height="200" width="200" class="img-thumnail" />    </a></p>
                        
                    </div>
                </div>
                ';
        }
    }
}

if(isset($_POST['inscrever_btn_Vol'])){ //INSCREVER NUM EVENTO

    $host = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $dbname = "servoluntario";
    $dbcon = new mysqli($host, $dbusername, $dbpassword, $dbname);

    $idEvento = $_GET['idInscricaoUser'];
    $idInfo = $_GET['idInfo'];
    $passVol = md5($_POST['passVol']);
    $emailVol = $_POST['emailVol'];

    $queryIdUser = mysqli_query($dbcon, "SELECT * FROM inscritos WHERE idUser = '$idInfo' AND idEvento = '$idEvento' ");

    if(mysqli_num_rows($queryIdUser)>0){
        echo "<p>  Já está inscrito neste evento </p>";
    }
    else {

        mysqli_query($dbcon, "INSERT INTO inscritos (idUser, idEvento) VALUES ($idInfo, $idEvento)");
        header("Location: entrar.php?id=$idInfo");

    }    

}

function queryCardsAtuaisIndex(){  //EVENTOS ATUAIS SEM LOGIN EFETUADO
    $host = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $dbname = "servoluntario";
    $dbcon = new mysqli($host, $dbusername, $dbpassword, $dbname);

    $date = mysqli_query($dbcon, "SELECT DATE(SYSDATE()) as data");
    $date = mysqli_fetch_array($date);
    $date = $date["data"];
    $query = "SELECT * FROM eventos WHERE dataInicio >= $date";

    $result = mysqli_query($dbcon, $query);

    if(mysqli_num_rows($result)>0){
        $row = mysqli_fetch_array($result);
        if($row['dataInicio'] >= $date){

        $entidadeID=$row['idEntidade'];   
        }
    }    

    if($query){
        
        while($row = mysqli_fetch_array($result)){

            $nVol = mysqli_query($dbcon, "SELECT COUNT(idUser) as count FROM inscritos WHERE idEvento = '$row[id]'");
            $nVol = mysqli_fetch_array($nVol);
            $nVol = $nVol['count'];

            $imagens = mysqli_query($dbcon, "SELECT image as infos FROM entidade WHERE representante = '$row[email]'");
            $imagens = mysqli_fetch_array($imagens);
            $imagens = $imagens['infos'];

            echo "<div class='column'>
                        <div class='content'>
                        <img src='data:image/jpeg;base64,".base64_encode($imagens )."' height='200' width='200' class='img-thumnail' />  
                        <h6>" . $row['dataInicio'] . ", " . $row['dataFim'] . "</h6>
                        <p class='title'>" . $row['title'] . "</p>
                        <p> Área de Intervenção: " . $row['uIntervencao'] . "</p>
                        <p> Voluntários Necessários: " . $row['nVoluntarios'] . "</p>
                        <p> Inscrições: " . $nVol . "/" . $row['nVoluntarios'] . "</p>
                        <p><button class='button'><a href='Login.php'>Ver mais</a></button></p>
                    </div>
                </div>";
        }
    }
    else{
        echo "<p> De momento, não existem eventos a decorrer. </p>";
    }

}

function queryAtuaisTodosEnt () //EVENTOS ATUAIS DE DETERMINADA ENTIDADE
{
    $host = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $dbname = "servoluntario";
    $dbcon = new mysqli($host, $dbusername, $dbpassword, $dbname);

    
    $date = mysqli_query($dbcon, "SELECT DATE(SYSDATE()) as data");
    $date = mysqli_fetch_array($date);
    $date = $date["data"];

    $idEvent = $_GET['idEntity'];

    $query = mysqli_query($dbcon,"SELECT * FROM eventos WHERE dataInicio >= $date AND idEntidade = $idEvent");

    if(mysqli_num_rows($query)>0){
        $row = mysqli_fetch_array($query);
        if($row['dataInicio'] >= $date){

        $entidadeID=$row['idEntidade'];   
        }
    } 


    if ($query) {
        while($row = mysqli_fetch_array($query)){

            $nVol = mysqli_query($dbcon, "SELECT COUNT(idUser) as count from inscritos WHERE idEvento = '$row[id]'");
            $nVol = mysqli_fetch_array($nVol);
            $nVol = $nVol['count'];

            echo "<div class='column'>
                    <div class='content'>
                    <img src = 'images/logos/bacb.png'> 
                    <h6>" . $row['dataInicio'] . ", " . $row['dataFim'] . "</h6>
                    <p class='title'>" . $row['title'] . "</p>
                    <p> Área de Intervenção: " . $row['uIntervencao'] . "</p>
                    <p> Voluntários Necessários: " . $row['nVoluntarios'] . "<p>
                    <p> Inscrições: " . $nVol . "/" . $row['nVoluntarios'] . "</p>
                        <p><button class='button'><a href='eventDetails.php?id=$row[id]'>Ver mais</a></button></p>
                        
                    </div>
                </div>
                
                ";
        }
    }
    else{
        echo "<p> Não existem eventos a decorrer. </p>";
    }
}

function queryTodosEnt () //TODOS OS EVENTOS DE DETERMINADA ENTIDADE
{

    $host = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $dbname = "servoluntario";
    $dbcon = new mysqli($host, $dbusername, $dbpassword, $dbname);

    
    $date = mysqli_query($dbcon, "SELECT DATE(SYSDATE()) as data");
    $date = mysqli_fetch_array($date);
    $date = $date["data"];

    $idEvent = $_GET['idEntity'];

    $query = mysqli_query($dbcon,"SELECT * FROM eventos WHERE idEntidade = $idEvent");




    if ($query) {
        while($row = mysqli_fetch_array($query)){

            $nVol = mysqli_query($dbcon, "SELECT COUNT(idUser) as count from inscritos WHERE idEvento = '$row[id]'");
            $nVol = mysqli_fetch_array($nVol);
            $nVol = $nVol['count'];

            echo "<div class='column'>
                    <div class='content'>
                    <img src = 'images/logos/bacb.png'> 
                    <h6>" . $row['dataInicio'] . ", " . $row['dataFim'] . "</h6>
                    <p class='title'>" . $row['title'] . "</p>
                    <p> Área de Intervenção: " . $row['uIntervencao'] . "</p>
                    <p> Voluntários Necessários: " . $row['nVoluntarios'] . "<p>
                    <p> Inscrições: " . $nVol . "/" . $row['nVoluntarios'] . "</p>
                        <p><button class='button'><a href='eventDetails.php?id=$row[id]'>Ver mais</a></button></p>
                        
                    </div>
                </div>
                
                ";
        }
    }
    else{
        echo "<p> Não existem eventos relacionados a esta entidade. </p>";
    }
}

function queryEntidadesIndex () //ENTIDADES ASSOCIADAS À CAUSA
{
    $host = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $dbname = "servoluntario";
    $dbcon = new mysqli($host, $dbusername, $dbpassword, $dbname);
    $query = mysqli_query($dbcon,"SELECT * FROM entidade");

    if($query){
        while($row = mysqli_fetch_array($query)){
            echo '<div class="column">
                    <div class="content">
                        <p><a href="Login.php?"> <img src="data:image/jpeg;base64,'.base64_encode($row['image'] ).'" height="200" width="200" class="img-thumnail" />    </a></p>
                        
                    </div>
                </div>
                ';
        }
    }
}

function queryCardsRep ()  //INDEX REPRESENTANTE, EVENTOS
    {
        $host = "localhost";
        $dbusername = "root";
        $dbpassword = "";
        $dbname = "servoluntario";
        $dbcon = new mysqli($host, $dbusername, $dbpassword, $dbname);

        $emailRep = $_GET['id'];

        $query = "SELECT * FROM eventos WHERE email = '$emailRep'";

        $result = mysqli_query($dbcon, $query);

        if($query){

            while($row = mysqli_fetch_array($result)){

                $nVol = mysqli_query($dbcon, "SELECT COUNT(idUser) as count from inscritos WHERE idEvento = '$row[id]'");
                $nVol = mysqli_fetch_array($nVol);
                $nVol = $nVol['count'];

                $imagens = mysqli_query($dbcon, "SELECT image as infos FROM entidade WHERE representante = '$emailRep'");
                $imagens = mysqli_fetch_array($imagens);
                $imagens = $imagens['infos'];

                echo "<div class='column'>
                        <div class='content'>
                        <img src='data:image/jpeg;base64,".base64_encode($imagens )."' height='200' width='200' class='img-thumnail' />
                            <h6>" . $row['dataInicio'] . ", " . $row['dataFim'] . "</h6>
                            <p class='title'>" . $row['title'] . "</p>
                            <p> Área de Intervenção: " . $row['uIntervencao'] . "</p>
                            <p> Voluntários Necessários: " . $row['nVoluntarios'] . "</p>
                            <p> Inscrições: " . $nVol . "/" . $row['nVoluntarios'] . "</p>
                            <p><button class='button'><a href='eventDetailsRep.php?id=$row[id]'>Ver mais</a></button></p>
                        </div>
                    </div>";
            }
        }
        else{
            echo "<p> Não existem eventos relacionados a esta entidade. </p>";
        }

    }


?>
