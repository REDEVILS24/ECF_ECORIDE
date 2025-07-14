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


            <label for="date_depart">Date de départ</label>
            <input type="datetime-local" name="date_depart" required><br>

            <label for="ville_depart">Lieu de départ:</label>
            <input type="text" name="ville_depart" required><br>


            <label for="ville_arrivee">Lieu d'arrivée:</label>
            <input type="text" name="ville_arrivee" required><br>

            <label for="prix">Prix (€):</label>
            <input type="number" name="prix" min="1" max="20" step="0.01" required><br>

            <label for="places_disponibles">Place disponible:</label>
            <input type="number" name="places_disponibles" min="1" max="4" required><br>

            <div><button class="btn_covoit" type="reset" name="reset">Reset</button>
                <button class="btn_covoit" type="submit" name="Publier">Publier le trajet</button>
            </div>

        </fieldset>

    </form>



</body>

</html>