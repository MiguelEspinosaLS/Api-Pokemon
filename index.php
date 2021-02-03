<!DOCTYPE html>
<html lang="es">
<!--Cabecera-->
<head>

	<!--Metainformation-->
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Pokemon API</title>
	<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
	
	<link rel="stylesheet" href="css/bootstrap.css">
	  	<style>
		 body {
			 background-image: url("https://free4kwallpapers.com/uploads/originals/2018/06/18/created-a-3d-render-of-a-pokemon-trophy-in-the-grass-wallpaper.jpg");
			 background-size: 400%;
			}
			h5{
				color: whitesmoke;
				text-shadow: 2px 2px 8px #000000;
			}
			h6{
				color: whitesmoke;
				text-shadow: 2px 2px 8px #000000;
			}
		</style>
</head>
<body class="text-center bg-light border">

	<!--Script (JavaScrip) de validación entre rango de números admitidos para
	la solicitud de la api http://pokeapi.co/api/v2/pokemon/-->
	<script>
		function validateForm(){
			var idEntered = document.forms["pokeForm"]["id"].value;
  				if (idEntered > 898 || idEntered < 1){
  					document.getElementById('errors').innerHTML="Ingresa un número entre 1 y 898.";
  					return false;
  				}
  				if (isNaN(idEntered)==true){
  					document.getElementById('errors').innerHTML="Debes ingresar un número.";
  					return false;
  				}
  		}
	  </script>
	  
	<!--Formulario web(Html) que permite al usuario introducir datos, los cuales 
	son enviados al un servidor para ser procesados.-->
	<br>
	<img src="img/logo.png" class="img-fluid "  width="30%" height="30%">
  	<p><h5>Ingresa el ID del Pokémon:</h5> </p>
 	<form  name="pokeForm" action="" onsubmit="return validateForm()" method="post">
  		<fieldset class="form-group ">
		  <input type="text" name="id" placeholder="ID entre 1 y 898:" required  maxlength="3" />
		  
		  <br>
		  <div id="errors"></div>
	  </fieldset>  	
	  <br>
	  <input type="submit" class="btn btn-primary" />
	  <br>
  	</form>
	<hr>
	
	<!--Obtención de recursos (PHP) de la API por medio de la variable id.-->
	  <?php
	  
		  //Variables//
		  $pokemon = isset($pokemon) ? $pokemon : '';
		  $pokemonId = isset($pokemonId) ? $pokemonId : '';
		  $apiUrl = isset($apiUrl) ? $apiUrl : '';
		  $response = isset($response) ? $response : '';
		  $imgFrontal = isset($imgFrontal) ? $imgFrontal : '';
		  $imgTrasera = isset($imgTrasera) ? $imgTrasera : '';
		  $J = isset($J) ? $J : '';
		  $K = isset($K) ? $K : '';
		  $w = isset($w) ? $w : '';
		  $e = isset($e) ? $e : '';
		  $i = isset($i) ? $i : '';
		  //Variables//
		if(ISSET($_POST['id'])){
			
			$pokemonId = $_POST['id']; //Asignación del ID
			$apiUrl = 'http://pokeapi.co/api/v2/pokemon/'; //Asignación de la dirección url de la API
			$pokemon = $apiUrl.$pokemonId;
			$response = file_get_contents($pokemon);
			$response = json_decode($response, true);
			//$json = json_decode($response);
			$imgFrontal = $response['sprites']['front_default']; //Asignación para imagen frontal
			$imgTrasera = $response['sprites']['back_default']; //Asignación para imagen trasera
		}

		// Impresión de datos //
			if($response){
			//Imagen frontal//
			echo "<img src='$imgFrontal'>";
			//Imagen trasera//
			echo "<img src='$imgTrasera'>"; 
			//Nombre//
			echo "<p><h6>Nombre: {$response['name']}</h6> </p>";
			//ID//
			echo "<p><h6>ID: {$response['id']}</h6> </p>";
			}
			
			//Experiencia//
			
			if(is_array($response) || is_object($$response))
			foreach($response as $J => $K) {
				//if(is_array($J) || is_object($J))
				if($J=="base_experience"){
				//echo "<h6> $J: <h6> ";//Variable de base_experience
				echo "<p><h6>Experiencia: {$response[$J]}</h6></p>";
				}
			}
			//Altura//
			if(is_array($response) || is_object($$response))
			foreach($response as $J => $K) {
				if($J=="height"){
				//echo "<h6> $J: <h6> ";//Variable de height
				echo "<p><h6>Altura: {$response[$J]}</h6></p>";
				}
			}
			//Peso//
			if(is_array($response) || is_object($$response))
			foreach($response as $J => $K) {
				if($J=="weight"){
				//echo "<h6> $J: <h6> ";//Variable de weight
				echo "<p><h6>Peso: {$response[$J]}</h6></p>";
				}
			}
			//Habilidades//
			if(is_array($response) || is_object($$response))
			foreach($response as $J => $K) {
				if($J=="abilities"){
				echo "<h6>Habilidades: ";
				//echo "<h6> $J: <h6> ";//Variable de abilities
					foreach($K as $w => $e) {
						foreach($e as $h => $i) {
							echo " {$i['name']}"; 
						}
					}
				}echo "</h6>"; 
			}
			//Tipo//
			if(is_array($response) || is_object($$response))
			foreach($response as $J => $K) {
				if($J=="types"){
				echo "<h6>Tipo: ";
				//echo "<h6> $J: <h6> ";//Variable de abilities
					foreach($K as $w => $e) {
						foreach($e as $h => $i) {
							echo "{$i['name']}"; 
						}
					}
				}echo "</h6>";
			}
			//Movimientos//
			if(is_array($response) || is_object($$response))
			foreach($response as $J => $K) {
				if($J=="moves"){
				echo "<h6>Movimientos: ";
				//echo "<h6> $J: <h6> ";//Variable de movimientos
					foreach($K as $w => $e) {
						foreach($e as $h => $i) {
							echo " {$i['name']}"; 
						}
					}
				}echo "</h6>"; 
			}
		//Impresión de datos //

		//Prueba de For//
			// echo "<p>For por clave</p>"; 
			// foreach($response as $i => $value2) {
			// 	echo "{$response[$i]} , "; 
			// }		
			// echo "<p>3 For </p>"; 
			// foreach($response as $J => $K) {
			// 	echo "<br>$J: ";
				
			// 	foreach($K as $w => $e) {
			// 		//echo "esta es w$w"; 
			// 		foreach($e as $h => $i) {
			// 			//echo "ESTE_H$h "; 
			// 			echo " {$i['name']}, "; 
			// 		}
			// 	}
			// }
		//Prueba de For//
		 ?>
</body>
</html>



