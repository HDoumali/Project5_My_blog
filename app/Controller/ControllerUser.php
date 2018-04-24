<?php

/*namespace project5_blog_s\app\Controller;

use project5_blog_s\app\Model\User;
use project5_blog_s\app\lib\View;*/

require_once 'app/Model/User.php';
require_once 'app/lib/View.php';

class ControllerUser {

	private $user;

	public function __construct() {
		$this->user = new User(); 
	}

	public function addUser($login, $password) {
        if($this->user->existUser($login)) {
			$this->user->registrationUser($login, $password);
			$view = new View("Congrat");
			$view->generer(array());
	    } else {
	    	throw new Exception("L'utilisateur '$login' existe deja");
	    } 
	}

	public function userConnect($login, $password) {
		$connectUser = $this->user->connectUser($login, $password); 
		if($connectUser != false) {

			$_SESSION['user'] = $connectUser;
			$view = new View("Home"); 
		    $view->generer(array());  
		}
		else{
			throw new Exception("Mauvais identifiant ou mot de passe");
		}
	}

	public function userDisconnect() {
		 $_SESSION = array();
		 session_destroy();
		 $view = new View("Home"); 
		 $view->generer(array());  
	}
}

