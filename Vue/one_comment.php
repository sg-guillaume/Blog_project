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
			<p>
				<span>Commentaire de : </span>
				<span><?= $comment->getAuthor(); ?></span>
			</p>		
			<form method="post" action="./index.php?comEdit">
				<textarea id="content" name="content">
					<?= $comment->getContent(); ?>
				</textarea>
				<p class="center-align">
					<input class="btn green" type="submit" value="Modérer">
					<a class="btn red" href="./index?comDelete&id=<?= $comment->getId(); ?>">Supprimer</a>
				</p>
				
			</form>

		</div>
	</main>
	<?php include 'footer.php'; ?>

	<script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=6qiy71l2nn0fxtpjr8qzomcxo3py0h13e4b9jkdvavuzb2tn"></script>
	<script>tinymce.init({ selector:'textarea' });</script>
</body>
</html>