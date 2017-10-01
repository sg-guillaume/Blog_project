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
		<div class="collection col s12 m4 push-m3">
		  <?php foreach ($comments as $comment) : ?>
		  	<a href="#!" class="collection-item"><span class="badge">14</span>Alan</a>
		  <?php endforeach ?>
		</div>
	</main>
	<?php include 'footer.php'; ?>
</body>
</html>