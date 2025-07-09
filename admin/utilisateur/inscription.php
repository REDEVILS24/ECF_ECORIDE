<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/assets/styles/styles.css">
    <link rel="stylesheet" href="/assets/styles/body.css">
    <link rel="stylesheet" href="/assets/styles/inscription.css">

    <title>Inscription</title>
</head>

<body>

    <h1>INSCRIPTION</h1>
    <form action="/admin/utilisateur/inscription.php" method="post">
        <fieldset>
            <legend>Remplissez tout les champs </legend>

            <label for="nom">Nom:</label>
            <input type="text" name="nom"><br>

            <label for="prenom">Prenom:</label>
            <input type="text" name="prenom"><br>

            <label for="age">Date de naissance:</label>
            <input type="date" name="age"><br>

            <label for="pseudo">Pseudo:</label>
            <input type="text" name="pseudo"><br>

            <label for="mail">Adresse mail:</label>
            <input type="mail" name="mail"><br>

            <label for="password">Mot de passe:</label>
            <input type="password" name="password"><br>

            <label for="password1">Mot de passe:</label>
            <input type="password" name="password1"><br>

            <label for="voiture">Voiture:</label>
            <input type="text" name="Voiture"><br>
            <label for="marque">marque:</label>
            <input type="text" name="marque"><br>
            <label for="modele">modele:</label>
            <input type="text" name="modele"><br>
            <label for="annee">annee:</label>
            <input type="text" name="annee"><br>
            <label for="energie">energie:</label>
            <input type="text" name="energie"><br>
            <label for="preference">Préference: </label>
            <select name="preference">
                <option value="">gazole</option>
                <option value="">essence</option>
                <option value="">electrique</option>
            </select><br>



            <label for="place">Place disponible:</label>
            <input type="number" name="place" min="1" max="4"><br>

            <div class="btn_inscription">
                <button class="btn_reset_inscri" type="reset" name="reset">Reset</button>
                <button class="btn_enregistrement" type="submit" name="enregistrer">Valider le compte</button>
            </div>

        </fieldset>

    </form>
    <section>
        <div class="connexion">
            <p><a href="/templates/home/connexion.php">Vous avez déjà un compte ? connectez-vous !</a></p>
        </div>
    </section>
</body>

</html>