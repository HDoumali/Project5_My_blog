<?php 

namespace blog\Model;

class Article 
{
	private $id; 
	private $title;
	private $chapo;
	private $content; 
	private $author;
	private $article_date_fr;

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

    public function getTitle()
    {
    	return $this->title; 
    }

    public function setTitle($title)
    {
    	$this->title = $title;
    }

    public function getChapo()
    {
    	return $this->chapo; 
    }

    public function setChapo($chapo)
    {
    	$this->chapo = $chapo;
    }

    public function getContent()
    {
    	return $this->content; 
    }

    public function setContent($content)
    {
    	$this->content = $content;
    }

    public function getAuthor()
    {
    	return $this->author; 
    }

    public function setAuthor($author)
    {
    	$this->author = $author;
    }

    public function getArticle_date_fr()
    {
    	return $this->article_date_fr; 
    }

    public function setArticle_date_fr($article_date_fr)
    {
    	$this->article_date_fr = $article_date_fr;
    }
}    
