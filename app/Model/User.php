<?php 

namespace blog\Model;

class User
{
	private $id; 
	private $login;
	private $password;
	
	public function __construct(array $datas)
	{
      $this->hydrate($datas);
	}
    
    public function hydrate(array $datas)
    {
	  foreach ($datas as $key => $value)
	  {
	    // On récupère le nom du setter correspondant à l'attribut.
	    $method = 'set'.ucfirst($key);
	        
	    // Si le setter correspondant existe.
	    if (method_exists($this, $method))
	    {
	      // On appelle le setter.
	      $this->$method($value);
	    }
      }
    }

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
}    