<!DOCTYPE html>
<html>
<head>
	<?php include 'head.php'; ?>
</head>
<body>

	<header>
		
		<?php include 'nav.php'; ?>
		      
	</header>
	<div class="container center-align">
		<h2>Tous les chapitres</h2>
	</div>
		


	<main>
		<section class="container section">
			<div class="row">
			<?php foreach ($articles as $article): ?>
				
				  <div class="col s12 m12">
				    <ul class="collapsible hoverable" data-collapsible="accordion">
				    	<li>
					      <div class="collapsible-header">
					      	<div class="container center-align">
					        	<h5><?= $article->getTitle(); ?></h5>
					        	<span><?= $article->getAuthor() . ' le ' . $article->getCreationDate(); ?></span>
					        </div>
					      </div>
					      
					      <div class="collapsible-body">
					        <p class="truncate"><?= $article->getContent(); ?></p>
					        <a href="./index.php?id=<?= $article->getId(); ?>">Lire le chapitre</a>
					      </div>
					    </li>
				    </ul>
				  </div>
										
			<?php endforeach; ?>
			</div>
		</section>
	</main>
	<?php include 'footer.php'; ?>
	<?php include 'js-script.php'; ?>
</body>
</html>