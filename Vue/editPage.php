<!DOCTYPE html>
<html>
<head>
	<?php include 'head.php'; ?>
</head>
<body>
	<header>
		<?php include 'navadmin.php'; ?>
	</header>
	<main>
		<div class="container">		
			<form method="post" action="./index.php?artEdit">
				<label for="title">Titre du chapitre</label>
				<input type="text" name="title" value="<?= $editArticle->getTitle(); ?>">
				<textarea id="content" name="content">
					<?= $editArticle->getContent(); ?>
				</textarea>
				<input type="hidden" name="artId" value="<?= $editArticle->getId(); ?>">
				<p class="center-align">
					<input class="btn green" type="submit" value="Valider">
					<a class="btn red" href="./index.php?sign-in">Annuler</a>
				</p>
				
			</form>

		</div>
	</main>
	<?php include 'footer.php'; ?>

	<script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=6qiy71l2nn0fxtpjr8qzomcxo3py0h13e4b9jkdvavuzb2tn"></script>
	<script>tinymce.init({ selector:'textarea' });</script>
</body>
</html>