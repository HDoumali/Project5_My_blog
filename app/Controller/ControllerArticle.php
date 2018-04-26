<?php

namespace blog\Controller;

use blog\Model\Article;
use blog\Model\Comments;
use blog\lib\View;

class ControllerArticle 
{

  private $articles;
  private $comment;
  
  public function __construct() {
      $this->articles = new Article();
      $this->comment = new Comments();
  }

  // Affiche les détails sur un billet
  public function articles() 
  {
      $articles = $this->articles->getArticles();
      $vue = new View("Articles");
      $vue->generer(array('articles' => $articles));
  }

  public function article($articleId)
  {
      $article = $this->articles->getArticle($articleId);
      $comments = $this->comment->getComments($articleId);
      $vue = new View("Article");
      $vue->generer(array('article' => $article, 'comments' => $comments));
  }

  public function comment($articleId, $author, $comment)
  {
      // Sauvegarde du commentaire
      $this->comment->addComment($articleId, $author, $comment);
      // Actualisation de l'affichage de l'article
      $this->article($articleId);
  }

  public function newArticle($title, $chapo, $content, $author)
  {
     
      $newArticle = $this->articles->addArticle($title, $chapo, $content, $author);
      //Actualisation de l'affichage des articles
      $this->articles();
  }

  public function editArticle($title, $chapo, $content, $author,$articleId)
  {
      $this->articles->updateArticle($title, $chapo, $content, $author, $articleId);
      $this->article($articleId);   
  }

  public function deleteArticle($articleId)
  {
      $this->articles->removeArticle($articleId);
      $this->articles();
  }

}

