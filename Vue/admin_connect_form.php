<!DOCTYPE html>
<html>
<head>
	<?php include 'head.php'; ?>
</head>
<body>
	<form class="col s12" method="post" action="./index.php?validSign">
	  <div class="row">
	    <div class="col s6 m6">
	    	<label for="lastname">Nom</label>
	      <input id="lastname" name="lastname" type="text" class="validate">
	      
	      	<span><?php if (!empty($tabError['lastname'])) { echo $tabError['lastname']; } ?></span> 
	    </div>
	    <div class=" col s6 m6">
	    	<label for="firstname">Prénom</label>
	      <input id="firstname" name="firstname" type="text" class="validate">
	      
	         	<span><?php if (!empty($tabError['firstname'])) { echo $tabError['firstname']; } ?></span>
	    </div>
	  </div>
	  <div class="row">
	    <div class="col s12">
	    	<label for="content">Commentaire</label>
	      <input id="validPassword" name="validPassword" type="password" class="validate">
	      
	         	<span><?php if (!empty($tabError['validPassword'])) { echo $tabError['validPassword']; } ?></span> 
	    </div>
	  </div>
	  <input class="btn waves-effect waves-light" type="submit">
	  
	  <input class="btn waves-effect waves-light" type="reset">
	</form>
</body>
</html>