<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/assets/styles/styles.css">
    <link rel="stylesheet" href="/assets/styles/body.css">

    <title>EcoRide</title>


</head>

<body>


    <!-- Premier gros paragraphe pour déscription de la société -->

    <section class="presentation">


        <div class="bloc-presentation">
            <h3 class="titre">"Ensemble, transformons nos trajets en gestes pour la planète"</h3>
            <p>EcoRide n'est pas qu'une plateforme de covoiturage, c'est un mouvement citoyen pour une mobilité plus
                responsable. Chaque trajet partagé est un pas vers un avenir plus vert.</p>
        </div>
        <div class="bloc-presentation">
            <h3 class="titre">IMPACT ÉCOLOGIQUE</h3>
            <p>"Réduisez votre empreinte carbone de 75% par trajet partagé"
                "1 voiture = 4 passagers = 3 voitures en moins sur la route"
                "Participez à la lutte contre le réchauffement climatique"</p>
        </div>
    </section>
    <section class="presentation">
        <div class="bloc-presentation1">
            <h3 class="titre">ESPRIT PARTAGE</h3>
            <p>"Partagez plus qu'un trajet, partagez un moment"
                "Créez du lien social dans vos déplacements"
                "Une communauté bienveillante de voyageurs éco-responsables"</p>
        </div>
        <div class="bloc-presentation1">
            <h3 class="titre">VALEURS ECORIDE</h3>
            <p>Solidarité : Entraide entre conducteurs et passagers
                Respect : De l'environnement et des autres
                Convivialité : Voyager ensemble, c'est plus sympa
                Économie : Diviser les coûts pour tous</p>
        </div>
        <div class="bloc-presentation1">
            <h3 class="titre">CALL-TO-ACTION INSPIRANT</h3>
            <p>"Rejoignez la communauté EcoRide et donnez du sens à vos trajets !"
                Ton à adopter : Positif, engagé, proche des utilisateurs, axé sur l'impact collectif ! 🚗💚
                Ce message vous inspire pour votre hero section ?</p>
        </div>

    </section>
    <!-- Mise en place de ou des photos avec pour but d'aerer le site et de mettre de la couleur -->
    <section>
        <div class="img">
            <img src="/image/Voiture_désert.jpg" alt="" width="400" height="200">
            <img src="/image/Voiture_foret.jpg" alt="" width="400" height="200">
        </div>
    </section>

    <!-- Formulaire pour le choix des dates et la destination avec le point de départ -->
    <section class="form">
        <div class="formulaire">

            <form action="" method="post">

                <label for="date_depart">Date de départ:</label>
                <input type="date" name="date_depart">
                <label for="depart">Départ:</label>
                <input type="text" name="depart">
                <label for="date_arrivee">Date d'arrivée:</label>
                <input type="date" name="date_arrivee">
                <label for="destination">Déstination:</label>
                <input type="text" name="destination">
                <label for="passager">Passager:</label>
                <input type="number" name="passager" min="1" max="4" value="1">
                <input type="submit" name="rechercher" value="Rechercher" class="btn_rechercher">

            </form>
        </div>
    </section>
    <!-- Section pour proposition de covoiturage pour que les gens se proposent  -->
    <section class="covoiturage">
        <div class="bloc-covoiturage">
            <h3 class="titre">AVANTAGE ÉCONOMIQUE</h3>
            <p>"Divisez vos frais d'essence, d'autoroute et de stationnement"
                "Rentabilisez vos trajets quotidiens ou occasionnels"
                "Votre voiture devient une source de revenus complémentaires"</p>
        </div>
        <div class="bloc-covoiturage">
            <h3 class="titre">IMPACT ENVIRONNEMENTAL</h3>
            <p>"Optimisez l'utilisation de votre véhicule"
                "Réduisez le nombre de voitures sur les routes"
                "Devenez acteur du changement écologique"</p>
        </div>
    </section>
    <section class="covoiturage">
        <div class="bloc-covoiturage1">
            <h3 class="titre">DIMENSION SOCIALE</h3>
            <p>"Rompez la solitude des longs trajets"
                "Rencontrez des personnes de votre région"
                "Créez des liens durables avec vos passagers"</p>
        </div>
        <div class="bloc-covoiturage1">
            <h3 class="titre">SIMPLICITÉ</h3>
            <p>"Publiez votre trajet en 2 minutes"
                "Choisissez vos passagers selon vos critères"
                "Gérez facilement vos réservations"</p>
        </div>

        <div class="bloc-covoiturage1">
            <h3 class="titre"> CALL-TO-ACTION</h3>
            <p>"Proposez votre premier trajet et rejoignez les conducteurs EcoRide !"
                "Vos sièges vides n'attendent que vous"</p>
        </div>

    </section>
    <div class="trajet">
        <input class="btn" type="button" value="Publier un trajet">
    </div>





</body>

</html>