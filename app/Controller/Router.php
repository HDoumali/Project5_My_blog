<?php

namespace blog\Controller;

use blog\lib\Request;
use blog\Controller\ControllerArticle; 
use blog\Controller\ControllerUser; 
use blog\lib\View;

class Router 
{

    private $ctrlArticle;
    private $ctrlUser;
    private $request;

    public function __construct() 
    {
      $this->request = new Request();
      $this->ctrlArticle = new ControllerArticle();
      $this->ctrlUser = new ControllerUser();
      
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
                    $articleId = intval($this->request->getParametre($_GET, 'id'));
                    if ($articleId != 0) {
                      $this->ctrlArticle->article($articleId); 
                      return;
                    }
                        throw new \Exception("Identifiant de L'article non valide");
                    break;
              //AJOUTER UN COMMENTAIRE 
              case 'comment':
                  if(!empty($_POST) AND !empty($_GET)) {
                    $articleId = $this->request->getParametre($_GET,'id');
                    $author = $this->request->getParametre($_POST,'author');
                    $comment = $this->request->getParametre($_POST,'comment');
                    $this->ctrlArticle->comment($articleId, $author, $comment);
                  } 
                    break;
                //AJOUTER UN ARTICLE
              case 'addArticle':
                          if(!empty ($_POST)) {
                            $title = $this->request->getParametre($_POST, 'title');
                            $chapo = $this->request->getParametre($_POST, 'chapo');
                            $content = $this->request->getParametre($_POST, 'content');
                            $author = $this->request->getParametre($_POST, 'author');
                            $this->ctrlArticle->newArticle($title, $chapo, $content, $author);
                          } else {
                            $view = new View('Add');
                            $view->generer(array());
                          }
                  break;
              //MODIFIER UN ARTICLE
              case 'editArticle':
                          if(!empty ($_POST) AND !empty($_GET)) {
                            $articleId = $this->request->getParametre($_GET, 'id');
                            $title = $this->request->getParametre($_POST, 'title');
                            $chapo = $this->request->getParametre($_POST, 'chapo');
                            $content = $this->request->getParametre($_POST, 'content');
                            $author = $this->request->getParametre($_POST, 'author');
                            $this->ctrlArticle->editArticle($title, $chapo, $content, $author, $articleId);
                          } else {
                              $articleId = $this->request->getParametre($_GET, 'id');
                              $article = $this->ctrlArticle->dataArticle($articleId);
                              $view = new View('Edit');
                              $view->generer(array('article' => $article));
                          }
                  break;
               //SUPPRIMER UN ARTICLE
               case 'deleteArticle':
                          if(!empty ($_POST)) {
                            $articleId = $this->request->getParametre($_POST, 'id'); 
                            $this->ctrlArticle->deleteArticle($articleId);
                          } else {
                              $view = new View('Delete');
                              $view->generer(array());
                          }
                  break;
               //INSCRIPTION D'UN NOUVEL UTILISATEUR
               case 'addUser':
                    if(!empty ($_POST)){
                      $login = $this->request->getParametre($_POST, 'login');
                      $password = $this->request->getParametre($_POST, 'password');
                      $this->ctrlUser->addUser($login, $password);
                    } else {
                        $view = new View('ConnectRegist');
                        $view->generer(array());
                    }
                    break;
               //CONNEXION DE L'UTILISATEUR
               case 'connectUser':
                    if(!empty ($_POST)){
                      $login = $this->request->getParametre($_POST, 'login');
                      $password = $this->request->getParametre($_POST, 'password');
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

               //VISUALISATION DES UTILISATEURS
               case 'admin':
                   if(isset($_SESSION['admin']) AND !empty ($_SESSION['admin'])){
                    $this->ctrlUser->users();
                    return;
                   }
                        throw new \Exception("Page inexistante");
                    break;
               //CONFIRMATION DE L'ADMIN 
               case 'confirmadmin':
                    if(isset($_GET) AND !empty($_GET)) {
                      $userId = $this->request->getParametre($_GET, 'id');
                      $this->ctrlUser->confirmUserAdmin($userId);
                    }
                    break;
                // NON CONFIRMATION DE L'ADMIN
                case 'noconfirmadmin':
                    if(isset($_GET) AND !empty($_GET)) {
                      $userId = $this->request->getParametre($_GET, 'id');
                      $this->ctrlUser->noConfirmUserAdmin($userId);
                    }
                    break;
                //APPROBATION DU COMMENTAIRE
                case 'confirmcomment':
                    if(isset($_GET) AND !empty($_GET)) {
                      $commentId = $this->request->getParametre($_GET, 'id');
                      $this->ctrlUser->validComment($commentId);
                    }
                    break;
                //NON APPROBATION DU COMMENTAIRE
                case 'noconfirmcomment':
                    if(isset($_GET) AND !empty($_GET)) {
                      $commentId = $this->request->getParametre($_GET, 'id');
                      $this->ctrlUser->noValidComment($commentId);
                    }
                    break;
               default:
                    throw new \Exception("Action non valide");
              }
              return;
          }  // aucune action définie : affichage de l'accueil
              $this->home();
      } catch (\Exception $e) {
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

