<?php

namespace blog\Controller;

use blog\Model\UserManager;
use blog\Model\CommentManager;
use blog\lib\View;

class ControllerUser 
{

	private $user;

	public function __construct() 
	{
		$this->user = new UserManager(); 
		$this->comment = new CommentManager(); 
	}

	public function addUser($login, $password) 
	{
        if($this->user->existUser($login)) {
			$this->user->registrationUser($login, $password);
			$view = new View("Congrat");
			$view->generer(array());
			return;
	    } 
	    	throw new \Exception("L'utilisateur '$login' existe deja");
	}

	public function userConnect($login, $password) 
	{ 
		$connectUserAdmin = $this->user->connectUserAdmin($login, $password);  
		if($connectUserAdmin != false) {

			$_SESSION['id'] = $connectUserAdmin->getId();
			$_SESSION['admin'] = $connectUserAdmin->getConfirm();
			$_SESSION['login'] = $connectUserAdmin->getLogin();
			$view = new View("Home"); 
		    $view->generer(array());  
		} else{
				throw new \Exception("Mauvais identifiant ou mot de passe");
		  }	  
	}

	public function userDisconnect() 
	{
		 $_SESSION = array();
		 session_destroy();
		 $view = new View("Home"); 
		 $view->generer(array());  
	}

	public function users() 
    {  
	      $users = $this->user->getUsers();
	      $commentsApprouve = $this->comment->getCommentsApprouve();
	      $vue = new View("Admin");
	      $vue->generer(array('users' => $users, 'commentsApprouve' => $commentsApprouve));
	}

    public function confirmUserAdmin($userId)
    {   
    	$users = $this->user->getUsers();
    	$commentsApprouve = $this->comment->getCommentsApprouve();
    	$confirmUser = $this->user->confirmUser($userId);
    	$vue = new View("Admin");
        $vue->generer(array('users' => $users, 'commentsApprouve' => $commentsApprouve));
    }

    public function noConfirmUserAdmin($userId)
    {   
    	$users = $this->user->getUsers();
    	$commentsApprouve = $this->comment->getCommentsApprouve();
    	$confirmUser = $this->user->noConfirmUser($userId);
    	$vue = new View("Admin");
        $vue->generer(array('users' => $users, 'commentsApprouve' => $commentsApprouve));
    }

    public function validComment($commentId)
    {   
    	$commentsApprouve = $this->comment->getCommentsApprouve();
    	$users = $this->user->getUsers();
    	$validComment = $this->comment->approuveComment($commentId);
    	$vue = new View("Admin");
        $vue->generer(array('users' => $users, 'commentsApprouve' => $commentsApprouve));
    }

    public function noValidComment($commentId)
    {   
    	$commentsApprouve = $this->comment->getCommentsApprouve();
    	$users = $this->user->getUsers();
    	$noValidComment = $this->comment->noApprouveComment($commentId);
    	$vue = new View("Admin");
        $vue->generer(array('users' => $users, 'commentsApprouve' => $commentsApprouve));
    }
}

