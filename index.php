<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Principal</title>
	<link rel="stylesheet" type="text/css" href="./style/main.css" />
	<script href="https://releases.jquery.com/git/jquery-git.js"></script>
	<script href="main.js"></script>
</head>

<body>
	<div id="container">
		<?php
		
			include_once("./menu.php");

			$page = null;
			if(isset($_GET['pagina'])) {
				$page = $_GET['pagina'];
			}

			switch ($page){
				case "livro":
				include_once "./View/LivroView.php";
				break;
				case "autor": 
				include_once "./View/AutorView.php";
				break;
				default:
				include_once "./View/InicioView.php";
				break;
			}
		?>
		
	</div>
</body>

</html>
