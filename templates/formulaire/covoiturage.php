<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/assets/styles/charte.css">
    <link rel="stylesheet" href="/assets/styles/styles.css">
    <link rel="stylesheet" href="/assets/styles/covoiturage.css">
    <title>Covoiturage</title>
</head>

<body>
    <h1>Formulaire de covoiturage</h1>
    <form action="" method="post">
        <fieldset>
            <legend>Saisissez votre voyage </legend>

            <label for="nom">Nom:</label>
            <input type="text" name="nom"><br>
            <label for="prenom">Prenom:</label>
            <input type="text" name="prenom"><br>
            <label for="date_depart">Date de départ</label>
            <input type="date" name="date_depart"><br>
            <label for="heure_depart">Heure de départ</label>
            <input type="time" name="heure_depart:"><br>
            <label for="depart">Lieu de départ:</label>
            <input type="text" name="depart"><br>
            <label for="heure_arrivee">Heure d'arrivée</label>
            <input type="time" name="heure_arrivee:"><br>
            <label for="arrivée">Lieu d'arrivée:</label>
            <input type="text" name="arrivée"><br>
            <label for="prix">Prix:</label>
            <input type="number" name="prix" min="1" max="20"><br>
            <label for="place">Place disponible:</label>
            <input type="number" name="place" min="1" max="4"><br>
            <div><button class="btn_covoit" type="reset" name="reset">Reset</button>
                <button class="btn_covoit" type="submit" name="Publier">Publier le trajet</button>
            </div>

        </fieldset>

    </form>



</body>

</html>