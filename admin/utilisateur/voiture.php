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
    <h1>Ajouter une voiture</h1>
    <form action="" method="post" id="form-ajout-voiture">

        <fieldset>
            <legend>Ajouter une voiture !</legend>


            <label for="marque">Marque de la voiture:</label>
            <input type="text" name="marque" required><br>

            <label for="modele">Modele de la voiture:</label>
            <input type="text" name="modele" required><br>


            <label for="couleur">Couleur:</label>
            <input type="text" name="couleur" required><br>

            <label for="annee">Année de mise en circulation:</label>
            <input type="number" name="annee" min="1990" max="2025" required><br>

            <label for="energie">Energie:</label>
            <select name="energie" required>
                <option value="electrique">Electrique</option>
                <option value="essence">Essence</option>
                <option value="diesel">Diesel</option>
                <option value="hybride">Hybride</option>
            </select>

            <label for="nb_places">Nombre de places:</label>
            <input type="number" name="nb_places" min="2" max="7" required><br>

            <label for="plaque">Plaque d'immatriculation:</label>
            <input type="text" name="plaque" required><br>

            <label for="photos">Photos de la voiture:</label>
            <input type="file" name="photos" multiple accept="image/*"><br>

            <div><button class="btn_covoit" type="reset" name="reset">Reset</button>
                <button id="btn-ajout-voiture" class="btn_covoit" type="submit" name="Publier">Ajouter la
                    voiture</button>
            </div>

        </fieldset>

    </form>
    <script src="/assets/scripts/ajout-voiture.js"></script>


</body>

</html>