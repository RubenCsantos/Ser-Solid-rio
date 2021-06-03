<?php
// Database Connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "servoluntario";
 
 $conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
 
if(isset($_GET['export'])){
if($_GET['export'] == 'true'){
$query = mysqli_query($conn, 'select * from users2 where userType = "0"'); // Get data from Database from demo table
 
 
    $delimiter = ';';
    $filename = "lista.csv"; // Create file name
     
    //create a file pointer
    $f = fopen('php://memory', 'w'); 

    fputs($f, $bom =( chr(0xEF) . chr(0xBB) . chr(0xBF) ));
     
    //set column headers
    $fields = array('Nome', 'Sobrenome', 'Email', 'Contacto', 'Localidade', 'Data de Nascimento', 'Autorização de Dados', 'Hora Disp', 'Dia Disp');
    fputcsv($f, $fields, $delimiter);
     
    //output each row of the data, format line as csv and write to file pointer
    while($row = $query->fetch_assoc()){
        
        $lineData = array($row['nome'], $row['sobrenome'], $row['email'], $row['contactoTel'], $row['localidade'], $row['dataNascimento'], $row['autoriza'], $row['horaDisp'], $row['diaDisp']);
        fputcsv($f, $lineData, $delimiter);
    }
     
    //move back to beginning of file
    fseek($f, 0);
     
    //set headers to download file rather than displayed
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename="' . $filename . '";');
     
    //output all remaining data on a file pointer
    fpassthru($f);
 
 }
}
?>