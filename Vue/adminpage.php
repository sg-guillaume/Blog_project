<!DOCTYPE html>
<html>
	<head>
		<?php include 'head.php'; ?>
	</head>
<body>
	<header>
		<?php include 'navadmin.php' ?>
	</header>

	<main>
		<div class="container">
			<div class="row">
				<div class="collection col s12 m6 pull-m1">
						<div class="collection-item center-align"><h5>Chapitres</h5></div>
				  <?php foreach ($articles as $article) : ?>
				  	<div class="collection-item">
				  		<span class="badge">
					  		<a href="./index.php?artEdit&artId=<?= $article->getId(); ?>"><i class="material-icons tiny hover-edit">mode_edit</i></a>
					  		<a href="./index.php?artDelete&artId=<?= $article->getId(); ?>"><i class="material-icons tiny red-text hover-delete">delete</i></a>
				  		</span><?= $article->getTitle(); ?>
				  	</div>
					<?php endforeach ?>
				</div>
				<div class="collection col s12 m6 push-m1">
					<div class="collection-item center-align"><h5>Commentaires signalés</h5></div>
				  <?php foreach ($comments as $comment) : ?>
				  	<div class="collection-item"><a href="./index.php?commentId=<?= $comment->getId(); ?>"><?= $comment->getAuthor(); ?></a><span class="badge"><?= $comment->getCreationDate(); ?></span></div>
				  <?php endforeach ?>
				</div>
			</div>
		</div>
		<div class="container">
			<form method="post" action="./index.php?addArticle">
				<label for="title">Titre du chapitre</label>
				<input type="text" name="title" value="<?php if (!empty($errors)) { echo $_POST['title']; } ?>">
				<?php if (!empty($errors['title'])) { echo $errors['title']; } ?>
				<input type="hidden" name="firstname" value="Jean">
				<input type="hidden" name="lastname" value="Forteroche">
				<textarea name="artContent">
					<?php if (!empty($errors)) { echo $_POST['artContent']; } ?>
				</textarea>
				<p class="center-align">
					<input type="submit" value="Publier">
					<input type="reset" value="Effacer">
				</p>
				<?php if (!empty($errors['artContent'])) { echo $errors['artContent']; } ?>
			</form>
		</div>
	</main>
  
  <?php include 'footer.php'; ?>

  <script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=6qiy71l2nn0fxtpjr8qzomcxo3py0h13e4b9jkdvavuzb2tn"></script>
  <script>tinymce.init({ selector:'textarea' });</script>
</body>
</html>