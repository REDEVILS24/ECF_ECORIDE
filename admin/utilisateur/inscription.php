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
    <form action="" method="post" id="form-inscription">
        <fieldset>
            <legend>Remplissez tout les champs </legend>

            <label for="nom">Nom:</label>
            <input type="text" name="nom" required><br>

            <label for="prenom">Prenom:</label>
            <input type="text" name="prenom" required><br>

            <label for="pseudo">Pseudo:</label>
            <input type="text" name="pseudo" required><br>

            <label for="date_naissance">Date de naissance:</label>
            <input type="date" name="date_naissance" required><br>



            <label for="email">Adresse mail:</label>
            <input type="email" name="email" required><br>
            <div class="erreur_email"></div>

            <label for="mdp">Mot de passe:</label>
            <input type="password" name="mdp" required><br>

            <label for="adresse">Adresse (optionnel):</label>
            <input type="text" name="adresse"><br>

            <label for="codePostal">Code postal (optionnel):</label>
            <input type="number" name="codePostal" min="10000" max="99999"><br>

            <label for="ville">Ville (optionnel):</label>
            <input type="text" name="ville"><br>

            <label for="permis">Numéro de permis (optionnel):</label>
            <input type="text" name="permis"><br>

            <div class="btn_inscription">
                <button class="btn_reset_inscri" type="reset" name="reset">Reset</button>
                <button id="btn-inscription" class="btn_enregistrement" type="submit" name="enregistrer">Valider le
                    compte</button>
            </div>

        </fieldset>

    </form>
    <section>
        <div class="connexion">
            <p><a href="/templates/home/connexion.php">Vous avez déjà un compte ? connectez-vous !</a></p>
        </div>
    </section>
    <script src="/assets/scripts/inscriptions.js"></script>
</body>

</html>