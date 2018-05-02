<?php 

namespace blog\Model;

class Comment
{
	private $id; 
	private $id_article;
	private $author;
	private $comment; 
	private $comment_date_fr;

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

    public function getId_article()
    {
    	return $this->id_article; 
    }

    public function setId_article($id_article)
    {
    	$this->id_article = $id_article;
    }

    public function getAuthor()
    {
    	return $this->author; 
    }

    public function setAuthor($author)
    {
    	$this->author = $author;
    }

    public function getComment()
    {
    	return $this->comment; 
    }

    public function setComment($comment)
    {
    	$this->comment = $comment;
    }

    public function getComment_date_fr()
    {
    	return $this->comment_date_fr; 
    }

    public function setComment_date_fr($comment_date_fr)
    {
    	$this->comment_date_fr = $comment_date_fr;
    }
}    