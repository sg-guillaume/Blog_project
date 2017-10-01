<!DOCTYPE html>
<html>
	<head>
		<?php include 'head.php'; ?>
	</head>
<body>
	<header>
		<?php include 'nav.php' ?>
	</header>

	<main>
			<div class="row">
				<div class="collection col s12 m4 push-m1">
				  <?php foreach ($articles as $article) : ?>
				  	<a href="#" class="collection-item"><span class="badge">14</span><?= $article->getTitle(); ?></a>
					<?php endforeach ?>
				</div>
		    
		    <div class="collection col s12 m4 push-m3">
				  <a href="#!" class="collection-item"><span class="badge">1</span>Alan</a>
				  <a href="#!" class="collection-item"><span class="new badge">4</span>Alan</a>
				  <a href="#!" class="collection-item">Alan</a>
				  <a href="#!" class="collection-item"><span class="badge">14</span>Alan</a>
				</div>
			</div>
		<textarea></textarea>
	</main>
  
  <?php include 'footer.php'; ?>

  <script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=6qiy71l2nn0fxtpjr8qzomcxo3py0h13e4b9jkdvavuzb2tn"></script>
  <script>tinymce.init({ selector:'textarea' });</script>
</body>
</html>