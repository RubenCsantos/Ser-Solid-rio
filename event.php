<?php
include_once("db_connect.php");
$resultset = mysqli_query($conn, "SELECT id, title, dataInicio, dataFim FROM eventos");
$calendar = array();
while( $rows = mysqli_fetch_assoc($resultset) ) {	
	// convert  date to milliseconds
	$start = strtotime($rows['dataInicio']) * 1000;
	$end = strtotime($rows['dataFim']) * 1000;	
	$calendar[] = array(
        'id' =>$rows['id'],
        'title' => $rows['title'],
        'url' => "#",
		"class" => 'event-important',
        'start' => "$start",
        'end' => "$end"
    );
}
$calendarData = array(
	"success" => 1,	
    "result"=>$calendar);
echo json_encode($calendarData);
exit;
?>