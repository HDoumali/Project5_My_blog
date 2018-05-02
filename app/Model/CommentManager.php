<?php 

namespace blog\Model;

use blog\lib\Model;

class CommentManager extends Model
{

    public function getComments($articleId)
    {
        $comments = [];
		$sql = 'SELECT id, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM comment WHERE id_article=? ORDER BY comment_date DESC';
		$request = $this->executerRequete($sql, array($articleId));
        while ($datas = $request->fetch())
        {
            $comments[] = new Comment($datas);
        }
	    return $comments;
    }

    public function addComment($articleId, $author, $comment)
    {
		$sql = 'INSERT INTO comment (id_article, author, comment, comment_date) VALUES (?,?,?,NOW())';
		$this->executerRequete($sql, array($articleId, $author, $comment));
    }
}

