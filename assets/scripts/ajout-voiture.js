document.addEventListener("DOMContentLoaded", function () {
  const form = document.getElementById("form-ajout-voiture");
  const btn_creation = document.getElementById("btn-ajout-voiture");
  const marque = document.querySelector('input[name="marque"]');
  const modele = document.querySelector('input[name="modele"]');
  const couleur = document.querySelector('input[name="couleur"]');
  const annee = document.querySelector('input[name="annee"]');
  const energie = document.querySelector('select[name="energie"]');
  const nb_places = document.querySelector('input[name="nb_places"]');
  const plaque = document.querySelector('input[name="plaque"]');
  const photos = document.querySelector('input[name="photos"]');

  function ajoutVoiture(e) {
    e.preventDefault();

    const marqueValue = marque.value;
    const modeleValue = modele.value;
    const couleurValue = couleur.value;
    const anneeValue = annee.value;
    const energieValue = energie.value;
    const nb_placesValue = nb_places.value;
    const plaqueValue = plaque.value;
    const photosValue = photos.value;

    const donnees = {
      endpoint: "insert",
      marque: marqueValue,
      modele: modeleValue,
      couleur: couleurValue,
      annee: anneeValue,
      energie: energieValue,
      nb_places: nb_placesValue,
      plaque: plaqueValue,
      photos: photosValue,
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
        if (data.result === 1) {
          alert("Voitures crée ! ");
          window.location.href = "/templates/home/voiture.php";
        } else {
          alert("erreur ! ");
        }
      })
      .catch((error) => {
        console.error("Erreur", error);
        alert("Probleme de création");
      });
  }
  form.addEventListener("submit", ajoutVoiture);
});
