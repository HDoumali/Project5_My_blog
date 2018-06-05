<?php

namespace blog\Model;

use blog\lib\Model;
use blog\Model\User;

class UserManager extends Model 
{

	public function registrationUser($login, $password) 
	{
		$sql = 'INSERT INTO user (login, password, confirm) VALUES (?, ?, 0)';
		$this->executerRequete($sql, array($login, $password));
	}

	public function existUser($login) 
	{
		$sql = 'SELECT * FROM user WHERE login = ?';
		$user = $this->executerRequete($sql, array($login));
		return ($user->rowCount() === 0);
	}

	public function connectUserAdmin($login, $password) 
	{
		$sql = 'SELECT * FROM user WHERE login = ? AND password = ?';
		$userExist = $this->executerRequete($sql, array($login, $password));
		if ($userExist->rowCount() == 1) {
			return $userExist->fetchObject(User::class);
		}
		return false;
	}

	public function getUsers() 
    {
	      $users = [];
	      $sql = 'SELECT * FROM user ORDER BY id DESC';
	      $request = $this->executerRequete($sql);
	      return $request->fetchAll(\PDO::FETCH_CLASS, User::class);
    }

    public function getUser($userId)
    {
    	$sql = 'SELECT * FROM user WHERE id = ?';
    	$request = $this->executerRequete($sql,array($userId));
    	return $request->fetchObject(User::class);
    }

    public function confirmUser($userId)
    {
    	$sql = 'UPDATE user SET confirm = 1 WHERE id = ?';
    	$this->executerRequete($sql, array($userId));
    }

    public function noConfirmUser($userId)
    {
    	$sql = 'UPDATE user SET confirm = 0 WHERE id = ?';
    	$this->executerRequete($sql, array($userId));
    }
}