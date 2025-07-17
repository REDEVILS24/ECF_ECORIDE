document.addEventListener("DOMContentLoaded", function () {
  const form = document.getElementById("sectionRecherche");
  const formRecherche = document.getElementById("formRecherche");
  const dateDepart = document.querySelector('input[name="date_depart"]');
  const dateArrivee = document.querySelector('input[name="date_arrivee"]');
  const villeDepart = document.querySelector(
    '#formRecherche input[name="ville_depart"]'
  );
  const villeArrivee = document.querySelector(
    '#formRecherche input[name="ville_arrivee"]'
  );
  const nbPassager = document.querySelector('input[name="passager"]');
  const btnRecherche = document.querySelector(".btn_rechercher");
  const btnReserver = document.getElementById("reserver");
  const popupHidden = document.querySelector(".popup-hidden");
  const btnAnnulerPopup = document.getElementById("btnAnnulerPopup");
  const btnConfirmerReservation = document.getElementById("btnConfirmerPopup");
  const noRes = document.querySelector(".noReservation");

  let trajetSelectionne = null;

  function rechercheCovoiturage(e) {
    console.log("FONCTION RECHERCHE APPELÉE !");
    e.preventDefault();

    const depart = villeDepart.value.trim().toLowerCase();
    const arrivee = villeArrivee.value.trim().toLowerCase();

    if (!depart && !arrivee) {
      alert("Veuillez saisir au moins une ville");
      return;
    }

    afficherListeCovoiturage(depart, arrivee);
  }
  function ouvrirPopup() {
    popupHidden.classList.remove("popup-hidden");
  }

  function fermerPopup() {
    popupHidden.classList.add("popup-hidden");
  }

  function confirmerReservation(e) {
    const donnees = {
      endpoint: "create",
      covoiturage_id: trajetSelectionne.id,
      statut: "en_attente",
    };
    console.log("Données envoyées:", donnees);
    console.log("Trajet sélectionné complet:", trajetSelectionne);
    console.log("ID envoyé:", trajetSelectionne.id);
    fetch("/api/reservations.php", {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
      },
      body: JSON.stringify(donnees),
    })
      .then((response) => response.json())
      .then((data) => {
        console.log(data);
        fermerPopup();
      })
      .catch((error) => {
        console.error("Erreur:", error);
        alert("Erreur lors la reservation");
      });
  }

  function afficherListeCovoiturage(filtreDepart = "", filtreArrivee = "") {
    const donnees = {
      endpoint: "all",
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
        const liste = document.getElementById("listeCovoiturage");

        liste.innerHTML = "";

        data.covoiturages.forEach((trajet) => {
          const dateTrajet = new Date(trajet.date_depart);
          const dateNow = new Date();
          const dateFrancaise = new Date(trajet.date_depart).toLocaleDateString(
            "fr-FR"
          );
          const departMatch =
            !filtreDepart ||
            trajet.ville_depart.toLowerCase().includes(filtreDepart);
          const arriveeMatch =
            !filtreArrivee ||
            trajet.ville_arrivee.toLowerCase().includes(filtreArrivee);
          if (dateTrajet >= dateNow && departMatch && arriveeMatch) {
            noRes.style.display = "none";
            const div = document.createElement("div");
            div.className = "trajet-item";
            const btnValider = document.createElement("button");
            btnValider.className = "btnValider";
            btnValider.textContent = "Reserver ce trajet";
            div.innerHTML = `Pseudo du conducteur: ${trajet.pseudo}<br> Ville de depart: ${trajet.ville_depart}<br> Ville d'arrivée: ${trajet.ville_arrivee}<br>Date de départ: ${dateFrancaise} à ${trajet.heure_depart}<br> Prix: ${trajet.prix} €<br>  `;

            liste.appendChild(div);
            div.appendChild(btnValider);

            btnValider.addEventListener("click", function () {
              trajetSelectionne = trajet;
              console.log("Trajet sélectionné:", trajetSelectionne);
              document.getElementById("conducteur").textContent = trajet.pseudo;
              document.getElementById("popupDepart").textContent =
                trajet.ville_depart;
              document.getElementById("popupArrivee").textContent =
                trajet.ville_arrivee;
              document.getElementById("popupDate").textContent = dateFrancaise;
              document.getElementById("popupPrix").textContent = trajet.prix;
              ouvrirPopup();
            });
          }
        });
        if (liste.innerHTML === "") {
          noRes.style.display = "block";
        }
      })
      .catch((error) => {
        console.error("Erreur:", error);
        alert("Erreur lors l'affichage des reservations");
      });
  }

  function afficherMesReservations() {
    const donnees = {
      endpoint: "getMyReservations",
    };

    fetch("/api/reservations.php", {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
      },
      body: JSON.stringify(donnees),
    })
      .then((response) => response.json())
      .then((data) => {
        const liste = document.getElementById("mesReservations");
        liste.innerHTML = "";
        data.result.forEach((reservation) => {
          const dateFrancaise = new Date(
            reservation.date_depart
          ).toLocaleDateString("fr-FR");
          const btnConfirmer = document.createElement("button");
          btnConfirmer.textContent = "Confirmer la reservation";
          const btnAnnuler = document.createElement("button");
          btnAnnuler.textContent = "Annuler la reservation";
          const div = document.createElement("div");
          div.className = "trajet-item";
          div.innerHTML = `
                    <strong>Réservation #${reservation.id}</strong><br>
                    De: ${reservation.ville_depart}<br>
                    Vers: ${reservation.ville_arrivee}<br>
                    Date: ${dateFrancaise}<br>
                    Prix: ${reservation.prix}€<br>
                    Statut: ${reservation.statut}
                `;

          liste.appendChild(div);
          div.appendChild(btnConfirmer);
          div.appendChild(btnAnnuler);

          btnAnnuler.addEventListener("click", function () {
            const donnees = {
              endpoint: "delete",
              id: reservation.id,
            };

            fetch("/api/reservations.php", {
              method: "POST",
              headers: {
                "Content-Type": "application/json",
              },
              body: JSON.stringify(donnees),
            })
              .then((response) => response.json())
              .then((data) => {
                alert("Réservation annulée !");
                afficherMesReservations(); // Recharger la liste
                afficherListeCovoiturage();
              })
              .catch((error) => {
                console.error("Erreur:", error);
                alert("Erreur lors l'affichage des reservations");
              });
          });
        });
      })
      .catch((error) => {
        console.error("Erreur:", error);
        alert("Erreur lors l'affichage des reservations");
      });
  }

  afficherListeCovoiturage();
  afficherMesReservations();

  btnReserver.addEventListener("click", ouvrirPopup);
  btnConfirmerReservation.addEventListener("click", confirmerReservation);
  btnAnnulerPopup.addEventListener("click", fermerPopup);
  formRecherche.addEventListener("submit", rechercheCovoiturage);
});
