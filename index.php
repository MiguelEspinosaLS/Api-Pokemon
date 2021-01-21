<!DOCTYPE html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Get Pokemon from ID</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="./css/style.css">

  <script>
		function validateID(){
			var idEntered = document.forms["pokeForm"]["id"].value;
			if (idEntered > 721 || idEntered < 1){
				document.getElementById('errors').innerHTML="Enter number between 1 and 721.";
				return false;
			}
			if (isNaN(idEntered)==true){
				document.getElementById('errors').innerHTML="Must enter a number.";
				return false;
			}
		}
  </script>

</head>
<body>	

  <div class="row">
	<div class="col-md-6">
		<div class="card">
			<h2>Obtener pokemon por ID</h2>
			<p>Ingresa el ID:</p>
			<form name="pokeForm" action="" onsubmit="return validateID()" method="get">
				<input type="text" name="id" placeholder="ID" required />
				<div id="errors"></div>				 	
				<input type="submit" class="btn btn-primary" value="Consultar"/>
			</form>
		</div>	
	</div>

	<div class="col-md-6">
		<div class="card">
			<h2>Obtener pokemon por nombre</h2>
			<p>Ingresa el nombre:</p>
			<form name="pokeForm" action="" onsubmit="return validateForm()" method="get">
				<input type="text" name="name" placeholder="Nombre" required />
				<div id="errors"></div>				 	
				<input type="submit" class="btn btn-primary" value="Consultar"/>
			</form>
		</div>	
	</div>
  </div>
 
  

	<?php

		echo "Prueba merge entre ramas GITHUB";

		if(ISSET($_GET['id'])){

			$pokemonId = $_GET['id'];
			$apiUrl = 'http://pokeapi.co/api/v2/pokemon/';
			$pokemon = $apiUrl.$pokemonId;
			$response = file_get_contents($pokemon);
			$response = json_decode($response, true);
			$sprite = $response['sprites']['front_default'];
			echo "
			<div class='row'>
				<div class='col-md-6'>
					<div class='card card-pokemon'>
						<img src='$sprite'/>
						<p>ID: {$response['id']} </p>  
						<p>Nombre: {$response['name']} </p> 
					</div>
				</div>
			</div>
			<br>";	
		}

		if(ISSET($_GET['name'])){

			$pokemonId = $_GET['name'];
			$apiUrl = 'http://pokeapi.co/api/v2/pokemon/';
			$pokemon = $apiUrl.$pokemonId;
			$response = file_get_contents($pokemon);
			$response = json_decode($response, true);
			$sprite = $response['sprites']['front_default'];
			echo "
			<div class='row'>
				<div class='col-md-6'>
					<div class='card card-pokemon'>
						<img src='$sprite'/>
						<p>ID: {$response['id']} </p>  
						<p>Nombre: {$response['name']} </p> 
					</div>
				</div>
			</div>
			<br>";
		}

	?>


</body>
</html>



