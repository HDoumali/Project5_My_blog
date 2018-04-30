<?php $this->titre = 'Blog - Supprimer un article' ?>

<div class="container" id="viewDeleteArticle">

  <form class="formdeletearticle" method="post" action="index.php?action=deleteArticle&id=<?= $_GET['id'] ?>">
	  	<h2><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Voulez-vous vraiment supprimer l'article ?</h2>
		<div class="row">
			<input type="hidden" name="id" value="<?= $_GET['id'] ?>" />
			<div class="col-lg-6 col-md-6 col-sm-6">
				<p><a href="index.php?action=article&id=<?= $_GET['id'] ?>"><button type="button" class="btn btn-primary btn-lg" ">Non</button></a></p>
		    </div>
			<div class="col-lg-6 col-md-6 col-sm-6">
				<p><button type="submit" class="btn btn-primary btn-lg" ">Oui</button></p>
			</div>
	    </div>
  </form>
</div>
