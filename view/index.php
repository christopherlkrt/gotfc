<!DOCTYPE html>
<html>
<head>
	
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" type="text/css" href="../css/dataTables.bootstrap.min.css">
    <script src="../js/jquery-3.2.1.min.js"></script>
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <script src="../js/jquery.dataTables.min.js"></script>
    <script src="../js/dataTables.bootstrap.min.js"></script>
	
	<title>Guerra das Tronos</title>

	<script>
		$(document).ready(function() {
            
            $("#familiab").click(function(){
                $("#conteudo").load("familia.php");
            });

            $("#guerrab").click(function(){
                $("#conteudo").load("guerra.php");
            });

            });
	</script>
</head>
<body>
	<div>
		<video autoplay muted loop>
			<source src="../media/jn.mp4" type="video/mp4">
			</video>
		</div>
		<div class="container todo">
		<div class="btn-group meio">
			<button type="button" id="familiab" class="btn btn-default">Familia</button>
			<button type="button" id="guerrab" class="btn btn-danger">Guerra</button>
		</div>

		<div id="conteudo" class="meio"></div>
		</div>
	</body>
	</html>

