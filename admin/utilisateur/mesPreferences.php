<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/assets/styles/voitures.css">
    <link rel="stylesheet" href="/assets/styles/chartes.css">
    <title>Mes PREFERENCES</title>
</head>

<body>
    <h1>MES PREFERENCES</h1>

    <section class="container">

        <section class="liste_preferences" id="liste_preferences">

            <div class="preferences_item">
                <div class="preferences_info">
                    <div class="preferences_details">
                        <h3><span class="fumeur_accepte"></span>
                            <span class="modele"></span>
                        </h3>
                        <div class="infos">
                            <div><strong>fumeur ?:</strong> <span class="fumeur_accepte"></span></div>
                            <div><strong>animaux ?:</strong> <span class="animaux"></span></div>
                            <div><strong>Style de musique:</strong> <span class="musique"></span></div>
                            <div><strong>Discussion:</strong> <span class="discussion"></span></div>
                            <div><strong>Pause fréquente ?:</strong> <span class="pause"></span></div>
                        </div>
                    </div>

                </div>

                <div class="voiture_actions">
                    <button class="modifier_preference" type="button" data-id="">Modifier</button>
                    <button class="supprimer_preference" type="button" data-id="">Supprimer</button>
                </div>
            </div>
        </section>


        <section class="navigation">
            <a href="../../templates/home/profil.php">
                <button class="retour_profil" type="button">Retour au profil</button>
            </a>
        </section>
    </section>

    <script>

    </script>
</body>

</html>