<?php
session_start();
require_once '../controller/config.php'; // ajout connexion bdd 
// si la session existe pas soit si l'on est pas connecté on redirige
if (!isset($_SESSION['user'])) {
    header('Location:../controller/index_formInscription.php');
    die();
}

// On récupere les données de l'utilisateur
$req = $bdd->prepare('SELECT * FROM utilisateurs WHERE token = ?');
$req->execute(array($_SESSION['user']));
$data = $req->fetch();

?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/bootstrap/css/bootstrap.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sedia Services</title>
</head>

<body class="background_landing">
    <header>
        <h1 style="font-family: Comic Sans MS;">BIENVENUE  <?php echo $data['nom']; ?> <a href="../controller/deconnexion.php"><i class="fa-solid fa-power-off"></i></a> </h1>
    </header>



    <div class="container">
        <div class="col-md-12">
            <?php
            if (isset($_GET['err'])) {
                $err = htmlspecialchars($_GET['err']);
                switch ($err) {
                    case 'current_password':
                        echo "<div class='alert alert-danger'>Le mot de passe actuel est incorrect</div>";
                        break;

                    case 'success_password':
                        echo "<div class='alert alert-success'>Le mot de passe a bien été modifié ! </div>";
                        break;
                }
            }
            ?>




           


     

            <!-- Modal -->
            <div class="modal fade" id="change_password" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Changer mon mot de passe</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="layouts/change_password.php" method="POST">
                                <label for='current_password'>Mot de passe actuel</label>
                                <input type="password" id="current_password" name="current_password" class="form-control" required />
                                <br />
                                <label for='new_password'>Nouveau mot de passe</label>
                                <input type="password" id="new_password" name="new_password" class="form-control" required />
                                <br />
                                <label for='new_password_retype'>Re tapez le nouveau mot de passe</label>
                                <input type="password" id="new_password_retype" name="new_password_retype" class="form-control" required />
                                <br />
                                <button type="submit" class="btn btn-success">Sauvegarder</button>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="avatar" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Changer mon avatar</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="layouts/change_avatar.php" method="POST" enctype="multipart/form-data">
                                <label for="avatar">Images autorisées : png, jpg, jpeg, gif - max 20Mo</label>
                                <input type="file" name="avatar_file">
                                <br />
                                <button type="submit" class="btn btn-success">Modifier</button>
                            </form>
                        </div>
                        <br />
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
                        </div>
                    </div>
                </div>
            </div>


            <!-- Modal Accès Formulaire -->
            <div class="modal" tabindex="-1" role="dialog" id="formulaire_membre">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Attention</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aspernatur, quae.
                            </p>
                        </div>
                        <div class="modal-footer">
                            <a href="../vue/formulaire.php" class="btn btn-success">Formulaire</a>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Retour</button>
                        </div>
                    </div>
                </div>
            </div>









            <div class="logo">
                <img src="../image/LogoGreffes.jpg" alt=""> <img src="" alt="">
            </div>

        <div class="titre-text">
            <p></p>
            <h1 style="font-family: Comic Sans MS;">Espace Membre</h1>
        </div>

        <div class="inner-form" role="form">
            <p class="warning">
                Warning
            </p>
            <fieldset>
                <legend>Formulaire à Remplir</legend>
                <form action="../model/add_user2.php" method="post" enctype="multipart/form-data">
                    <!-- mettre le nom du fichier html dans aciton -->
                    <label for="nom">Nom</label>
                    <input type="text" id="nom" name="nom" placeholder="Nom" aria-required="true" autofocus required>

                    <label for="prenom">Prénom</label>
                    <input type="text" id="prenom" name="prenom" placeholder="Prénom" aria-required="true"  required>

                    <label for="mail">Email:</label>
                    <input type="mail" id="mail" name="mail" aria-required="true"placeholder="Entrer votre adresse Mail" required>

                    <label for="phone">Votre téléphone</label>

                    <input type="tel" id="phone" name="phone" aria-label="format à 10 chiffre" placeholder="téléphone" aria-required="true" required>

                    <small>Format: (+33)01-75-22-15-45</small>

                    <label for="dateNaissance">Date de Naissance :</label>
                    <input type="date" id="dateNaissance" name="dateNaissance" placeholder="Indiquez votre Date de Naissance" aria-required="true" required>

                    <label for="lieuNaissance">Lieu de Naissance:</label>
                    <select name="lieuNaissance" id="lieuNaissance" required>
                        <option value="Choisir" selected="selected" >---------Choissez Votre Pays de Naissance----------</option>

                        <option value="Afghanistan">Afghanistan </option>
                        <option value="Afrique_Centrale">Afrique Centrale </option>
                        <option value="Afrique_du_sud">Afrique du Sud </option>
                        <option value="Albanie">Albanie </option>
                        <option value="Algerie">Algerie </option>
                        <option value="Allemagne">Allemagne </option>
                        <option value="Andorre">Andorre </option>
                        <option value="Angola">Angola </option>
                        <option value="Anguilla">Anguilla </option>
                        <option value="Arabie_Saoudite">Arabie Saoudite </option>
                        <option value="Argentine">Argentine </option>
                        <option value="Armenie">Armenie </option>
                        <option value="Australie">Australie </option>
                        <option value="Autriche">Autriche </option>
                        <option value="Azerbaidjan">Azerbaidjan </option>

                        <option value="Bahamas">Bahamas </option>
                        <option value="Bangladesh">Bangladesh </option>
                        <option value="Barbade">Barbade </option>
                        <option value="Bahrein">Bahrein </option>
                        <option value="Belgique">Belgique </option>
                        <option value="Belize">Belize </option>
                        <option value="Benin">Benin </option>
                        <option value="Bermudes">Bermudes </option>
                        <option value="Bielorussie">Bielorussie </option>
                        <option value="Bolivie">Bolivie </option>
                        <option value="Botswana">Botswana </option>
                        <option value="Bhoutan">Bhoutan </option>
                        <option value="Boznie_Herzegovine">Boznie Herzegovine </option>
                        <option value="Bresil">Bresil </option>
                        <option value="Brunei">Brunei </option>
                        <option value="Bulgarie">Bulgarie </option>
                        <option value="Burkina_Faso">Burkina_Faso </option>
                        <option value="Burundi">Burundi </option>

                        <option value="Caiman">Caiman </option>
                        <option value="Cambodge">Cambodge </option>
                        <option value="Cameroun">Cameroun </option>
                        <option value="Canada">Canada </option>
                        <option value="Canaries">Canaries </option>
                        <option value="Cap_vert">Cap Vert </option>
                        <option value="Chili">Chili </option>
                        <option value="Chine">Chine </option>
                        <option value="Chypre">Chypre </option>
                        <option value="Colombie">Colombie </option>
                        <option value="Comores">Colombie </option>
                        <option value="Congo">Congo </option>
                        <option value="Congo_democratique">Congo Democratique </option>
                        <option value="Cook">Cook </option>
                        <option value="Coree_du_Nord">Coree du Nord </option>
                        <option value="Coree_du_Sud">Coree du Sud </option>
                        <option value="Costa_Rica">Costa Rica </option>
                        <option value="Cote_d_Ivoire">Côte d'Ivoire </option>
                        <option value="Croatie">Croatie </option>
                        <option value="Cuba">Cuba </option>

                        <option value="Danemark">Danemark </option>
                        <option value="Djibouti">Djibouti </option>
                        <option value="Dominique">Dominique </option>

                        <option value="Egypte">Egypte </option>
                        <option value="Emirats_Arabes_Unis">Emirats Arabes Unis </option>
                        <option value="Equateur">Equateur </option>
                        <option value="Erythree">Erythree </option>
                        <option value="Espagne">Espagne </option>
                        <option value="Estonie">Estonie </option>
                        <option value="Etats_Unis">Etats-Unis </option>
                        <option value="Ethiopie">Ethiopie </option>

                        <option value="Falkland">Falkland </option>
                        <option value="Feroe">Feroe </option>
                        <option value="Fidji">Fidji </option>
                        <option value="Finlande">Finlande </option>
                        <option value="France">France </option>

                        <option value="Gabon">Gabon </option>
                        <option value="Gambie">Gambie </option>
                        <option value="Georgie">Georgie </option>
                        <option value="Ghana">Ghana </option>
                        <option value="Gibraltar">Gibraltar </option>
                        <option value="Grece">Grece </option>
                        <option value="Grenade">Grenade </option>
                        <option value="Groenland">Groenland </option>
                        <option value="Guadeloupe">Guadeloupe </option>
                        <option value="Guam">Guam </option>
                        <option value="Guatemala">Guatemala</option>
                        <option value="Guernesey">Guernesey </option>
                        <option value="Guinee">Guinee </option>
                        <option value="Guinee_Bissau">Guinee Bissau </option>
                        <option value="Guinee equatoriale">Guinee Equatoriale </option>
                        <option value="Guyana">Guyana </option>
                        <option value="Guyane_Francaise ">Guyane Francaise </option>

                        <option value="Haiti">Haiti </option>
                        <option value="Hawaii">Hawaii </option>
                        <option value="Honduras">Honduras </option>
                        <option value="Hong_Kong">Hong Kong </option>
                        <option value="Hongrie">Hongrie </option>

                        <option value="Inde">Inde </option>
                        <option value="Indonesie">Indonesie </option>
                        <option value="Iran">Iran </option>
                        <option value="Iraq">Iraq </option>
                        <option value="Irlande">Irlande </option>
                        <option value="Islande">Islande </option>
                        <option value="Israel">Israel </option>
                        <option value="Italie">italie </option>

                        <option value="Jamaique">Jamaique </option>
                        <option value="Jan Mayen">Jan Mayen </option>
                        <option value="Japon">Japon </option>
                        <option value="Jersey">Jersey </option>
                        <option value="Jordanie">Jordanie </option>

                        <option value="Kazakhstan">Kazakhstan </option>
                        <option value="Kenya">Kenya </option>
                        <option value="Kirghizstan">Kirghizistan </option>
                        <option value="Kiribati">Kiribati </option>
                        <option value="Koweit">Koweit </option>

                        <option value="Laos">Laos </option>
                        <option value="Lesotho">Lesotho </option>
                        <option value="Lettonie">Lettonie </option>
                        <option value="Liban">Liban </option>
                        <option value="Liberia">Liberia </option>
                        <option value="Liechtenstein">Liechtenstein </option>
                        <option value="Lituanie">Lituanie </option>
                        <option value="Luxembourg">Luxembourg </option>
                        <option value="Lybie">Lybie </option>

                        <option value="Macao">Macao </option>
                        <option value="Macedoine">Macedoine </option>
                        <option value="Madagascar">Madagascar </option>
                        <option value="Madère">Madère </option>
                        <option value="Malaisie">Malaisie </option>
                        <option value="Malawi">Malawi </option>
                        <option value="Maldives">Maldives </option>
                        <option value="Mali">Mali </option>
                        <option value="Malte">Malte </option>
                        <option value="Man">Man </option>
                        <option value="Mariannes du Nord">Mariannes du Nord </option>
                        <option value="Maroc">Maroc </option>
                        <option value="Marshall">Marshall </option>
                        <option value="Martinique">Martinique </option>
                        <option value="Maurice">Maurice </option>
                        <option value="Mauritanie">Mauritanie </option>
                        <option value="Mayotte">Mayotte </option>
                        <option value="Mexique">Mexique </option>
                        <option value="Micronesie">Micronesie </option>
                        <option value="Midway">Midway </option>
                        <option value="Moldavie">Moldavie </option>
                        <option value="Monaco">Monaco </option>
                        <option value="Mongolie">Mongolie </option>
                        <option value="Montserrat">Montserrat </option>
                        <option value="Mozambique">Mozambique </option>

                        <option value="Namibie">Namibie </option>
                        <option value="Nauru">Nauru </option>
                        <option value="Nepal">Nepal </option>
                        <option value="Nicaragua">Nicaragua </option>
                        <option value="Niger">Niger </option>
                        <option value="Nigeria">Nigeria </option>
                        <option value="Niue">Niue </option>
                        <option value="Norfolk">Norfolk </option>
                        <option value="Norvege">Norvege </option>
                        <option value="Nouvelle_Caledonie">Nouvelle Caledonie </option>
                        <option value="Nouvelle_Zelande">Nouvelle Zelande </option>

                        <option value="Oman">Oman </option>
                        <option value="Ouganda">Ouganda </option>
                        <option value="Ouzbekistan">Ouzbekistan </option>

                        <option value="Pakistan">Pakistan </option>
                        <option value="Palau">Palau </option>
                        <option value="Palestine">Palestine </option>
                        <option value="Panama">Panama </option>
                        <option value="Papouasie_Nouvelle_Guinee">Papouasie Nouvelle Guinee </option>
                        <option value="Paraguay">Paraguay </option>
                        <option value="Pays_Bas">Pays Bas </option>
                        <option value="Perou">Perou </option>
                        <option value="Philippines">Philippines </option>
                        <option value="Pologne">Pologne </option>
                        <option value="Polynesie">Polynesie </option>
                        <option value="Porto_Rico">Porto Rico </option>
                        <option value="Portugal">Portugal </option>

                        <option value="Qatar">Qatar </option>

                        <option value="Republique_Dominicaine">Republique Dominicaine </option>
                        <option value="Republique_Tcheque">Republique Tcheque </option>
                        <option value="Reunion">Reunion </option>
                        <option value="Roumanie">Roumanie </option>
                        <option value="Royaume_Uni">Royaume Uni </option>
                        <option value="Russie">Russie </option>
                        <option value="Rwanda">Rwanda </option>

                        <option value="Sahara Occidental">Sahara Occidental </option>
                        <option value="Sainte_Lucie">Sainte Lucie </option>
                        <option value="Saint_Marin">Saint Marin </option>
                        <option value="Salomon">Salomon </option>
                        <option value="Salvador">Salvador </option>
                        <option value="Samoa_Occidentales">Samoa Occidentales</option>
                        <option value="Samoa_Americaine">Samoa Americaine </option>
                        <option value="Sao_Tome_et_Principe">Sao Tome et Principe </option>
                        <option value="Senegal">Sénégal </option>
                        <option value="Seychelles">Seychelles </option>
                        <option value="Sierra Leone">Sierra Leone </option>
                        <option value="Singapour">Singapour </option>
                        <option value="Slovaquie">Slovaquie </option>
                        <option value="Slovenie">Slovenie</option>
                        <option value="Somalie">Somalie </option>
                        <option value="Soudan">Soudan </option>
                        <option value="Sri_Lanka">Sri Lanka </option>
                        <option value="Suede">Suede </option>
                        <option value="Suisse">Suisse </option>
                        <option value="Surinam">Surinam </option>
                        <option value="Swaziland">Swaziland </option>
                        <option value="Syrie">Syrie </option>

                        <option value="Tadjikistan">Tadjikistan </option>
                        <option value="Taiwan">Taiwan </option>
                        <option value="Tonga">Tonga </option>
                        <option value="Tanzanie">Tanzanie </option>
                        <option value="Tchad">Tchad </option>
                        <option value="Thailande">Thailande </option>
                        <option value="Tibet">Tibet </option>
                        <option value="Timor_Oriental">Timor Oriental </option>
                        <option value="Togo">Togo </option>
                        <option value="Trinite_et_Tobago">Trinite et Tobago </option>
                        <option value="Tristan da cunha">Tristan de Cuncha </option>
                        <option value="Tunisie">Tunisie </option>
                        <option value="Turkmenistan">Turmenistan </option>
                        <option value="Turquie">Turquie </option>

                        <option value="Ukraine">Ukraine </option>
                        <option value="Uruguay">Uruguay </option>

                        <option value="Vanuatu">Vanuatu </option>
                        <option value="Vatican">Vatican </option>
                        <option value="Venezuela">Venezuela </option>
                        <option value="Vierges_Americaines">Vierges Americaines </option>
                        <option value="Vierges_Britanniques">Vierges Britanniques </option>
                        <option value="Vietnam">Vietnam </option>

                        <option value="Wake">Wake </option>
                        <option value="Wallis et Futuma">Wallis et Futuma </option>

                        <option value="Yemen">Yemen </option>
                        <option value="Yougoslavie">Yougoslavie </option>

                        <option value="Zambie">Zambie </option>
                        <option value="Zimbabwe">Zimbabwe </option>

                    </select>
                    <label for="objetSocial">Objet Social:</label>
                    <select name="objetSocial" id="objetSocial" required>
                    <option value="ChoisirObjetSocial">----------Choisir l'Objet Social----------</option>
                        
                        <option>SARL</option>
                        <option>SCI</option>
                        <option>SAS</option>
                        <option>EURL</option>
                        <option>SASU</option>

                    </select>

                    <label for="nomParents">Nom des Parents:</label>
                    <input type="text" id="nomParents" name="nomParents" placeholder="Indiquez le Nom des Parents" aria-required="true" autofocus required>

                    <label for="prenomParents">Prénom des Parents :</label>
                    <input type="text" id="prenomParents" name="prenomParents" placeholder="Indiquez le Prénom des Parents" aria-required="true" autofocus required>




                    <!-- ajouter plusieurs label pieces jointes -->
                    <button type="submit" value="valider" name="valider" aria-label="cliquez pour envoyer">envoyer</button>


                </form>
            </fieldset>

        </div>


            <style>
                .background_landing {
                    background-image: radial-gradient(circle, #ffffff, #f5f5f5, #ebebeb, #e2e2e2, #d8d8d8);

                }



       
            </style>


            <!-- Optional JavaScript -->
            <!-- jQuery first, then Popper.js, then Bootstrap JS -->
            <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>