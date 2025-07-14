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

            <div class="voiture_item">
                <div class="voiture_info">
                    <div class="voiture_details">
                        <h3><span class="marque"></span> <span class="modele"></span></h3>
                        <div class="infos">
                            <div><strong>Couleur :</strong> <span class="couleur"></span></div>
                            <div><strong>Année :</strong> <span class="annee"></span></div>
                            <div><strong>Énergie :</strong> <span class="energie"></span></div>
                            <div><strong>Places :</strong> <span class="nb_places"></span></div>
                            <div><strong>Plaque :</strong> <span class="plaque"></span></div>
                        </div>
                    </div>

                    <div class="voiture_photos">
                        <img src="" alt="Photo voiture" class="photo_voiture">
                    </div>
                </div>

                <div class="voiture_actions">
                    <button class="modifier_voiture" type="button" data-id="">Modifier</button>
                    <button class="supprimer_voiture" type="button" data-id="">Supprimer</button>
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
            <a href="/templates/mon-profil.php">
                <button class="retour_profil" type="button">Retour au profil</button>
            </a>
        </section>
    </section>

    <script>

    </script>
</body>

</html>