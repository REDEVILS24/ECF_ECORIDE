<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/assets/styles/charte.css">
    <link rel="stylesheet" href="/assets/styles/styles.css">
    <link rel="stylesheet" href="/assets/styles/covoiturage.css">
    <title>Resevervation</title>
</head>

<body>
    <h1>Réserver ce trajet</h1>
    <form action="" method="post">
        <fieldset>
            <legend>Confirmation de réservation</legend>

            <!-- Champs cachés -->
            <input type="hidden" name="covoiturage_id" value="">
            <input type="hidden" name="passager_id" value="">
            <input type="hidden" name="statut" value="en_attente">

            <!-- Affichage infos trajet (lecture seule) -->
            <div class="trajet-info">
                <p><strong>Départ :</strong> <span id="ville_depart"></span></p>
                <p><strong>Arrivée :</strong> <span id="ville_arrivee"></span></p>
                <p><strong>Date :</strong> <span id="date_depart"></span></p>
                <p><strong>Prix :</strong> <span id="prix"></span> €</p>
                <p><strong>Places disponibles :</strong> <span id="places"></span></p>
            </div>

            <div>
                <button type="reset">Annuler</button>
                <button type="submit" name="reserver">Confirmer la réservation</button>
            </div>
        </fieldset>
    </form>



</body>

</html>