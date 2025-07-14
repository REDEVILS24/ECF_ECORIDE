<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/assets/styles/charte.css">
    <link rel="stylesheet" href="/assets/styles/styles.css">
    <link rel="stylesheet" href="/assets/styles/covoiturage.css">
    <title>Donner un avis</title>
</head>

<body>
    <h1>Donner votre avis</h1>
    <form action="" method="post">
        <fieldset>
            <legend>Évaluez ce trajet</legend>

            <!-- Champs cachés -->
            <input type="hidden" name="trajet_id" value="">
            <input type="hidden" name="utilisateur_id" value="">

            <!-- Champs visibles -->
            <label for="note">Note (sur 5) :</label>
            <select name="note" required>
                <option value="">Choisissez une note</option>
                <option value="1">⭐ (1/5)</option>
                <option value="2">⭐⭐ (2/5)</option>
                <option value="3">⭐⭐⭐ (3/5)</option>
                <option value="4">⭐⭐⭐⭐ (4/5)</option>
                <option value="5">⭐⭐⭐⭐⭐ (5/5)</option>
            </select><br><br>

            <label for="commentaire">Commentaire :</label>
            <textarea name="commentaire" rows="4" cols="50" placeholder="Partagez votre expérience..."
                required></textarea><br><br>

            <div>
                <button type="reset">Effacer</button>
                <button type="submit" name="publier_avis">Publier l'avis</button>
            </div>
        </fieldset>
    </form>
</body>

</html>