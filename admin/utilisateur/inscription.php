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
            <input type="text" name="nom" required><br>

            <label for="prenom">Prenom:</label>
            <input type="text" name="prenom" required><br>

            <label for="pseudo">Pseudo:</label>
            <input type="text" name="pseudo" required><br>

            <label for="date_naissance">Date de naissance:</label>
            <input type="date" name="date_naissance" required><br>


            <label for="email">Adresse mail:</label>
            <input type="email" name="email" required><br>

            <label for="mdp">Mot de passe:</label>
            <input type="password" name="mdp" required><br>

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