<?php $this->titre = 'Blog - Inscription/Connexion'; ?>



<div class="container" id="viewConnectRegist">

	<h3>Venez faire vivre le blog et apporter votre pierre à l'édifice</h3>

	<div class="row">
		<div class="col-lg-5">
			<h1>INSCRIPTION</h1>
			<form class="formregist" method="POST" action="index.php?action=addUser"> 
				  <div class="form-group">
				     <label for="exampleInputEmail1">Pseudo</label>
				     <input type="" class="form-control" id="exampleInputEmail1" name="login" placeholder="Pseudo" required>
				  </div>
				  <div class="form-group">
				     <label for="exampleInputEmail1">Mot de passe</label>
				     <input type="password" class="form-control" id="exampleInputEmail1" name="password" placeholder="Mot de passe" required>
				  </div>
				  <button type="submit" class="btn btn-primary" id=btnregist>S'inscrire</button>
			</form>
		</div>
	    
	    <div class="col-lg-5">
	    	<h1>CONNEXION</h1>
			<form class="formconnect" method="POST" action="index.php?action=connectUser"> 
				  <div class="form-group">
				     <label for="exampleInputEmail1">Pseudo</label>
				     <input type="text" class="form-control" id="exampleInputEmail1" name="login" placeholder="Pseudo" required>
				  </div>
				  <div class="form-group">
				     <label for="exampleInputEmail1">Mot de passe</label>
				     <input type="password" class="form-control" id="exampleInputEmail1" name="password" placeholder="Mot de passe" required>
				  </div>
				 <button type="submit" class="btn btn-primary" id=btnconnect>Se connecter</button>
			</form>
	    </div>

	</div>
</div>