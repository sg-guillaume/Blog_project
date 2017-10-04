<?php 

	define('APP_ROOT', __DIR__);
	require_once('Controler/Article_controler.php');
	require_once('Controler/Comment_controler.php');
	require_once('Controler/Form_controler.php');
	require_once('Controler/Landing_page_controler.php');
	require_once('Controler/Admin_controler.php');
	require_once('Controler/User_controler.php');
	require_once('Controler/InsertArticle_controler.php');



	$article = new Article_controler();
	$admin = new Admin_controler();
	$comment = new Comment_controler();
	$user = new User_controler();


	if (empty($_SERVER['QUERY_STRING'])) {
		$accueil = new Landing_page_controler();
	}

	if (isset($_GET['chapters'])) {
		$article->getAll();
	}

	if (isset($_GET['id'])) {
		$article->getOne($_GET['id']);		
	}

	if (isset($_GET['repCom']) && isset($_GET['artId'])) {
		$comment->reportedComment($_GET['repCom']);
		$article->getOne($_GET['artId']);
	}

	if (isset($_GET['addComment']) && !empty($_POST)) {
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

	if (isset($_GET['subscribe'])) {
		$admin->subscribeForm();
	}

	if (isset($_GET['sign-in'])) {
		$admin->adminConnectForm();
	}

	if (isset($_GET['validSubs']) && !empty($_POST)) {
		$user->addUser($_POST);
	}

	if (isset($_GET['validSign']) && !empty($_POST)) {
		$user->getAdminUser($_POST);
	}

	if (isset($_GET['commentId'])) {
		$comment->getOne($_GET['commentId']);		
	}

	if (isset($_GET['addArticle']) && !empty($_POST)) {
		
		$control = new Validator($_POST);
		$tabError = $control->getTabError();
		if (empty($tabError)) {
			$insertArticle = new InsertArticle_controler($_POST);
			$admin->adminPage();
		} else {
			$admin->adminPage($tabError);
		}	
	}

	if (isset($_GET['artEdit']) && isset($_GET['artId'])) {
		$article->editArticle($_GET['artId']);
	}

	if (isset($_GET['artEdit']) && !empty($_POST)) {
		$article->updateArticle($_POST, $_POST['artId']);
		$admin->adminPage();
	}

	if (isset($_GET['artDelete']) && isset($_GET['artId'])) {
		$article->deleteArticle($_GET['artId']);
		$admin->adminPage();
	}

	if (isset($_GET['comDelete']) && isset($_GET['comId'])) {
		$comment->deleteComment($_GET['comId']);
		$admin->adminPage();
	}

	if (isset($_GET['comEdit']) && !empty($_POST)) {
		$comment->updateComment($_POST);
		$admin->adminPage();
	}