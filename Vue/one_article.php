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
		<section class="center-align col s12 m5">
			<ul class="collapsible hoverable" data-collapsible="accordion">
		    	<li>
			      <div class="collapsible-header">
			      	<div class="container center-align">
			        	<p>Commenter le chapitre</p>
			        </div>
			      </div>
			      
			      <div class="collapsible-body">
			        <div class="row">
			          <form class="col s12 m12" method="post" action="./index.php?add">
			            <div class="row">
			            	<input type="hidden" name="articleId" value=<?= $article->getId(); ?>>
			              <div class="input-field col s6 m6">
			                <input id="lastname" name="lastname" type="text" class="validate">
			                <label for="lastname">Nom</label>
			                	<span><?= $tabError['lastname']; ?></span> 
			              </div>
			              <div class="input-field col s6 m6">
			                <input id="firstname" name="firstname" type="text" class="validate">
			                <label for="firstname">Prénom</label>
			                   	<span><?= $tabError['firstname']; ?></span>
			              </div>
			            </div>
			            <div class="row">
			              <div class="input-field col s12">
			                <textarea id="content" name="content" class="materialize-textarea"></textarea>
			                <label for="content">Commentaire</label>
			                   	<span><?= $tabError['content']; ?></span> 
			              </div>
			            </div>
			            <button class="btn waves-effect waves-light" type="submit">Envoyer
			                <i class="material-icons right">done</i>
			            </button>
			            <button class="btn waves-effect waves-light" type="reset">Annuler
			                <i class="material-icons right">clear</i>
			            </button>
			          </form>
			        </div>
			      </div>
			    </li>
		    </ul>
			<?php foreach ($article->getComments() as $comment) : ?>
		   		<div class="section">
					<p><?= $comment->getAuthor(); ?></p>
					<p><?= $comment->getCreationDate(); ?></p>
						<a href="./index.php?repCom=<?= $comment->getId(); ?>&artId=<?= $comment->getArticleId(); ?>">
							<button class="btn-floating red" type="reset" name="action">
						    	<i class="material-icons center red">report</i>
							</button>
						</a>
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