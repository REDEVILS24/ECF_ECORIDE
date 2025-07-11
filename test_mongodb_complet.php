<?php

include_once('./assets/controllers/MongoDb.php');

try {
    $mongo = new MongoDb();
    echo "✅ Connexion MongoDB réussie !";
    $voiture = [
        "proprietaire_id" => 2,
        "marque" => "Tesla",
        "modele" => "Model 3",
        "couleur" => "Rouge",
        "electrique" => true
    ];

    $resultat = $mongo->insertVoiture($voiture);


    if ($resultat > 0) {
        echo "<br>🚗 Voiture Tesla insérée avec succès !";
    } else {
        echo "<br>❌ Échec de l'insertion";
    }

    $voitures = $mongo->getVoitures();
    echo "<br>📊 Nombre de voitures : " . count($voitures);

    foreach ($voitures as $voiture) {
        echo "<br>🚗 " . $voiture['marque'] . " " . $voiture['modele'] . " (" . $voiture['couleur'] . ")";
    }

    $voitures = $mongo->getVoitures();
    if (count($voitures) > 0) {
        $premierID = $voitures[0]['_id'];
        echo "<br>🗑️ Suppression de la voiture ID: " . $premierID;

        $supprime = $mongo->deleteVoiture($premierID);
        if ($supprime > 0) {
            echo "<br>✅ Voiture supprimée !";
        } else {
            echo "<br>❌ Échec suppression";
        }
    }


} catch (Exception $e) {
    echo "❌ Erreur : " . $e->getMessage();
}

