<?php 

namespace blog\Model;

use blog\lib\Model;
use blog\Model\Comment;

class CommentManager extends Model
{

    public function getComments($articleId)
    {
        $comments = [];
		$sql = 'SELECT id, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM comment WHERE id_article=? AND approuve= 1 ORDER BY comment_date DESC';
		$request = $this->executerRequete($sql, array($articleId));
        return $request->fetchAll(\PDO::FETCH_CLASS, Comment::class);
    }

    public function getCommentsApprouve()
    {
        $comments = [];
        $sql = 'SELECT id, id_article, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM comment ORDER BY comment_date DESC';
        $request = $this->executerRequete($sql);
        return $request->fetchAll(\PDO::FETCH_CLASS, Comment::class);
    }

    public function approuveComment($commentId)
    {
        $sql = 'UPDATE comment SET approuve = 1 WHERE id = ?';
        $this->executerRequete($sql, array($commentId));
    }

    public function noApprouveComment($commentId)
    {
        $sql = 'DELETE FROM comment WHERE id = ?';
        $this->executerRequete($sql, array($commentId));
    }

    public function addComment($articleId, $author, $comment)
    {
		$sql = 'INSERT INTO comment (id_article, author, comment, comment_date, approuve) VALUES (?,?,?,NOW(),0)';
		$this->executerRequete($sql, array($articleId, $author, $comment));
    }
}

