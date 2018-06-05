<?php 

namespace blog\Model;

class Comment
{
	private $id; 
	private $id_article;
	private $author;
	private $comment; 
	private $comment_date_fr;
    private $approuve;

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

    public function getApprouve()
    {
        return $this->approuve; 
    }

    public function setApprouve($approuve)
    {
        $this->approuve = $approuve;
    }
}    