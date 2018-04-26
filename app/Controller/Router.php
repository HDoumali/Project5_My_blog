<?php

namespace blog\Controller;

use blog\Controller\ControllerArticle; 
use blog\Controller\ControllerComment; 
use blog\Controller\ControllerUser; 
use blog\lib\View;

class Router 
{

    private $ctrlArticle;
    private $ctrlUser;

    public function __construct() 
    {
      $this->ctrlArticle = new ControllerArticle();
      $this->ctrlUser = new ControllerUser();
    }

    // Recherche un paramètre dans un tableau
    private function getParametre($array, $name) 
    {
        if (isset($array[$name])) {
          return $array[$name];
        } else {
          throw new Exception("Paramètre '$nom' absent");
        }
    }


    // Traite une requête entrante
    public function routerRequest() 
    {
      try {
         
          if (isset($_GET['action'])) {
            
              switch ($_GET['action']) {
              //VISUALISATION DES ARTICLES 
              case 'articles':
                    $this->ctrlArticle->articles();
                    break;
              
              //VISUALISATION D'UN ARTICLE ET SES COMMENTAIRES
              case 'article':
                    $articleId = intval($this->getParametre($_GET, 'id'));
                    if ($articleId != 0) {
                      $this->ctrlArticle->article($articleId); 
                    } else {

                        throw new Exception("Identifiant de L'article non valide");
                    }
                    break;
              
              //AJOUTER UN COMMENTAIRE 
              case 'comment':
                    $articleId = htmlspecialchars($this->getParametre($_GET,'id'));
                    $author = htmlspecialchars($this->getParametre($_POST,'author'));
                    $comment = htmlspecialchars($this->getParametre($_POST,'comment'));
                    $this->ctrlArticle->comment($articleId, $author, $comment);
                    break;
              

                //AJOUTER UN ARTICLE
              case 'addArticle':
                    if(!empty ($_POST)) {
                    $title = htmlspecialchars($this->getParametre($_POST, 'title'));
                    $chapo = htmlspecialchars($this->getParametre($_POST, 'chapo'));
                    $content = htmlspecialchars($this->getParametre($_POST, 'content'));
                    $author = htmlspecialchars($this->getParametre($_POST, 'author'));
                    $this->ctrlArticle->newArticle($title, $chapo, $content, $author);
                    } else {
                      $view = new View('Add');
                      $view->generer(array());
                    }
                    break;

              //MODIFIER UN ARTICLE
              case 'editArticle':
                    if(!empty ($_POST) AND !empty($_GET)) {
                    $articleId = htmlspecialchars($this->getParametre($_GET, 'id'));
                    $title = htmlspecialchars($this->getParametre($_POST, 'title'));
                    $chapo = htmlspecialchars($this->getParametre($_POST, 'chapo'));
                    $content = htmlspecialchars($this->getParametre($_POST, 'content'));
                    $author = htmlspecialchars($this->getParametre($_POST, 'author'));
                    $this->ctrlArticle->editArticle($title, $chapo, $content, $author, $articleId);
                    } else {
                      $view = new View('Edit');
                      $view->generer(array());
                    }
                    break;

               //SUPPRIMER UN ARTICLE
               case 'deleteArticle':
                    if(!empty ($_POST)) {
                    $articleId = htmlspecialchars($this->getParametre($_POST, 'id')); 
                    $this->ctrlArticle->deleteArticle($articleId);
                    } else {
                      $view = new View('Delete');
                      $view->generer(array());
                    }
                    break;

               //INSCRIPTION D'UN NOUVEL UTILISATEUR
               case 'addUser':
                    if(!empty ($_POST)){
                      $login = htmlspecialchars($this->getParametre($_POST, 'login'));
                      $password = htmlspecialchars(sha1($this->getParametre($_POST, 'password')));
                      $this->ctrlUser->addUser($login, $password);
                    } else {
                      $view = new View('ConnectRegist');
                        $view->generer(array());
                    }
                    break;

               //CONNEXION DE L'UTILISATEUR
               case 'connectUser':
                    if(!empty ($_POST)){
                    $login = htmlspecialchars($this->getParametre($_POST, 'login'));
                    $password = htmlspecialchars(sha1($this->getParametre($_POST, 'password')));
                    $this->ctrlUser->userConnect($login, $password);
                    } else {
                      $view = new View('ConnectRegist');
                        $view->generer(array());
                    }
                    break;

               //DECONNEXION DE L'UTILISATEUT
               case 'disconnectUser':
                    $this->ctrlUser->userDisconnect();
                    break;
                  
               default:
                    throw new Exception("Action non valide");
          }

        }

          else {  // aucune action définie : affichage de l'accueil
          $this->home();
          }
      }
      catch (Exception $e) {
        $this->error($e->getMessage());
      }
    }


    // Affiche la page d'accueil 
    private function home()
    {
      $view = new View("Home");
      $view->generer(array());
    }
    // Affiche une erreur
    private function error($msgError) 
    {
      $view = new View("Error");
      $view->generer(array('msgError' => $msgError));
    }
}

 