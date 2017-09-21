<!DOCTYPE html>
<html>
<head>
	<?php include 'head.php'; ?>
</head>
<body>
	<header>
		<?php include 'nav.php'; ?>
	</header>
	<main class="row">
		<section class="card-panel center-align col s12 m7">
			<h5><?= $article->getTitle(); ?></h5>
			<span><?= $article->getAuthor(); ?></span>
			<p>
				<?= $article->getContent(); ?>
			</p>
		</section>
		<section class="center-align col s12 m4 push-m1">
					<ul class="collapsible hoverable" data-collapsible="accordion">
				    	<li>
					      <div class="collapsible-header">
					      	<div class="container center-align">
					        	<p>Commenter le chapitre</p>
					        </div>
					      </div>
					      
					      <div class="collapsible-body">
					        <!-- Appel des différents champs de formulaire -->
					      </div>
					    </li>
				    </ul>
					<?php foreach ($comments as $comment) : ?>
				   		<div class="section">
							<p><?= $comment->getAuthor(); ?></p>
							<p><?= $comment->getCreationDate(); ?></p>
							<article>
								<?= $comment->getContent(); ?>
							</article>
						<div class="divider"></div>	
					  	</div>
					<?php endforeach; ?>
		</section>
	</main>
	<?php include 'footer.php' ?>
	<?php include 'js-script.php'; ?>
</body>
</html>