<?php 

namespace blog\Model;

use blog\lib\Model;

class Comments extends Model
{

    public function getComments($articleId)
    {
		$sql = 'SELECT id, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM comment WHERE id_article=? ORDER BY comment_date DESC';
		$comments = $this->executerRequete($sql, array($articleId));
	    return $comments;
    }

    public function addComment($articleId, $author, $comment)
    {
		$sql = 'INSERT INTO comment (id_article, author, comment, comment_date) VALUES (?,?,?,NOW())';
		$this->executerRequete($sql, array($articleId, $author, $comment));
    }
}

