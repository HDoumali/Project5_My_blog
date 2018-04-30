<?php $this->titre = 'Blog - Hassan DOUMALI'; ?>

    <!-- Header -->
    <header style="background-image: url('assets/img/img1.jpg')">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <img src="assets/img/imgprofilemini.PNG" alt="" class="img-rounded">
                    <div class="intro-text">
                        <span class="name">HASSAN DOUMALI</span>
                        <hr class="star-light">
                        <span class="skills">Le développeur web de tous les défis</span><br /><br />
                        <a href="assets/docs/CvHassanDoumali.pdf" target="_blank"><button type="button" class="btn btn-primary btn-lg" "><span class="glyphicon glyphicon-download" aria-hidden="true"></span> TELECHARGER CV</button></a><br />
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div class="row">
                <div class="col-lg-8 col-lg-offset-2">
                    <!-- To configure the contact form email address, go to mail/contact_me.php and update the email address in the PHP file on line 19. -->
                    <!-- The form should work on most web servers, but if the form is not working you may need to configure your web server differently. -->
                    <p>Vous pouvez me contacter en remplissant attentivement le formulaire ci-dessous. Je serai ravi de répondre à chacune de vos questions.</p>
                    <br />

                    <form name="sentMessage" id="contactForm" novalidate>
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label>Nom</label>
                                <input type="text" class="form-control" placeholder="Nom" id="name" name="name" required data-validation-required-message="Veuillez entrer votre nom s'il vous plait.">
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label>Prénom</label>
                                <input type="text" class="form-control" placeholder="Prénom" id="name" name="firstname" required data-validation-required-message="Veuillez entrer votre prénom s'il vous plait.">
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label>Email</label>
                                <input type="email" class="form-control" placeholder="Email" id="email" name="email" required data-validation-required-message="Veuillez entrer votre adresse email s'il vous plait.">
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label>Message</label>
                                <textarea rows="5" class="form-control" placeholder="Message" id="message" name="message" required data-validation-required-message="Veuillez entrer votre message."></textarea>
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <br>
                        <div id="success"></div>
                        <div class="row">
                            <div class="form-group col-xs-12">
                                <button type="submit" class="btn btn-success btn-lg">Envoyer</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

   
    