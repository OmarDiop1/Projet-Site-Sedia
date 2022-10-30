<?php


include_once("./model/header.inc.php");

?>

<body>
    <header>
        <section class="banniere" id="banniere">
            <div class="logo">
                <img src="./image/logoSediaServices.jpg" alt=""> <img src="" alt="">
            </div>
            <div class="banniere-text">
                <h1>Sedia Services</h1>
                <p>Devenir Entrepreneur n'a jamais été aussi simple</p>
            </div>




            <?php if (isset($_SESSION['user'])) { ?>
                <div class="banniere_btn">
                    <a href="./vue/formulaire.php"> <span></span> Formulaire</a>
                </div>

                <div class="banniere_btn">
                    <a href="./controller/deconnexion.php"> <span></span> Deconnexion</a>

                </div>
            <?php  } else {  
                
                ?>
               
                <div class="banniere_btn">
                    <a href="./vue/inscription.php"> <span></span> Inscription</a>
                </div>
                <div class="banniere_btn">
                    <a href="./controller/connexion.php"> <span></span> Connexion</a>

                </div>
            <?php } ?>

        </section>

        <nav class="navbar">
            <ul>
                <li><a href="#mission">Comment ça Marche?</a></li>
                <li><a href="#service">Qui Sommes-Nous?</a></li>
                <li><a href="#contact">Contact</a></li>

            </ul>
        </nav>

    </header>


    <main>
        <section class="mission" id="mission">
            <div class="titre-text">
                <p>En Savoir Plus?</p>
                <h1>Comment ça Marche?</h1>
            </div>
            <div class="mission_boite">
                <div class="missions">
                    <h1>Choisissez La Démarche Adaptée</h1>
                    <div class="description">
                        <div class="mission_icon">
                            <i class="fa-solid fa-arrows-to-dot"></i>
                        </div>
                        <div class="mission-text">
                            <p>Contactez notre service client afin que l'on puisse vous conseiller dans le choix de la forme
                                juridique de votre société</p>
                        </div>
                    </div>
                    <h1>Créez votre Compte utilisateur</h1>
                    <div class="description">
                        <div class="mission_icon">
                        <i class="fa-solid fa-user"></i>
                        </div>
                        <div class="mission-text">
                            <p>Inscrivez-Vous tout simplement en rentrant vos informations pour ensuite avoir accés au Formulaire d'ouverture d'entreprise</p>
                        </div>
                    </div>
                    <h1>Pièces Justificatives</h1>
                    <div class="description">
                        <div class="mission_icon">
                            <i class="fa-solid fa-folder-plus"></i>
                        </div>
                        <div class="mission-text">
                            <p>Remplissez le formulaire en toute confidentialité puis inserez les documents nécessaires à
                                l'ouverture de votre entreprise</p>
                        </div>
                    </div>
                    
                    <h1>Laissez-Vous Porter</h1>
                    <div class="description">
                        <div class="mission_icon">
                            <i class="fa-solid fa-envelope"></i>
                        </div>
                        <div class="mission-text">
                            <p>Notre équipe s'occupe de faire valider votre démarche auprès de l'administration compétente
                                (Greffe, Préfecture, ETC..)</p>
                        </div>
                    </div>

                </div>
                <div class="im-mission"></div>
            </div>
        </section>
        <section class="service" id="service">
            <div class="titre-text">
                <p>Nos Valeurs</p>
                <h1>Qui Sommes-Nous?</h1>
            </div>
            <div class="service_boite">
                <div class="service_unique">
                    <img src="./image/imgProximité.jpg" alt="">
                    <div class="text_sur">
                        <div class="descrip">
                            <h3>Proximité</h3>
                            <hr>
                            <p>Nos Outils nous permets de proposer tout nos services en ligne, ce qui vous garantie un
                                accompagnement de proximité partout en France </p>
                        </div>
                    </div>
                </div>
                <div class="service_unique">
                    <img src="./image/imgValeurAjouté.jpg" alt="">
                    <div class="text_sur">
                        <div class="descrip">
                            <h3>Valeur Ajoutée et Expertise</h3>
                            <hr>
                            <p>Nous développons avec soin nos expertises pour vous proposer des services à réelle valeur
                                ajoutée</p>
                        </div>
                    </div>
                </div>
                <div class="service_unique">
                    <img src="./image/imgRigueurSecurité.jpg" alt="">
                    <div class="text_sur">
                        <div class="descrip">
                            <h3>Rigueur et Sécurité</h3>
                            <hr>
                            <p>Rigueur , Respect des engagements, Sécurité et confidentialité sont au coeur de nos méthodes
                                de travail</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <footer>
        <section class="Contact" id="contact">
            <img src="./image/logoSimpleSediaServices.jpg" alt="" class="img-footer">
            <div class="titre-text">
                <p>Contact</p>
                <h1>Contactez-Nous</h1>
            </div>
            <div class="pied-page">
                <div class="pied-g">
                    <h1>Heures d'Ouverture</h1>
                    <p><i class="far fa-clock"></i>Lundi au Vendredi - 8h a 18h</p>
                    <p><i class="far fa-clock"></i>Lundi au Vendredi - 8h a 18h</p>
                </div>
                <div class="pied-d">
                    <h1>Contactez-Nous</h1>
                    <p>4 Avenue Henri Barbusse , 93700 Drancy <i class="fas fa-map-marker"></i></p>
                    <p>contact@sediaservices.com<i class="far fa-envelope"></i></p>

                </div>
            </div>
            <div class="reseaux-sociaux">


                <i class="fab fa-linkedin-in"></i>

                <p>2022 Sedia Services</p>
            </div>
        </section>
    </footer>
    <script src="./app/script.js"></script>
    <script src="./app/bootstrap/js/bootstrap.js"></script>
</body>

</html>