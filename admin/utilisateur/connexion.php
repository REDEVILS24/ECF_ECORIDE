<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/assets/styles/connexion.css">
    <title>Connexion</title>
</head>

<body>
    <section>
        <div class="titre">
            <h1>Connexion</h1>
        </div>

        <div class="formulaire">
            <form class="connexion">
                <label for="email">Email :</label>
                <input type="email" name="email" required>
                <br><br>

                <label for="password">Mot de passe :</label>
                <input type="password" name="password" required>
                <br><br>

                <input class="btn_connexion" type="submit" value="Se connecter">
            </form>
        </div>
    </section>
    <section>
        <div class="redirection">
            <p><a href="#">Mot de passe oublié ?</a></p>
            <p><a href="/templates/home/inscription.php">S'inscrire</a></p>
        </div>
    </section>
</body>

</html>