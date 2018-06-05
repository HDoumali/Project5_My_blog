<?php 

namespace blog\Model;

class User
{
	private $id; 
	private $login;
	private $password;
    private $confirm;

    public function getId()
    {
    	return $this->id; 
    }

    public function setId($id)
    {
    	$this->id = $id;
    }

    public function getLogin()
    {
    	return $this->login; 
    }

    public function setLogin($login)
    {
    	$this->login = $login;
    }

    public function getPassword()
    {
    	return $this->password; 
    }

    public function setPassword($password)
    {
    	$this->password = $password;
    }

    public function getConfirm()
    {
        return $this->confirm; 
    }

    public function setConfirm($confirm)
    {
        $this->confirm = $confirm;
    }

}    