<?php $this->titre = 'Blog - Articles'; ?>

<header style="background-image: url('assets/img/img1.jpg')">
	<div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="intro-text">
                        <span class="name">Liste des articles<span>
                        <hr class="star-light">
                    </div>
                </div>
            </div>
        </div>
</header>

<div class="container" id="viewArticle">

    <?php if (!empty($_SESSION['admin'])) { ?>
        <div>
           <a href="index.php?action=addArticle"><button type="button" class="btn btn-primary btn-lg" "><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> AJOUTER UN ARTICLE</button></a><br />
        </div><br />
        <div class="row" id=infoadmin>
        	 <p> <span class="label label-info">Info</span> Bonjour l'admin, vous pouvez désormais ajouter un article.</p>
        </div>
    <?php } ?>

  <div class="row" id="content">
       <?php foreach ($articles as $article): ?>
           <h2><?= $this->clean($article->getTitle()) ?></h2>
           <p><?= $this->clean($article->getChapo()) ?></p>
           <p class="datearticle"><em>Article publié le <?= $this->clean($article->getArticle_date_fr()) ?>.</em></p><br />
           <p><a class="btn btn-primary btn-lg pull-right" href="index.php?action=article&id=<?= $article->getId(); ?>" role="button">Lire l'article</a></p><br /><br />
           <hr>
       <?php endforeach; ?>
  </div>

</div>