<?php 

	define('APP_ROOT', __DIR__);
	require_once('Controler/Article_controler.php');
	require_once('Controler/Comment_controler.php');
	require_once('Controler/Landing_page_controler.php');



	if (empty($_SERVER['QUERY_STRING'])) {
		$accueil = new Landing_page_controler();
	}

	if (isset($_GET['chapters'])) {
		$article = new Article_controler();
		$article->getAll();
	}

	if (isset($_GET['id'])) {
		$article = new Article_controler();
		$article->getOne($_GET['id']);		
	}

	if (isset($_GET['repCom']) && isset($_GET['artId'])) {
		$comment = new Comment_controler();
		$comment->reportedComment($_GET['repCom']);
		$article = new Article_controler();
		header("Location " . $article->getOne($_GET['artId']));
	}

	/*
	if (isset($_GET['contact'])) {
		$contact = new Form('Nom', 'Prenom', 'Email', 'Message');
	}

	if (isset($_GET['sign_in'])) {
		$contact = new Form('Email', 'Mot de passe');
	}
	*/
 	