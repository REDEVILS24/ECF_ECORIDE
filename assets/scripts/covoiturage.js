document.addEventListener("DOMContentLoaded", function () {
  const form = document.getElementById("form-creation-trajet");
  const btn_creation = document.getElementById("btn-creation");
  const date_depart = document.querySelector('input[name="date_depart"]');
  const ville_depart = document.querySelector('input[name="ville_depart"]');
  const ville_arrivee = document.querySelector('input[name="ville_arrivee"]');
  const prix = document.querySelector('input[name="prix"]');
  const places_disponibles = document.querySelector(
    'input[name="places_disponibles"]'
  );

  function creationCovoiturage(e) {
    e.preventDefault();

    const date_departValue = date_depart.value;
    const datePart = date_departValue.split("T")[0];
    const heurePart = date_departValue.split("T")[1];
    const ville_departValue = ville_depart.value;
    const ville_arriveeValue = ville_arrivee.value;
    const prixValue = prix.value;
    const places_disponiblesValue = places_disponibles.value;

    const donnees = {
      endpoint: "createCovoiturage",
      date_depart: datePart,
      heure_depart: heurePart,
      ville_depart: ville_departValue,
      ville_arrivee: ville_arriveeValue,
      prix: prixValue,
      places_disponibles: places_disponiblesValue,
    };

    fetch("/api/covoiturages.php", {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
      },
      body: JSON.stringify(donnees),
    })
      .then((response) => response.json())
      .then((data) => {
        if (data.result === 1) {
          alert("Covoiturage crée ! ");
          window.location.href = "/templates/home/index.php";
        } else {
          alert("erreur ! ");
        }
      })
      .catch((error) => {
        console.error("Erreur", error);
        alert("Probleme de création");
      });
  }

  form.addEventListener("submit", creationCovoiturage);
});
