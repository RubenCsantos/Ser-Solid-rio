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
$query = mysqli_query($conn, 'SELECT * FROM eventos'); // Get data from Database from demo table
 
 
    $delimiter = ';';
    $filename = "listaEvento.csv"; // Create file name
     
    //create a file pointer
    $f = fopen('php://memory', 'w'); 

    fputs($f, $bom =( chr(0xEF) . chr(0xBB) . chr(0xBF) ));
 
     
    //set column headers
    $fields = array('Entidade', 'Evento', 'U.Intervenção', 'Data de Início', 'Data de Fim', 'Nº Voluntários');
    fputcsv($f, $fields, $delimiter);
     
    //output each row of the data, format line as csv and write to file pointer
    while($row = $query->fetch_assoc()){
        
        $lineData = array($row['idEntidade'], $row['title'], $row['uIntervencao'], $row['dataInicio'], $row['dataFim'], $row['nVoluntarios']);
        fputcsv($f, $lineData, $delimiter);
    }
     
    //move back to beginning of file
    fseek($f, 0);
     
    //set headers to download file rather than displayed
    header('Content-Encoding: UTF-8');
    header('Content-type: text/csv; charset=UTF-8');
    header('Content-Disposition: attachment; filename="' . $filename . '";');   
     
    //output all remaining data on a file pointer
    fpassthru($f);
 
 }
}
?>