document.addEventListener("DOMContentLoaded", function () {
  function afficherVoiture() {
    const donnees = {
      endpoint: "mes-voitures",
    };

    fetch("/api/voitures.php", {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
      },
      body: JSON.stringify(donnees),
    })
      .then((response) => response.json())
      .then((data) => {
        const aucuneVoiture = document.getElementById("aucune_voiture");

        if (data.voitures && data.voitures.length > 0) {
          aucuneVoiture.style.display = "none";

          if (data.voitures[0]) {
            document.getElementById("marque1").textContent =
              data.voitures[0].marque;
            document.getElementById("modele1").textContent =
              data.voitures[0].modele;
            document.getElementById("couleur1").textContent =
              data.voitures[0].couleur;
            document.getElementById("annee1").textContent =
              data.voitures[0].annee;
            document.getElementById("energie1").textContent =
              data.voitures[0].energie;
            document.getElementById("nb_places1").textContent =
              data.voitures[0].nb_places;
            document.getElementById("plaque1").textContent =
              data.voitures[0].plaque;
            document.getElementById("voiture1").style.display = "block";
          }

          if (data.voitures[1]) {
            document.getElementById("marque2").textContent =
              data.voitures[1].marque;
            document.getElementById("modele2").textContent =
              data.voitures[1].modele;
            document.getElementById("couleur2").textContent =
              data.voitures[1].couleur;
            document.getElementById("annee2").textContent =
              data.voitures[1].annee;
            document.getElementById("energie2").textContent =
              data.voitures[1].energie;
            document.getElementById("nb_places2").textContent =
              data.voitures[1].nb_places;
            document.getElementById("plaque2").textContent =
              data.voitures[1].plaque;
            document.getElementById("voiture2").style.display = "block";
          }

          if (data.voitures[2]) {
            document.getElementById("marque3").textContent =
              data.voitures[2].marque;
            document.getElementById("modele3").textContent =
              data.voitures[2].modele;
            document.getElementById("couleur3").textContent =
              data.voitures[2].couleur;
            document.getElementById("annee3").textContent =
              data.voitures[2].annee;
            document.getElementById("energie3").textContent =
              data.voitures[2].energie;
            document.getElementById("nb_places3").textContent =
              data.voitures[2].nb_places;
            document.getElementById("plaque3").textContent =
              data.voitures[2].plaque;
            document.getElementById("voiture3").style.display = "block";
          }
        } else {
          document.getElementById("voiture1").style.display = "block";
          document.getElementById("voiture2").style.display = "none";
          document.getElementById("voiture3").style.display = "none";
          aucuneVoiture.style.display = "block";
        }
      })
      .catch((error) => {
        console.error("Erreur:", error);
        alert("Erreur lors du chargement des données");
      });
  }

  afficherVoiture();
});
