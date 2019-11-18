<?php require_once 'common/config.php'; ?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta lang="ES">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="robots" content="noindex">
	<title>::Cerrando Sesión::</title>
	<link rel="stylesheet" type="text/css" href="view/app/css/bootstrap.css">
	<style type="text/css">
		.general {
			position: relative;
		}
		.contenido {
		    margin-top: 15%;
		    width: 250px;
		    height: 250px;
		    padding-top: 55px;
		    text-align: center;
		}

		.contenido span{
			font-size:30px;
			color:<?= COLOR_END; ?>;
			letter-spacing: 1px;
			animation-duration: 3s;
			animation-name: hdc-name;
		}

		body{
			background:<?= BACKGROUND_END; ?>;
			animation-duration: 4s;
			animation-name: hdc-body;
		}

		.contenido p{
			color: <?= COLOR_END; ?>;
			letter-spacing: 1px;
			animation-duration: 4s;
			animation-name: hdc-eslogan;	
		}

		@keyframes hdc-body{

			0%{
				background:<?= BACKGROUND_GO; ?>;	
			}

			90%{
				background:<?= BACKGROUND_END; ?>;	
			}

			100%{
				background:<?= BACKGROUND_GO; ?>;	
			}
		}

		@keyframes hdc-name{

			0%{
				color: <?= COLOR_GO; ?>;	
			}

			100%{
				color:<?= COLOR_END; ?>;
			}

		}

		@keyframes hdc-eslogan{

			0%{
				color: <?= COLOR_GO; ?>;	
				opacity: 0;
			}

			100%{
				color:<?= COLOR_END; ?>;
				opacity: 1;
			}	

		}	
	</style>
</head>
<body>
	<center class="general">
		<div class="contenido">
			<span>CERRANDO...</span>
			<p><small>Será redirigido a la página de inicio.</small></p>
		</div>
	</center>

	<script type="text/javascript">	
		setTimeout("location.href='index.php'", 4000);
	</script>
</body>
</html>