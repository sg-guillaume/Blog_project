<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<title>Accueil</title>

	<!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
	<!-- Compiled and minified CSS -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
	
	<!-- Compiled and minified JavaScript -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
</head>
<body>

	<header>
		
		<nav>
		  <div class="nav-wrapper">
		    <a href="#" class="brand-logo">Jean Forteroche</a>
		    <ul id="nav-mobile" class="right hide-on-med-and-down">
		      <li><a href="#">Biographie</a></li>
		      <li><a href="#">Chapitres</a></li>
		      <li><a href="#">Contact</a></li>
		      <li><a href="#">Inscription</a></li>
		    </ul>
		  </div>
		</nav>
		      
	</header>
	<div class="container center-align">
		<h2>Tous les chapitres</h2>
	</div>
		


	<main>
		<section class="section">
			<div class="row">
			<?php foreach ($articles as $article): ?>
				
				  <div class="col s12 m4">
				    <ul class="collapsible hoverable" data-collapsible="accordion">
				    	<li>
					      <div class="collapsible-header">
					      	<div class="container center-align">
					        	<h5><?= $article->getTitle(); ?></h5>
					        	<span><?= $article->getAuthor() . ' le ' . $article->getCreationDate(); ?></span>
					        </div>
					      </div>
					      
					      <div class="collapsible-body">
					        <p><?= $article->getContent(); ?></p>
					      </div>
					    </li>
				    </ul>
				  </div>
										
			<?php endforeach; ?>
			</div>
		</section>
	</main>
	
</body>
</html>