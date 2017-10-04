<!DOCTYPE html>
<html>
<head>
	<?php include 'head.php'; ?>
</head>
<body>
	<header>
		<?php include 'nav.php'; ?>
	</header>
	<main>
	  <div class="row">
			<section class="card-panel center-align col s12 m7">
				<h5><?= $article->getTitle(); ?></h5>
				<span><?= $article->getAuthor(); ?></span>
				<p>
					<?= $article->getContent(); ?>
				</p>
			</section>
			<section class="center-align col s12 m5 offset-by-m7">
				<ul class="collapsible hoverable" data-collapsible="accordion">
			    	<li>
				      <div class="collapsible-header">
				      	<div class="container center-align">
				        	<p>Commenter le chapitre</p>
				        </div>
				      </div>
				      
				      <div class="collapsible-body">
				        <div class="row">
				          <form class="col s12" method="post" action="./index.php?addComment">
				            <div class="row">
				            	<input type="hidden" name="articleId" value=<?= $article->getId(); ?>>
				              <div class="input-field col s6 m6">
				                <input id="lastname" name="lastname" type="text" class="validate">
				                <label for="lastname">Nom</label>
				                	<span><?php if (!empty($tabError['lastname'])) { echo $tabError['lastname']; } ?></span> 
				              </div>
				              <div class="input-field col s6 m6">
				                <input id="firstname" name="firstname" type="text" class="validate">
				                <label for="firstname">Prénom</label>
				                   	<span><?php if (!empty($tabError['firstname'])) { echo $tabError['firstname']; } ?></span>
				              </div>
				            </div>
				            <div class="row">
				              <div class="input-field col s12">
				                <textarea id="content" name="content" class="materialize-textarea"></textarea>
				                <label for="content">Commentaire</label>
				                   	<span><?php if (!empty($tabError['content'])) { echo $tabError['content']; } ?></span> 
				              </div>
				            </div>
				            <input class="btn waves-effect waves-light" type="submit">
				            
				            <input class="btn waves-effect waves-light" type="reset">
				          </form>
				        </div>
				      </div>
				    </li>
			    </ul>
				<?php foreach ($article->getComments() as $comment) :	?>
			   		<div class="section left-align">
						<span><?= $comment->getAuthor(); ?></span>
						<span><?= $comment->getCreationDate(); ?></span>
						<?php if (!empty($comment->getId()) && !empty($comment->getArticleId())) {
												echo "<a href='./index.php?repCom=" . $comment->getId() . "&artId=" . $comment->getArticleId() . "'><i class='material-icons tiny red-text'>error</i></a>";
						} ?>
						
											
						<p>
							<?= $comment->getContent(); ?>
						</p>
					<div class="divider"></div>	
				  	</div>
				<?php endforeach; ?>
			</section>
		</div>
	</main>
	<?php include 'footer.php' ?>
	<?php include 'js-script.php'; ?>
</body>
</html>