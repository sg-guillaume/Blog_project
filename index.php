<?php 

	define('APP_ROOT', __DIR__);
	require_once('Controlleur/Article_controlleur.php');

	if (empty($_SERVER['QUERY_STRING'])) {
		$article = new Article_controlleur();
		$article->getAll();
	}
 	