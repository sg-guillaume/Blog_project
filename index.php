<?php 

	define('APP_ROOT', __DIR__);
	require_once('Controler/Article_controler.php');
	require_once('Controler/Comment_controler.php');
	require_once('Controler/Form_controler.php');
	require_once('Controler/Landing_page_controler.php');



	$article = new Article_controler();


	if (empty($_SERVER['QUERY_STRING'])) {
		$accueil = new Landing_page_controler();
	}

	if (isset($_GET['chapters'])) {
		$article->getAll();
	}

	if (isset($_GET['sign-in'])) {
		$admin = new Admin_controler();
	}

	if (isset($_GET['id'])) {
		$article->getOne($_GET['id']);		
	}

	if (isset($_GET['repCom']) && isset($_GET['artId'])) {
		$comment = new Comment_controler();
		$comment->reportedComment($_GET['repCom']);
		$article->getOne($_GET['artId']);
	}

	if (isset($_GET['add']) && !empty($_POST)) {
		$control = new Validator($_POST);
		$tabError = $control->getTabError();
		if (empty($tabError)) {
			$validForm = new Form_controler();
			$validForm->insertComment($_POST);
			$article->getOne($_POST['articleId']);
		} else {

			$article->getOne($_POST['articleId'], $tabError);
		}
		
	}
	/*
	if (isset($_GET['contact'])) {
		$contact = new Form('Nom', 'Prenom', 'Email', 'Message');
	}

	if (isset($_GET['sign_in'])) {
		$contact = new Form('Email', 'Mot de passe');
	}*/ 	