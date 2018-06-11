<?php

namespace blog\Controller;

use blog\Model\ArticleManager;
use blog\Model\CommentManager;
use blog\lib\View;

class ControllerArticle 
{

  private $articles;
  private $comment;
  
  public function __construct() {
      $this->articles = new ArticleManager();
      $this->comment = new CommentManager();
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
    if (isset($_SESSION['token']) AND isset($_POST['token']) AND !empty($_SESSION['token']) AND !empty($_POST['token'])) {
      if ($_SESSION['token'] == $_POST['token']) {
          $this->articles->addArticle($title, $chapo, $content, $author);
          //Actualisation de l'affichage des articles
          $this->articles();
      }
    } else {
          throw new \Exception("Erreur de vérification");
    }
  }

  public function editArticle($title, $chapo, $content, $author,$articleId)
  {   
    if (isset($_SESSION['token']) AND isset($_POST['token']) AND !empty($_SESSION['token']) AND !empty($_POST['token'])) {
      if ($_SESSION['token'] == $_POST['token']) {
          $this->articles->updateArticle($title, $chapo, $content, $author, $articleId);
          $this->article($articleId);
      }
    } else {
          throw new \Exception("Erreur de vérification");
    }
  }

  public function dataArticle($articleId) 
  {
      $article = $this->articles->getArticle($articleId);
      return $article;
  }

  public function deleteArticle($articleId)
  {
      $this->articles->removeArticle($articleId);
      $this->articles();
  }


}
