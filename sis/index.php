<?php require_once 'common/config.php'; ?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta lang="ES">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="robots" content="noindex">
	<title>::Bienvenido::</title>
	<link rel="stylesheet" type="text/css" href="view/app/css/bootstrap.css">
	<style type="text/css">
		.general {
			position: relative;
		}
		.contenido {
		    margin-top: 15%;
		    width: 100%;
		    height: 250px;
		    padding-top: 55px;
		    text-align: center;
		}

		.contenido span{
			font-size:<?= FONT_SIZE; ?>;
			color:<?= COLOR_END; ?>;
			letter-spacing: 1px;
			animation: hdc-name 2s;
		}

		body{
			background:<?= BACKGROUND_END; ?>;
			animation: hdc-body 3s;
		}

		.contenido p{
			color: <?= COLOR_END; ?>;
			letter-spacing: 1px;
			animation: hdc-eslogan <?= TIME_REDIRECT; ?>;	
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
				letter-spacing: 20px;
			}

			100%{
				color:<?= COLOR_END; ?>;
				letter-spacing: 1px;
			}

		}

		@keyframes hdc-eslogan{

			0%{
				color: <?= COLOR_GO; ?>;	
				opacity: 0;
				letter-spacing: -5px;
			}

			100%{
				color:<?= COLOR_END; ?>;
				opacity: 1;
				letter-spacing: 1px;
			}	

		}	
	</style>
</head>
<body>
	<center class="general">
		<div class="contenido">
			<span><?= EMP_NAME_GO; ?></span>
			<p><small><?= EMP_SLOGAN_GO; ?></small></p>
		</div>
	</center>

	<script type="text/javascript">	
		setTimeout("location.href='view/index.php'", <?= TIME_REDIRECT; ?>);
	</script>
</body>
</html>