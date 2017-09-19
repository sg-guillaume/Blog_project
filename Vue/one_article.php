<!DOCTYPE html>
<html>
<head>
	<?php include 'head.php'; ?>
</head>
<body>
	<header>
		<?php include 'nav.php'; ?>
	</header>
	<main class="container">
		<section class="card-panel center-align col s12 m12">
			<h5><?= $article->getTitle(); ?></h5>
			<p><?= $article->getAuthor(); ?></p>
			<article>
				<?= $article->getContent(); ?>
			</article>
		</section>
	</main>
	<?php include 'footer.php' ?>
	<?php include 'js-script.php'; ?>
</body>
</html>