<!DOCTYPE html>
<html>
<head>
	<?php include 'head.php'; ?>
</head>
<body>
	<form class="col s12" method="post" action="./index.php?validSubs">
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
	    	<label for="content">Adresse email</label>
	      <input id="email" name="email" type="email" class="validate">
	      	<span><?php if (!empty($tabError['email'])) { echo $tabError['email']; } ?></span> 
	    </div>
	  </div>
	  <div class="row">
	    <div class="col s12">
	    	<label for="content">Mot de passe</label>
	      <input id="password" name="password" type="password" class="validate">
	      	<span><?php if (!empty($tabError['password'])) { echo $tabError['password']; } ?></span> 
	    </div>
	  </div>
	  <input class="btn waves-effect waves-light" type="submit">
	  
	  <input class="btn waves-effect waves-light" type="reset">
	</form>
</body>
</html>