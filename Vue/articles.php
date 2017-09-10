<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="style.css">
	<title>Accueil</title>
</head>
<body>
	<h1>Blog de jean Forteroche</h1>

	<main>
		<section>
			<?php foreach ($articles as $article): ?>
			 <h3><?= $article->getTitle(); ?></h3>
			 <p>
			 	<?= $article->getAuthor(); ?> le <span><?= $article->getCreationDate(); ?></span>
			 </p>
			 <p>
			 	<?= $article->getContent(); ?>
			 </p>
			<?php endforeach; ?>
		</section>
	</main>
</body>
</html>