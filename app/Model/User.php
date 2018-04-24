<?php

/*namespace project5_blog_s\appapp\Model;

use project5_blog_s\app\lib\Model;*/

require_once 'app/lib/Model.php';

class User extends Model {

	public function registrationUser($login, $password) {
		$sql = 'INSERT INTO user (login, password) VALUES (?, ?)';
		$this->executerRequete($sql, array($login, $password));
	}

	public function existUser($login) {
		$sql = 'SELECT * FROM user WHERE login = ?';
		$user = $this->executerRequete($sql, array($login));
		return ($user->rowCount() === 0);
	}

	public function connectUser($login, $password) {
		$sql = 'SELECT * FROM user WHERE login = ? AND password = ?';
		$userExist = $this->executerRequete($sql, array($login, $password));
		if ($userExist->rowCount() == 1) {
			return $userExist->fetchAll(PDO::FETCH_OBJ);
		}
		return false;
	}
}