<?php $this->titre = 'Blog - Modifier un article' ?>


<div class="container" id="viewEditArticle">

	<p><a class="btn btn-primary btn-lg" id=btnreturn href="index.php?action=article&id=<?= $_GET['id'] ?>" role="button"><span class="glyphicon glyphicon-triangle-left" aria-hidden="true"></span>Retour</a></p>

	<h2><span class="glyphicon glyphicon-cog" aria-hidden="true"></span>MODIFIER UN ARTICLE</h2>
	<form class="formeditarticle" method="POST" action="index.php?action=editArticle&id=<?= $_GET['id'] ?>"> 
		  <div class="form-group">
		  	 <p>Veuillez modifier l'article en remplissant les champs ci-dessous.</p>
		  </div>
		  <div class="form-group">
		     <label for="exampleInputEmail1">Auteur</label>
		     <input type="text" class="form-control" id="exampleInputEmail1" name="author" placeholder="Auteur" required>
		  </div>
		  <div class="form-group">
		     <label for="exampleInputEmail1">Titre</label>
		     <input type="text" class="form-control" id="exampleInputEmail1" name="title" placeholder="Titre" required>
		  </div>
		  <div class="form-group">
		     <label for="exampleInputEmail1">Chapo</label>
		     <textarea class="form-control" rows="5" name="chapo" placeholder="chapo de l'article" required></textarea>
		  </div>
		  <div class="form-group">
		     <label for="exampleInputEmail1">Contenu</label>
		     <textarea class="form-control" rows="5" name="content" placeholder="contenu" required></textarea>
		  </div>
		  <button type="submit" class="btn btn-primary" id=btneditarticle>Modifier</button>
	</form>

</div>


