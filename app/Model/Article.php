<?php

namespace blog\Model;

use blog\lib\Model;

class Article extends Model 
{

  // Renvoie la liste des billets du blog
  public function getArticles() 
  {
      $sql = 'SELECT id, title, chapo, content, DATE_FORMAT(article_date, \'%d/%m/%Y à %Hh%imin%ss\') AS article_date_fr FROM article ORDER BY article_date DESC';
      $articles = $this->executerRequete($sql);
      return $articles;
  }
  
  //Renvoie un billet
  public function getArticle($articleId)
  {
    	$sql = 'SELECT id, title, chapo, content,author, DATE_FORMAT(article_date, \'%d/%m/%Y à %Hh%imin%ss\') AS article_date_fr FROM article WHERE id=?';
    	$article = $this->executerRequete($sql, array($articleId));
    	if ($article->rowCount() == 1)
        return $article->fetch();  // Accès à la première ligne de résultat
      else
        throw new Exception("Aucun article ne correspond à l'identifiant '$articleId'");
  }

  public function addArticle($title, $chapo, $content, $author)
  {
    	$sql = 'INSERT INTO article (title, chapo, content, author, article_date) VALUES (?,?,?,?,NOW())';
    	$this->executerRequete($sql, array($title, $chapo, $content, $author));
  }

  public function updateArticle($title, $chapo, $content, $author,$articleId)
  {
    	$sql ='UPDATE article SET title=?, chapo=?, content=?, author=?, article_date=NOW() WHERE id=?';
    	$this->executerRequete($sql, array($title, $chapo, $content, $author,$articleId));
  }

  public function removeArticle($articleId)
  {
    	$sql = 'DELETE FROM article WHERE id = ?';
    	$this->executerRequete($sql, array($articleId));
  }

}
