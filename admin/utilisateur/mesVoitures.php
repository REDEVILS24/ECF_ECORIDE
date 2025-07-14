<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/assets/styles/voitures.css">
    <link rel="stylesheet" href="/assets/styles/chartes.css">
    <title>Mes Voitures</title>
</head>

<body>
    <h1>MES VOITURES</h1>

    <section class="container">

        <section class="actions">
            <a href="/templates/ajouter-voiture.php">
                <button class="ajouter_voiture" type="button">Ajouter une voiture</button>
            </a>
        </section>


        <section class="liste_voitures" id="liste_voitures">

            <div class="voiture_item" id="voiture1" style="display: none;">
                <div class="voiture_info">
                    <div class="voiture_details">
                        <div class="infos">
                            <div><strong>Marque :</strong> <span id="marque1"></span></div>
                            <div><strong>Modèle :</strong> <span id="modele1"></span></div>
                            <div><strong>Couleur :</strong> <span id="couleur1"></span></div>
                            <div><strong>Année :</strong> <span id="annee1"></span></div>
                            <div><strong>Énergie :</strong> <span id="energie1"></span></div>
                            <div><strong>Places :</strong> <span id="nb_places1"></span></div>
                            <div><strong>Plaque :</strong> <span id="plaque1"></span></div>
                        </div>
                        <div class="voiture_actions">
                            <button class="modifier_voiture" id="modifier1">Modifier</button>
                            <button class="supprimer_voiture" id="supprimer1">Supprimer</button>
                        </div>
                    </div>
                </div>
            </div>


            <div class="voiture_item" id="voiture2" style="display: none;">
                <div class="voiture_info">
                    <div class="voiture_details">
                        <div class="infos">
                            <div><strong>Marque :</strong> <span id="marque2"></span></div>
                            <div><strong>Modèle :</strong> <span id="modele2"></span></div>
                            <div><strong>Couleur :</strong> <span id="couleur2"></span></div>
                            <div><strong>Année :</strong> <span id="annee2"></span></div>
                            <div><strong>Énergie :</strong> <span id="energie2"></span></div>
                            <div><strong>Places :</strong> <span id="nb_places2"></span></div>
                            <div><strong>Plaque :</strong> <span id="plaque2"></span></div>
                        </div>
                        <div class="voiture_actions">
                            <button class="modifier_voiture" id="modifier2">Modifier</button>
                            <button class="supprimer_voiture" id="supprimer2">Supprimer</button>
                        </div>
                    </div>
                </div>
            </div>


            <div class="voiture_item" id="voiture3" style="display: none;">
                <div class="voiture_info">
                    <div class="voiture_details">
                        <div class="infos">
                            <div><strong>Marque :</strong> <span id="marque3"></span></div>
                            <div><strong>Modèle :</strong> <span id="modele3"></span></div>
                            <div><strong>Couleur :</strong> <span id="couleur3"></span></div>
                            <div><strong>Année :</strong> <span id="annee3"></span></div>
                            <div><strong>Énergie :</strong> <span id="energie3"></span></div>
                            <div><strong>Places :</strong> <span id="nb_places3"></span></div>
                            <div><strong>Plaque :</strong> <span id="plaque3"></span></div>
                        </div>
                        <div class="voiture_actions">
                            <button class="modifier_voiture" id="modifier3">Modifier</button>
                            <button class="supprimer_voiture" id="supprimer3">Supprimer</button>
                        </div>
                    </div>
                </div>
            </div>

        </section>


        <section class="aucune_voiture" id="aucune_voiture" style="display: none;">
            <p>Vous n'avez encore ajouté aucune voiture.</p>
            <a href="/templates/ajouter-voiture.php">
                <button class="ajouter_premiere_voiture">Ajouter ma première voiture</button>
            </a>
        </section>

        <section class="navigation">
            <a href="../../templates/home/profil.php">
                <button class="retour_profil" type="button">Retour au profil</button>
            </a>
        </section>
    </section>

    <script src="../../assets/scripts/mesVoitures.js">
    </script>
</body>

</html>