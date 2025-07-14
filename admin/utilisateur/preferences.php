<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/assets/styles/charte.css">
    <link rel="stylesheet" href="/assets/styles/styles.css">
    <link rel="stylesheet" href="/assets/styles/covoiturage.css">
    <title>Preferences</title>
</head>

<body>
    <h1>Vos préferences</h1>
    <form action="" method="post" id="form-preferences">
        <fieldset>
            <legend>Ajouter vos préferences !</legend>

            <label for="fumeur_accepte">Est ce que vous acceptez les fumeurs ? </label>
            <input type="checkbox" name="fumeur_accepte" value="true"><br>

            <label for="animaux_acceptes">Est ce que vous acceptez les animaux ? </label>
            <input type="checkbox" name="animaux_acceptes" value="true"><br>


            <label for="type_musique">Quelles genres de musique écoutez vous ? ? </label>
            <select name="type_musique">
                <option value="rap">rap</option>
                <option value="rock">rock</option>
                <option value="jazz">jazz</option>
                <option value="pop">Pop</option>
                <option value="classique">Classique</option>
                <option value="aucune">Aucune</option>
            </select> <br>

            <label for="discussion">Etes vous plutôt ? </label>
            <select name="discussion">
                <option value="bavard">Bavard</option>
                <option value="calme">Calme</option>
                <option value="variable">Variable</option>
            </select> <br>

            <label for="temperature">Quelle température préférez-vous ? ? </label>
            <select name="temperature">
                <option value="froid">Froid</option>
                <option value="chaud">Chaud</option>
                <option value="normal">Normal</option>
            </select><br>

            <label for="pauses">Est ce que vous acceptez les pauses ? </label>
            <input type="checkbox" name="pauses" value="true"><br>

            <div><button class="btn_covoit" type="reset" name="reset">Reset</button>
                <button id="btn-preferences" class="btn_covoit" type="submit" name="Publier">Valider les
                    préferences</button>
            </div>

        </fieldset>

    </form>

    <script src="/assets/scripts/preferences.js"></script>


</body>

</html>