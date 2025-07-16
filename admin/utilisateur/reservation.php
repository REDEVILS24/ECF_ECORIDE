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
    <h1>Gestion des trajets et des reservation</h1>
    <!-- Formulaire de recherche -->
    <section class="form" id="sectionRecherche">

        <div class="formulaire">

            <form action="" method="post" id="formRecherche">

                <label for="date_depart">Date de départ:</label>
                <input type="date" name="date_depart">

                <label for="ville_depart">Départ:</label>
                <input class="input" type="text" name="ville_depart">

                <label for="date_arrivee">Date d'arrivée:</label>
                <input type="date" name="date_arrivee">

                <label for="ville_arrivee">Déstination:</label>
                <input class="input" type="text" name="ville_arrivee">

                <label for="passager">Passager:</label>
                <input type="number" name="passager" min="1" max="4" value="1">

                <input type="submit" name="rechercher" value="Rechercher" class="btn_rechercher">

            </form>
        </div>
    </section>

    <!-- Formulaire de reservation -->
    <section id="mesReservations">
        <fieldset>
            <legend>Mes reservations</legend>
            <div class="Reservations">
                <p><strong>Départ :</strong> <span id="ville_depart"></span></p>
                <p><strong>Arrivée :</strong> <span id="ville_arrivee"></span></p>
                <p><strong>Date :</strong> <span id="date_depart"></span></p>
                <p><strong>Prix :</strong> <span id="prix"></span> €</p>
                <p><strong>Places disponibles :</strong> <span id="places"></span></p>
            </div>
        </fieldset>
    </section>
    <!-- Aucune reservation  -->
    <section class="noReservation">
        <div>
            <p>Aucune résevations! Sautez le pas et reserver votre tout premier covoiturage</p>
        </div>
    </section>

    <h2>Liste des covoiturage disponible ! </h2>


    <!-- Liste de covoiturage -->

    <section>
        <div id="listeCovoiturage">
            <fieldset>
                <legend>Liste de covoiturage</legend>

                <input type="hidden" name="covoiturage_id" value="">
                <input type="hidden" name="passager_id" value="">
                <input type="hidden" name="statut" value="en_attente">


                <div class="trajet-info">

                    <p><strong>Départ :</strong> <span id="villeDepartListe"></span></p>
                    <p><strong>Arrivée :</strong> <span id="villeArriveeListe"></span></p>
                    <p><strong>Date :</strong> <span id="dateDepartListe"></span></p>
                    <p><strong>Prix :</strong> <span id="prixListe"></span> €</p>
                    <p><strong>Places disponibles :</strong> <span id="placesListe"></span></p>
                </div>
                <div>
                    <button type="reset">Annuler</button>
                    <button type="submit" name="reserver" id="reserver">Confirmer la réservation</button>
                </div>

            </fieldset>
        </div>
    </section>

    <section class="popup">
        <div id="popupOverlay" class="popup-overlay popup-hidden">
            <div class="popup-container">
                <h3>Confirmer la réservation</h3>
                <div class="popup-content">
                    <!-- Détails trajet à remplir dynamiquement -->
                    <p><strong>Conducteur :</strong> <span id="conducteur"></span></p>
                    <p><strong>Départ :</strong> <span id="popupDepart"></span></p>
                    <p><strong>Arrivée :</strong> <span id="popupArrivee"></span></p>
                    <p><strong>Date :</strong> <span id="popupDate"></span></p>
                    <p><strong>Prix :</strong> <span id="popupPrix"></span> €</p>
                </div>
                <div class="popup-actions">
                    <button id="btnAnnulerPopup">Annuler</button>
                    <button id="btnConfirmerPopup">Confirmer</button>
                </div>
            </div>
        </div>
    </section>
    <script src="/assets/scripts/reservations.js"></script>
</body>

</html>