<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<title>Calendário de Eventos</title>
<link rel="stylesheet" href="css/calendar.css">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<script src="https://kit.fontawesome.com/ae49626ea4.js" crossorigin="anonymous"></script>
<link rel="stylesheet" type="text/css" href="estilos.css">

<style>

		body {
		overflow-y: hidden; /* Hide vertical scrollbar */

		}

		h1{
			margin: 0;
			padding: 0 0 20px;
			text-align: center;
			font-size: 22px;
			color: #0c2340;
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
		}

		.footer a{
		text-decoration: none;
		color:  #0c2340;
		font-size: 8pt;
		}

		.top_line{
			margin-left: 140px;
			margin-right: 140px;
			border-top: 1px solid  #0c2340;
		}

</style>		
</head>

<div class="container">
      <div class="logo">
	  <a href="entrar.php"><img src="images/ubi_logo.png" style="width: 100%"></a>
      </div>
	  <br><br><br><br>
<div class="container2">		
	<div class="page-header">
	<h1>Consulte aqui todos os eventos agendados</h1>
	<div class="top_line"></div>
	<br><br>
		<div class="pull-right form-inline">
			<div class="btn-group">
				<button class="btn btn-primary" data-calendar-nav="prev"><< Anterior</button>
				<button class="btn btn-default" data-calendar-nav="today">Hoje</button>
				<button class="btn btn-primary" data-calendar-nav="next">Próximo >></button>
			</div>
			<div class="btn-group">
				<button class="btn btn-warning" data-calendar-view="year">Ano</button>
				<button class="btn btn-warning active" data-calendar-view="month">Mês</button>
				<button class="btn btn-warning" data-calendar-view="week">Semana</button>
				<button class="btn btn-warning" data-calendar-view="day">Dia</button>
			</div>
		</div>
		<h3></h3>
		<br><br>

	</div>
	<div class="row">
		<div class="col-md-9">
			<div id="showEventCalendar"></div>
		</div>
		<div class="col-md-3">
			<h1>Lista de todos os eventos:</h1>
			<ul id="eventlist" class="nav nav-list"></ul>
		</div>
	</div>	
</div>
<br><br>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.8.3/underscore-min.js"></script>
<script type="text/javascript" src="js/calendar.js"></script>
<script type="text/javascript" src="js/events.js"></script>


</body></html>	
